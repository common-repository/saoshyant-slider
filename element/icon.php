<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Icon Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){
if ( !function_exists ( "sao_slider_icon_options" )){
add_filter('sao_slider_element_options', 'sao_slider_icon_options');
function sao_slider_icon_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Icon','saoshyant-slider'),
 		'id'			=> 'slider_icon',
  		'width_unit'	=> 'auto',
  		'height_unit'	=> 'auto',		
 		'img'			=>  SAOSIDER_DIR .'assets/image/icon.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> __("Icon",'saoshyant-slider'),
  		"id"			=> "icon",
  		"default"		=> "fa-check-circle",
 		"type"			=> "icon", 
	);  

 
  
	$option[]= array( 
		"name"			=> __('Alignment','saoshyant-slider'),
 		"id"			=> "alignment",
		"default"		=>  'center',
 		"group"			=>  __('Layout','saoshyant-slider'),
		"desc"			=>  __('Default "Center"','saoshyant-slider'),
		"type"			=> "select",
		"options"		=>  array( 
			"left"			=> is_rtl () ? __('Right','saoshyant-slider'):__('Left','saoshyant-slider'),
			"center"		=>  __('Center','saoshyant-slider'),
 			"right"			=> is_rtl () ? __('Left','saoshyant-slider') :__('Right','saoshyant-slider'),					
			 
		),					
		 
	);
	 
	
	$option[]= array(
		"name"		=>  __('Icon Color','saoshyant-slider'),
		"id"		=> "color",
  		"group"			=>  __('Design','saoshyant-slider'),
		"type"		=> "color_rgba",
	);
	$option[]= array( 
		"name"			=> __('Icon Shadow','saoshyant-slider'),
 		"id"			=> "text_shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('text_shadow'),						
 	); 			
 	
	$option[]= array( 
		"name"			=> __('Icon Size','saoshyant-slider'),
 		"id"			=> "icon_size",
  		"group"			=>  __('Typography','saoshyant-slider'),
		"default"		=>  array( 
 			"size"		=> '80',
			"unit"			=> 'px',
		), 
		
		"type"			=> "multi_options",
		"options"		=>  array( 
			array( 
				"name"			=> __('Size','saoshyant-slider'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),		
		),	
		
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
		"desc"			=>  __('Example "1000"','saoshyant-slider'),
		"default"		=> "1000",
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
 
															 	Slider Icon Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_icon_config" )){
add_filter('sao_slider_slider_icon', 'sao_slider_icon_config');
function sao_slider_icon_config( $args ) {
  
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
 		ob_start(); 

   	if(!empty($option['icon'])){
			 sao_icon_fontfamily($option['icon']);

		echo '<div class="sao-slider-icon '.esc_attr($option['icon']).'" >';
 		echo '</div>';
	}
 
	$icon_css =''; 
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;

 	 $item_css = sao_slider_var_align('ls-ag',$option,'alignment','center') ;
	
	
	$item_css= sao_slider_var('ls-icn-cr',$option,'color') ;
 
 	$item_css.= sao_slider_var_text_shadow('ls-icn',$option,'text_shadow') ;

	$item_css.= sao_slider_var_size('ls-icn-fn-sz',$option,'icon_size','size') ;	
	
	
 
  	$return['output']= ob_get_clean();
   	$return['css']= $item_css;

	
	return $return;	
}
}

?>