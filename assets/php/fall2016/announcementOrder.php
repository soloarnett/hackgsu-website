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
<div class="announcement-close" id="announcement-close">_</div>
<h2 class="skinny-font announcement-header">Announcements</h2>
		<!-- <script type="text/javascript">
			
		</script> -->
		<?php 
			// include('assets/php/fall2016/announcementOrder.php'); 
			foreach ($announcement as $index) {
		?>
		<div <?php echo "class=\"announcement-content " . strtolower($index['topic']) . "-side-color\""; ?>>
			<span class="announcement-topic"><?php echo ucwords(strtolower($index['topic'])); ?></span>
			<span class="announcement-time"><?php echo timePassed($index['timestamp']); if(timePassed($index['timestamp']) == 1){echo " minute";}else{echo " minutes";} echo " ago"; ?></span>
			<h4 class="announcement-title"><?php echo $index['title']; ?></h4>
			<p class="announcement-body"><?php echo $index['body']; ?></p>

		</div>


		<?php } ?>