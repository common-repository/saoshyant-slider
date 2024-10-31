<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Button Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (is_admin()){
if ( !function_exists ( "sao_slider_button_options" )){
add_filter('sao_slider_element_options', 'sao_slider_button_options');
function sao_slider_button_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	__('Button','saoshyant-slider'),
 		'id'			=> 'slider_button',
 		'width'			=> 'auto',
 		'width_unit'	=> 'auto',
 		'height'		=> 'auto',
 		'height_unit'	=> 'auto',
		'img'			=>  SAOSIDER_DIR .'assets/image/button.jpg'
  	); 
   
	
 
	$option[]= array( 
		"name"			=> __('Text','saoshyant-slider'),
 		"default"		=> __('Button','saoshyant-slider'),
 		"id"			=> "text",
 		"type"			=> "text",
 		  
	); 
 
	$option[]=array(
  				"name"		=>  __('Icon','saoshyant-slider'),
  				"id"		=> "icon",
 				"type"		=> "icon",
	);	
			
	$option[] = array(
  				"name"		=>  __('Open in new window','saoshyant-slider'),
  				"id"		=> "widows",
 				"type"		=> "checkbox",
				
 	);	
	$option[]= array( 
		"name"			=> __('Link','saoshyant-slider'),
 		"id"			=> "link",
   		"type"			=> "text",
 		  
	); 
 

	$option[]= array( 
		"name"			=> __('Icon Alignment','saoshyant-slider'),
 		"id"			=> "icon_alignment",
 		"group"			=>  __('Layout','saoshyant-slider'),
  		"type"			=> "select",
		"options"		=> sao_slider_array_options('align_mini')					
		 
	);	
	$option[]= array( 
		"name"			=> __('Alignment','saoshyant-slider'),
 		"id"			=> "alignment",
 		"group"			=>  __('Layout','saoshyant-slider'),
		"default"		=>  'center',
		"desc"			=>  __('Default "Center"','saoshyant-slider'),
		"type"			=> "select",
		"options"		=>  sao_slider_array_options('align')					
		 
	); 
 
 	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "padding",
  		"group"			=>  __('Layout','saoshyant-slider'),
 
		
		"type"			=> "multi_options",
 		"options"		=>   sao_slider_multi_array_options('padding_mini'),								
 	); 
	
/*----------------------------------------------------------------
	 Button Style
	 -------------------------------------------------------------*/	
	 
$option[]=array(
  				"name"		=>  __('Style Button','saoshyant-slider'),
  				"id"		=> "style",
 				"group"			=>  __('Design','saoshyant-slider'),
 				"type"		=> "select",
				"options"		=>   sao_slider_array_options('button'),						
 			);	 
	$option[]= array( 
		"name"				=> __('Button Style','saoshyant-slider'),
 		"id"				=> "button_start", 
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
		"name"			=> __('Background Color','saoshyant-slider'),
 		"id"			=> "background",
		"default"		=>  array( 
			"first"			=> '#0000ff',
 			), 		
 		"group"			=>  __('Design','saoshyant-slider'),
		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('background2'),
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
		"default"		=>  array( 
			"top_left"			=> '5',
			"top_right"			=> '5',
			"bottom_right"			=> '5',
			"bottom_left"			=> '5',
 			), 
		
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('radius'),						
	 
	); 	 	
	
	$option[]= array( 
		"name"				=> __('Button Style','saoshyant-slider'),
 		"id"				=> "button_end", 
 		"group"			=>  __('Design','saoshyant-slider'),
  		"type"				=>  "according-end",						
   	); 					
	
	
