<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <div class="login-page">
  <? if(isset($client_sugnup)){?>
  <h5>Thanks for Signing Up</h5>
  <?}else{?>
  <h5>Thanks</h5>
  <?}?>
  
    	<div class="lgt-blue">
        	<div class="dp-blue">
            <div class="login-im"></div>
			  <? if(isset($client_sugnup)){?>
             <p style="font-size:14px; color:#FFF; font-weight:bold">We are excited to help you continue with your career development. An email verification has been sent to the email address you provided. Please use this to log in and get started.</p>
			   <?}else{?>
             <p style="font-size:14px; color:#FFF; font-weight:bold">Thank you for signing up. An email verification has been sent to the email address you provided. Please use this to log in and get started.</p>
			   <?}?>
             <div class="clear"></div>
            </div>
        </div>
        <div align="center" class="shdw-im"><img src="<?php echo css_images_js_base_url();?>images/lgn_b.jpg" alt=""></div>
    </div> 
</section>
<div class="clear"></div>
