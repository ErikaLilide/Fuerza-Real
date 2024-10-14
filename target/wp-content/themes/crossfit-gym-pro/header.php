<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Travel Trip Pro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="all" />
<![endif]-->
<?php 
	wp_head(); 
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	if( !get_option( $themename ) ) {
	require get_template_directory() . '/index-default.php';
	exit;
	}
?>
</head>

<body id="top" <?php body_class(); ?>>

<!--Preloader-->
<div class="cover-body"
  <div id="preloader" class="preloader">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    <div class="spinner">
    </div>
    <img class= "icon" src="http://192.168.1.24:8080/wp-content/uploads/2024/07/FR_Icon_Amarillo-e1721456778978.png" />
  </div>
</div>

$(document).ready(function() {
	
	setTimeout(function() {
		$('#preloader').addClass('loaded');
	}, 2500);
	
});


<div class="sitewrapper <?php if( of_get_option('boxlayout', true) != '' ) { ?>boxlayout<?php } ?>">
<div class="header">
  <?php if( of_get_option('headinfodata',true) != true) { ?>
  <div class="container">
    <div class="pp_topstrip">
      <div class="top-align-right">
        <?php if( of_get_option('headeremail',true) != ''){ ?>
        	<div class="infobox"><i class="far fa-envelope"></i> <?php echo of_get_option('headeremail'); ?></div>
        <?php } ?>
        <?php if( of_get_option('headerphone',true) != ''){ ?>
        	<div class="infobox"><i class="fas fa-phone fa-rotate-90"></i> <?php echo of_get_option('headerphone'); ?></div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div><!-- .pp_topstrip--> 
  </div><!-- .container-->
  <?php } ?>
  
  
  <div class="logo-and-menu">
    <div class="container">
      <div class="logo">
        <?php if( of_get_option( 'logo', true ) != '' ) { ; ?>
        <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url( of_get_option( 'logo', true )); ?>" / ></a>
        <?php } ?>
        <?php if( of_get_option('hide_titledesc', true) != '' ) { ?>
        <div class="site-branding-text"> <a href="<?php echo esc_url(home_url('/')); ?>">
          <h1>
            <?php bloginfo('name'); ?>
          </h1>
          </a> <span class="tagline">
          <?php bloginfo( 'description' ); ?>
          </span> </div>
        <?php } ?>
      </div>
      <!-- .logo -->
      
      <div class="mainmenu-right-area">
        <div class="mainmenu">
          <div id="topnavigator" role="banner">
            <button class="menu-toggle" aria-controls="main-navigation" aria-expanded="false" type="button"> <span aria-hidden="true">
            <?php if( of_get_option('menuwordchange',true) != '') { ?>
            <?php echo of_get_option('menuwordchange'); ?>
            <?php } ?>
            </span> <span class="dashicons" aria-hidden="true"></span> </button>
            <nav id="main-navigation" class="site-navigation primary-navigation" role="navigation">
              <?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'ul',
				'menu_id' => 'primary',
				'menu_class' => 'primary-menu menu',
			) );
			?>
            </nav>
            <!-- #site-navigation --> 
          </div>
          <!-- #topnavigator --> 
        </div>
        <!-- .mainmenu--> 
         <div class="clear"></div>
      </div>
 
      <div class="clear"></div>
    </div>
    <!-- .container--> 
  </div>
  <!--logo-and-menu--> 
</div>
<!-- .header -->

<?php if ( is_home() || is_front_page() ) { ?>
<?php if( of_get_option('customslider',true) == ''){ ?>
<div class="slider-main">
  <?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<11; $i++) {
				if ( of_get_option('slide'.$i, true) != "" ) {
					$imgSrc 	= of_get_option('slide'.$i, true);
					$imglink	= of_get_option('slidelink'.$i, true);
					$slidebutton	= of_get_option('slidebutton'.$i, true);
					$slideurl	= of_get_option('slideurl'.$i, true);
					if ( strlen($imgSrc) > 10 ) {
						$slAr[$m]['image_src'] = of_get_option('slide'.$i, true);
						$slAr[$m]['image_button'] = of_get_option('slidebutton'.$i, true);
						$slAr[$m]['image_url'] = of_get_option('slidelink'.$i, true);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
  <div id="slider" class="nivoSlider">
	<?php 
    foreach( $slAr as $sv ){
        $n++; ?>
    	<img src="<?php echo esc_url($sv['image_src']); ?>" alt="" title="<?php echo '#slidecaption'.$n ; ?>"/>
    	<?php
        $slideno[] = $n;
    }
    ?>
  </div>
  <?php foreach( $slideno as $sln ){ ?>
  <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
    <?php if( of_get_option('slidetitle'.$sln, true) != '' ){ ?>
    <h2><?php echo of_get_option('slidetitle'.$sln, true); ?></h2>
    <?php } ?>
    <?php if( of_get_option('slidedesc'.$sln, true) != '' ){ ?>
    <p><?php echo do_shortcode(of_get_option('slidedesc'.$sln, true)); ?></p>
    <?php } ?>
    <?php if( of_get_option('slideurl'.$sln, true) != '' ){ ?>
    <a class="button hvr-bounce-out" href="<?php echo of_get_option('slideurl'.$sln, true); ?>"> <?php echo of_get_option('slidebutton'.$sln, true); ?> </a>
    <?php } ?>
  </div>
  <?php } } ?>
</div>
<!-- slider -->

<?php } else {
 $short_code = of_get_option('customslider');
 echo do_shortcode($short_code);
 } ?>
<?php } else { 
		if( of_get_option('innerpagebanner',true) == '') { $cls = 'style="display:none"'; } else { $cls = ''; }
	?>
<div class="innerbanner" <?php echo $cls; ?>>
  <?php
			$header_image = get_header_image();
			
			if( is_single() || is_archive() || is_category() || is_author()|| is_search()) { 
				if(!empty($header_image)){
					echo '<img src="'.esc_url( $header_image ).'" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="" />';
				} elseif( of_get_option('innerpagebanner',true) != '') { 
        			echo '<img src="'.esc_url( of_get_option( 'innerpagebanner', true )).'" alt="">';
				}
			}
			elseif( has_post_thumbnail() ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$thumbnailSrc = $src[0];
				echo '<img src="'.$thumbnailSrc.'" alt="">';
			} 
			elseif ( ! empty( $header_image ) ) {
				echo '<img src="'.esc_url( $header_image ).'" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="" />';
            }	
			elseif( of_get_option('innerpagebanner',true) != '') { 
            	echo '<img src="'.esc_url( of_get_option( 'innerpagebanner', true )).'" alt="">';
		    } ?>
</div>
<?php }	?>
<?php include ('section-pagecolumn.php'); ?>
