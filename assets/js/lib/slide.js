(function($){
 
	 $.fn.sao_slider = function() {

		 
   	function sao_get_image_custom_height_ratio(this_element){ 
		$('body').addClass('body-full-width');
 		this_element.find('.sao-image-gallery-slider .sao-slider-list-warp').each(function(index, element) {
		 $(this).attr('style','--sao-sl-wt:'+$(this).width()+';') ;
		 
	 
 	 
   		}); 
		
		this_element.find('.sao-custom-slider  .sao-slider-list-warp').each(function(index, element) {
		var width = $(this).find('.sao-slider-details').width();
		 $(this).attr('style','--sao-sl-wt:'+width+';') ;
   	 
   		}); 
		
	 this_element.find('.sao-slider-details').each(function(index, element) {
 					$(this).css({'width':$(this).attr('data-width')});
		 
 					$(this).css({'height':$(this).attr('data-height')});
			  
		  
 				$(this).attr('data-width',$(this).width() );
				$(this).attr('data-height',$(this).height() );
				
		}); 
		
		 $('body').removeClass('body-full-width');
	}	  
	sao_get_image_custom_height_ratio($(this));	
 
 	 
  	if(jQuery().sao_lightSlider){
	
  	$(this).find('.sao-image-gallery-carousel,.sao-image-gallery-slider').each(function(index, block) {	 
 		var $this = $(this);
		var data_slider = jQuery.parseJSON( $(this).find('.sao-slider-options').html());
		console.log(data_slider);
		if(!$(this).find('.sao-slider-list').hasClass('lightSlider')){
			
  		$(this).find('.sao-slider-list').sao_lightSlider(data_slider);
		}
 	});
	}
 	function slider_thumbnail_arrows(this_element){ 

  	this_element.find('.sao-image-gallery-slider.sao-thumbnail-horizontal').each(function(index, block) {
		var thumbnail_height = $(this).find('.sao-thumbnail-list-warp').height();
		$(this).find('.sao-slider-list-warp').css('--sao-tm-ht', thumbnail_height+"px");
		
  	});
 	this_element.find('.sao-image-gallery-slider.sao-thumbnail-vertical').each(function(index, block) {
		var thumbnail_height = $(this).find('.sao-thumbnail-list-warp').width();
		$(this).find('.sao-slider-list-warp').css('--sao-tm-wt', thumbnail_height+"px");

		
  	});	
  	
	}
	 
	 
	slider_thumbnail_arrows($(this));
	
 
 
 }
 })(jQuery);
 