<?php 
	// error_reporting(E_ALL);
	$root = $_SERVER['DOCUMENT_ROOT'];

	// echo "$root";
	if ($root == '/Applications/XAMPP/xamppfiles/htdocs' ) {
		require_once( $root . '/site1/vendor/autoload.php');
		require_once($root . '/site1/firebase.php');
		// require_once($root . '/site1/assets/php/fall2016/accept.php');
	}else{
		require_once( $root . '/vendor/autoload.php');
		require_once($root . '/firebase.php');
		// require_once($root . '/assets/php/fall2016/accept.php');
	}

	// echo "$root";

	if (isset($uniqueId)) {
		if (empty($uniqueId) == false && $uniqueId != "blank") {
			$path = 'mentor_requests/' . $uniqueId . '/status';

			$value = $firebase->get($path);
			// echo "$value<br>";

			if (isset($value)){
				if (empty($value) == false) {
					$path = "mentor_requests/$uniqueId/status";
					$data = 'Accepted';
					$firebase->set($path, $data);


					$path = "mentor_requests/$uniqueId/description";
					if (isset($mentorName)) {
						if (empty($mentorName) == false && $mentorName != "blank") {
							$data = 'You will be helped by ' . $mentorName;
						}else{
							$data = 'A mentor is on the way to help you';
						}
					}else{
						$data = 'A mentor is on the way to help you';
					}

					$firebase->set($path, $data);

					// header("Location: $root/mentors");
					include "$root/mentors.php";
					
				}else{
					echo "uh oh. It looks like we've encountered an error.";
				}
			}else{
				echo "uh oh. It looks like we've encountered an error."; 
			}
		}else{
			echo "uh oh. It looks like we've encountered an error.";
		}
	}else{
		echo "uh oh. It looks like we've encountered an error.";
	}
	


	


?>