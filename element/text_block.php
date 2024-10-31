<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Text BlocK Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){
 if ( !function_exists ( "sao_slider_text_block_options" )){
add_filter('sao_slider_element_options', 'sao_slider_text_block_options');
function sao_slider_text_block_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Text Block','saoshyant-slider'),
 		'id'			=> 'text_block',
		'img'			=>  SAOSIDER_DIR .'assets/image/text_block.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Content",
  		"id"			=> "content",
  		"default"		=> __('Lorem ipsum dolor sit amet consectetuer adipiscing elit ','saoshyant-slider'),
		"type"			=> "editor", 
	);  
	 
  
	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "padding",
  		"desc"			=>  __('Padding around the entire ,Default "0"','saoshyant-slider'),
 		"group"			=>  __('Layout','saoshyant-slider'),
 		"default"		=>  array( 
				"top"		=> 0,
				"left"		=> 0,
				"bottom"	=> 0,
				"right"		=> 0,
  						) ,  
 		"type"			=> "multi_options",
  		"options"		=>   sao_slider_multi_array_options('margin'),						
		  
	);	
 
	$option[]= array( 
		"name"			=> __('Text Shadow','saoshyant-slider'),
 		"id"			=> "text_shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('text_shadow'),						
 	); 		
	$option[]= array( 
		"name"			=> __('Background Color','saoshyant-slider'),
 		"id"			=> "background_color",
 		"group"			=>  __('Design','saoshyant-slider'),
		"type"			=> "color_rgba", 
		
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
		"options"		=>   sao_slider_multi_array_options('radius'),						
	 
	); 	 	
	
	
 
	
	$option[]= array( 
		"name"			=> __('Text Font Weight','saoshyant-slider'),
 		"id"			=> "text_font_weight",
   		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>  
			array( 
				""			=>  __('Default','saoshyant-slider'),			
				"300"			=> '300',			
				"400"			=> '400',			
				"500"			=> '500',			
				"600"			=> '600',			
				"700"			=> '700',			
				"800"			=> '800',			
				"900"			=> '900',			
   			),
 	 
		 
  	); 
		
	
	$option[]= array( 
		"name"			=> __('Text Font Size','saoshyant-slider'),
 		"id"			=> "text_font_size",
  		"group"			=>  __('Typography','saoshyant-slider'),
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
		"name"			=> __('Text Font Line Height','saoshyant-slider'),
 		"id"			=> "text_line_height",
		"group"			=>  __('Typography','saoshyant-slider'),
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
				"options"		=>   sao_slider_array_options('unit'),
 			),		
		),	
		
  	);   
		
	
	
	$option[]= array( 
		"name"			=> __('Text Transform','saoshyant-slider'),
 		"id"			=> "text_transform",
		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> __('None','saoshyant-slider'),
 				"uppercase"			=> 	__('Uppercase','saoshyant-slider'),
 				"lowercase"			=> __('Lowercase','saoshyant-slider'),
  				"capitalize"			=> __('Capitalize','saoshyant-slider'),
  			),		
 		
  	);   

 	
  
	$option[]= array( 
		"name"			=> __('Time to start Effect','saoshyant-slider'),
 		"id"			=> "time_start",
		"desc"			=>  __('Example "500"','saoshyant-slider'),
		"default"		=> "500",
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
 
															 	Slider Text BlocK Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_text_block_config" )){

add_filter('sao_slider_text_block', 'sao_slider_text_block_config');
function sao_slider_text_block_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css ='';
  
	ob_start(); 

	//text Css
	if(!empty($option['content'])){
		echo '<article class="sao-slider-text">';
    			echo wp_kses_post($option['content']); 
		echo '</article>';
	}  
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;
 
 	$item_css=''; 	 
  
  	$item_css.= sao_slider_var_text_shadow('ls-txt',$option,'text_shadow') ;
  	$item_css.= sao_slider_var('ls-bx-bg',$option,'background_color');
  	$item_css.= sao_slider_var_border('ls-bx',$option,'border');
    	$item_css.= sao_slider_var_shadow('ls-bx',$option,'shadow') ;
  	$item_css.= sao_slider_var_radius('ls-bx',$option,'radius') ;
 	$item_css.= sao_slider_var_padding('ls-pd',$option,'padding') ;
	
  	
	
	
 	$item_css.= sao_slider_var_font_weight('ls-txt-fn-wt',$option,'text_font_weight','700') ;
 	$item_css.= sao_slider_var_size('ls-txt-fn-sz',$option,'text_font_size','size') ;
 	$item_css.= sao_slider_var_size('ls-txt-li-ht',$option,'text_line_height','size') ;

  
  	
	$return['output']= ob_get_clean();
   	$return['css']= $item_css;
	
	return $return;	
}
 }
 
?>