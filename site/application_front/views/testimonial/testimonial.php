<div class="testimonial-area">
                
                <?php 
				for($i=0;$i<count($testimonial);$i++){?>
                <div class="textimonial-block">
                <img src="http://projects.arcinfotec.com/odhub/odhub/upload/testimonials/thumb/<?php  echo $testimonial[$i]['image_path'] ?>" alt="" border="0"> 
                <span class="bold"><?php echo $testimonial[$i]['title']?></span><br />
                <?php echo $testimonial[$i]['content']?>
                <div class="clear"></div>
                
                 
                
                
               </div> 
			   
			   <?php } ?>
               
          		</div>
                </div>
               