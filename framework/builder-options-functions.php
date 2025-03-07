<?php
/********************************************************************
sao Options Funtions
*********************************************************************/
function sao_slider_options_function($value,$label,$id,$type, $options = false,$description = false,$placeholder = false,$fold=false) { 
 
 	$value_id = !empty( $value ) ? $value : '';
 	
	$data=$id;
 
  	if($type =='unit' || $type =='according-end' ){}
	elseif($type =='according-start'){
		 echo'<li class="sao_options_item  sao_options_'.esc_attr($type).' sao_id_'.esc_attr($id).'"   data-active="show"  data-according="hide">';
				
				echo '<span class="sao_options_span">'. esc_html($label).'</span>';
 				if(!empty($fold)){
					echo '<div class="sao_options_fold">';
					foreach($fold as $key => $value) : 
						echo '<div class="sao_options_fold_item" data-name="'.esc_attr($value).'" data-value="'.esc_attr($key).'"></div>';
					endforeach;
					echo '</div>';
				}
		echo '<ul class="sao_options_according_warp" >';
	}				
	else{
 
  		 echo'<li class="sao_options_item  sao_options_'.esc_attr($type).' sao_id_'.esc_attr($id).'"   data-active="show" >';
		 	
			if( $type == 'heading'  ) {
							echo '<span>'. esc_html($label).'</span>';
 			}
			if(!empty($fold)){
				echo '<div class="sao_options_fold">';
 				foreach($fold as $key => $value) : 
					echo '<div class="sao_options_fold_item" data-name="'.esc_attr($value).'" data-value="'.esc_attr($key).'"></div>';
 				endforeach;
				echo '</div>';
			}
		if( $type != 'title'){
				echo '<div class="sao_options_name">';
				echo '<label for="sao_label_'.esc_attr($data).'" >'. esc_html($label).'</label>';
				echo '<div class="sao_options_description">'.esc_html($description).'</div>';
				echo '</div>';
		}
		 
	 
		if( $type == 'tabs' ) {
			echo '<a class="sao_add_tab button" data-id="'.esc_attr($data).'" data-option="'.esc_attr(urlencode(serialize($options))).'" >'.esc_html__('Add Tab','saoshyant-slider');
  			echo '</a>';
			 
		}	
		if( $type == 'list' ) {
			echo '<a class="sao_add_list button" data-id="'.esc_attr($data).'" data-option="'.esc_attr(urlencode(serialize($options))).'" >'.esc_html__('Add Item','saoshyant-slider');
  			echo '</a>';;
		}			
		echo '<div class="sao_options_setting">';
  	}
	
	 
	if( $type == 'start'){
		echo '<ul class="sao_options_start" >';
	}

	switch( $type ) {
		
	// Text
	case 'text':
		echo '<input type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" placeholder="'.esc_attr($placeholder).'"  value="'.esc_attr($value_id).'">';
 	break;
	
	//Number 	
	case 'number':
 		echo '<input type="text"   name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" width="80px"  placeholder="'.esc_attr($placeholder).'"   value="'.esc_attr($value_id).'" >';
	break;
 		
	//Color		
	case 'color':	
 		echo '<input  class="cs-wp-color-picker sao-color"  data-rgba="false" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
  	break;
	
	//Color RGBA
	case 'color_rgba':
		echo '<input  class="cs-wp-color-picker sao-color " data-rgba="true" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
 	break;
		
	//Textarea	
	case 'textarea':
		echo '<textarea name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'"   placeholder="'.esc_attr($placeholder).'" >'.esc_textarea($value_id).'</textarea>';
 	break;
	
	
	//Select
	case 'select': 
 		echo '<select  name="'.esc_attr($data).'"  placeholder="'.esc_attr($placeholder).'" id="sao_label_'.esc_attr($data).'" >';
 			foreach ($options as  $select_key => $select_text) { 	
 				echo'<option  value="'.esc_attr($select_key).'"'.selected( $value_id, $select_key).'>'.esc_html($select_text).'</option>'; 
			}
		echo '</select>';
	break;	
	
	//Checkbox	
	case 'checkbox':
 	
		if ( 1 == $value_id ){$checked= 'checked="checked"'; } else{ $checked=''; }
 
		echo '<div class="sao_checkbox sao_checkbox_primary">';
			echo '<input type="checkbox"  id="sao_label_'.esc_attr($data).'" name="'.esc_attr($data).'" '.wp_kses_post($checked).'   value="'.esc_attr($value_id).'">';
			echo '<label for="sao_label_'.esc_attr($data).'" ></label>';
		echo '</div>';
	break;
		
	// Radio
	case 'radio': 
 		echo '<ul class="sao_multi_options sao_radio_selected">';
		foreach ($options as  $radio_key => $radio_text) :  
 	
			if ( $value_id == $radio_key){$checked= 'checked="checked"'; } else { $checked='';}
 			echo '<li>';
				echo '<input type="radio" name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data.'_'.$radio_key).'"  '.wp_kses_post($checked).'  value="'.esc_attr($radio_key).'">';
				echo '<label for="sao_label_'.esc_attr($data.'_'.$radio_key).'">'. esc_html($radio_text).'</label>';
			echo '</li>';
		
 		endforeach;
 		echo '</ul>';
	
	break;	
	
	// Radio Image
	case 'radio_image': 
 	
		echo '<ul class="sao_multi_options sao_radio_selected">';
		foreach ($options as  $radio_key => $radio_link) :  
		
			if( $value_id == $radio_key){$checked= 'checked="checked"'; } else{$checked='';}
				 
			echo '<li>';
				echo '<label>';
					echo '<input type="radio"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" '.wp_kses_post($checked).'  value="'.esc_attr($radio_key).'">';
					echo '<img for="sao_label_'.esc_attr($data).'" src="'. esc_url($radio_link).'"/>';
				echo '</label>';
			echo '</li>';
		
 		endforeach;
 		echo '</ul>';
	
	break;		 
	// Multi Options
	case 'multi_options':
 		echo '<ul class="sao_multi_options">'; 
 			sao_slider_options_function_multi_item($data,$value_id,$options );
  		echo '</ul>';
	break;	
		 
	// Editor
	case 'editor': 
 		echo '<div class="sao-editor-hander" data-id="sao_'.esc_attr($data).'">';
		
 			$settings = array( 'textarea_name' => $data,'textarea_rows' => 5 );

 			wp_editor(  $value_id , 'sao_'.$data ,$settings);
   	
		echo '</div>';
  	break;	
	 
	//Multicheck
	case 'multicheck':
    	echo '<div class="sao_dropdown">';
			echo '<dt>'; 
				echo '<a>'; 
					if(!empty($value_id)){$display="display:none";}else{$display='';}
					echo '<span class="sao_hida" style="'.esc_attr($display).'">'.esc_html__('Select','saoshyant-slider').'</span>'; 
					 
					echo '<p class="sao_multiSel">';
					foreach ($options as  $keys => $text) { 
						$value_ids = isset( $value_id[$keys] ) ?  $value_id[$keys] : null;
	
						if(1== $value_ids){
						echo '<span sao-id="'.esc_attr($keys).'">'.esc_html($text).',</span>';
						}
					}
					echo '</p>'; 
				echo '</a>'; 
			echo '</dt>'; 
			echo '<dd>'; 
				echo '<div class="sao_mutliSelect">';
 				echo '<ul>'; 
					foreach ($options as  $keys => $text) {  
					if(!empty($keys)){
						$value_ids = isset( $value_id[$keys] ) ?  $value_id[$keys] : null;

	 				if (1==$value_ids ){
						$checkedmeta= 'checked="checked"'; 
					} else{
						$checkedmeta='';
					}
					echo'<li><input type="checkbox"       name="'.esc_attr($data).'['.esc_attr($keys).']"   id="sao_label_'.esc_attr($data).'['.esc_attr($keys).']" '.wp_kses_post($checkedmeta).'  value="'.esc_attr($value_ids).'" /><label for="sao_label_'.esc_attr($data).'['.esc_attr($keys).']" sao-id="'.esc_attr($keys).'"  >'. esc_html($text).'</label></li>'; 
						
						}  
						}  
				echo'</ul>';
				echo'</div>';
		echo'</dd>';
		echo'</div>'; 
	break;


	// icon Image
	case 'icon': 
		$icon_rand = rand(10000000, 99999999);
 		echo'<div  class="sao_menu_icon" id-icon="'.esc_attr($icon_rand).'" >';
 
			echo'<a  class="sao_builder_choose_icon button button-small" >'.esc_html__('Choose Icon','saoshyant-slider').'</a>';
			echo '<input name="'.esc_attr($data).'" id="'.esc_attr($data).'"    type="hidden" value="'.esc_attr($value).'">';
			if(!empty($value_id)){  
				echo '<i class="fa sao-menu-icon '.esc_attr($value_id).'"><a  class="sao_builder_remove_icon  " ></a></i>';
			}
  		echo'</div>'; 
 
	break;
	// Image
	case 'image': 
	  	echo'<a class="sao_image_upload button button-small"  data-name="'.esc_attr($data).'"  >'.esc_html__('Upload','slider').'</a>';
		if(!empty($value_id)){
 			echo '<div class="sao_image_item">';
 			echo '<input  type="hidden" class="sao_attachment_'.esc_attr($data).'" name="'.esc_attr($data).'" 	value="'.esc_attr($value_id).'">';
			$image_medium = wp_get_attachment_image_src($value_id, 'medium');

		 
		if(!empty($image_medium[0])){ 
 
  	  		echo '<a class="sao_image_remove"  ></a>';
 			echo '<img src="'.esc_url($image_medium[0]).'"/>';
 		}
 			echo '</div>';
		}
	 
	 
	break;

	// Tabs 
	case 'tabs': 
	
 			if(!empty($value_id)){
         	foreach($value_id as $tkey => $tval) :
   				   echo sao_slider_options_function_tabs_item($data, $tval,$tkey, $options);			
 		 	endforeach;
			}
 	break;	
	
	//list
	case 'list':
 
 		if(!empty($value_id)){
        foreach($value_id as $tkey => $tval) :
   				   echo sao_slider_options_function_list_item($data, $tval,$tkey, $options);			
			endforeach;
		}
 		break;	
  	 
 
  	//Gallery
  	case 'gallery': 
	  	echo'<a class="sao_add_image button button-small" data-name="'.esc_attr($data).'"  >'.esc_html__('Add Image','saoshyant-slider').'</a>';
		$attachment = sao_slider_array_options('attachment_thumbnail');
		   	  		echo'<ul  class="sao_gallery_list" >';

 		if(!empty($value_id)){
        foreach($value_id as  $galley_key => $gallery_val) :
   			
   	  		echo'<li  class="sao_gallery_item" id="sao_gallery_'.esc_attr($galley_key).'" >';
 					echo '<input  type="hidden" class="sao_attachment_'.esc_attr($galley_key).'"  name="'.esc_attr($data).'['.esc_attr($galley_key).']" 	value="'.esc_attr($gallery_val).'">';
			 
 					echo '<a class="sao_image_remove"></a>';
					
					$tval_thumbnail = wp_get_attachment_image_src($gallery_val, 'thumbnail');

 					 
					echo '<img src="'.esc_url($tval_thumbnail[0]).'"/>';
				 
				
			echo'</li>'; 

			
	 	endforeach;
		}
			echo'</ul>'; 
		break;
	}
  
 	 
 	if ( $type == 'end'  ){
			echo'</ul>';				 
	}  
  	elseif (  $type =='unit' || $type =='according-start' ){}
	elseif($type =='according-end'){
			echo '</ul>';
			echo '</li>';
 	}else{
		echo '</div>';
		echo '</li>';
	}




}
 		 
