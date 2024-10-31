<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Box Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){
if ( !function_exists ( "sao_slider_box_options" )){
add_filter('sao_slider_element_options', 'sao_slider_box_options');
function sao_slider_box_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Box','saoshyant-slider'),
 		'id'			=> 'slider_box',
		'width'			=> '200',
		'width_unit'	=> 'pexel',
		'height'		=> '200',
  		'height_unit'	=> 'pexel',	
 		'img'			=>  SAOSIDER_DIR.'assets/image/box.jpg'
  	); 
     
	
	$option[]= array( 
		"name"			=> __('Background Color','saoshyant-slider'),
 		"id"			=> "background_color",
 		"group"			=>  __('Design','saoshyant-slider'),
		"type"			=> "multi_options",
		"options"		=> array(
			array(
				"name"		=>  __('First','saoshyant-slider'),
				"id"		=> "first",
				"type"		=> "color_rgba",
			),
			array(
				"name"		=>  __('Second','saoshyant-slider'),
				"id"		=> "second",
				"type"		=> "color_rgba",
			),
			array(
				"name"		=>  __('Third','saoshyant-slider'),
				"id"		=> "third",
				"type"		=> "color_rgba",
			),	
			array(
				"name"		=>  __('Orientation','saoshyant-slider'),
				"id"		=> "orientation",
				"type"		=> "select",
				"options"	=> array(
					"horizontal"		=>  __('horizontal  →','saoshyant-slider'),
					"vertical"			=>  __('vertical  ↓','saoshyant-slider'),
					"diagonal"			=>  __('diagonal  ↘','saoshyant-slider'),
					"diagonal-bottom"	=>  __('diagonal  ↗','saoshyant-slider'),
				),
			),						
	
		),
 	);		
	
	
$option[]= array( 
		"name"			=> __('Border','saoshyant-slider'),
 		"id"			=> "border",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('border'),						
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
		"options"		=>  sao_slider_multi_array_options('radius'),						
	 
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
 
															 	Slider Box Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_box_config" )){
add_filter('sao_slider_slider_box', 'sao_slider_box_config');
function sao_slider_box_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
 	
 	 
	ob_start(); 
 
  
 
  echo '<div class="sao-slider-box"></div>';
	
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;

	$item_css = sao_slider_var_gradient_background_color('ls-box',$option,'background_color');
	$item_css.= sao_slider_var_radius('ls-box',$option,'radius'); 
	$item_css.= sao_slider_var_shadow('ls-box',$option,'shadow');
	$item_css.= sao_slider_var_border('ls-box',$option,'border');
	
 
 	 
	$return['output']= ob_get_clean();

   	$return['css']= $item_css;
	
	return $return;	
}
}
?>