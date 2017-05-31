$(window).scroll(function() {
	var scroll = $(window).scrollTop();


	
 	var getElmy2 = $('#animate2').offset();
	 scrlMatch2 = getElmy2.top;  
    if (scroll > scrlMatch2-300){
		$('.header').addClass('dn');
		var propDiv =$('.twoSec');
		propDiv.eq(0).animate({
			left: "0",
			opacity: '1',
		},1000,'swing');
		propDiv.eq(1).animate({
			left: "600",
			opacity: '1',
		},1000,'swing');		
	}else{
		$('.header').removeClass('dn');
	}

   var getElmy3 = $('#animate3').offset();
    scrlMatch3 = getElmy3.top-500; 
	if (scroll > scrlMatch3){
		$('.header').removeClass('dn');
		$('.footer').animate({
			opacity: '1'
		},1000,'swing');	
	}	
	
  var getElmy4 = $('#animate4').offset();
    scrlMatch4 = getElmy4.top-950; 
	if (scroll > scrlMatch4){
		var propDiv =$('.propAminities li');
		$('.propAminities').slideDown();
		propDiv.eq(0).slideDown();
		propDiv.eq(1).delay(500).slideDown();	
		propDiv.eq(2).delay(1000).slideDown();	
		propDiv.eq(3).delay(1500).slideDown();		
	}	
	
 	var getElmy5 = $('#animate5').offset();
	 scrlMatch5 = getElmy5.top;  
    if (scroll > scrlMatch5-300){
		var propOddLst =$( ".propList:nth-child(odd)  .listDiv  .toAnimate" );
		var propEvnLst =$( ".propList:nth-child(even)  .listDiv  .toAnimate" );
		propOddLst.delay(1000).animate({
			left: "0",
			opacity: '1',
		},1000,'swing');
		propEvnLst.delay(1000).animate({
			right: "0",
			opacity: '1',
		},1000,'swing');		
	}	

});		


// $(document).ready(function () {
    // var divs = $('.mydiv');
    // var dir = 'up'; // wheel scroll direction
    // var div = 0; // current div
    // $('.awrdRapDiv').on('DOMMouseScroll mousewheel', function (e) {
        // if (e.originalEvent.detail > 0 || e.originalEvent.wheelDelta < 0) {
            // dir = 'down';
        // } else {
            // dir = 'up';
        // }
	
        // if (dir == 'up' && div > 0) {
			// div++;
			// alert(div);
			// $('.awrdRapDiv').animate({
			// scrollTop: $(divs.eq(2)).offset().top
			// }, 20000000);
        // }else{
				// if (dir == 'down' && div < divs.length) {
				// div--;
				// $('.awrdRapDiv').animate({
				// scrollTop: $(divs.eq(div)).offset().top
				// }, 20000000);
			// }
		// }
	// });
// });