(function($){
 "use strict";
		
	$.fn.sao_custom_slider = function() {
 var this_is =$(this);
 
   	$(this).find('.sao-custom-slider').each(function(index, block) {	 

  		if(jQuery().sao_lightSlider && !$(this).hasClass('sao-slider-single')){
			var data_slider = jQuery.parseJSON( $(this).find('.sao-slider-options').html());
			 
		 
			data_slider['onSliderLoad']= function ($el, scene) {
				
				
				
			};
			data_slider['onBeforeSlide']= function ($el, scene) {
	  
			 
	  
	  
					$el.find('.sao-slider-item').each(function(index, block) {	
					if(!$(this).hasClass('active')){
							 $(this).addClass('active');
						}else{
							$(this).removeClass('active');
						$(this).removeClass('first-active');
	
					} 
					});
			}; 
		 
			$(this).find('.sao-slider-list').sao_lightSlider(data_slider);
 		}else{
			$(this).find('.sao-slider-item').addClass('active');
			
		}

 		
 			
	});
  
  	function sao_slider_padding(this_element){ 

		this_element.find('.sao-custom-slider  .sao-slider-list-warp').each(function(index, element) {
		
 			var width = $(this).find('.sao-slider-details').attr('data-width');
			
 			var width_warp = $(this).width();
			if(width_warp < width){
 				$(this).addClass('sao-auto-height');
			}else{
 				$(this).removeClass('sao-auto-height');
			}
 			 
		 
 	
 	 
   		}); 
	}
	    		 
	function sao_slider_featured_responsive(this_element){ 

		this_element.find('.sao-custom-slider .sao-slider-details,.sao-slider-featured  .sao-slider-details').each(function(index, element) {
 						
				var width= $(this).attr('data-width');
 				var height= $(this).attr('data-height');
  				var width_warp= $(this).parent().width();
 				var height_warp= $(this).parent().height();
    			var	scaleX = width_warp  / width;
  			var	scaleY =height_warp   / height;
 			
						var res_width =   (width /width_warp)*100 ;
			var res_height = (height  / height_warp)*100;
					  
			 
			
			
			var main_scale = (scaleX > scaleY) ? scaleY : scaleX;
   			$(this).attr('style' ,"--sao-sl-dt-sc:"+main_scale+";--sao-sl-dt-sc-wt:"+res_width+"%;--sao-sl-dt-sc-ht:"+res_height+"%; ");
  			 
  			 
 		});
	}
	sao_slider_padding($(this)); 
	sao_slider_featured_responsive($(this));
	$(window).resize(function () { 
		 setTimeout(function(){
			sao_slider_padding(this_is); 
 			sao_slider_featured_responsive(this_is);		 
		}, 500);
	 
 
	});
  
	 }
	 
 })(jQuery);
 jQuery(function($) {
	'use strict'; 
	jQuery(document).ready(function() {
		  	if(jQuery().sao_slider){
   			 $('body').sao_slider();
			}
		$('body').sao_custom_slider();
 
 
	 
 	});
 });
 