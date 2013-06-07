<script src="<?php echo site_url('public/js/SpryTabbedPanels.js'); ?>" type="text/javascript"></script>
<link href="<?php echo site_url('public/css/SpryTabbedPanels.css'); ?>" rel="stylesheet" type="text/css" />
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="<?php echo $this->config->base_url(); ?>professional/view_profile">Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>professional/show_home">Account</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>project/aword_project">Projects</a></li>
<!--            <li><a href="#">Realistic Previews</a></li>-->
            <li class="last"><a target="_blank" href="<?php echo $this->config->base_url(); ?>../forum/">Forum</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box">
        
        <div class="listingDiv">
            <div class="pro-pic chng_img">
				<div class="hoverstyle">
                	<img src="<?php
                if ($prof_data['ProfessionalImage']) {
                    echo file_upload_base_url() . 'userimages/' . $prof_data['ProfessionalImage'];
                } else {
                    echo css_images_js_base_url() . 'images/pro-pic.png';
                }
                ?>"   alt="" border="0">
                
                        <div class="pen"><img src="<?php echo site_url('public/images/pen.png'); ?>"  alt="Edit" title="Edit" onclick="document.getElementById('ProfessionalImage').click();" /></div>              
                </div>
              
<div style="display:none;">
                  <form name="prof_img_up" id="prof_img_up" action="<?php echo site_url('professional/edit_profile_save/prof_img_up');?>" method="post" enctype="multipart/form-data">
                      <input type="file" name="ProfessionalImage" id="ProfessionalImage" onchange="document.getElementById('prof_img_up').submit();">
                </form>
              </div>
            </div>
            <div class="editSection">
                <div class="editSec">
                    <h1><a href="<?php echo site_url('professional/edit_profile'); ?>">Edit Profile</a></h1>

                    <p>Username : <span> <?php echo $_SESSION[USER_SESSION_NAME] ?> </span></p>
                    <p>Address :	<span> <?php echo $prof_data['ProfessionalAddress']; ?> </span></p>
                    <p>Country :	<span> <?php
                            if ($country_data) {
                                echo $country_data['Country'];
                            }
                ?> </span></p>
                    <p>State :	<span> <?php
                            if ($state_data != NULL) {
                                echo $state_data['StateName'];
                            }
                ?> </span></p>
                    <p>Zip code : <span> <?php echo $prof_data['ProfessionalZipcode'] ?> </span></p>
                </div>
                
                <!--<div class="editSec1">sujit</div>-->
                
                <div class="company-im chng_img">
                <div class="hoverstyle">
                	
                <img src="<?php echo site_url('public/images/comp-im.jpg'); ?>"  alt="pen" />
                <div class="pen"><img src="<?php echo site_url('public/images/pen.png'); ?>"  alt="Edit" title="Edit" /></div>
                
                </div>
                
                </div>
                <div class="clear"> </div>
               
            </div>
            <div class="clear"></div>
            <div>
               <?php echo validation_errors()."<br>"; ?>
                      <?php if(isset($sucmsg) && $sucmsg!=''){?>
                       <?php echo '<div class="sucmsg">'.$sucmsg.'</div>';?>
                        <?php }elseif(isset ($errmsg) && $errmsg!=''){?>
                       <?php echo '<div class="error">'.$errmsg.'</div>';?>
                        <?php }?> 
            </div>
            <div class="tab-section">
           	  <div id="TabbedPanels1" class="TabbedPanels">                     
            	  <ul class="TabbedPanelsTabGroup">
            	    <li class="TabbedPanelsTab" tabindex="0">General Info</li>
            	    <li class="TabbedPanelsTab" tabindex="0">Skills & Experience</li>                   
                    <li class="TabbedPanelsTab" tabindex="0">Contacts</li>
                    <!--<li class="TabbedPanelsTab" tabindex="0">More</li>-->
          	    </ul>
                      
            	  <div class="TabbedPanelsContentGroup">
                      
            	    <div class="TabbedPanelsContent">
                        <form name="general_info" id="general_info" action="<?php echo site_url('professional/edit_profile_save/general_info');?>" method="post" enctype="multipart/form-data">
                    	
                    	<div class="edit-form">
                        	<div class="edit-name">First Name</div>
                                <div class="edit-box"><input type="text" class="input-field" name="ProfessionalFirstname" id="ProfessionalFirstname" value="<?php echo $prof_data['ProfessionalFirstname']; ?>" /></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Last Name</div>
                            <div class="edit-box"><input type="text" class="input-field" name="ProfessionalLastname" id="ProfessionalLastname" value="<?php echo $prof_data['ProfessionalLastname']; ?>"  /></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">Address</div>
                            <div class="edit-box"><textarea name="ProfessionalAddress" id="ProfessionalAddress" class="text-field"><?php echo $prof_data['ProfessionalAddress']; ?></textarea></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">City</div>
                                <div class="edit-box"><input type="text" name="ProfessionalCity" id="ProfessionalCity" class="input-field" value="<?php echo $prof_data['ProfessionalCity']; ?>" /></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">Zip code</div>
                            <div class="edit-box">
                               <input type="text" name="ProfessionalZipcode" id="ProfessionalZipcode" class="input-field" value="<?php echo $prof_data['ProfessionalZipcode']; ?>" /> 
                            </div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">State </div>
                            <div class="edit-box">
                                <!--<input type="checkbox" class="checkbox-field" /> Name <input type="checkbox" class="checkbox-field" /> Email--> 
                                <select class="select-field" name="ProfessionalState" id="ProfessionalState">                  
                                          <?php
				  for($i=0;$i<count($state_data1);$i++){
				  ?>
                 
                  	<option value="<?php echo $state_data1[$i]->StateId?>"  <?php if($prof_data['ProfessionalState']==$state_data1[$i]->StateId){ echo 'selected="selected"';}?>><?php echo $state_data1[$i]->StateName;?></option>
                  
                  <?php
				  }
				  ?>                                 
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">Country</div>
                                <div class="edit-box">
                                    <!--<input type="radio" class="radio-field" /> Male <input type="radio" class="radio-field" value="<?php ?>" /> Female-->
                                    
                                  <select class="select-field" name="ProfessionalCountry" id="ProfessionalCountry">                  
                                          <?php
				  for($i=0;$i<count($country_data1);$i++){
				  ?>
                 
                                      <option value="<?php echo $country_data1[$i]->FIPS104?>" <?php if($prof_data['ProfessionalCountry']==$country_data1[$i]->FIPS104){ echo 'selected="selected"';}?>><?php echo $country_data1[$i]->Country;?></option>
                  
                  <?php
				  }
                                 
				  ?>   
                         </select>
                        </div>
                            
                        </div>
                        
                       
                        
                        <div class="edit-form">
                        	<div class="edit-name">&nbsp;</div>
                            <div class="edit-box">
                            	<span class="button-wrapper2 btn-small2"><input type="submit"  class="button2" value="Update" onclick="submitSearch()"></span>
                            </div>
                            
                        </div>
                      </form>  
                    </div>
            	    <div class="TabbedPanelsContent">
                        <form name="skill_expertise" id="skill_expertise" action="<?php echo site_url('professional/edit_profile_save/skill_expertise');?>" method="post" enctype="multipart/form-data">                     
                       <div class="edit-form">
                        	<div class="edit-name">Professional Expertise</div>
                                <div class="edit-box"><textarea name="ProfessionalExpertise" id="ProfessionalExpertise" rows="5" cols="20" class="text-field"><?php echo $prof_data['ProfessionalExpertise'];?></textarea></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Year(s) of experience</div>
                                <div class="edit-box">
                                    <select name="ProfessionalYear" id="ProfessionalYear" class="select-field" >
                                        <?php for($yr = 0; $yr<=10;$yr++){?>
                                        <option value="<?php echo $yr;?>" <?php if($yr==$prof_data['ProfessionalYear'])echo 'selected="selected"';?>><?php echo $yr;?></option>
                                        <?php }?>
                                    </select> Year(s)
                                </div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Degree</div>
                                <div class="edit-box">
                                    <input type="text"name="ProfessionalDegree" id="ProfessionalDegree" class="input-field" value="<?php echo $prof_data['ProfessionalDegree'];?>" >
                                </div>                           
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Specialization</div>
                                <div class="edit-box">
                                     <input type="text"name="ProfessionalSpecialization" id="ProfessionalSpecialization" class="input-field" value="<?php echo $prof_data['ProfessionalSpecialization'];?>" >
                                </div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Achievement</div>
                                <div class="edit-box">
                                     <input type="text"name="ProfessionalAchievements" id="ProfessionalAchievements" class="input-field" value="<?php echo $prof_data['ProfessionalAchievements'];?>" >
                                </div>              
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Short description</div>
                                <div class="edit-box">
                                     <input type="text"name="ProfessionalDescription" id="ProfessionalDescription" class="input-field" value="<?php echo $prof_data['ProfessionalDescription'];?>" >
                                </div>              
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Keywords</div>
                                <div class="edit-box">
                                     <input type="text"name="ProfessionalKeyword" id="ProfessionalKeyword" class="input-field" value="<?php echo $prof_data['ProfessionalKeyword'];?>" >
                                </div>              
                        </div>                    
                        <div class="edit-form">
                        	<div class="edit-name">&nbsp;</div>
                            <div class="edit-box">
                            	<span class="button-wrapper2 btn-small2"><input type="submit"  class="button2" value="Update" onclick="submitSearch()"></span>
                            </div>
                            
                        </div>
                             </form>
                    </div>
                   
                    <div class="TabbedPanelsContent">
                        <form name="contact" id="contact" action="<?php echo site_url('professional/edit_profile_save/contact');?>" method="post" enctype="multipart/form-data">

                       
                        <div class="edit-form">
                        	<div class="edit-name">E-mail</div>
                            <div class="edit-box">
                                <?php echo $prof_data['ProfessionalEmail'];?>
                                
                            </div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Paypal E-mail Address</div>
                            <div class="edit-box">
                                <input type="text" class="input-field" name="paypal_email" id="paypal_email" value="<?php echo $prof_data['paypal_email'];?>"  />
                                
                            </div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">LinkedIn Profile url</div>
                            <div class="edit-box">
                                <input type="text" class="input-field" name="linkedin_url" id="linkedin_url" value="<?php echo $prof_data['linkedin_url'];?>"  />
                                
                            </div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">&nbsp;</div>
                            <div class="edit-box">
                            	<span class="button-wrapper2 btn-small2"><input type="submit" class="button2" value="Update" onclick="submitSearch()"></span>
                            </div>
                            
                        </div>
                             </form>
                    </div>                   
<!--                    <div class="TabbedPanelsContent">
                       <div class="edit-form">
                        	<div class="edit-name">First Name</div>
                            <div class="edit-box"><input type="text" class="input-field" name="fname" id="fname" /></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Last Name</div>
                            <div class="edit-box"><input type="text" class="input-field" name="lname" id="lname"  /></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">&nbsp;</div>
                            <div class="edit-box">
                            	<span class="button-wrapper2 btn-small2"><input type="submit"  class="button2" value="Update" onclick="submitSearch()"></span>
                            </div>
                            
                        </div>
                    </div>-->
          	    </div>
          	  </div>
            </div>
            <div class="clear"></div>
        </div>
         
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png" alt="" border="0"></div>
    </div>
    


</section>
<div class="clear"></div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
