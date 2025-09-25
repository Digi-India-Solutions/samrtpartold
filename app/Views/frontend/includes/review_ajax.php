   <?php  foreach ($product_review as $key => $value) {?>
            	
                <div class="product-review-section">
                    <div class="review-block">
						<h4><?php echo $value->title; ?></h4>
						<div class="star-rating-box" data-rating="<?php echo $value->rating; ?>">
                       
                       <?php for ($i=0; $i < $value->rating ; $i++) { 
                         echo '<span><i class="fa fa-star"></i></span>';
                       } ?>
                       
                  
                    </div>
						<h5>By <?php echo $value->fname.' '.$value->lname; ?></h5>
						<div class="date">On: <?php echo date('M d, Y',strtotime($value->create_date)); ?></div>
						<p><?php echo $value->review; ?></p>
					</div>
                </div>
               <?php }  ?>