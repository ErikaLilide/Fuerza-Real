<?php
/**
 * @package CrossFit Gym Pro
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('crossfit_gym_pro_optionsframework_custom_scripts', 'crossfit_gym_pro_optionsframework_custom_scripts');
function crossfit_gym_pro_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}

// get_the_content format text
function get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function the_content_format( $str ){
	echo get_the_content_format( $str );
}

function is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}

//[clear]
function clear_func() {
	$clr = '<div class="clear"></div>';
	return $clr;
}
add_shortcode( 'clear', 'clear_func' );


//[column_content]Your content here...[/column_content]
function column_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => '',	
	), $atts ) );
	$colPos = strpos($type, '_last');
	if($colPos === false){
		$cnt = '<div class="'.$type.'">'.do_shortcode($content).'</div>';
	}else{
		$type = substr($type,0,$colPos);
		$cnt = '<div class="'.$type.' last_column">'.do_shortcode($content).'</div>';
	}
	return $cnt;
}
add_shortcode( 'column_content', 'column_content_func' );


//[hr]
function hrule_func() {
	$hrule = '<div class="hr"></div>';
	return $hrule;
}
add_shortcode( 'hr', 'hrule_func' );

//[hr_top]
function back_to_top_func() {
	$back_top = '<div id="back-top">
		<a title="Top of Page" href="#top"><span></span></a>
	</div>';
	return $back_top;
}
add_shortcode( 'back-to-top', 'back_to_top_func' );


// [searchform]
function searchform_shortcode_func( $atts ){
	return get_search_form( false );
}
add_shortcode( 'searchform', 'searchform_shortcode_func' );

// remove excerpt more
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// get post categories function
function getPostCategories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'crossfit-gym-pro' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = ''.trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

// custom post type for Testimonials
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => __( 'Testimonial','crossfit-gym-pro'),
		'singular_name'      => __( 'Testimonial','crossfit-gym-pro'),
		'add_new'            => __( 'Add Testimonial','crossfit-gym-pro'),
		'add_new_item'       => __( 'Add New Testimonial','crossfit-gym-pro'),
		'edit_item'          => __( 'Edit Testimonial','crossfit-gym-pro'),
		'new_item'           => __( 'New Testimonial','crossfit-gym-pro'),
		'all_items'          => __( 'All Testimonials','crossfit-gym-pro'),
		'view_item'          => __( 'View Testimonial','crossfit-gym-pro'),
		'search_items'       => __( 'Search Testimonials','crossfit-gym-pro'),
		'not_found'          => __( 'No testimonials found','crossfit-gym-pro'),
		'not_found_in_trash' => __( 'No testimonials found in the Trash','crossfit-gym-pro'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Testimonials',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-quote',
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );

// add meta box to testimonials
add_action( 'admin_init', 'my_testimonials_admin_function' );
function my_testimonials_admin_function() {
    add_meta_box( 'testimonials_meta_box',
        'Testimonials Info',
        'display_testimonials_meta_box',
        'testimonials', 'normal', 'high'
    );
}
// add meta box form to testimonials
function display_testimonials_meta_box( $testimonials ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $testimonials->ID, 'designation', true ) );   
    ?>
    <table width="100%">
        <tr>
            <td width="20%">client info (designation) </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>      
    </table>
    <?php      
}
// save testimonials meta box form data
add_action( 'save_post', 'add_testimonials_fields_function', 10, 2 );
function add_testimonials_fields_function( $testimonials_id, $testimonials ) {
    // Check post type for testimonials
    if ( $testimonials->post_type == 'testimonials' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $testimonials_id, 'designation', $_POST['designation'] );
        }        
    }
}

//Testimonials function
function testimonials_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="clienttestiminials"><div class="owl-carousel">';	
		while ( have_posts() ) : the_post();
		if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
		}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
			<div class="item">
				<div class="arrow_box">
					<div class="designation_box">
						<div class="tmthumb"><img src="'.$imgUrl.'" alt=" " /></div>
						<h4>'.get_the_title().'</h4>
						<h6>'.( ($designation!='') ? '' : '').' '.( ($designation!='') ? ''.$designation.'' : '').'</h6>						
						<p>'.wp_trim_words( get_the_content(), of_get_option('testimonialsexcerptlength'), '' ).'</p>
						<div class="clear"></div>	
					</div>
				</div>
			</div>';
		endwhile;
		 $testimonialoutput .= '</div></div>';
	else:
	  $testimonialoutput = '<p style="text-align:center;">client testimonials is empty</p>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'testimonials', 'testimonials_output_func' );


//custom post type for Our Team
function my_custom_post_team() {
	$labels = array(
		'name'               => __( 'Our Team', 'crossfit-gym-pro' ),
		'singular_name'      => __( 'Our Team', 'crossfit-gym-pro' ),
		'add_new'            => __( 'Add New', 'crossfit-gym-pro' ),
		'add_new_item'       => __( 'Add New Team Member', 'crossfit-gym-pro' ),
		'edit_item'          => __( 'Edit Team Member', 'crossfit-gym-pro' ),
		'new_item'           => __( 'New Member', 'crossfit-gym-pro' ),
		'all_items'          => __( 'All Members', 'crossfit-gym-pro' ),
		'view_item'          => __( 'View Members', 'crossfit-gym-pro' ),
		'search_items'       => __( 'Search Team Members', 'crossfit-gym-pro' ),
		'not_found'          => __( 'No Team members found', 'crossfit-gym-pro' ),
		'not_found_in_trash' => __( 'No Team members found in the Trash', 'crossfit-gym-pro' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Team'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Team',
		'public'        => true,
		'menu_position' => null,
		'menu_icon'		=> 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array('slug' => 'our-team'),
		'has_archive'   => true,
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'my_custom_post_team' );

// add meta box to team
add_action( 'admin_init', 'my_team_admin_function' );
function my_team_admin_function() {
    add_meta_box( 'team_meta_box',
        'Member Info',
        'display_team_meta_box',
        'team', 'normal', 'high'
    );
}
// add meta box form to team
function display_team_meta_box( $team ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $team->ID, 'designation', true ) );
    $facebook = get_post_meta( $team->ID, 'facebook', true );
	$facebooklink = esc_url( get_post_meta( $team->ID, 'facebooklink', true ) );
    $twitter = get_post_meta( $team->ID, 'twitter', true );
	$twitterlink = esc_url( get_post_meta( $team->ID, 'twitterlink', true ) );
    $linkedin = get_post_meta( $team->ID, 'linkedin', true );
	$linkedinlink = esc_url( get_post_meta( $team->ID, 'linkedinlink', true ) );
	$pint = get_post_meta( $team->ID, 'google', true );
	$googlelink = esc_url( get_post_meta( $team->ID, 'googlelink', true ) );
    $dribbble = get_post_meta( $team->ID, 'dribbble', true );
	$dribbblelink = get_post_meta( $team->ID, 'dribbblelink', true );
    ?>
    <table width="100%">
        <tr>
            <td width="20%">Designation </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social link 1</td>
            <td width="40%"><input type="text" name="facebook" value="<?php echo $facebook; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="facebooklink" value="<?php echo $facebooklink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 2</td>
            <td width="40%"><input type="text" name="twitter" value="<?php echo $twitter; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="twitterlink" value="<?php echo $twitterlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 3</td>
            <td width="40%"><input type="text" name="linkedin" value="<?php echo $linkedin; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="linkedinlink" value="<?php echo $linkedinlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 4</td>
            <td width="40%"><input type="text" name="dribbble" value="<?php echo $dribbble; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="dribbblelink" value="<?php echo $dribbblelink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 5</td>
            <td width="40%"><input type="text" name="google" value="<?php echo $pint; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="googlelink" value="<?php echo $googlelink; ?>" /></td>
        </tr>
        <tr>
        	<td width="100%" colspan="3"><label style="font-size:12px;"><strong>Note:</strong> Icon name should be in lowercase without space. More social icons can be found at: <a href="https://fontawesome.com/icons" target="_blank">https://fontawesome.com/icons</a></label> </td>
        </tr>
    </table>
    <?php                     
}
// save team meta box form data
add_action( 'save_post', 'add_team_fields_function', 10, 2 );
function add_team_fields_function( $team_id, $team ) {
    // Check post type for testimonials
    if ( $team->post_type == 'team' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $team_id, 'designation', $_POST['designation'] );
        }
        if ( isset($_POST['facebook']) ) {
            update_post_meta( $team_id, 'facebook', $_POST['facebook'] );
        }
		if ( isset($_POST['facebooklink']) ) {
            update_post_meta( $team_id, 'facebooklink', $_POST['facebooklink'] );
        }
        if ( isset($_POST['twitter']) ) {
            update_post_meta( $team_id, 'twitter', $_POST['twitter'] );
        }
		if ( isset($_POST['twitterlink']) ) {
            update_post_meta( $team_id, 'twitterlink', $_POST['twitterlink'] );
        }
        if ( isset($_POST['linkedin']) ) {
            update_post_meta( $team_id, 'linkedin', $_POST['linkedin'] );
        }
		if ( isset($_POST['linkedinlink']) ) {
            update_post_meta( $team_id, 'linkedinlink', $_POST['linkedinlink'] );
        }
        if ( isset($_POST['dribbble']) ) {
            update_post_meta( $team_id, 'dribbble', $_POST['dribbble'] );
        }
		if ( isset($_POST['dribbblelink']) ) {
            update_post_meta( $team_id, 'dribbblelink', $_POST['dribbblelink'] );
        }
		if ( isset($_POST['google']) ) {
            update_post_meta( $team_id, 'google', $_POST['google'] );
        }
		if ( isset($_POST['googlelink']) ) {
            update_post_meta( $team_id, 'googlelink', $_POST['googlelink'] );
        }
    }
}

function our_teamposts_func( $atts ) {
   extract( shortcode_atts( array(
		'show' => '',
	), $atts ) );
	  extract( shortcode_atts( array( 'show' => '',), $atts ) ); 
	$bposts = '<div id="team_members">';
	$args = array( 'post_type' => 'team', 'posts_per_page' => $show, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
	query_posts( $args );
	$posts = query_posts( $args );
	$count = count($posts);	
	$n = 0;
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
			$n++; if( $n%2 == 0 ) $nomargn = ' lastcols'; else $nomargn = '';
			$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );
			$facebook = get_post_meta( get_the_ID(), 'facebook', true );
			$facebooklink = get_post_meta( get_the_ID(), 'facebooklink', true );
			$twitter = get_post_meta( get_the_ID(), 'twitter', true );
			$twitterlink = get_post_meta( get_the_ID(), 'twitterlink', true );
			$linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			$linkedinlink = get_post_meta( get_the_ID(), 'linkedinlink', true );
			$dribbble = get_post_meta( get_the_ID(), 'dribbble', true );
			$dribbblelink = get_post_meta( get_the_ID(), 'dribbblelink', true );
			$pint = get_post_meta( get_the_ID(), 'google', true );
			$googlelink = get_post_meta( get_the_ID(), 'googlelink', true );				
			
			$bposts .= '<div class="teammember-list'.$nomargn.'">';	
			$bposts .= '<div class="thumnailbx-border"><div class="thumnailbx"><a href="'.get_the_permalink().'">'. get_the_post_thumbnail().'</a>';
				$bposts .= '<div class="member-social-icon">';
					if( $facebook != '' ){
						$bposts .= '<a href="'.$facebooklink.'" target="_blank"><i class="'.$facebook.' fa-lg"></i></a>';
					}
					if( $twitter != '' ){
						$bposts .= '<a href="'.$twitterlink.'" target="_blank"><i class="'.$twitter.' fa-lg"></i></a>';
					}
					if( $linkedin != '' ){
						$bposts .= '<a href="'.$linkedinlink.'" target="_blank"><i class="'.$linkedin.' fa-lg"></i></a>';
					}
					if( $dribbble != '' ){
						$bposts .= '<a href="'.$dribbblelink.'" target="_blank"><i class="'.$dribbble.' fa-lg"></i></a>';
					}
					if( $pint != '' ){
						$bposts .= '<a href="'.$googlelink.'" target="_blank"><i class="'.$pint.' fa-lg"></i></a>';
					}
				$bposts .= '<div class="clear"></div></div>';
			$bposts .= '</div></div>';
			
			$bposts .= '<div class="titledesbox">
				            <h5 class="title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>
							<cite>'.$designation.'</cite>
						</div>';
			
			$bposts .= '</div>';
			 
		}
	}else{
		$bposts .= '<p style="text-align:center;">There are not found our team members</p>';
	}
	wp_reset_query();
	$bposts .= '<div class="clear"></div></div><div class="clear"></div>';
    return $bposts;
}
add_shortcode( 'our-team', 'our_teamposts_func' );


// Social Icon Shortcodes
function crossfit_gym_pro_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','crossfit_gym_pro_social_area');

function crossfit_gym_pro_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="'.$icon.'"></a>';
 }
add_shortcode('social','crossfit_gym_pro_social');

/*toggle function*/
function toggle_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Click here to toggle content',
	), $atts ) );
	$tog_content = "<div class=\"toggle_holder\"><h3 class=\"slide_toggle\">{$title}</h3>
					<div class=\"slide_toggle_content\">".get_the_content_format( $content )."</div></div>";

	return $tog_content;
}
add_shortcode( 'toggle_content', 'toggle_func' );

