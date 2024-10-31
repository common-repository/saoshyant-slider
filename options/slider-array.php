<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Radius Mini
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_builder_default_padding" )){
function sao_builder_default_padding() {

	if(has_filter('sao_builder_element_padding')) {
			$sao_builder_element_padding = apply_filters('sao_builder_element_padding','padding');
		}else{
			$sao_builder_element_padding =array( 
			"top"			=> '20',
			"left"			=> '20',
			"bottom"		=> '20',
			"right"			=> '20',
 			);
	}
	return $sao_builder_element_padding;	
}
 }
 
 if ( !function_exists ( "sao_elementor_default_padding" )){
function sao_elementor_default_padding() {

		if(has_filter('sao_builder_element_padding')) {
			$sao_elementor_element_padding = apply_filters('sao_elementor_element_padding','padding');
		}else{
			$sao_elementor_element_padding = '20px';
		}
 
	return $sao_elementor_element_padding;	
}
 } 
if ( !function_exists ( "sao_builder_default_border_radius" )){
function sao_builder_default_border_radius() {
	 

	if(has_filter('sao_builder_border_radius')) {
			$sao_builder_border_radius = apply_filters('sao_builder_border_radius','radius');
		}else{
			$sao_builder_border_radius =array( 
			"size"			=> '0',
			""			=> '',
  			);
	}
	return $sao_builder_border_radius;	
}
}


