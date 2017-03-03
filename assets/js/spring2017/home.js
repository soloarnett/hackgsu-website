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
	if (windowWidth < 830) {
		$("html:not(.isMobile)").addClass("frameMobile");
		$("#iframe_search").contents().find("html:not(.isMobile)").addClass("frameMobile");
	}else{
		$("html.frameMobile").removeClass("frameMobile");
		$("#iframe_search").contents().find("html.frameMobile").removeClass("frameMobile");
		if ($('.page').hasClass('hackbot-open') == false) {
			$('.page:not(.isMobile) > *').css('opacity', 1);
		}
	}

	// if (makeMobile()) {
	// 	$("html:not(.isMobile)").addClass("frameMobile");
	// 	$("#iframe_search").contents().find("html:not(.isMobile)").addClass("frameMobile");
	// }
	makeMobile();
	
	scrollFunction();
	// console.log('working');
}

// function makeMobile(){
	
// 		FUNCTION NAME:	makeMobile
// 		PARAMETERS:		none
// 		DESCRIPTION:	adds mobile class to each html tag if the page is running on a mobile device
	
	
	
// 	if (isAndroid() || isApple() || windowWidth < 630) {
// 		$("*:not(.isMobile)").addClass("isMobile");
// 	}else{
// 		$("*.isMobile").removeClass("isMobile");
// 	}
// }


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
	if (bodyPos > 190) {
		$('.searchAnything').css('opacity', 0);
	}else{
		if ($('.page').hasClass('hackbot-open')==false) {
			$('.searchAnything').css('opacity', 1);
		}
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

function displaySearch(state){
	if (state == 1) {
		$('.searchAnything').css('opacity', 0);
		setTimeout(function(){
			
			$('.hackbot>.nav-links.isMobile').css('opacity', 1);
			$('#hackbot_search').css('visibility', 'visible');
			$('#hackbot_search').css('z-index', 2);
			$('#hackbot_search').animate({
				opacity: 1
			}, 200);
		},200);
	}else{
		if (bodyPos < 190) {
			$('.searchAnything').css('opacity', 1);
		}
		$('.hackbot>.nav-links.isMobile').css('opacity', 0);
		$('#hackbot_search').animate({
			opacity: 0
		}, 100);
		setTimeout(function(){
			$('#hackbot_search').css('visibility', 'hidden');
			$('#hackbot_search').css('z-index', 0);
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
			$('.page > *').css('opacity', 1);
			setTimeout(function(){
				scrollToValue(bodyPrevPos, 200);
			},200);

		}
		// $('.page.isMobile > *').css('opacity', 1);
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

function link_clicked(link){
	link = '#' + link;
	if ($('.page').hasClass('hackbot-open')) {
		bodyPrevPos = $(link).offset().top - 20;
		$('#navigator').trigger('click');
	}else{
		scrollToMinus(link, 200, 20);
	}
}

function modifiedLinks(){
	$('.modified-link.schedule').click(function(e){
		e.preventDefault();
		link_clicked('schedule');
	});

	$('.modified-link.faq').click(function(e){
		e.preventDefault();
		link_clicked('faq');
	});

	$('.modified-link.sponsors').click(function(e){
		e.preventDefault();
		link_clicked('sponsors');
	});
}

function onLoad(){
	/*
		FUNCTION NAME:	onLoad
		PARAMETERS:		none
		DESCRIPTION:	all of the functions that need to be run when the page is loaded, includes bindings
	*/
	
	resizeFunction();
	modifiedLinks();
	displayNavLinksMobile();
	window.onresize = resizeFunction;
	window.onscroll = scrollFunction;
	$('body').on('scroll', scrollFunction);
	
	$('#navigator').click(function(){
		navigatorClicked();
	});

	// setTimeout(function(){
	// 	$('html').animate({
	// 		opacity: 1
	// 	}, 200);
	// }, 400);
	
}

$(document).ready(function(){
	onLoad();
});