function tabs_func( $atts, $content = null ) {
	$tabs = '<div class="tabs-wrapper"><ul class="tabs">'.do_shortcode($content).'</ul></div>';
	return $tabs;
}
add_shortcode( 'tabs', 'tabs_func' );

function tab_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Tab Title',
	), $atts ) );
	$rand = rand(100,999);
	$tab = '<li><a rel="tab'.$rand.'" href="javascript:void(0)">'.$title.'</a><div id="tab'.$rand.'" class="tab-content">'.get_the_content_format($content).'</div></li>';
	return $tab;
}
add_shortcode( 'tab', 'tab_func' );

// Button Shortcode
function readmorebtn_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="morebutton" href="'.$link.'" target="'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('button','readmorebtn_fun');

// Button Shortcode
function borderbtn_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="borderbutton" href="'.$link.'" target="'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('border-button','borderbtn_fun');

// Button Shortcode
function readmorebtn_style2_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',	
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="buttonstyle1" href="'.$link.'" target="'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('buttonstyle2','readmorebtn_style2_fun');

// space Shortcode [space height="20px"]
function space_fun($atts){
	extract(shortcode_atts(array(
	'height'	=> '',	
	), $atts));
	return '<div class="space" style="height:'.$height.'"></div>';
	}
add_shortcode('space','space_fun');

