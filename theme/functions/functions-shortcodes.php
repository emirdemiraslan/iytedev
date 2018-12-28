<?php
/**
 * Shortcode related functions
 *
 * @package @@name
 */

// Make sure this file is called by wp.
defined( 'ABSPATH' ) || die();

function newsbox_shortcode($atts, $content=null) {
    $a = shortcode_atts( array(
		'post_type' => 'haber',
    ), $atts );
    
    return Component_Newsbox::get($a['post_type']);

}

add_shortcode( "newsbox", 'newsbox_shortcode' );