add_action('wp_ajax_sao_slider_options_function', 'sao_slider_options_function');
add_action('wp_ajax_nopriv_sao_slider_options_function', 'sao_slider_options_function');

function sao_slider_options_function_multi_item($id =false,$value =false,$options =false,$fold=false) {
 		if(!empty($options)){
		foreach ($options as  $option_value) { 	
		$option_type = !empty( $option_value['type'] ) ?  $option_value['type']  : '';
			echo '<li class="sao_multi_options_item sao_multi_options_'.esc_attr($option_type).'">';
						
			 	
				$option_id =!empty($option_value['id'])?$option_value['id']:'';
				$value_content = isset($value[$option_id])?$value[$option_id]:'';
				$data  = $id.'['.$option_id.']';
				$placeholder = !empty( $option_value['placeholder'] ) ?  $option_value['placeholder']  : null;
				
 
				if(!empty($option_value['fold'])){
					echo '<div class="sao_options_fold">';
  					foreach($option_value['fold'] as $fold_key => $fold_value) : 
						echo '<div class="sao_options_fold_item" data-name="'.esc_attr($fold_value).'" data-value="'.esc_attr($fold_key).'"></div>';
 					endforeach;
					echo '</div>';
				}	
				if(!empty($option_value['name'])){
								echo '<label for="sao_label_'.esc_attr($data).'"      >'. esc_html($option_value['name']).'</label>';
				}
				switch( $option_type ) {
					// Text
					case 'text':
							echo '<input  type="text" placeholder="'.esc_attr($placeholder).'" style="width:100px"  name="'.esc_attr($data).'"   value="'.esc_attr($value_content).'">';
					break;
						 
					//Number 	
					case 'number':
						echo '<input type="text" placeholder="'.esc_attr($placeholder).'" style="width:50px" name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'"  value="'.esc_attr($value_content).'" >';
					break;
						 
					//Select 	
					case 'select': 
						echo '<select   name="'.esc_attr($data).'"  style="max-width:100px"  id="sao_tabs_'.esc_attr($data).'" >';
							if(!empty($option_value['options'])){
							foreach ($option_value['options'] as  $select_key => $select_text) { 	
									echo'<option  value="'.esc_attr($select_key).'"'.selected( $value_content, $select_key).'>'.esc_html($select_text).'</option>'; 
							}
							}
						echo '</select>';
					break;
					
					//Color	
					case 'color':
						echo '<input  class="cs-wp-color-picker sao-color"  data-rgba="false" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_content).'">';
					break;
						
					//Color RGBA
					case 'color_rgba':
						echo '<input  class="cs-wp-color-picker sao-color  data-rgba="true" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_content).'">';
					break;
					 
					// Checkbox  
					case 'checkbox':
					
 						if ( 1 == $value_content ){$checked= 'checked="checked"'; } else{$checked='';}
						echo '<div class="sao_checkbox sao_checkbox_primary">';
							echo '<input type="checkbox" name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" '.wp_kses_post($checked).'   value="'.esc_attr($value_content).'">';
							echo '<label for="sao_label_'.esc_attr($data).'" ></label>';
						echo '</div>';
						
					break;	 
				}
			echo '</li>';
 				
		}
		}
	 
}
add_action('wp_ajax_sao_options_function_tabs_item', 'sao_slider_options_function_tabs_item');
add_action('wp_ajax_nopriv_sao_options_function_tabs_item', 'sao_slider_options_function_tabs_item');
 