// Sub Shortcode
function subtitle_fun($atts){
	extract(shortcode_atts(array(
	'size'	=> '',
	'color'	=> '',
	'margin'	=> '',
	'description'	=> '',
	'align'	=> '',
	'name'	=> '',
	'link'	=> '',
	'target'=> '',
	), $atts));
	return '<div class="subtitle" style="font-size:'.$size.'; color:'.$color.'; margin:'.$margin.'; text-align:'.$align.';">'.$description.' <a class="AppLink" href="'.$link.'" target="'.$target.'">'.$name.'</a></div>';
	}
add_shortcode('subtitle','subtitle_fun');

// Section Content Sub title Shortcode
function section_sub_title_fun($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'align'	=> '',
	), $atts));
	return '<div class="sec_content_sub_title" style="text-align:'.$align.';">'.$title.'</div>';
	}
add_shortcode('section-sub-title','section_sub_title_fun');


//[sec_content_main_title title="" subtitle="" color="" align=""]
// Section Content Main title Shortcode
function section_main_title_fun($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'subtitle'	=> '',
	'align'	=> '',
	'color'	=> '',
	), $atts));
	return '<div class="sec_content_main_title" style="text-align:'.$align.'; color:'.$color.'">'.(($subtitle!='') ? '<span class="sub-title-head" style="text-align:'.$align.';">'.$subtitle.'</span>' : '').''.$title.'</div>';
	}
