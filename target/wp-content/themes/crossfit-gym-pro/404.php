<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package CrossFit Gym Pro
 */

get_header(); ?>

<div class="container content-area">
    <div class="middle-align">
        <div class="error-404 not-found sitefull">
            <header class="page-header">
                <h1 class="title-404"><?php _e( '<strong>404</strong> Not Found', 'crossfit-gym-pro' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php _e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'crossfit-gym-pro' ); ?></p>
                
            </div><!-- .page-content -->
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>