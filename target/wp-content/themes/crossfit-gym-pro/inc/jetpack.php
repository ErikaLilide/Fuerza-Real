<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package CrossFit Gym Pro
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function crossfit_gym_pro_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'crossfit_gym_pro_jetpack_setup' );
