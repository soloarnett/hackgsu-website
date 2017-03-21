<?php
/*
**
**
** PHP Form Processing File
**
*/
	// require_once('vendor/autoload.php');
	// require_once('firebase.php');
	require_once('assets/php/spring2017/.db-connect.php');

// include('.dbconfig.inc');
// $dbname='hackgsu2';

$message = '
		<!DOCTYPE html>
		<html>
		<head>
			<title>hackGSU / March 31 - April 2 / Georgia State University</title>
			<link rel="stylesheet" type="text/css" href="assets/css/fall2016/main.css">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<meta name="description" content="">
			<meta name="author" content="">
		</head>
		<body  class="overflow-auto">

			<div id="wrapper">
				<!-- welcome -->
				<div class="full-image height-full-screen position-relative float-left overflow-hidden">

					<div class="width-full-screen height-full background-blue position-absolute zindex-3 opacity-50" id="main-image-cover">
						<div class="position-absolute-middle" id="main-image-container">
							<div class="zindex-top no-margin no-cursor" id="main-logo"></div>
							<h1 class="font-white zindex-top no-margin title-font-size float-left no-cursor" id="title">Thank you for registering!!</h1>
						</div>

					</div>
					<div class="position-absolute position-absolute-top width-full-screen height-full-screen" id="back-image"></div>
						<!-- <img class="width-full invisible" src="assets/img/fall2016/top-image-sizer.png"> -->

					<!-- </div> -->
					<div class="width-full-screen height-full zindex-top position-absolute position-absolute-top">
						<div class="desktop-top-links-positioning mobile-top-links-positioning">
							<div class="mobile-top-links-container">
								<div class="position-relative float-left unselectable link nav-link width-third" id="register-link">
									<a href="#" target="_blank" class="click-nav-link"><span class="nav-link-text">Register</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="schedule-link">
									<a class="click-nav-link" href="index.php#schedule"><span class="nav-link-text">Schedule</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link  width-third" id="faq-link">
									<a class="click-nav-link" href="index.php#faq"><span class="nav-link-text">FAQ</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third announcement-minimizer-2 announcements-link" id="announcements-link">
									<span class="nav-link-text" id="announcement-link-text">Announcements</span>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="sponsors-link">
									<a class="click-nav-link" href="index.php#sponsors"><span class="nav-link-text">Sponsors</span></a>
								</div>
								<!--
								<div class="position-relative float-left unselectable link nav-link width-third" id="gallery-link">
									<a class="click-nav-link" href="index.php#gallery"><span class="nav-link-text">Gallery</span></a>
								</div>
								-->
								<div class="position-relative float-left unselectable link nav-link width-third" id="explore-link">
									<a class="click-nav-link" href="index.php#explore"><span class="nav-link-text">Location</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="slack-link">
									<a class="click-nav-link" href="http://hackgsu-spring-2017.devpost.com/" target="_blank"><span class="nav-link-text">Devpost</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="mlh-link">
									<a class="click-nav-link" href="https://my.mlh.io/oauth/authorize?client_id=e41ccad3529e77a1d38422848b35073cbf15e993f83882f4a2e3c25cafd7fe81&redirect_uri=http%3A%2F%2Fwww.hackgsu.com%2Fskills.php&response_type=token" target="_blank"><span class="nav-link-text">Register Now!</span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="slack-link">
									<a class="click-nav-link" href="http://www.facebook.com/events/1266864976682219/" target="_blank"><span class="nav-link-text"><img src="/assets/img/facebook.png" alt="Facebook"></span></a>
								</div>
								<div class="position-relative float-left unselectable link nav-link width-third" id="slack-link">
									<a class="click-nav-link" href="http://twitter.com/HackGSU" target="_blank"><span class="nav-link-text"><img src="/assets/img/twitter.png" alt="Twitter"></span></a>
								</div>


							</div>
						</div>
					</div>

				</div>
'
;

