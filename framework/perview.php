<?php
 
 
function sao_slider_data($option=false,$id=false,$def = false){
   	$option_id = !empty( $option[$id] ) ? $option[$id] : $def;
     $ajax_sao_evalue_id = isset($_REQUEST[$id]) ? $_REQUEST[$id] : $option_id; 
	return $ajax_sao_evalue_id;
	
} 
  
function sao_slide_perview_ajax($sao_show=false){
  	
	
	global $post;
	$post_id = $post->ID;
 	$background_image = get_post_meta($post_id, 'sao_background_image', true);
		$thumbnail = !empty($background_image)? wp_get_attachment_image_src($background_image, 'full'):'';
		$style_background='';
		if(!empty($thumbnail[0])){
		$style_background='style="--sao-sl-bg-img:url('.$thumbnail[0].')"';
		}
	echo '<div class="sao-slider-item  sao-slider-main sao-post-'.esc_attr($post_id).'">';
  	echo '<a class="sao-slider-background"  '.$style_background.' ></a>';
 	echo '<div class="sao-slider-details sao-auto-width-item">';
	sao_slide_perview_details($post_id);
	echo '</div>';	
		  
 	echo '</div>';	
 
	
		
	
	if(!empty($_REQUEST['element'])){
 		die();
	}
}
add_action('wp_ajax_nopriv_sao_slide_perview_ajax', 'sao_slide_perview_ajax');
add_action('wp_ajax_sao_slide_perview_ajax', 'sao_slide_perview_ajax');



add_action('wp_ajax_nopriv_sao_slide_perview_details', 'sao_slide_perview_details');
add_action('wp_ajax_sao_slide_perview_details', 'sao_slide_perview_details');
function sao_slide_perview_details($post_id =false){
	
	
	 
	if(!empty($_REQUEST['element'])){
 		$element_json = stripslashes(wp_kses_post($_REQUEST['element']));
 		$p_id =  sanitize_key($_REQUEST['post_id']);
	}else{
 		$element_json = get_post_meta($post_id, 'sao_element', true);
		$p_id = $post_id;

	}
   	$element = sao_slider_options_array_row($element_json);	
 
	 $responsive = sao_slider_data('','responsive','main');
	
 	if(!empty($element)):
	foreach($element as $element_key=> $element_value):  
 			$element_option = sao_slider_options_decode(urldecode($element_value['option']));
			 
			
			$effect_class= sao_slider_effect_class($element_option);
		$time_end = $element_option['time_end']?$element_option['time_end']:'0';
		$time_start = $element_option['time_start']?$element_option['time_start']:'0';
			
			echo '<li  id="draggable" class="ui-widget-content  sao-element-draggable   '.sao_slider_effect_class($element_option).' sao-element-'.esc_attr($element_key).'   sao-ls-'.esc_attr($element_key).' sao-element-item sao_'.esc_attr($element_value['value']).'  " data-id="'.esc_attr($element_key).'"   data-id="'.esc_attr($element_key).'"  data-end="'.$time_end.'" data-start="'.$time_start.'"  style="'.sao_slider_effect( $element_option).' '. sao_style_detailes($element_value).'" >';
				$args['key'] = $element_key;
				$args['post_id'] = $p_id ;
				$args['option'] = $element_option;
				if(has_filter('sao_slider_'.$element_value['value'])) {
					$filter =apply_filters('sao_slider_'.$element_value['value'], $args);
					
					echo !empty($filter['output'])?$filter['output']:'';
 					
 					echo '<style>';
  					if(!empty($filter['css'])){
  					echo '.sao-ls-'.$element_key.'{'.$filter['css'].'}';
 					}
					echo '</style>';
	  	
 			echo '</li>';
			} 
		
		
		
		
	endforeach;			
	endif;	 
if(!empty($_REQUEST['element'])){
 		die();
	}
} 



function sao_slider_resposive($class=false,$classname=false,$width=false,$width_unit=false,$height=false,$height_unit=false) {
	
 		if($class == 'main'){
			$active= 'sao-slider-responsive-size-active';
		}else{
			$active ='';
		}
		echo '<div id="sao-slider-responsive-'.esc_attr($class).'"  class="sao-slider-responsive-size '.esc_attr($active).'">';      
			echo '<label>'.esc_html__('Width','saoshyant-slider').'</label>';
			echo '<input class="sao-slider-perview-width"  type="text"  name="sao_show_'.esc_attr($classname).'width"  value="'.esc_attr($width).'">';
			
			
			echo '<select class="sao-slider-perview-width-unit"  name="sao_show_'.esc_attr($classname).'width_unit">';
			  foreach(sao_slider_array_options('unit') as $key => $name){
              	echo '<option value="'.esc_attr($key).'" '.selected( $width_unit ,  $key).' >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			echo '<label>'.esc_html__('Height','saoshyant-slider').'</label>';

			echo '<input   type="text" class="sao-slider-perview-height"  name="sao_show_'.esc_attr($classname).'height"  value="'.esc_attr($height).'">';
			
			
			echo '<select class="sao-slider-perview-height-unit"  name="sao_show_'.esc_attr($classname).'height_unit">';
			  foreach(sao_slider_array_options('unit') as $key => $name){
              	echo '<option value="'.esc_attr($key).'" '.selected( $height_unit ,  $key).' >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			echo '</div>';
			
	 }		

 
 
add_action('save_post', 'sao_slider_perview_save'); 
function sao_slider_perview_save($post_id) {
 
    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
 
}
