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
		var project_id = $('#on_change').val();
		var price_var = '#project_price' + project_id;
		var project_price = $(price_var).val();
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
           <li><a href="<?php echo $this->config->base_url(); ?>professional/edit_profile">My Profile</a></li>
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
								if(isset($country_data['Country']))
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
                    <p>Unique Referral Code Link For Professional : <span><a href="<?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?>"><?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?></a></span> </p>
                    
                    <p>Unique Referral Code Link For Client : <span><a href="<?php echo base_url("login/signup/?code=" . $prof_data['referral_code']); ?>"><?php echo base_url("login/signup/?code=" . $prof_data['referral_code']); ?></a></span> </p>
                    
                    <p>Send email: <span><a href="javascript:void(0);" onclick='window.open("<?php echo base_url("professional/popUpEmail/?code=".$prof_data['referral_code']);?>","_blank","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=400, height=400");'>Click</a></p>
                    
                    <p><a target="_blank" href="<?php echo file_upload_base_url().'professionalw9/'.$prof_data['w9Image'];?>">Download file W-9</a></p>
                    <p>&nbsp;</p>
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
	
    <?php
   //debugbreak();
   
   $arr_client_details = array();
   for($i=0;$i<count($awarded_projects_client);$i++){
		$client_name = $awarded_projects_client[$i]['ClientFirstname'].' '.$awarded_projects_client[$i]['ClientLastname'];
		$client_id =    $awarded_projects_client[$i]['ClientId'];
		$arr_client_details[$client_id] = $client_name;
   }
   
   ?>
   <script language="javascript">
	function submit_clientinfo(){
		//alert("test");
		var client_id = $('#client_info').val();
		$('#client_info').val(client_id);
		document.invoice_filter.submit();
	}
	</script>
	<form name="invoice_filter" id="invlice_filter" action="" method="post">
    	<input type="hidden" name="client_id" id="client_id" value="all" />
    
    
    
    
    <div class="select-name">Select the client: </div>
   <div class="catagorie-area">
      
  
   <select id="client_info" name="client_info" onchange="submit_clientinfo();"> 
   <option value="all" <?php if($client_id_sel == 'all'){echo "selected";}?>>Select the client</option>
   <?php foreach($arr_client_details as $key=>$val){ ?>
	<option value="<?php echo $key; ?>" <?php if($client_id_sel == $key){echo "selected";}?>><?php echo $val; ?>
	
	</option>
		
	<?php } ?>
	
  </select>
  
  </div>
    <div class="clear"></div>
   <div class="select-name">Select the project: </div>
   <div class="catagorie-area">
      
   
   <select class="select-catagorie" id="on_change"> 
   <option value="">Select the project</option>
   <?php 
   			$display_project = 0;
   	for($i=0;$i<count($awarded_projects);$i++){ 
   		$checkIfinvoiceSend = Professional::checkIfinvoiceSend($awarded_projects[$i]['project_id']);
		if(empty($checkIfinvoiceSend)){
			$display_project = 1;
	?>	
			<option value="<?php echo $awarded_projects[$i]['project_id']; ?>"><?php echo $awarded_projects[$i]['project_name']; ?></option>    	 
	<?php		 
		 }
   ?>

		
	<?php } ?>
	
  </select>
  <div id="no_project_found" style="display:none">No Project Found to send Invoice</div>
  
   <?php 
   	for($i=0;$i<count($awarded_projects);$i++){ 
      $checkIfinvoiceSend = Professional::checkIfinvoiceSend($awarded_projects[$i]['project_id']);
      if(empty($checkIfinvoiceSend)){
   ?>
	<input type="hidden" name="project_id" id="project_id" value="<?php echo $awarded_projects[$i]['project_id']; ?>">
    <input type="hidden" name="project_price" id="project_price<?php echo $awarded_projects[$i]['project_id'];?>" value="<?php echo $awarded_projects[$i]['price']; ?>">
	<?php
	  }
	}
	?>
  </div> 
   </form>
   <?php

   if($display_project == 0){
	?>
    <script language="javascript">
	document.getElementById('on_change').style.display = "none";
	document.getElementById('no_project_found').style.display = "block";
    </script>   
   <?php	   
   }
   ?>
   
	 <div id="price" class="price-area"></div>
     <div class="clear"></div>
     
     <div class="centeraligne" id="send_invoice"></div>
	</div> 
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>


</section>
<div class="clear"></div>
