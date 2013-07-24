<div class="testimonial-area">
	<div class="in-right">
		<h2>Testimonials</h2>
            <div class="terms">
			    <?php for($i=0;$i<count($testimonial);$i++){?>
					<h4><?php echo $testimonial[$i]['title']?></h4>
					<div class="testi-bg">
						<div class="testi-left"><img src="<?=file_upload_base_url()?>/testimonials/thumb/<?php  echo $testimonial[0]['image_path'] ?>" alt="" border="0"></div>
						<div class="testi-right"><?php echo $testimonial[$i]['content'];?></div>
						<div class="clear"></div>
					</div>
                <? } ?>
          </div>
	</div> 
	<div class="clear"></div> 
</div>
  
               