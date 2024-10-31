<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																slider_elementor_widgetse
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_elementor_widgets" )){
function sao_slider_elementor_widgets() {
 
			
 		 require_once(SAOSIDER_PATH . 'elementor-sao-slider.php' );  
			// Register widget
			
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \saoshyant_slider() );  
 
 
}
add_action( 'elementor/widgets/widgets_registered', 'sao_slider_elementor_widgets' );
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 slider_elementor_widget_categories
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
 if ( !function_exists ( "sao_slider_elementor_widget_categories" )){
function sao_slider_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'sao',
		[
			'title' => __('Saoshyant Slider','saoshyant-slider'),
			'icon' => 'fa fa-plug',
		]
	);
 

}
add_action( 'elementor/elements/categories_registered', 'sao_slider_elementor_widget_categories' );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
 
 ?>