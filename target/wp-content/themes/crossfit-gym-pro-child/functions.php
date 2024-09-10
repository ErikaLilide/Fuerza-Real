<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'crossfit-gym-pro-basic-style','crossfit-gym-pro-editor-style','crossfit-gym-pro-base-style','crossfit-gym-pro-nivo-style','crossfit-gym-pro-fontawesome-all-style','crossfit-gym-pro-animation','crossfit-gym-pro-hover','crossfit-gym-pro-hover-min','crossfit-gym-pro-testimonialslider-style','crossfit-gym-pro-responsive-style','crossfit-gym-pro-owl-style','crossfit-gym-pro-flexiselcss','crossfit-gym-pro-youtube-popup','crossfit-gym-pro-animation-style','gra_circle_styles' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION
