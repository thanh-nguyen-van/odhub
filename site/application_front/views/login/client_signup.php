<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <div class="reg_b">
    <div class="shdw-left"></div>
    <p class="reg-h">Create an OD Hub Account as a Client</p>
    <!--<div class="linkd2">
      <div class="left bold">Use my info from : </div>
      <div class="left"> <a href="#"><img src="<?php echo css_images_js_base_url();?>images/lnkd.jpg" alt="" width="71" height="24" border="0"></a></div>
    </div>-->
    <div>
      <div class="left-reg">
        <div class="reg-orng">
          <div class="reg-im"><img src="<?php echo css_images_js_base_url();?>images/login-im3.png" alt=""></div>
          <div class="link-txt2">Looking to develop your business or network? <br />
<a href="<?php echo site_url('login/prof_signup'); ?>">Sign Up as an OD Professional</a><br>
            Have an account? <a href="<?php echo site_url('login/signin'); ?>">Sign In.</a></div>
          <div class="reg-2orng">
            <form name="frmClientSignup" id="frmClientSignup" action="<?php echo $client_signup_submit_link ?>" method="post">

              <div>
                <p class="p-txt">Email Address </p>	 
                <div><input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="input-r in-o" /><span>*</span><?php echo form_error('email'); if(isset($emailExistMsg))echo "<br>".$emailExistMsg;?></div>
                
                <p class="p-txt">Password</p>		 
                <div><input type="password" name="passd" id="passd" value="<?php echo set_value('passd') ?>" class="input-r in-o" /><span>*</span><?php echo form_error('passd') ?></div>
                
                <p class="p-txt">Retype Password</p> 
                <div><input type="password" name="cpass" id="cpass" value="<?php echo set_value('cpass') ?>" class="input-r in-o" /><span>*</span><?php echo form_error('cpass') ?></div>
                <?php
					if($referral_code != ''){
						
				?>		
					<p class="p-txt">Referral User</p>		 
                	<div><?php echo $ref_professional[0]->ProfessionalFirstname.' '.$ref_professional[0]->ProfessionalLastname;?></div>
                    
                    <p class="p-txt">REFERRAL CODE</p>		 
                	<div><input type="text" name="referral_code" id="referral_code" value="<?php echo $referral_code;?>" class="input-r in-o" readonly="readonly"/><span>*</span></div>
                    
				<?php		
					}
					else{
				?>		
					<p class="p-txt">REFERRAL CODE</p>		 
                	<div><input type="text" name="referral_code" id="referral_code" value="<?php echo $referral_code;?>" class="input-r in-o"/><span>*</span></div>		
				<?php		
					}
				?>
                              
                <p class="p-txt">First Name</p>		 
                <div><input type="text" name="fname" id="fname" value="<?php echo set_value('fname') ?>" class="input-r in-o" /><span>*</span><?php echo form_error('fname') ?></div>
                
                <p class="p-txt">Last Name</p>		 
                <div><input type="text" name="lname" id="lname" value="<?php echo set_value('lname') ?>" class="input-r in-o" /><span>*</span><?php echo form_error('lname') ?></div>
                
                <p class="p-txt">Phone</p>			 
                <div><input type="text" name="phone" id="phone" value="<?php echo set_value('phone') ?>" class="input-r in-o" /></div>
                
                <p class="p-txt">Zip</p>			 
                <div><input type="text" name="zip" id="zip" value="<?php echo set_value('zip') ?>" class="input-r in-o" /></div>
                
                <div class="clear"></div><div>*  Required Fields</div><div class="btn1"><input name="" type="submit" class="buttn" value="Continue"></div>
              </div>
            </form>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="right-reg"><img src="<?php echo css_images_js_base_url();?>images/reg-r.jpg" alt="" border="0"></div>
    </div>
    <div class="shdw-r"></div>
    <div class="clear"></div>
  </div>
</section>
<div class="clear"></div>
