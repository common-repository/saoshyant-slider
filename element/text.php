<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Text Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){
if ( !function_exists ( "sao_slider_text_options" )){

add_filter('sao_slider_element_options', 'sao_slider_text_options');
function sao_slider_text_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Text','saoshyant-slider'),
 		'id'			=> 'slider_text',
 		'width_unit'	=> 'pexel',
 		'height_unit'	=> 'pexel',
 		'id'			=> 'slider_text',
		'img'			=> SAOSIDER_DIR .'assets/image/text.jpg'
  	); 
   
	
 
	$option[]= array( 
		"name"			=> __('Text','saoshyant-slider'),
 		"default"		=> __('Lorem ipsum dolor sit amet','saoshyant-slider'),
 		"id"			=> "text",
 		"type"			=> "textarea",
 		  
	); 
 
  
	$option[]=array(
  				"name"		=>  __('Icon','saoshyant-slider'),
  				"id"		=> "icon",
 				"type"		=> "icon",
	);	
			
	
	$option[]= array( 
		"name"			=> __('Link','saoshyant-slider'),
 		"id"			=> "link",
   		"type"			=> "text",
 		  
	); 
 
	$option[] = array(
  				"name"		=>  __('Open in new window','saoshyant-slider'),
  				"id"		=> "widows",
 				"type"		=> "checkbox",
				
 	);		
	
	$option[]= array( 
		"name"			=> __('Alignment','saoshyant-slider'),
 		"id"			=> "alignment",
 		"group"			=>  __('Layout','saoshyant-slider'),
		"default"		=>  'center',
		"desc"			=>  __('Default "Center"','saoshyant-slider'),
		"type"			=> "select",
		"options"		=> sao_slider_array_options('align')			
		 
	); 
 
 	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "padding",
  		"group"			=>  __('Layout','saoshyant-slider'),
		"default"		=>  array( 
			"top"			=> '0',
			"left"			=> '0',
			"bottom"		=> '0',
			"right"			=> '0',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_slider_multi_array_options('margin'),						
 	); 
	
	
	
	$option[]= array( 
		"name"				=> __('Text Style','saoshyant-slider'),
 		"id"				=> "text_start", 
		"group"			=>  __('Design','saoshyant-slider'),
  		"type"				=>  "according-start",						
   	); 	
			
	
	$option[]= array(
  				"name"		=>  __('Text Color','saoshyant-slider'),
  				"id"		=> "text_color",
				"default"		=>  array( 
					"main"			=> '#ffffff',
 				),
 				"group"			=>  __('Design','saoshyant-slider'),
				"type"		=> "multi_options",
 				"options"		=>	array(
					array(
						"name"		=>  __('Main Text Color','saoshyant-slider'),
						"id"		=> "main",
						"type"		=> "color_rgba",
  					),array(
						"name"		=>  __('Icon Color','saoshyant-slider'),
						"id"		=> "icon",
						"type"		=> "color_rgba",
  					),	
				
 				),
	);
	

	
	$option[]= array( 
		"name"			=> __('Text Shadow','saoshyant-slider'),
 		"id"			=> "text_shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('text_shadow'),						
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
		"options"		=>  sao_slider_multi_array_options('border'),						
	); 	
	
	
	$option[]= array( 
		"name"			=> __('Box Shadow','saoshyant-slider'),
 		"id"			=> "shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('shadow'),						
 	); 	
	 	
 	$option[]= array( 
		"name"			=> __('Border Radius','saoshyant-slider'),
 		"id"			=> "radius",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('radius'),						
	 
	); 	 			
	

	$option[]= array( 
		"name"				=> __('Text Style','saoshyant-slider'),
 		"id"				=> "text_end", 
 		"group"			=>  __('Design','saoshyant-slider'),
  		"type"				=>  "according-end",						
   	); 					
	
 

	$option[]= array( 
		"name"				=> __('on Hover Text Style','saoshyant-slider'),
 		"id"				=> "hover_start", 
		"group"				=>  __('Design','saoshyant-slider'),
  		"type"				=>  "according-start",						
   	); 	
			
	
	$option[]= array(
  				"name"		=>  __('Hover Text Color','saoshyant-slider'),
  				"id"		=> "hover_text_color",
				"default"		=>  array( 
					"main"			=> '#ffffff',
 				),
 				"group"			=>  __('Design','saoshyant-slider'),
				"type"		=> "multi_options",
 				"options"		=>	array(
					array(
						"name"		=>  __('Main Text Color','saoshyant-slider'),
						"id"		=> "main",
						"type"		=> "color_rgba",
  					),array(
						"name"		=>  __('Icon Color','saoshyant-slider'),
						"id"		=> "icon",
						"type"		=> "color_rgba",
  					),	
				
 				),
	);
	  
	
	$option[]= array( 
		"name"			=> __('Hover Background Color','saoshyant-slider'),
 		"id"			=> "hover_background_color",
 		"group"			=>  __('Design','saoshyant-slider'),
		"type"			=> "color_rgba", 
		
  	); 	 
	
	 
	
	$option[]= array( 
		"name"			=> __('Hover Border','saoshyant-slider'),
 		"id"			=> "hover_border",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('border'),						
	); 	
	
	
	$option[]= array( 
		"name"			=> __('Hover Box Shadow','saoshyant-slider'),
 		"id"			=> "hover_shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('shadow'),						
 	); 	
	 	
 	 
	$option[]= array( 
		"name"				=> __('Hover Text Style','saoshyant-slider'),
 		"id"				=> "hover_end", 
 		"group"			=>  __('Design','saoshyant-slider'),
  		"type"				=>  "according-end",						
   	); 					
		
 	 	
	
	$option[]= array( 
		"name"			=> __('Text Font Weight','saoshyant-slider'),
 		"id"			=> "text_font_weight",
 		"default"		=> '700',
  		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>  
			array( 
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
		"default"		=> array( 'size'=>'50','unit'=>'px'),
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
		"name"			=> __('Icon Size','saoshyant-slider'),
 		"id"			=> "icon_size",
		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				"1.0em"		=> '1.0em', 
 				"1.1em"		=> '1.1em',
 				"1.3em"		=> '1.2em',
 				"1.3em"		=> '1.3em',
 				"1.4em"		=> '1.4em',
 				"1.5em"		=> '1.5em',
				"1.6em"		=> '1.6em',
 				"1.7em"		=> '1.7em',
 				"1.8em"		=> '1.8em',
 				"1.9em"		=> '1.9em',
 				"2.0em"		=> '2.0em',
				
  			),		
 		
  	);   		
	
 	
	$option[]= array( 
		"name"			=> __('Text Font Line Height','saoshyant-slider'),
 		"id"			=> "text_line_height",
		"default"		=> array( 'size'=>'1.35','unit'=>'em'),
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
		"name"			=> __('Text Font Decoration','saoshyant-slider'),
 		"id"			=> "text_font_decoration",
		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> __('None','saoshyant-slider'),
 				"overline"			=> 	__('Overline','saoshyant-slider'),
 				"line-through"		=> __('Line-Through','saoshyant-slider'),
  				"underline"			=> __('Underline','saoshyant-slider'),
  			),		
 		
  	);   
	
	$option[]= array( 
		"name"			=> __('Text Font Style','saoshyant-slider'),
 		"id"			=> "text_font_style",
		"group"			=>  __('Typography','saoshyant-slider'),
		"type"			=> "select", 	 	
		"options"		=>   
  			array( 
 				""					=> __('None','saoshyant-slider'),
 				"normal"			=> 	__('Normal','saoshyant-slider'),
 				"italic"			=> __('italic','saoshyant-slider'),
  				"oblique"			=> __('oblique','saoshyant-slider'),
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
 
															 	Slider Text Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_text_config" )){
add_filter('sao_slider_slider_text', 'sao_slider_text_config');
function sao_slider_text_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
	ob_start(); 

	//text Css
  	$target = !empty($option['window']) ? 'target="_blank"' : '';
         
    echo '<div class="sao-slider-text">';
    
		if(!empty($option['text'])){
			if(!empty($option['link'])){
				echo '<a href="'.esc_url($option['link']).'">';
			} 
 			 if(!empty($option['icon'])) {
				 global $sao_awesome_style;
				$sao_awesome_style++;
			 	echo  '<i class="'.esc_attr($option['icon']).'"  ></i>'; 
			 }
			echo $option['text']; 
				
			if(!empty($option['link'])){ 
			echo '</a>';
			}
		} 
 	 echo '</div>';
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;
 
 	$item_css=''; 	 
  
	
 	 
 
	 
  
 	$item_css.= sao_slider_var_align('ls-ag',$option,'alignment','center') ;
 	$item_css.= sao_slider_var_2('ls-txt-cr',$option,'text_color','main') ;
 	$item_css.= sao_slider_var_2('ls-icn-cr',$option,'text_color','icon') ;
 	
 	$item_css.= sao_slider_var_2('ls-hv-txt-cr',$option,'hover_text_color','main') ;
 	$item_css.= sao_slider_var_2('ls-hv-icn-cr',$option,'hover_text_color','icon') ;
	
	
 	$item_css.= sao_slider_var_text_shadow('ls-txt',$option,'text_shadow') ;

	
 	$item_css.= sao_slider_var('ls-bx-bg',$option,'background_color');
	$item_css.= sao_slider_var('ls-hv-bx-bg',$option,'hover_background_color');
		
 	$item_css.= sao_slider_var_border('ls-bx',$option,'border');
 	$item_css.= sao_slider_var_border('ls-hv-bx',$option,'hover_border');
	
   	$item_css.= sao_slider_var_shadow('ls-bx',$option,'shadow') ;
  	$item_css.= sao_slider_var_shadow('ls-hv-bx',$option,'hover_shadow') ;
	
 	$item_css.= sao_slider_var_radius('ls-bx',$option,'radius') ;
 	$item_css.= sao_slider_var_padding('ls-pd',$option,'padding') ;
	
 	
 	
	
	
	
 	$item_css.= sao_slider_var_font_weight('ls-txt',$option,'text_font_weight','700') ;
 	$item_css.= sao_slider_var_size('ls-txt-fn-sz',$option,'text_font_size','size') ;
	$item_css.= sao_slider_var('ls-txt-fn-st',$option,'text_font_style') ;
	$item_css.= sao_slider_var_size('ls-txt-li-ht',$option,'text_line_height','size') ;
	$item_css.= sao_slider_var('ls-txt-de',$option,'text_font_decoration') ;
	
	$item_css.= sao_slider_var('ls-icn-fn-sz',$option,'icon_size') ;
	 
  		 
	 
	
	
	$return['output']= ob_get_clean();
   	$return['css']= $item_css;
	
	return $return;	
}
 }
?>