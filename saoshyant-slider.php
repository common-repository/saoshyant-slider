<?php
/**
 * Plugin Name: Saoshyant Slider
 * Description: Custom And Builder Slider
 * Version: 2.9
 * Author: Saoshyant-Web
 * Text Domain: saoshyant-slider
 * Domain Path: /languages/ 
/* Plugin Framework Version Check */
 
if( !defined('SAOSIDER_PATH') ){
	define( 'SAOSIDER_PATH', plugin_dir_path(__FILE__) );
}
if( !defined('SAOSIDER_DIR') ){
	define( 'SAOSIDER_DIR', plugin_dir_url(__FILE__) );
}	
  
if( ! function_exists( 'sao_slider_constructor' ) ) {
    function sao_slider_constructor() {

        load_plugin_textdomain( 'saoshyant-slider', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
 
    }
}
add_action( 'sao_slider_init', 'sao_slider_constructor' );
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Slider Install
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'sao_slider_install' ) ) {
    function sao_slider_install() {

     
            do_action( 'sao_slider_init' );
     }
}
add_action( 'plugins_loaded', 'sao_slider_install', 1 );

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Sao Settings
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if( ! function_exists( 'sao_settings' ) ) {
 function sao_settings($settings,$id=false){
	return !empty( $settings[ $id] )? $settings[$id] : '';
 }    
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Slide Post Type
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if( ! function_exists( 'sao_slide_post_type' ) ) {

function sao_slide_post_type() {
	$labels = array(
		'name' 					=> __('Slides','saoshyant-slider'),
		'singular_name'			=> __('Slide','saoshyant-slider'),
		'add_new'				=> __('Add New','saoshyant-slider'),
		'add_new_item'			=>__('Add New Slide','saoshyant-slider'),
		'edit_item'				=> __('Edit Slide','saoshyant-slider'),
		'new_item'				=> __('New Slide','saoshyant-slider'),
		'view_item'				=> __('View Slide','saoshyant-slider'),
 		'all_items'				=>__('All Slides','saoshyant-slider'),
 		'search_items'			=> __('Search Slides','saoshyant-slider'),
		'not_found'				=>  __('No slides found','saoshyant-slider'),
		'not_found_in_trash'	=>__('No slides found in trash','saoshyant-slider'),
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Slides','saoshyant-slider')
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false, 
		'hierarchical'			=> false,
		'menu_position'			=> null,
		'supports' => array( 'title' )
	); 

	register_post_type( 'sao_slide', $args );
}
add_action( 'init', 'sao_slide_post_type' );
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Taxonomy 
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if( ! function_exists( 'sao_sliders_taxonomy' ) ) {
add_action( 'init', 'sao_sliders_taxonomy', 0 );
function sao_sliders_taxonomy() {
 
   $labels = array(
    'name'							=> __( 'Sliders','saoshyant-slider' ),
    'singular_name'					=> __( 'Slider','saoshyant-slider'  ),
    'search_items'					=> __( 'Search Sliders' ,'saoshyant-slider' ),
    'popular_items'					=> __( 'Popular Sliders','saoshyant-slider'  ),
    'all_items' 					=> __( 'All Sliders' ,'saoshyant-slider' ),
    'parent_item'					=> __( 'Parent Slider' ,'saoshyant-slider' ),
    'edit_item'						=> __( 'Edit Topic','saoshyant-slider' ), 
    'update_item' 					=> __( 'Update Slider','saoshyant-slider'  ),
    'add_new_item'					=> __( 'Add New Slider','saoshyant-slider'  ),
    'new_item_name'			 		=> __( 'New Topic Name' ,'saoshyant-slider' ),
    'separate_items_with_commas'	=> __( 'Separate Sliders with commas' ,'saoshyant-slider' ),
    'add_or_remove_items'			=> __( 'Add or remove Sliders','saoshyant-slider'  ),
    'choose_from_most_used' 		=> __( 'Choose from the most used Sliders','saoshyant-slider'  ),
    'menu_name' 					=> __( 'Sliders' ,'saoshyant-slider' ),
  ); 


// Now register the taxonomy

  register_taxonomy('sao_sliders','sao_slide', array(
    'hierarchical' 					=> true,
    'labels' 						=> $labels,
    'show_ui' 						=> true,
    'show_admin_column'				=> true,
    'query_var'						=> true,
    'rewrite' 						=> array( 'slug' => 'sao_sliders' ),
  ));

}
add_filter('manage_sao_slide_posts_columns', 'sao_add_thumbnail_column', 5);
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Thumbail Column
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if( ! function_exists( 'sao_add_thumbnail_column' ) ) {
function sao_add_thumbnail_column($columns){
  $columns['new_post_excerpt'] = __('Excerpt','saoshyant-slider');
  $columns['new_post_thumb'] = __('Featured Image','saoshyant-slider');
  return $columns;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Display Thumbail Column
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if( ! function_exists( 'sao_display_thumbnail_column' ) ) {

add_action('manage_sao_slide_posts_custom_column', 'sao_display_thumbnail_column', 5, 2);
function sao_display_thumbnail_column($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id =  get_post_meta($post_id, 'sao_background_image', true);
	     		$thumbnail = !empty($post_thumbnail_id)? wp_get_attachment_image_src($post_thumbnail_id, 'medium'):'';
        if (!empty($thumbnail[0])) {
         echo '<img width="100" src="' . esc_url($thumbnail[0]) . '" />';
      }
      break;
  }
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Global Script
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 global $sao_icon_style,$sao_awesome_style,$sao_button_style; 
if ( !function_exists ( "sao_slider_global_script" )){
function sao_slider_global_script()
{
	global 
		$sao_custom_enqueue, 	
		$sao_button_style,
 		$sao_fonticon_style,
 
		$sao_lightslider_style,
		$sao_lightslider_script;
		 
  }
add_action( 'init', 'sao_slider_global_script' );
}
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slide Has Type
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if ( !function_exists ( "sao_slide_has_type" )){
 function sao_slide_has_type() {
  global $post, $typenow, $current_screen;
  if ( $post && $post->post_type ) {
    return $post->post_type;
  }
  elseif ( $typenow ) {
    return $typenow;
  }
  elseif ( $current_screen && $current_screen->post_type ) {
    return $current_screen->post_type;
  }
  elseif ( isset( $_REQUEST['post_type'] ) ) {
    return sanitize_key( $_REQUEST['post_type'] );
  }
  elseif ( isset( $_REQUEST['post'] ) ) {
    return get_post_type( $_REQUEST['post'] );
  }
  return null;
}
$sao_slide_has_type = sao_slide_has_type(); 
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Image Size
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( is_admin()) {
	 include_once SAOSIDER_PATH . 'framework/builder-template.php';

include_once SAOSIDER_PATH . 'framework/builder.php';
include_once SAOSIDER_PATH . 'framework/builder-section.php';
include_once SAOSIDER_PATH . 'framework/builder-column.php';
include_once SAOSIDER_PATH . 'framework/builder-element.php';
include_once SAOSIDER_PATH . 'framework/builder-options-functions.php';

include_once SAOSIDER_PATH . 'framework/slider-metabox.php';
include_once SAOSIDER_PATH . 'framework/perview.php';
include_once SAOSIDER_PATH . 'options/builder-options-element.php';
 include_once SAOSIDER_PATH . 'options/fonts/fa-icon.php';
include_once SAOSIDER_PATH . 'options/fonts/flaticon.php';
include_once SAOSIDER_PATH . 'options/fonts/flaticon_thin.php';
include_once SAOSIDER_PATH . 'options/fonts/metrizeicon.php';
include_once SAOSIDER_PATH . 'options/fonts/typcn.php';
 
 }
include_once SAOSIDER_PATH . 'options/slider-array.php';
include_once SAOSIDER_PATH . 'framework/builder-code.php';
include_once SAOSIDER_PATH . 'inc/sao_slider_details.php';
include_once SAOSIDER_PATH  . 'inc/post-functions.php';
include_once SAOSIDER_PATH . 'custom-css/element-css.php';
include_once SAOSIDER_PATH . 'custom-css/var-element-css.php';
 
include_once SAOSIDER_PATH  . 'slider.php';
include_once SAOSIDER_PATH  . 'elementor_category.php';
 

include_once SAOSIDER_PATH . 'element/text.php';
include_once SAOSIDER_PATH . 'element/icon.php';
include_once SAOSIDER_PATH . 'element/button.php';
include_once SAOSIDER_PATH . 'element/image.php';
include_once SAOSIDER_PATH . 'element/box.php';
include_once SAOSIDER_PATH . 'element/text_block.php';
     
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Rtl left
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if ( !function_exists ( "sao_slider_rtl_left" )){
function sao_slider_rtl_left() {
 	if(is_rtl()){
		return 'right';
	}else{
		return 'left';
	}
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Rtl Right
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if ( !function_exists ( "sao_slider_rtl_right" )){

function sao_slider_rtl_right() {
 	if(is_rtl()){
		return 'left';
	}else{
		return 'right';
	}
} 
}
 /********************************************************************
Bulider RTL
*********************************************************************/
if ( !function_exists ( "sao_builder_rtl_has" )){
function sao_builder_rtl_has($element =false) {
 	 
 	if(is_rtl() && strpos($element,'left')!==false){
		return str_replace('left','right', $element);
		
	}elseif(is_rtl() && strpos($element,'right')!==false){
		
		return str_replace('right','left',$element);
		
	} else{
		return $element;
		
	}
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Icon Enquepue
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if ( !function_exists ( "sao_icon_enqueue" )){
function sao_icon_enqueue($var=false,$true=false) {
	global $sao_fonticon_style;
	
 	if(!empty($sao_fonticon_style['FontAwesome']) || !empty($true)) wp_enqueue_style('sao_FontAwesome',SAOSIDER_DIR. 'assets/css/fonts/FontAwesome.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonarrow'])  || !empty($true)) wp_enqueue_style('sao_flaticonarrow',SAOSIDER_DIR. 'assets/css/fonts/flaticonarrow.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonmultimedia'])  || !empty($true) ) wp_enqueue_style('sao_flaticonmultimedia',SAOSIDER_DIR. 'assets/css/fonts/flaticonmultimedia.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonbusiness'])  || !empty($true)) wp_enqueue_style('sao_flaticonbusiness',SAOSIDER_DIR. 'assets/css/fonts/flaticonbusiness.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonoffice'])  || !empty($true)) wp_enqueue_style('sao_flaticonoffice',SAOSIDER_DIR. 'assets/css/fonts/flaticonoffice.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticoninterface'])  || !empty($true) ) wp_enqueue_style('sao_flaticoninterface',SAOSIDER_DIR. 'assets/css/fonts/flaticoninterface.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonessentialset']) || !empty($true)) wp_enqueue_style('sao_flaticonessentialset',SAOSIDER_DIR. 'assets/css/fonts/flaticonessentialset.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticontechsupport']) || !empty($true)) wp_enqueue_style('sao_flaticontechsupport',SAOSIDER_DIR. 'assets/css/fonts/flaticontechsupport.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticontech'])  || !empty($true)) wp_enqueue_style('sao_flaticontech',SAOSIDER_DIR. 'assets/css/fonts/flaticontech.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonstrategy'])  || !empty($true)) wp_enqueue_style('sao_flaticonstrategy',SAOSIDER_DIR. 'assets/css/fonts/flaticonstrategy.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonhipster'])  || !empty($true) ) wp_enqueue_style('sao_flaticonhipster',SAOSIDER_DIR. 'assets/css/fonts/flaticonhipster.css','',$var);
  	if(!empty($sao_fonticon_style['flaticonfashion']) || !empty($true) ) wp_enqueue_style('sao_flaticonfashion',SAOSIDER_DIR. 'assets/css/fonts/flaticonfashion.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonwebdesign']) || !empty($true) ) wp_enqueue_style('sao_flaticonwebdesign',SAOSIDER_DIR. 'assets/css/fonts/flaticonwebdesign.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticontravel']) || !empty($true) ) wp_enqueue_style('sao_flaticontravel',SAOSIDER_DIR. 'assets/css/fonts/flaticontravel.css','',$var);  
 	if(!empty($sao_fonticon_style['flaticonnetwork']) || !empty($true)) wp_enqueue_style('sao_flaticonnetwork',SAOSIDER_DIR. 'assets/css/fonts/flaticonnetwork.css','',$var);  
 	if(!empty($sao_fonticon_style['metrizeicon']) || !empty($true)) wp_enqueue_style('sao_metrizeicon',SAOSIDER_DIR. 'assets/css/fonts/metrizeicon.css','',$var);  
 	if(!empty($sao_fonticon_style['typcn']) || !empty($true)) wp_enqueue_style('sao_typcn',SAOSIDER_DIR. 'assets/css/fonts/typcn.css','',$var);   
}
}
 

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Menu
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
if ( !function_exists ( "sao_slider_meta" )){
function sao_slider_meta(){}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 slider Builder Enqueue
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_builder_enqueue" )){
 if ( is_admin() ) {

add_action('admin_enqueue_scripts', 'sao_slider_builder_enqueue');
function sao_slider_builder_enqueue($hook) {
	global $pagenow; 

		if(in_array( $pagenow, array( 'post-new.php', 'post.php','admin-ajax.php' ) )&& (sao_slide_has_type() ==  'sao_slide')){

	$var = '2.7.3';
	$min = '';	
	wp_enqueue_style('sao_FontAwesome',SAOPAGE_DIR. 'assets/css/fonts/FontAwesome.css','',$var);  
	wp_enqueue_style('sao_button_style',SAOSIDER_DIR. 'assets/css/lib/button'.$min.'.css','',$var);  
	wp_enqueue_style('sao_custom_slider_css',SAOSIDER_DIR. 'assets/css/custom-slider'.$min.'.css',array(),$var); 
	wp_enqueue_style('sao_admin_slider',SAOSIDER_DIR.  'assets/css/admin-slider'.$min.'.css',array(),$var);
   $text=array(
		'choose'				=>	esc_html__('Choose Image','saoshyant-slider'), 
 		'remove'				=>	esc_html__('Remove','saoshyant-slider'),
		'uploader_button'		=>	esc_html__('Use This Image','saoshyant-slider'), 
		'empty'				=>	esc_html__('Name is empty!','saoshyant-slider'), 
		'change_column'		=>	esc_html__('Change the Column','saoshyant-slider'), 
		'retry'				=>	esc_html__('Name already exist!','saoshyant-slider'), 
		'agree'				=>	esc_html__('Do you agree?','saoshyant-slider'), 
		'error'				=>	esc_html__('Error','saoshyant-slider'), 
		 
	);
 	
   	wp_register_script('sao_admin_slider',SAOSIDER_DIR. 'assets/js/admin-slider'.$min.'.js',  array('jquery', 'jquery-ui-sortable','jquery-ui-draggable','jquery-ui-resizable'),$var); 
 	wp_localize_script( 'sao_admin_slider', 'slider_js', array( 'ajaxurl' => admin_url( 'admin-ajax.php'  ))  );	
 	wp_localize_script( 'sao_admin_slider', 'text',$text   );	
	wp_enqueue_script( 'sao_admin_slider' );
	wp_enqueue_script("jquery-ui-draggable");
 
	
	 
	wp_enqueue_style('sao_builder', SAOSIDER_DIR .'assets/css/builder'.$min.'.css',array(),$var);
	wp_enqueue_style('rtl_builder', SAOSIDER_DIR .'assets/css/rtl_builder'.$min.'.css',array(),$var);
	
	wp_register_script('sao_builder', SAOSIDER_DIR .'assets/js/builder'.$min.'.js', array('jquery', 'jquery-ui-sortable','jquery-ui-droppable') ,$var, true );
  	$array = array( 'ajaxurl' => admin_url( 'admin-ajax.php') );
 	wp_localize_script( 'sao_builder', 'builder_js', $array  );	
 	wp_localize_script( 'sao_builder', 'rtl_js',array('is_rtl'=> is_rtl()?'true':false));		
  	wp_enqueue_media();
 	wp_enqueue_script('jquery-ui-slider');
 	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'serializejson', SAOSIDER_DIR .'assets/js/jquery.serializejson.min.js' ); 
 	wp_enqueue_script( 'cs-wp-color-picker',SAOSIDER_DIR .'assets/js/cs-wp-color-picker.min.js',  array( 'wp-color-picker' ), '1.0.0', true ); 
	wp_localize_script('sao_builder', 'sao_text', $text);
     wp_enqueue_script( 'sao_builder' );
 	
}}
}
}
  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Enqueue Footer
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	   
 if ( !function_exists ( "sao_slider_enqueue_footer" )){
 
 add_action('wp_footer', 'sao_slider_enqueue_footer');
function sao_slider_enqueue_footer() {
	
	$var = '2.7';
	$min = '.min';
	
	global 
	$sao_custom_enqueue,
 	$sao_button_style,
   	$sao_lightslider_style,
	$sao_slide_script,
	$sao_lightslider_script;
	
 
	if(!empty($sao_lightslider_style))wp_enqueue_style('sao_lightslider_style',SAOSIDER_DIR. 'assets/css/lib/lightslider'.$min.'.css','',$var);  	 
	if(!empty($sao_lightslider_script)) wp_enqueue_script('sao_lightslider_script',SAOSIDER_DIR. 'assets/js/lib/lightslider'.$min.'.js','',$var);
  		if(!empty($sao_slide_script)) wp_enqueue_script('sao_slide_script',SAOSIDER_DIR. 'assets/js/lib/slide'.$min.'.js','',$var); 
	
	if(!empty($sao_button_style)) wp_enqueue_style('sao_button_style',SAOSIDER_DIR. 'assets/css/lib/button'.$min.'.css','',$var);  
	if(!empty($sao_custom_enqueue)){ wp_enqueue_style('sao_custom_slider',SAOSIDER_DIR. 'assets/css/custom-slider'.$min.'.css',array(),$var); 
   	  wp_enqueue_script( 'sao_custom_slider',SAOSIDER_DIR. 'assets/js/custom-slider'.$min.'.js',array(), $var);
  
	} 
	sao_icon_enqueue();
 	$request_url=esc_html($_SERVER['REQUEST_URI']);
	if (  strpos($request_url, 'elementor-preview') !== false ) {

		wp_enqueue_style('sao_lightslider_style',SAOSIDER_DIR. 'assets/css/lib/lightslider'.$min.'.css','',$var);  	 
		wp_enqueue_script('sao_lightslider_script',SAOSIDER_DIR. 'assets/js/lib/lightslider'.$min.'.js','',$var);
		wp_enqueue_script('sao_slide_script',SAOSIDER_DIR. 'assets/js/lib/slide'.$min.'.js','',$var); 
		wp_enqueue_style('sao_button_style',SAOSIDER_DIR. 'assets/css/lib/button'.$min.'.css','',$var);  
		wp_enqueue_style('sao_custom_slider',SAOSIDER_DIR. 'assets/css/custom-slider'.$min.'.css',array(),$var); 
		wp_enqueue_script( 'sao_custom_slider',SAOSIDER_DIR. 'assets/js/custom-slider'.$min.'.js',array(), $var);
	}
 } 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  Slider Custom Template
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_custom_template" )){

add_filter('single_template', 'sao_slider_custom_template');

function sao_slider_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'sao_slide' ) {
        if ( file_exists( SAOSIDER_DIR . 'single-sao_slide.php' ) ) {
            return SAOSIDER_DIR . 'single-sao_slide.php';
  		
        }
    }

    return $single;

}
 
 }

 
?>