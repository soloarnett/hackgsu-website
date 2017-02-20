<?php 

	session_start();

	
	include_once("assets/php/spring2017/strings.php");
	include_once("assets/php/spring2017/hackbot-display.php");


	$search_text = $_POST['search_text'];


	$placeholder = "";
	$result = "";

	if (isset($search_text) && empty($search_text) === false) {
		$placeholder = $search_text;

		$ev = new everything;

		$result = $ev -> selectFromTagsLimited($search_text);

		// echo "<script type=\"text/javascript\">console.log('result is " . $result[0]['type'] . "')</script>";

	}else{
		// $result = "";
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
	<form id="" action="" method="post">
		<div class="search_box">
			<input id="search_text" type="text" name="search_text" value=<?php echo "\"$placeholder\""; ?>>
			<input id="hackbot_submit" type="submit" name="submit" value="">
		</div>
	</form>
	<?php 
		if (empty($result) == false) {
	?>
			<div class="top_result">
				<div class="label">Top Result</div>
				<?php hackbot_display($result[0]); ?>
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
							hackbot_display($more);
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
			<div class="link">Request a Mentor</div>
			<div class="link">Next event?</div>
			<div class="link">When's food?</div>
			<div class="link">Travel Reimbursement</div>
			<div class="link">Am I registered?</div>
		</div>
	<?php

		if (empty($result) == false) {
			echo "<script type=\"text/javascript\">$('.quick_links').removeClass('bottom');</script>";
		}else{
			echo "<script type=\"text/javascript\">$('.quick_links:not(.bottom)').addClass('bottom');</script>";
		}
	?>
	
<script type="text/javascript" src="assets/js/spring2017/main.js"></script>
<script type="text/javascript" src="assets/js/spring2017/hackbot.js"></script>
</body>
</html>