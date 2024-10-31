<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Elementor saoshyant_slider
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
class saoshyant_slider extends \Elementor\Widget_Base {

 
	public function get_name() {
		return 'saoshyant_slider';
	}

 
	public function get_title() {
		return __( 'اسلایدر سوشیانت', 'reza' );
	}

 
	public function get_icon() {
		return 'eicon-slides';
	}
	public function get_categories() {
		return [ 'sao' ];
	}


protected function register_controls() {

  	 $this->register_controls_general();
 	 $this->register_controls_slider();
	$this->register_controls_layout();
	 $this->register_controls_style();

	}
    
 
	 
	protected function register_controls_general(){
		$option = array();
	
		$options_sliders = array();
		$options_sliders_obj = get_categories('taxonomy=sao_sliders&type=sao_slides'); 
		foreach ($options_sliders_obj as $slider) {
			$options_sliders[$slider->slug] = $slider->cat_name;
		}	

		$this->start_controls_section(
			'general',
			[
				'label'			=> __( 'General', 'saoshyant-slider' ),
			]
		); 
				
		$this->add_control(
			'number',
			[
				'label'			=>__('Number of Posts to show','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::NUMBER ,
				"default"		=> '5' ,
			]
		); 		
			
		$this->add_control(
			'sliders',
			[
				'label'			=> __('Slider','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::SELECT,
				'multiple'		=> true,
				'options'		=> $options_sliders,	
			]
		);
			   
				
		 $this->end_controls_section();

 
 	}
	
	protected function register_controls_slider(){
		
		$this->start_controls_section(
			'slider',
			[
				'label' => __( 'Slider', 'saoshyant-slider' ),
			]
		);
		
		$this->add_control(
			'pager',
			[
				'label'			=>__('Pager','saoshyant-slider'),
 				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'yes' ,
			]
		); 	
		
		
		$this->add_control(
			'pager_position',
			[
				'label'			=>__('Position Pager','saoshyant-slider'),
 				'type'			=> \Elementor\Controls_Manager::SELECT ,
				'condition'		=> ['pager' => 'yes'],
 				"options"		=>  [
					"top" =>  __('Top','saoshyant-slider'),
					"bottom" =>  __('Bottom','saoshyant-slider')	 
					 
				]
			]
		); 						
		 
				
		$this->add_control(
			'arrows',
			[
				'label'			=>__('Arrows','saoshyant-slider'),
 				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'yes' ,
			]
		); 			 
				
		$this->add_control(
			'arrow_location',
			[
				'label'			=> 'موقعیت فلش',
				'condition'		=> ['arrows' => 'yes'],
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>  [
 						"" 				=>esc_html__('Default','saoshyant-slider'),
						"slider-1" 				=>esc_html__('Location 1','saoshyant-slider'),
						"slider-2" 				=>esc_html__('Location 2','saoshyant-slider'),
						"slider-3" 				=>esc_html__('Location 3','saoshyant-slider'), 	 
					 
				]
			]
		); 
		 
		 
		$this->add_control(
			'arrow_layout',
			[
				'label'			=> 'طرح بندی فلش',
				'condition'		=> ['arrows' => 'yes'],
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>  [
					""				=> __('Default','saoshyant-slider'),	
					"hover"			=> __('On Hover','saoshyant-slider'),		 
					"fixed"			=> __('Fixed','saoshyant-slider'),	
					 
				]
			]
		); 
		$this->add_control(
			'arrow_size',
			[
				'label'			=> __('Arrows Size','saoshyant-slider'),
				'condition'		=> ['arrows' => 'yes'],
				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>  [
	""				=> __('Default','saoshyant-slider'),	
					"small"			=> __('Small','saoshyant-slider'),		 
					"medium"		=> __('Medium','saoshyant-slider'),		 
					"large"			=> __('Large','saoshyant-slider'),	
					 
				]
			]
		); 
				
	 
		   		   
		$this->add_control(
			'timer',
			[
				'label'			=>__('Timer','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'yes' ,
			]
		); 
		
		
		
		   
		$this->add_control(
			'auto',
			[
				'label'			=>__('Auto Play','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'yes' ,
			]
		); 
		 
		$this->add_control(
			'loop',
			[
				'label'			=>__('Loop','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::SWITCHER ,
				"default"		=> 'no' ,
			]
		); 
 
 
		$this->add_control(
			'speed',
			[
				'label'			=>__('Animation Speed ,Default "5000"','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::TEXT ,
				"default"		=> '2000' ,
			]
		); 
		 
		$this->add_control(
			'pause',
			[
				'label'			=> __('Animation Pause Time','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::TEXT ,
				"default"		=> '10000' ,
			]
		); 
		 
		 $this->end_controls_section();
 

 
 	}
	protected function register_controls_layout(){
		$this->start_controls_section(
			'layout',
			[
				'label' => __( 'Layout', 'saoshyant-slider' ),
			]
		);
		
		$this->add_control(
			'height',
			[
				'label'			=>  __('Height','saoshyant-slider'),
 				'type'			=> \Elementor\Controls_Manager::SELECT,
				"options"		=>  [
						'50'				=>	'50px',
						'100'				=>	'100px',
						'150'				=>	'150px',
						'200'				=>	'200px',
						'300'				=>	'300px',
						'400'				=>	'400px',
						'500'				=>	'500px', 
						'600'				=>	'600px',
						'700'				=>	'700px',
						'800'				=>	'800px',
						'900'				=>	'900px',
						'1000'				=>	'1000px',
						"custom"			=>  __('Custom','saoshyant-slider'),
 				]
			]
		); 		
		
	$this->add_control(
			'custom-height',
			[
				'label'			=>  __('Custom Height','saoshyant-slider'),
				'type'			=> \Elementor\Controls_Manager::TEXT ,
				"default"		=> '500' ,
				'condition'		=> ['height' => 'custom'],
			]
		); 
 	
	 
  $this->add_responsive_control(
			'elementor_padding',
			[
				'label' =>__('Padding','saoshyant-slider'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
								"0px" 			=> "0px",
								"1px" 			=> "1px", 
								"10px" 	=> "10px",
								"10px 15px" 	=> "10px - 15px",
								"10px 20px" 	=> "10px - 20px",
								"15px"		 	=> "15px",
								"15px 20px" 	=> "15px - 20px",
								"15px 30px" 	=> "15px - 30px",
								"20px" 			=> "20px",
								"20px 30px" 	=> "20px - 30px",
								"20px 40px" 	=> "20px - 40px",
								"30px" 	=> "30px",
								"30px 40px" 	=> "30px - 40px",
								"40px" 	=> "40px",
								"50px" 	=> "50px"
				],
 
			 	'default' =>  sao_elementor_default_padding(),
 				'selectors' => [
					'{{WRAPPER}} .sao-elementor-item ' => '  padding: {{VALUE}}  !important  ;',
				],
			]
		); 
		$this->end_controls_section();
	 
	}
	 
	 
	protected function register_controls_style(){
		$this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'saoshyant-slider' ),
		'tab'			=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
	 
	$this->add_control(
		'pager_color',
		[
			'label'			=>__('Pager Color','saoshyant-slider').' - '.__('Color','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'		=> ['pager' => 'yes'],
			
		]
	);
	$this->add_control(
		'pager_active_color',
		[
			'label'			=>__('Pager Color','saoshyant-slider').' - '.__('Active Color','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::COLOR,
					'condition'		=> ['pager' => 'yes'],
		
		]
	);
	
	
	
	$this->add_control(
		'arrow_background',
		[
			'label'			=>__('Arrow Color','saoshyant-slider').' - '.__('Background','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'		=> ['arrows' => 'yes'],
			
		]
	);
	$this->add_control(
		'arrow_text',
		[
			'label'			=>__('Arrow Color','saoshyant-slider').' - '.__('Arrow','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::COLOR,
				'condition'		=> ['arrows' => 'yes'],
			
		]
	);	 	
	
	
	$this->add_control(
		'arrow_radius',
		[
			'label'			=>__('Arrow Radius','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::NUMBER,
				'condition'		=> ['arrows' => 'yes'],
			
		]
	);	  	
	
	$this->add_control(
		'timer_color',
		[
			'label'			=>__('Timer Color','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::COLOR,
					'condition'		=> ['timer' => 'yes'],
			
		]
	);	 
	
	
	$this->add_control(
		'radius',
		[
			'label'			=>__('Border Radius','saoshyant-slider'),
			'type'			=> \Elementor\Controls_Manager::NUMBER,
			'default' =>  sao_elementor_default_border_radius(),
		]
	);	  
	  
		$this->end_controls_section();
	 
	}
	 
	 
	protected function render() {
 		$option = $this->get_settings_for_display();
 		$args=array();
		$args['key']= $this->get_id();
	 
 		$args['option'] = array(
		
 
    			'number'					=> sao_settings($option,'number'),
   			'sliders'				=> sao_settings($option,'sliders'),
			
			//Slider
   			'pager'					=> sao_settings($option,'pager'),
			'pager_position'		=> sao_settings($option,'pager_position'),
			'arrows'				=> sao_settings($option,'arrows'),
  			'arrow_layout'=> array(
				'location'				=> 	sao_settings($option,'arrow_location'),
				'layout'				=>	sao_settings($option,'arrow_layout'),
 				'size'					=>	sao_settings($option,'arrow_size'),
 			),
			'timer' 					=> sao_settings($option,'timer'),
			'auto' 					=> sao_settings($option,'auto'),
 			'effect' 				=> 'fade',
			'speed' 				=> sao_settings($option,'speed'),
			'pause' 				=> sao_settings($option,'pause'),			 
  

			//Layout//
			'height' 				=> sao_settings($option,'height'),
			'custom-height'			=> sao_settings($option,'custom-height'),
			
			
			'pager_color'=> array(
				'color'				=> 	sao_settings($option,'pager_color'),
				'active_color'				=>	sao_settings($option,'active_color'),
  			),	
			
			'arrow_color'=> array(
				'background'				=> 	sao_settings($option,'arrow_background'),
				'text'				=>	sao_settings($option,'arrow_text'),
  			),	
			'arrow_radius'=>  sao_settings($option,'arrow_radius'),
 			'timer_color'=> array(
				'first'				=> 	sao_settings($option,'timer_color'),
   			),	
			'loop'					=>  sao_settings($option,'loop'),
			'effect'				=>  sao_settings($option,'effect'),
			'radius'=> array(
				'size'				=> 	sao_settings($option,'radius'),
   			),	
				
								
    	  	'elementor_padding'		=> sao_settings($option,'elementor_padding'),
   	  
   			 
   		); ?>
		<div  class="sao-elementor-<?php echo $this->get_id();?> sao-elementor-item">
   		<?php echo sao_slider_config($args, true,true);?>
 </div> 
<?php
 if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {?>
			 <div class="sao-elementor-script">     
					<script type="text/javascript">
					  (function($) {
						'use strict';
							jQuery(document).ready(function() {
 	 	 					setTimeout(function(){  
									$('.sao-elementor-<?php echo $this->get_id();?>').sao_slider();
     								$('.sao-elementor-<?php echo $this->get_id();?>').sao_custom_slider();
 
 								 
							}, 1000);
									 
   							}); 
							 
 						})(jQuery);
 	               </script>
		
			</div>
		<?php		
	   }	 
	}
	
}
 
?>
