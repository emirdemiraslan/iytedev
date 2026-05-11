<!--<?php get_template_part( 'elements/global/_hero_header' ); ?>-->

<?php
$manset_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
if ( empty( $manset_alt ) ) {
	$manset_alt = get_the_title();
}
?>
<div id="manset_cover">

	<div class="featured img-cover" style="background-image:url(<?php the_post_thumbnail_url('full'); ?>)" role="img" aria-label="<?php echo esc_attr( $manset_alt ); ?>">

	</div>


</div>