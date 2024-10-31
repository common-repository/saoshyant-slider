<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_element" )){
add_action('wp_ajax_nopriv_sao_slider_element', 'sao_slider_element');
add_action('wp_ajax_sao_slider_element', 'sao_slider_element');
function sao_slider_element($element_key=false,$element_value=false){
 
	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = sanitize_title($_REQUEST['value']);
		$value['childern'] = sanitize_key($_REQUEST['childern']);
		 
  	}else{
	  $value= $element_value;
	}
 
	$key = !empty($_REQUEST['key']) ? sanitize_key($_REQUEST['key']): $element_key;
	 
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])) {
		
		global $sao_slider_options_element;
		$value_default = array();
		
		foreach ($sao_slider_options_element as  $element) :
			$element_value=sanitize_title($_REQUEST['value']);
			if( $element['id'] == $element_value) {
				$default_width =!empty($element['width'])? $element['width'] :'';
				$default_width_unit =!is_numeric(!empty($element['width_unit']))? $element['width_unit'] :'percentage';
				$default_height =!empty($element['height'])? $element['height'] :'';
				$default_height_unit =!is_numeric(!empty($element['height_unit']))? $element['height_unit'] :'pexel';

				if(!empty($element['options'])) :
				foreach ($element['options'] as $option ):
				
					if(!empty($option['default']) && !empty($option['id'])){
						$value_default[$option['id']] = $option['default'];
					}
					
				endforeach;
				endif;
			}
				
		endforeach;

		$value_option =!empty($value_default)? sao_slider_options_encode($value_default) :'';
		
  	}else{
 		$value_option = $value['option'];
		$default_width_unit ='percentage';
		$default_height_unit = 'pexel';	
		
		$default_width ='';
		$default_height = '';
	}
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_elemnet':'';



 	$top = !empty($value['top']) ? $value['top'] :'';
  	$left = !empty($value['left']) ? $value['left']:'';
 	$width = !empty($value['width']) ? $value['width'] :$default_width;
 	$width_unit = !is_numeric(!empty($value['width_unit'])) ? $value['width_unit'] :$default_width_unit;
 	$height = !empty($value['height']) ? $value['height'] :$default_width;
 	$height_unit =  !is_numeric(!empty($value['height_unit'])) ? $value['height_unit'] :$default_height_unit;
	
	if($width_unit=='percentage'){
		$width_unit='percentage';
	}else{
		$width_unit='pexel';
	}
	
	
	if($height_unit=='percentage'){
		$height_unit='percentage';
	}else{
		$height_unit='pexel';
	}
 	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_element':'show';
	
 	echo '<li id="sao_element_'.esc_attr($key).'" class="sao_element_item sao_slider_element_item  '.esc_attr($template_id).' sao_element_'.esc_attr($value['value']).' sao_row_item" data-key="'.esc_attr($key).'"  data-value="'.esc_attr($value['value']).'"   data-option="'.esc_attr($value_option).'" 
	data-top="'.esc_attr($top).'"
	data-left="'.esc_attr($left).'"
	data-width="'.esc_attr($width).'"
	data-width_unit="'.esc_attr($width_unit).'"
	data-height="'.esc_attr($height).'"
	data-height_unit="'.esc_attr($height_unit).'"
 
 	
	>';
  		 sao_slider_element_value($key,$value); 
 
	echo '</li>';
  if(!empty($_REQUEST['value'])){
	  die(0);
  }
	  
 } 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_element_value" )){
