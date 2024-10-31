<?php

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Element Item
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_item_css" )){
function sao_slider_item_css($id,$item ) {
	$css="";
	if(!empty($id)){
		$css= $item .'{'.$id.'}';
	}
 	return $css;	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Var
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_var" )){
function sao_slider_var( $name,$option,$id   ) {
	$css=""; 
 
 	if(!empty($option[$id])){
		
		$css.= '--sao-'.$name.':'.esc_html($option[$id]).';';
	}
 	return $css;	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Var
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_var_2" )){
function sao_slider_var_2( $name,$option,$id,$id_2=false  ) {
	$css=""; 
 
 	if(!empty($option[$id][$id_2])){
		
		$css.= '--sao-'.$name.':'.esc_html($option[$id][$id_2]).';';
	}
 	return $css;	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Unit
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_var_unit" )){

function sao_slider_var_unit( $name,$option,$id,$amount='px'  ) {
	$css=""; 
  	if(!empty($option[$id])){
		$css.= '--sao-'.$name.':'.esc_html($option[$id]).$amount.';';
	}
 	return $css;	
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Size
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_var_size" )){

function sao_slider_var_size( $name,$option,$id ,$id_2 =false ) {
	$css="";
  	if(isset($option[$id][$id_2])){
		$text_font_size_unit = !empty($option[$id]['unit']) ? $option[$id]['unit'] : 'px';
		$css.= intval($option[$id][$id_2]) ? ' --sao-'.$name.':'.esc_html($option[$id][$id_2]).$text_font_size_unit.' ;': '';
	}
	return $css;	
}
 }

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Font Weight
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if ( !function_exists ( "sao_slider_var_font_weight" )){
function sao_slider_var_font_weight( $name,$option,$id,$font_weight=false  ) {
	$css=""; 
   	if(!empty($option[$id])  ){
  		$css.= '--sao-'.$name.'-fn-wt:'.esc_html($option[$id]).';';
 	}
 	return $css;	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Gradient background color
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_gradient_background_color" )){
function sao_slider_var_gradient_background_color( $name,$option,$id=false ) {
	$css='';
		
	 if(!empty($id)){
		$background_color = !empty($option[$id])?$option[$id]:'';
	 }else{
		$background_color = !empty($option)?$option:'';
	 }
	if(isset($background_color['first'])){
			$orientation = !empty($background_color['orientation'])? $background_color['orientation']:'horizontal';
			
		if($orientation == "horizontal"){
					$type = 'linear';
					$moz = sao_slider_rtl_left();
					$liner = 'to '.sao_slider_rtl_right().'';
				}elseif($orientation == "vertical"){
					$type = 'linear';
					$moz = 'top';
					$liner = 'to bottom';
					
				}elseif($orientation == "diagonal"){
					$type = 'linear';
					$moz = '-45deg';
					$liner = '135deg';
				}elseif($orientation == "diagonal-bottom"){
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';
				}elseif($orientation == "radial"){
					$type = 'radial';
					$moz = 'center, ellipse cover';
					$liner = 'ellipse at center';
				}else{
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';						
				}
					
 			$css = '--sao-'.$name.'-bg: '.esc_html($background_color['first']).';';
				
			if(!empty($background_color['second'])){
				
				if(!empty($background_color['third'])){
  					$css = ' --sao-'.$name.'-bg: '.$type.'-gradient('.$liner.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%,'.$background_color['third'].' 100%) ;';
					
				} else{
					
  					$css = ' --sao-'.$name.'-bg: '.$type.'-gradient('.$liner.', '.$background_color['first'].' ,'.$background_color['second'].') ;';
				}
				 
			}else{
				
			}
	}
		
	return $css;
 
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Align
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_align" )){
function sao_slider_var_align( $name,$option,$id,$default='center') {
	$css="";
 	if(!empty($option[$id])){
		if($option[$id] !==$default){
			if($option[$id] =='right'){
				$css.=  ' --sao-'.$name.': '.sao_slider_rtl_right().' ;';
			}elseif($option[$id] =='left'){
				$css.=  '  --sao-'.$name.': '.sao_slider_rtl_left().';';
			}elseif($option[$id] =='center'){
				$css.=  '--sao-'.$name.':center ;';
			}
		}
			
	} 
	return $css;	
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Border
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_border" )){

function sao_slider_var_border($name,$option,$id) {

		$css="";
		if(!empty($option[$id]['top'])|| !empty($option[$id]['left']) || !empty($option[$id]['bottom']) || !empty($option[$id]['right'])){
			$border_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$border_top = intval(isset($option[$id]['top'])) ? $option[$id]['top'].$border_unit: '0';
			$border_left = intval(isset($option[$id]['left'])) ? $option[$id]['left'].$border_unit.'' : '0';
			$border_bottom = intval(isset($option[$id]['bottom'])) ? $option[$id]['bottom'].$border_unit.'' : '0';
			$border_right = intval(isset($option[$id]['right'])) ? $option[$id]['right'].$border_unit.'' : '0';	
			if(is_rtl()){
			
				$css.='--sao-'.$name.'-br-wt:'.$border_top.' '.$border_left.' '.$border_top.' '.$border_right.';';
			}else{
				$css.='--sao-'.$name.'-br-wt:'.$border_top.' '.$border_right.' '.$border_top.' '.$border_left.';';
			}
				
 			
			$css.=isset($option[$id]['style']) ? '--sao-'.$name.'-br-st:'.$option[$id]['style'].';' : '';		
			$css.=isset($option[$id]['color']) ? '--sao-'.$name.'-br-cr:'.$option[$id]['color'].';' : '';	
 			
		 
		} 
 
	return $css;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Border
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_border_2" )){
function sao_slider_var_border_2( $name,$option,$id,$inset= false) {
	$css="";
 

		if(!empty($option[$id]['size'])){
			 
 			$position = !empty($option[$id]['position'])?sao_builder_rtl_has($option[$id]['position']):'round';
 				if($position == 'top'){
					$border_width = intval(isset($option[$id]['size'])) ? '  --sao-'.$name.'-br-wt:'.$option[$id]['size'].'px 0 0;' : '';		
				}
				elseif($position == 'bottom'){
					$border_width = intval(isset($option[$id]['size'])) ? '  --sao-'.$name.'-br-wt: 0 0  '.$option[$id]['size'].'px ;' : '';		
				}	
				elseif($position == 'left'){
  					$border_width = intval(isset($option[$id]['size'])) ? ' --sao-'.$name.'-br-wt: 0 '.$option[$id]['size'].'px 0 0;' : '';	

 				}
				elseif($position == 'right'){
  					$border_width = intval(isset($option[$id]['size'])) ? '  --sao-'.$name.'-br-wt: 0 0 0 '.$option[$id]['size'].'px;' : '';	
 				}	
				elseif($position == 'top-bottom'){
					$border_width = intval(isset($option[$id]['size'])) ? '  --sao-'.$name.'-br-wt:'.$option[$id]['size'].'px 0 ;' : '';		
				}else{
					$border_width = intval(isset($option[$id]['size'])) ? ' --sao-'.$name.'-br-wt:'.$option[$id]['size'].'px;' : '';		
				}
				
				$border_style =  isset($option[$id]['style']) ? '--sao-'.$name.'-br-st: '.$option[$id]['style'].';' : '';		
				$border_color =  isset($option[$id]['color']) ? '--sao-'.$name.'-br-cr:'.$option[$id]['color'].';' : '';	
			
	 
 			$css.= ''.$border_width.$border_style.$border_color.';';
 		} 
		 
	
	return $css;	
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Shdaow
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_text_shadow" )){
function sao_slider_var_text_shadow($name, $option,$id,$inset= false) {
		$css="";

		if(!empty($option[$id]['horizontal']) || !empty($option[$id]['vertical']) || !empty($option[$id]['blur']) || !empty($option[$id]['spread'])){
			$shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$shadow_unit.' ' : '0 ';
			$shadow_color = !empty($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
		 
			$css.=  ' --sao-'.$name.'-sd:'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_color.';';
		}
	return $css;	
		
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Shdaow
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_shadow" )){
function sao_slider_var_shadow($name, $option,$id,$inset= false) {
		$css="";

		if(!empty($option[$id]['horizontal']) || !empty($option[$id]['vertical']) || !empty($option[$id]['blur']) || !empty($option[$id]['spread'])){
			$shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$shadow_unit.' ' : '0 ';
			$shadow_spread = intval(isset($option[$id]['spread'])) ?  $option[$id]['spread'].$shadow_unit.' ' : '0 ';		
			$shadow_color = !empty($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
			if($inset ==true ){
				$shadow_position = !empty($option[$id]['position']) ? $option[$id]['position'] : '';
				$position_inset = !empty($shadow_position) ? '-inset ' :'' ;		
			}else{
			$shadow_position = !empty($option[$id]['position']) ? $option[$id]['position'] : '';
			$position_inset =  '';
  			}
			$css.=  ' --sao-'.$name.'-sd'.$position_inset.':'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_spread.$shadow_color.$shadow_position.';';
		}
	return $css;	
		
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Radius 
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_radius" )){
 function sao_slider_var_radius($name,$option,$id) {
	 
$css ='';
 		if(!empty($option[$id]['top_left'])|| !empty($option[$id]['top_right']) || !empty($option[$id]['bottom_right']) || !empty($option[$id]['bottom_left'])){
			$radius_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$top_left = intval(isset($option[$id]['top_left'])) ? $option[$id]['top_left'].$radius_unit.' ': '0 ';
			$top_right = intval(isset($option[$id]['top_right'])) ? $option[$id]['top_right'].$radius_unit.' ' : '0 ';
			$bottom_right = intval(isset($option[$id]['bottom_right'])) ? $option[$id]['bottom_right'].$radius_unit.' ' : '0 ';
			$bottom_left = intval(isset($option[$id]['bottom_left'])) ? $option[$id]['bottom_left'].$radius_unit.' ' : '0 ';		
			if(is_rtl()){
				$css.='--sao-'.$name.'-rd:'.$top_right.$top_left.$bottom_left.$bottom_right.';';
			}else{
				$css.='--sao-'.$name.'-rd:'.$top_left.$top_right.$bottom_right.$bottom_left.';';
			}
		}

	return $css;
 }
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Padding 
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_padding" )){
function sao_slider_var_padding( $name,$option,$id) {
	$css="";
	if(!empty($option[$id]['top']) || !empty($option[$id]['left']) || !empty($option[$id]['bottom']) || !empty($option[$id]['right']) ){
		$padding_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
		$padding_top = intval(isset($option[$id]['top'])) ?  $option[$id]['top'].$padding_unit : '0';
		$padding_left = intval(isset($option[$id]['left'])) ? $option[$id]['left'].$padding_unit : '0';
		$padding_bottom = intval(isset($option[$id]['bottom'])) ? $option[$id]['bottom'].$padding_unit  : '0';
		$padding_right = intval(isset($option[$id]['right'])) ? $option[$id]['right'].$padding_unit : '0';	
		if(is_rtl()){
 		$css.='--sao-'.$name.':'.$padding_top.' '.$padding_left.' '.$padding_bottom.' '.$padding_right.';';
		}else{
 		$css.='--sao-'.$name.':'.$padding_top.' '.$padding_right.' '.$padding_bottom.' '.$padding_left.';';
		}
	
	}
	return $css;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Button Style 
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_button_style" )){
function sao_slider_var_button_style($option) {
	$style =  !empty($option['style'])  ?  $option['style'] : 'style-1';
	$css='';		
	if( $style=='style-2'){
    $css = ' --sao-btn-sd: 0 3px 0px 0px rgba(0, 0, 0, 0.2) inset';
 		
	}elseif( $style=='style-3'){
   $css	= ' --sao-btn-sd: 0 -3px 0px 0px rgba(0, 0, 0, 0.2) inset';
		
	}elseif( $style=='style-4'){
   $css	= ' --sao-btn-sd: -3px 0px 0px 0px rgba(0, 0, 0, 0.2) inset ';
		
	}elseif( $style=='style-5'){
	$css = '  --sao-btn-sd: 3px 0px 0px 0px rgba(0, 0, 0, 0.2) inset ';
	}
	return $css;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Padding Mini
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_padding_mini" )){
function sao_slider_var_padding_mini( $name,$option,$id) {
	$css="";
	if(!empty($option[$id]['top']) || !empty($option[$id]['left'])    ){
		$padding_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
		$padding_top = intval(isset($option[$id]['top'])) ?  $option[$id]['top'].$padding_unit : '0';
		$padding_right = intval(isset($option[$id]['right'])) ? $option[$id]['right'].$padding_unit : '0';
 	 
 		$css.='--sao-'.$name.'-pd:'.$padding_top.' '.$padding_right.';';
 	
	}
	return $css;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Button Icon Padding
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_button_icon_padding" )){
function sao_slider_var_button_icon_padding( $option,$id,$icon='left') {
	$css="";
	 
	$top= intval(isset($option[$id]['top']))?$option[$id]['top']:'1';
	$right= intval(isset($option[$id]['right']))?$option[$id]['right']:'2.5';
	$unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'em';
	
	if(!empty($top) ){
		$padding_unit = !empty($unit) ?$unit : 'px';
		$padding = intval(isset($top)) ? ' --sao-btn-icn-pd:'.$top.$padding_unit.';': '';
  		if($icon=='right'){
			$margin = intval(isset($right)) ? ' --sao-btn-icn-mg:0 '.$right.$padding_unit.' 0 0;' : '';		
		}else{
			$margin = intval(isset($right)) ? ' --sao-btn-icn-mg: 0  0 0 '.$right.$padding_unit.'   ;' : '';		
		}
		$css.=' '.$padding.$margin.' ';
	}
	return $css;
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Button Padding Style 6
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_var_button_padding_style_6" )){
function sao_slider_var_button_padding_style_6( $option,$id,$icon='left') {
	$css="";
		$top= intval(isset($option[$id]['top']))?$option[$id]['top']:'1';
	$right= intval(isset($option[$id]['right']))?$option[$id]['right']:'2.5';
	$unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'em';
	
	
	if(!empty($top) || !empty($right) ){
		$padding_unit = !empty($unit ) ?$unit  : 'px';
		$padding_top = intval(isset($top)) ?  ' '.$top.$padding_unit: ' 0 ';
  		 
 		if($icon=='right'){
		$padding_right = ' 0 ';
 		$padding_left = intval(isset($right)) ? ' '.$right.$padding_unit.'' : '';		
		}else{
		$padding_left =' 0 ';
 		$padding_right = intval(isset($right)) ? ' '.$right.$padding_unit.'' : '';				
		}
		
		if(is_rtl()){
 		$css.='  --sao-btn-pd:'.$padding_top.$padding_left.$padding_top.$padding_right.'; ';
		}else{
 		$css.='  --sao-btn-pd:'.$padding_top.$padding_right.$padding_top.$padding_left.'; ';
		}
 	
	}
	return $css;
}
}?>