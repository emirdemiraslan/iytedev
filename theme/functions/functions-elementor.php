<?php
/**
 * Elementor related functions
 *
 * @package @@name
 */

// Make sure this file is called by wp.
defined( 'ABSPATH' ) || die();


function theme_prefix_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
	$elementor_theme_manager->register_location(
		'hero-header',
		[
			'label' => __( 'Hero Header', 'IYTE' ),
			'multiple' => true,
			'edit_in_content' => false,
		]
	);

}
add_action( 'elementor/theme/register_locations', 'theme_prefix_register_elementor_locations' );

add_filter( 'gettext', 'replace_translate_text', 10, 3 );

function replace_translate_text( $translation, $text, $domain ){
	if(get_locale() == "tr_TR"){
		if( $text === 'Search Results for: %s' ) {
			$text = '"%s" için Arama Sonuçları';
		}
	}
    return $text;
}