<span class="faq-title">Frequently Asked Questions</span>
	<!-- <form action=""> -->
	
	<table>
		<tbody>

		<?php 

		include_once("functions.php");

		$faq = new faq;
		$result = $faq -> selectAll();
		$count = 0;
		$label_count=1;
		foreach ($result as $key => $subject) {
			$id = $subject["id"];
			$title = $subject["title"];
			$content = $subject["content"];
			$modified = $subject["date_modified"];

			if ($count % 2 == 0) {
				?>
				<tr>
					<td class="faq-item" <?php echo "id=\"$id\"" ?>><div class="blue">
						<?php echo "$title"; ?>
					</div></td>
				<?php
			}else{
				?>
					<td class="faq-item" <?php echo "id=\"$id\"" ?>><div class="red">
						<?php echo "$title"; ?>
					</div></td>
				</tr>
				<?php
			}

			$count += 1;

		?>

			
			




		<?php






		}


















		?>
		</tbody>
	</table>
	<!-- </form> -->