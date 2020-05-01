jQuery( document ).ready(function($) {
	
	// Initialize FitVids (applied only to videos that appear in posts & pages)
	$( '.entry-content' ).fitVids();

	// Double tap responsive menu (For responsive devices.  Standard rollover in desktop and laptop browsers)
	$( '#nav li:has(ul)' ).doubleTapToGo();

	// Slider

	$('.flexslider').imagesLoaded( function() {
	  $('.flexslider').flexslider({
	    animation : 'fade',
	    smoothHeight : true,
	    controlNav : false
	  });
	});  

  // Shrink fixed header on scroll

	function shrinkHeader() {

		if ($(window).width() > 960) {

	  	var headerHeight = $('.site-header-inner').height();  	

	  	$('body').css('margin-top', headerHeight);	 

		  $(window).scroll(function () {
			  if ($(document).scrollTop() >= headerHeight) {
			    $('.site-header-inner').addClass('tiny');
			  } else {
			  	$('.site-header-inner').removeClass('tiny');
			  }
			});
		} else {
			$('body').css('margin-top', 0);	 
		}
	}

	shrinkHeader();

  $(window).bind('resize', shrinkHeader);

	// Search
	$( ".search-btn" ).click(function() {
	  if ( $('.header-search').hasClass('open') == true ) {
	    $('.header-search').removeClass('open');
	  } else {
	    $('.header-search').addClass('open');
	  }
	});

});