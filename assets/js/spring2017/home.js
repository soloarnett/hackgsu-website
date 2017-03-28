var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var bodyPos = $('body').scrollTop();

var bodyPrevPos = 0;
var navigatorClickCounter = false;

var schedulePos = $('#schedule').offset().top;
var faqPos = $('#faq').offset().top;
var sponsorsPos = $('#sponsors').offset().top;
var explorePos = $('#explore').offset().top;

var fixed_bar_count = 0;
var exploreCount = 0;

function resizeFunction(){
	/*
		FUNCTION NAME:	resizeFunction
		PARAMETERS:		none
		DESCRIPTION:	runs a set of operations when the browser window is resized
	*/
	
	windowHeight = window.innerHeight;
	windowWidth = window.innerWidth;
	schedulePos = $('#schedule').offset().top;
	faqPos = $('#faq').offset().top;
	sponsorsPos = $('#sponsors').offset().top;
	explorePos = $('#explore').offset().top;
	
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

	if ($('#faq').hasClass('isMobile')) {
		// if ($('#faq >*').hasClass('isMobile') == false) {
			$.ajax({url: "assets/php/spring2017/faq-include-mobile.php", success: function(result){
			    $("#faq").html(result);
			}});
			setTimeout(function(){
				faqClicked();
			}, 1000);
		// }	
	}else{
		// if ($('#faq >*').hasClass('isMobile')) {
			$.ajax({url: "assets/php/spring2017/faq-include2.php", success: function(result){
			    $("#faq").html(result);
			}});
			setTimeout(function(){
				faqClicked();
			}, 1000);
		// }
	}
	
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
		// setTimeout(function(){
			$('.searchAnything').css('visibility', 'hidden');
		// }, 200);
	}else{
		if ($('.page').hasClass('hackbot-open')==false) {
			$('.searchAnything').css('visibility', 'visible');
			$('.searchAnything').css('opacity', 1);
		}
	}

	if ((exploreCount == 0) && (bodyPos > explorePos)) {
		setTimeout(function(){
			$('.page >#explore >.frame0').html(frame0String);
			$('.page >#explore >.frame1').html(frame1String);
			$('.page >#explore >.frame2').html(frame2String);
		}, 400);
		
		exploreCount += 1;
		// console.log('success');
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
			$('.searchAnything').css('visibility', 'hidden');
			$('.hackbot>.nav-links.isMobile').css('opacity', 1);
			$('#hackbot_search').css('visibility', 'visible');
			$('#hackbot_search').css('z-index', 2);
			$('#hackbot_search').animate({
				opacity: 1
			}, 200);
		},200);
	}else{
		if (bodyPos < 190) {
			$('.searchAnything').css('visibility', 'visible');
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
			$('.fixed_bar').animate({
				opacity: 1
			}, 200);
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
		$('.fixed_bar').animate({
				opacity: 0
			}, 200);

		$('.page.isMobile > *').css('opacity', 0);
		navigatorClickCounter = true;

		// log the body location
		// bodyPrevPos = $('body').scrollTop();
	}
	
	
}

function link_clicked(link){
	link = '#' + link;
	// console.log(link);
	if ($('.page').hasClass('hackbot-open')) {
		bodyPrevPos = $(link).offset().top - 20;
		// console.log(bodyPrevPos);
		// console.log(navigatorClickCounter);
		$('#navigator').trigger('click');
	}else{
		scrollToMinus(link, 200, 20);
	}
}

function modified_link_clicked(link, open){
	link = '#' + link;
	if ($('.page').hasClass('hackbot-open')) {
		if ($('.page').hasClass('isMobile')) {
			bodyPrevPos = open;
			$('#navigator').trigger('click');
			setTimeout(function(){
				scrollToMinus(link, 200, 20);
			}, 200);
		}else{
			bodyPrevPos = $(link).offset().top - 20;
			$('#navigator').trigger('click');
		}
	}else{
		scrollToMinus(link, 200, 20);
	}
}

function modifiedLinks(){
	$('.modified-link.schedule').click(function(e){
		e.preventDefault();
		// link_clicked('schedule');
		modified_link_clicked('schedule', schedulePos);
	});

	$('.modified-link.faq').click(function(e){
		e.preventDefault();
		// link_clicked('faq');
		modified_link_clicked('faq',faqPos);
	});

	$('.modified-link.sponsors').click(function(e){
		e.preventDefault();
		// link_clicked('sponsors');
		modified_link_clicked('sponsors', sponsorsPos);
	});

	// $('.link.schedule').click(function(){
	// 	link_clicked('schedule');
	// });
}

function faqClicked(){
	$('.faq-item').click(function(event){
		faqLoader($(this).attr('id'));
	});
}

function faqLoader(id){
	var str = "<iframe id=\"iframe_search\" src=\"hackbot.php?faq=" + id + "\"></iframe>";
	$('#hackbot_search').html(str);
	$('#navigator').trigger('click');
}

function timeOuts(){

	/////////////////////////////////////////// SCHEDULE REFRESH ///////////////////////////////////////////
	// every 5 min
	
	
	$.ajax({url: "assets/php/spring2017/schedule-include.php", success: function(result){
	    $("#schedule").html(result);
	}});
	setTimeout(function(){
		if ($("#schedule").hasClass('isMobile')) {
			$("#schedule>*").addClass("isMobile");
		}
	},200);
	
	setInterval(function(){
		$("#schedule").animate({
				opacity: 0
		}, 200);

		$("#schedule").css('min-height', $("#schedule").height() + "px");
		setTimeout(function(){
			$.ajax({url: "assets/php/spring2017/schedule-include.php", success: function(result){
		        $("#schedule").html(result);
		    }});
		    setTimeout(function(){
		    	if ($("#schedule").hasClass('isMobile')) {
					$("#schedule>*").addClass("isMobile");
				}

				resizeFunction();

				setTimeout(function(){
					$("#schedule").animate({
						opacity: 1
					}, 200);
				},400);
		    },200);
		},200);
	}, 300000);

	/////////////////////////////////////////// END SCHEDULE REFRESH ///////////////////////////////////////////

	/////////////////////////////////////////// explore timeout ///////////////////////////////////////////
	
	setTimeout(function(){
		explorePos = $('#explore').offset().top - 300;
	}, 1000);
		

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
	timeOuts();
	
}

$(document).ready(function(){
	onLoad();
});