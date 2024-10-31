<?php
function sao_slide_callback(){
	global $post;
 	wp_nonce_field( 'sao_slider_meta_box_nonce', 'sao_slider_meta_box_nonce' );

    $values = get_post_custom( $post->ID );
	$link = get_post_meta($post->ID, 'sao_slide_link', true);
	$background_image = get_post_meta($post->ID, 'sao_background_image', true);
 
 	$background_image_src = !empty($background_image['src'])? $background_image['src']:'';
	$background_image_width = !empty($background_image['width'])? $background_image['width']:'';
	$background_image_height = !empty($background_image['height'])? $background_image['height']:'';



	$background_color = get_post_meta($post->ID, 'sao_background_color', true);


 	$background_color_first = !empty($background_color['first'])? $background_color['first']:'';
	$background_color_second = !empty($background_color['second'])? $background_color['second']:'';
	$background_color_third = !empty($background_color['third'])? $background_color['third']:'';
	$background_color_orientation = !empty($background_color['orientation'])? $background_color['orientation']:'';
	
	$sao_max_width = get_post_meta($post->ID, 'sao_max_width', true);

	$max_width = !empty($sao_max_width)? $sao_max_width : '1200';
	
	$responsive_array  = array(
					"auto"				=>	__('Auto','saoshyant-slider'),
					"custom"			=>  __('Custom','saoshyant-slider'), 
		);
	
	
	$orientation  = array(
					"horizontal"		=>  __('horizontal  →','saoshyant-slider'),
					"vertical"			=>  __('vertical  ↓','saoshyant-slider'),
					"diagonal"			=>  __('diagonal  ↘','saoshyant-slider'),
					"diagonal-bottom"	=>  __('diagonal  ↗','saoshyant-slider'),
					"radial"	=>  __('radial  ○','saoshyant-slider'),
				);
				
	$width  = array(
					"1000"			=>  __('1000px','saoshyant-slider'),
					"1100"			=>  __('1100px','saoshyant-slider'),
					"1200"			=>  __('1200px','saoshyant-slider'),
					"1300"			=>  __('1300px','saoshyant-slider'),
					"1400"			=>  __('1400px','saoshyant-slider'),
					"1500"			=>  __('1500px','saoshyant-slider'),
					"1600"			=>  __('1600px','saoshyant-slider'),
					"1700"			=>  __('1700px','saoshyant-slider'),
					"1800"			=>  __('1800px','saoshyant-slider'),
					"1920"			=>  __('1920px','saoshyant-slider'),
 				);
				
				
  
		 
	    $slider_speed = get_post_meta($post->ID, 'sao_slider_speed', true);  
		
    ?><table class="form-table meta_box">     
		<tbody>
 
            
            
            <tr class="meta_sao_featured_image_meta">
                <th style="width:20%"><label for="sao_featured_image_meta"><?php echo esc_html__('Link','saoshyant-slider');?></label></th>
                <td>
                <p>
                    <input type="text" name="sao_slide_link" id="sao_slide_link"  value="<?php echo esc_attr($link); ?>" style="width:100%;" />
                </p>
                <p><?php echo esc_html__('Add the link of the Slide','saoshyant-slider');?></p>
                
                  </td>
            </tr>  
              
      		<tr class="meta_sao_max_width_color meta_sao_color">
                <th style="width:20%"><label for="sao_sao_max_width"><?php echo esc_html__('Max Width Slider Details','saoshyant-slider');?></label></th>
                <td>
                	<div class="sao_max_width">
                	 
                    <select name="sao_max_width" class="sao-max-width-keyup" >
                         	<?php foreach ($width as $key => $name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  selected( $max_width, $key )  ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
                    </select>
                    
                    
                     </div>
                    
                    
                 </td>
            </tr>                 
              
              
         	<tr class="meta_sao_body_background_color meta_sao_color">
                <th style="width:20%"><label for="sao_body_background_color"><?php echo esc_html__('Background Color','saoshyant-slider');?></label></th>
                <td>
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('First','saoshyant-slider');?></label>
					<input  class="cs-wp-color-picker sao-color sao-background-keyup sao_background_color_first"  data-rgba="true" type="text" name="sao_background_color[first]" value="<?php echo esc_attr($background_color_first);?>">
                    </div>
                    
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Second','saoshyant-slider');?></label>
					<input  class="cs-wp-color-picker sao-color  sao-background-keyup sao_background_color_second"  data-rgba="true" type="text" name="sao_background_color[second]" value="<?php echo esc_attr($background_color_second);?>">
                    </div>
                    
                	<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Third','saoshyant-slider');?></label>
					<input  class="cs-wp-color-picker sao-color  sao-background-keyup sao_background_color_third"  data-rgba="true" type="text" name="sao_background_color[third]" value="<?php echo esc_attr($background_color_third);?>">
                    </div>
                    
					<div class="sao_body_background_color">
                	<label> <?php echo esc_html__('Orientation','saoshyant-slider');?></label>
                    <select name="sao_background_color[orientation]" class="sao-background-keyup sao_background_color_orientation" >
                         	<?php foreach ($orientation as $key => $name){  ?>
                    			<option value="<?php echo esc_attr($key) ?>" <?php  selected( $background_color_orientation, $key )  ?>><?php echo esc_html($name);?></option> 
							<?php }?>                      
                    </select>
                    
                    
                     </div>
                    
                    
                 </td>
            </tr>   
            
            
             <tr class="meta_sao_background_image">
                <th style="width:20%"><label for="sao_background_image"><?php echo esc_html__('Slider Background Image','saoshyant-slider');?></label></th>
                <td> 
 	  	 		<a class="sao_slider_add_image button button-small"  data-uploader-title="<?php echo esc_attr__('Choose Image','saoshyant-slider');?>" data-uploader-button-text="<?php echo esc_attr__('Use This Image','saoshyant-slider');?>"> <?php echo esc_html__('Upload','saoshyant-slider')?></a>
                
                
 				<input type="hidden" name="sao_background_image" value="<?php echo esc_attr($background_image);?>">
 		
        		<?php $background_id = !empty($background_image)? wp_get_attachment_image_src($background_image, 'full'):'';?>
        
        
        		<?php $image_active = !empty($background_id) ? 'sao_slider_image_active':'';?> 
        		 
  	   			<a class="sao_slider_remove_image button <?php echo esc_attr($image_active); ?> button-small" ><?php echo  esc_html__('Remove Image','saoshyant-slider');?></a>
 		 		 
               	</td>
            </tr>               
                            
      
		                                   
                 
              	  
                 
                        
     	</tbody>
     </table>
     <?php
}

 ?>