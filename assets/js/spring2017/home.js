var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var bodyPos = $('body').scrollTop();

var bodyPrevPos = 0;
var navigatorClickCounter = false;

var schedulePos = $('#schedule').offset().top;

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
	// console.log('working');
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

function displaySearch(state){
	if (state == 1) {
		setTimeout(function(){
			$('#hackbot_search').css('visibility', 'visible');
			$('#hackbot_search').animate({
				opacity: 1
			}, 200);
		},200);
	}else{
		$('#hackbot_search').animate({
			opacity: 0
		}, 100);
		setTimeout(function(){
			$('#hackbot_search').css('visibility', 'hidden');
		},200);
	}
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
		
		displaySearch(0);

		

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

		displaySearch(1);
		
		
		// navigator has been clicked to open the drawer
		$('.page:not(.hackbot-open)').addClass('hackbot-open');
		$('.page.isMobile > *').css('opacity', 0);
		navigatorClickCounter = true;

		// log the body location
		// bodyPrevPos = $('body').scrollTop();
	}
	
	
}

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