function sao_slider_options_function_tabs_item($id_tabs=false,$value_tabs=false,$vkey=false,$options =false) { 
		
	 if(!empty($_REQUEST['option_tabs'])){
		$value = array();
		$option = unserialize(urldecode(wp_kses_post($_REQUEST['option_tabs'])));
		$id = sanitize_key($_REQUEST['id_tabs']);

   	}else{
	  $value= $value_tabs;
		$option = $options;
 	  $id= $id_tabs;
	}
	
	 
	$key = !empty($_REQUEST['key_tabs']) ? sanitize_key($_REQUEST['key_tabs']): $vkey;
	 
		echo '<div id="sao_'.$key.'" class="sao_tab_item">';
		echo '<ul class="sao_multi_options">'; 
  				if(!empty($option)){
				foreach ($option as  $option_value) { 	
				
					$option_type = !empty( $option_value['type'] ) ?  $option_value['type']  : '';
					$placeholder = !empty( $option_value['placeholder'] ) ?  $option_value['placeholder']  : null;
					$value_content = $value[$option_value['id']];
 					$data = $id.'['.$key.']['.$option_value['id'].']';

					echo '<li class="sao_multi_options_item sao_multi_options_'.esc_attr($option_type).'">';
					if(!empty($option_value['name'])){
 							echo '<label for="sao_label_'.esc_attr($data).'">'. esc_html($option_value['name']).'</label>';
 					}
 					switch( $option_type ) {
					
					//Text
					case 'text':
						echo '<input  type="text" placeholder="'.esc_attr($placeholder).'"   style="width:120px"  name="'.esc_attr($data).'"   value="'.esc_attr($value_content).'">';
 					
					 break;
					
					//Select 
					case 'select': 
				 
						echo '<select   name="'.esc_attr($data).'"  style="max-width:120px"  id="sao_tabs_'.esc_attr($data).'" >';
							foreach ($option_value['options'] as  $keys => $text) { 	
								echo'<option value="'.esc_attr($keys).'"'.selected( $value_content, $keys).'>'.esc_html($text).'</option>'; 
							}
						echo '</select>';
					break;
					
					//Color
					case 'color':
					
						echo '<input  class="cs-wp-color-picker sao-color"  data-rgba="false" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_content).'">';
					break;
					
					//Color RGBA
					case 'color_rgba':
						echo '<input  class="cs-wp-color-picker sao-color  data-rgba="true" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value).'">';
					break;
					
 					//Number
					case 'number':
				 
						echo '<input type="text"   name="'.esc_attr($data).'" width="50px"  placeholder="'.esc_attr($placeholder).'"  id="sao_label_'.esc_attr($data).'"  value="'.esc_attr($value_content).'" style=" width:70px;">';
					break;
					
					//Checkbox
					case 'checkbox':
					
						if ( 1 == $value ){$checked= 'checked="checked"'; } else{$checked='';}
						
						echo '<div class="sao_checkbox sao_checkbox_primary">';
						echo '<input type="checkbox"  name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" '.wp_kses_post($checked).'   value="'.esc_attr($value_content).'">';
						echo '<label for="sao_label_'.esc_attr($data).'" ></label>';
						echo '</div>';
					break;	 
					 
					// Icon 
					$icon_rand = rand(10000000, 99999999);
					case 'icon': 
 							echo'<div  class="sao_menu_icon"   id-icon="'.esc_attr($icon_rand).'">';
							echo'<a  class="sao_builder_choose_icon button button-small"   data-id="sao_'.esc_attr($data).'" >'.esc_html__('Choose Icon','saoshyant-slider').'</a>';
									
 							echo '<input name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" type="hidden" value="'.esc_attr($value_content).'">';
							 if(!empty($value_content)){  
								echo '<i class="fa sao-menu-icon '.esc_attr($value_content).'"><a  class="sao_builder_remove_icon " ></a></i>';
							 }
							echo'</div>'; 
 					
					break;
 					 
					}
				echo '</li>';
				}
				}
			echo '</ul>';
				echo '<a class="sao_remove_tab"></a>';		
			
			echo '</div>';
			if(!empty($_REQUEST['option_tabs'])){
 				die();
			}
}
 

