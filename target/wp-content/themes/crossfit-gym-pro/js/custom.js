// .top4box h6
jQuery(document).ready( function(){
	jQuery('.top4box h6').html(function(i, h){
		return h.replace(/\w+\s/, function(firstWord){
		  return '<span>' + firstWord + '</span>';
		}); 
	});
});
	
jQuery(document).ready( function(){
	var ww = jQuery(window).width();	
	jQuery("area[rel^='prettyPhoto']").prettyPhoto();
	jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	jQuery("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
		custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
		changepicturecallback: function(){ initialize(); }
	});
	jQuery("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
		custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
		changepicturecallback: function(){ _bsap.exec(); }
	});

	// accordion
    jQuery('.accordion-box .acc-content').hide();
    jQuery('.accordion-box h2:first').addClass('active').next().show();
    jQuery('.accordion-box h2').click(function(){
        if( jQuery(this).next().is(':hidden') ) {
            jQuery('.accordion-box h2').removeClass('active').next().slideUp();
            jQuery(this).toggleClass('active').next().slideDown();
        }
        return false; // Prevent the browser jump to the link anchor
    });
	
	// Tabs
	jQuery('ul.tabs > br').remove();
	jQuery('.tabs-wrapper').append(jQuery('.tabs li div'));
	jQuery('.tabs li:first a').addClass('defaulttab selected');
	jQuery('.tabs a').click(function(){
		switch_tabs(jQuery(this));
	});
	switch_tabs(jQuery('.defaulttab'));
	function switch_tabs(obj) {
		jQuery('.tab-content').hide();
		jQuery('.tabs a').removeClass("selected");
		var id = obj.attr("rel");
		jQuery('#'+id).show();
		obj.addClass("selected");
	}

	// Content Toggle
    jQuery(".slide_toggle_content").hide();
	    jQuery('h3.slide_toggle').click(function(){
        if( jQuery(this).next().is(':hidden') ) {
            jQuery('h3.slide_toggle').removeClass('active').next().slideUp();
            jQuery(this).toggleClass('active').next().slideDown();
        }
        return false; // Prevent the browser jump to the link anchor
    });
	
	
 

});
 
// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".sitenav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	
	jQuery(".sitenav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent-2");
		};
	})
	
	jQuery(".toggleMenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".sitenav").slideToggle('fast');
	});
	adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 981) {
		jQuery(".toggleMenu").css("display", "block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".sitenav").hide();
		} else {
			jQuery(".sitenav").show();
		}
		jQuery(".sitenav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".sitenav").show();
		jQuery(".sitenav li").removeClass("hover");
		jQuery(".sitenav li a").unbind('click');
		jQuery(".sitenav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}


jQuery(document).ready(function() {
  	jQuery('.srchicon').click(function() {
			jQuery('.searchtop').toggle();
			jQuery('.topsocial').toggle();
		});	
});

// skill bar script
jQuery(document).ready(function() {
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});

jQuery(document).ready(function(){
	// hide #back-top first
	jQuery("#back-top").hide();	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 0) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		jQuery('#back-top').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

});

jQuery(document).ready(function( jQuery ) {
	jQuery('.counter').counterUp({
		delay: 10,
		time: 1000
	});
});

jQuery(document).ready(function() {
        jQuery('.package-price').each(function(index, element) {
            var heading = jQuery(element);
            var word_array, last_word, first_part;
            word_array = heading.html().split(/\s+/); // split on spaces
            last_word = word_array.pop();             // pop the last word
            first_part = word_array.join(' ');        // rejoin the first words together
            heading.html([first_part, ' <span>', last_word, '</span>'].join(''));
        });
});
jQuery(document).ready(function() {
	jQuery('.show-date').each(function () {
	  var cal = jQuery(this); 
	  var texts = jQuery(this).text().split(" ");
	  cal.empty();                   
	  jQuery.each(texts,function (i, text) {
		cal.append('<span class="' + (i == 1 ? "eventdate" : "year") + '" >'+text+'</span>');
	  });
	});
});


// video popup jQuery
jQuery(document).ready(function( jQuery ) {
     	jQuery(".youtube-link").grtyoutube({
		autoPlay:true,
		theme: "dark"
	});
  }); 
  
jQuery(document).ready(function() {
	jQuery('.event-carousel').owlCarousel({
	loop:true,
	autoplay:true,
	margin:30,
	autoplayHoverPause:true,
	slideBy:1,
	dots: false,
	nav:true,
	navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		768:{
			items:3
		},
		1000:{
			items:4
		}
	}
	})
});


jQuery(document).ready(function() {    
	jQuery('.package-wrapper').owlCarousel({
		loop:true,
		autoplay:true,
		margin:30,
		nav:false,
		dots:true,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			1000:{
				items:3
			}
		}
	})
});

jQuery(document).ready(function() {   
	jQuery('#matchs_slider .owl-carousel').owlCarousel({
		loop:true,	
		autoplay:false ,
		margin:30,
		nav:true,
		autoHeight:false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		dots: false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:2
			},
			1000:{
				items:3
			}
		}
	})
});



jQuery(document).ready(function() {   
	jQuery('#video_slider .owl-carousel').owlCarousel({
		loop:true,	
		autoplay:false ,
		margin:30,
		nav:true,
		autoHeight:false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		dots: false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			1000:{
				items:4
			}
		}
	})
});


jQuery(document).ready(function() {   
	jQuery('.our-classes-list').owlCarousel({
		loop:true,	
		autoplay:false ,
		margin:0,
		nav:true,
		autoHeight:false,
		// navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
		dots: false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			981:{
				items:2
			},
			1024:{
				items:3
			}
		}
	})
});
 

jQuery(window).load(function(){
	jQuery( ".woocommerce ul.products li.product img").wrap("<div class='product-thumb'></div>" );
//	jQuery('.woocommerce ul.products li.product').find('.product-thumb').prepend('<i class="fas fa-eye fa-2x"></i>');
});



/* Start Counter */
function CountDownTimer(a,b){function i(){var a=new Date,i=c-a;if(i<0)return clearInterval(h),void(document.getElementById(b).innerHTML="EXPIRED!");var j=Math.floor(i/g),k=Math.floor(i%g/f),l=Math.floor(i%f/e),m=Math.floor(i%e/d);document.getElementById(b).innerHTML=''+j+" Days - ",document.getElementById(b).innerHTML+=''+k+" HRS - ",document.getElementById(b).innerHTML+=''+l+" MINS - ",document.getElementById(b).innerHTML+=''+m+" SECS"}var h,c=new Date(a),d=1e3,e=60*d,f=60*e,g=24*f;h=setInterval(i,1e3)}
/* End Counter */