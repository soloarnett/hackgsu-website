var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var bodyPos = $('body').scrollTop();
var schedulePos = $('#schedule').offset().top;
var eatSleepPos = $('#eat-sleep').offset().top;
var faqPos = $('#bottom').offset().top;
var slideshowPos = $('#slideshow-container').offset().top;
var sponsorsPos = $('#sponsors').offset().top;
var explorePos = $('#explore').offset().top;


function navColorSelctor(){
	bodyPos = $('body').scrollTop();
	schedulePos = $('#schedule').offset().top;
	eatSleepPos = $('#eat-sleep').offset().top;
	faqPos = $('#bottom').offset().top;
	slideshowPos = $('#slideshow-container').offset().top;
	sponsorsPos = $('#sponsors').offset().top;
	explorePos = $('#explore').offset().top;

	if (windowWidth > 756) {
		if (bodyPos > schedulePos-2){
			if (bodyPos > eatSleepPos -2) {
				if (bodyPos > faqPos-2) {
					if (bodyPos > slideshowPos-2) {
						if (bodyPos > sponsorsPos-2) {
							if (bodyPos > explorePos -2) {
								return "rgba(0,0,0,1)";
							}else{
								return "rgba(0,33,38,1)"
							}
						}else{
							return "rgba(0,0,0,1)";
						}
					}else{
						return "rgba(31,4,41,1)";
					}
				}else{
					return "rgba(0,0,0,0)";
				}
			}else{
				return "rgba(28,30,51,1)";
			}
		}else{
			return "rgba(0,0,0,0)";
		}
	}else{
		return "rgba(0,0,0,1)"
	}
}

function bottomNavColorSelector(){
	if (windowWidth > 756) {
		if (bodyPos > schedulePos - windowHeight + 220){
			if (bodyPos > eatSleepPos - windowHeight + 220) {
				if (bodyPos > faqPos - windowHeight + 220) {
					if (bodyPos > slideshowPos - windowHeight + 220) {
						if (bodyPos > sponsorsPos - windowHeight + 220) {
							if (bodyPos > explorePos -windowHeight + 220) {
								return "rgba(0,0,0,1)";
							}else{
								return "rgba(0,33,38,1)"
							}
						}else{
							return "rgba(0,0,0,1)";
						}
					}else{
						return "rgba(31,4,41,1)";
					}
				}else{
					return "rgba(0,0,0,0)";
				}
			}else{
				return "rgba(28,30,51,1)";
			}
		}else{
			return "rgba(0,0,0,0)";
		}
	}else{
		return "rgba(0,0,0,1)"
	}
}

function resizeCatcher(){
	windowWidth = window.innerWidth;
	$(".desktop-top-links-positioning").css("background-color",navColorSelctor);
	if (bottomNavColorSelector() == "rgba(0,0,0,1)" || bottomNavColorSelector() == "rgba(0,0,0,0)") {
		// console.log('yup');
		$(".rsvp-button").css("background-color","rgba(215,249,251,1)");
		$(".rsvp-button").css("color","rgba(0,0,0,0.7)");
		$(".rsvp-button").css("border-color","rgba(215,249,251,1)");
	}else{
		// console.log('nope');
		$(".rsvp-button").css("background-color",bottomNavColorSelector);
		$(".rsvp-button").css("color","rgba(255,255,255,1)");
		$(".rsvp-button").css("border-color",bottomNavColorSelector);
	}
}

function scrollCatcher(){
	$(".desktop-top-links-positioning").css("background-color",navColorSelctor);
	if (bottomNavColorSelector() == "rgba(0,0,0,1)" || bottomNavColorSelector() == "rgba(0,0,0,0)") {
		// console.log(bottomNavColorSelector());
		$(".rsvp-button").css("background-color","rgba(215,249,251,1)");
		$(".rsvp-button").css("color","rgba(0,0,0,0.7)");
		$(".rsvp-button").css("border-color","rgba(215,249,251,1)");
	}else{
		// console.log('nope');
		$(".rsvp-button").css("background-color",bottomNavColorSelector);
		$(".rsvp-button").css("color","rgba(255,255,255,1)");
		$(".rsvp-button").css("border-color",bottomNavColorSelector);
	}
}

