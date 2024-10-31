<?php
/********************************************************************
cssanime
*********************************************************************/ 
if ( !function_exists ( "sao_slider_query" )){
function sao_slider_query($option){

 
 
	$number = $option['number'];
	$sliders = $option['sliders'];
	$args['post_type'] = 'sao_slide';
	$args = array();
  		$args['posts_per_page']=$number;

 		
		$args['post_type'] = 'sao_slide';
 		$args['no_found_rows'] = 1;
		if(!empty($sliders)){
			$args['tax_query'] =  array(
				array(
					'taxonomy' => 'sao_sliders',
					'terms' => $sliders,
					'field' => 'slug',
				)
			);
		}
 	 
   
 	return  new WP_Query($args );
} 
}
 
 
function sao_slider_el_id($option =false) {
   if(!empty( $option['element_id'])){
 		echo ' id="'.esc_attr($option['element_id']).'"  ' ;
   }
} 
function sao_slider_el_cssanime($option =false) {
   if(!empty( $option['cssanime'])){
	   	global $sao_aos_style,$sao_aos_script;
		$sao_aos_style++;
		$sao_aos_script++;
		echo ' data-aos="'.esc_attr(sao_builder_rtl_has($option['cssanime'])).'" ' ;
   }
} 
 
 

/********************************************************************
Sao LightSlider
*********************************************************************/
function sao_slider_lightslider($item,$slider_options=false) {
	global 
	$sao_lightslider_style,
	$sao_slide_script,
	$sao_lightslider_script;
	$sao_lightslider_style=true;
	$sao_slide_script=true;
	$sao_lightslider_script=true;
	
	
 	$slider_options["item"] = (int)$item;
	$slider_options["slideMove"] = 1;
 	if(is_rtl()){
 	$slider_options["rtl"] = true;
	}
	global $sao_lightslider_style,$sao_lightslider_script,$sao_slide_script;
	$sao_lightslider_style++;
	$sao_lightslider_script++;
	$sao_slide_script++;
   
 	?>
 	<div class="sao-slider-options" ><?php echo wp_kses_post(json_encode($slider_options));?></div>
    <?php
	

 } 
 


  
	  
?>
