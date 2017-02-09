var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var bodyPos = $('body').scrollTop();
var schedulePos = $('#schedule').offset().top;
var bodyPrevPos = 0;
var navigatorClickCounter = false;

function resizeFunction(){
	/*
		FUNCTION NAME:	resizeFuntion
		PARAMETERS:		none
		DESCRIPTION:	runs a set of operations when the browser window is resized
	*/
	
	windowHeight = window.innerHeight;
	windowWidth = window.innerWidth;
	schedulePos = $('#schedule').offset().top;
	makeMobile();
	scrollFunction();
}

function scrollFunction(){
	/*
		FUNCTION NAME:	scrollFunction
		PARAMETERS:		none
		DESCRIPTION:	runs a set of operations when the browser window is scrolled
	*/
	if (!navigatorClickCounter) {
		bodyPrevPos = $('body').scrollTop();
	}
	bodyPos = $('body').scrollTop();
	
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
	
	
	if (isAndroid() || isApple()) {
		$("*:not(.isMobile)").addClass("isMobile");
	}else{
		$("*.isMobile").removeClass("isMobile");
	}
}

function displayNavLinksMobile(){
	/*
		FUNCTION NAME:	displayNavLinksMobile
		PARAMETERS:		none
		DESCRIPTION:	displays the mobile nav links that are hidden by default due to <noscript>
	*/
	
	
	$(".hackbot>.nav-links>.modified-link>label>.link").css("display", "block");
}

function labelClicked(label){
	/*
		FUNCTION NAME:	labelClicked
		PARAMETERS:		label
		DESCRIPTION:	when a label is clicked, this function will log the users current position and return to it when the close label is clicked
	*/
	

	
}

function navigatorClicked() {
	/*
		FUNCTION NAME:	navigatorClicked
		PARAMETERS:		none
		DESCRIPTION:	function that runs when the #navigator label has been clicked
	*/

	if (navigatorClickCounter) {
		// navigator has been clicked to close the drawer
		navigatorClickCounter = false;

		// return to the bodyPrevPos location
		// console.log(bodyPrevPos);
		setTimeout(function(){
			$('.page').removeClass('hackbot-open');
		},200);
		

		if (bodyPrevPos > windowHeight) {
			setTimeout(function(){
				$('.page > *').animate({
					opacity: 0
				}, 200);
				setTimeout(function(){
					scrollToValue(bodyPrevPos, 0);
					setTimeout(function(){
						$('.page > *').animate({
							opacity: 1
						}, 200);
					},100);
				},200);
			},200);
		}else{
			$('.page.isMobile > *').css('opacity', 1);
			setTimeout(function(){
				scrollToValue(bodyPrevPos, 200);
			},200);

		}
	}else{
		// navigator has been clicked to open the drawer
		$('.page:not(.hackbot-open)').addClass('hackbot-open');
		$('.page.isMobile > *').css('opacity', 0);
		navigatorClickCounter = true;

		// log the body location
		// bodyPrevPos = $('body').scrollTop();
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

function faqKeyframeChanger(count, height){
	var text = '@keyframes faq-item-open{ 0%{ height: 100px;background-color: $color-black;color: white;overflow: hidden;cursor: pointer;}99%{overflow: hidden;cursor: pointer;}100%{height: ' + height + 'px;background-color: white;color: black;overflow: auto;cursor: default;}}';
	var id = '#keyframe-changer-' + count;
	// $(id).inner(text);
}

faqKeyframeChanger(8, 200);

function onLoad(){
	/*
		FUNCTION NAME:	onLoad
		PARAMETERS:		none
		DESCRIPTION:	all of the functions that need to be run when the page is loaded, includes bindings
	*/
	
	resizeFunction();
	displayNavLinksMobile();
	window.onresize = resizeFunction;
	window.onscroll = scrollFunction;
	$('body').on('scroll', scrollFunction);
	$('#navigator').click(function(){
		navigatorClicked();
	});
	
}





$(document).ready(function(){
	onLoad();
});