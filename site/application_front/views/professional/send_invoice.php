<script language="javascript" type="text/javascript" >
  
    function assignval(referal_user_id,project_id,proposal_id)
    {
      //alert(referal_user_id+proposal_id+project_id);
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){			
                        var ajaxDisplay = document.getElementById('ajaxDiv');
                        alert(ajaxRequest.responseText);
			ajaxDisplay.innerHTML = "Project referred successfully.";
		
		}
	}
	//var age = document.getElementById('age').value;
	//var wpm = document.getElementById('wpm').value;
	//var sex = document.getElementById('sex').value;
	var queryString = referal_user_id + "/" + project_id+"/" + proposal_id;
	ajaxRequest.open("GET", "<?php echo base_url()?>professional/refer_user/" + queryString, true);
	ajaxRequest.send(null); 
    }
	
	$(document).ready(function(){
	$('#on_change').change(function(){
	if($('#on_change').val()!=''){
		var project_id = $('#project_id').val();
		var project_price = $('#project_price').val();
			$('#price').html("Price : "+project_price);
			var html_content = '<span class="send-btn"><a href="<?php echo base_url()?>professional/send_invoice?projectid='+project_id+'">Send Invoice</a>';
			$('#send_invoice').html(html_content);
		}
		});
	});
	

       
</script>
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
    <nav class="clearfix">
        <ul class="clearfix">
           <li><a href="<?php echo $this->config->base_url(); ?>professional/view_profile">My Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>professional/show_home">My Account</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>project/aword_project">My Projects</a></li>
		
      			<li><a href="<?php echo $this->config->base_url(); ?>professional/review/">Realistic Previews</a></li>			
            <li class="last"><a target="_blank" href="<?php echo $this->config->base_url(); ?>../forum/">OD Hub Forums</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
    <div class="Total-Div-Box">
        <div class="box-head">
            <h1>MY ACCOUNT (PROFESSIONAL) <span><a href="#">D Hub Previews = # 45</a></span> </h1>
        </div>
        <div class="listingDiv">
            <div class="pro-pic">

                <img src="<?php
                if ($prof_data['ProfessionalImage']) {
                    echo file_upload_base_url() . 'userimages/' . $prof_data['ProfessionalImage'];
                } else {
                    echo css_images_js_base_url() . 'images/pro-pic.png';
                }
                ?>"   alt="" border="0">

            </div>
            <div class="editSection">
                <div class="editSec">
                    <h1><a href="#">Edit Profile</a></h1>

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
                <div class="editSec1">
                    <p>REFERRAL CODE: <span><?php echo $prof_data['referral_code']; ?></span></p>
                    <p>Unique Referral Code Link : <span><a href="<?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?>"><?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?></a></span> </p>
                    <p>Upload Your W - 9 : <span>
                            <input name="" type="file" >
                        </span> </p>
                </div>
                <div class="company-im"><a href="#"><img src="<?php echo css_images_js_base_url(); ?>images/comp-im.jpg" width="134" height="134" alt="" border="0"></a></div>
                <div class="clear"> </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png" alt="" border="0"></div>
    </div>
    
    <div class="listingDiv">

   <div class="select-name">Select the project: </div>
   <div class="catagorie-area">
   <select class="select-catagorie" id="on_change"> 
   <option value="">Select the project</option>
   <?php for($i=0;$i<count($awarded_projects);$i++){ ?>
	<option value="<?php echo $awarded_projects[$i]['project_id']; ?>"><?php echo $awarded_projects[$i]['project_name']; ?></option>
	<input type="hidden" name="project_id" id="project_id" value="<?php echo $awarded_projects[$i]['project_id']; ?>" />
    <input type="hidden" name="project_price" id="project_price" value="<?php echo $awarded_projects[$i]['price']; ?>" />
	<?php } ?>
  </select>
  </div> 
   
	 <div id="price" class="price-area"></div>
     <div class="clear"></div>
     
     <div class="centeraligne" id="send_invoice"></div>
	</div> 
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>


</section>
<div class="clear"></div>
