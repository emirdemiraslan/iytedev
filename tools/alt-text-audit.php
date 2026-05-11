<?php
/**
 * Alt-Text Audit Script
 *
 * Scans all published WordPress content (posts, pages, custom post types)
 * for <img> tags missing alt attributes, attachments without alt text,
 * and featured images without alt. Generates a CSV report.
 *
 * Usage:
 *   1. Via WP-CLI (recommended):
 *        wp eval-file wp-content/themes/iyte_dev/tools/alt-text-audit.php
 *
 *   2. Via browser (administrator only):
 *        Place this file in tools/, then visit:
 *        https://iyte.edu.tr/wp-content/themes/iyte_dev/tools/alt-text-audit.php?run=1
 *        (After running, DELETE or rename the file — do not leave it accessible.)
 *
 * Output:
 *   tools/reports/alt-text-audit-YYYY-MM-DD.csv
 *
 * The CSV is a punch-list to hand to the content editorial team.
 */

// --- Bootstrap (browser mode) -------------------------------------------
if ( ! defined( 'ABSPATH' ) ) {
	// Try to locate wp-load.php by walking up the directory tree.
	$bootstrap = __DIR__;
	while ( $bootstrap !== '/' && ! file_exists( $bootstrap . '/wp-load.php' ) ) {
		$bootstrap = dirname( $bootstrap );
	}
	if ( ! file_exists( $bootstrap . '/wp-load.php' ) ) {
		die( 'Could not locate wp-load.php' );
	}
	require_once $bootstrap . '/wp-load.php';

	if ( ! current_user_can( 'manage_options' ) ) {
		status_header( 403 );
		die( 'Forbidden: administrator privileges required.' );
	}
	if ( empty( $_GET['run'] ) ) {
		die( 'Append ?run=1 to URL to execute the audit. Remove this file after use.' );
	}
	header( 'Content-Type: text/plain; charset=utf-8' );
}

// --- Configuration ------------------------------------------------------
$post_types = array( 'post', 'page', 'haber', 'duyuru', 'manset' );
$report_dir = __DIR__ . '/reports';
if ( ! is_dir( $report_dir ) ) {
	mkdir( $report_dir, 0755, true );
}
$report_file = $report_dir . '/alt-text-audit-' . date( 'Y-m-d-His' ) . '.csv';

$fh = fopen( $report_file, 'w' );
if ( ! $fh ) {
	die( 'Cannot write report file at: ' . $report_file );
}

// CSV header (UTF-8 BOM for Excel)
fwrite( $fh, "\xEF\xBB\xBF" );
fputcsv( $fh, array(
	'Post ID',
	'Post Type',
	'Status',
	'Title',
	'URL',
	'Issue Type',
	'Image URL',
	'Existing Alt',
	'Suggested Source',
) );

$issues = 0;
$scanned = 0;

// --- Helpers ------------------------------------------------------------
function audit_log_issue( $fh, $post, $issue, $img_url = '', $existing_alt = '', $suggestion = '' ) {
	fputcsv( $fh, array(
		$post->ID,
		$post->post_type,
		$post->post_status,
		get_the_title( $post ),
		get_permalink( $post ),
		$issue,
		$img_url,
		$existing_alt,
		$suggestion,
	) );
}

// --- Scan all posts/pages/CPTs ------------------------------------------
$query = new WP_Query( array(
	'post_type'      => $post_types,
	'post_status'    => array( 'publish', 'private' ),
	'posts_per_page' => -1,
	'no_found_rows'  => true,
	'fields'         => 'ids',
) );

echo "Scanning " . count( $query->posts ) . " posts...\n";

foreach ( $query->posts as $post_id ) {
	$post = get_post( $post_id );
	$scanned++;

	// 1. Featured image alt
	if ( has_post_thumbnail( $post_id ) ) {
		$thumb_id  = get_post_thumbnail_id( $post_id );
		$thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
		if ( empty( trim( $thumb_alt ) ) ) {
			audit_log_issue( $fh, $post, 'Featured image missing alt',
				wp_get_attachment_url( $thumb_id ), '', 'Set in Media Library or Edit Post → Featured Image' );
			$issues++;
		}
	}

	// 2. <img> tags inside post_content
	if ( ! empty( $post->post_content ) ) {
		// Find all <img ...> tags.
		if ( preg_match_all( '/<img\b[^>]*>/i', $post->post_content, $matches ) ) {
			foreach ( $matches[0] as $img_tag ) {
				$has_alt   = preg_match( '/\balt\s*=/i', $img_tag );
				$alt_value = '';
				if ( $has_alt && preg_match( '/\balt\s*=\s*["\']([^"\']*)["\']/i', $img_tag, $am ) ) {
					$alt_value = $am[1];
				}
				preg_match( '/\bsrc\s*=\s*["\']([^"\']+)["\']/i', $img_tag, $sm );
				$src = isset( $sm[1] ) ? $sm[1] : '';

				if ( ! $has_alt ) {
					audit_log_issue( $fh, $post, 'Inline <img> has no alt attribute', $src, '', 'Edit post; add alt="..." or mark decorative with alt=""' );
					$issues++;
				} elseif ( trim( $alt_value ) === '' ) {
					// alt="" is acceptable for decorative images; flag as low-priority
					audit_log_issue( $fh, $post, 'Inline <img> has empty alt (decorative — verify intentional)', $src, '', 'If image conveys meaning, add descriptive alt; else leave alt=""' );
					$issues++;
				}
			}
		}
	}
}

fclose( $fh );

// --- Also scan all attachments for orphaned uploads without alt ---------
$attach_fh = fopen( str_replace( '.csv', '-attachments.csv', $report_file ), 'w' );
fwrite( $attach_fh, "\xEF\xBB\xBF" );
fputcsv( $attach_fh, array( 'Attachment ID', 'File URL', 'Existing Alt', 'Used In Post' ) );

$attach_query = new WP_Query( array(
	'post_type'      => 'attachment',
	'post_status'    => 'inherit',
	'post_mime_type' => 'image',
	'posts_per_page' => -1,
	'fields'         => 'ids',
	'no_found_rows'  => true,
) );

$orphan_count = 0;
foreach ( $attach_query->posts as $aid ) {
	$alt = get_post_meta( $aid, '_wp_attachment_image_alt', true );
	if ( empty( trim( $alt ) ) ) {
		fputcsv( $attach_fh, array(
			$aid,
			wp_get_attachment_url( $aid ),
			$alt,
			get_post_field( 'post_parent', $aid ),
		) );
		$orphan_count++;
	}
}
fclose( $attach_fh );

// --- Summary ------------------------------------------------------------
$summary = sprintf(
	"Done.\n  Scanned %d post(s) across %d post type(s).\n  Found %d alt-text issue(s) in content.\n  Found %d attachment(s) without alt text.\n\nReports:\n  %s\n  %s\n",
	$scanned,
	count( $post_types ),
	$issues,
	$orphan_count,
	$report_file,
	str_replace( '.csv', '-attachments.csv', $report_file )
);

echo $summary;

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::success( 'Alt-text audit complete.' );
}
