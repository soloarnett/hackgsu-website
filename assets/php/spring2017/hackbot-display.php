<?php 

	session_start();

	include_once("assets/php/spring2017/functions.php");

	function hackbot_display($data){
		$dataId = $data['typeid'];
		switch ($data['type']) {
			case 'event':
				hackbot_event($dataId);
				break;
			case 'food':
				hackbot_event($dataId);
				break;
			case 'featured':
				hackbot_event($dataId);
				break;
			case 'faq':
				hackbot_faq($dataId);
				break;
			
			default:
				hackbot_plain($dataId);
				break;
		}
	}



	function hackbot_event($id){
		$events = new events;
		$result = $events -> nextEvent();
		if (empty($result) == false) {
			?>
			<div class="event">
				<table>
					<tbody>
						<tr>
							<td class="time">
								<?php echo getTime($result[0]['date']);  ?>
							</td>
							<td class="title">
								<?php echo $result[0]['title']; ?>
							</td>
						</tr>
						<tr>
							<td class="location" colspan="2">
								<?php echo "Location: " . $result[0]['location']; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			// return false;
		}
	}

	function hackbot_faq($id){
		$faq = new faq;
		$result = $faq -> selectById($id);
		if (empty($result) == false) {
			?>
			<div class="faq">
				<?php

				echo "
					<div class=\"title\">" . $result[0]['title'] . "</div>
					<div class=\"content\">" . $result[0]['content'] . "</div>
				";
				?>
			</div>
			<?php
			// return true;
		}else{
			// return false;
		}
	}

	function hackbot_plain($id){

	}



?>