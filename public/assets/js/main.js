jQuery(document).ready(function($){

	/*
	------------------------
	VERTICAL BASIC JS BEGINS
	------------------------
	*/

	//ANIMATION VERTICAL FADE-IN EFFECT

	 $(window).scroll(function(){

	 		$('.atl-fade-in').each(function(i){

	 			var bottomOfBox = $(this).offset().top + $(this).outerHeight();
	 			var bottomOfWindow = $(window).scrollTop() + $(window).height() + 20;

	 			if(bottomOfWindow > bottomOfBox){

	 				$(this).animate({'opacity': '1'}, 500);
	 			}

	 		});

	 });

var windowWidth = $(window).width();

if(windowWidth > 1024){

$('.awsme-timeline-right').each(function(){

	var postOuterHeight = $(this).outerHeight();
	var iconOuterHeight = jQuery(this).children('.timeline-icon').outerHeight();
	var dateHeight = $(this).children('.content-date-left').outerHeight();
	var postOuterWidth = $(this).outerWidth();
	var iconOuterWidth = jQuery(this).children('.timeline-icon').outerWidth();

	//ICON POSITION
	 $(this).children('.timeline-icon').css({
		 'margin-top' : (postOuterHeight / 2) + 'px',
	 });

	  //DATE CSS
	 $(this).children('.content-date-left').css({

		 'top' : ( (postOuterHeight / 2) + ( iconOuterHeight / 2 ) - (dateHeight / 2)) + 'px',
		 'right': (postOuterWidth / 2) + iconOuterWidth + 'px'

	 });

});


$('.awsme-timeline-left').each(function(){
	var leftPostOuterHeight = $(this).outerHeight();
	var iconOuterHeight = $(this).children('.timeline-icon').outerHeight();
	var dateRightHeight = $(this).children('.content-date-left').outerHeight();
	var leftPostOuterWidth = $(this).outerWidth();
	var iconOuterWidth = $(this).children('.timeline-icon').outerWidth();

  $(this).children('.timeline-icon').css({
 		'margin-top' : (leftPostOuterHeight / 2) + 'px'
  });

	//DATE CSS
  $(this).children('.content-date-right').css({

 	 'top' : ((leftPostOuterHeight / 2) + ( iconOuterHeight / 2 ) - (dateRightHeight / 2) - 18) + 'px',
 	 'left' : (leftPostOuterWidth/2) + iconOuterWidth + 'px'

  });

});

}

//FOR VIEW PORT GREATER THAN 600 & LESS THAN 1024

if(windowWidth >= 600 && windowWidth <= 1024){

	// ATL LEFT
	$('.awsme-timeline-left').each(function(){
	var leftPostOuterHeight = $(this).outerHeight();
	var iconOuterHeight = $(this).children('.timeline-icon').outerHeight();
	var dateRightHeight = $(this).children('.content-date-left').outerHeight();
	var leftPostOuterWidth = $(this).outerWidth();
	var iconOuterWidth = $(this).children('.timeline-icon').outerWidth();

	$(this).children('.timeline-icon').css({
 		'margin-top' : (leftPostOuterHeight / 2) + 'px'
  	});

	//DATE CSS
	  $(this).children('.content-date-right').css({

	 	 'top' : ((leftPostOuterHeight / 2) + ( iconOuterHeight / 2 ) - (dateRightHeight / 2) - 18) + 'px',
	 	 'left' : (leftPostOuterWidth/2) - 214 + 'px'

	  });
 	

	});

	//ATL RIGHT
	$('.awsme-timeline-right').each(function(){
		var postOuterHeight = $(this).outerHeight();
		var iconOuterHeight = jQuery(this).children('.timeline-icon').outerHeight();
		var dateHeight = $(this).children('.content-date-left').outerHeight();
		var postOuterWidth = $(this).outerWidth();
		var iconOuterWidth = jQuery(this).children('.timeline-icon').outerWidth();

		//ICON POSITION
		 $(this).children('.timeline-icon').css({
			 'margin-top' : (postOuterHeight / 2) + 'px',
		 });


		//  //DATE CSS
		 $(this).children('.content-date-left').css({

			 'top' : ( (postOuterHeight / 2) + ( iconOuterHeight / 2 ) - (dateHeight / 2)) + 'px',
			 'left': (postOuterWidth / 2) - 214  + 'px'

		 });

	});

}

});