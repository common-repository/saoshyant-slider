<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Element Item Sao Slider
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_element_padding" )){
function sao_slider_element_padding( $option,$item = false) {
	$css='';
	 
	  
	$css.= sao_slider_var_padding('el-pd',$option,'padding');
 		
	 if(sao_slider_ismobile()){
			$css.= sao_slider_var_padding('el-tab-pd',$option,'tablet_padding');
			$css.= sao_slider_var_padding('el-mob-pd',$option,'mobile_padding');
 		}
		
	 
 	return $css;
	
}
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Arrow Layout
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_arrow_layout_css" )){
function sao_slider_arrow_layout_css( $option ) {
  	$arrow_location = !empty($option['arrow_layout']['location'])?  $option['arrow_layout']['location'] :'';
  	$arrow_size = !empty($option['arrow_layout']['size'])?  $option['arrow_layout']['size'] :'';
  	$arrow_layout = !empty($option['arrow_layout']['layout'])?  $option['arrow_layout']['layout'] :'';
	$css ='';
	if($arrow_size == 'small'){
		$size='30px';
		$css.='--sao-aw-sz:30px;';	
	}elseif($arrow_size == 'large'){
		$css.='--sao-aw-sz:60px;';
		$size='60px';
 	}else{
		$size='45px';
	}
	
 	if($arrow_location == 'slider-2'){
		$css.='--sao-aw-lc:20px;';	
	}elseif($arrow_location == 'slider-3'){
		$css.='--sao-aw-lc:calc('.$size.' / -2);';
	}
	
	if($arrow_layout == 'fixed'){
		$css.='--sao-aw-ly:1;';	
	} 
	if(!empty($option['arrow_radius'])){
		$css.='--sao-aw-rd:'.$option['arrow_radius'].'px;';
 	}
	$css.=sao_slider_var_2('aw-cr',$option,'arrow_color','text');
	$css.=sao_slider_var_2('aw-bg',$option,'arrow_color','background');
 	 
 	return $css;
   
}
}

 ?>