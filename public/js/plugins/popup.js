$(document).ready(function(){
	$('.popup').click(function() {
	var mydiv = document.getElementById("popup-wrapper");
	var curr_width = parseInt(mydiv.style.width);
	var curr_height = parseInt(mydiv.style.height);
	if(curr_height){
		var curr_height2 = curr_height;
		
	}else{
		var curr_height2 = 0;
	}

	  $('#popup-wrapper').css('top',($(window).height()/2) - curr_height2/2);
	  $('#popup-wrapper').css('left',$(window).width()/2 - curr_width/2);
	  $('#popup-wrapper').css('buttom',$(window).width()/2 - curr_width/2);
	  $('#popup-wrapper').css('right',$(window).width()/2 - curr_width/2);
	  $('#popup-wrapper').fadeIn();
	  $('#overlay').fadeIn('fast', function(){
		  var scrollPosition = [
			self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
			self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
		  ];
		  var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
		  html.data('scroll-position', scrollPosition);
		  html.data('previous-overflow', html.css('overflow'));
		  //html.css('overflow', 'hidden');
		  window.scrollTo(scrollPosition[0], scrollPosition[1]);
	  });
	});
	
	$('#overlay').click(function() {
	  $('#popup-wrapper').fadeOut();
	  $('#overlay').fadeOut('fast', function(){
		  var html = jQuery('html');
		  var scrollPosition = html.data('scroll-position');
		  html.css('overflow', html.data('previous-overflow'));
		  window.scrollTo(scrollPosition[0], scrollPosition[1])
	  });
	});
});