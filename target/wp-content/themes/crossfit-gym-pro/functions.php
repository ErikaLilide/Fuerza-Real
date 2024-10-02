<?php
/**
 * CrossFit Gym Pro functions and definitions
 *
 * @package CrossFit Gym Pro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_excerpt(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
//Excerpt limit function
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( ! function_exists( 'crossfit_gym_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function crossfit_gym_pro_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'crossfit-gym-pro', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_filter('widget_text', 'do_shortcode');
	add_image_size('homepage-thumb',240,145,true);	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'crossfit-gym-pro' ),
		'footer' => __( 'Footer Menu', 'crossfit-gym-pro' ),	
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // crossfit_gym_pro_setup
add_action( 'after_setup_theme', 'crossfit_gym_pro_setup' );

function crossfit_gym_pro_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on blog page sidebar', 'crossfit-gym-pro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on page sidebar', 'crossfit-gym-pro' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on footer', 'crossfit-gym-pro' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on footer', 'crossfit-gym-pro' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on footer', 'crossfit-gym-pro' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on footer', 'crossfit-gym-pro' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget-column-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Contact Page', 'crossfit-gym-pro' ),
		'description'   => __( 'Appears on contact page', 'crossfit-gym-pro' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<aside class="widget-contact %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="contactinfo-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'crossfit_gym_pro_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function crossfit_gym_pro_scripts() {	
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-assistant', '//fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap' );	
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-roboto', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' );	
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-opensans', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap' );	
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-playfair', '//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-poppins', '//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-BigShoulders', '//fonts.googleapis.com/css2?family=Big+Shoulders+Text:wght@100;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	wp_enqueue_style( 'crossfit-gym-pro-gfonts-teko', '//fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap' );

	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'crossfit-gym-pro-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'crossfit-gym-pro-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'crossfit-gym-pro-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'crossfit-gym-pro-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}
	if ( of_get_option('sectiontitlefontface', true) != '' ) {
		wp_enqueue_style( 'economicspro-gfonts-sectiontitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('sectiontitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}
	
	if ( of_get_option('footertitlefontface', true) != '' ) {
		wp_enqueue_style( 'economicspro-gfonts-sectiontitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('footertitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('sectionsubtitlefontface', true) != '' ) {
		wp_enqueue_style( 'economicspro-gfonts-sectiontitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('sectionsubtitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('slidetitlefontface', true) != '' ) {
		wp_enqueue_style( 'economicspro-gfonts-slidetitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidetitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('slidedesfontface', true) != '' ) {
		wp_enqueue_style( 'economicspro-gfonts-slidedes', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidedesfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}  	

	wp_enqueue_style( 'crossfit-gym-pro-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'crossfit-gym-pro-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'crossfit-gym-pro-base-style', get_template_directory_uri().'/css/default.css' );	
	if ( is_home() || is_front_page() ) { 
	wp_enqueue_style( 'crossfit-gym-pro-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'crossfit-gym-pro-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}	

	wp_enqueue_script( 'crossfit-gym-pro-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );	
	wp_enqueue_style( 'crossfit-gym-pro-fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'crossfit-gym-pro-animation', get_template_directory_uri().'/css/animation.css' );
	wp_enqueue_style( 'crossfit-gym-pro-hover', get_template_directory_uri().'/css/hover.css' );
	wp_enqueue_style( 'crossfit-gym-pro-hover-min', get_template_directory_uri().'/css/hover-min.css' );
	wp_enqueue_script( 'crossfit-gym-pro-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );	
	wp_enqueue_style( 'crossfit-gym-pro-testimonialslider-style', get_template_directory_uri().'/testimonialsrotator/js/tm-rotator.css' );	
	wp_enqueue_style( 'crossfit-gym-pro-responsive-style', get_template_directory_uri().'/css/responsive.css' );		
	wp_enqueue_style( 'crossfit-gym-pro-owl-style', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.css' );
	wp_enqueue_script( 'crossfit-gym-pro-owljs', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.js', array('jquery') );
	
	wp_enqueue_script( 'crossfit-gym-pro-counterup', get_template_directory_uri().'/counter/js/jquery.counterup.min.js', array('jquery') );
	wp_enqueue_script( 'crossfit-gym-pro-waypoints', get_template_directory_uri().'/counter/js/waypoints.min.js', array('jquery') );

	//Client Logo Rotator
	wp_enqueue_style( 'crossfit-gym-pro-flexiselcss', get_template_directory_uri().'/css/flexiselcss.css' );	
	wp_enqueue_script( 'crossfit-gym-pro-flexisel', get_template_directory_uri() . '/js/jquery.flexisel.js', array('jquery') );
	
	//Popup Video
	wp_enqueue_style( 'crossfit-gym-pro-youtube-popup', get_template_directory_uri().'/popupvideo/grt-youtube-popup.css' );	
	wp_enqueue_script( 'crossfit-gym-pro-youtube-popup', get_template_directory_uri() . '/popupvideo/grt-youtube-popup.js', array('jquery') );	
	
	
	if( of_get_option('scrollanimation',true) != true) {
		wp_enqueue_style( 'crossfit-gym-pro-animation-style', get_template_directory_uri().'/css/animation-style.css' );
		wp_enqueue_script( 'crossfit-gym-pro-custom-animation', get_template_directory_uri() . '/js/custom-animation.js', array('jquery') );	
	}
	wp_enqueue_style( 'dashicons', get_theme_file_uri() . '/css/dashicons.css', array(), '20200422' );	
	wp_enqueue_script( 'crossfit-gym-pro', get_template_directory_uri() . '/js/navigation.js', array(), '20200422', true );
	wp_localize_script( 'crossfit-gym-pro', 'ScreenReaderText', array(
		'expandMain'   => __( 'Open the main menu', 'crossfit-gym-pro' ),
		'collapseMain' => __( 'Close the main menu', 'crossfit-gym-pro' ),
		'expandChild'   => __( 'expand submenu', 'crossfit-gym-pro' ),
		'collapseChild' => __( 'collapse submenu', 'crossfit-gym-pro' ),
	) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
		// Add  corcle bar
	wp_enqueue_script('gra_circle_script', get_template_directory_uri().'/js/circle/jquery.easy-pie-chart.js', array('jquery') );
	wp_enqueue_script('gra_circle_custom_script', get_template_directory_uri().'/js/circle/custom.js', array('jquery') );
	wp_enqueue_style('gra_circle_styles', get_template_directory_uri().'/css/circle/jquery.easy-pie-chart.css');
	
}
add_action( 'wp_enqueue_scripts', 'crossfit_gym_pro_scripts' );

function media_css_hook(){ ?>

<script>

jQuery(window).bind('scroll', function() {
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		var navHeight = jQuery( window ).height() - 575;
		<?php if( of_get_option('headstick',true) == true) { ?>
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery(".header").addClass('fixed');
		}else {
			jQuery(".header").removeClass('fixed');
		}
		<?php } ?>
	}
});		
	
jQuery(window).load(function() {   
	jQuery('#clienttestiminials .owl-carousel').owlCarousel({
		loop:true,	
		autoplay:false <?php // echo of_get_option('testimonialsautoplay',true); ?>,
		autoplayTimeout: <?php echo of_get_option('testimonialsrotatingspeed',true); ?>,
		margin:0,
		nav:false,
		autoHeight:false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		dots: true,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
});

jQuery(document).ready(function() {
  
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });
 
});
</script>

<?php if ( is_home() || is_front_page() ) { ?>        
<script>
		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});
</script>
<?php } ?>


<?php     
}
add_action('wp_head','media_css_hook'); 


function crossfit_gym_pro_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
		}
		echo "<style>";		
		if ( of_get_option('bodyfontcolor', true) != '' ) {
			echo 'body, .contact-form-section .address, .accordion-box .acc-content, .woocommerce table.shop_table th, .woocommerce-page table.shop_table th{color:'. esc_html( of_get_option('bodyfontcolor', true) ) .';}';
		}
		if( of_get_option('bodyfontface', true) != '' || of_get_option('bodyfontsize',true) != ''){
			echo "body, textarea, input{font-family:".of_get_option('bodyfontface')."; font-size:".of_get_option('bodyfontsize',true).";}";
		}
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != '' || of_get_option('logobgcolor',true) != ''){
			echo ".logo h1 {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true).";font-size:".of_get_option('logofontsize',true)."}";
			echo '.logo, .logo:before, .logo:after{background:'. esc_html( of_get_option('logobgcolor', true) ) .';}';		
		}
		if( of_get_option('logotaglinecolor',true) != '' ){
			echo ".tagline{color:".of_get_option('logotaglinecolor',true).";}";
		}
		if( of_get_option('logoheight',true) != '' ){
			echo ".logo img{height:".of_get_option('logoheight',true)."px;}";
		}				
		$headerhex = of_get_option('headerbgcolor',true); 
		list($r,$g,$b) = sscanf($headerhex,'#%02x%02x%02x');
		if ( of_get_option('headerbgcolor', true) != '' ) {
			echo ".header{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('headerbgpacity',true).");}";
			echo '.header.fixed{background:'. esc_html( of_get_option('headerbgcolor', true) ) .';}';
		}	
		if ( of_get_option('headerbgcolor', true) != '' ) {
			echo "@media screen and (max-width: 1023px){.toggled .menu li{ background:".of_get_option('headerbgcolor', true)."; }}";
		}
		
		$headerhex = of_get_option('headertopbgcolor',true); 
		list($r,$g,$b) = sscanf($headerhex,'#%02x%02x%02x');
		if ( of_get_option('headertopbgcolor', true) != '' ) {
			echo ".pp_topstrip{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('headerbgpacity',true).");}";
		}	
		
		if ( of_get_option('headertopfontcolor', true) != '' ) {
			echo ".infobox, .infobox a{ color:".of_get_option('headertopfontcolor',true).";}";
		}

		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.site-navigation ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif; font-size:'.of_get_option('navfontsize',true).'}';
		}		
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.site-navigation ul li a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}
 	
		/*if ( of_get_option('navactivefontcolor', true) != '' ) {
			echo '
			.site-navigation ul ul li a:hover,
			.site-navigation ul li ul li.current-page-parent > a, 
			.site-navigation ul li ul li.current_page_item > a
			{color:'. esc_html( of_get_option('navactivefontcolor', true) ) .';}';
		} */

		/*this hover color*/
		if ( of_get_option('navactivefontcolor', true) != '' ) {
			echo '
			.site-navigation .menu ul a:hover,
			.site-navigation .menu a:hover,
			.site-navigation .menu ul a:focus,
			.site-navigation ul > li.current_page_item > a,
			.site-navigation ul > li.current-menu-ancestor > a,
			.site-navigation ul li.current_page_item ul.sub-menu li a:hover, 
			.site-navigation ul li.current-menu-parent ul.sub-menu li a:hover,
			.site-navigation ul li.current-menu-parent ul.sub-menu li ul.sub-menu li a:hover,
			.site-navigation ul li.current-menu-parent ul.sub-menu li.current_page_item a, 
			.site-navigation ul ul li a:hover,
			.site-navigation ul li ul li.current-page-parent > a, 
			.site-navigation ul li ul li.current_page_item > a {color:'. esc_html( of_get_option('navactivefontcolor', true)).';}';
		}
		
		if( of_get_option('sectiontitlefontface',true) != '' || of_get_option('sectitlesize',true) != '' || of_get_option('sectitlecolor',true) != '' ){
			echo "h2.section_title, .sec_content_main_title{ font-family:".of_get_option('sectiontitlefontface',true)."; font-size:".of_get_option('sectitlesize',true)."; color:".of_get_option('sectitlecolor',true)."; }";
			echo ".pricing_table .th, .price_col .price{ font-family:".of_get_option('sectiontitlefontface',true)."; }";
		}		
		
		if( of_get_option('secsubtitlesize',true) != '' || of_get_option('sectionsubtitlefontface',true) != ''){
			echo "h4.sectionsubtitle, .sec_content_sub_title, span.sub-title-head{ font-size:".of_get_option('secsubtitlesize',true)."; font-family:".of_get_option('sectionsubtitlefontface',true)."; }";
		}
		
		if( of_get_option('sectiontitlefontface',true) != ''  ){
			echo ".welcome_contentcolumn h3 span{ font-family:".of_get_option('sectiontitlefontface',true)."; }";
		}
		if( of_get_option('servicessection',true) != ''  ){
			echo "#pagearea { background:".of_get_option('servicessection',true).";}";
		}
		
		if( of_get_option('welcomessection',true) != ''  ){
			echo "#welcomearea { background:".of_get_option('welcomessection',true).";}";
		}
		if( of_get_option('pagesectiontwo',true) != ''  ){
			echo "#pagesection2{ background:".of_get_option('pagesectiontwo',true).";}";
		}
		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover, .slide_toggle a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}			
		if(  of_get_option('footertitlefontface',true) != '' || of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != ''  ){
			echo ".footer h5{font-size:".of_get_option('ftfontsize', true).";  font-family:".of_get_option('footertitlefontface',true)."; color:".of_get_option('foottitlecolor', true)."; }";
		}										
		if( of_get_option('copycolor', true) != ''){
			echo ".copyright-txt{color:".of_get_option('copycolor',true)."}";
		}
		if( of_get_option('designcolor', true) != ''){
			echo ".design-by{color:".of_get_option('designcolor',true)."}";
		}		
 
 		if( of_get_option('btntxtcolor', true) != ''){
			echo ".button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .pagination ul li span, .pagination ul li a, .headertop .right a, .wpcf7 form input[type='submit'], #sidebar .search-form input.search-submit{ color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btntxthvcolor', true) != '' ){
			echo ".button:hover, #commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover,.headertop .right a:hover, .wpcf7 form input[type='submit']:hover, a.pagemore:hover:after{ color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}		
		if( of_get_option('btntxtcolor', true) != ''){
			echo "a.morebutton, .column-3.bgcolor a.morebutton:hover{ color:". of_get_option('btntxtcolor', true) ." !important; }";
		}
		if( of_get_option('btntxthvcolor', true) != '' ){
			echo "a.morebutton:hover{ color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}
		
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != ''){
			echo "a.buttonstyle1{background-color:".of_get_option('btnbghvcolor',true)."; color:". of_get_option('btntxthvcolor', true) ."; }";
		}
		if( of_get_option('btntxtcolor', true) != '' ){
			echo "a.buttonstyle1:hover{ color:". esc_html( of_get_option('btntxtcolor', true) ) .";}";
		}
			
		if ( of_get_option('widgetboxbgcolor', true) != '' || of_get_option('widgetboxfontcolor', true) != '' ) {
		echo "#sidebar .search-form input.search-field{ background-color:".of_get_option('widgetboxbgcolor', true)."; color:".of_get_option('widgetboxfontcolor', true).";  }";
		}			
		if ( of_get_option('wdgttitleccolor', true) != '' || of_get_option('sidebarfontsize', true) != '' ) {
			echo "h3.widget-title{ color:".of_get_option('wdgttitleccolor', true)."; font-size:".of_get_option('sidebarfontsize', true).";}";
		}				
		if ( of_get_option('footerbgcolor', true) != '' || of_get_option('footdesccolor', true) != '' ) {
		echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; color:".of_get_option('footdesccolor', true).";}";
		echo ".footer ul li a{color:".of_get_option('footdesccolor', true).";}";
		}		
		if ( of_get_option('footdesccolor', true) != '' ) {
			echo ".contactdetail a{color:".of_get_option('footdesccolor', true)."; }";
		}			
			
		
		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		
		if( of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li{border-color:".of_get_option('sidebarliaborder',true)."}";
		}	
		if( of_get_option('sidebarfontcolor',true) != '' ){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true)."; }";
			echo "#sidebar ul li:before{color:".of_get_option('sidebarfontcolor',true)." !important; }" ;
		}		
		
		if ( of_get_option('slidetitlefontface', true) != '' || of_get_option('slidetitlecolor', true) != '' || of_get_option('slidetitlefontsize', true) != '') {
		echo ".nivo-caption h2{ font-family:".of_get_option('slidetitlefontface', true)."; color:".of_get_option('slidetitlecolor', true)."; font-size:".of_get_option('slidetitlefontsize', true).";  }";
		}
		
		if ( of_get_option('slidedesfontface', true) != '' || of_get_option('slidedesccolor', true) != '' || of_get_option('slidedescfontsize', true) != '') {
		echo ".nivo-caption p{font-family:".of_get_option('slidedesfontface', true)."; color:".of_get_option('slidedesccolor', true)."; font-size:".of_get_option('slidedescfontsize', true).";}";
		}
		
			
		if ( of_get_option('copylinkshover', true) != '' || of_get_option('copybgcolor', true) != '' ) {
			echo ".copyright-wrapper a, .copyright-wrapper a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
			echo ".copyright-wrapper{ background: ".of_get_option('copybgcolor', true)."; }";
		}	
		
		if ( of_get_option('togglemenucolor', true) != '' ) {
		echo ".menu-toggle{ color:".of_get_option('togglemenucolor', true)."; }";
		}		
		
