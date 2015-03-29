		(function($) {
		"use strict";
			// Important note! If you're adding CSS3 transition to slides, fadeInLoadedSlide should be disabled to avoid fade-conflicts.
			jQuery(document).ready(function($) {
			  var si = $('#gallery-1').royalSlider({			  
				addActiveClass: true,
				arrowsNav: false,
				controlNavigation: 'none',
				autoScaleSlider: true, 
				autoScaleSliderWidth: 960,     
				autoScaleSliderHeight: 340,
				loop: true,
				fadeinLoadedSlide: false,
				globalCaption: true,
				keyboardNavEnabled: true,
				globalCaptionInside: false,
			
				visibleNearby: {
				  enabled: true,
				  centerArea: 0.5,
				  center: true,
				  breakpoint: 650,
				  breakpointCenterArea: 0.64,
				  navigateByCenterClick: true
				}
			  }).data('royalSlider');
			
			  // link to fifth slide from slider description.
			  $('.slide4link').click(function(e) {
				si.goTo(4);
				return false;
			  });


              // create slide
                $('#simple-vertical').royalSlider({
                    arrowsNav: true,
                    arrowsNavAutoHide: false,
                    fadeinLoadedSlide: true,
                    controlNavigation: 'none',
                    imageScaleMode: 'fill',
                    imageAlignCenter:true,
                    loop: false,
                    loopRewind: false,
                    numImagesToPreload: 4,
                    slidesOrientation: 'vertical',
                    keyboardNavEnabled: true,
                    video: {
                        autoHideArrows:true,
                        autoHideControlNav:true
                    },

                    autoScaleSlider: true,
                    autoScaleSliderWidth: 1090,
                    autoScaleSliderHeight: 668,

                    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
                    imgWidth: 1090,
                    imgHeight: 668
                });

			});
		
			
			if($('#testimonials').length){
		// Randomise
		$('.testimonial-nav').each(function(){
		    var container = $(this),
		    	children = container.children('li');
		    children.sort(function(a,b){
		          var temp = parseInt( Math.random()*8 );
		          var isOddOrEven = temp%2;
		          var isPosOrNeg = temp>5 ? 1 : -1;
		          return( isOddOrEven*isPosOrNeg );
		    })
		    .appendTo(container);            
		});

		$('#testimonials .testimonial:eq(8),#testimonials .testimonial-nav a:eq(8)').addClass('active');
		$('#testimonials .testimonial-nav a').hover(function(){
			$('#testimonials .testimonial-nav a,#testimonials .testimonial').removeClass('active');
			$(this).addClass('active');
			$($(this).attr('href')).addClass('active');
		});
		$('#testimonials .testimonial-nav a').click(function(){ return false; });
	}
		})(jQuery);