add_shortcode('section-main-title','section_main_title_fun');



// Latest News function
function latestnewsoutput_func( $atts ){
   extract( shortcode_atts( array(
		'showposts' => '',		
		'comment' => '',
		'date' => '',
		'author' => '',		
	), $atts ) );
	$postoutput = '<div class="twocolumn-news">';
	
	
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$showposts, 'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			if($comment=='show' || $comment==''){   
				$post_comment = ' <span><a href="'.get_the_permalink().'#comments">'.get_comments_number().' Comments</a></span>';
			} else {
				$post_comment = '';
			}			
			if($date=='show'){   
				$post_date = '<div class="postdt">'.get_the_date('d').'<span>'.get_the_date('M').'</span></div>';
			} else {
				$post_date = '';
			}	
			if($author=='show'){   
				$post_author = '<span>'.get_the_author_posts_link().'</span>';
			} else {
				$post_author = '';
			}
			if( $n%2==0 )  $nomgn = 'last';	else $nomgn = ' ';
			if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}			
			$postoutput .= '
				<div class="newsrightcolumn">
				  <div class="news-box">
					<div class="news-thumb"> <a href="'.get_the_permalink().'"><img src="'.$imgUrl.'" alt=" " /></a>'.$post_date.' <div class="PostMeta"> '.$post_author.' '.$post_comment.' </div></div>
						<div class="newsdesc">
							<a href="'.get_permalink().'"><h4>'.get_the_title().'</h4></a>
							<a href="'.get_permalink().'" class="poststyle"></a>
							<div class="clear"></div>
						</div>
				  </div>
				</div>
			';	
			$postoutput .= ''.(($n%2==0) ? '<div class="clear"></div>' : '');	
		endwhile;
	endif;
	wp_reset_query();
	$postoutput .= '</div>';	
	return $postoutput;
}
add_shortcode( 'latest-news', 'latestnewsoutput_func' );



