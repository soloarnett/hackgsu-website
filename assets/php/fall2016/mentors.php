<?php 
	// error_reporting(E_ALL);
	session_start();
	$root = $_SERVER['DOCUMENT_ROOT'];
	// echo $root;

	if ($root == '/Applications/XAMPP/xamppfiles/htdocs' ) {
		require_once($root . '/site1/vendor/autoload.php');
		require_once($root . '/site1/firebase.php');
	}else{
		require_once($root . '/vendor/autoload.php');
		require_once($root . '/firebase.php');
	}

	$time = round(microtime(true)) . "000";
	

	function timePassed ($theTime){
		$time = round(microtime(true)) . "000";
		$minutesAgo = (($time - $theTime) /1000) / 60; // 60000000;
		return  round($minutesAgo);
		// $remaining = $date - time() + 21600;
		// $days_remaining = floor($remaining / 86400);
		// $hours_remaining = floor(($remaining % 86400) / 3600);
		// $minutes_remaining = floor((($remaining % 86400) % 3600) / 60);
		// $seconds_remaining = floor(((($remaining % 86400) % 3600) % 60) % 60);
	}

	$path = 'mentor_requests';

	$value = $firebase->get($path, array('orderBy' => '"timestamp"'));
	// echo "$value";
	$sessionAnnouncement = null;
	if (isset($_SESSION['requests']) && empty($_SESSION['requests']) == false) {
		$sessionRequests = $_SESSION['requests'];
	}

	// echo var_dump($value);

	if ($value != 'null' && $value != null && $value != 'NULL') {
		$value = str_replace("{", "##", $value);
		$value = str_replace("}", "##", $value);
		$value = str_replace(":", "##", $value);
		$value = str_replace(",", "##", $value);

		$allValues = explode('"', $value);
		
		// echo var_dump($allValues);

		$tempValues = null;

		for ($i=0; $i < sizeof($allValues); $i++) { 
			if (empty($allValues[$i])){
				if ($allValues[$i] != "0") {
					$allValues[$i] = "left blank"; //finds any blank strings and inserts the word
				}
			}
		}

		for ($i=0, $j=0; $i < sizeof($allValues) ; $i++, $j++) { 
			$allValues[$i] = trim($allValues[$i]);
			if (strpos($allValues[$i], "##") !== false) {
				$allValues[$i] = str_replace("##", "", $allValues[$i]);
				if (empty($allValues[$i]) === false && $allValues[$i] != "0") {
					$tempValues[$j] = $allValues[$i];
				}else{
					$j -= 1;
				}
			}else{
				$tempValues[$j] = $allValues[$i];
			}
		}

		$allValues = $tempValues;
		$tempValues = null;
		// 	}elseif(strpos($allValues[$i], "##") !== false){
		// 		$allValues[$i] = str_replace("#", "", $allValues[$i]);
		// 		if (empty($allValues[$i])) {
		// 			if ($allValues[$i] == "0") {
		// 				$tempValues[$j] = $allValues[$i];
		// 			}else{
		// 				$j-=1;
		// 			}
		// 		}
		// 	}else{

		// 		$tempValues[$j] = $allValues[$i];
		// 	}
		// }
		// $allValues = $tempValues;
		// $tempValues = null;

		// echo var_dump($allValues);

		for ($i=0, $j=0; $i < sizeof($allValues) ; $i++,$j++) { 

			if (! ($allValues[$i] == "category" || $allValues[$i] == "uniqueId" || $allValues[$i] == "description" || $allValues[$i] == "floor" || $allValues[$i] == "location" || $allValues[$i] == "status" || $allValues[$i] == "teamName" || $allValues[$i] == "timestamp" || $allValues[$i] == "title")){
				$tempValues[$j] = $allValues[$i];
			} else{
				$j-=1;
			}
		}

		$allValues = $tempValues;
		$tempValues = null;

		// echo var_dump($allValues);


		for ($i=0, $j=0, $k=0; $i < sizeof($allValues) ; $i++, $k++) { 
			if ($k == 9) {
				$k = 0;
				$j +=1;
				$tempValues[$j][$k] = $allValues[$i];
			}else{
				$tempValues[$j][$k] = $allValues[$i];
			}
			
		}

		$allValues = $tempValues;
		$tempValues = null;

		$requests = null;

		// echo var_dump($allValues); 


			for ($i=0; $i < sizeof($allValues) ; $i++) { 
				$requests[$i]['uniqueId'] = $allValues[$i][0]; 
				$requests[$i]['category'] = $allValues[$i][1];
				$requests[$i]['description'] = $allValues[$i][2]; 
				$requests[$i]['floor'] = $allValues[$i][3];
				$requests[$i]['location'] = $allValues[$i][4]; 
				$requests[$i]['status'] = $allValues[$i][5]; 
				$requests[$i]['teamName'] = $allValues[$i][6]; 
				$requests[$i]['timestamp'] = $allValues[$i][7]; 
				$requests[$i]['title'] = $allValues[$i][8];
			}

			function sortByOrder($a, $b) {
			    return $b['timestamp'] - $a['timestamp'];
			}


			usort($requests, 'sortByOrder');

			// echo var_dump($requests);

			// echo $requests[5]['category'];


			$_SESSION['requests'] = $requests;

			function emoji($array,$text,$idCounter,$idText){
?>
				<script type="text/javascript">
					<?php echo 'var aBody ="' . $array["$text"] . '"'; ?>;
					var aBody_esc=escape(aBody);
					aBody = unescape(aBody_esc);
					<?php echo '$(\'#'. $idText . '-' . $idCounter .'\').html(aBody);'; ?>
				</script>
<?php
			}
				$requestCounter = -1;
				foreach ($requests as $request) {
					$requestCounter +=1;
					if ($request['status'] == 'Pending' || $request['status'] == 'Accepted' || $request['status'] == 'Canceled'){ //($request['status'] == 'Accepted' && timePassed($request['timestamp']) < 10)) {
					
?>		
						<div class="request-card" <?php echo 'id="card-'.$requestCounter.'"'; ?>>
							<!-- <h4 class="title">Category</h4> -->
							<span class="category" <?php echo 'id="category-'.$requestCounter.'"'; ?> ><?php echo $request['category']; ?></span>
							<?php emoji($request,'category',$requestCounter,'category'); ?>
							<span class="teamName" <?php echo 'id="teamName-'.$requestCounter.'"'; ?> ><?php echo $request['teamName']; ?></span>
							<?php emoji($request,'teamName',$requestCounter,'teamName'); ?>
							<h4 class="title">Message</h4>
							<p class="description item" <?php echo 'id="description-'.$requestCounter.'"'; ?>><?php echo $request['description']; ?></p>
							<?php emoji($request,'description',$requestCounter,'description'); ?>
							<h4 class="title">Location</h4>
							<span class="location item"><?php echo 'Floor: ' . $request['floor'] . '<br>Area: ' . $request['location']; ?></span>
							<h4 class="title">Status</h4>
							<span class="status item"><?php echo $request['status'] . ' - Placed: ' . timePassed($request['timestamp']) . ' min ago'; ?></span>

<?php 
							if ($request['status'] == 'Pending') {
								echo '<script type="text/javascript">$("#card-'.$requestCounter.'").addClass("pending"); </script>';
								// $time = 



?>
								<form id="accept" name="acceptRequest" method="POST" action="accept.php">
									<input class="textInput" type="text" name="mentor-name" placeholder="Mentor First Name Only">
									<input class="textInput" type="text" name="mentor-id" placeholder="Mentor ID (optional)">
									<input type="hidden" name="timestamp" <?php $time = round(microtime(true)) . "000"; echo 'value="' . $time . '"'; ?>>
									<input type="hidden" name="uniqueId" <?php echo 'value="' . $request['uniqueId'] . '"'; ?>>
									<input type="hidden" name="description" <?php echo 'value="' . $request['description'] . '"'; ?>>
									<input style="height: 40px" class="submitButton" type="submit" value="Accept" name="submitButton">
								</form>
<?php							
							}elseif($request['status'] == 'Accepted'){
								echo '<script type="text/javascript">$("#card-'.$requestCounter.'").addClass("accepted");</script>';
								?>

								<span class="acceptedAlready">Accepted</span>

							<?php
							
							}else{
								echo '<script type="text/javascript">$("#card-'.$requestCounter.'").addClass("accepted");</script>';
								?>

								<span class="acceptedAlready">Canceled</span>

							<?php
							}
					}
	
?>
						


					</div>
					











<?php
				

				}


	}elseif (isset($sessionRequests) && empty($sessionRequests) == false) {
		$requests = $sessionRequests;
	}else{

	}


?>