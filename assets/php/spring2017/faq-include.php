<span class="faq-title">Frequently Asked Questions</span>
			<form action="">

	
	
				
				<?php 

					$faq = new faq;
					$result = $faq -> selectAll();
					$count = 0;
					$label_count=1;
					foreach ($result as $key => $subject) {
						// var_dump($value);
						$title = $subject["title"];
						$content = $subject["content"];
						$modified = $subject["date_modified"];

				?>

					<style type="text/css">
						.page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item {
					      animation: faq-item-open .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e1 {
					        animation: faq-e1-open .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e2 {
					        animation: faq-e2-open .2s ease-out 0s forwards; }
					    .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item {
					      animation: faq-item-close .6s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e1 {
					        animation: faq-e1-close .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e2 {
					        animation: faq-e2-close .2s ease-out 0s forwards; }
					</style>
					

					<input class="faq-navigator" type="radio" name="faq-navigation" id=<?php echo 'faq-navigator-' . $label_count; ?>>
					<label class=<?php echo 'faq-id-' . $label_count; ?> for=<?php echo 'faq-navigator-' . $label_count; ?> >

						<div 
							<?php 	
								if ($count > 0) { 
									echo 'class="item right"'; 
									$count = 0; 
								}else{ 
									echo 'class="item left"';
									$count += 1;
								}
							?>
						>
							<div class="arrow">
								<div class="element e1"></div>
								<div class="element e2"></div>
							</div>
							<div class="title"><div><?php echo "$title";?></div></div>
							<div class="content"><?php echo "$content";?></div>
							<span class="modified"><?php echo "$modified";?></span>
						</div>
					</label>
				<?php
						$label_count +=1;
					}

			 	?>
			 	
			</form>