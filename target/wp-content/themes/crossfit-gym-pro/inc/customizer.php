<?php
/**
 * CrossFit Gym Pro Theme Customizer
 *
 * @package CrossFit Gym Pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function crossfit_gym_pro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'crossfit_gym_pro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function crossfit_gym_pro_customize_preview_js() {
	wp_enqueue_script( 'crossfit_gym_pro_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'crossfit_gym_pro_customize_preview_js' );

function crossfit_gym_pro_custom_customize_enqueue() {
 wp_enqueue_script( 'crossfit-gym-pro-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'crossfit_gym_pro_custom_customize_enqueue' );