function sao_slider_element_value( $key,$value){
 
	global $sao_slider_options_element;
 
	echo '<div class="sao_row_title sao_element_title">';
		echo '<span class="sao_element_name sao_row_name">';
		 
			if(!empty($sao_slider_options_element)):
			foreach ($sao_slider_options_element as  $options):
				if($options['id'] == $value['value']){
					 if(!empty($options['name'])) echo esc_html($options['name']);
 				} 	
			endforeach;			
			endif;
         
        echo '</span>';
         echo '<a class="sao_row_remove sao_slider_element_remove"></a>';
        echo '<a class="sao_row_options sao_element_options"></a>';
		echo '<a class="sao_row_duplicate sao_slider_element_duplicate"></a>';
		echo '<a class="sao_row_template_save sao_template_save" data-row="slider_element" data-name="'.esc_attr__('Slider Element','saoshyant-slider').'"></a>';

 	echo '</div>';	
	
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_element_list" )){
	
add_action('wp_ajax_nopriv_sao_slider_element_list', 'sao_slider_element_list');
add_action('wp_ajax_sao_slider_element_list', 'sao_slider_element_list');
function sao_slider_element_list() {
	$row_id = !empty($_REQUEST['row_id']) ?sanitize_title($_REQUEST['row_id']):'';
	$template_id = !empty($_REQUEST['template_id']) ?sanitize_title($_REQUEST['template_id']):'';
	
	
	$template =	get_option( 'sao_'.$row_id.'_template');
	$element = sao_slider_options_array_row(urldecode($template[$template_id]['element']));
  	if (!empty($element)) :
	foreach($element as $element_key => $element_value) : 
		sao_slider_element($element_key,$element_value);
	endforeach;
	endif;
 
	die(0);
} 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_element_tabs" )){
function sao_slider_element_tabs(){
	global $sao_slider_options_element;
	$tab= array();
	foreach ($sao_slider_options_element as  $element) :
 		if( $element['id']== $_REQUEST['value']) {
			if($element['options']):
			
			foreach ($element['options'] as $option ) :
				if(!empty($option['group'])){
					$dass = sanitize_title($option['group']);
					if(!array_key_exists($dass,$tab)){
						$tab[sanitize_title($option['group'])] = $option['group'];
					}
				}else{ 	
					$general = esc_html__('General','saoshyant-slider');
					$tab[sanitize_title($general)] = $general;
				}
		
			endforeach;
			endif;
						
			
		}
		
	endforeach;
	return  $tab;
	
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_element_options" )){
add_action('wp_ajax_sao_slider_element_options', 'sao_slider_element_options');
add_action('wp_ajax_nopriv_sao_slider_element_options', 'sao_slider_element_options');
function sao_slider_element_options(){
	
	$value_id = !empty($_REQUEST['option'])?sao_slider_options_decode(urldecode(wp_kses_post($_REQUEST['option']))):'';
 	global $sao_slider_options_element;
 	
	echo '<form id="sao_options_'.esc_attr($_REQUEST['key']).'" class="sao_options sao_options_element sao_slider_options_element  sao_active " data-key="'.esc_attr(sanitize_key($_REQUEST['key'])).'" data-value="'.esc_attr(sanitize_title($_REQUEST['value'])).'">';
	echo '<div class="sao_options_middle">';
		//Title
		echo '<div class="sao_options_title"><h3>'.esc_html__('Options','saoshyant-slider').'</h3><i class="sao_options_close"></i>';
			
			foreach ($sao_slider_options_element as  $element):
				if( $element['id']== $_REQUEST['value']):
					echo '<div class="sao_title_tabs">';
						$array_tab = sao_slider_element_tabs();
						$count_tab=0;
						
						foreach ($array_tab as  $key=> $tabs) :
							$count_tab++;
							if($count_tab==1){
								$tab_active = 'sao_layout_active';
							}else{
								$tab_active = '';
							}
							echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
								
						endforeach;

					echo '</div>';
 				endif;
  			endforeach;
                                     
		echo '</div>';
		//Content
		echo '<ul class="sao_options_content">';
		echo '<div class="sao_options_container">';
							 
			foreach ($sao_slider_options_element as  $element):
				if( $element['id']== sanitize_title($_REQUEST['value'])) {
					$array_tab = sao_slider_element_tabs();
					$count_container=0;
					
					foreach ($array_tab as  $key=> $tabs):
						$count_container++;
						if($count_container==1){
							$group_active = 'sao_layout_group_active';
						}else{
							$group_active = '';
						}
						
						echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
						
							if(!empty($element['options'])):
							foreach ($element['options'] as $option ) :
																	  
								$general = !empty($option['group']) ? sanitize_title($option['group']):sanitize_title(esc_html__('General','saoshyant-slider'));
		
								if($key == $general ){
									if(!empty($option['name']) && !empty($option['id'])  && !empty($option['type'])){
										$data_options = !empty( $option['options'] ) ?  $option['options']  : null;
										$desc = !empty( $option['desc'] ) ?  $option['desc']  : null;
										$placeholder = !empty( $option['placeholder'] ) ?  $option['placeholder']  : null;
										$fold = !empty( $option['fold'] ) ?  $option['fold']  : null;
										sao_slider_options_function($value_id[$option['id']], $option['name'],$option['id'],$option['type'],$data_options,$desc,$placeholder,$fold );
									}
								}
	 
							endforeach;
							endif;
							
						echo '</section>';

					endforeach;
 				}
			endforeach;

		echo '</div>';
		echo '</ul>';
		
		//Bottom
        echo '<div class="sao_options_bottom">';
			echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','saoshyant-slider').'</div>';
			echo '<div class="sao_options_update button-primary">'. esc_html__('Update','saoshyant-slider').'</div>';
		echo '</div>';
		
				 
	echo '</div>';
	echo '</form>';

	die(0);
}
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_model_element_tabs" )){
 
function sao_slider_model_element_tabs(){
 	global $sao_slider_options_element;
	$tab= array();
	
	foreach ($sao_slider_options_element as  $element):
		if(!empty($element['group'])){
			$dass = sanitize_title($element['group']);
			if(!array_key_exists($dass,$tab)){
				$tab[sanitize_title($element['group'])] = $element['group'];
			}
		}else{ 	
			$general = esc_html__('General','saoshyant-slider');
			$tab[sanitize_title($general)] = $general;
		}
	endforeach;
 	return  $tab;
	
}
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	sao_slider_element_value
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_model_element" )){
function sao_slider_model_element() {
	global $sao_slider_options_element; 
	$count=0;
	
    echo '<div class="sao_model sao_model_element">';
	echo '<div class="sao_model_middle">';
		
		// Title
		echo '<div class="sao_model_title"><h3>'. esc_html__('Add Element','saoshyant-slider').'</h3><i class="sao_model_close"></i>';
                
			echo'<div class="sao_title_tabs">';
				$array_tab = sao_slider_model_element_tabs();
				$count_tab=0;
				foreach ($array_tab as  $key=> $tabs):
						$count_tab++;
						if($count_tab==1){
							$tab_active = 'sao_layout_active';
						}else{
							$tab_active = '';
						}
						echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
				endforeach;								
			echo'</div>';
				
		echo '</div>';
		//Content         
 		echo '<ul class="sao_model_content">';
			
			$array_tab = sao_slider_model_element_tabs();
			$count_container=0;
			foreach ($array_tab as  $key=> $tabs) :
				$count_container++;
				if($count_container==1){
					$group_active = 'sao_layout_group_active';
				}else{
					$group_active = '';
				}
				
 			
				echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
					foreach ($sao_slider_options_element as  $value): 
																						  
						$general = !empty($value['group']) ? sanitize_title($value['group']):sanitize_title(esc_html__('General','saoshyant-slider'));
						if($key == $general ){
							echo '<li class="sao_model_item" data-element="'.esc_attr($value['id']).'" >';
							echo '<img src="'.esc_url($value['img']).'" />';
										
								if(!empty($value['name'])){ 
									echo '<span>'.esc_html($value['name']).'</span>';
								}
										
							echo '</li>';
							echo '<div class="sao-row-1-8"></div>';
		
						}
							
					endforeach;
				echo '</section>';
				
			endforeach;
      
		echo '</ul>';
		//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_model_add button-primary">'.esc_html__('Add','saoshyant-slider').'</div>';
		echo '</div>';
		
		
	echo '</div>';	
	echo '</div>';
  	
}
}

add_action('wp_ajax_sao_slider_element_perview', 'sao_slider_element_perview');
add_action('wp_ajax_nopriv_sao_slider_element_perview', 'sao_slider_element_perview');
function sao_slider_element_perview($val =false,$opt =false,$key =false){
	 
	if(!empty($_REQUEST['default'])){
		$value = $val;
  		$option = $opt;
  		$key = sanitize_key($_REQUEST['key']);
 		$p_id = sanitize_key($_REQUEST['post_id']);
		
	}elseif(!empty($_REQUEST['value'])){
  		$value =sanitize_title( $_REQUEST['value']);
   		$option = sao_slider_options_decode( urldecode(sao_slider_options_encode(wp_kses_post($_REQUEST['option']))));
  		$key = sanitize_key($_REQUEST['key']);
 		$p_id = sanitize_key($_REQUEST['post_id']);
		
	}else{
  		$value = $val;
  		$option = $opt;
		global $post;
		$p_id = $post->ID;
		$key = '';
  		 
	}	 
 	$args['post_id'] = $p_id;
 	$args['key'] = $key;
	$args['option'] = $option;
	
	if(has_filter('sao_slider_'.$value)) {
		$filter =apply_filters('sao_slider_'.$value, $args) ;	
 		
		if(!empty($_REQUEST['default'])){
		echo '<li  id="draggable" class="ui-widget-content  sao-element-draggable  sao-element-'.esc_attr($key).' sao-element-item sao_element_'.esc_attr($element_value['value']).' sao-auto-width " data-id="'.esc_attr($key).'">'; 
		}
			echo $filter['output'];
			$rtl = is_rtl() ? 'w':'e';
			echo '<div class="ui-resizable-handle ui-resizable-'.esc_attr($rtl).'"  ></div>';
			echo '<div class="ui-resizable-handle ui-resizable-s" ></div>';
 		echo '</li>';
		echo '<style>';		
		echo esc_html($filter['css']); 					  						
		echo '</style>';
		if(!empty($_REQUEST['default'])){
		echo '</li>'; 
		}
 		 					  						
	}
	if(!empty($_REQUEST['value'])){
		die(0);
	}
}
  
 
add_action('wp_ajax_nopriv_sao_slider_element_detailst', 'sao_slider_element_details');
add_action('wp_ajax_sao_slider_element_details', 'sao_slider_element_details');
function sao_slider_element_details($element_key=false,$element_value=false){
 
	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] =  sanitize_title($_REQUEST['value']);
		$value['childern'] =  sanitize_key($_REQUEST['childern']);
		 
  	}else{
	  $value= $element_value;
	}
 
	$key = !empty($_REQUEST['key']) ? sanitize_key($_REQUEST['key']): $element_key;
	 
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])) {
		
		global $sao_slider_options_element;
		$value_default = array();
		
		foreach ($sao_slider_options_element as  $element) :
		$r_value = sanitize_title($_REQUEST['value']);
			if( $element['id'] == $r_value) {
				
				if(!empty($element['options'])) :
				foreach ($element['options'] as $option ):
				
					if(!empty($option['default']) && !empty($option['id'])){
						$value_default[$option['id']] = $option['default'];
					}
					
				endforeach;
				endif;
			}
				
		endforeach;

		$value_option =!empty($value_default)? sao_slider_options_encode($value_default) :'';
		
  	}else{
 		$value_option = $value['option'];
	}
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_elemnet':'';

 
	echo sao_slider_element_perview($value['value'],sao_slider_options_decode(urldecode($value_option)));
 
 }  
 