//	[skillwrapper type="circle" track_color="#dddddd" chart_color="#333333" chart_size="150"][/skillwrapper]
function skillwrapper_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'bar',
		'track_color' => '#dddddd',
		'chart_color' => '#333333',
		'chart_size' => '150',
		'align' => 'center',
	), $atts ) );

	switch ( $type ){
 
 		case 'gage':
			$wrapCode = '';
			$content = strip_tags($content);
			$start = strpos($content, '[');
			$end = strrpos($content, '"]');
			$len =  strlen($content);
			$diff = $end - $len;
			$content = substr( $content, $start, $diff);
			$content = str_replace(array('[skill ', '"]', '" ]', '" ', '="' ), array('', '', '', ':', '='), $content);
			$cntStrAr = explode( "\n", $content );
			$numAr = array();
			foreach($cntStrAr as $cntk => $cntv){
				if($cntv != ''){
					$cnStr = str_replace( array('bar_foreground=', 'bar_background=', 'percent=', 'title='), array('','','',''), trim($cntv) );
					$numAr[] = explode(':', $cnStr);
				}
			}
			//$numAr = $cntAr;

	case 'circle':
			$wrapCode = '<div class="vertical-page">
					<article class="cvpage " id="resume">
						<div class="charts clearfix">
							<div>
								<ul class="car hideme">'.str_replace('<br />', '', do_shortcode($content)).'</ul>
								<div style="clear:both"></div>
							</div>
						</div>
					</article>
				</div>
				<script type="text/javascript">
				jQuery(".chartbox p").each( function(){
					if( jQuery(this).html() == "" ){
						jQuery(this).remove();
					}
				});
				var pixflow_js_opt = {"pie_chart_color":"'.$chart_color.'","pie_track_color":"'.$track_color.'","pie_chart_size":"'.$chart_size.'"};
				</script>';
			break;

	}
	return $wrapCode;
}
add_shortcode( 'skillwrapper', 'skillwrapper_func' );


