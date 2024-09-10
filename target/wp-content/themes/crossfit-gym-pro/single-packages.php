<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Kids CrossFit Gym Pro 
 */
get_header(); 

?>

<div class="container content-area">
    <div class="middle-align">
        <div class="site-main sitefull">
			<?php while ( have_posts() ) : the_post(); ?>
            	<?php 
					$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) ); 
					$countrycity = esc_html( get_post_meta( get_the_ID(), 'countrycity', true ) );	
				?>
                <h1 class="entry-title"><?php the_title();?></h1>
                <div class="post-thumb"><?php the_post_thumbnail('medium', array( 'class' => 'alignleft' ) ); ?></div><!-- post-thumb -->
                <h5><?php echo $countrycity; ?> / <?php echo $designation; ?></h5>
                <?php the_content();?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>