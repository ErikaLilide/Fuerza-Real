<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CrossFit Gym Pro
 */
$footerlayout = of_get_option('footerlayout');
?>

<div id="footer-wrapper">
    	<div class="container footer" <?php if($footerlayout=='onecolumnnone'){ ?> style="display:none" <?php } ?> >      
        <div class="footer-shadow">
		<?php if($footerlayout=='onecolumnnone'){ ?>
		<?php 
            }
             elseif($footerlayout=='onecolumn'){ ?>
                <div class="cols-1">    
                     <?php if(!dynamic_sidebar('footer-1')) : ?> 
                          <div class="widget-column-1">
							<div class="footer-navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?> 
                            </div>
                          </div>             
                      <?php endif; ?>
                    <div class="clear"></div>
                </div>
            <?php 
            }
             elseif ($footerlayout=='twocolumn'){ ?>

<!-- =============================== Column Two - 2 =================================== -->

            <div class="cols-2">    
               <?php if(!dynamic_sidebar('footer-1')) : ?>  
               <div class="widget-column-1">                   
                    <?php if( of_get_option('contacttitle',true) != ''){ ?>
                        <h5><?php echo of_get_option('contacttitle'); ?></h5>
                    <?php } ?>  
                    <div class="contactdetail">
                        <?php if( of_get_option('address',true) != ''){ ?>                    
                          <p><?php echo of_get_option('address'); ?></p> 
                        <?php } ?>	
                        
                        <?php if( of_get_option('phone',true) != ''){ ?>                    
                            <p><?php echo of_get_option('phone'); ?></p>
                        <?php } ?>
                        
                        <?php if( of_get_option('email',true) != ''){ ?>                      
                            <p><?php echo of_get_option('email'); ?></p>
                        <?php } ?> 
                        
                        <?php if( of_get_option('website',true) != ''){ ?>                      
                            <p><?php echo of_get_option('website'); ?></p>
                        <?php } ?>
                    </div>
              </div>                  
			<?php  endif; ?>
           
			<?php if(!dynamic_sidebar('footer-2')) : ?>
                <div class="widget-column-2">            	
                     <?php if( of_get_option('abouttitle') != '') { ?>
                        <h5 class="footer-highlight"><?php if( of_get_option('abouttitle') != ''){ echo of_get_option('abouttitle');}; ?></h5> 
                    <?php } ?>
                    <?php if( of_get_option('aboutusdescription') != '') { echo do_shortcode(of_get_option('aboutusdescription')); } ; ?> 
                </div>
            <?php endif; ?>
			<div class="clear"></div>
            </div><!--end .cols-2-->  
			<?php 
            }
            elseif($footerlayout=='threecolumn'){ ?>
        
<!-- =============================== Column Three - 3 =================================== -->
            <div class="cols-3">    
                <?php if(!dynamic_sidebar('footer-1')) : ?>  
                <div class="widget-column-1">            	
                    <?php if( of_get_option('contacttitle',true) != ''){ ?>
                        <h5><?php echo of_get_option('contacttitle'); ?></h5>
                    <?php } ?>  
                    <div class="contactdetail">
                        <?php if( of_get_option('address',true) != ''){ ?>                    
                          <p><?php echo of_get_option('address'); ?></p> 
                        <?php } ?>	
                        
                        <?php if( of_get_option('phone',true) != ''){ ?>                    
                            <p><?php echo of_get_option('phone'); ?></p>
                        <?php } ?>
                        
                        <?php if( of_get_option('email',true) != ''){ ?>                      
                            <p><?php echo of_get_option('email'); ?></p>
                        <?php } ?> 
                        
                        <?php if( of_get_option('website',true) != ''){ ?>                      
                            <p><?php echo of_get_option('website'); ?></p>
                        <?php } ?>
                    </div> 
              </div>                  
			<?php  endif; ?>
           
              <?php if(!dynamic_sidebar('footer-2')) : ?>
             	 <div class="widget-column-2"> 
                    <h5><?php if( of_get_option('footermenutitle') != ''){ echo of_get_option('footermenutitle');}; ?></h5>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
            		  <div class="clear"></div>       	
              	 </div>
            	<?php endif; ?>
                
            <?php if(!dynamic_sidebar('footer-3')) : ?>
                <div class="widget-column-3">     
                   <h5><?php if( of_get_option('latestpostttl') != ''){ echo of_get_option('latestpostttl');}; ?></h5>
                      <ul class="recent-post"> 
                	<?php query_posts('post_type=post&showposts=3'); ?>
                    <?php  while( have_posts() ) : the_post(); ?> 
                    <li>
                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    	<span><?php the_date('d, M, Y'); ?></span>
                    </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_query(); ?>   
                </div>
            <?php endif; ?>
			<div class="clear"></div>
            </div><!--end .cols-3-->  
            <?php
            }
            elseif($footerlayout=='fourcolumn'){ ?>

<!-- =============================== Column Fourth - 4 =================================== -->
          
    		<div class="cols-4">    
                <?php if(!dynamic_sidebar('footer-1')) : ?>  
                <div class="widget-column-1">                
                      <?php if( of_get_option('contacttitle',true) != ''){ ?>
                        <h5><?php echo of_get_option('contacttitle'); ?></h5>
                    <?php } ?>  
                    <div class="contactdetail">
                        <?php if( of_get_option('address',true) != ''){ ?>                    
                          <p><?php echo of_get_option('address'); ?></p> 
                        <?php } ?>	
                        
                        <?php if( of_get_option('phone',true) != ''){ ?>                    
                            <p><?php echo of_get_option('phone'); ?></p>
                        <?php } ?>
                        
                        <?php if( of_get_option('email',true) != ''){ ?>                      
                            <p><?php echo of_get_option('email'); ?></p>
                        <?php } ?> 
                        
                        <?php if( of_get_option('website',true) != ''){ ?>                      
                            <p><?php echo of_get_option('website'); ?></p>
                        <?php } ?>                        
                    </div>
              </div>                  
			<?php  endif; ?>
           
                <?php if(!dynamic_sidebar('footer-2')) : ?>
             	 <div class="widget-column-2"> 
                    <h5><?php if( of_get_option('footermenutitle') != ''){ echo of_get_option('footermenutitle');}; ?></h5>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
                 </div>
            	<?php endif; ?>
                
            <?php if(!dynamic_sidebar('footer-3')) : ?> 
              <div class="widget-column-3">
              		<h5><?php if( of_get_option('latestpostttl') != ''){ echo of_get_option('latestpostttl');}; ?></h5>
                      <ul class="recent-post"> 
                	<?php query_posts('post_type=post&showposts=3'); ?>
                    <?php  while( have_posts() ) : the_post(); ?> 
                    <li>
                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    	<span><?php the_date('d, M, Y'); ?></span>
                    </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_query(); ?>     
              </div>             
            <?php endif; ?>
            
                
            <?php if(!dynamic_sidebar('footer-4')) : ?>
                <div class="widget-column-4">  
                     <?php if( of_get_option('abouttitle') != '') { ?>
                        <h5 class="footer-highlight"><?php if( of_get_option('abouttitle') != ''){ echo of_get_option('abouttitle');}; ?></h5> 
                    <?php } ?>
                   	<?php if( of_get_option('aboutusdescription') != '') { echo do_shortcode(of_get_option('aboutusdescription')); } ; ?> 
                 </div>
            <?php endif; ?>
            	<div class="clear"></div>
                </div><!--end .cols-4-->
             <?php } ?>  
            <div class="clear"></div>
        	</div><!--end .footer-shadow-->
        </div><!--end .container-->

        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt">
					<?php if( of_get_option('copytext',true) != ''){ echo of_get_option('copytext',true); }; ?>
                    <?php if( of_get_option('ftlink', true) != ''){echo of_get_option('ftlink',true);}; ?>
                </div>                           
               <div class="design-by"><?php if( of_get_option('footersocialicon') != '') { echo do_shortcode(of_get_option('footersocialicon')); } ; ?></div>
           		<div class="clear"></div>
            </div> 
       </div>

    </div>    
<?php if( of_get_option('backtotop') != '') { echo do_shortcode(of_get_option('backtotop')); } ; ?>
<?php wp_footer(); ?>
</div>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/custom.js"></script>
</body>
</html>