//[skill title_background="#f7a53b" bar_foreground="#f7a53b" bar_background="#eeeeee" percent="90" title="CSS3"]
function skilldata_func( $atts ) {
	extract( shortcode_atts( array(
		'title_background' => '',
		'bar_foreground' => '',
		'bar_background' => '',
		'percent' => '0',
		'title' => '',
	), $atts ) );

	if( $title_background != '' ){
		$skillHtml = '
			<div class="skillbar clearfix " data-percent="'.$percent.'%" style="background: '.$bar_background.';">
				<div class="skillbar-title" style="background: '.$title_background.';"><span>'.$title.'</span></div>
				<div class="skill-bar-percent">'.$percent.'%</div>
				<div class="skillbar-bar" style="background: '.$bar_foreground.';"></div>
			</div>';
	}elseif( $title_background == '' && $bar_foreground == '' && $bar_background == '' ){
		$skillHtml = '<li>
				<div class="chartbox">
					<div class="chart" data-percent="'.$percent.'">
						<span>'.$percent.'%</span>
					</div>
					<p>'.strip_tags($title).'</p>
				</div>
			</li>';
	}

	return $skillHtml;
}
add_shortcode( 'skill', 'skilldata_func' );

function videos_carousel_fun($atts, $content = null){
	return '<div class="videos-carousel">'.do_shortcode($content).'</div>';
	}
add_shortcode('videos_carousel','videos_carousel_fun');

/* [custom-video youtubeid="" cover="" ] */
function theme_custom_video_fun($atts, $content = null){
	extract( shortcode_atts(array(
		'cover'  => '',		
		'youtubeid'  => '',	
		'cover'  => '',	
		'url'  => '',
	), $atts));
	return '
			<div class="videobox" '.(($cover!='' ? '' : ' style="background:none !important; min-height:190px;" ')).'>
				 '.(($cover!='' ? '<img src="'.$cover.'" />' : '')).'
			     <a href="'.$url.'" class="youtube-link" youtubeid="'.$youtubeid.'"><div class="playbtn"></div></a>	
			</div>';
	}
add_shortcode('custom-video','theme_custom_video_fun');

function area_row_func( $atts, $content = null ) {
	$prow = '<div class="area_row">'.do_shortcode($content).'</div>';
    return $prow;
}
add_shortcode( 'row', 'area_row_func' );

// [our-sevices icon="services-icon-1.png" title="" price="price" description="description" link="#link"] 
function my_custom_sevices_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'description' => '',	
	'icon' => '',
	'link' => '',
	), $atts));
	return '
			<div class="our-services">
				<div class="our-services-bg">
				  <div class="our-services-thumb"><img src="'.$icon.'" /></div>
				  <div class="services-title">
					  '.(($link!='') ? '<a href="'.$link.'">' : '').'<h3>'.$title.'</h3>'.(($link!='') ? '</a>' : '').'
					  '.(($description!='') ? '<div class="our-services-info">'.$description.'</div>' : '').'                       				  
				  </div>
				  <div class="clear"></div>
				</div>
			</div>
		';
	}
add_shortcode('our-sevices','my_custom_sevices_func');

function aboutmeinfo_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'description' => '',
	'icon' => '',
	'link' => '',
	'button' => '',
	), $atts));
	return '
		<div class="about_me_box">
			<div class="about_me_bg">
				  <div class="about_me-icon"><img src="'.$icon.'" /></div>
				  <div class="about_me-info">
					  <h3>'.$title.'</h3>
					  <p>'.$description.'</p>
				  </div> 
				  <div class="clear"></div>         
			</div>
			
			'.(($button!='') ? '<div class="custombtn"><a class="morebutton" href="'.$link.'" target="">'.$button.'</a></div>' : '').'
			<div class="clear"></div>      
		</div>';
	}
add_shortcode('aboutmeinfo','aboutmeinfo_func');


function whychooseus_box_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'description' => '',
	'icon' => '',
	'link' => '',
	), $atts));
	return '<div class="whychooseus_box">
				'.(($link!='') ? '<a href="'.$link.'">' : '').'
				<div class="whychooseus_box_bg">
				      <div class="whychooseus-icon"><img src="'.$icon.'" /></div>
                      <div class="whychooseus-info">
                          <h3>'.$title.'</h3>
						  <p>'.$description.'</p>
                      </div> 
					  <div class="clear"></div>         
                </div>
				'.(($link!='') ? '</a>' : '').'
				</div>';
	}