var index = 0;
var desktopShow = "url(\"images/slideshow/desktop/";
var images = [ (desktopShow + "hackathon.jpg\")"), (desktopShow + "silly-students.jpg\")")]
carousel();

function carousel() {
    $('#desktop-slideshow-image').css('background-image', images[index]);
    // console.log("running");
    // console.log(images[index]);
    index++;
    if (index >= images.length) {index = 0}
    setTimeout(carousel, 3000); // Change image every 2 seconds
}


$(document).ready(function(){

	

	if (windowWidth < 756) {
		$(".desktop-top-links-positioning").css("background-color","rgba(0,0,0,1)");
	}else{
		$(".desktop-top-links-positioning").css("background-color","rgba(0,0,0,0)");
	}


	window.onresize = resizeCatcher;
	window.onscroll = scrollCatcher;


	$("#faq-link").click(function() {
		// console.log("faq clicked");
		$('body').css("overflow", "hidden");
	    $('body').animate({
	        scrollTop: $("#faq-title").offset().top
	    }, 500);
	    $('body').css("overflow", "auto");
	});

	$("#schedule-link").click(function() {
		// console.log("faq clicked");
		$('body').css("overflow", "hidden");
	    $('body').animate({
	        scrollTop: $("#schedule").offset().top
	    }, 500);
	    $('body').css("overflow", "auto");
	});

	$("#explore-link").click(function() {
		// console.log("faq clicked");
		$('body').css("overflow", "hidden");
	    $('body').animate({
	        scrollTop: $("#explore-title").offset().top
	    }, 500);
	    $('body').css("overflow", "auto");
	});

	$("#sponsors-link").click(function() {
	    $('body').animate({
	        scrollTop: $("#sponsors").offset().top
	    }, 500);
	});

	$("#gallery-link").click(function() {
	    $('body').animate({
	        scrollTop: $("#slideshow").offset().top
	    }, 500);
	});

	$("#slideshow-left").click(function() {
		// console.log("click");
	    $('#slideshow-container').animate({
	        scrollLeft: $('#slideshow-right').offset().left
	    }, 1000);
	});
	$("#slideshow-right").click(function() {
		// console.log("click");
	    $('#slideshow-container').animate({
	        scrollLeft: $('#slideshow-left').offset().left
	    }, 1000);
	});

	$("#view-text-wrapper").css("display", "block");

	$("#glance-view").click(function(){
		$('#glance-view').css("color", "rgba(215,249,251,1)");
		$('#stream-view').css("color", "rgba(255,255,255,1)");
		$('#friday').addClass('transition');
		setTimeout(
		  function() 
		  {
			$('#schedule').removeClass('overflow-x-hidden');
			$('#schedule').addClass('overflow-x-auto');
			$('#schedule-wrapper').addClass('glance-wrapper');
			$('#saturday').css('opacity', '0');
			$('#sunday').css('opacity', '0');
			$('#friday').addClass('glance-day');
			$('#saturday').addClass('glance-day');
			$('#sunday').addClass('glance-day');
			
			setTimeout(
			  function() 
			  {
				$('#saturday').addClass('transition');
				$('#sunday').addClass('transition');
				$('#saturday').css('opacity', '1');
				$('#sunday').css('opacity', '1');
			  }, 400);
		  }, 300);
		
			
	
		
		
	});
	$("#stream-view").click(function(){

		$('#stream-view').css("color", "rgba(215,249,251,1)");
		$('#glance-view').css("color", "rgba(255,255,255,1)");
		$('#saturday').css('opacity', '0');
		$('#sunday').css('opacity', '0');
		setTimeout(
		  function() 
		  {
			$('#schedule-wrapper').removeClass('glance-wrapper');
			$('#friday').removeClass('glance-day');
			$('#saturday').removeClass('glance-day');
			$('#sunday').removeClass('glance-day');
			$('#saturday').css('opacity', '1');
			$('#sunday').css('opacity', '1');
			$('#schedule').removeClass('overflow-x-auto');
			$('#schedule').addClass('overflow-x-hidden');
			setTimeout(
			  function() 
			  {
			  	$('#friday').removeClass('transition');
				$('#saturday').removeClass('transition');
				$('#sunday').removeClass('transition');
			  }, 300);
		  }, 300);
		
	});

});
