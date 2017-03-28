<span class="upcoming">Upcoming Events</span>
<div class="upcoming_container">
	<table>
	

		<?php 

			include_once("functions.php");
			$events = new events;
			$result = $events -> upcoming();

			// if (empty($result)) {
			// 	echo "<script type=\"text/javascript\">console.log('empty');</script>";
			// }else{
			// 	echo "<script type=\"text/javascript\">console.log('content');</script>";
			// }

			foreach ($result as $key => $event) {
				$title = $event['title'];
				$time = getTime($event['date']);

		?>
			<tr>
				<td class="time" style="color: white"><?php echo "$time"; ?></td>
				<td class="title" style="color: white"><?php echo "$title"; ?></td>
			</tr>
		<?php

			}



		?>
	</table>
</div>

<div class="food_container">
	<span class="food">When's Food?</span>
	<div class="food_schedule schedule">
		<div class="events">
			<!-- <span class="title">Upcoming</span> -->
			<table>
				<tbody>
					<tr><th colspan="2" class="title">Upcoming</th></tr>
					<?php 

						$result = $events -> upcoming_food();

						if (empty($result)) {
							?>

							<tr><td colspan="2">Starve!</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $food) {
								$title = $food['title'];
								$time = getTime($food['date']);

								?>
									<tr>
										<td class="time"><?php echo "$time"; ?></td>
										<td class="title"><?php echo "$title"; ?></td>
									</tr>
								<?php
							}
						}


					?>
					<tr><th colspan="2" class="title previous">Previous</th></tr>
					<?php 

						$result = $events -> previous_food();

						if (empty($result)) {
							?>

							<tr><td colspan="2">No One's Eaten!</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $food) {
								$title = $food['title'];
								$time = getTime($food['date']);
								
								?>
									<tr>
										<td class="time"><?php echo "$time"; ?></td>
										<td class="title"><?php echo "$title"; ?></td>
									</tr>
								<?php
							}
						}


					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="featured_container">
	<span class="featured">Featured</span>
	<div class="featured_schedule schedule">
		<div class="events">
			<table>
				<tbody>
					<?php 

						$result = $events -> featured();

						if (empty($result)) {
							?>

							<tr><td colspan="2">No upcoming events</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $featured) {
								$title = $featured['title'];
								$time = getTime($featured['date']);

								?>
									<tr>
										<td class="time"><?php echo "$time"; ?></td>
										<td class="title"><?php echo "$title"; ?></td>
									</tr>
								<?php
							}
						}


					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php 

	function colorSelector($type){
		switch ($type) {
			case 'food':
				return 'blue';
				break;
			case 'featured':
				return 'red';
				break;
			
			default:
				return 'white';
				break;
		}
	}


?>

<div class="all_container">
	<span class="all_title">All Events</span>
	<div class="all_events">
		<div class="day day1">
			<table>
				<tbody>
					<tr class="title">
						<th class="date" colspan="2">March 31st</th>
					</tr>
					<?php 
						$result = $events -> eventsByDate(03, 31);

						if (empty($result)) {
							?>

							<tr><td colspan="2">No events yet. Schedule is TBD</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $event) {
								
								$type = $event['type'];
								$title = $event['title'];
								$time = getTime($event['date']);
								$description = $event['description'];
								$location = $event['location'];
								echo "<script type=\"text/javascript\">console.log('color is " . colorSelector($type) . "');</script>";
								echo "<script type=\"text/javascript\">console.log('type is $type');</script>";
								?>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>><?php echo "$time"; ?></td>

										<td class="title"><?php echo "$title"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="description"><?php echo "$description"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="location"><?php echo "Location: $location"; ?></td>
									</tr>
								<?php
							}
						}


					?>
				</tbody>
			</table>
		</div>
		<div class="day day2">
			<table>
				<tbody>
					<tr class="title">
						<th class="date" colspan="3">April 1st</th>
					</tr>
					<?php 
						$result = $events -> eventsByDate(04, 01);

						if (empty($result)) {
							?>

							<tr><td colspan="3">No events yet. Schedule is TBD</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $event) {
								$type = $event['type'];
								$title = $event['title'];
								$time = getTime($event['date']);
								$description = $event['description'];
								$location = $event['location'];

								?>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>><?php echo "$time"; ?></td>
										<td class="title"><?php echo "$title"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="description"><?php echo "$description"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="location"><?php echo "Location: $location"; ?></td>
									</tr>
								<?php

							}
						}


					?>
				</tbody>
			</table>
		</div>
		<div class="day day3">
			<table>
				<tbody>
					<tr class="title">
						<th class="date" colspan="3">April 2nd</th>
					</tr>
					<?php 
						$result = $events -> eventsByDate(04, 02);

						if (empty($result)) {
							?>

							<tr><td colspan="3">No events yet. Schedule is TBD</td></tr>
							
							<?php
						}else{
							foreach ($result as $key => $event) {
								$type = $event['type'];
								$title = $event['title'];
								$time = getTime($event['date']);
								$description = $event['description'];
								$location = $event['location'];

								?>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>><?php echo "$time"; ?></td>
										<td class="title"><?php echo "$title"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="description"><?php echo "$description"; ?></td>
									</tr>
									<tr>
										<td class=<?php echo "\"time " . colorSelector($type) . "\""; ?>></td>
										<td class="location"><?php echo "Location: $location"; ?></td>
									</tr>
								<?php
							}
						}


					?>
				</tbody>
			</table>
		</div>
	</div>
</div>