<?php
defined( 'ABSPATH' ) || exit;

// NAV: shortcodes
function dcms_show_shortcodes() {
	if (current_user_can( 'manage_options' ) ) {
		global $shortcode_tags;
		echo '<pre>';
		print_r($shortcode_tags); 
		echo '</pre>';		
	}
}
add_action( 'wp_footer', 'dcms_show_shortcodes' );

// NAV: ancho
add_theme_support( 'align-wide' );