//Form Passed Parameters
	if(isset($_REQUEST['email_address'])){$p_email_address=$_REQUEST['email_address'];}else{$p_email_address='';}
	if(isset($_REQUEST['exp_AndroidDevelopment'])){$p_exp_AndroidDevelopment=$_REQUEST['exp_AndroidDevelopment'];}else{$p_exp_AndroidDevelopment='';}
	if(isset($_REQUEST['exp_AngularJS'])){$p_exp_AngularJS=$_REQUEST['exp_AngularJS'];}else{$p_exp_AngularJS='';}
	if(isset($_REQUEST['exp_BackendDevelopment'])){$p_exp_BackendDevelopment=$_REQUEST['exp_BackendDevelopment'];}else{$p_exp_BackendDevelopment='';}
	if(isset($_REQUEST['exp_C_Cplusplus'])){$p_exp_C_Cplusplus=$_REQUEST['exp_C_Cplusplus'];}else{$p_exp_C_Cplusplus='';}
	if(isset($_REQUEST['exp_EmbeddedSystems'])){$p_exp_EmbeddedSystems=$_REQUEST['exp_EmbeddedSystems'];}else{$p_exp_EmbeddedSystems='';}
	if(isset($_REQUEST['exp_Go'])){$p_exp_Go=$_REQUEST['exp_Go'];}else{$p_exp_Go='';}
	if(isset($_REQUEST['exp_Hardware'])){$p_exp_Hardware=$_REQUEST['exp_Hardware'];}else{$p_exp_Hardware='';}
	if(isset($_REQUEST['exp_HTML_CSS'])){$p_exp_HTML_CSS=$_REQUEST['exp_HTML_CSS'];}else{$p_exp_HTML_CSS='';}
	if(isset($_REQUEST['exp_iOSDevelopment'])){$p_exp_iOSDevelopment=$_REQUEST['exp_iOSDevelopment'];}else{$p_exp_iOSDevelopment='';}
	if(isset($_REQUEST['exp_Java'])){$p_exp_Java=$_REQUEST['exp_Java'];}else{$p_exp_Java='';}
	if(isset($_REQUEST['exp_JSFrontend'])){$p_exp_JSFrontend=$_REQUEST['exp_JSFrontend'];}else{$p_exp_JSFrontend='';}
	if(isset($_REQUEST['exp_MobileApps'])){$p_exp_MobileApps=$_REQUEST['exp_MobileApps'];}else{$p_exp_MobileApps='';}
	if(isset($_REQUEST['exp_NodeJS'])){$p_exp_NodeJS=$_REQUEST['exp_NodeJS'];}else{$p_exp_NodeJS='';}
	if(isset($_REQUEST['exp_NoSQL'])){$p_exp_NoSQL=$_REQUEST['exp_NoSQL'];}else{$p_exp_NoSQL='';}
	if(isset($_REQUEST['exp_PHP'])){$p_exp_PHP=$_REQUEST['exp_PHP'];}else{$p_exp_PHP='';}
	if(isset($_REQUEST['exp_Python'])){$p_exp_Python=$_REQUEST['exp_Python'];}else{$p_exp_Python='';}
	if(isset($_REQUEST['exp_R'])){$p_exp_R=$_REQUEST['exp_R'];}else{$p_exp_R='';}
	if(isset($_REQUEST['exp_Ruby'])){$p_exp_Ruby=$_REQUEST['exp_Ruby'];}else{$p_exp_Ruby='';}
	if(isset($_REQUEST['exp_Ruby_RubyonRails'])){$p_exp_Ruby_RubyonRails=$_REQUEST['exp_Ruby_RubyonRails'];}else{$p_exp_Ruby_RubyonRails='';}
	if(isset($_REQUEST['exp_Scala'])){$p_exp_Scala=$_REQUEST['exp_Scala'];}else{$p_exp_Scala='';}
	if(isset($_REQUEST['exp_SQL'])){$p_exp_SQL=$_REQUEST['exp_SQL'];}else{$p_exp_SQL='';}
	if(isset($_REQUEST['exp_UX'])){$p_exp_UX=$_REQUEST['exp_UX'];}else{$p_exp_UX='';}
	if(isset($_REQUEST['time_AndroidDevelopment'])){$p_time_AndroidDevelopment=$_REQUEST['time_AndroidDevelopment'];}else{$p_time_AndroidDevelopment='';}
	if(isset($_REQUEST['time_AngularJS'])){$p_time_AngularJS=$_REQUEST['time_AngularJS'];}else{$p_time_AngularJS='';}
	if(isset($_REQUEST['time_BackendDevelopment'])){$p_time_BackendDevelopment=$_REQUEST['time_BackendDevelopment'];}else{$p_time_BackendDevelopment='';}
	if(isset($_REQUEST['time_C_Cplusplus'])){$p_time_C_Cplusplus=$_REQUEST['time_C_Cplusplus'];}else{$p_time_C_Cplusplus='';}
	if(isset($_REQUEST['time_EmbeddedSystems'])){$p_time_EmbeddedSystems=$_REQUEST['time_EmbeddedSystems'];}else{$p_time_EmbeddedSystems='';}
	if(isset($_REQUEST['time_Go'])){$p_time_Go=$_REQUEST['time_Go'];}else{$p_time_Go='';}
	if(isset($_REQUEST['time_Hardware'])){$p_time_Hardware=$_REQUEST['time_Hardware'];}else{$p_time_Hardware='';}
	if(isset($_REQUEST['time_HTML_CSS'])){$p_time_HTML_CSS=$_REQUEST['time_HTML_CSS'];}else{$p_time_HTML_CSS='';}
	if(isset($_REQUEST['time_iOSDevelopment'])){$p_time_iOSDevelopment=$_REQUEST['time_iOSDevelopment'];}else{$p_time_iOSDevelopment='';}
	if(isset($_REQUEST['time_Java'])){$p_time_Java=$_REQUEST['time_Java'];}else{$p_time_Java='';}
	if(isset($_REQUEST['time_JSFrontend'])){$p_time_JSFrontend=$_REQUEST['time_JSFrontend'];}else{$p_time_JSFrontend='';}
	if(isset($_REQUEST['time_MobileApps'])){$p_time_MobileApps=$_REQUEST['time_MobileApps'];}else{$p_time_MobileApps='';}
	if(isset($_REQUEST['time_NodeJS'])){$p_time_NodeJS=$_REQUEST['time_NodeJS'];}else{$p_time_NodeJS='';}
	if(isset($_REQUEST['time_NoSQL'])){$p_time_NoSQL=$_REQUEST['time_NoSQL'];}else{$p_time_NoSQL='';}
	if(isset($_REQUEST['time_PHP'])){$p_time_PHP=$_REQUEST['time_PHP'];}else{$p_time_PHP='';}
	if(isset($_REQUEST['time_Python'])){$p_time_Python=$_REQUEST['time_Python'];}else{$p_time_Python='';}
	if(isset($_REQUEST['time_R'])){$p_time_R=$_REQUEST['time_R'];}else{$p_time_R='';}
	if(isset($_REQUEST['time_Ruby'])){$p_time_Ruby=$_REQUEST['time_Ruby'];}else{$p_time_Ruby='';}
	if(isset($_REQUEST['time_Ruby_RubyonRails'])){$p_time_Ruby_RubyonRails=$_REQUEST['time_Ruby_RubyonRails'];}else{$p_time_Ruby_RubyonRails='';}
	if(isset($_REQUEST['time_Scala'])){$p_time_Scala=$_REQUEST['time_Scala'];}else{$p_time_Scala='';}
	if(isset($_REQUEST['time_SQL'])){$p_time_SQL=$_REQUEST['time_SQL'];}else{$p_time_SQL='';}
	if(isset($_REQUEST['time_UX'])){$p_time_UX=$_REQUEST['time_UX'];}else{$p_time_UX='';}
	if(isset($_REQUEST['yes_AndroidDevelopment'])){$p_yes_AndroidDevelopment=$_REQUEST['yes_AndroidDevelopment'];}else{$p_yes_AndroidDevelopment='';}
	if(isset($_REQUEST['yes_AngularJS'])){$p_yes_AngularJS=$_REQUEST['yes_AngularJS'];}else{$p_yes_AngularJS='';}
	if(isset($_REQUEST['yes_BackendDevelopment'])){$p_yes_BackendDevelopment=$_REQUEST['yes_BackendDevelopment'];}else{$p_yes_BackendDevelopment='';}
	if(isset($_REQUEST['yes_C_Cplusplus'])){$p_yes_C_Cplusplus=$_REQUEST['yes_C_Cplusplus'];}else{$p_yes_C_Cplusplus='';}
	if(isset($_REQUEST['yes_EmbeddedSystems'])){$p_yes_EmbeddedSystems=$_REQUEST['yes_EmbeddedSystems'];}else{$p_yes_EmbeddedSystems='';}
	if(isset($_REQUEST['yes_Go'])){$p_yes_Go=$_REQUEST['yes_Go'];}else{$p_yes_Go='';}
	if(isset($_REQUEST['yes_Hardware'])){$p_yes_Hardware=$_REQUEST['yes_Hardware'];}else{$p_yes_Hardware='';}
	if(isset($_REQUEST['yes_HTML_CSS'])){$p_yes_HTML_CSS=$_REQUEST['yes_HTML_CSS'];}else{$p_yes_HTML_CSS='';}
	if(isset($_REQUEST['yes_iOSDevelopment'])){$p_yes_iOSDevelopment=$_REQUEST['yes_iOSDevelopment'];}else{$p_yes_iOSDevelopment='';}
	if(isset($_REQUEST['yes_Java'])){$p_yes_Java=$_REQUEST['yes_Java'];}else{$p_yes_Java='';}
	if(isset($_REQUEST['yes_JSFrontend'])){$p_yes_JSFrontend=$_REQUEST['yes_JSFrontend'];}else{$p_yes_JSFrontend='';}
	if(isset($_REQUEST['yes_MobileApps'])){$p_yes_MobileApps=$_REQUEST['yes_MobileApps'];}else{$p_yes_MobileApps='';}
	if(isset($_REQUEST['yes_NodeJS'])){$p_yes_NodeJS=$_REQUEST['yes_NodeJS'];}else{$p_yes_NodeJS='';}
	if(isset($_REQUEST['yes_NoSQL'])){$p_yes_NoSQL=$_REQUEST['yes_NoSQL'];}else{$p_yes_NoSQL='';}
	if(isset($_REQUEST['yes_PHP'])){$p_yes_PHP=$_REQUEST['yes_PHP'];}else{$p_yes_PHP='';}
	if(isset($_REQUEST['yes_Python'])){$p_yes_Python=$_REQUEST['yes_Python'];}else{$p_yes_Python='';}
	if(isset($_REQUEST['yes_R'])){$p_yes_R=$_REQUEST['yes_R'];}else{$p_yes_R='';}
	if(isset($_REQUEST['yes_Ruby'])){$p_yes_Ruby=$_REQUEST['yes_Ruby'];}else{$p_yes_Ruby='';}
	if(isset($_REQUEST['yes_Ruby_RubyonRails'])){$p_yes_Ruby_RubyonRails=$_REQUEST['yes_Ruby_RubyonRails'];}else{$p_yes_Ruby_RubyonRails='';}
	if(isset($_REQUEST['yes_Scala'])){$p_yes_Scala=$_REQUEST['yes_Scala'];}else{$p_yes_Scala='';}
	if(isset($_REQUEST['yes_SQL'])){$p_yes_SQL=$_REQUEST['yes_SQL'];}else{$p_yes_SQL='';}
	if(isset($_REQUEST['yes_UX'])){$p_yes_UX=$_REQUEST['yes_UX'];}else{$p_yes_UX='';}
	//if(isset($_FILES['resume_file'])){$p_resume_file=$_FILE['resume_file'];}else{$p_resume_file='';}
	if(isset($_REQUEST['speech'])){$p_speech=$_REQUEST['speech'];}else{$p_speech='';}
	if(isset($_REQUEST['gpa'])){$p_gpa=$_REQUEST['gpa'];}else{$p_gpa='';}
	if(isset($_REQUEST['mlh_details'])){$p_mlh_details=$_REQUEST['mlh_details'];}else{$p_mlh_details='';}

	str_replace('_', ' ', $p_mlh_details);
	str_replace(CHR(39), '_', $p_mlh_details);
	str_replace(CHR(47), '_', $p_mlh_details);