add_action('wp_ajax_sao_slider_options_function_list_item', 'sao_slider_options_function_list_item');
add_action('wp_ajax_nopriv_sao_slider_options_function_list_item', 'sao_slider_options_function_list_item');
function sao_slider_options_function_list_item($id_list=false,$value_list=false,$list_key=false,$options =false) { 
		
	 if(!empty($_REQUEST['option_list'])){
		$value = array();
		$option = unserialize(urldecode(wp_kses_post($_REQUEST['option_list'])));
		$id = sanitize_key($_REQUEST['id_list']);
		$show = 'sao_list_item_show';
  
  	}else{
	  	
		$value= $value_list;
		$option = $options;
 	 	$id= $id_list;
		$show = 'sao_list_item_hide';

	}
	
	 
	$key = !empty($_REQUEST['key_list']) ?sanitize_key($_REQUEST['key_list']): $list_key;
 
	 
 	echo '<div id="sao_'.esc_attr($key).'" class="sao_list_item '.esc_attr($show).'">';
	
		echo'<div class="sao_list_options_item_title">';
			echo '<a class="sao_title_list"></a>';	
			echo '<a class="sao_list_collapse"></a>';		
			echo '<a class="sao_remove_list"></a>';		
 		echo'</div>';
		
		echo'<div class="sao_list_options_warp">';
  			
			if(!empty($option)):
			foreach ($option as  $option_value) :
				
				$option_type = !empty( $option_value['type'] ) ?  $option_value['type']  : '';
				$placeholder = !empty( $option_value['placeholder'] ) ?  $option_value['placeholder']  : null;
				$option_id =!empty($option_value['id'])?$option_value['id']:'';
				$value_id = !empty($value[$option_id]) ? $value[$option_id]:'';
				$data = $id.'['.$key.']['.$option_value['id'].']';
				
				
				if($option_type =='unit' || $option_type =='according-end' ){}
				elseif($option_type =='according-start'){
					echo'<div class="sao_list_options_item sao_'.esc_attr($id).' sao_options_'.esc_attr($option_type).'" data-active="show"  data-according="hide">';
							if(!empty($option_value['name'])){
								echo '<span class="sao_options_span">'. esc_html($option_value['name']).'</span>';
							}
							if(!empty($option_value['fold'])){
								echo '<div class="sao_options_fold">';
								foreach($option_value['fold'] as $fold_key => $fold_value) : 
									echo '<div class="sao_options_fold_item" data-name="'.esc_attr($fold_value).'" data-value="'.esc_attr($fold_key).'"></div>';
								endforeach;
								echo '</div>';
							} 
							echo '<section class="sao_options_according_warp  ">';
						}				
				else{
				
				echo'<div class="sao_list_options_item sao_'.esc_attr($id).' sao_options_'.esc_attr($option_type).'" data-active="show">';
					
				if(!empty($option_value['fold'])){
					echo '<div class="sao_options_fold">';
					foreach($option_value['fold'] as $fold_key => $fold_value) : 
						echo '<div class="sao_options_fold_item" data-name="'.esc_attr($fold_value).'" data-value="'.esc_attr($fold_key).'"></div>';
					endforeach;
					echo '</div>';
				}

					if(!empty($option_value['name'])){
						
						echo '<div class="sao_options_name">';
						echo '<label for="sao_label_'.esc_attr($data).'" >'. esc_html($option_value['name']).'</label>';
							if(!empty($option_value['description'])){echo '<div class="sao_options_description">'.esc_html($option_value['description']).'</div>';}
						echo '</div>';						
								
  					}

					echo '<section class="sao_options_setting_2  ">';
 					switch( $option_type ) {
							
						// Text
						case 'text':
							echo '<input  type="text" id="sao_label_'.esc_attr($data).'" placeholder="'.esc_attr($placeholder).'"   name="'.esc_attr($data).'"   value="'.esc_attr($value_id).'">';
						 break;
						 
						//Select
						case 'select': 
					 
							echo '<select   name="'.esc_attr($data).'"    id="sao_label_'.esc_attr($data).'" >';
								if(!empty($option_value['options'])):
								foreach ($option_value['options'] as  $select_key => $select_text):	
									echo'<option  value="'.esc_attr($select_key).'"'.selected( $value_id, $select_key).'>'.esc_html($select_text).'</option>'; 																												
								endforeach;
								endif;
							echo '</select>';
						break;
						
						//Color
						case 'color':
							echo '<input  class="cs-wp-color-picker sao-color"  data-rgba="false" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
						break;
						
						//Color RGBA
						case 'color_rgba':
							echo '<input  class="cs-wp-color-picker sao-color  data-rgba="true" type="text"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'" value="'.esc_attr($value_id).'">';
						break;
						 
						// Radio
						case 'radio': 
				 
						echo '<ul class="sao_multi_options sao_radio_selected">';
							if(!empty($option_value['options'])){
							foreach ($option_value['options'] as  $keys => $text) :  
						
								if ( $value_id == $keys){
								$checked= 'checked="checked"'; 
								} else{
									$checked='';
								}
									 
								echo '<li>';
									echo '<input type="radio"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'"  '.$checked.'  value="'.esc_attr($keys).'">';
										echo '<label for="sao_label_'.esc_attr($keys).'">'. esc_html($text).'</label>';
								echo '</li>';
								
							endforeach;
							}
						echo '</ul>';
					
						break;	
				
						//Radio Image
						case 'radio_image': 
					 
							echo '<ul class="sao_multi_options sao_radio_selected">';
								 if(!empty($option_value['options'])) {  
									foreach ($option_value['options'] as  $ratio_key => $ratio_link) :  
									
									if ( $value_id == $ratio_key){
										$checked= 'checked="checked"'; 
									} else{
										$checked='';
									}
											 
									echo '<li>';
									echo '<label>';
										echo '<input type="radio"   name="'.esc_attr($data).'" id="sao_label_'.esc_attr($data).'"  '.$checked.'  value="'.esc_attr($ratio_key).'">';
										echo '<img for="sao_label_'.esc_attr($ratio_key).'" src="'.esc_url($ratio_link).'"/>';
									echo '</label>';
									echo '</li>';
									
									endforeach;
								}
							echo '</ul>';
						
						break;		
					
						//Number
						case 'number':
							echo '<input type="text"   name="'.esc_attr($data).'"    placeholder="'.esc_attr($placeholder).'"  id="sao_label_'.esc_attr($data).'"  value="'.esc_attr($value_id).'" style=" width:80px;">';
						break;
						
						//Checkbox
						case 'checkbox':
						
							if ( 1 == $value_id ){
								$checked= 'checked="checked"'; 
							} else{
								$checked='';
							}
							echo '<div class="sao_checkbox sao_checkbox_primary">';
							echo '<input type="checkbox"  name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" '.$checked.'   value="'.esc_attr($value_id).'">';
							echo '<label for="sao_label_'.esc_attr($data).'" ></label>';
							echo '</div>';
						break;	 
						 
						//Icon
						case 'icon': 
								$icon_rand = rand(10000000, 99999999);

								echo'<div  class="sao_menu_icon"   id-icon="'.esc_attr($icon_rand).'">';
								echo'<a  class="sao_builder_choose_icon button button-small"   data-id="sao_'.esc_attr($data).'" >'.esc_html__('Choose Icon','saoshyant-slider').'</a>';
										
								echo '<input name="'.esc_attr($data).'"  id="sao_label_'.esc_attr($data).'" type="hidden" value="'.esc_attr($value_id).'">';
								 if(!empty($value_id)){  
									echo '<i class="fa sao-menu-icon '.esc_attr($value_id).'"><a  class="sao_builder_remove_icon " ></a></i>';
								 }
								echo'</div>'; 
						
						break;
						
						//Editor
						case 'editor': 
							echo '<div class="sao-editor-hander" data-id="'.esc_attr($id.'_'.$key.'_'.$option_value['id']).'">';
							
 							
								$settings = array( 'textarea_name' => $data,'textarea_rows' => 4 );
								wp_editor( $value_id, $id.'_'.$key.'_'.$option_value['id'],$settings );
						
							echo '</div>';
					
						break;	
						
						//Textarea					
						case 'textarea':
							echo '<textarea name="'.esc_attr($data).'" placeholder="'.esc_attr($placeholder).'" id="sao_label_'.esc_attr($data).'"    >'.esc_textarea($value_id).'</textarea>';
						break;	
						
						//Image
						case 'image': 
									echo'<a class="sao_image_upload button button-small"  data-name="'.esc_attr($data).'"  >'.esc_html__('Upload','saoshyant-slider').'</a>';
									if(!empty($value_id)){
										echo '<div class="sao_image_item">';
										echo '<input  type="hidden" class="sao_attachment_'.esc_attr($data).'" name="'.esc_attr($data).'" 	value="'.esc_attr($value_id).'">';
										$image_medium = wp_get_attachment_image_src($value_id, 'medium');
							
									 
									if(!empty($image_medium[0])){ 
							 
										echo '<a class="sao_image_remove"  ></a>';
										echo '<img src="'.esc_url($image_medium[0]).'"/>';
									}
										echo '</div>';
									}
									
									
									
							 
						break;
 						// Multi Options
						case 'multi_options':
							if(!empty($option_value['options'])){
								echo '<ul class="sao_multi_options">'; 
								sao_options_function_multi_item($data,$value_id,$option_value['options'] );
								echo '</ul>';
							}
						break;							
							 
						}
					}
					if (  $option_type =='unit' || $option_type =='according-start' ){}
					elseif($option_type =='according-end'){
							echo '</section>';
							echo '</div>';
					}else{
							echo '</section>';
 							echo '</div>';
					} 
				
					
				endforeach;
				endif;
 
					echo '</div>';
					echo '</div>';
 	 
				
			if(!empty($_REQUEST['option_list'])){
 				 die('');
			}
}

 
  
