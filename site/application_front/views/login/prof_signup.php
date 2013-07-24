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
            
            <div class="form-title">You are on your way to building your business and developing your network</div>
            <div class="clear"></div>
            
             <div class="link-txt">
             	Already have an account? <a href="<?php echo site_url('login/signin'); ?>">Sign In.</a><br>
     			Looking to hire? <a href="<?php echo site_url('login/signup'); ?>">Register as a client.</a>
             </div>
                <div class="reg-2blue">
                <form name="frmProfSignup" id="frmProfSignup" action="<?php echo $prof_signup_submit_link ?>" method="post" enctype="multipart/form-data">                
                 <div>
                        
                <p class="p-txt">Email Adress</p>
                <div><input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="input-r" /><span>*</span><?php echo form_error('email') ?></div>
                
                <p class="p-txt">Password</p>
                <div><input type="password" name="passd" id="passd" value="<?php echo set_value('passd') ?>" class="input-r" /><span>*</span><?php echo form_error('passd') ?></div>
                
                <p class="p-txt">Retype Password</p>
                <div><input type="password" name="cpass" id="cpass" value="<?php echo set_value('cpass') ?>" class="input-r" /><span>*</span><?php echo form_error('cpass') ?></div>
                
                <?php
					if($referral_code != ''){
				?>		
                	<p class="p-txt">Referral User</p>		 
                	<div><?php echo $ref_professional[0]->ProfessionalFirstname.' '.$ref_professional[0]->ProfessionalLastname;?></div>
                    
					<p class="p-txt">REFERRAL CODE</p>		 
                	<div><input type="text" name="referral_code" id="referral_code" value="<?php echo $referral_code;?>" class="input-r in-o" readonly="readonly"/><span><br/>(If a colleague referred you.)</span></div>
				<?php		
					}
					else{
				?>		
					<p class="p-txt">REFERRAL CODE</p>		 
                	<div><input type="text" name="referral_code" id="referral_code" value="<?php echo $referral_code;?>" class="input-r in-o"/><span><span><br/>(If a colleague referred you.)</span></div>		
				<?php		
					}
				?>
                
                
                
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
                 <!--<p class="p-txt">State</p>
                  <div>
                   <select name="state" id="state" class="input-r">
                  <?php
				  for($i=0;$i<count($state_data);$i++){
				  ?>
                 
                  	<option value="<?php echo $state_data[$i]->StateId?>"><?php echo $state_data[$i]->StateName;?></option>
                  
                  <?php
				  }
				  ?>
                  
                  </select>
                  
                  
                  <span>*</span>
                  <?php echo form_error('state') ?></div>-->
                  
                  <p class="p-txt">Website</p>
                  <div><input type="text" name="wbsit" id="wbsit" value="<?php echo set_value('wbsit') ?>" class="input-r sm-wid" />
                 </div>
                </div>
                
                <div class="clear"></div>
                
                
                <div>
                    <p class="p-txt">Country</p>
                    <div>
                        <?php
                        $countryList = $this->model_location->get_country_data();
                  
                        ?>
                        <select name="custom_country" id="custom_country" class="input-r">
                        	<option value="0">--Select Country--</option>
                        <?php
                       // CountryId, Country, FIPS104, ISO2, ISO3, ISON, Internet, Capital, MapReference, NationalitySingular, NationalityPlural, Currency, CurrencyCode, Population, Title, Comment
                            foreach($countryList as $country){ ?>
                                <option value="<?php echo $country['CountryId'];?>"><?php echo $country['Country'];?></option>		
                            <?php
                            }
                        ?>
                        </select>
                 </div>
                 
                 	<p class="p-txt">State</p>
                    <div>
                                             <span id="generate_state_options">
                        <select name="state" id="state" class="input-r">
                        	<option value="0">--Select State--</option>
					               </select>
                        </span>
                 </div>
                </div>
              	<script>
					$('#custom_country').change(function()
					{
					    var countryId = $(this).val();
						//alert(countryId);
						 getStateList(countryId)
					});
					
                	function getStateList(countryId){

						var pageUrl = '<?php echo base_url().'/'.$this->router->fetch_class();?>/ajaxGenerateStatelist'
        
						$.ajax({
							url: pageUrl,
							type: "POST",
							data: {page_action : 'ajax_edit', c_country_id: countryId },
							dataType: "html",
							success: function(msg) {
								$("#generate_state_options").html('');
								$("#generate_state_options").html(msg);
							}
						});	
					}
                </script>  
                	
                
                <p class="p-txt">Highest Education Achieved</p>
                <div><input type="text" name="educn" id="educn" value="<?php echo set_value('educn') ?>" class="input-r" /><span>*</span><?php echo form_error('educn') ?></div>
                
                <p class="p-txt">Credentials</p>
                <div>
                
                
                <textarea name="credn" id="credn"  class="input-r" style="height:100px;"><?php echo set_value('credn') ?></textarea>
                
               <span>*</span><?php echo form_error('credn') ?></div>
                
    
                
                <!--<p class="p-txt">Select Services </p>
                
                <div class="select-box-area">
                <?php
				 // for($i=0;$i<count($servs_data);$i++){
				  ?>
                
                	<input type="checkbox" name="servcsn[]" value="<?php echo $servs_data[$i]->Id?>" /> <?php echo $servs_data[$i]->service_name?></br>
                    <?php
				//  }
				  ?>
                   
                </div>
                
                
                <p class="p-txt">Other services</p>
                <div><input type="text" name="othrsrvcs" id="othrsrvcs" value="<?php echo set_value('othrsrvcs') ?>" class="input-r" />	</div>-->
                
                <p class="p-txt">Upload Picture</p>
                <div><input type="file" name="userimg" id="userimg" class="input-r" ></div>
                
                <p class="p-txt">Upload Logo</p>
                <div><input type="file" name="logoimg" id="logoimg" class="input-r" ></div>
                
                <p class="p-txt">Upload W-9 Form </p>
                <div><input type="file" name="formimg" id="formimg" class="input-r" ></div>
                <p class="p-txt">LinkedIn Profile url </p>
                <div><input type="text" name="linkedin_url" id="linkedin_url" class="input-r" ></div>
				<p class="p-txt">Company Name </p>
                <div><input type="text" name="company_name" id="company_name" class="input-r" ></div>
                
                <!-- <p class="dnld"><a href="#">Download Form </a></p>
               <p class="bold1">Account Type<br>How do you want to represent yourself to clients on Elance?</p>
                <div class="left"><input name="" type="radio" value=""></div><div class="left bold">Individual&nbsp;</div>
                <div class="left"><input name="" type="radio" value=""></div><div class="left bold">Company&nbsp;</div>
                <div class="clear"></div>                
                <p style="font-size:11px;">( how you want your name to appear to clients, may include your company name and your title )</p>
                -->
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