if ( !function_exists ( "sao_elementor_default_border_radius" )){
function sao_elementor_default_border_radius() {
	 

	if(has_filter('sao_elementor_border_radius')) {
			$sao_elementor_border_radius = apply_filters('sao_elementor_border_radius','radius');
		}else{
			$sao_elementor_border_radius =  '0';
	}
	return $sao_elementor_border_radius;	
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Radius Mini
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(is_admin()){
function sao_slider_array_options($value) {
	
 	$options['unit']= array(
		'px'				=>	'px',
		'%'					=>	'%', 
		'em'				=>	'em',
 		
	);
	
	$options['align']= array(
 		'left'				=> is_rtl() ? esc_html__('Right','saoshyant-slider'):esc_html__('Left','saoshyant-slider'),  
		'center'			=> esc_html__('Center','saoshyant-slider'), 
		'right'				=> is_rtl() ? esc_html__('Left','saoshyant-slider'):esc_html__('Right','saoshyant-slider'),  
   		
	);	
	
$options['align_mini']= array(
 		'left'				=> is_rtl() ? esc_html__('Right','saoshyant-slider'):esc_html__('Left','saoshyant-slider'),  
 		'right'				=> is_rtl() ? esc_html__('Left','saoshyant-slider'):esc_html__('Right','saoshyant-slider'),  
   		
	);		
		$options['button'] = array(
 			'style-1'					=> esc_html__('Style 1','saoshyant-slider'),  
  			'style-2'					=> esc_html__('Style 2:Top Border inset','saoshyant-slider'),  
 			'style-3'					=> esc_html__('Style 3:Bottom Border inset','saoshyant-slider'),  
 			'style-4'					=> is_rtl()?  __('Style 5:Right Border inset','saoshyant-slider'): __('Style 4:Left Border inset','saoshyant-slider'),  
 			'style-5'					=> is_rtl()?   __('Style 4:Left Border inset','saoshyant-slider'): __('Style 5:Right Border inset','saoshyant-slider'),  
 			'style-6'					=> esc_html__('Style 6:Icon Background color','saoshyant-slider'),   
 			'style-7'					=> esc_html__('Style 7:none boxed','saoshyant-slider'),   
 	); 	
		$options['border_style']= array(
	
		'solid'			=>esc_html__('Solid','saoshyant-slider'), 
		'dotted'		=> esc_html__('Dotted','saoshyant-slider'), 
		'dashed'		=> esc_html__('Dashed','saoshyant-slider'), 
		'double'		=> esc_html__('Double','saoshyant-slider'), 
		'groove'		=> esc_html__('Groove','saoshyant-slider'), 
		'ridge'			=> esc_html__('Ridge','saoshyant-slider'), 
		'inset'			=> esc_html__('Inset','saoshyant-slider'), 
		'outset'		=> esc_html__('Outset','saoshyant-slider'), 
		'none'			=> esc_html__('None','saoshyant-slider'), 
		'hidden'			=> esc_html__('hidden','saoshyant-slider'), 
 		 
		 
		
		
 	);	
  return $options[$value];

 }	

function sao_slider_multi_array_options($value) {
		 $options['background2'] =array(
			array(
						"name"		=>  esc_html__('First Color','saoshyant-slider'),
						"id"		=> "first",
						"type"		=> "color_rgba",
  					),
					array(
						"name"		=>  esc_html__('Second Color','saoshyant-slider'),
						"id"		=> "second",
						"type"		=> "color_rgba",
  					),	
					array(
						"name"		=>  esc_html__('Orientation','saoshyant-slider'),
						"id"		=> "orientation",
						"type"		=> "select",
						"options"	=> array(
							"horizontal"		=>  esc_html__('horizontal  →','saoshyant-slider'),
							"vertical"			=>  esc_html__('vertical  ↓','saoshyant-slider'),
							"diagonal"			=>  esc_html__('diagonal  ↘','saoshyant-slider'),
							"diagonal-bottom"	=>  esc_html__('diagonal  ↗','saoshyant-slider'),
							"radial"			=>  esc_html__('radial  ○','saoshyant-slider'),

  						),
				),
	);	
	$options['margin'] = array( 
			array( 
				"name"			=> esc_html__('Top','saoshyant-slider'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=> is_rtl()? __('Left','saoshyant-slider'):__('Right','saoshyant-slider'),  
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Bottom','saoshyant-slider'),
				"id"			=> "bottom",
 				"type"			=> "number",
 			),
			array( 
				"name"			=> is_rtl()? __('Right','saoshyant-slider'): __('Left','saoshyant-slider'),
  				"id"			=> "left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),
  	);
	$options['text_shadow'] = array( 
			array( 
				"name"			=> esc_html__('Horizontal','saoshyant-slider'),			
  				"id"			=> "horizontal",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html__('Vertical','saoshyant-slider'),
 				"id"			=> "vertical",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Blur','saoshyant-slider'),
				"id"			=> "blur",
 				"type"			=> "number",
 			),
 		 
			array( 
 				"name"			=> 	esc_html__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
			 
			);
 
 
 $options['border'] = array( 
			array( 
				"name"			=> esc_html__('Top','saoshyant-slider'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=> is_rtl()?__('Left','saoshyant-slider'):__('Right','saoshyant-slider'),
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Bottom','saoshyant-slider'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			),
			array( 
				"name"			=> is_rtl()?__('Right','saoshyant-slider'):__('Left','saoshyant-slider'),
  				"id"			=> "left",
 				"type"			=> "number",
 			),	
	 
			array( 
 				"name"			=> 	esc_html__('Style','saoshyant-slider'),
 				"id"			=> "style",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('border_style'),
 			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),	
  		); 
		$options['shadow'] = array( 
			array( 
				"name"			=> esc_html__('Horizontal','saoshyant-slider'),			
  				"id"			=> "horizontal",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html__('Vertical','saoshyant-slider'),
 				"id"			=> "vertical",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Blur','saoshyant-slider'),
				"id"			=> "blur",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html__('Spread','saoshyant-slider'),
  				"id"			=> "spread",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
			array( 
  				"id"			=> "position",
  				"type"			=> "select",
				"options"		=>  array( 
   					""			=> esc_html__('Outline','saoshyant-slider'),
 					"inset"		=> esc_html__('Inset','saoshyant-slider'),
 				),
 			),
			);
 	$options['radius'] = array( 
			array( 
				"name"			=> is_rtl()? esc_html__('Top Right','saoshyant-slider'): esc_html__('Top Left','saoshyant-slider'),			
  				"id"			=> "top_left",
				"type"			=> "number",
 			),
			array( 
				"name"			=>  is_rtl()?  esc_html__('Top Left','saoshyant-slider'): esc_html__('Top Right','saoshyant-slider'),
 				"id"			=> "top_right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> is_rtl()?   esc_html__('Bottom Left','saoshyant-slider'):esc_html__('Bottom Right','saoshyant-slider'),
				"id"			=> "bottom_right",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  is_rtl()?  esc_html__('Bottom Right','saoshyant-slider'):esc_html__('Bottom Left','saoshyant-slider'),
  				"id"			=> "bottom_left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),	
 
 		); 
		
		$options['padding_mini'] = array( 
			array( 
				"name"			=> esc_html__('Top and Bottom','saoshyant-slider'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=>  __('Left and Right','saoshyant-slider'),  
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
						array( 
 				"name"			=> 	esc_html__('Unit','saoshyant-slider'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_slider_array_options('unit'),
 			),
		 
  	);	
return $options[$value];
  
 }	
}
?>