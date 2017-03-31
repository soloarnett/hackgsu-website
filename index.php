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
	<meta name="theme-color" content="#161616">
	<meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
	<table class="fixed_bar">
		<tbody>
			<tr>
				<td class="blue"></td>
				<td class="red"></td>
				
			</tr>
		</tbody>
	</table>
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
			<span class="ios">We are experiencing issues with iOS devices. This feature will be available soon.<br><br><a href="hackbot.php" target="_blank">Click here</a> to continue anyway.</span>
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
					<a class="modified-link devpost" target="_blank" href="https://hackgsu-spring-2017.devpost.com/?ref_content=default&ref_feature=challenge&ref_medium=discover">
						<!-- <label for="navigator"> -->
							<span class="link devpost">Devpost</span>
						<!-- </label> -->
					</a>
			</section>
		</section>
		<section class="page">
			<section class="welcome" id="welcome">
				<div class="z-index-top" id="mlh">
					<a id="mlh-trust-badge" style="display:block;max-width:100px;min-width:60px;position:absolute;right:25px;top:0;width:10%;z-index:10000" href="https://mlh.io/seasons/na-2017/events?utm_source=na-2017&utm_medium=TrustBadge&utm_campaign=na-2017&utm_content=white" target="_blank"><img src="https://s3.amazonaws.com/logged-assets/trust-badge/2017/white.svg" alt="Major League Hacking 2017 Hackathon Season" style="width:100%"></a>
				</div>
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
				<!-- <a class="register" href="http://my.mlh.io/oauth/authorize?client_id=83b1262b912a0d252d2d5f44c9506e8beaba4a67035ebe8d498f8dacc685d284&redirect_uri=http%3A%2F%2Fwww.hackgsu.com%2Fskills.php&response_type=token">Register</a> -->
			</section>
			<section class="schedule" id="schedule">
				
			</section>
			<section class="faq" id="faq">
				
			</section>
			<section class="sponsors" id="sponsors">
				<span class="sponsors-title">Our Sponsors</span>
				<div class="sponsors-img"></div>
			</section>
			<section class="explore" id="explore">
				<span class="explore-title">Explore</span>
				<?php include_once("assets/php/spring2017/explore-include.php") ?>
			</section>
		</section>
	</form>

	<script type="text/javascript" src="assets/js/spring2017/home.js"></script>
	<script type="text/javascript" src="assets/js/spring2017/main.js"></script>
</body>
</html>