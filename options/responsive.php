<?php 
 	/*----------------------------------------------------------------
	 Image Style
	 -------------------------------------------------------------*/
	 
	$option[]= array( 
		"name"			=> __('Hide in Desktop','saoshyant-slider'),
 		"id"			=> "hide_desktop",
 		"group"			=>  __('Responsive','saoshyant-slider'),
 		"type"			=> "checkbox",			 
	); 		
/**********************  Tablet *******************************************/
	
	$option[]= array( 
		"name"			=>	esc_html__('Responsive in Tablet','saoshyant-slider'),
 		"id"			=> "tablet_responsive", 
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"type"			=>  "according-start",						
   	); 
 
 
		
	$option[]= array( 
		"name"			=> __('Hide in Tablet','saoshyant-slider'),
 		"id"			=> "hide_table",
 		"group"			=>  __('Responsive','saoshyant-slider'),
 		"type"			=> "checkbox",			 
	); 		
	
	
 
	
	
	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "tablet_padding",
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"desc"			=>  __('Padding around the entire row,Default "0"','saoshyant-slider'),
		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('margin'),						
		 
	);
	 
	
	$option[]= array( 
		"name"			=>	esc_html__('Responsive in Tablet','saoshyant-slider'),
 		"id"			=> "tablet_responsive", 
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"type"			=>  "according-end",						
   	); 
	
	/**********************  Phone *******************************************/
	
 
		
	
	$option[]= array( 
		"name"			=>	esc_html__('Responsive in Mobile','saoshyant-slider'),
 		"id"			=> "mobile_responsive", 
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"type"			=>  "according-start",						
   	); 
 	$option[]= array( 
		"name"			=> __('Hide in Mobile','saoshyant-slider'),
 		"id"			=> "hide_mobile",
 		"group"			=>  __('Responsive','saoshyant-slider'),
 		"type"			=> "checkbox",			 
	); 		
 
	
	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "mobile_padding",
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"desc"			=>  __('Padding around the entire row,Default "0"','saoshyant-slider'),
		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('margin'),						
		 
	);	
	$option[]= array( 
		"name"			=>	esc_html__('Responsive in Mobile','saoshyant-slider'),
 		"id"			=> "mobile_responsive", 
 		"group"			=>  __('Responsive','saoshyant-slider'),
		"type"			=>  "according-end",						
   	); 
 
	
	
				
	?>