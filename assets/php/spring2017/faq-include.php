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
					<style type="text/css" id=<?php echo '"keyframe-changer-' . $label_count . '"'; ?>></style>
					

					<script type="text/javascript">
						function faqKeyframeChanger(count, height){
							var text = "@keyframes" + <?php echo '" faq-item-open-' . $label_count . '"'; ?> + " {0% {height:100px;background-color: #161616;color: white;overflow: hidden;cursor: pointer; }99% {overflow: hidden;cursor: pointer; }100% {height:" + height + "px;background-color: white;color: black;overflow: auto;cursor: default; } }@keyframes" + <?php echo '" faq-item-close-' . $label_count . '"'; ?> + " {0% {height: 400px;background-color: white;color: black;overflow: auto;cursor: default; }1% {overflow: hidden;cursor: pointer; }30% {height: 100px; }50% {background-color: white;color: black; }100% {background-color: #161616;color: white; } }";
							// var id = '#keyframe-changer-' + count;
							// $(id).text(text);
							// console.log(id + ": " + text);
							return text;
						}

						function faqInView(count){
							setTimeout(function(){	
								scrollToMinus((".faq-id-" + count + ">.item"), 300, 50);
							},300);
						}
						
						

						// var cheight = 100;
						// faqKeyframeChanger(lcount, cheight);


					</script>

					

					<style type="text/css">
						.page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item {
					      animation: <?php echo 'faq-item-open-' . $label_count; ?> .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e1 {
					        animation: faq-e1-open .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e2 {
					        animation: faq-e2-open .2s ease-out 0s forwards; }
					        .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:checked ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow {
					        animation: faq-arrow-open .2s ease-out 0s forwards; }
					    .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item {
					      animation: faq-item-close .6s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e1 {
					        animation: faq-e1-close .2s ease-out 0s forwards; }
					      .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow > .e2 {
					        animation: faq-e2-close .2s ease-out 0s forwards; }
					        .page > .faq > <?php echo '#faq-navigator-' . $label_count; ?>:not(:checked) ~ label<?php echo '.faq-id-' . $label_count; ?> > div.item > .arrow {
					        animation: faq-arrow-close .2s ease-out 0s forwards; }
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
					

			 		<script type="text/javascript">
						
						var height = $(<?php echo "\".page > .faq > .faq-id-" . $label_count . "> div.item > .content\""; ?>).outerHeight();
						var height2 = height + 100;
			 			
			 			// console.log("height is: " + height + ".");
			 			// console.log("height2 is: " + height2 + ".");
			 			$(<?php echo '"#keyframe-changer-' . $label_count . '"'; ?>).text(faqKeyframeChanger(<?php echo $label_count; ?>, height2 ));

			 			$(document).ready(function(){
							$(<?php echo '"label.faq-id-' . $label_count . '"'; ?>).click(function(){
								faqInView(<?php echo "$label_count";?>);
							});
						});

			 		</script>
					
					
					
				<?php
						$label_count +=1;
					}

			 	?>
			 	
			 	
			 	
			</form>