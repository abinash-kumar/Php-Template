
			

$(window).scroll(function() {
	var scrollLnth = $(window).scrollTop();
	var getElmy = $('#animateStrt').offset();
	 scrlMatch1 = getElmy.top;
	  
   if (scrollLnth > scrlMatch1-300){
	   $('.header').removeClass('dn');
		var propDiv =$('.propContnr');
		propDiv.eq(0).animate({
			left: "0",
			opacity: '1',
		},1000,'swing');
		propDiv.eq(1).animate({
			top: "0",
			opacity: '1',
		},1000,'swing');
		propDiv.eq(2).animate({
			left: "800",
			opacity: '1',
		},1000,'swing');

		}
		 
 	var getElmy2 = $('#animate2').offset();
	 scrlMatch2 = getElmy2.top;  
    if (scrollLnth > scrlMatch2-300){
		$('.header').removeClass('dn');
		var propDiv =$('.twoSec');
		propDiv.eq(0).animate({
			left: "0",
			opacity: '1',
		},1000,'swing');
		propDiv.eq(1).animate({
			left: "600",
			opacity: '1',
		},1000,'swing');		
	}
	
 	var getElmy4 = $('#review').offset();
	 scrlMatch4 = getElmy4.top;  
    if (scrollLnth > scrlMatch4-300){
		$('.header').addClass('dn');	
	
	}	
	
	
	
   var getElmy3 = $('#animate3').offset();
    scrlMatch3 = getElmy3.top-500; 
	if (scrollLnth > scrlMatch3){
		$('.header').removeClass('dn');
		$('.footer').animate({
			opacity: '1'
		},1000,'swing');	
	}
	
	
});


