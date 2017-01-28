<?php 
	session_start();
	// ini_set("display_errors", 1);
	// {

	// set_error_handler("var_dump");
	$root = $_SERVER['DOCUMENT_ROOT'];
	// echo $root;
	$mentorName = "blank";
	$mentorId = "blank";
	$timestamp = round(microtime(true)) . "000";
	$uniqueId = "blank";
	// $description ="";
	// echo "test";

	// $test = $_POST['mentorName'];

	if (isset($_POST['mentor-name'])) {
		if (empty($_POST['mentor-name']) == false) {
			$mentorName = $_POST['mentor-name'];
			// echo "set1<br>";
		}else{
			// echo "empty1<br>";
		}
	}else{
		// echo "not-set 1<br>";
	}

	if (isset($_POST['mentor-id'])) {
		if (empty($_POST['mentor-id']) == false) {
			$mentorId = $_POST['mentor-id'];
			// echo "set2<br>";
		}else{
			// echo "empty2<br>";
		}
	}else{
		// echo "not-set 2<br>";
	}

	if (isset($timestamp)) {
		if (empty($timestamp) == false) {
			// echo "$timestamp<br>";
		}
		else{
			// echo "empty t<br>";
		}
	}else{
		// echo "not-set t<br>";
	}

	if (isset($_POST['uniqueId'])) {
		if (empty($_POST['uniqueId']) == false) {
			$uniqueId = $_POST['uniqueId'];
			// echo "set3<br>";
		}else{
			// echo "empty3<br>";
		}
	}else{
		// echo "not-set 3<br>";
	}



	if ($root == '/Applications/XAMPP/xamppfiles/htdocs') {
		require_once($root . '/site1/assets/php/fall2016/accept.php');
	}else{
		require_once($root . '/assets/php/fall2016/accept.php');
	}

	// if (isset($_POST['mentor-name'])){
	// 	if(empty($_POST['mentor-name'] == false)) {
	// 		$mentorName = $_POST['mentor-name'];
	// 		echo "set";
	// 	}else{
	// 		echo "not-set";
	// 	}
	// }else{
	// 	echo "not-set";
	// }



	// if (isset($_POST['mentor-id']) && empty($_POST['mentor-id'] == false)) {
	// 	$mentorId = $_POST['mentor-id'];
		
	// }

	// // if (isset($_POST['timestamp']) && empty($_POST['timestamp'] == false)) {
	// // 	$timestamp = $_POST['timestamp'];
		
	// // }

	// if (isset($_POST['uniqueId']) && empty($_POST['uniqueId'] == false)) {
	// 	$uniqueId = $_POST['uniqueId'];
		
	// }

	// if (isset($_POST['description']) && empty($_POST['description'] == false)) {
	// 	$description = $_POST['description'];
		
	// }



	// if ($root == '/Applications/XAMPP/xamppfiles/htdocs') {
	// 	require_once($root . '/site1/assets/php/fall2016/accept.php');
	// }else{
	// 	require_once($root . '/assets/php/fall2016/accept.php');
	// }
?>