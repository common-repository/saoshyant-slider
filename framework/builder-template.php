<?php
 
if ( !function_exists ( "sao_slider_template_option_save" )){
add_action('wp_ajax_sao_slider_template_option_save', 'sao_slider_template_option_save');
add_action('wp_ajax_nopriv_sao_slider_template_option_save', 'sao_slider_template_option_save');
function sao_slider_template_option_save(){
	
	echo '<div class="sao_options sao_options_section sao_active ">';
	echo '<div class="sao_options_middle">';
		//Title
		echo '<div class="sao_options_title">';
			echo '<h3>'.esc_html__('Save','saoshyant-page-builder').' '.esc_html(sanitize_text_field($_REQUEST['name'])).' '.esc_html__('Template','saoshyant-page-builder').'</h3><i class="sao_options_close"></i>';
		echo '</div>';
		//Content
		echo '<ul class="sao_options_content sao_layout_active">';
			echo'<div class="sao_options_container">';
 			sao_options_function('',esc_html__('Template Name','saoshyant-page-builder'),'save_template_name','text');
 			echo'</div>';
 		echo '</ul>';
		//Bottom
		echo '<div class="sao_options_bottom">';
				echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','saoshyant-page-builder').'</div>';
				echo '<div class="sao_options_'.esc_attr(wp_kses_post($_REQUEST['row'])).'_save button-primary">'. esc_html__('Save','saoshyant-page-builder').'</div>';
				echo '<div class="sao_options_massage"></div>';
		echo '</div>';            
			    
	echo '</div>';
	echo '</div>';
 	die(0);
}
}
 if ( !function_exists ( "sao_slider_template_save" )){
 add_action('wp_ajax_sao_slider_template_save', 'sao_slider_template_save');
add_action('wp_ajax_nopriv_sao_slider_template_save', 'sao_slider_template_save');  
function sao_slider_template_save() {
	$old_data =	get_option( 'sao_'.sanitize_text_field($_REQUEST['id']).'_template');
	if( !is_array($old_data)){
		$old_data=array();
	}
 			 
	$old_data[sanitize_key($_REQUEST['key'])]['name'] =  wp_kses_post($_POST['name']);
	if(!empty($_REQUEST['section'])){
		$old_data[sanitize_key($_REQUEST['key'])]['section'] =  wp_kses_post($_REQUEST['section']);
	}
	
	if(!empty($_REQUEST['column'])){
		$old_data[sanitize_key($_REQUEST['key'])]['column'] =  wp_kses_post($_REQUEST['column']);
	}
	
	if(!empty($_REQUEST['element'])){
			$old_data[sanitize_key($_REQUEST['key'])]['element'] = wp_kses_post($_REQUEST['element']);
	}
  
  
	update_option( 'sao_'.sanitize_text_field($_REQUEST['id']).'_template', $old_data );
	die(0);
    
} 
 }
if ( !function_exists ( "sao_slider_template_options" )){
add_action('wp_ajax_sao_slider_template_options', 'sao_slider_template_options');
add_action('wp_ajax_nopriv_sao_slider_template_options', 'sao_slider_template_options'); 
function sao_slider_template_options() {
	
	$old_data =	get_option( 'sao_'.sanitize_text_field($_REQUEST['id']).'_template');
 	
	echo '<div class="sao_model  sao_active sao_model_template  " data-row="'.esc_attr(wp_kses_post($_REQUEST['id'])).'">';
	echo '<div class="sao_model_middle">';
		//Title
		echo '<div class="sao_model_title"><h3>'.esc_html__('Add','saoshyant-page-builder').' '.esc_attr(sanitize_text_field($_REQUEST['name'])).' '.esc_html__('Template','saoshyant-page-builder').'</h3><i class="sao_model_close"></i></div>';
		//Content;
		echo '<ul class="sao_model_content">';
               	
			if (!empty($old_data)) :
			foreach($old_data as $key => $value ):
				echo '<li class="sao_template_item" data-id="'.esc_attr($key).'">';
					echo '<div class="sao_template_name">'.esc_attr($value['name']).'</div>';
					echo '<div class="sao_template_remove button">'.esc_html__('Remove','saoshyant-page-builder').'</div>';
				echo '</li>';
				echo '<div class="sao-row-1-8"></div>';
	
			endforeach;
			endif;		
		echo '</ul>';
			//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_'.esc_attr(sanitize_key($_REQUEST['id'])).'_template_add_options button-primary">'.esc_html__('Add','saoshyant-page-builder').'</div>';
		echo '</div>';
		
	echo '</div>';
 	echo '</div>';
  	die(0);
}   
 }
if ( !function_exists ( "sao_slide_template_remove" )){

add_action('wp_ajax_sao_slide_template_remove', 'sao_slide_template_remove');
add_action('wp_ajax_nopriv_sao_slide_template_remove', 'sao_slide_template_remove'); 
function sao_slide_template_remove() {
	
	$old_data =	get_option( 'sao_'.sanitize_text_field($_REQUEST['id']).'_template');
	unset($old_data[sanitize_key($_REQUEST['key'])]);
 	update_option( 'sao_'.sanitize_text_field($_REQUEST['id']).'_template', $old_data );
	die(0);
	
}  
}