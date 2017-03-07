<?php 

	require_once("global.php");

	include_once("classes/faq.php");
	include_once("classes/events.php");
	include_once("classes/everything.php");
	// phpinfo();


	function test_db(){
		$db = new Db;
		$result = $db -> connect();
	}

	function getTime($dateString){
		$result = substr($dateString, 11);
		$hr = (substr($result, 0, 2)) * 1;
		$result = substr($result, 3);
		$min = substr($result, 0, 2);
		$amPm = "am";

		if ($hr > 11) {
			$amPm = "pm";
			if ($hr > 12) {
				$hr -= 12;
			}
		}elseif ($hr == 0) {
			$hr = 12;
		}

		$result = $hr;

		if (($min * 1) > 0) {
			$result .= ":".$min;
		}

		$result .= " " . $amPm;
		return $result;
	}




?>