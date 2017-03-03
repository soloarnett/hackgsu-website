
function resize(){
	makeMobile();
	// console.log('working');
}



function isAndroid(){
	/*
		FUNCTION NAME:	isAndroid
		PARAMETERS:		none
		DESCRIPTION:	checks to see if the user agent is of type android
	*/
	
	
	return /Android/i.test(navigator.userAgent);
}

function isApple(){
	/*
		FUNCTION NAME:	isApple
		PARAMETERS:		none
		DESCRIPTION:	checks to see if the user agent is of type apple
	*/
	
	
	return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

function makeMobile(){
	/*
		FUNCTION NAME:	makeMobile
		PARAMETERS:		none
		DESCRIPTION:	adds mobile class to each html tag if the page is running on a mobile device
	*/
	
	
	if (isAndroid() || isApple() || $('html').hasClass('frameMobile')) {
		$("*:not(.isMobile)").addClass("isMobile");
	}else{
		$("*.isMobile").removeClass("isMobile");
	}
}



function scrollMeUp(scrollMe, time){
	$(scrollMe).animate({
		scrollTop: 0
	}, time);
}

function scrollTo(elem, time){
	$('body').animate({
		scrollTop: $(elem).offset().top + 1
	}, time);
}

function scrollToMinus(elem, time, minus){
	$('body').animate({
		scrollTop: $(elem).offset().top + 1 - minus
	}, time, "swing");
}

function scrollToValue(location, time){
	$('body').animate({
		scrollTop: location
	}, time);
}

// function faqKeyframeChanger(count, height){
// 	var text = '@keyframes faq-item-open{ 0%{ height: 100px;background-color: $color-black;color: white;overflow: hidden;cursor: pointer;}99%{overflow: hidden;cursor: pointer;}100%{height: ' + height + 'px;background-color: white;color: black;overflow: auto;cursor: default;}}';
// 	var id = '#keyframe-changer-' + count;
// 	// $(id).inner(text);
// }

// faqKeyframeChanger(8, 200);







$(document).ready(function(){
	// onLoad();
	// window.onresize = resize;
	makeMobile();
});