if ( !function_exists ( "sao_icon_element" )){
  
add_action('init','sao_icon_element');
 function sao_icon_element() { 
 
	global $sao_icon_element;
	
	$element=array();
 
		if(has_filter('sao_icon_element')) {
			$sao_icon_element = apply_filters('sao_icon_element', $element);
		}
  				 
 
}
}
 if ( !function_exists ( "sao_icon_picker" )){
add_action('wp_ajax_nopriv_sao_icon_picker', 'sao_icon_picker');
add_action('wp_ajax_sao_icon_picker', 'sao_icon_picker');
 
function sao_icon_picker() {
		global $sao_icon_element;

		$sao_icons = array();
		$sao_icons =  $sao_icon_element; 
		echo '<div class="sao_icon" data-id="'.esc_attr(sanitize_title($_REQUEST['id'])).'">';
						echo '<div class="sao_icon_middle">';
							echo '<div class="sao_icon_title">'.esc_html__('Choose Icon','saoshyant-slider').'<i class="sao_icon_close"></i><div class="sao_icon_search"><input id="search-input" class="search-icon-control" placeholder="'.esc_html__('Search icons','saoshyant-slider').'" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1"></div>';
							
  								$count_tab = 0;
								echo'<div class="sao_title_tabs">';

								foreach ($sao_icons as  $icon_key => $icon_value):
									$count_tab++;
  												if($count_tab==1){
													$tab_active = 'sao_layout_active';
												}else{
													$tab_active = '';
												}
												
											echo'<a class="sao_tab_'.esc_attr($icon_key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($icon_key).'">'.esc_html($icon_key).'</a>';
								endforeach;  
								echo'</div>';


 							
							echo '</div>';
  							echo '<ul class="sao_icon_content">';
							  $count_active=0;
							 	if(!empty($sao_icons)){
								foreach ($sao_icons as $font => $font_title) {
									$count_active++;
  												if($count_active==1){
													$warp_active = 'sao_layout_group_active';
												}else{
													$warp_active = '';
												}
									
									echo '<section class="sao_icon_warp '.$warp_active.'" data-tab="'.esc_attr($font).'">';
									
 									
										foreach ($font_title as $value_head => $font_child) {
 											echo  '<h2 class="sao_icon_head" >'.esc_attr($value_head).'</h2>';
										
 											foreach ($font_child as $key => $value ) {
												echo  '<li class="sao_icon_item" data-icon="'.esc_attr($key).'">';
													echo'<i class="'.esc_attr($key).'"></i>';
													echo'<span>'.esc_attr($value).'</span>';
												echo   '</li>';	
											}
										  
										}
									echo '</section>';							

								}
								} 
						 					
							echo'</ul>';
							echo '<div class="sao_icon_bottom"><a class="sao_set_icon button-primary">'.esc_html__('Set Icon','saoshyant-slider').'</a></div>';	 
						echo'</div>';
			echo '</div>';
			  	
}
 }
 
if ( !function_exists ( "sao_icon_fonts" )){
 function sao_icon_fonts() {
echo'<div class="sao-icon-fonts">';
	$var='';
 	$array =array(
	'FontAwesome',
	'flaticonarrow',
	'flaticonmultimedia',
	'flaticonbusiness',
	'flaticonoffice',
	'flaticoninterface',
	'flaticonessentialset',
	'flaticontechsupport',
	'flaticontech',
	'flaticonstrategy',
	'flaticonhipster',
	'flaticonfashion',
	'flaticonwebdesign',
	'flaticontravel',
	'flaticonnetwork',
	'metrizeicon',
	'typcn'
	);
 		global $sao_fonticon_style;
   	foreach($array as $font){
		if(!empty($sao_fonticon_style[$font]) ||!empty($_REQUEST['ajax']) ){
		echo "<link rel='stylesheet' id='sao_".$font."-css'  href='".SAOPAGE_DIR."/assets/css/fonts/".$font.".css' media='all' />";
		}
	}
 	
 echo'</div>';
 if(!empty($_REQUEST['ajax'])){
	die();			  	
 }

}
 add_action('wp_ajax_nopriv_sao_icon_fonts', 'sao_icon_fonts');
add_action('wp_ajax_sao_icon_fonts', 'sao_icon_fonts');
 add_action('admin_footer', 'sao_icon_fonts');
  }
 
?>