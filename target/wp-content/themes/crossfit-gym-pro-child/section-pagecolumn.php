<?php if ( is_home() || is_front_page() ) { ?>
<?php $hidewelcome = of_get_option('hidewelcomesection', '1'); ?>
<?php if($hidewelcome == ''){ ?>
<section id="welcomearea">
  <div class="container">
    <div class="welcomebx">
      <?php if( of_get_option('welcomebox',false) ) { ?>
      <?php $queryvar = new wp_query('page_id='.of_get_option('welcomebox',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
            
	
       <?php if( of_get_option('welcomeimg', true) != '') { ?>
      <div class="welcome_imgcolumn"> <img alt="" src="<?php echo esc_url( of_get_option( 'welcomeimg', true )); ?>" / > </div>
      <?php } ?>
      <div class="<?php if( of_get_option('welcomeimg', true) != '') { ?>welcome_contentcolumn<?php }else{ ?>welcome_contentcolumn welcome_full<?php } ?>">
        <?php if( of_get_option('welcomesubtitle',true) != '') { ?>
        <span class="sub-title-head"><?php echo of_get_option('welcomesubtitle'); ?> </span>
        <?php } ?>
        <h2 class="section_title">
          <?php the_title(); ?>
        </h2>
        <p><?php echo wp_trim_words( get_the_content(), of_get_option('welcomelength'), '' ); ?></p>
        <?php if( of_get_option('welcomequotes',true) != '') { ?>
        	<div class="welcomequotes"><h3><?php echo of_get_option('welcomequotes'); ?></h3></div>
        <?php } ?>
         <?php if( of_get_option('aboutmeinfo') != '') { echo do_shortcode(of_get_option('aboutmeinfo')); } ; ?>
        <?php /*?><?php if( of_get_option('welcomebutton',true) != '') { ?>
        <div class="custombtn" style="text-align:left"><a class="morebutton" href="<?php the_permalink(); ?>" target=""><?php echo of_get_option('welcomebutton'); ?></a></div>
        <?php } ?><?php */?>
      </div>
      
      <div class="clear"></div>
      <?php endwhile;
						wp_reset_postdata(); ?>
      <?php } else { ?>
      <div class="welcome_imgcolumn"> <img src="<?php echo get_template_directory_uri(); ?>/images/welcome_img.png" alt="" /> </div>
      <div class="welcome_contentcolumn">
        <?php if( of_get_option('welcomesubtitle',true) != '') { ?>
        <span class="sub-title-head"><?php echo of_get_option('welcomesubtitle'); ?> </span>
        <?php } ?>
        <h2 class="section_title">
          <?php _e('Make yourself stronger than your best excuses','crossfit-gym-pro'); ?>
        </h2>
        <p>
          <?php _e('Praesent nec metus malesuada, sollicitudin arcu nec, phare tra felis. Ut sollicitudin ut lectus feugiat sodales. Aliquamerat volutpat. Quisque tempus pulvinar.','crossfit-gym-pro'); ?>
        </p>
 
        <?php if( of_get_option('welcomequotes',true) != '') { ?>
        	<div class="welcomequotes"><h3><?php echo of_get_option('welcomequotes'); ?></h3></div>
        <?php } ?>
        
        <?php if( of_get_option('aboutmeinfo') != '') { echo do_shortcode(of_get_option('aboutmeinfo')); } ; ?>
        
		<?php /*?><?php if( of_get_option('welcomebutton',true) != '') { ?>
        <div class="custombtn" style="text-align:left"><a class="morebutton" href="#" target=""><?php echo of_get_option('welcomebutton'); ?></a></div>
        <?php } ?><?php */?>
      </div>
      
      <div class="clear"></div>
      <?php } ?>
    </div>
  </div>
  <!-- .container --> 
  
</section>
<!-- #welcomearea -->
<?php } ?> 


<?php $hidesection2 = of_get_option('hidesection2', '1'); ?>
<?php if($hidesection2 == ''){ ?>
<section id="pagesection2">
  <div class="container">
    <div class="pagesection2">
      <?php if( of_get_option('pagesectionpage',false) ) { ?>
      <?php $queryvar = new wp_query('page_id='.of_get_option('pagesectionpage',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
            
 
      <div class="pagesection2_content">
          <div class="area_row">
                <div class="left-column-50">
                	<h2 class="section_title">
                    	<?php the_title(); ?>
                    </h2>
                </div>
                <div class="left-column-50">
                	<p><?php echo wp_trim_words( get_the_content(), of_get_option('pagesectionpagelength'), '' ); ?></p>
                </div>
            <div class="clear"></div>
          </div>
          <?php if( of_get_option('videosection') != '') { echo do_shortcode(of_get_option('videosection')); } ; ?>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php } else { ?>
            <div class="pagesection2_content">
              <div class="area_row">
                    <div class="left-column-50">
                        <h2 class="section_title">
                           <?php _e('We want to share our work experiences','crossfit-gym-pro'); ?>
                        </h2>
                    </div>
                    <div class="right-column-50">
                        <p><?php _e('Praesent nec metus malesuada, sollicitudin arcu nec, phare tra felis. Ut sollicitudin ut lectus feugiat sodales. Aliquamerat volutpat. Quisque tempus pulvinar nibh sit amet varius exfrin gilla vitae. Sed pharetra diam ut leo efficitur eleifend.','crossfit-gym-pro'); ?></p>
                    </div>
                <div class="clear"></div>
              </div>
              
              <?php if( of_get_option('videosection') != '') { echo do_shortcode(of_get_option('videosection')); } ; ?>
              
            </div>
      <?php } ?>
    </div>
  </div>
  <!-- .container --> 
  
</section>
<!-- #pagesection2 -->
<?php } ?> 



<?php $hidefourbxsec = of_get_option('hidefourbxsec', '1'); ?>
<?php if($hidefourbxsec == ''){ ?>

<section id="pagearea">
  <div class="container">
  <div class="container-white">
    <?php if( of_get_option('topboxtitle',true) != '') { ?>
    	<h2 class="section_title"><?php echo of_get_option('topboxtitle'); ?> </h2>
    <?php } ?>
	<?php if( of_get_option('topboxsubtitle',true) != '') { ?>
    	<p class="pagethreesectitle"><?php echo of_get_option('topboxsubtitle'); ?> </p>
    <?php } ?>
    <div class="box-equal-height">
      <?php
			$title_arr = array( esc_attr__('Advanced Equipment','crossfit-gym-pro'), esc_attr__('Comfortable Area','crossfit-gym-pro'), esc_attr__('Parking Facility','crossfit-gym-pro'), esc_attr__('Swimming Pool','crossfit-gym-pro'), esc_attr__('Sport Nutrition','crossfit-gym-pro'));
			$boxArr = array();
			   if( of_get_option('box1',true) != '' ){
				$boxArr[] = of_get_option('box1',false);
			   }
			   if( of_get_option('box2',true) != '' ){
				$boxArr[] = of_get_option('box2',false);
			   }
			   if( of_get_option('box3',true) != '' ){
				$boxArr[] = of_get_option('box3',false);
			   }
			   if( of_get_option('box4',true) != '' ){
				$boxArr[] = of_get_option('box4',false);
			   }
			   if( of_get_option('box5',true) != '' ){
				$boxArr[] = of_get_option('box5',false);
			   }
			    if( of_get_option('box6',true) != '' ){
				$boxArr[] = of_get_option('box6',false);
			   }			   			  
						
			if (!array_filter($boxArr)) {
			for($fx=1; $fx<=5; $fx++) {
			?>
      <div class="top4box <?php if($fx % 5 == 0) { echo "last_column"; } ?>">
        <div class="topboxbg">
          <div class="thumbbx"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/services_icon<?php echo $fx; ?>.png" alt="" /></a></div>
          <div class="pagecontent"> 
          <a href="#"><h6><?php echo $title_arr[$fx-1]; ?></h6></a>
            <?php if( of_get_option('pageboxlength',true) != '') { ?>
              <p><?php echo wp_trim_words( get_the_content(), of_get_option('pageboxlength'), '' ); ?></p>
            <?php } ?>
            <?php /*?><p><?php _e('Posuere tellus imperdiet Curabitur viverra faucib eu semper', 'crossfit-gym-pro') ?></p>
            <?php if( of_get_option('readmorebutton',true) != '') { ?>
            	<a class="pagemore" href="#"><?php echo of_get_option('readmorebutton'); ?></a>
            <?php } ?><?php */?>
          </div>
        </div>
        <!-- topboxbg --> 
      </div>
      <?php 
			} 
			} else {			
				$box_column = array('no_column','one_column','two_column','three_column','four_column','five_column','six_column');
				$fx = 1;				
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $boxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));				
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
      <div class="top4box <?php echo $box_column[count($boxArr)]; ?> <?php if($fx % count($boxArr) == 0) { echo "last_column"; } ?>">
        <div class="topboxbg">
          <?php if( of_get_option('boximg'.$fx, true) != '') { ?>
          <div class="thumbbx"> <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo esc_url( of_get_option( 'boximg'.$fx, true )); ?>" / ></a></div>
          <?php } ?>
          <div class="pagecontent">
          	<a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>            
                      
            <?php /*?><?php if( of_get_option('readmorebutton',true) != '') { ?>
            <a class="pagemore" href="<?php the_permalink(); ?>"><?php echo of_get_option('readmorebutton'); ?></a>
            <?php } ?><?php */?>
          </div>
        </div>
      </div>
      <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_postdata();
			 }		
		 ?>
      <div class="clear"></div>
    </div>
    <!-- .area_row--> 
  </div>
  </div>
  
  <!-- .container --> 
</section>
<!-- #pagearea -->
<?php } ?>

<?php } ?>
