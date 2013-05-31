<script language="javascript" type="text/javascript" >
  
    function assignval(referal_user_id,project_id,proposal_id)
    {
      alert(referal_user_id+proposal_id+project_id);
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
                        //alert(ajaxRequest.responseText);
                        if(ajaxRequest.responseText==1)
                            {
								ajaxDisplay.innerHTML = "Project referred successfully.";
                            }else{
                               ajaxDisplay.innerHTML = "Project already referred to this professional."; 
                            }
		
		}
	}
	var queryString = referal_user_id + "/" + project_id+"/" + proposal_id;
	ajaxRequest.open("GET", "<?php echo base_url()?>professional/refer_user/" + queryString, true);
	ajaxRequest.send(null); 
    }
       
</script>


<?php

 
$referer = Project::checkIfReferred($this->input->get('projectid'));
                                        if($referer->num_rows()>1){
											$arr = $referer->row_array();
											echo "<div class='select_btn1'>Reffer To: ".$arr['ProfessionalFirstname']." ".$arr['ProfessionalLastname']."</div>";
										}else{
									?>
<div class="select_btn">
									<select name="refer_id[]" id="refer_id" class="select-box-style"  >
                                            <option value="">--Select--</option>
                                            <?php foreach($my_referal->result() as $eachReferal){?>
                                            <option value="<?php echo $eachReferal->ProfessionalId;?>"><?php echo $eachReferal->ProfessionalFirstname." ".$eachReferal->ProfessionalLastname;?></option>
                                            <?php }?>
</select><input type="button" class="ref_button" name="ref_butt_<?php echo $this->input->get('projectid'); ?>" id="ref_butt_<?php echo $this->input->get('projectid'); ?>" value="Refer" onclick="javascript:assignval(refer_id.value,<?php echo $this->input->get('projectid'); ?>,<?php echo $var_array['proposal_id']; ?>)">                                
 </div>     
									<? }?>
                          
<section class="second-sec-cont2">
        <div class="top-blue-sec">
          <div class="drop-dwn">
            <div id="dd" class="wrapper-dropdown-5" tabindex="1">My Proposals (<?php echo count($proposal_details);?>)
              <ul class="dropdown">
                <li><a href="#"><i class="icon-user"></i>Under Review </a></li>
                <li><a href="#"><i class="icon-cog"></i>Declined</a></li>
                <li><a href="#"><i class="icon-remove"></i> Accepted </a></li>
                <li><a href="#"><i class="icon-remove"></i> In Progress </a></li>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        
        <?php
			foreach($proposal_details as $key=>$val){
				$professional_id = $val->ProfessionalId;
				$skillset = Project::getSkill($professional_id); 
				if($skillset == ""){
					$skillset = "none";	
				}
		?>		
		 <section class="proposalDiv-Total">
          <div class="left-logo"><img src="<?php echo css_images_js_base_url();?>images/left-logo.jpg" width="41" height="29" alt="" border="0"></div>
          <div class="cont-right">
            <h1><?php echo $val->fullname; ?></h1>
            <div class="clear"></div>
            <div class="flagDiv">
              <ul>
                <li><img src="<?php echo css_images_js_base_url();?>images/flag1.jpg" width="16" height="11" alt="" border="0"> <?php echo $val->StateName;?></li>
                <li class="last-li"><img src="images/building-icon.jpg" width="14" height="16" alt="" border="0"></li>
              </ul>
            </div>
            <div class="clear"></div>
            <?php 
			echo $val->proposal_description;
			?>
            <br />
            Skillset : <?php echo $skillset;?>
            <div class="clear"></div>
                <?php if($val->attachment!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/porposal_files/'.$val->attachment);?>"> <?php echo $val->attachment;?></a></span><div class="clear"></div><?php }?>
             
          </div>
          <div class="clear"></div>
          <div class="light-bord"></div>
        </section>		
				
		<?php		
			}
		?>
        <div class="clear"></div>
      </section>
