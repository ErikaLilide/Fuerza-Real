<?php
/* Template Name: Blog - Right Sidebar */
get_header(); ?>

<div class="container content-area">
    <div class="middle-align">
        <div class="site-main" id="sitemain">			
			<?php 
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }
            $query = new WP_Query( array( 'post_type' => 'post','paged' => $paged ) ); ?>
            <?php if( $query->have_posts() ) : ?>
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php crossfit_gym_pro_custom_blogpost_pagination( $query ); ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'index' ); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar('blog');?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>