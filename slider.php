<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Element Item Sao Slider
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_element_item_sao_slider" )){
add_filter('sao_element_item', 'sao_element_item_sao_slider');
function sao_element_item_sao_slider( $element ) {
 	
 	$element[] = array(
 		'name'			=> __('Saoshyant Slider','saoshyant-slider'),
 		'id'			=> 'sao_slider',
		'img'			=> SAOSIDER_DIR .'assets/image/slider.jpg'
  	); 
   
   
 	return $element;
} 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Element Item Sao Slider Options
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_options" )){
add_filter('sao_element_options_sao_slider', 'sao_slider_options');
function sao_slider_options( $option ) {
	$option = array();
	
	$options_sliders = array();
	$options_sliders_obj = get_categories('taxonomy=sao_sliders&type=sao_slides'); 
 	foreach ($options_sliders_obj as $slider) {
    	$options_sliders[$slider->slug] = $slider->cat_name;
	}	 
 	$option[]= array( 
		"name"			=> __('Title','saoshyant-slider'),
 		"id"			=> "title",
   		"type"			=> "text",
 		  
	);	   
 	$option[]= array( 
		"name"			=> __('Number of Posts to show','saoshyant-slider'),
 		"id"			=> "number",
 		"default"		=> 5,
  		"type"			=> "number",
 		  
	);	    
	
	
	$option[]= array( 
		"name"			=> __('Slider','saoshyant-slider'),
 		"id"			=> "sliders",
    		"type"			=> "select",
		"options"		=>  $options_sliders,						
 	); 	
	
	
	
	$option[]= array( 
		"name"			=> __('Pager','saoshyant-slider'),
 		"id"			=> "pager",
		"default"		=>  1,
 		"group"			=>  __('Slider','saoshyant-slider'),
  		"type"			=> "checkbox",
 	); 		
	
 
	
	
	$option[]= array( 
		"name"			=> __('Position Pager','saoshyant-slider'),
 		"id"			=> "pager_position",
 		"group"			=>  __('Slider','saoshyant-slider'),
		"fold"			=> array( 1 => 'pager'  ),
 		"type"			=> "select",
		"options"		=> array( 
			"top" =>  __('Top','saoshyant-slider'),
			"bottom" =>  __('Bottom','saoshyant-slider')
		),
  		
  	); 	 
	
	$option[]= array( 
		"name"			=>	__('Pager Color','saoshyant-slider'),
 		"id"			=>	"pager_color", 
		"fold"			=> array( 
			1 => "pager" ,
 		),
		"group"			=>  __('Slider','saoshyant-slider'),
	
 		"type"			=> "multi_options",
		"options"		=>  array( 
			array( 
				"name"			=> __('Color','saoshyant-slider'),			
  				"id"			=> "color",
				"type"			=> "color_rgba",
 			),
 	 
			array( 
 				"name"			=> 	__('Active Color','saoshyant-slider'),
 				"id"			=> "active",
  				"type"			=> "color_rgba",
  			),		
		)	
	); 		
	$option[]= array( 
		"name"			=> __('Arrows','saoshyant-slider'),
 		"id"			=> "arrows",
 		"group"			=>  __('Slider','saoshyant-slider'),
		"default"		=>  1,
 		"type"			=> "checkbox",
 	); 		
		

	$option[]= array( 
		"name"			=> esc_html__('Arrow Layout','saoshyant-slider'),
 		"id"			=> "arrow_layout", 
		"fold"			=>	array( 
			"1" => "arrows",
		),
   		"group"			=> esc_html__('Slider','saoshyant-slider'),
 		"type"			=> "multi_options",
		"options"		=>	array( 	
  				array( 
					"name"			=> __('Arrow Location','saoshyant-slider'),
					"id"			=> "location",
					"type"			=> "select",
					"options"			=>	array( 	
						"" 				=>esc_html__('Default','saoshyant-slider'),
						"slider-1" 				=>esc_html__('Location 1','saoshyant-slider'),
						"slider-2" 				=>esc_html__('Location 2','saoshyant-slider'),
						"slider-3" 				=>esc_html__('Location 3','saoshyant-slider'), 	 
					),
				),	
 				array( 
					"name"			=> __('Layout','saoshyant-slider'),			
					"id"			=> "layout",
					"type"			=> "select",
					"options"			=>	array( 	
							""				=> __('Default','saoshyant-slider'),	
							"hover"			=> __('On Hover','saoshyant-slider'),		 
							"fixed"			=> __('Fixed','saoshyant-slider'),		 
						),
				),	
  				array( 
					"name"			=> __('Size','saoshyant-slider'),			
					"id"			=> "size",
					"type"			=> "select",
					"options"			=>	array( 	
							""				=> __('Default','saoshyant-slider'),	
							"small"			=> __('Small','saoshyant-slider'),		 
							"medium"		=> __('Medium','saoshyant-slider'),		 
							"large"			=> __('Large','saoshyant-slider'),		 
						),	
				),	
		 	 		
 		),	
		
  	); 	


	$option[]= array( 
		"name"			=> __('Arrow Color','saoshyant-slider'),
 		"id"			=> "arrow_color",
		"fold"			=>	array( 
			"1" => "arrows",
		),
  		"group"			=> esc_html__('Slider','saoshyant-slider'),
  		"type"			=> "multi_options",
		"options"			=>	array( 	
  			array( 
 				"name"			=> 	__('Background','saoshyant-slider'),
 				"id"			=> "background",
  				"type"			=> "color_rgba",
  			
 			), 	
			
			array( 
				"name"			=> __('Arrow','saoshyant-slider'),			
  				"id"			=> "text",
				"type"			=> "color_rgba",
 			),					
 		
		), 			
	 
	); 			
		
	$option[]= array( 
		"name"			=> __('Arrow Radius','saoshyant-slider'),
 		"id"			=> "arrow_radius",
		"fold"			=>	array( 
			"1" => "arrows",
		),
  		"group"			=> esc_html__('Slider','saoshyant-slider'),
		"type"		=> "number",
 		"desc"			=>  __('by "pexel" example: "15"','saoshyant-slider'),
	); 	
		
	$option[]= array( 
		"name"			=> __('Timer','saoshyant-slider'),
 		"id"			=> "timer",
		"default"		=>  1,
 		"group"			=>  __('Slider','saoshyant-slider'),
 		"type"			=> "checkbox",
 	); 		
 
	$option[]= array( 
		"name"			=>	__('Timer Color','saoshyant-slider'),
 		"id"			=>	"timer_color", 
		"fold"			=> array( 
			1 => "timer" ,
 		),
		"group"			=>  __('Slider','saoshyant-slider'),
  		"type"			=> "multi_options",
		"options"		=>   sao_slider_multi_array_options('background2'),
 	); 


	$option[]= array( 
		"name"			=> __('Auto Play','saoshyant-slider'),
 		"id"			=> "auto",
 		"group"			=>  __('Slider','saoshyant-slider'),
  		"type"			=> "checkbox",
		"default"		=>  1,
	); 	 	  		 

	$option[]= array( 
		"name"			=> __('Loop','saoshyant-slider'),
 		"id"			=> "loop",
 		"group"			=>  __('Slider','saoshyant-slider'),
  		"type"			=> "checkbox",
 	); 	 	  		 
		  
	 
	$option[]= array( 
		"name"			=> __('Animation Speed ,Default "5000"','saoshyant-slider'),
 		"id"			=> "speed",
		"default"		=>  '2000',
 		"group"			=>  __('Slider','saoshyant-slider'),
 		"type"			=> "number",
   	); 	 
	
	$option[]= array( 
		"name"			=> __('Animation Pause Time','saoshyant-slider'),
 		"id"			=> "pause",
 		"group"			=>  __('Slider','saoshyant-slider'),
		"default"		=>  '10000',
 		"type"			=> "number",
   		
  	); 	   	
	 
	 
	$height = array(
		'50'				=>	'50px',
		'100'				=>	'100px',
		'150'				=>	'150px',
		'200'				=>	'200px',
		'300'				=>	'300px',
		'400'				=>	'400px',
		'500'				=>	'500px', 
		'600'				=>	'600px',
		'700'				=>	'700px',
		'800'				=>	'800px',
		'900'				=>	'900px',
		'1000'				=>	'1000px',
 		"custom"			=>  __('Custom','saoshyant-slider'),
		
 		
	);
	$option[]= array( 
		"name"			=> __('Height','saoshyant-slider'),
 		"id"			=> "height",
		"default"		=>  '700',
 		"group"			=>  __('Layout','saoshyant-slider'),
		"type"			=> "select",
   		"options"		=>  $height,						
   	); 	  
	
	$option[]= array( 
		"name"			=> __('Custom Height','saoshyant-slider'),
 		"id"			=> "custom-height",
		"default"		=>  '500',
		"fold"			=> array( 'custom' => 'height'  ),
 		"group"			=>  __('Layout','saoshyant-slider'),
		"type"			=> "number",
   	); 	  
		
	
  	$option[]= array( 
		"name"			=> __('Padding','saoshyant-slider'),
 		"id"			=> "padding",
  		"group"			=>  __('Layout','saoshyant-slider'),
 		"default"		=>   sao_builder_default_padding(),
		
		"type"			=> "multi_options",
 		"options"		=>  sao_slider_multi_array_options('margin'),						
 	);	  
		
	$option[]= array( 
		"name"			=> __('Border Radius','saoshyant-slider'),
 		"id"			=> "radius",
 		"group"			=>  __('Design','saoshyant-slider'),
 		"type"			=> "multi_options",
 		"default"		=>   sao_builder_default_border_radius(),
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
 	include SAOSIDER_PATH . 'options/responsive.php';
    return $option;
} 
 }
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Perview Slider Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_perview_slider_config" )){
add_filter('sao_builder_perview_sao_slider', 'sao_perview_slider_config');
function sao_perview_slider_config( $args ) {
		$key = $args['key'];
		$output='';
		$css='';
 		$option = $args['option'];
		$output.='';
	if(!empty($option['title'])){
		$output.='<h4>'.esc_html($option['title'] ).'</h4>'; 
	}
	$output.='<img src="'.SAOSIDER_DIR.'assets/image/slider.jpg">'; 
	$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
	return $return;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Perview Slider Config
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_config" )){
add_filter('sao_builder_sao_slider', 'sao_slider_config');
function sao_slider_config( $args ,$out = false,$out_css=false) {
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	if ( function_exists ( "sao_element_show" ) && empty($out_css)){
		$sao_element_show =sao_element_show($option);
	}else{
		$sao_element_show = 'show';
	}
	if($sao_element_show=='show'){
		global $sao_custom_enqueue,$sao_slide_script;
		$sao_custom_enqueue=true;
 	  	$sao_slide_script=true;
 	
 		
	ob_start(); 
 	$element_id = !empty( $option['element_id']) ?  ' id=" '.$option['element_id'].' " ' : '';
	$custom_class = !empty( $option['custom_class']) ? $option['custom_class'] : '';	
	$click =  '';

	$sao_cssanime = sao_slider_el_cssanime($option);
	$widows = !empty($option['widows']) ?' target="_blank" ' : '';
   	
 	$css='';
	
	
	$layout = !empty($option['layout']) ?$option['layout'] : '';
	
 
  	$query = sao_slider_query($option);
	$num = $query->post_count; 	
	$pager = !empty($option['pager'])? (!empty($option['pager_position']) ? ' sao-pager-'.$option['pager_position']: ' sao-pager-top'):'';
	$timer = !empty($option['timer']) && ($num !== 1) ? 'sao-timer':'';
 
	
	$classes=array(
		'sao-el-'.$key,
		$custom_class,
		'sao-custom-slider',
 		$pager,
 		'sao-crop',
		 ($num == 1) ?'sao-slider-single':'',
		$timer
 
	);
 
	?>
    
	<aside <?php  sao_slider_el_id($option);?> class="<?php echo esc_attr(join( ' ', $classes ));?>"  <?php  sao_slider_el_cssanime($option);?>  >
  
 
        <div class="sao-slider-list-warp" >
            <div class="sao-slider-list" >
             
                <?php
			$element = sao_slider_post($option,$key ) ; 
		echo!empty($element['output'])?$element['output']:'';
		$css.=!empty($element['css'])?$element['css']:'';
                 ?>
            </div>
            
            
			<?php if(!empty($option['arrows']) && $num>1){?>
            	<div class="sao-arrow-warp"><a class="sao-arrow-prev"></a><a class="sao-arrow-next"></a></div>		
            <?php } ?>
            
            
		</div>
        
        
		<?php
 

		if($num>1){
        $slider_options = array( ); 	
         
         
        $slider_options['pager_position']= !empty($option['pager_position']) ? $option['pager_position'] : 'top';
        $slider_options['mode']=   'fade';
        $slider_options['speed']= !empty($option['speed']) ? (int)$option['speed'] : 2000;
        $slider_options['pause']= !empty($option['pause']) ? (int)$option['pause'] : 5000;;	
        $slider_options['auto']= !empty($option['auto']) ? true :'';	
        $slider_options['between']= 0;	
     
             $slider_options['pager']=  !empty($option['arrows']) || !empty($option['timer'])? true:'';
   
         $slider_options['loop']=!empty($option['loop']) ? true : false;
        $slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
        $slider_options['timer']= !empty($option['timer']) ? $option['timer'] : '';		
 		
		
		$query = sao_slider_query($option);
          sao_slider_lightslider('1',$slider_options);
		}
		?>
    
     


    </aside>
 		
	<?php 
	$image_css='';
 
 	 
 	
	$item = '.sao-el-'.$key.''; 
	$item_css='';
 
 	if(!$num == 1){
 	$item_css.= sao_slider_var_unit('sp',$option,'speed','ms');	 
	$item_css.= sao_slider_var_unit('pu',$option,'pause','ms');	 
	}

	if(!empty($option['pager'])){
	$item_css.= sao_slider_var_2('pg-cr',$option,'pager_color','color');	 
	$item_css.= sao_slider_var_2('pg-cr-atv',$option,'pager_color','active');	 
	}
	
	if(!empty($option['timer'])){
		$item_css.= sao_slider_var_gradient_background_color('ti',$option,'timer_color');
	}
	$height = !empty($option['height']) ?$option['height'] : '500';
 	if($height=='custom'){
		 	$item_css.= sao_slider_var('sl-ht',$option,'custom-height');

 	}else{
		 	$item_css.= sao_slider_var('sl-ht',$option,'height');

 	}
	if($num>1){
 	$item_css.= sao_slider_var_size('sl-rd',$option,'radius','size');
	}else{
 	$item_css.= sao_slider_var_size('sl-it-rd',$option,'radius','size');
	}
 	$item_css.= sao_slider_arrow_layout_css($option); 
  	$item_css.= sao_slider_element_padding($option); 
 	
   	$css.=sao_slider_item_css($item_css,$item);
  	
  	
   	$return['output']= ob_get_clean();
  	$return['css']= $css;
  	$return['emptybefore']= true;
  	$return['emptyafter']= true;
	
	if(!empty($out_css)){
		echo '<style>'.$css.'</style>';
 	} 
	
	return !empty($out)? $return['output'] :$return;
	}
	 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Slider Post
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_post" )){
function sao_slider_post($option =false,$key = false) { 
  	ob_start(); 
	$output ='';
	$css ='';
	$script ='';
  
   	$option['post_type'] = 'sao_slide';
  	$query = sao_slider_query($option);
 	$num = !empty($query->post_count)?$query->post_count:''; 
	
	$output='';
	$count=0;
  	if( $query->have_posts() ) : 
  	while ( $query->have_posts() ) : $query->the_post(); $count++;
	
		global $post;
 		$max_width = get_post_meta($post->ID, 'sao_max_width', true);
  		$width = get_post_meta($post->ID, 'sao_show_width', true);
  		$width_unit = get_post_meta($post->ID, 'sao_show_width_unit', true);
   		$height = get_post_meta($post->ID, 'sao_show_height', true);
  		$height_unit = get_post_meta($post->ID, 'sao_show_height_unit', true);
 		$link = get_post_meta($post->ID, 'sao_slide_link', true);
   		$max_width = get_post_meta($post->ID, 'sao_max_width', true); 
  		$class='';
 		if($count==1 && $num>1){
			$class= 'first-active';
		} 
		?>
		<div class="sao-slider-item <?php echo esc_attr($class);?>   sao-post-<?php echo esc_attr($post->ID);?> ">
  
 
 

		 	<a class="sao-slider-background" href="<?php echo esc_url($link);?>"  ></a>
 	 		<div class="sao-slider-details" data-height="<?php echo $height.$height_unit;?>">
 				<?php
                $element =sao_slider_details($post->ID);
				echo !empty($element['output'])?$element['output']:'';
 				$css.=!empty($element['css'])?$element['css']:'';
				?>
   			 </div>
			</div>	
		<?php
		$item_css='';
		$item_css.='--sao-sl-dt-mx-wt:'.$max_width.'px;--sao-sl-dt-wt:'.$width.$width_unit.';--sao-sl-dt-ht:'.$height.$height_unit.';';	 
 		$background_image = get_post_meta($post->ID, 'sao_background_image', true);
		$thumbnail = !empty($background_image)? wp_get_attachment_image_src($background_image, 'full'):'';
		$style_background='';
		if(!empty($thumbnail[0])){
			$item_css.='--sao-sl-bg-img:url('.$thumbnail[0].');';
		}
		
		
 		$background_color = get_post_meta($post->ID, 'sao_background_color', true);
		 $item_css.= sao_slider_var_gradient_background_color('sl-cr',$background_color);

		$css.=sao_slider_item_css($item_css,'.sao-post-'.$post->ID.'');
 
 

	endwhile;
 	endif; 
	  
	
	
	$return['output']= ob_get_clean();

	$return['css'] = $css;
 	$return['script']= $script;
  	return $return;	
 
}

}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Slider Post
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_ismobile" )){
function sao_slider_ismobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
 }

?>