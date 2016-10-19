<div class="announcement-close" id="announcement-close">_</div>
<h2 class="skinny-font announcement-header">Announcements</h2>
<div class="announcement-minimizer"></div>
<?php 
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once( $root . '/site1/vendor/autoload.php');
	require_once($root . '/site1/firebase.php');

	$path = 'announcements';
	$time = round(microtime(true)) . "000";
	

	function timePassed ($announcementTime){
		$time = round(microtime(true)) . "000";
		$minutesAgo = (($time - $announcementTime) /1000) / 60; // 60000000;
		return  round($minutesAgo);
		// $remaining = $date - time() + 21600;
		// $days_remaining = floor($remaining / 86400);
		// $hours_remaining = floor(($remaining % 86400) / 3600);
		// $minutes_remaining = floor((($remaining % 86400) % 3600) / 60);
		// $seconds_remaining = floor(((($remaining % 86400) % 3600) % 60) % 60);
	}


	$value = $firebase->get($path, array('orderBy' => '"timestamp"&endAt="$time"&limitToLast=5'));
	$value = 'null';
	if ($value != 'null') {
		$value = str_replace("{", "", $value);
	$value = str_replace("}", "", $value);
	$value = str_replace(":", "", $value);
	$value = str_replace(",", "", $value);

	$allValues = explode('"', $value);
	

	$tempValues = null;

	for ($i=0, $j=0; $i < sizeof($allValues) ; $i++,$j++) { 
		if (empty($allValues[$i])){
			if ($allValues[$i] == "0") {
				$tempValues[$j] = $allValues[$i];
			}else{
				$j-=1;
			}
		}else{

			$tempValues[$j] = $allValues[$i];
		}
	}
	$allValues = $tempValues;
	$tempValues = null;

	for ($i=0, $j=0; $i < sizeof($allValues) ; $i++,$j++) { 

		if (! ($allValues[$i] == "bodyText" || $allValues[$i] == "likes" || $allValues[$i] == "timestamp" || $allValues[$i] == "title" || $allValues[$i] == "topic")){
			$tempValues[$j] = $allValues[$i];
		} else{
			$j-=1;
		}
	}

	$allValues = $tempValues;
		$tempValues = null;

		for ($i=0, $j=0, $k=0; $i < sizeof($allValues) ; $i++, $k++) { 
			if ($k == 6) {
				$k = 0;
				$j +=1;
				$tempValues[$j][$k] = $allValues[$i];
			}else{
				$tempValues[$j][$k] = $allValues[$i];
			}
			
		}

		$allValues = $tempValues;
		$tempValues = null;
		$announcement = null;
		for ($i=0; $i < sizeof($allValues) ; $i++) { 
			$announcement[$i]['uniqueId'] = $allValues[$i][0]; 
			$announcement[$i]['body'] = $allValues[$i][1]; 
			// $announcement[$i]['userId'] = $allValues[$i][2]; 
			$announcement[$i]['likes'] = $allValues[$i][2]; 
			$announcement[$i]['timestamp'] = $allValues[$i][3];
			$announcement[$i]['title'] = $allValues[$i][4]; 
			$announcement[$i]['topic'] = $allValues[$i][5]; 
		}

		function sortByOrder($a, $b) {
		    return $b['timestamp'] - $a['timestamp'];
		}

		usort($announcement, 'sortByOrder');
	
	// foreach ($announcement as $index) {

	// 	echo $index['title'] . "<br>";

	// 	echo $index['body'] . "<br><br>";
	// }

?>
		<!-- <script type="text/javascript">
			
		</script> -->
		<?php 
			$idCounter = sizeof($announcement) - 1;
			// include('assets/php/fall2016/announcementOrder.php'); 
			foreach ($announcement as $index) {
		?>
		<div <?php echo "class=\"announcement-content " . strtolower($index['topic']) . "-side-color\" id=\"announcement-content-$idCounter\""; ?> >
			<span class="announcement-topic"><?php echo ucwords(strtolower($index['topic'])); ?></span>
			<span class="announcement-time"><?php 
			if(timePassed($index['timestamp']) == "-0" || timePassed($index['timestamp']) == 0 ){
				echo "Just now";
			}elseif (timePassed($index['timestamp'])> 59) {
				$hours = round(timePassed($index['timestamp']) / 60);
				if ($hours > 0) {
					echo $hours;
					if ($hours == 1) {
						echo " hour ago";
					}else{
						echo " hours ago";
					}
				}
			}elseif (timePassed($index['timestamp']) > 0 ){
				echo timePassed($index['timestamp']);
				if(timePassed($index['timestamp']) == 1){
					echo " minute ago";
				}else{
					echo " minutes ago";
				}
			}
			?></span>
			<h4 class="announcement-title"><?php echo $index['title']; ?></h4>
			<script type="text/javascript">
				var aTitle=<?php echo '"' . $index['title'] . '"'; ?>;
				var aTitle_esc=escape(aTitle);
				// document.write(str_esc + "<br>")
				aTitle = unescape(aTitle_esc);
				<?php echo "$('#announcement-content-$idCounter .announcement-title').html(aTitle)"; ?>
			</script>
			<p class="announcement-body"><?php echo $index['body']; ?></p>
			<script type="text/javascript">
				var aBody=<?php echo '"' . $index['body'] . '"'; ?>;
				var aBody_esc=escape(aBody);
				// document.write(str_esc + "<br>")
				aBody = unescape(aBody_esc);
				<?php echo "$('#announcement-content-$idCounter .announcement-body').html(aBody)"; ?>
			</script>

		</div>

		<script type="text/javascript">
			var <?php echo "announcementTimestamp$idCounter"; ?> = <?php echo $index['timestamp']; ?> ;
		</script>

		<?php
				$idCounter -= 1;
		 	} 
	}else{
		echo "
			<p style=\"width:100%;text-align:center;\">Nothing to see yet...</p>
			<script type=\"text/javascript\">announcementsEmpty = true;</script>
		";

	}
?>
	