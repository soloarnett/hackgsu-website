var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var bodyPos = $('body').scrollTop();
var schedulePos = $('#schedule').offset().top;
var eatSleepPos = $('#eat-sleep').offset().top;
var faqPos = $('#faq').offset().top;
var slideshowPos = $('#slideshow-container').offset().top;
var sponsorsPos = $('#sponsors').offset().top;
var explorePos = $('#explore').offset().top;
var viewTextWrapperPos = $('#view-text-wrapper').offset().top;
var itsTime = true; //////////// announcements
var anClose = 1;


// no scroll

var bodyPosNoScroll = $('body').scrollTop();
var schedulePosNoScroll = $('#schedule').offset().top;
var eatSleepPosNoScroll = $('#eat-sleep').offset().top;
var faqPosNoScroll = $('#faq').offset().top;
var slideshowPosNoScroll = $('#slideshow-container').offset().top;
var sponsorsPosNoScroll = $('#sponsors').offset().top;
var explorePosNoScroll = $('#explore').offset().top;


var marker1 = 0;
var marker2 = 0;
var marker3 = 0;
var marker4 = 0;

function navColorSelctor(){
	bodyPos = $('body').scrollTop();
	schedulePos = $('#schedule').offset().top;
	eatSleepPos = $('#eat-sleep').offset().top;
	faqPos = $('#faq').offset().top;
	slideshowPos = $('#slideshow-container').offset().top;
	sponsorsPos = $('#sponsors').offset().top;
	explorePos = $('#explore').offset().top;
	viewTextWrapperPos = $('#view-text-wrapper').offset().top;

	if (itsTime) {
		$('#info-block').css('display', 'none');
	}else{
		$('#info-block').css('display', 'block');
	}
	// console.log(schedulePos);
	// console.log(viewTextWrapperPos);
	// console.log(viewTextWrapperPos - $('.schedule-title-fixed').height() + 1);


	if (windowWidth > 756) {
		if (bodyPos > schedulePos-2){
			// if (itsTime) {
			// 	$('#announcement-block').addClass('announcement-block-active');
			// 	$('#announcement-block').addClass('announcement-block-tall');
			// 	anClose = 0;
			// 	preventScrollOf('.announcement-block-active', 'body');
			// 	preventEnterScroll('.announcement-content', 'body');
			// 	preventEnterScroll('.announcement-minimizer', 'body');
			// }else{
			// 	// $('#announcement-block').removeClass('announcement-block-active');
			// }
			if (bodyPos > eatSleepPos -2) {
				if (bodyPos > faqPos-2) {
					if (bodyPos > slideshowPos-2) {
						if (bodyPos > sponsorsPos-2) {
							if (bodyPos > explorePos -2) {
								$('.explore-title-fixed').css('display', 'block');
								$('#explore-title').css('opacity', '0');
								$('.schedule-title-fixed').css('display', 'none');
								$('#schedule-title').css('opacity', '1');
								$('#view-text-wrapper-fixed').css('display', 'none');
								$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
								$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
								$('#view-text-wrapper').css('opacity', 1);
								return "rgba(0,0,0,1)";
							}else{
								$('.explore-title-fixed').css('display', 'none');
								$('#explore-title').css('opacity', '1');
								$('.schedule-title-fixed').css('display', 'none');
								$('#schedule-title').css('opacity', '1');
								$('#view-text-wrapper-fixed').css('display', 'none');
								$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
								$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
								$('#view-text-wrapper').css('opacity', 1);
								return "rgba(0,33,38,1)"
							}
						}else{
							$('#directions-view').removeClass('directions-final');
							$('.explore-title-fixed').css('display', 'none');
							$('#explore-title').css('opacity', '1');
							$('.schedule-title-fixed').css('display', 'none');
							$('#schedule-title').css('opacity', '1');
							$('#view-text-wrapper-fixed').css('display', 'none');
							$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
							$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
							$('#view-text-wrapper').css('opacity', 1);
							return "rgba(0,0,0,1)";
						}
					}else{
						$('#directions-view').removeClass('directions-final');
						$('.explore-title-fixed').css('display', 'none');
						$('#explore-title').css('opacity', '1');
						$('.schedule-title-fixed').css('display', 'none');
						$('#schedule-title').css('opacity', '1');
						$('#view-text-wrapper-fixed').css('display', 'none');
						$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
						$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
						$('#view-text-wrapper').css('opacity', 1);
						return "rgba(31,4,41,1)";
					}
				}else{
					$('#directions-view').removeClass('directions-final');
					$('.explore-title-fixed').css('display', 'none');
					$('#explore-title').css('opacity', '1');
					$('.schedule-title-fixed').css('display', 'block');
					$('.schedule-title-fixed').css('position', 'absolute');
					$('.schedule-title-fixed').css('top', (eatSleepPos - $('.schedule-title-fixed').height()));
					$('#view-text-wrapper-fixed').css('display', 'block');
					$('#view-text-wrapper-fixed').css('top', (eatSleepPos - $('#view-text-wrapper-fixed').height()-9));
					$('#view-text-wrapper-fixed').addClass('view-text-wrapper-absolute');
					$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
					return "rgba(0,0,0,0)";
				}
			}else{ //bodyPos is in schedule

				// if(itsTime){
				// 	$('#announcement-block').addClass('announcement-block-active');
				// 	$('#announcement-block').addClass('announcement-block-tall');
				// 	anClose = 0;
				// 	preventScrollOf('.announcement-block-active', 'body');
				// 	preventEnterScroll('.announcement-content', 'body');
				// 	preventEnterScroll('.announcement-minimizer', 'body');
				// }
				$('#directions-view').removeClass('directions-final');
				$('.explore-title-fixed').css('display', 'none');
				$('#explore-title').css('opacity', '1');
				if ($('.schedule-title-fixed').height() >= (eatSleepPos - bodyPos)){
					$('.schedule-title-fixed').css('position', 'absolute');
					$('.schedule-title-fixed').css('top', (eatSleepPos - $('.schedule-title-fixed').height()));
					$('#view-text-wrapper-fixed').css('display', 'block');
					$('#view-text-wrapper-fixed').css('top', (eatSleepPos - $('#view-text-wrapper-fixed').height()-9));
					$('#view-text-wrapper-fixed').addClass('view-text-wrapper-absolute');
					$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
				}else{
					$('.schedule-title-fixed').css('display', 'block');
					$('.schedule-title-fixed').css('position', 'fixed');
					$('.schedule-title-fixed').css('top', '0');
					$('#schedule-title').css('opacity', '0');
					$('#view-text-wrapper-fixed').css('display', 'none');
					$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
					$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
					// console.log(schedulePos + $('.schedule-title-fixed').height() + 1);
					if (bodyPos > (viewTextWrapperPos - $('.schedule-title-fixed').height()+3)) {
						// if (marker1 < 1) {
						// 	marker1 += 1;
						// 	console.log("Fixed glance is activated");
						// }
						
						
						if ($('.schedule-title-fixed').height() >= (eatSleepPos - bodyPos - 27)) {
							$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
							$('#view-text-wrapper-fixed').css('display', 'block');
							$('#view-text-wrapper-fixed').css('top', (eatSleepPos - $('#view-text-wrapper-fixed').height()-9));
							$('#view-text-wrapper-fixed').addClass('view-text-wrapper-absolute');
							

							// if (marker2 < 1) {
							// 	marker2 += 1;
								// console.log("bodypos is absolute. close to eat sleep");
							// }
						}else{
							$('#view-text-wrapper-fixed').css('top', $('.schedule-title-fixed').height()-4);
							$('#view-text-wrapper-fixed').css('display', 'block');
							$('#view-text-wrapper-fixed').addClass('view-text-wrapper-fixed');
							$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
							$('#view-text-wrapper').css('opacity', '0');
						}
					}else{
						$('#view-text-wrapper-fixed').css('display', 'none');
						$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
						$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
						$('#view-text-wrapper').css('opacity', '1');

						// $('#view-text-wrapper-fixed').css('top', $('.schedule-title-fixed').height()-4);
					}
				}
				return "rgba(28,30,51,1)";
			}
		}else{
			// removeMouseEvent('.announcement-block-active');
			// removeMouseEnter('.announcement-content');
			// removeMouseEnter('.announcement-minimizer');
			// $('#announcement-block').css('height', '60px');
			// $('#announcement-block').addClass('announcement-block-active');
			// $('#announcement-block').removeClass('announcement-block-tall');
			$('#directions-view').removeClass('directions-final');
			$('.explore-title-fixed').css('display', 'none');
			$('#explore-title').css('opacity', '1');
			$('.schedule-title-fixed').css('display', 'none');
			$('#schedule-title').css('opacity', '1');
			$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
			$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
			$('#view-text-wrapper').css('opacity', 1);
			return "rgba(0,0,0,0)";
		}
	}else{
		// $('#announcement-block').css('display', 'none');
		$('#directions-view').removeClass('directions-final');
		$('#explore-title').css('opacity', '1');
		$('#schedule-title').css('opacity', '1');
		$('#view-text-wrapper-fixed').css('display', 'none');
		$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-fixed');
		$('#view-text-wrapper-fixed').removeClass('view-text-wrapper-absolute');
		$('#view-text-wrapper').css('opacity', 1);
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
	bodyPosNoScroll = $('body').scrollTop();
	schedulePosNoScroll = $('#schedule').offset().top;
	eatSleepPosNoScroll = $('#eat-sleep').offset().top;
	faqPosNoScroll = $('#faq').offset().top;
	slideshowPosNoScroll = $('#slideshow-container').offset().top;
	sponsorsPosNoScroll = $('#sponsors').offset().top;
	explorePosNoScroll = $('#explore').offset().top;

	windowWidth = window.innerWidth;

	setDirections();

	if (windowWidth < 756) {
		if (anClose == 1) {
			makeAnnouncementShortMobile();
		}else{
			makeAnnouncementTallMobile();
		}
	}else{
		// removeMouseEvent('.announcement-block-active');
		// removeMouseEnter('.announcement-content');
		// removeMouseEnter('.announcement-minimizer');
		preventScrollOf('.announcement-block-active', 'body');
		preventEnterScroll('.announcement-content', 'body');
		preventEnterScroll('.announcement-minimizer', 'body');
		console.log('reached');
		if (anClose == 1) {
			makeAnnouncementShort();
		}else{
			makeAnnouncementTall();
		}
	}

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
	// if (windowWidth > 756){
	// 	$('.explore-title-fixed').css('top', explorePos);
	// }
}

function scrollCatcher(){
	// console.log(explorePos);
	// console.log(bodyPos);
	$(".desktop-top-links-positioning").css("background-color",navColorSelctor);
	if (bottomNavColorSelector() == "rgba(0,0,0,1)" || bottomNavColorSelector() == "rgba(0,0,0,0)") {
		// console.log(bottomNavColorSelector());

		$("#info-block").css("background-color","rgba(255,255,255,0.7)")
		$(".rsvp-button").css("background-color","rgba(215,249,251,1)");
		$(".rsvp-button").css("color","rgba(0,0,0,0.7)");
		$(".rsvp-button").css("border-color","rgba(215,249,251,1)");
	}else{
		// console.log('nope');

		$("#info-block").css("background-color","rgba(255,255,255,1)");
		$(".rsvp-button").css("background-color",bottomNavColorSelector);
		$(".rsvp-button").css("color","rgba(255,255,255,1)");
		$(".rsvp-button").css("border-color",bottomNavColorSelector);
	}
}

function glanceClicked(){
	scrollMeUp('.announcement-block', 200);
	if (windowWidth < 756) {
		makeAnnouncementShortMobile();
	}else{
		makeAnnouncementShort();
	}
	anClose=1;
	$('#glance-view').css("color", "rgba(215,249,251,1)");
	$('#glance-view-fixed').css("color", "rgba(215,249,251,1)");
	$('#stream-view').css("color", "rgba(255,255,255,1)");
	$('#stream-view-fixed').css("color", "rgba(255,255,255,1)");
	$('#friday').addClass('transition');
	$('body').animate({
        scrollTop: $("#schedule").offset().top + 1
    }, 300);
    setTimeout(function(){
    	setTimeout(function(){
			$('#schedule').removeClass('overflow-x-hidden');
			$('#schedule').addClass('overflow-x-auto');
			$('#schedule-wrapper').addClass('glance-wrapper');
			$('#saturday').css('opacity', '0');
			$('#sunday').css('opacity', '0');
			$('#friday').addClass('glance-day');
			$('#saturday').addClass('glance-day');
			$('#sunday').addClass('glance-day');
			setTimeout(function(){
				$('#saturday').addClass('transition');
				$('#sunday').addClass('transition');
				$('#saturday').css('opacity', '1');
				$('#sunday').css('opacity', '1');
			}, 200);
		}, 200);
	}, 200);	
}

function streamClicked(){
	scrollMeUp('.announcement-block', 200);
	if (windowWidth < 756) {
		anClose = 1;
	}else{
		makeAnnouncementTall();
		anClose=0;
	}
	$('#stream-view').css("color", "rgba(215,249,251,1)");
	$('#stream-view-fixed').css("color", "rgba(215,249,251,1)");
	$('#glance-view').css("color", "rgba(255,255,255,1)");
	$('#glance-view-fixed').css("color", "rgba(255,255,255,1)");
	$('#saturday').css('opacity', '0');
	$('#sunday').css('opacity', '0');
	$('body').animate({
        scrollTop: $("#schedule").offset().top + 1
    }, 300);
    setTimeout(function(){
    	setTimeout(function(){
			$('#schedule-wrapper').removeClass('glance-wrapper');
			$('#friday').removeClass('glance-day');
			$('#saturday').removeClass('glance-day');
			$('#sunday').removeClass('glance-day');
			$('#saturday').css('opacity', '1');
			$('#sunday').css('opacity', '1');
			$('#schedule').removeClass('overflow-x-auto');
			$('#schedule').addClass('overflow-x-hidden');
			setTimeout(function(){
				$('#friday').removeClass('transition');
				$('#saturday').removeClass('transition');
				$('#sunday').removeClass('transition');
			}, 200);
		}, 200);
    }, 200);
}

function scrollTo(elem){
	if (elem == 0) {
		$('body').css("overflow", "hidden");
	    $('body').animate({
	        scrollTop: 0
	    }, 500);
	    $('body').css("overflow", "auto");
	    // window.location.replace("http://hackgsu.com");
	}else{

		// console.log(Math.round(bodyPos));
		// console.log(Math.round($(elem).offset().top + 1));

		if (Math.round(bodyPos) != Math.round(($(elem).offset().top + 1))) {
			$('body').css("overflow", "hidden");
		    $('body').animate({
		        scrollTop: $(elem).offset().top + 1
		    }, 500);
		    $('body').css("overflow", "auto");
		}
	    // window.location.replace("http://hackgsu.com/" + elem);
	}
}

var index = 0;
var desktopShow = "url(\"http://hackgsu.com/assets/img/fall2016/slideshow/desktop/";
var imagesRawUrl = 'http://hackgsu.com/assets/img/fall2016/slideshow/desktop/';
var imagesRaw = [(imagesRawUrl + "hackathon.jpg"), (imagesRawUrl + "silly-students.jpg"), (imagesRawUrl + "2students.jpg"), (imagesRawUrl + "batman.jpg"), (imagesRawUrl + "group.jpg"), (imagesRawUrl + "group2.jpg"), (imagesRawUrl + "hackbook.jpg"), (imagesRawUrl + "hacking.jpg"), (imagesRawUrl + "laughing-student.jpg"), (imagesRawUrl + "mlh-group.jpg"), (imagesRawUrl + "seminar.jpg")];
var images = [ (desktopShow + "hackathon.jpg\")"), (desktopShow + "silly-students.jpg\")"), (desktopShow + "2students.jpg\")"), (desktopShow + "batman.jpg\")"), (desktopShow + "group.jpg\")"), (desktopShow + "group2.jpg\")"), (desktopShow + "hackbook.jpg\")"), (desktopShow + "hacking.jpg\")"), (desktopShow + "laughing-student.jpg\")"), (desktopShow + "mlh-group.jpg\")"), (desktopShow + "seminar.jpg\")")];
carousel();

function carousel() {
    $('#desktop-slideshow-image').css('background-image', images[index]);
    // console.log("running");
    // console.log(images[index]);
    // console.log(images.length);
    index++;
    if (index >= images.length) {
    	index = 0;
    }else{
    	$('desktop-slideshow-image').load(imagesRaw[index+1]);
    }
    setTimeout(carousel, 5000); // Change image every 5 seconds
}

function setDirections(){
	if (windowWidth < 756) {
		$('#directions').html("<a class=\"link-no-decoration\" href=\"directions\">Directions</a>");
		$('#directions-view').removeClass('directions-final');
		$('body').css('overflow', 'auto');
	}else{
		$('#directions').html("Directions");
		$('#directions').addClass("unselectable");
		$('#directions').click(function(){
			$('#directions-view').addClass('directions-final');
			$('#directions-view').removeClass('transition');
			$('body').css('overflow', 'hidden');
		});
		$('#cancel-directions').click(function(){
			$('#directions-view').addClass('transition');
			$('#directions-view').removeClass('directions-final');
			$('body').css('overflow', 'auto');
		});
		$(document).keyup(function(e) {
		     if (e.keyCode == 27) {
		     	$('#directions-view').addClass('transition');
		     	$('#directions-view').removeClass('directions-final');
		     	$('body').css('overflow', 'auto');
		    }
		});
	}
}

function setHtmlHeight(){
	if (windowWidth > 756) {
		$('html').css('height', 'auto');
		$('body').css('height', $('html').height());
	}else{
		$('html').css('height', '100vh');
		$('body').css('height', '100vh');
	}
}

function preventEnterScroll(enter, target){
	$((enter + ':not(.enter)')).addClass('enter').bind('mouseenter',  function(){
		$(target).css('overflow', 'hidden');
	});
	// $(enter).bind("mouseenter", function(){
	// 	$(target).css('overflow', 'hidden');
	// });
}

function preventScrollOf(enter, target){
	$((enter + ':not(.enter)')).addClass('enter').bind('mouseenter',  function(){
		$(target).css('overflow', 'hidden');
		// console.log('prevented');
	});
	// $(enter).bind("mouseenter", function(){
	// 	$(target).css('overflow', 'hidden');
	// });
	$((enter + ':not(.leave)')).addClass('leave').bind('mouseleave',  function(){
		$(target).css('overflow', 'auto');
	});
	// $(enter).bind("mouseleave", function(){
	// 	$(target).css('overflow', 'auto');
	// });

}
function removeMouseEnter(enter){
	$(enter).removeClass('enter').unbind("mouseenter");
}

function removeMouseEvent(enter){
	$(enter).removeClass('enter').unbind("mouseenter");
	$(enter).removeClass('leave').unbind("mouseleave");
}

function undoBodyHidden(){
	$('body').css('overflow', 'auto');
}

function scrollMeUp(scrollMe, time){
	$(scrollMe).animate({
		scrollTop: 0
	}, time);
}

function announcementMinimzer(){
	if (anClose == 0) {
		
		if (windowWidth < 756) {
			makeAnnouncementShortMobile();
			removeMouseEvent('.announcement-block-active');
			removeMouseEnter('.announcement-content');
			removeMouseEnter('.announcement-minimizer');
			$('body').css('overflow', 'auto');
		}else{
			makeAnnouncementShort();
		}
		
		anClose = 1;
	}else{
		if (windowWidth < 756) {
			makeAnnouncementTallMobile();
			preventScrollOf('.announcement-block-active', 'body');
			preventEnterScroll('.announcement-content', 'body');
			preventEnterScroll('.announcement-minimizer', 'body');
			$('body').css('overflow', 'hidden');
		}else{
			makeAnnouncementTall();
		}
		anClose = 0;
	}		
}

var previousTimestamp = null;
var announcementsEmpty;
function announcementLoader(){
	$('#announcement-block').load("assets/php/fall2016/announcementOrder.php", function() {
		
		$('.announcement-minimizer:not(.minimize)').addClass('minimize').bind('click',  announcementMinimzer);
		$('.announcement-minimizer-2:not(.minimize)').addClass('minimize').bind('click',  announcementMinimzer);

		if (windowWidth > 756) {
			preventScrollOf('.announcement-block-active', 'body');
			preventEnterScroll('.announcement-content', 'body');
			preventEnterScroll('.announcement-minimizer', 'body');
		}

		// window.resize = resizeCatcher;
			
		// $('.announcement-minimizer').click(function(){
		// 	console.log("minimize");
		// 	announcementMinimzer();
		
		// });
		// $('.announcement-minimizer-2').click(function(){
		// 	console.log("minimize");
		// 	announcementMinimzer();
		
		// });



		// console.log("empty is " + announcementsEmpty);

		function newAnnouncementAlert(arraySize){
			if (arraySize > 0) {
				var index = arraySize - 1;
				var aContent = '#announcement-content-' + index;
				// console.log("array size is " + arraySize);
				// console.log("index is " + index);
				// console.log("aContent is " + aContent);
				// console.log("previousTimestamp is " + previousTimestamp);
				// console.log("announcementTimestamp is " + announcementTimestamp[index]);
				// console.log("empty is " + announcementsEmpty);

				try{
					if ((previousTimestamp != announcementTimestamp[index] && previousTimestamp != null ) || announcementsEmpty) {
						announcementsEmpty = false;
						// console.log("new");
						setTimeout(function(){
							$('.announcement-minimizer').css('background-color', 'rgba(255,22,0,0.2)');
								scrollMeUp('.announcement-block', 200);
							if (anClose == 1) {
								if (windowWidth < 756) {
									adjustAnnouncementHeightMobile(aContent);
								}
								else{
									adjustAnnouncementHeight(aContent);
								}
								
							}
							setTimeout(function(){
								$('.announcement-minimizer').css('background-color', 'rgba(0,0,0,0)');
								setTimeout(function(){
									$('.announcement-minimizer').css('background-color', 'rgba(255,22,0,0.2)');
									setTimeout(function(){
										$('.announcement-minimizer').css('background-color', 'rgba(0,0,0,0)');
										setTimeout(function(){
											$('.announcement-minimizer').css('background-color', 'rgba(255,22,0,0.2)');
											setTimeout(function(){
												$('.announcement-minimizer').css('background-color', 'rgba(0,0,0,0)');
												if (anClose == 1) {
													setTimeout(function(){
														if(windowWidth < 756){
															makeAnnouncementShortMobile();
														}else{
															makeAnnouncementShort();
														}
														
													}, 1000);
												}
											}, 200);
										}, 200);
									}, 200);
								}, 200);
							}, 200);
						}, 200);
					}else{
						// console.log("same");
					}
					previousTimestamp = announcementTimestamp[index];
				}catch(ReferenceError){
					newAnnouncementAlert(arraySize - 1);
				}
			}	
		}

		if (announcementsEmpty == false) {
			try{
				newAnnouncementAlert(announcementSize);
			}catch(ReferenceError){}
		}
	});

	// console.log("called " + call + " times");
	call +=1;
	setTimeout(announcementLoader, 15000);
}
var call = 0;

function makeAnnouncementTall(){
	$('#announcement-block').css('height', 'calc(100vh - 130px');
	$('#announcement-block').css('padding', '20px 0px');
}

function makeAnnouncementTallMobile(){
	$('#announcement-block').css('height', 'calc(100vh - 100px');
	$('#announcement-block').css('padding', '20px 0px');
}

function makeAnnouncementShort(){
	$('#announcement-block').css('height', '60px');
	$('#announcement-block').css('padding', '20px 0px');
}

function makeAnnouncementShortMobile(){
	$('#announcement-block').css('height', '0px');
	$('#announcement-block').css('padding', '0px');
}

function adjustAnnouncementHeight(changeTo){
	$('#announcement-block').css('height', (60 + $(changeTo).height() + 20) + "px");	
}

function adjustAnnouncementHeightMobile(changeTo){
	$('#announcement-block').css('padding', '20px 0px');
	$('#announcement-block').css('height', (60 + $(changeTo).height() + 20) + "px");	
}

///////////////////////////////////////////////////////////////// DOCUMENT READY /////////////////////////////////////////////////////////////////

$(document).ready(function(){
	

	announcementLoader();
	
	
	if (windowWidth < 756) {
		$(".desktop-top-links-positioning").css("background-color","rgba(0,0,0,1)");
	}else{
		$(".desktop-top-links-positioning").css("background-color","rgba(0,0,0,0)");
		
	}

	if (itsTime) {
		$('#info-block').css('display', 'none');
	}else{
		$('#info-block').css('display', 'block');
	}

	setDirections();

	// $('#view-text-wrapper').css('height', $('.schedule-view').css('line-height');

	window.onresize = resizeCatcher;
	window.onscroll = scrollCatcher;
	
		
	// });

	$("#faq-link").click(function() { scrollTo("#faq"); });

	$("#schedule-link").click(function() { scrollTo("#schedule"); });

	$("#explore-link").click(function() { scrollTo("#explore"); });

	$("#sponsors-link").click(function() { scrollTo("#sponsors"); });

	$("#gallery-link").click(function() { scrollTo("#slideshow"); });

	$("#slideshow-left").click(function() {
		// console.log("click");
	    $('#slideshow-container').animate({
	        scrollLeft: $('#slideshow-right').offset().left
	    }, 1000);
	});

	$("#slideshow-start-text-right").click(function() {
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

	$("#slideshow-start-text-left").click(function() {
		// console.log("click");
	    $('#slideshow-container').animate({
	        scrollLeft: $('#slideshow-left').offset().left
	    }, 1000);
	});


	$("#view-text-wrapper").css("display", "block");

	$("#glance-view").click(function(){ glanceClicked(); });
	$("#glance-view-fixed").click(function(){ glanceClicked(); });

	$("#stream-view").click(function(){ streamClicked(); });
	$("#stream-view-fixed").click(function(){ streamClicked(); });

});