add_shortcode('whychooseus','whychooseus_box_func');

function my_custom_our_achivement_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'icon' => '',
	'link' => '',
	), $atts));
	return '
		<div class="our-achivement">   
			'.(($link!='') ? '<a href="'.$link.'">' : '').'
				<div class="achivement-bg">
					<div class="title-icon-thumb"><img src="'.$icon.'" /></div>
					<h4>'.$title.'</h4>
				</div>
			'.(($link!='') ? '</a>' : '').'
		</div>
	';
	}
add_shortcode('our-achivement','my_custom_our_achivement_func');
//[our-achivement icon="" title=""]
//Pricing Table

//Pricing Table
function pricing_table_shortcode_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
		'columns' => '4',
	), $atts ) );
	$ptbl = '<div class="pricing_table pcol'.$columns.'">'.do_shortcode( str_replace(array('<br />','\t','\n','\r','\0'.'\x0B'), array('','','','','',''), $content) ) .'<div class="clear"></div></div>';
	return $ptbl;
}
add_shortcode( 'pricing_table', 'pricing_table_shortcode_func' );

function price_column_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
		'highlight' => '',
		'bgcolor' => '',
		'image' => '',
	), $atts ) );
	$pcol = '<div class="price_col '.( (strtolower($highlight) == 'yes') ? 'highlight' : '' ).'" '.( ($bgcolor!='') ? 'style="background-color:'.$bgcolor.' !important;"' : '' ) .'>'.(($image!='') ? '<div class="price-thumb"><img src="'.$image.'" /></div>' : '').''.do_shortcode( $content ) .'</div>';
    return $pcol;
}
add_shortcode( 'price_column', 'price_column_func' );

function price_column_header_func( $atts, $content = null ) {  
	$pheader = '<div class="th">'.$content.'</div>';
    return $pheader;
}
add_shortcode( 'price_header', 'price_column_header_func' );

function price_column_footer_func( $atts, $content = null ) {
   extract( shortcode_atts( array(
		'link' => '#',
	), $atts ) );
	$pfooter = '<div class="tf"><a href="'.$link.'">'.strip_tags($content).'</a></div>';
    return $pfooter;
}
add_shortcode( 'price_footer', 'price_column_footer_func' );

function price_row_footer_func( $atts, $content = null ) {
	$prow = '<div class="td">'.$content.'</div>';
    return $prow;
}
add_shortcode( 'price_row', 'price_row_footer_func' );

function price_row_packageprice_func( $atts, $content = null ) {
    extract( shortcode_atts( array(
		'month' => '',		
	), $atts ) );
  $ppack = '<div class="price">'.strip_tags($content).'<span>'.$month.'</span></div>';
  return $ppack;
}
add_shortcode( 'package_price', 'price_row_packageprice_func' );

define('GRACE_THEME_DOC','http://www.gracethemesdemo.com/documentation/crossfit-gym/');

/*[opening-hours day="" time=""]*/
function opening_hours_fun($atts, $content = null ){
	extract(shortcode_atts(array(
	'day'	=> '',
	'time'	=> '',
	), $atts));
	return '
		<div class="workinghours">
				<p>'.$day.' <span>'.$time.'</span></p>
		</div>
	';
	}
add_shortcode('opening-hours','opening_hours_fun');
 
function thumbnail_image($atts){
	extract(shortcode_atts(array(
			'image'  => '',
	), $atts));
	return '
		<div class="history_thumbnail_image">
			'.( ($image!='') ? '<div class="thumbnail_image"><img src="'.$image.'" /></div>' : '').'
		</div> 	
	';
	}
add_shortcode('why-choose-image','thumbnail_image');

function weight_lose_img($atts){
	extract(shortcode_atts(array(
			'image'  => '',
	), $atts));
	return '
		<div class="weight-lose-img">
			'.( ($image!='') ? '<div class="weight-lose-image"><img src="'.$image.'" /></div>' : '').'
		</div> 	
	';
	}
