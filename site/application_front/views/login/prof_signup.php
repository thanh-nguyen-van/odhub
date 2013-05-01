<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
<div class="reg_b">
  <div class="shdw-left"></div>
  <p class="reg-h">Create an OD Hub Account as a Professional</p>
        	
      <div class="linkd">
        <div class="left bold">Use my info from : </div>
        <div class="left"> <a href="#"><img src="<?php echo css_images_js_base_url();?>images/lnkd.jpg" alt="" width="71" height="24" border="0"></a></div></div>
	  <div>
          <div class="left-reg">
    
            <div class="reg-blue">
            <div class="reg-im"><img src="<?php echo css_images_js_base_url();?>images/login-im2.png" alt=""></div>
             <div class="link-txt">
             	Already have an account? <a href="<?php echo site_url('login/signin'); ?>">Sign In.</a><br>
     			Looking to hire? <a href="<?php echo site_url('login/signup'); ?>">Register as a client.</a>
             </div>
                <div class="reg-2blue">
                <form name="frmProfSignup" id="frmProfSignup" action="<?php echo $prof_signup_submit_link ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="referral_code" id="referral_code" value="<?php echo $referral_code;?>">
                 <div>
                        
                <p class="p-txt">Email Adress</p>
                <div><input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="input-r" /><span>*</span><?php echo form_error('email') ?></div>
                
                <p class="p-txt">Password</p>
                <div><input type="password" name="passd" id="passd" value="<?php echo set_value('passd') ?>" class="input-r" /><span>*</span><?php echo form_error('passd') ?></div>
                
                <p class="p-txt">Retype Password</p>
                <div><input type="password" name="cpass" id="cpass" value="<?php echo set_value('cpass') ?>" class="input-r" /><span>*</span><?php echo form_error('cpass') ?></div>
                
                <p class="p-txt">First Name</p>
                <div><input type="text" name="fname" id="fname" value="<?php echo set_value('fname') ?>" class="input-r" /><span>*</span><?php echo form_error('fname') ?></div>
                
                <p class="p-txt">Last Name</p>
                <div><input type="text" name="lname" id="lname" value="<?php echo set_value('lname') ?>" class="input-r" /><span>*</span><?php echo form_error('lname') ?></div>
                
                <p class="p-txt">Address</p>
                <div><input type="text" name="addrs" id="addrs" value="<?php echo set_value('addrs') ?>" class="input-r" /><span>*</span><?php echo form_error('addrs') ?></div>
                
                <div class="sm-inp">
                  <p class="p-txt">City</p>
                  <div><input type="text" name="city" id="city" value="<?php echo set_value('city') ?>" class="input-r sm-wid" ><span>*</span>
                  <?php echo form_error('city') ?></div>
                  
                  <p class="p-txt">Zip</p>
                  <div><input type="text" name="zip" id="zip" value="<?php echo set_value('zip') ?>" class="input-r sm-wid" /><span>*</span>
                  <?php echo form_error('zip') ?></div>
                </div>
                
                <div class="sm-inp">
                  <p class="p-txt">State</p>
                  <div><input type="text" name="state" id="state" value="<?php echo set_value('state') ?>" class="input-r sm-wid" ><span>*</span>
                  <?php echo form_error('state') ?></div>
                  
                  <p class="p-txt">Website</p>
                  <div><input type="text" name="wbsit" id="wbsit" value="<?php echo set_value('wbsit') ?>" class="input-r sm-wid" /><span>*</span>
                  <?php echo form_error('wbsit') ?></div>
                </div>
                
                <div class="clear"></div>
                
                <p class="p-txt">Highest Education Achieved</p>
                <div><input type="text" name="educn" id="educn" value="<?php echo set_value('educn') ?>" class="input-r" /><span>*</span><?php echo form_error('educn') ?></div>
                
                <p class="p-txt">Credentials</p>
                <div><input type="text" name="credn" id="credn" value="<?php echo set_value('credn') ?>" class="input-r" /><span>*</span><?php echo form_error('credn') ?></div>
                
                <p class="p-txt">Write About Credentials</p>
                <div><input type="text" name="abtcredn" id="abtcredn" value="<?php echo set_value('abtcredn') ?>" class="input-r" />	</div>
                
                <p class="p-txt">Select Services </p>
                <div><select name="servcs" id="servcs" value="<?php echo set_value('servcs') ?>" class="input-r">
                		<option value=""> -- Select Services -- </option>
                		<option value="Leadership Coaching"> Leadership Coaching </option>
                		<option value="MBTI"> MBTI </option>
                		<option value="HBDI"> HBDI </option>
                		<option value="360 Feedback"> 360 Feedback </option>
                		<option value="Leadership Assimilation"> Leadership Assimilation </option>
                		<option value="DiSC"> DiSC </option>
                		<option value="Strengths Finder"> Strengths Finder </option>
                		<option value="Strengths Deployment Inventory"> Strengths Deployment Inventory </option>
                		<option value="EQ"> EQ </option>
                		<option value="Hogan"> Hogan </option>
                		<option value="Strategy Sessions"> Strategy Sessions </option>
                		<option value="Leadership Retreats"> Leadership Retreats </option>
                		<option value="Other"> Other </option>
                     </select></div>
                
                <p class="p-txt">Other services</p>
                <div><input type="text" name="othrsrvcs" id="othrsrvcs" value="<?php echo set_value('othrsrvcs') ?>" class="input-r" />	</div>
                
                <p class="p-txt">Upload Picture</p>
                <div><input type="file" name="userimg" id="userimg" class="input-r" ></div>
                
                <p class="p-txt">Upload Logo</p>
                <div><input type="file" name="logoimg" id="logoimg" class="input-r" ></div>
                
                <p class="p-txt">Upload W-9 Form </p>
                <div><input type="file" name="formimg" id="formimg" class="input-r" ></div>
                
                <p class="dnld"><a href="#">Download Form </a></p>
                <p class="bold1">Account Type<br>How do you want to represent yourself to clients on Elance?</p>
                <div class="left"><input name="" type="radio" value=""></div><div class="left bold">Individual&nbsp;</div>
                <div class="left"><input name="" type="radio" value=""></div><div class="left bold">Company&nbsp;</div>
                <div class="clear"></div>                
                <p style="font-size:11px;">( how you want your name to appear to clients, may include your company name and your title )</p>
                
                <p class="p-txt">Public Name and Title</p>
                <div><input type="text" name="pubname" id="pubname" value="<?php echo set_value('pubname') ?>" class="input-r" />	</div>
                
                <p class="italic">&nbsp;</p>
                
                <div class="italic"><input name="" type="checkbox" value="">I have read and accept The OD Hub Terms of Service and agree to receive all 
                payments from OD Hub referred clients using only the OD Hub Invoice and Payment system</div>
                
                <div>*  Required Fields</div>
                
                <div class="btn1"><input name="" type="submit" class="buttn" value="Sign Up"></div>
                
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
