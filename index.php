<?php
	session_start();
	include_once("assets/php/spring2017/functions.php");
	include_once("assets/php/spring2017/strings.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php string_title(); ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/spring2017/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
	<link rel="icon" href="assets/img/spring2017/favicon.ico">
	<!-- <link rel="manifest" href="manifest/manifest.json"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<meta name="description" content="">
    <meta name="author" content="">
</head>
<body>

	<div id="hackbot_search">
		<iframe id="iframe_search" src="hackbot.php"></iframe>
	</div>
	
	

	<form class="full_form" action="">

	
		<input type="checkbox" name="navigation" id="navigator">
		<label for="navigator" id="navigator">
			<div class="navigator">
				<div class="darken"></div>
				<div class="element e1"></div>
				<div class="element e2"></div>
				<div class="element e3"></div>
				<div class="element e4"></div>
			</div>
			<div class="searchAnything">Search HackGSU</div>
		</label>
		<section class="hackbot">

		<!-- 	<div class="search_decoy">
				<div class="arrow_decoy"></div>
			</div> -->
	
			<section class="nav-links">
				<noscript>
					<a class="modified-link schedule" href="#schedule"><span class="link">Schedule</span></a>
					<a class="modified-link faq" href="#faq"><span class="link">FAQ</span></a>
					<a class="modified-link sponsors" href="#sponsors"><span class="link">Sponsors</span></a>
					<!-- <a class="modified-link devpost" href="#devpost"><span class="link">Devpost</span></a> -->
				</noscript>
					<a class="modified-link schedule" href="#schedule">
						<!-- <label for="navigator"> -->
							<span class="link schedule">Schedule</span>
						<!-- </label> -->
					</a>
					<a class="modified-link faq" href="#faq">
						<!-- <label for="navigator"> -->
							<span class="link faq">FAQ</span>
						<!-- </label> -->
					</a>
					<a class="modified-link sponsors" href="#sponsors">
						<!-- <label for="navigator"> -->
							<span class="link sponsors">Sponsors</span>
						<!-- </label> -->
					</a>
					<a class="modified-link devpost" target="_blank" href="#devpost">
						<!-- <label for="navigator"> -->
							<span class="link devpost">Devpost</span>
						<!-- </label> -->
					</a>
			</section>
		</section>
		<section class="page">
			<section class="welcome" id="welcome">
				<section class="container">
					<div class="logo"></div>
					<span class="title">
						<?php string_hackgsu(); ?>
					</span>
					<span class="date"><?php string_date(); ?></span>
					<section class="nav-links">
						<a class="modified-link schedule" href="#schedule"><span class="link">Schedule</span></a>
						<a class="modified-link faq" href="#faq"><span class="link">Frequent Questions</span></a>
						<a class="modified-link sponsors" href="#sponsors"><span class="link">Sponsors</span></a>
					</section>
				</section>
			</section>
			<section class="schedule" id="schedule">
				
			</section>
			<section class="faq" id="faq">
				<?php include_once("assets/php/spring2017/faq-include.php"); ?>
			</section>
			<section class="sponsors" id="sponsors">
				<span class="sponsors-title">Our Sponsors</span>
			</section>
			<section class="about" id="about">
				<span class="about-title">About Us</span>
			</section>
		</section>
	</form>

<script type="text/javascript" src="assets/js/spring2017/home.js"></script>
<script type="text/javascript" src="assets/js/spring2017/main.js"></script>
</body>
</html>