<!DOCTYPE html>
<html>
<head>
	<title>hackGSU / October 21-23 / Georgia State University</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
	<link rel="icon" href="images/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="description" content="">
    <meta name="author" content="">
</head>
<body class="overflow-auto">

	<div id="wrapper">
		<!-- welcome -->
		<div class="full-image height-full-screen position-relative float-left overflow-hidden">
			
			<div class="width-full-screen height-full background-blue position-absolute zindex-3 opacity-50" id="main-image-cover">
				<div class="position-absolute-middle" id="main-image-container">
					<div class="zindex-top no-margin no-cursor" id="main-logo"></div>
					<h1 class="font-white zindex-top no-margin title-font-size float-left no-cursor" id="title">hackGSU</h1>
				</div>
				
			</div>
			<div class="position-absolute position-absolute-top width-full-screen height-full-screen" id="back-image"></div>
				<!-- <img class="width-full invisible" src="images/top-image-sizer.png"> -->
				
			<!-- </div> -->
			<div class="width-full-screen height-full zindex-top position-absolute position-absolute-top">
				<div class="desktop-top-links-positioning mobile-top-links-positioning">
					<div class="mobile-top-links-container">
						<div class="position-relative float-left unselectable link nav-link width-third" id="register-link">
							<a href="http://my.mlh.io/oauth/authorize?client_id=83b1262b912a0d252d2d5f44c9506e8beaba4a67035ebe8d498f8dacc685d284&redirect_uri=http%3A%2F%2Fwww.hackgsu.com%2Fskills.php&response_type=token" class="click-nav-link"><span class="nav-link-text">Register</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link width-third" id="schedule-link">
							<a class="click-nav-link" href="#/schedule"><span class="nav-link-text">Schedule</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link  width-third" id="faq-link">
							<a class="click-nav-link" href="#/faq"><span class="nav-link-text">FAQ</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link width-third" id="sponsors-link">
							<a class="click-nav-link" href="#/sponsors"><span class="nav-link-text">Sponsors</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link width-third" id="gallery-link">
							<a class="click-nav-link" href="#/gallery"><span class="nav-link-text">Gallery</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link width-third" id="explore-link">
							<a class="click-nav-link" href="#/explore"><span class="nav-link-text">About</span></a>
						</div>
						<div class="position-relative float-left unselectable link nav-link width-third" id="slack-link">
							<a class="click-nav-link" href="http://hackgsu-fall16.devpost.com"><span class="nav-link-text">Devpost</span></a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- schedule -->
		<div class="width-full-screen height-auto position-relative float-left overflow-x-hidden" id="schedule">
			<div class="height-full ad-avoider position-relative float-left" id="schedule-container">
				<h1 class=" no-cursor title-font-size skinny-font sky-text bump-top-left title-placement mobile-center-h1 mobile-padding-vertical-bump" id="schedule-title">Schedule</h1>
				<div class="center-text" id="view-text-wrapper">
					<span class="position-relative float-left schedule-view" id="stream-view">Stream view</span>
					<span class="position-relative float-left schedule-view" id="glance-view">At a glance view</span>
				</div>
				
				<div class="schedule-wrapper" id="schedule-wrapper">
					<!-- Agenda -->
					<div class="day-sign position-relative clear-left" id="friday">
						<div class="day-box position-relative float-left width-full height-auto">
							<h2 class="bump-top-left  no-cursor sky-text">Friday 21<sup>st</sup></h2>
							<div class="agenda-tracker position-absolute sky-back"></div>
							<div class="agenda-object" id="agenda-object-selected">
								<span class="agenda-time " id="">5pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Early Check-In Begins/<br>Late Registration*</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">6pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Check-In</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">6:30pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Dinner</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">7pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Opening Ceremonies</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">8pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Hacking Begins<br>Idea Mixer/ Team Forming</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">8:30pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Development<br>Workshop A</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">9:30pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Development<br>Workshop B</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">10:30pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Development<br>Workshop C</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">12am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Friday Midnight<br>Madness</span>
							</div>
						</div>
					</div>
					<div class="day-sign position-relative" id="saturday">
						<div class="day-box position-relative float-left width-full height-auto">
							<h2 class="bump-top-left  no-cursor sky-text">Saturday 22<sup>nd</sup></h2>
							<div class="agenda-tracker position-absolute height-full sky-back"></div>
							<div class="agenda-object" id="agenda-object-selected">
								<span class="agenda-time " id="">8am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Breakfast</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">11am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Development<br>Workshop D</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">1pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Lunch</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">1:30pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">TBD</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">2pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Development<br>Workshop E</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">3pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">TBD</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">6pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Dinner</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">9pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Snack</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">12am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Saturday Midnight Madness<br>GE Digital Challenge</span>
							</div>
						</div>
					</div>
					<div class="day-sign position-relative" id="sunday">
						<div class="day-box position-relative float-left width-full height-auto">
							<h2 class="bump-top-left  no-cursor sky-text">Sunday 23<sup>rd</sup></h2>
							<div class="agenda-tracker short-tracker position-absolute sky-back"></div>
							<div class="agenda-object" id="agenda-object-selected">
								<span class="agenda-time " id="">8am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Breakfast</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">9am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Submit to Devpost<br>Hacking Ends</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">10am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Hack Expo</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">11:30am</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Finalist Demos</span>
							</div>
							<div class="agenda-object" id="">
								<span class="agenda-time " id="">12:15pm</span>
								<div class="agenda-trackball"></div>
								<span class="agenda-text">Closing/<br>Award Ceremonies</span>
							</div>
						</div>
					</div>

				</div>
			</div>
			<span class="ad ad-avoider skinny-font" id="registration-reminder">*Registration ends October 20, 2016 11:59pm. Late Registration requires individual pre-approval.</span>
		</div>


		<!-- blurred programmer -->
		<div class="height-full-screen width-full-screen position-relative float-left" id="eat-sleep">
			<div class="width-full height-full background-teal position-absolute zindex-3 opacity-50" id="main-image-cover">
				<div class="zindex-top no-margin position-absolute-middle  no-cursor center-text eat-sleep">
					<h1 class="font-white" id="">EAT</h1>
					<h1 class="font-white" id="">SLEEP</h1>
					<h1 class="font-white" id="hack-text">HACK</h1>
					<h1 class="font-white" id="">REPEAT</h1>
				</div>
				
			</div>
			<div class="mobile-cover-full-image position-relative float-left" id="blurgrammer"></div>
		</div>

		<!-- little faq -->
		<div class="height-auto width-full-screen berry-back position-relative float-left" id="bottom">
			<div class="height-full ad-avoider position-relative float-left">
				<h1 class=" no-cursor title-font-size skinny-font sky-text bump-top-left title-placement mobile-center-h1 mobile-padding-vertical-bump" id="faq-title">FAQ</h1>
				<div class="faq-container position-relative float-left height-full width-full">
					<div class="faq-item float-left clear-left">
			        	<h4>What is hackGSU?</h4>
			        	hackGSU is the Hackathon hosted by the GSU Computer Science Department's ACM & IEEE student organizations. <b> 100% free of charge, Lots of Food, $$ Prizes $$. </b> This semester, hackGSU will be a 500+ participant event taking place from October 21th-23th.			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>I have never been to a hackathon before, what should I do?</h4>
			        	No problem! We will be providing mentors during the hackathon and we will be running workshops during the hackathon.
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>When and where is hackGSU happening?</h4>
			        	hackGSU will take place on October 21st-23rd, at our beautiful downtown campus in Atlanta, GA. 
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>But I don't have an idea, what should I do?</h4>
			        	Not a problem! We will walk you through how to generate great ideas at the beginning of hackGSU.
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>How about teams?</h4>
			        	Once the idea generation is done, there will be an open mic and networking time to find a team. In addition, after you have registered, you also will be invited to the hackGSU Facebook group prior to the hackathon in order to discuss ideas and teams.
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>What should I bring?</h4>
			        	You will definitely need your laptop, phone, their chargers, as well as a valid student or government ID. Feel free to also bring along a sleeping bag, and we recommend some comfortable clothes (and a hoodie!).
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>How can I confirm that my registration was received for hackGSU?</h4>
			        	Login to your my.mlh.io account, and choose My Profile > Authorized Apps. Your hackGSU registration will display, including the date that you registered.
			    	</div>
				</div>
				
				<div class="faq-container position-relative float-left height-full width-full">
			    	<div class="faq-item float-left">
			        	<h4>Who can participate?</h4>
			        	All university students*! You do not have to be a computer science major to participate in the competition! If you're someone who is willing to learn and wants to take a shot at changing the world, no matter what your field is, you definitely belong here. 
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>How much does it cost?</h4>
			        	Nothing! Zero! The event is absolutely free for all participants. We will provide you with the venue, food, Wi-Fi, etc. You just need to show up.
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>When is the deadline to register?</h4>
			        	The deadline to register is on October 20th at 11:59pm EST.
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>I am not near to Atlanta, is there travel reimbursement?</h4>
			        	Travel reimbursement requests are closed. We will be providing up to $200 in individual travel reimbursement this year, while funds are available, for requests received before the cutoff. (If we were not notified in advance of your travel reimbursement request, unfortunately we cannot guarantee that we will be able to reimburse you).
			    	</div>			        	
			    	<div class="faq-item float-left">
			        	<h4>How do I obtain travel reimbursement?</h4>
			        	Travel reimbursement requests are closed. We will be providing up to $200 in individual travel reimbursement this year, while funds are available (see above), for requests received before the cutoff. To obtain the travel reimbursement, you must have receipts. <strong>You must not live or go to school in Georgia to be eligible for travel reimbursement.</strong> Funds will be dispersed on a first-come, first-served basis, based on the timestamp of your pre-event email request. Examples of eligible travel expenses include gas, airline tickets, etc. There will be plenty of free food at the HackGSU event, so we are not reimbursing food expenses. We are not reimbursing hotel expenses at this time (you are welcome to bring a sleeping bag).
			    	</div>
			    	<div class="faq-item float-left">
			        	<h4>Is there a Code of Conduct?</h4>
			        	Yes, we abide by the <a href="http://static.mlh.io/docs/mlh-code-of-conduct.pdf">Major League Hacking Code of Conduct.</a>
			    	</div>
			    </div>
			    <div class="faq-container position-relative faq-center float-left height-full width-full clear-both">
			    	<div class="faq-item center padding-top-20">
			        	<h4>*I'm in highschool and I would like to attend...</h4>
			        	We'd love to see you. Please email us at <a href="mailto:hackathon@cs.gsu.edu?subject=HackGSU-Fall2016-highschool">hackathon@cs.gsu.edu</a>, so that we can coordinate the parental permissions that you'll need! If you're local to Georgia, please register!If you're not from Georgia, please register, and make sure to drop us a note so that we can help reimburse travel expenses (while funds last).
			    	</div>
			    	<div class="faq-item center">
			        	<h4>I have another question...</h4>
			        	Please feel free to email us at <a href="mailto:hackathon@cs.gsu.edu?subject=HackGSU-Fall2016-question">hackathon@cs.gsu.edu</a> for any questions you have!<br>
			    	</div>
			    </div>
			</div>
		</div>

		<!-- slideshow image -->
		<div class="height-full-screen width-full-screen mobile-cover-full-image position-relative float-left overflow-auto" id="slideshow-container">
			<div class="desktop-slideshow-image" id="desktop-slideshow-image"></div>
			<div class="height-full-screen position-relative float-left" id="slideshow">
				<div class="arrow-image" id="arrow-image-left">
					<img class="slideshow-image-placement" id="slideshow-right" src="images/slideshow/arrows/right.png">
					<span class="slideshow-start-text" id="slideshow-start-text-left">swipe<br>left</span>
				</div>
				<div class="arrow-image" id="arrow-image-right">
					<img class="slideshow-image-placement" id="slideshow-left" src="images/slideshow/arrows/left.png">
					<span class="slideshow-start-text" id="slideshow-start-text-right">swipe<br>right</span>
				</div>
				<div class="mobile-cover-full-image position-relative float-left slideshow-image" id="petit-image">
				</div>
				<div class="mobile-cover-full-image mobile-cover-full-image-large position-relative float-left slideshow-image" id="ad-group1-image"></div>
				<div class="mobile-cover-full-image mobile-cover-full-image-large position-relative float-left slideshow-image" id="browsing-image"></div>
				<div class="mobile-cover-full-image position-relative float-left slideshow-image" id="standing-image"></div>
				<div class="mobile-cover-full-image mobile-cover-full-image-large position-relative float-left slideshow-image" id="two-programmers-image"></div>
				<div class="mobile-cover-full-image mobile-cover-full-image-large position-relative float-left slideshow-image" id="hacktop-image"></div>
				<div class="mobile-cover-full-image position-relative float-left slideshow-image" id="two-programmers2-image"></div>

			</div>
		</div>
		
		

		<!-- sponsors -->
		<div class="width-full-screen height-full-screen position-relative float-left mobile-cover-full-image teal-back" id="sponsors">
			<div class="height-full ad-avoider position-relative float-left">
				<h1 class=" no-cursor title-font-size skinny-font sky-text bump-top-left title-placement mobile-center-h1 mobile-padding-vertical-bump" id="sponsors-title">Sponsors</h1>
				<div class="position-relative float-left clear-both" id="sponsors-image">
					
				</div>
			</div>

		</div>

		<!-- mobile bottom image -->
		<div class="height-full-screen width-full-screen position-relative float-left overflow-hidden background-black" id="explore">
			<div class="height-auto position-relative float-left clear-both ad-avoider">
				<h1 class="no-cursor title-font-size skinny-font sky-text bump-top-left title-placement mobile-center-h1 mobile-padding-vertical-bump" id="explore-title">Explore</h1>
				<div class="left-vw">
					<h2 class="sky-text skinny-font">Apps</h2>
				</div>
			</div>
			<!-- <div class="width-full height-full background-rose position-absolute zindex-3 opacity-50" id="bottom-image-cover"></div>
			<div class="position-relative float-left mobile-cover-full-image" id="city-gif"></div>
			<div class="position-relative float-left mobile-cover-full-image" id="bottom-image"></div> -->

		</div>
		
		<div id="mobile-spacer"></div>

		<!-- info block -->
		<div class="z-index-top" id="mlh">
			<a id="mlh-trust-badge" style="display:block;max-width:100px;min-width:60px;position:absolute;right:50px;top:0;width:10%;z-index:10000" href="https://mlh.io/seasons/na-2017/events?utm_source=na-2017&utm_medium=TrustBadge&utm_campaign=na-2017&utm_content=white" target="_blank"><img src="https://s3.amazonaws.com/logged-assets/trust-badge/2017/white.svg" alt="Major League Hacking 2017 Hackathon Season" style="width:100%"></a>
		</div>
		<div class="zindex-top" id="info-block">
			<!-- <div class="width-full height-full blur-50 position-absolute position-absolute-top"></div> -->
			<h3 class="link">Georgia State University</h3>
			<h1 class="no-cursor ">10 . 21 . 16</h1>
			<a href="http://my.mlh.io/oauth/authorize?client_id=83b1262b912a0d252d2d5f44c9506e8beaba4a67035ebe8d498f8dacc685d284&redirect_uri=http%3A%2F%2Fwww.hackgsu.com%2Fskills.php&response_type=token" class="click-nav-link"><div class="open-sans position-inline-inner-middle rsvp-button" id="rsvp-button">REGISTER</div></a>
			
		</div>
	</div>
	<div class="explore-title-fixed" id="explore-title-fixed">
		<h1 class="sky-text skinny-font title-font-size bump-top-left title-placement">Explore</h1>
	</div>

	
	<!-- <script type="text/javascript">$(function(){var $w = $(window),$background = $('#background');if ((/Android|iPhone|iPad|iPod|BlackBerry/i).test(navigator.userAgent || navigator.vendor || window.opera)){$background.css({'top': 'auto', 'bottom': 0});$w.resize(sizeBackground);sizeBackground();}function sizeBackground(){$background.height(screen.height);}});
	</script> -->
	<script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>
