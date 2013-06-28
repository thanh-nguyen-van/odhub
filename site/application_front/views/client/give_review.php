<div class="container">
	<div class="Total-Div-Box">
        <div class="box-head2">
        	<h1>Give Review</h1>
        </div>
        
        <div class="review-block">
        	<form action="<?php echo $this->config->base_url(); ?>client/review_submit/" method="post" name="form" >
            	<div class="review-form">
				<?php echo validation_errors(); ?>
                	<div class="review-form-name">Professional Name :</div>
                    <div class="review-form-box"><?=$professional_name?></div>
                    <div class="clear"></div>
                    
                </div>
                
                <div class="review-form">
                	<div class="review-form-name">Review :</div>
                    <div class="review-form-box">
                        <input type="text" class="formbox" value=""  name="review_percentage" placeholder=""/>  %
                    </div>
                    <div class="clear"></div>
                    
                </div>
                
                <div class="review-form">
                	<div class="review-form-name">Description :</div>
                    <div class="review-form-box"><textarea class="formarea" name = "review"></textarea></div>
                    <div class="clear"></div>
                    
                </div>
                <input type="hidden" name="professional_id" value="<?=$professional_id?>">
                <input type="hidden" name="project_id" value="<?=$project_id?>">
                <div class="review-form">
                <div class="review-form-name">&nbsp;</div>
                	<div class="review-form-box">
                   	 <span class="org-btn-1 review-btn"> <input type="submit" class="sbn-btn" value="Submit"></span>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
        
        <div class="drop-shadow"><img border="0" alt="" src="http://192.168.1.50/odhub/site/public/images/drop-shadow.png"></div>
    </div>
</div>