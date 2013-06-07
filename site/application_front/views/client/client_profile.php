<script src="<?php echo site_url('public/js/SpryTabbedPanels.js'); ?>" type="text/javascript"></script>
<link href="<?php echo site_url('public/css/SpryTabbedPanels.css'); ?>" rel="stylesheet" type="text/css" />
<script language="javascript">
    function contact_professional(ProfessionalId) {
        window.open("<?php echo $this->config->base_url(); ?>search/sendmessage/?ProfessionalId=" + ProfessionalId, 'sendmessage', 'height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }
</script>
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_profile">Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_home">Account</a></li>
            <li class="last"><a href="<?php echo $this->config->base_url(); ?>client/project_list">Projects</a></li>
<!--            <li class="last"><a href="#">Realistic Previews</a></li>-->
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
    <div class="Total-Div-Box">
        <div class="listingDiv1">
            <div class="pro-pic1">

                <img src="<?php if ($client_data['ClientImage']) {
    echo file_upload_base_url() . 'userimages/' . $prof_data['ClientImage'];
} else {
    echo css_images_js_base_url() . 'images/pro-pic.png';
} ?>"   alt="" border="0">





            </div>
            <div class="editSection1">
                <div class="editSec2">
                    <h3> Welcome <?php echo $_SESSION[USER_SESSION_FULLNAME] ?> </h3>
                    <p>Country :	<span> <?php if ($country_data != NULL) {  echo $country_data['Country'];} ?> </span> </p>
                    <p>Email :	<span> <?php echo $_SESSION[USER_SESSION_EMAIL] ?> </span> </p>
                    <p>Location : <span> <?php if ($state_data != NULL) { echo $state_data['StateName'];} ?>, Postalcode / Zipcode - <?php echo $client_data['ClientZipcode'] ?> </span> </p>
                </div>
                <div class="editSec3">
                    <ul>
                        <li class="aa"><a href="<?php echo $this->config->base_url(); ?>client/show_profile">Your Public Profile </a></li>
                        <li class="bb"><a href="<?php echo $this->config->base_url(); ?>client/edit_profile">Edit Your Profile </a></li>
                    </ul>
                </div>
                <div class="clear"> </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
      <div class="tab-section">
           	  <div id="TabbedPanels1" class="TabbedPanels">
            	  <ul class="TabbedPanelsTabGroup">
            	    <li class="TabbedPanelsTab" tabindex="0">General Info</li>
            	    <li class="TabbedPanelsTab" tabindex="0">More</li>
          	    </ul>
            	  <div class="TabbedPanelsContentGroup">
            	    <div class="TabbedPanelsContent">
                       
                    	<div class="edit-form">
                        	<div class="edit-name">UserName</div>
                                <div class="edit-box"><?php echo $client_data['ClientUsername']; ?></div>
                            
                        </div>
						<div class="edit-form">
                        	<div class="edit-name">Password</div>
                                <div class="edit-box"><?php echo $client_data['ClientPassword']; ?></div>
                            
                        </div>
						<div class="edit-form">
                        	<div class="edit-name">First Name</div>
                                <div class="edit-box"><?php echo $client_data['ClientFirstname']; ?></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">Last Name</div>
                            <div class="edit-box"><?php echo $client_data['ClientLastname']; ?></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">Address</div>
                            <div class="edit-box"><?php echo $client_data['ClientAddress']; ?></div>
                            
                        </div>
                        
                        
                        <div class="edit-form">
                        	<div class="edit-name">Zip code</div>
                            <div class="edit-box"><?php echo $client_data['ClientZipcode']; ?></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">State </div>
                            <div class="edit-box"><?php if ($state_data != NULL) { echo $state_data['StateName'];} ?></div>
                            
                        </div>
                        
                        <div class="edit-form">
                        	<div class="edit-name">Country</div>
                                <div class="edit-box"><?php if ($country_data != NULL) {  echo $country_data['Country'];} ?> </div>
                        </div>
						
						<div class="edit-form">
                        	<div class="edit-name">Description</div>
                                <div class="edit-box"><?php echo $client_data['ClientDescription']; ?></div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">JoinDate</div>
                                <div class="edit-box"><?php echo $client_data['ClientJoinDate']; ?></div>
                            
                        </div>
                        
                    </div>
            	    <div class="TabbedPanelsContent">
                       <div class="edit-form">
                        	<div class="edit-name">more</div>
                            <div class="edit-box">More</div>
                            
                        </div>
                        <div class="edit-form">
                        	<div class="edit-name">more</div>
                            <div class="edit-box">More</div>
                            
                        </div>
                    
                    </div>
                   
                   
                  
          	    </div>
          	  </div>
            </div>
            <div class="clear"></div>
			<br />
</section>
<div class="clear"></div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>