//	echo("p_mlh_details:".$p_mlh_details."\n");

	$tmpName = $_FILES['resume_file']['tmp_name'];
		// Read the file
	if(strlen($tmpName)>0) {
		$fp = fopen($tmpName, 'r');
		$p_resume_file = fread($fp, filesize($tmpName));
		$p_resume_file = addslashes($p_resume_file);
		fclose($fp);
		$p_resume_file_name=$_FILES['resume_file']['name'];
		$p_resume_file_type=$_FILES['resume_file']['type'];
		$p_resume_file_size=$_FILES['resume_file']['size'];
		//echo '<br/>FILE LOAD error message:' . $_FILES['resume_file']['error'] . '<br/>';
		if(trim($p_resume_file_type) == 'text/plain' && $p_resume_file_size > 0)
		{
		//echo 'here i am!';
			$p_resume_file=chr(39).$p_resume_file.chr(39);
		}
		if (strpos($p_resume_file_type, 'xml') !== FALSE) {
		    $p_resume_file=chr(39).$p_resume_file.chr(39);
		}
		if (strpos($p_resume_file_type, 'image') !== FALSE) {
			$p_resume_file=chr(39).$p_resume_file.chr(39);
		    //$p_resume_file=file_get_contents($tmpName);
		    //$p_resume_file=mysql_real_escape_string($p_resume_file);
		}
		if (strpos($p_resume_file_type, 'pdf') !== FALSE) {
		    $p_resume_file=chr(39).$p_resume_file.chr(39);
		}

	}
	else{
		$p_resume_file="'no file body'";
		$p_resume_file_name='no file name';
		$p_resume_file_type='no file type';
		$p_resume_file_size='0';
	}


 //Add records to database
 //connect to database

 // mysqli_select_db($con,$dbname);
	$db = new Db;
 //insert data
         $query = " INSERT INTO
			  hackgsu2.hacker_skills(
				email_address
			   ,exp_androiddevelopment
			   ,exp_angularjs
			   ,exp_backenddevelopment
			   ,exp_c_cplusplus
			   ,exp_embeddedsystems
			   ,exp_go
			   ,exp_hardware
			   ,exp_html_css
			   ,exp_iosdevelopment
			   ,exp_java
			   ,exp_jsfrontend
			   ,exp_mobileapps
			   ,exp_nodejs
			   ,exp_nosql
			   ,exp_php
			   ,exp_python
			   ,exp_r
			   ,exp_ruby
			   ,exp_ruby_rubyonrails
			   ,exp_scala
			   ,exp_sql
			   ,exp_ux
			   ,time_androiddevelopment
			   ,time_angularjs
			   ,time_backenddevelopment
			   ,time_c_cplusplus
			   ,time_embeddedsystems
			   ,time_go
			   ,time_hardware
			   ,time_html_css
			   ,time_iosdevelopment
			   ,time_java
			   ,time_jsfrontend
			   ,time_mobileapps
			   ,time_nodejs
			   ,time_nosql
			   ,time_php
			   ,time_python
			   ,time_r
			   ,time_ruby
			   ,time_ruby_rubyonrails
			   ,time_scala
			   ,time_sql
			   ,time_ux
			   ,yes_androiddevelopment
			   ,yes_angularjs
			   ,yes_backenddevelopment
			   ,yes_c_cplusplus
			   ,yes_embeddedsystems
			   ,yes_go
			   ,yes_hardware
			   ,yes_html_css
			   ,yes_iosdevelopment
			   ,yes_java
			   ,yes_jsfrontend
			   ,yes_mobileapps
			   ,yes_nodejs
			   ,yes_nosql
			   ,yes_php
			   ,yes_python
			   ,yes_r
			   ,yes_ruby
			   ,yes_ruby_rubyonrails
			   ,yes_scala
			   ,yes_sql
			   ,yes_ux
			   ,resume_file
			   ,resume_file_name
			   ,resume_file_type
			   ,resume_file_size
			   ,speech
			   ,gpa
			   ,mlh_details
			   )
			VALUES
			  (   "
			    . "          '" . $p_email_address     . " '"
				. "       ,  '" . $p_exp_AndroidDevelopment     . " '"
				. "       ,  '" . $p_exp_AngularJS     . " '"
				. "       ,  '" . $p_exp_BackendDevelopment     . " '"
				. "       ,  '" . $p_exp_C_Cplusplus     . " '"
				. "       ,  '" . $p_exp_EmbeddedSystems     . " '"
				. "       ,  '" . $p_exp_Go     . " '"
				. "       ,  '" . $p_exp_Hardware     . " '"
				. "       ,  '" . $p_exp_HTML_CSS     . " '"
				. "       ,  '" . $p_exp_iOSDevelopment     . " '"
				. "       ,  '" . $p_exp_Java     . " '"
				. "       ,  '" . $p_exp_JSFrontend     . " '"
				. "       ,  '" . $p_exp_MobileApps     . " '"
				. "       ,  '" . $p_exp_NodeJS     . " '"
				. "       ,  '" . $p_exp_NoSQL     . " '"
				. "       ,  '" . $p_exp_PHP     . " '"
				. "       ,  '" . $p_exp_Python     . " '"
				. "       ,  '" . $p_exp_R     . " '"
				. "       ,  '" . $p_exp_Ruby     . " '"
				. "       ,  '" . $p_exp_Ruby_RubyonRails     . " '"
				. "       ,  '" . $p_exp_Scala     . " '"
				. "       ,  '" . $p_exp_SQL     . " '"
				. "       ,  '" . $p_exp_UX     . " '"
				. "       ,  '" . $p_time_AndroidDevelopment     . " '"
				. "       ,  '" . $p_time_AngularJS     . " '"
				. "       ,  '" . $p_time_BackendDevelopment     . " '"
				. "       ,  '" . $p_time_C_Cplusplus     . " '"
				. "       ,  '" . $p_time_EmbeddedSystems     . " '"
				. "       ,  '" . $p_time_Go     . " '"
				. "       ,  '" . $p_time_Hardware     . " '"
				. "       ,  '" . $p_time_HTML_CSS     . " '"
				. "       ,  '" . $p_time_iOSDevelopment     . " '"
				. "       ,  '" . $p_time_Java     . " '"
				. "       ,  '" . $p_time_JSFrontend     . " '"
				. "       ,  '" . $p_time_MobileApps     . " '"
				. "       ,  '" . $p_time_NodeJS     . " '"
				. "       ,  '" . $p_time_NoSQL     . " '"
				. "       ,  '" . $p_time_PHP     . " '"
				. "       ,  '" . $p_time_Python     . " '"
				. "       ,  '" . $p_time_R     . " '"
				. "       ,  '" . $p_time_Ruby     . " '"
				. "       ,  '" . $p_time_Ruby_RubyonRails     . " '"
				. "       ,  '" . $p_time_Scala     . " '"
				. "       ,  '" . $p_time_SQL     . " '"
				. "       ,  '" . $p_time_UX     . " '"
				. "       ,  '" . $p_yes_AndroidDevelopment     . " '"
				. "       ,  '" . $p_yes_AngularJS     . " '"
				. "       ,  '" . $p_yes_BackendDevelopment     . " '"
				. "       ,  '" . $p_yes_C_Cplusplus     . " '"
				. "       ,  '" . $p_yes_EmbeddedSystems     . " '"
				. "       ,  '" . $p_yes_Go     . " '"
				. "       ,  '" . $p_yes_Hardware     . " '"
				. "       ,  '" . $p_yes_HTML_CSS     . " '"
				. "       ,  '" . $p_yes_iOSDevelopment     . " '"
				. "       ,  '" . $p_yes_Java     . " '"
				. "       ,  '" . $p_yes_JSFrontend     . " '"
				. "       ,  '" . $p_yes_MobileApps     . " '"
				. "       ,  '" . $p_yes_NodeJS     . " '"
				. "       ,  '" . $p_yes_NoSQL     . " '"
				. "       ,  '" . $p_yes_PHP     . " '"
				. "       ,  '" . $p_yes_Python     . " '"
				. "       ,  '" . $p_yes_R     . " '"
				. "       ,  '" . $p_yes_Ruby     . " '"
				. "       ,  '" . $p_yes_Ruby_RubyonRails     . " '"
				. "       ,  '" . $p_yes_Scala     . " '"
				. "       ,  '" . $p_yes_SQL     . " '"
				. "       ,  '" . $p_yes_UX     . " '"
				. "       ,  "  . $p_resume_file  . " "
				. "       ,  '" . $p_resume_file_name	. " '"
				. "       ,  '" . $p_resume_file_type	. " '"
				. "       ,  '" . $p_resume_file_size	. " '"
				. "       ,  '" . $p_speech     . " '"
				. "       ,  '" . $p_gpa     . " '"
				. "       ,  " . CHR(34). " ". $p_mlh_details . CHR(34). " "
                . ")";
//                echo $query;

         // $result = mysqli_query($con, $query);
            $result = $db -> query($query);
         if ($result == false)
         {
             $error_message =
                 '<HTML><HEAD><TITLE>Error Message</TITLE></HEAD><BODY>'
             .   '   <h2>An error has occured.</h2>'
             .   '   <br />'
             .   '   <p>'
             .   '   We apologize for the inconvenience.  Please try again later.'
             .   '   <br />'
             .   '   <br />'
             .   '   </p>'
             .   '   <br />'
             .   '</BODY></HTML>'
             ;
             echo $error_message;

         }else{
			  $message = $message
			.   '
							<div style="background:#000000" id="sponsors">
							  <br/><br/><br/><br/>
							  <h1 id="sponsor" style="color:#1e9ad6">  Have a question not answered on our <a href="index.html#faq">FAQ?</a>  </h1>
							  <p>
								<font color="#CCCCCC" size="+1"><b> Please email us: <a href="mailto:hackathon@cs.gsu.edu?Subject=hackGSU2016-Skills%20Inquiry">hackathon@cs.gsu.edu</a> </b>

							  </p>
							  <p> <font size="-1">Hosted by the Georgia State University Computer Science Department ACM and IEEE student organizations</font></p>
							  </font>
							  <br/><br/><br/><br/>
							</div>
							<!-- end:  content and jump points -->
							<div class="mastfoot">
								<p style="color:#ccc"> &copy;2016-7 HackGSU. All Rights Reserved
								<a href="https://twitter.com/HackGSU"><img src="assets/img/twitter.png" alt="Follow us on Twitter!"></a>
								<a href="https://www.facebook.com/events/936572959745025/"><img src="assets/img/facebook.png" alt="Facebook Event"></a>
								</p>
							</div><!--mastfoot-->
						  </div><!--content-->
						</div> <!--iiner-->

					   </div> <!--masthead clearfix -->
					</div> <!--cover-container-->
				   </div> <!--site-wrapper-inner-->
				</div> <!--site-wrapper-->

				<!-- Bootstrap core JavaScript
				================================================== -->
				<!-- Placed at the end of the document so the pages load faster -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="assets/js/vendor/jquery.min.js"></script>
				<script src="assets/js/bootstrap.min.js"></script>
				<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
			  </body>
			</html>
';
			  echo $message;



         	// header("Location: http://hackgsu.com/");
         }
?>