/*----------------------------------------------------------------
	 Hover  Style
	 -------------------------------------------------------------*/	
 
	
	$option[]= array( 
		"name"			=> __('On Hover Style','saoshyant-slider'),
 		"id"			=> "hover_button_start", 
 		"group"			=>  __('Design','saoshyant-slider'),
  		"type"			=>  "according-start",						
   	); 		
 
		$option[]= array(
  				"name"		=>  __('Hover Text Color','saoshyant-slider'),
  				"id"		=> "hover_text_color",
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
 		"id"			=> "hover_background",
 		"group"			=>  __('Design','saoshyant-slider'),
		"type"			=> "multi_options",
		"options"		=>  sao_slider_multi_array_options('background2'),
 	);			
	
 $option[]= array( 
		"name"			=> __('Hover Border','saoshyant-slider'),
 		"id"			=> "hover_border",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('border'),						
	); 	
	
	
	$option[]= array( 
		"name"			=> __('Hover Box Shadow','saoshyant-slider'),
 		"id"			=> "hover_shadow",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('shadow'),						
 	); 	
	
	$option[]= array( 
		"name"			=> __('On Hover Style','saoshyant-slider'),
 		"id"			=> "hover_button_end", 
 		"group"			=>  __('Design','saoshyant-slider'),
  		"type"			=>  "according-end",						
   	);
 
	
 
	 
	
	$option[]= array( 
		"name"			=> __('Text Font Size','saoshyant-slider'),
 		"id"			=> "text_font_size",
  		"default"		=> array('size'=>'20'),
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
 
															 	Slider Button Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_button_config" )){

add_filter('sao_slider_slider_button', 'sao_slider_button_config');
function sao_slider_button_config( $args ) {
	$option = $args['option'];
	$key = $args['key'];
	$post_id = $args['post_id'];
	$output='';
	$css =''; 
	ob_start(); 

	global $sao_button_style;
	$sao_button_style++;	
 
 	$output ='';
  	 
 
	
 
  	//*********************************************************************START****************************************************/
	?>
   
 	
   		<?php
		$count=0;
		$style_6=false;
		
 

 		 
 				$class_button = 'sao-btn'; 
				 
 				$link =  !empty($option['link'])  ? $option['link'] : '';		
				$widows = !empty($option['widows']) ?' target="_blank" ' : '';
						
				if(!empty($option['icon'])){
					global $sao_awesome_style;
					$sao_awesome_style++;			
					$class_button.=' '.$option['icon'].' ';
			 
				} 
				$icon_alignment =!empty($option['icon_alignment'])?$option['icon_alignment']:'';
				if($icon_alignment=='right'){
					$class_button.=' sao-all-btn-icon-'.sao_slider_rtl_right();
				} 
				 
				$style =  !empty($option['style'])  ? $option['style'] : '';		
			 
				
				//*********************************************************************START Buttom****************************************************/
				if(!empty($option['text'])){
 					?>
   					 <a class="<?php echo esc_attr($class_button);?>" href="<?php echo esc_url($link );?>"  <?php echo wp_kses_post($widows);?> ><?php echo esc_html($option['text']);?></a>
					<?php
                 }
                 
                 
			 
                //*********************************************************************END Buttom****************************************************/
   
                
                $item_css='';
                if(!empty($option['text'])) {
                $item_css.= sao_slider_var_2('btn-cr',$option ,'text_color','main');
                $item_css.= sao_slider_var_2('hv-btn-cr',$option ,'hover_text_color','main');
                }
                
         
                if( !empty($option['icon'])){
                    $item_css.= sao_slider_var_2('btn-icn-cr',$option ,'text_color','icon');
                    $item_css.= sao_slider_var_2('hv-btn-icn-cr',$option ,'hover_text_color','icon');
                }
                 
         
                 
                if($style=='style-6'){
                     
                    $item_css.=  sao_slider_var_button_icon_padding($option,'padding',$icon_alignment);
                    $item_css.=  sao_slider_var_button_padding_style_6($option,'padding',$icon_alignment);
         
           
                    $item_css.= sao_slider_var_2('btn-bg',$option ,'background','first');
                    $item_css.= sao_slider_var_2('btn-bg-sn',$option ,'background','second');
                    
                    $item_css.= sao_slider_var_2('hv-btn-bg',$option ,'hover_background','first');
                    $item_css.= sao_slider_var_2('hv-btn-bg-sn',$option ,'hover_background','second');
                 
                 
                    
                }elseif($style=='style-7'){
                    $item_css = '--sao-btn-pd:0px ; '; 
                 
                }else{
                    $item_css.=  sao_slider_var_padding_mini('btn',$option,'padding');
                    
                     $item_css.= sao_slider_var_gradient_background_color('btn',$option,'background');
                     $item_css.= sao_slider_var_gradient_background_color('hv-btn',$option,'hover_background');
                     
                     $item_css.= sao_slider_var_border('btn',$option,'border');
                     $item_css.= sao_slider_var_border('hv-btn',$option,'hover_border');
                      
                     $item_css.=sao_slider_var_button_style($option);
                }
       
             ?>
              

	
  	<?php 
	
	//*********************************************************************END****************************************************/


 	 
	$item='.sao-post-'.$post_id.' .sao-ls-'.$key;
   
 	$item_css.=sao_slider_var_align('ls-ag',$option,'alignment');	
	$item_css.= sao_slider_var_radius('btn',$option,'radius'); 
	$item_css.= sao_slider_var_shadow('btn',$option,'shadow');
	$item_css.= sao_slider_var_shadow('hv-btn',$option,'hover_shadow');
	 
 
  	$item_css.= sao_slider_var_size('btn-fn-sz',$option,'text_font_size','size') ;
  	$item_css.= sao_slider_var_size('sl-btn-fn-sz',$option,'text_font_size','size') ;
	$item_css.= sao_slider_var_font_weight('btn',$option,'text_font_weight','500') ;
	$item_css.= sao_slider_var('btn-fn-st',$option,'text_font_style') ;
	$item_css.= sao_slider_var('btn-de',$option,'text_font_decoration') ;
 
  	
	 
	$return['output']= ob_get_clean();	
   	$return['css']= $item_css;

	
	return $return;	
}
}
?>