<?php

function sao_slider_details($post_id) { 
 		global $sao_custom_enqueue,$sao_slide_script;
		$sao_custom_enqueue=true;
 	  	$sao_slide_script=true;
	$output='';
	$css='';
	$script ='';
	$element_json = get_post_meta($post_id, 'sao_element', true);
  	$element = sao_slider_options_array_row($element_json);	
	
	if(!empty($element)):
	foreach($element as $element_key=> $element_value):  
 
 
 			$element_option = sao_slider_options_decode(urldecode($element_value['option']));
				$args['key'] = $element_key;
				$args['option'] = $element_option;
				$args['post_id'] = $post_id;
 
			$effect_class= sao_slider_effect_class($element_option);
  
 			$output.= '<aside  class="sao-ls-'.esc_attr($element_key).' '.$effect_class .' ">';
 
				if(has_filter('sao_slider_'.$element_value['value'])) {
					$filter =apply_filters('sao_slider_'.$element_value['value'], $args);
					$output.=!empty($filter['output'])?$filter['output']:'';
					
 
					$item_css=!empty($filter['css'])?$filter['css']:'';
 													 
				}
 						
			$output.= '</aside>';
			
 		   
 
 		$item_css.= sao_style_detailes($element_value,'').sao_slider_effect($element_option);	
 		$css.= sao_slider_item_css($item_css,'.sao-post-'.$post_id.' .sao-ls-'.$element_key );	

 
		 
	endforeach;			
	endif;	
 
			 
	$return['css'] = $css;
	$return['output']= $output;
   	return $return;				 
  
}  
function sao_style_detailes($element_value,$id =false) { 
			$rtl = is_rtl()?'rt':'lt';
			$top = !empty($element_value['top']) ?  '--sao-ls-tp:'.$element_value['top'].'px;' :'';
			$left = !empty($element_value['left']) ? '--sao-ls-'.$rtl.':'.$element_value['left'].'px;':'';
 			$width_unit = !empty($element_value['width_unit']) ? $element_value['width_unit'] : (!empty($element_value['width_unit'])?$element_value['width_unit']:'');
 			if($width_unit == "percentage"){
				$width = !empty($element_value['width']) ? '--sao-ls-wt:'.$element_value['width'].'%;' :'';
  			}elseif( $width_unit == "auto"){
 				$width = !empty($element_value['width']) ? '--sao-ls-wt:auto;' :'';
			}else {
				$width = !empty($element_value['width']) ? '--sao-ls-wt:'.$element_value['width'].'px;' :'';
 			} 
 			$height_unit = !empty($element_value['height_unit']) ? $element_value['height_unit'] : (!empty($element_value['height_unit'])?$element_value['height_unit']:'');
			if($height_unit == "percentage"){
				$height = !empty($element_value['height']) ? '--sao-ls-ht:'.$element_value['height'].'%;' :'';
  			}elseif( $height_unit == "auto"){
 				$height = !empty($element_value['height']) ? '--sao-ls-ht:auto;' :'';
			}else {
				$height = !empty($element_value['height']) ? '--sao-ls-ht:'.$element_value['height'].'px;' :'';
 			} 
			
 			 
 
		return $top.$left.$width.$height;			
}
function sao_slider_effect( $element_option =false) {
			
			$sao_slider_ismobile = sao_slider_ismobile();
			
 			$effect = !empty($element_option['effect'] )? $element_option['effect']:'';
		 
			$start = !empty($element_option['time_start'] )? $element_option['time_start']:'0';
			$end = !empty($element_option['time_end'] )? $element_option['time_end']:'500';
 			$css ='';
 			
			if($effect=='scale'){
			$scale = !empty($element_option['scale'] )? $element_option['scale']:'2';
			$css.="--sao-ls-ef-sc:".$element_option['scale'].";";
			}
			$css.="--sao-ls-ef-st:".$element_option['time_start']."ms;";
			$css.="--sao-ls-ef-en:".($end - $start)."ms;";
 			
			
			return $css;
			
		 
			 
}
function sao_slider_effect_class( $element_option =false ) {
	$class='';
			$effect = !empty($element_option['effect'] )? $element_option['effect']:'';
			$initial = !empty($element_option['initial'] )? $element_option['initial']:'top';
			 
			if($effect=='move'){
				$initial = !empty($element_option['initial'] )? $element_option['initial']:'top';
					if(is_rtl() && $initial == 'left'){ 
						$initial_class ='right';
					} elseif(is_rtl() && $initial == 'right'){ 
						$initial_class ='left';
					}else{
						$initial_class =$initial;
					}
				
 				
 				$class='sao-effect-move-'.$initial_class;
			}elseif($effect=='fade'){
 				$class='sao-effect-fade';
			}elseif($effect=='scale'){
 				$class='sao-effect-scale';
			}
	
		return $class;			
 
}
