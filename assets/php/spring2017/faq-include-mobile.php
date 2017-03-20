<span class="faq-title isMobile">Frequently Asked Questions</span>
	<!-- <form action=""> -->
	
	<table class="isMobile">
		<tbody class="isMobile">

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
				<tr class="isMobile">
					<td class="faq-item isMobile" <?php echo "id=\"$id\"" ?>><div class="isMobile blue">
						<?php echo "$title"; ?>
					</div></td>
				</tr>

		<?php
			}else{
				?>

				<tr class="isMobile">
					<td class="faq-item isMobile" <?php echo "id=\"$id\"" ?>><div class="isMobile red">
						<?php echo "$title"; ?>
					</div></td>
				</tr>

				<?php
			}
		$count += 1;





		}


















		?>
		</tbody>
	</table>
	<!-- </form> -->