<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Metabox
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_metabox" )){
add_action('add_meta_boxes', 'sao_slider_metabox');
function sao_slider_metabox($post_type) {
    $types = array('sao_slide');

    if (in_array($post_type, $types)) {
      add_meta_box(
        'sao_builder_metabox',
        esc_html__('Page Builder','saoshyant-slider'),
        'sao_slider_metapanel',
        'sao_slide',
        'normal',
        'high'
      );
    }
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Meta Panel
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_metapanel" )){
function sao_slider_metapanel($post) {
 	global $post;
 
   wp_nonce_field( 'sao_slider_meta_box_nonce', 'sao_slider_meta_box_nonce' );

	$sao_show_page_builder = get_post_meta($post->ID, 'sao_show_page_builder', true);
 
    $element_json = get_post_meta($post->ID, 'sao_element', true);
  	$element= sao_slider_options_array_row($element_json);
 
	  
	echo '<div class="sao_builder sao_slider_meta">';
		echo '<a class="sao_full_template_full sao_full_screen_page_builder ">'.esc_html__('Full Screen','saoshyant-slider').'</a>';
		echo '<a class="sao_full_template_full_close sao_full_screen_close ">'.esc_html__('Close Full Screen','saoshyant-slider').'</a>';
 		echo '<a class="sao_full_template_save sao_template_save" data-row="full_slider"  data-name="'.esc_html__('Full Slider','saoshyant-slider').'">'.esc_html__('Save Full Template to the library','saoshyant-slider').'</a>';
		echo '<a class="sao_full_template_add sao_template_add"  data-row="full_slider" data-name="'.esc_html__('Full Slider','saoshyant-slider').'">'.esc_html__('Add Full Template From Library','saoshyant-slider').'</a>';

		echo '<ul>';
  			
               sao_slider_builder_section();
			 
   		echo '</ul>';
 
		sao_slider_model_element();
		
		
		
	
	global $post;
	
	$meta = get_post_custom( $post->ID );
 	$responsive_mode = !empty($meta['sao_responsive_mode'][0]) ? $meta['sao_responsive_mode'][0] :'auto';


 	$width = !empty($meta['sao_show_width'][0]) ? $meta['sao_show_width'][0] :'100';
 	$width_unit = !empty($meta['sao_show_width_unit'][0]) ? $meta['sao_show_width_unit'][0] :'%';
 	$height = !empty($meta['sao_show_height'][0]) ? $meta['sao_show_height'][0] :'600';
 	$height_unit = !empty($meta['sao_show_height_unit'][0]) ? $meta['sao_show_height_unit'][0] :'px';
 	 
		
 	$sao_show['perview_width'] = $width;
 	$sao_show['perview_width_unit'] = $width_unit;
 	$sao_show['perview_height'] = $height;
 	$sao_show['perview_height_unit'] = $height_unit;


 	$object_unit = array('percentage'=> '%' , 'pexel' => 'px');
	
	
	echo '<div class="sao-slider-perveiw">';
			echo '<div class="sao-slider-perview-title" >';      
			
		 

			echo '<div class="sao-slider-perview-form" data-id="'.$post->ID.'" >';   
			 
	 			sao_slider_resposive('main','', $width ,$width_unit,$height,$height_unit ); 
 						  
		echo '</div>'; 
		
		echo '<div class="sao-slider-play"   >';   
 			echo '<div class="button button-primary sao-slider-play-button " >'.esc_html__('Play','saoshyant-slider').' '.esc_html__('Animation','saoshyant-slider').'</div>';   

		echo '</div>'; 
		   
 			                
			echo '<div class="sao-slider-position" >';  
			echo '<label>'.esc_html__('Element Options:','saoshyant-slider').'</label>';
    
			echo '<label>'.esc_html__('Top:','saoshyant-slider').'</label>';
			echo '<input  id="sao_position_top" type="number" value="">';

			$label_position_left =is_rtl()? __('Right:','saoshyant-slider'):esc_html__('Left:','saoshyant-slider');
			echo '<label>'.$label_position_left.'</label>';
			echo '<input id="sao_position_left" type="number" value="">';
			
			echo '<label>'.esc_html__('Width:','saoshyant-slider').'</label>';
			echo '<input  id="sao_object_width" type="text" value="">';
			echo '<select id="sao_object_width_unit">';
			  foreach($object_unit as $key => $name){
              	echo '<option value="'.esc_attr($key).'" >'.esc_html($name).'</option>';
			  }
			echo '</select>';


			echo '<label>'.esc_html__('Height:','saoshyant-slider').'</label>';
			echo '<input id="sao_object_height" type="text" value="">';
			echo '<select id="sao_object_height_unit">';
			  foreach($object_unit as $key => $name){
              	echo '<option value="'.esc_attr($key).'" >'.esc_html($name).'</option>';
			  }
			echo '</select>';
			
		 
 		echo '</div>';
		echo '</div>';
         	
            
      
	
		echo '<div class="sao-slider-perveiw-warp">';
		
		sao_slide_perview_ajax($sao_show);

		echo '</div>';
	echo '</div>';		
	
	
 	sao_slide_callback();
		
        
 	echo '</div>';
    
	
 
	$element_json_textarea = !empty( $element_json ) ? $element_json : '';
    echo '<textarea type="hidden" style="width:100%; height:600px;"   name="sao_element" id="sao_slider_element">'.esc_html($element_json).'</textarea>';
	
	$sao_show_page_builder_value = !empty( $sao_show_page_builder ) ? $sao_show_page_builder : '';
    echo '<input type="hidden" style="display:none;"   name="sao_show_page_builder" id="sao_show_page_builder" value="'.esc_attr($sao_show_page_builder_value).'" >';
     
	ob_start();
	wp_editor( '', 'initialize');
	$editor = ob_get_clean();
	
	
}   
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
															 	Slider Meta Save
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "sao_slider_meta_save" )){
add_action('save_post', 'sao_slider_meta_save'); 
function sao_slider_meta_save($post_id) {
 	if ( ! isset( $_POST['sao_slider_meta_box_nonce'] ) ||
	! wp_verify_nonce( $_POST['sao_slider_meta_box_nonce'], 'sao_slider_meta_box_nonce' ) )
		return;
	


 
    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	
   	if(!empty($_POST['sao_show_page_builder'])) {
		$sao_show_page_builder = wp_kses_post($_POST['sao_show_page_builder']);
      	update_post_meta($post_id, 'sao_show_page_builder', $sao_show_page_builder);
    } else {
     	 delete_post_meta($post_id, 'sao_show_page_builder');
    }
	
  
  	if(!empty($_POST['sao_section'])) {
		$sao_section = wp_kses_post($_POST['sao_section']);
      	update_post_meta($post_id, 'sao_section', $sao_section);
    } else {
     	 delete_post_meta($post_id, 'sao_section');
    }
	
	 
  	if(!empty($_POST['sao_column'])) {
		$sao_column = wp_kses_post($_POST['sao_column']);
       	update_post_meta($post_id, 'sao_column', $sao_column);
    } else {
     	 delete_post_meta($post_id, 'sao_column');
    }	 
 	
  	if(!empty($_POST['sao_element'])) {
		$sao_element = wp_kses_post($_POST['sao_element']);
      	update_post_meta($post_id, 'sao_element', $sao_element);
    } else {
     	 delete_post_meta($post_id, 'sao_element');
    }	 
 
   	if(!empty($_POST['sao_show_width'])) {
		$sao_show_width = wp_kses_post($_POST['sao_show_width']);
       	update_post_meta($post_id, 'sao_show_width', $sao_show_width);
    } else {
     	 delete_post_meta($post_id, 'sao_show_width');
    }
	
   	if(!empty($_POST['sao_show_width_unit'])) {
		$sao_show_width_unit = wp_kses_post($_POST['sao_show_width_unit']);

      	update_post_meta($post_id, 'sao_show_width_unit', $sao_show_width_unit);
    } else {
     	 delete_post_meta($post_id, 'sao_show_width_unit');
    }
	
	if(!empty($_POST['sao_show_height'])) {
		$sao_show_height = wp_kses_post($_POST['sao_show_height']);
      	update_post_meta($post_id, 'sao_show_height', $sao_show_height);
    } else {
     	 delete_post_meta($post_id, 'sao_show_height');
    }	
	
	
   	if(!empty($_POST['sao_show_height_unit'])) {
		$sao_show_height_unit = wp_kses_post($_POST['sao_show_height_unit']);
      	update_post_meta($post_id, 'sao_show_height_unit', $sao_show_height_unit);
    } else {
     	 delete_post_meta($post_id, 'sao_show_height_unit');
    }	
 
	
	if ( isset($_POST['sao_slide_link']) ) {
		$sao_slide_link = wp_kses_post($_POST['sao_slide_link']);
		update_post_meta($post_id, 'sao_slide_link', $sao_slide_link);
	}else{
		delete_post_meta($post_id, 'sao_slide_link');
	} 
	
	if ( isset($_POST['sao_max_width']) ) {
		$sao_max_width = wp_kses_post($_POST['sao_max_width']);
		update_post_meta($post_id, 'sao_max_width', $sao_max_width);
	}else{
		delete_post_meta($post_id, 'sao_max_width');
	} 	
 
	if ( isset($_POST['sao_background_image']) ) {
		$sao_background_image = wp_kses_post($_POST['sao_background_image']);
		update_post_meta($post_id, 'sao_background_image', $sao_background_image);
	}else{
		delete_post_meta($post_id, 'sao_background_image');
	} 	
 
	 
 	if ( isset($_POST['sao_background_color']) ) {
		$sao_background_color = esc_sql($_POST['sao_background_color']);
 		update_post_meta($post_id, 'sao_background_color', $sao_background_color);
	}else{
		delete_post_meta($post_id, 'sao_background_color');
	} 	 
	 
 	 
	 
	 
}
}?>
