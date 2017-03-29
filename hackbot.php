<?php 

	session_start();
	$more_clicked = 0;
	$more_link_id = null;
	$faq_clicked = 0;
	$faq_link_id = null;
	$quick_link_clicked = 0;
	$const = 'everything';
	
	if (isset($_GET['more_link']) && empty($_GET['more_link']) == false) {
		$more_clicked = 1;
		$more_link_id = $_GET['more_link'];
	}

	if (isset($_GET['faq']) && empty($_GET['faq']) == false) {
		$faq_clicked = 1;
		$faq_link_id = $_GET['faq'];
	}

	if (isset($_GET['quick']) && empty($_GET['quick']) == false) {
		$quick_link_clicked = $_GET['quick'];
	}

	
	include_once("assets/php/spring2017/strings.php");
	include_once("assets/php/spring2017/hackbot-display.php");


	$search_text = $_GET['search_text'];


	$placeholder = "Search HackGSU";
	$result = "";

	if (isset($search_text) && empty($search_text) === false && $more_clicked != 1 && $faq_clicked != 1 && $quick_link_clicked < 1) {
		$placeholder = $search_text;

		$ev = new everything;

		$result = $ev -> selectFromTagsLimited($search_text);

		// echo "<script type=\"text/javascript\">console.log('result is " . $result[0]['type'] . "')</script>";

	}elseif ($more_clicked == 1 && isset($more_link_id) && empty($more_link_id) == false) {
		$placeholder = "Search for more";

		$ev = new everything;

		$result = $ev -> selectById($more_link_id);
	}elseif ($faq_clicked == 1 && isset($faq_link_id) && empty($faq_link_id) == false) {
		$placeholder = "Search for more";
		$faq = new faq;
		$result = $faq -> selectById($faq_link_id);
		$const = 'faq';
	}elseif ($quick_link_clicked > 0 && isset($quick_link_clicked) && empty($quick_link_clicked) == false) {
		switch ($quick_link_clicked) {
			case '1':
				$faq = new faq;
				$result = $faq -> selectById(16);
				$const = 'faq';
				break;
			
			case '2':
				$events = new events;
				$result = $events -> nextEvent();
				$const = 'event';
				// echo "<script type=\"text/javascript\">console.log('". $result[0]['title'] ."');</script>";
				break;

			case '3':
				$events = new events;
				$result = $events -> nextFood();
				$const = 'event';
				// echo "<script type=\"text/javascript\">console.log('". $result[0]['title'] ."');</script>";
				break;

			case '4':
				// $ev = new everything;
				// $result = $ev -> selectFromTagsLimited('travel reimbursement');
				// break;
				$faq = new faq;
				$result = $faq -> selectById(12);
				$const = 'faq';
				break;

			case '5':
				$faq = new faq;
				$result = $faq -> selectById(7);
				$const = 'faq';
				break;
			
			default:
				# code...
				break;
		}
	}


?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/spring2017/hackbot.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<title>hackbot</title>
</head>
<body>
	<form id="" action="" method="get">
		<div class="search_box">
			<input id="search_text" type="text" name="search_text" placeholder=<?php echo "\"$placeholder\""; ?>>
			<input id="hackbot_submit" type="submit" name="submit" value="">
		</div>
	</form>
	<?php 
		if (empty($result) == false) {
	?>
			<div class="top_result">
				<div class="label">Top Result</div>
				<?php 
					hackbot_display($result[0], $const); 
					// echo "<script type=\"text/javascript\">console.log('". $result[0]['id'] ."');</script>";
				?>

			</div>
			<div class="more_results">
				<div class="label">More Results</div>
				<?php $counter = 0; 

				if (sizeof($result) < 2) {
					echo "<div class=\"none\">No more results</div>";
					
				}else{
					foreach ($result as $key => $more) {
						if ($counter == 4) {
							break;
						}
						if ($counter == 0){
							$counter ++;
							continue;
						}else{
							?>
							<form class="more_form" action="" method="get">
								<input id=<?php $str = "more_link"; $str .= $more['id']; echo "'". $str. "'"; ?> type="submit" name="more_link" value=<?php echo "'" . $more['id'] . "'"; ?>>
								<label for=<?php echo "'$str'"; ?>>
									<?php
									hackbot_display($more, $const);
									?>
								</label>	
							</form>
							<?php
						}
						$counter ++;
					}
				}

				 ?>
			</div>
	<?php
	
		}else{
	?>
			<div class="welcome">Search Everything HackGSU!</div>
			
	<?php
		}
		?>
		<div class="quick_links">
			<div class="label">Quick Links</div>
			<form action="" method="get">
				<!-- <input id="quick_mentor" type="submit" name="quick" value="1">
				<label for="quick_mentor">
					<div class="link">Request a Mentor</div>
				</label> -->
				<input id="quick_parking" type="submit" name="quick" value="1">
				<label for="quick_parking">
					<div class="link">Parking</div>
				</label>
				<input id="quick_next" type="submit" name="quick" value="2">
				<label for="quick_next">
					<div class="link">Next Event</div>
				</label>
				<input id="quick_food" type="submit" name="quick" value="3">
				<label for="quick_food">
					<div class="link">When's food?</div>
				</label>
				<input id="quick_travel" type="submit" name="quick" value="4">
				<label for="quick_travel">
					<div class="link">Travel Reimbursement</div>
				</label>
				<input id="quick_registered" type="submit" name="quick" value="5">
				<label for="quick_registered">
					<div class="link">Am I registered?</div>
				</label>
				<input id="quick_devpost" type="submit" name="quick" value="5">
				<label class="devpostLabel" for="quick_devpost">
					<a class="link devpost" style="text-decoration: none" target="_blank" href="https://hackgsu-spring-2017.devpost.com/?ref_content=default&ref_feature=challenge&ref_medium=discover">
						<!-- <label for="navigator"> -->
							<span class="link devpost">Devpost</span>
						<!-- </label> -->
					</a>
				</label>
				
			</form>
		</div>
	<?php

		if (empty($result) == false) {
			echo "<script type=\"text/javascript\">$('.quick_links').removeClass('bottom');</script>";
		}else{
			echo "<script type=\"text/javascript\">$('.quick_links:not(.bottom)').addClass('bottom');</script>";
		}
		// if (isset($search_text) && empty($search_text) === false) {
			// echo "<script type=\"text/javascript\">$('.quick_links').removeClass('bottom');</script>";
		// }else{
			// echo "<script type=\"text/javascript\">$('.quick_links:not(.bottom)').addClass('bottom');</script>";
		// }
	?>
	
<script type="text/javascript" src="assets/js/spring2017/main.js"></script>
<script type="text/javascript" src="assets/js/spring2017/hackbot.js"></script>
</body>
</html>