add_shortcode('weight-lose-img','weight_lose_img');

function fitness_class_image($atts){
	extract(shortcode_atts(array(
			'image'  => '',
	), $atts));
	return '
		<div class="fitness-class-image">
			'.( ($image!='') ? '<div class="fitness-class-thumb"><img src="'.$image.'" /></div>' : '').'
		</div> 	
	';
	}
add_shortcode('fitness-class-image','fitness_class_image');

function contactinfo_func($atts){
	extract(shortcode_atts(array(
			'icon'  => '',
			'title'  => '',
			'info'  => '',
			'bgcolor'  => '',
			'color'  => '',
	), $atts));
	return '
<div class="contact-gride" '.( ($bgcolor!='') ? 'id="contact-gride-bg" style="background:'.$bgcolor.';" ' : '').' >
	'.( ($icon!='') ? '<div class="contact-gride-icon"><img src="'.$icon.'" /></div>' : '').' 
	<div class="contactinfo-con">
		'.( ($title!='') ? '<h6 '.( ($color!='') ? ' style="color:'.$color.';" ' : '').'>'.$title.'</h6>' : '').' 
		'.( ($info!='') ? '<p '.( ($color!='') ? ' style="color:'.$color.';" ' : '').'>'.$info.'</p>' : '').' 	
	</div>
	<div class="claer"></div>
</div> 	
	
	';
	}
add_shortcode('contactinfo','contactinfo_func');

function working_process_fun($atts){
		extract( shortcode_atts(array(
			'description' => '',
			'title' => '',
			'number' => '',
			'color' => '',
			'image' => '',
			'link' => '',
		), $atts));
		return '
		 <div class="special-service">
			'.(($link!='') ? '<a href="'.$link.'">' : '').'
				<div class="service-thumb-wp"><h4 class="number-count">'.$number.'</h4><div class="special-service-thumb"><img src="'.$image.'"></div></div>
				<div class="special-service-content">
					'.(($title!='') ? '<h3 style="color:'.$color.'">'.$title.'</h3>' : '').'
					'.(($description!='') ? '<p style="color:'.$color.'">'.$description.'</p>' : '').'					 
				</div>
			'.(($link!='') ? '</a>' : '').'
		 </div>
		';
}
add_shortcode('working-process','working_process_fun');

// [fitness_yoga ]
function fitness_yoga_fun($atts){
		extract( shortcode_atts(array(
			'title' => '',
			'description' => '',
			'image' => '',
			'icon' => '',
			'link' => '',
		), $atts));
		return '
		 <div class="fitness-yoga">
			'.(($link!='') ? '<a href="'.$link.'">' : '').'
				<div class="fitness-yoga-bg">
					<div class="fitness-yoga-thumb"><img src="'.$image.'"></div>
					<div class="fitness-yoga-content">
						<div class="fitness-yoga-icon"><img src="'.$icon.'"></div>						
						'.(($title!='') ? '<h3>'.$title.'</h3>' : '').'
						'.(($description!='') ? '<p>'.$description.'</p>' : '').'								 
					</div>
					
				</div>
			'.(($link!='') ? '</a>' : '').'
		 </div>
		';
}
add_shortcode('fitness_yoga','fitness_yoga_fun');


function our_classes_slider_fun($atts, $content = null){
	return '<div class="our-classes-list">'.do_shortcode($content).'</div>';
	}
add_shortcode('our_classes_slider','our_classes_slider_fun');

function our_classes_box_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'description'	=> '',	
	'image' => '',
	'readmore' => '',
  	'link' => '',
	), $atts));
	return '
<div class="our_classes_box">                
	<div class="our_classes_box_bg">
			<div class="our_classes_thumb"><a href="'.$link.'"><img src="'.$image.'"  alt=""/></a></div>
			<div class="info">
				<a href="'.$link.'"><h6>'.$title.'</h6></a>
				<p>'.$description.'</p>
				<a href="'.$link.'" class="classes-readmore"><h5>'.$readmore.'</h5></a>
			</div>
	</div>                
</div>
				';
	}
add_shortcode('our_classes','our_classes_box_func');