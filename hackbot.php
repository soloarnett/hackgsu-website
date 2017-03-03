<?php 

	session_start();
	$more_clicked = 0;
	$more_link_id = null;
	if (isset($_GET['more_link']) && empty($_GET['more_link']) == false) {
		$more_clicked = 1;
		$more_link_id = $_GET['more_link'];
	}

	
	include_once("assets/php/spring2017/strings.php");
	include_once("assets/php/spring2017/hackbot-display.php");


	$search_text = $_GET['search_text'];


	$placeholder = "Search HackGSU";
	$result = "";

	if (isset($search_text) && empty($search_text) === false && $more_clicked != 1) {
		$placeholder = $search_text;

		$ev = new everything;

		$result = $ev -> selectFromTagsLimited($search_text);

		// echo "<script type=\"text/javascript\">console.log('result is " . $result[0]['type'] . "')</script>";

	}elseif ($more_clicked == 1 && isset($more_link_id) && empty($more_link_id) == false) {
		$placeholder = "Search for more";

		$ev = new everything;

		$result = $ev -> selectById($more_link_id);
	}{
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
							?>
							<form class="more_form" action="" method="get">
								<input id=<?php $str = "more_link"; $str .= $more['id']; echo "'". $str. "'"; ?> type="submit" name="more_link" value=<?php echo "'" . $more['id'] . "'"; ?>>
								<label for=<?php echo "'$str'"; ?>>
									<?php
									hackbot_display($more);
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