/* Heading */
		if( of_get_option('headfontface', true) != '' ){
			echo "h1, h2, h3, h4, h5, h6{ font-family:".of_get_option('headfontface',true)."; }";
		}		
		if ( of_get_option('h1fontsize', true) != '' || of_get_option('h1fontcolor', true) != '' ) {
			echo "h1{ font-size:".of_get_option('h1fontsize', true)."; color:".of_get_option('h1fontcolor', true).";}";
		}
		if ( of_get_option('h2fontsize', true) != '' || of_get_option('h2fontcolor', true) != '' ) {
			echo "h2{ font-size:".of_get_option('h2fontsize', true)."; color:".of_get_option('h2fontcolor', true).";}";
		}		
		if ( of_get_option('h3fontsize', true) != '' || of_get_option('h3fontcolor', true) != '' ) {
			echo "h3{ font-size:".of_get_option('h3fontsize', true)."; color:".of_get_option('h3fontcolor', true).";}";
		}		
		if ( of_get_option('h4fontsize', true) != '' || of_get_option('h4fontcolor', true) != '' ) {
			echo "h4{ font-size:".of_get_option('h4fontsize', true)."; color:".of_get_option('h4fontcolor', true).";}";
		}		
		if ( of_get_option('h5fontsize', true) != '' || of_get_option('h5fontcolor', true) != '' ) {
			echo "h5{font-size:".of_get_option('h5fontsize', true)."; color:".of_get_option('h5fontcolor', true).";}";
		}		
		if ( of_get_option('h6fontsize', true) != '' || of_get_option('h6fontcolor', true) != '' ) {
			echo "h6{ font-size:".of_get_option('h6fontsize', true)."; color:".of_get_option('h6fontcolor', true).";}";
		}
