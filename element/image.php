<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Image Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){

if ( !function_exists ( "sao_slider_image_options" )){
add_filter('sao_slider_element_options', 'sao_slider_image_options');
function sao_slider_image_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Image','saoshyant-slider'),
 		'id'			=> 'slider_image',
  		'width_unit'	=> 'pexel',
  		'height_unit'	=> 'pexel',		
		'img'			=>  SAOSIDER_DIR .'assets/image/image.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> __('Upload Image','saoshyant-slider'),
 		"id"			=> "image",
 		"type"			=> "image",
 		   
	);	
 
	
 
	$option[]= array( 
		"name"			=> __('Alignment','saoshyant-slider'),
 		"id"			=> "alignment",
 		"group"			=>  __('Layout','saoshyant-slider'),
		"default"		=>  'center',
		"desc"			=>  __('Default "Center"','saoshyant-slider'),
		"type"			=> "select",
		"options"		=>   sao_slider_array_options('align')			
		 
	);
	 
	$option[]= array( 
		"name"			=> __('Border','saoshyant-slider'),
 		"id"			=> "border",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('border'),						
	); 	
	
	
	$option[]= array( 
		"name"			=> __('Box Shadow','saoshyant-slider'),
 		"id"			=> "shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('shadow'),						
 	); 	
	 	
 	$option[]= array( 
		"name"			=> __('Border Radius','saoshyant-slider'),
 		"id"			=> "radius",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('radius'),						
	 
	); 	 			
	 
	$option[]= array( 
		"name"			=> __('Time to start Effect','saoshyant-slider'),
 		"id"			=> "time_start",
		"default"		=> "500",
		"desc"			=>  __('Example "500"','saoshyant-slider'),
   		"group"			=>  __('Animation','saoshyant-slider'),
		"type"			=> "number",
   	);	
	
	$option[]= array( 
		"name"			=> __('Time to end Effect','saoshyant-slider'),
 		"id"			=> "time_end",
		"default"		=> "1000",
		"desc"			=>  __('Example "1000"','saoshyant-slider'),
   		"group"			=>  __('Animation','saoshyant-slider'),
		"type"			=> "number",
   	);	
	
	$option[]= array( 
		"name"			=> __('Effect','saoshyant-slider'),
 		"id"			=> "effect",
   		"group"			=>  __('Animation','saoshyant-slider'),
		"type"			=> "select", 
 
		"options"		=> array( 
		""				=> __("None",'saoshyant-slider'),
			"move"			=>  __('Move','saoshyant-slider'),
			"fade"			=> __("Fade",'saoshyant-slider'),
			"scale"			=> __("Scale",'saoshyant-slider'),
 		),
	);
	
	$option[]= array( 
		"name"			=> __('Initial Position','saoshyant-slider'),
 		"id"			=> "initial",
   		"group"			=>  __('Animation','saoshyant-slider'),
		"type"			=> "select", 
		"fold"			=> array( "move" => "effect" ),
		"options"		=> array( 
			"top"			=>  __('Top','saoshyant-slider'),
			"left"			=>  is_rtl() ? esc_html__('Right','saoshyant-slider'):esc_html__('Left','saoshyant-slider'),
			"bottom"		=>  __('Bottom','saoshyant-slider'),
			"right"			=>  is_rtl() ? esc_html__('Left','saoshyant-slider'):esc_html__('Right','saoshyant-slider'),
  		),
	);	
	
	
	$option[]= array( 
		"name"			=> __('Scale','saoshyant-slider'),
 		"id"			=> "scale",
		"fold"			=> array( "scale" => "effect" ),
   		"group"			=>  __('Animation','saoshyant-slider'),
		"type"			=> "select", 
		"options"		=> array( 
			"0.0"			=> '0.0', 
			"0.1"			=> '0.1', 
			"0.2"			=> '0.2', 
			"0.3"			=> '0.3', 
			"0.4"			=> '0.4', 
			"0.5"			=> '0.5', 
			"0.6"			=> '0.6', 
			"0.7"			=> '0.7', 
			"0.8"			=> '0.8', 
			"0.9"			=> '0.9', 
			"1.1"			=> '1.1', 
			"1.2"			=> '1.2', 
			"1.3"			=> '1.3', 
			"1.4"			=> '1.4', 
			"1.5"			=> '1.5', 
			"1.6"			=> '1.6', 
			"1.7"			=> '1.7', 
			"1.8"			=> '1.8', 
			"1.9"			=> '1.9', 
			"2.0"			=> '2.0', 
			"2.5"			=> '2.5', 
			"3.0"			=> '3.0', 
  		),
	);	
 					 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Image Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_image_config" )){
 add_filter('sao_slider_slider_image', 'sao_slider_image_config');
 function sao_slider_image_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css ='';
	ob_start(); 
 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.sao_builder_rtl_has($option['alignment']) : ' sao_alignment_center ';
 
 
   
 	//OutPut
    
 	 
  		$thumbnail = !empty($option['image'])? wp_get_attachment_image_src($option['image'], 'full'):'';

	if(!empty($thumbnail)){
  		$thumbnail_alt =!empty($option['image'])? get_post_meta( $option['image'], '_wp_attachment_image_alt', true ):'';
  		$image_src = !empty($option['image'])? $thumbnail[0]:'';
		$width = !empty($option['image'])? $thumbnail[1]:'';
		$height = !empty($option['image'])? $thumbnail[2]:'';
 		$alt = !empty($thumbnail_alt)? $thumbnail_alt:'';
		
 		echo '<img class="sao-slider-image" src="'.esc_url($image_src).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($alt).'">'; 
	}
	
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;
	$item_css = sao_slider_var_align('ls-ag',$option,'alignment','center') ;
	$item_css.= sao_slider_var_radius('ls-img',$option,'radius'); 
	$item_css.= sao_slider_var_shadow('ls-img',$option,'shadow');
	$item_css.= sao_slider_var_border('ls-img',$option,'border');
	
	 
	$return['output']= ob_get_clean();
   	$return['css']= $item_css;

  	return $return;	
}
 }
?>