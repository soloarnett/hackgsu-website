<?php
	
	$date = strtotime("10/21/2016 1400");
	$remaining = $date - time() + 21600;
	$days_remaining = floor($remaining / 86400);
	$hours_remaining = floor(($remaining % 86400) / 3600);
	$minutes_remaining = floor((($remaining % 86400) % 3600) / 60);
	$seconds_remaining = floor(((($remaining % 86400) % 3600) % 60) % 60);







?>