/* Custom editable */
		if ( of_get_option('socialcolorbg', true) != '' || of_get_option('socialcolor', true) != ''  ) {
			echo ".social-icons a{ color:".of_get_option('socialcolor', true)."; background:".of_get_option('socialcolorbg', true).";}";
			echo ".social-icons a:hover{ color:".of_get_option('socialcolorhover', true)."; }";
 		}		
/*
		$allhex = of_get_option('sldcaptionbg',true); 
		list($r,$g,$b) = sscanf($allhex,'#%02x%02x%02x');
		if ( of_get_option('sldcaptionbg', true) != '' ) {
			echo ".slider-main:before{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('sldcaptionbgpacity',true).");}";
		} */
				
		$sliderarrowhex = of_get_option('sldarrowbg',true); 
		list($r,$g,$b) = sscanf($sliderarrowhex,'#%02x%02x%02x');
		if ( of_get_option('sldarrowbg', true) != '' ) {
			echo ".nivo-directionNav a{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('sldarrowopacity',true).");}";
		}	
		
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo ".holderwrap h5{ color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo ".holderwrap h5::after{ background-color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}
		//Testimonials CSS
		if ( of_get_option('testidotsbgcolor', true) != '' ) {
			echo ".owl-controls .owl-dot{ background-color:".of_get_option('testidotsbgcolor', true)."; }";
		}		
				
		if ( of_get_option('footerpoststitlecolor', true) != '' ) {
			echo "ul.recent-post li a{ color:".of_get_option('footerpoststitlecolor', true)."; }";
		}
		
		//Color scheme for one click background color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".logo-and-menu, a.morebutton, .project-content, #commentform input#submit,    
			input.search-submit, 
			.post-password-form input[type='submit'], p.read-more a, .pagination ul li span, .pagination ul li a, .headertop .right a, .wpcf7 form input[type='submit'], #sidebar .search-form input.search-submit, .offer-1-column .offimgbx, ul.portfoliofilter li a.selected,  ul.portfoliofilter li a:hover, ul.portfoliofilter li:hover a, .holderwrap, .pricing_table .tf a, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover, .headertop .right a:hover, .wpcf7 form input[type='submit']:hover, .shopnow:hover,	.toggle a,	a.buttonstyle1:hover, .shopnow:hover, .hvr-sweep-to-right::before, .newsletter-form i, .column-3.bgcolor, .toggled .menu-toggle, #countdown1, #countdown2, #countdown3, #countdown4, #countdown5, #countdown6, #countdown7, #countdown8, #countdown9, #countdown10, .social-icons a:hover, .skillbackgroundwp, #section3 .videobox .playbtn, .news-box .news-thumb, .news-box .poststyle, .owl-controls .owl-dot.active, .woocommerce ul.products li .product_type_simple, .woocommerce ul.products li .product_type_external, .woocommerce ul.products li .product_type_grouped, .woocommerce ul.products li.product .product-thumb, a.added_to_cart, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .woocommerce ul.products li.product .button, .nivo-caption .button, .whychooseus-icon, .whychooseus-icon:after, .our_classes_thumb, #section2 .videobox, .fitness-yoga-icon, .special-service .special-service-thumb{ background-color:".of_get_option('colorscheme', true)."; }";
		}
		
		
		
		/*$allhex = of_get_option('colorscheme',true); 
		list($r,$g,$b) = sscanf($allhex,'#%02x%02x%02x');
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".special-service .special-service-content{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('servicesbgpacity',true).");}";
		}	*/
				
		//Color scheme for one click font color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".sub-title-head, .sec_content_main_title .sub-title-head, .welcome_contentcolumn .sub-title-head, .button, .tabs-wrapper ul.tabs li a.selected, .accordion-box h2.active, .fitness-yoga:hover .fitness-yoga-content h3, 
			a, .ai-wrap .ai-btn:hover,					
			.cntbutton,
			.AppLink:hover,			
			.contactdetail a:hover, 		
			div.recent-post a:hover,
			#sidebar ul li::before,			
			.pagemore:hover,
			h2.section_title span,
			.welcome_contentcolumn h3 span, 
			.slide_toggle a, 
			ul.recent-post li .footerdate,
			#sidebar ul li a:hover,
			.teammember-content span,
			.teammember-list:hover h5.title a,			
			.post-title a:hover,
			.pp_topstrip .social-icons a:hover,			
			.bloggridlayout h3.post-title a:hover, 
			.header-top .left span, a.borderbutton:hover,
			#section11 a.borderbutton:hover, .woocommerce div.product p.price, .woocommerce div.product span.price, .videobox .playbtn:after, a.pagemore, a.pagemore:hover, .top4box:hover h6, .contactinfo h5, .nivo-caption h2 span, .whychooseus_box:hover h3, .our-services:hover .services-title h3, .our-achivement:hover .achivement-bg h4, .our_classes_box:hover .info h6, 
.our_classes_box:hover .info .classes-readmore h5, .footer ul li a:hover, .footer ul li.current_page_item a{ color:".of_get_option('colorscheme', true)."; }";
		}
		
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".ai-wrap .ai-btn:hover svg{ fill:".of_get_option('colorscheme', true).";}";
			echo "span.post-by-admin, span.post-by-admin a, .sub-title-head, .special-service:hover .special-service-content h3{ color:".of_get_option('colorscheme', true)." !important;}";
		}	
		
		//Color scheme for one click border color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo "ul.portfoliofilter li a.selected, .teammember-list .thumnailbx-border, 
			ul.portfoliofilter li a:hover,
			ul.portfoliofilter li:hover a,					
			a.borderbutton:hover,
			.our-achivement:hover .achivement-bg, .weight-lose-img:after, 
			.pagemore:hover, ul.clientlogos li:hover:after, h3.widget-title, .pagesection2_content h2.section_title, .price_col .price, .footer h5:after{ border-color:".of_get_option('colorscheme', true)."; }";
		}
		
		if ( of_get_option('shopbtnbgcolor', true) != '' ) {
			echo ".shopnow{ background-color:".of_get_option('shopbtnbgcolor', true).";}";
		}
		
		if ( of_get_option('colorscheme', true) != '' ) {
			echo "@media screen and (min-width: 1024px){.site-navigation .menu ul{ background:".of_get_option('colorscheme', true)."; }}";
		}
		
		if ( of_get_option('allsitehovercolor', true) != '' ) {
			echo ".woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .donatenow, .button:hover, .nivo-caption .button:hover,
a.morebutton:hover,
#commentform input#submit:hover, 
input.search-submit:hover, 
.post-password-form input[type=submit]:hover, 
p.read-more a:hover, 
.pagination ul li .current, 
.pagination ul li a:hover,
.headertop .right a:hover, 
.wpcf7 form input[type='submit']:hover, .column-3.bgcolor a.morebutton:hover, .toggled .menu .toggled-on > .sub-menu, .menu-toggle, .nivo-controlNav a.active, .teammember-list .thumnailbx, .nivo-directionNav a:hover, .rounded-circle-title, 
.woocommerce ul.products li .product_type_simple:hover, .woocommerce ul.products li .product_type_external:hover, .woocommerce ul.products li .product_type_grouped:hover, .woocommerce ul.products li.product .button:hover{ background-color:".of_get_option('allsitehovercolor', true)."; }";
		}	
		
		if ( of_get_option('allsitehovercolor', true) != '' ) {
			echo ".campaign-detail .campaign-detail-thumb, 
			.album-released-info a.button2:hover { border-color:".of_get_option('allsitehovercolor', true).";}";
			
			echo "ul.list-style li:before, ul.list-style li a:hover, .counterlist h3.counter, .contactinfo .contactinfo-icon, .services-title h5 strong{ color:".of_get_option('allsitehovercolor', true).";}";
		}
 
		echo "</style>";
	}
}
add_action('wp_head', 'crossfit_gym_pro_custom_head_codes');


function crossfit_gym_pro_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

function crossfit_gym_pro_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}
// get slug by id
function crossfit_gym_pro_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

/**

 * Include the Plugin_Activation class.

 */

require_once dirname( __FILE__ ) . '/class-plugin-activation.php';
function crossfit_gym_pro_register_required_plugins() {

	$plugins = array(				
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		
	array(
			'name'      => 'Photo Gallery',
			'slug'      => 'foogallery',
			'required'  => false,
		),
		
		array(
			'name'      => 'Photo Gallery Lightbox',
			'slug'      => 'foobox-image-lightbox',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'grc-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'crossfit_gym_pro_register_required_plugins' );

 /**
 * Filter the categories archive widget to add a span around post count
 */
function smittenkitchen_cat_count_span( $links ) {
	$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'wp_list_categories', 'smittenkitchen_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
function smittenkitchen_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'get_archives_link', 'smittenkitchen_archive_count_span' );


function custom_login_redirect($redirect_to, $request, $user) {
    // Redirige a la página de inicio o a la dashboard según el rol del usuario
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url();
        } else {
            return home_url();
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);
