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
                        //alert(ajaxRequest.responseText);
                        if(ajaxRequest.responseText==1)
                            {
								ajaxDisplay.innerHTML = "Project referred successfully.";
                            }else{
                               ajaxDisplay.innerHTML = "Project already referred to this professional."; 
                            }
		
		}
	}
	//var age = document.getElementById('age').value;
	//var wpm = document.getElementById('wpm').value;
	//var sex = document.getElementById('sex').value;
	var queryString = referal_user_id + "/" + project_id+"/" + proposal_id;
	ajaxRequest.open("GET", "<?php echo base_url()?>professional/refer_user/" + queryString, true);
	ajaxRequest.send(null); 
    }
	
	
	function UpdateLookingStatus(elem)
    {
      
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
                        if(ajaxRequest.responseText==1)
						{	
								if(elem==1)
									alert("You are now searchable as Coach");
								else
									alert("You are now searchable as Expert"); 
								location.reload(); 
                            }else{
                               alert("Something goes wrong from the server side.");
                            }
		
		}
	}
	ajaxRequest.open("GET", "<?php echo base_url()?>professional/updateLookingstatus/" + elem, true);
	ajaxRequest.send(null); 
    }
	
	
	
	function show_client_info(ClientID){
	window.open("<?php echo $this->config->base_url(); ?>client/show_profile?client_id=" + ClientID, 'sendmessage', 'height=500,width=500,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
	}
	 function view_invoice(value) {
        window.open("<?php echo $this->config->base_url(); ?>professional/showinvoice/?invsid=" + value, 'sendmessage', 'height=220,width=600,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }	
       
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
            <li ><a href="<?php echo $this->config->base_url(); ?>invoice">Create Invoices</a></li>
<!--			<li><a href="<?php echo $this->config->base_url(); ?>professional/review/">Realistic Previews</a></li>	-->		
            <li><a target="_blank" href="<?php echo $this->config->base_url(); ?>../forum/">OD Hub Forums</a></li>
            <li class="last"><a href="<?php echo $this->config->base_url('professional/message'); ?>" <? if($number_of_unread_message>0){ ?>style="color:red;" <?}?>>Inbox(<?=$number_of_unread_message?>)</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
        

    <div class="Total-Div-Box">
        <div class="box-head">
            <h1>MY ACCOUNT (PROFESSIONAL) <span><a href="<?php echo $this->config->base_url(); ?>professional/review/">OD Hub Previews =  <?if(isset($average_review)) echo $average_review; else echo "0";?> </a></span> </h1>
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
                    <h1><a href="<?php echo site_url('professional/edit_profile'); ?>">Edit Profile</a></h1>

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
								if(isset($country_data['Country']))
                                echo $state_data['StateName'];
                            }
                ?> </span></p>
                    <p>Zip code : <span> <?php echo $prof_data['ProfessionalZipcode'] ?> </span></p>
                </div>
                <div class="editSec1">
                    <p>REFERRAL CODE: <span><?php echo $prof_data['referral_code']; ?></span></p>
                    <p>Unique Referral Code Link For Professional : <span><a href="<?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?>"><?php echo base_url("login/prof_signup/?code=" . $prof_data['referral_code']); ?></a></span> </p>
                    
                    <p>Unique Referral Code Link For Client : <span><a href="<?php echo base_url("login/signup/?code=" . $prof_data['referral_code']); ?>"><?php echo base_url("login/signup/?code=" . $prof_data['referral_code']); ?></a></span> </p>
                    
                    <p>Send email: <span class="send-btn"><a href="javascript:void(0);" onclick='window.open("<?php echo base_url("professional/popUpEmail/?code=".$prof_data['referral_code']);?>","_blank","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=350, height=400");'>Click</a></p>
                    
                    <p><a target="_blank" href="<?php echo file_upload_base_url().'professionalw9/'.$prof_data['w9Image'];?>">Download file W-9</a></p>
                    <p>&nbsp;</p>
                </div>
                <div class="company-im"><a href="#"><img src="
				<?php
                if ($prof_data['company_logo']) {
                    echo file_upload_base_url() . 'userimages/' . $prof_data['company_logo'];
                } else {
                    echo css_images_js_base_url() . 'images/comp-im.jpg';
                }
                ?>
				" width="134" height="134" alt="" border="0"></a></div>
                <div class="clear"></div>
               
            </div>
            
            <div class="clear"></div>
            
            
           <? if($prof_data['s_professional_looking_status_id'] =='' && empty($search_status)){?> 
          <div class="total-2btns">
            	<div class="left-Btn"><a href="<?=base_url('professional/Searchable/1')?>" >BECOME SEARCHABLE AS A COACH</a></div>
                <div class="right-Btn"><a href="<?=base_url('professional/Searchable/2')?>" >BECOME SEARCHABLE FOR YOUR OD EXPERTISE</a></div>
                
                <div class="clear"></div>
          </div>
            
            <? } ?>
            
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png" alt="" border="0"></div>
    </div>
    <div class="Total-Div-Box">
        <div class="box-head1">
            <h1>MY Clients <span><strong>NOTE:</strong> You must fax or email all client agreements from OD Hub referred clients. Fax to 
                    888-888-8888 or email to <a href="#">agreements@TheODHub.com</a></span> </h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv">
            <table>
                <thead>
                    <tr>
                        <th width="9%">First , Last</th>
                        <th width="8%"> Email </th>

                        <th width="9%">Amount $</th>
      
                        
                         <th width="11%">Send Invoice </th>
                        <th width="10%" style="border-right:0;">Agreement </th>
                    </tr>
                </thead>
                <tbody> <?php 

				for($i=0;$i<count($awarded_projects_details);$i++){?>
                       <tr>
                        <td class="pdng"><a href="<?php echo base_url('client/show_profile/')?>?client_id=<?php echo $awarded_projects_details[$i]['ClientId'];?>" onclick="return show_client_info(<?php echo $awarded_projects_details[$i]['ClientId'];?>);"><?php echo $awarded_projects_details[$i]['ClientFirstname'].$awarded_projects_details[$i]['ClientLastname'];  ?></a></td>
                        <td class="pdng"><?php echo $awarded_projects_details[$i]['ClientEmail'];?> </td>

                        <td class="pdng"><?php echo $awarded_projects_details[$i]['price'];?></td>  
						
                       
                        
						 <?php $checkIfinvoiceSend = Professional::checkIfinvoiceSend($awarded_projects_details[$i]['project_id']);
						  if(empty($checkIfinvoiceSend)){?>
						  <td class="pdng"><span class="send-btn">
						
						<a href="<? echo $this->config->base_url(); ?>professional/send_invoice?projectid=<?=$awarded_projects_details[$i]['project_id']?>">Send</a></span>
							</td>
						<?php }else{ echo "<td>Invoice send</td>"; } ?>
					
                        <td class="pdng" style="border-right:0;"><span class="send-btn"><a href="#">View</a></span></td>
                    </tr>
					<?php } ?>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore">
                <ul>
                    <li><a href="#">Show more</a></li>
                    <li><a href="#">Manually Add Clients</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
	<div class="Total-Div-Box">
        <div class="box-head1">
            <h1>Previews <span></h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv">
            <table>
                <thead>
                    <tr>
                        <th width="15%">Project Name</th>
                        

                        <th width="15%">Client</th>
      
                        
                         <th width="15%">Description </th>
                        <th width="15%" style="border-right:0;">Date </th>
                    </tr>
                </thead>
                <tbody> <?php 
				if(!empty($review_details)){
				for($i=0;$i<3;$i++){?>
                       <tr>
                        <td class="pdng"><? echo $review_details[$i]['project_name'];?></td>
							<td class="pdng"><? echo $review_details[$i]['client_name'];?></td> 
					 <td class="pdng"><? echo substr($review_details[$i]['review'],0,50);?></td>
					 <td class="pdng"><? echo $review_details[$i]['rv_date'];?></td>
	           
                    </tr>
					<?php
					} 

						}
					?>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore">
                <ul>
                    <li><a href="<?=base_url('professional/review')?>">Show more</a></li>
                   
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
    
    <div class="Total-Div-Box">
        <!--<form name="refer_form" id="refer_form" action="<?php echo base_url();?>/professional/refer_user" method="post" enctype="multipart/form-data">-->

        
        <div class="box-head1">
            <h1>My Awarded Projects</h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv1">
            <div class="" id="ajaxDiv" ></div>
            <table>
<?php if ($nr_awarded_projects <> 0) { ?>

                    <tr>
                        <th width="9%"> Client</th>
                        <th width="8%"> Project </th>
                        <th width="9%">Amount</th>
                       <!-- <th width="9%">Refer</th>-->
                        <th width="9%">Delivery Date</th>
                        <th width="11%" style="border-right:0;"> Conversation</th>
                    </tr>


    <?php foreach ($awarded_projects->result() as $eachResultRow) { ?>


                        <tr>
                            <td class="pdngTop"><?php echo $eachResultRow->ClientFirstname." ".$eachResultRow->ClientLastname; ?> </td>
                            <td class="pdngTop"><?php echo $eachResultRow->project_name;?> </td>
                            <td class="pdngTop"><?php echo $eachResultRow->price;?> USD </td>
                            <!--<td class="pdngTop">
                                        <?php $referer = Professional::checkIfReferred($eachResultRow->project_id);
                                        if($referer->num_rows()==1){
                                        ?>
                                <select name="refer_id[]" id="refer_id"  >
                                            <option value="">--Select--</option>
                                            <?php foreach($my_referal->result() as $eachReferal){?>
                                            <option value="<?php echo $eachReferal->ProfessionalId;?>"><?php echo $eachReferal->ProfessionalFirstname." ".$eachReferal->ProfessionalLastname;?></option>
                                            <?php }?>
                                        </select>
                                
                                <input type="button" class="prof_butt_cls" name="ref_butt_<?php echo $eachResultRow->project_id; ?>" id="ref_butt_<?php echo $eachResultRow->project_id; ?>" value="Refer" onclick="javascript:assignval(refer_id.value,<?php echo $eachResultRow->project_id; ?>,<?php echo $eachResultRow->proposal_id; ?>)">
                                    <?php }else{ $arr = $referer->row_array();echo $arr['ProfessionalFirstname']." ".$arr['ProfessionalLastname'];}?>
                            </td>-->
                            <td class="pdngTop"><?php echo date('Y-m-d', strtotime($eachResultRow->dalivery_date));?></td>
                            <td class="pdngTop" style="border-right:0;"><span class="send-btn">  <a href="<?php echo $this->config->base_url().'conversation/project_conversation?projectid='.$eachResultRow->project_id; ?>">Conversation</a></span></td>
                        </tr>
                    <?php
                    }
                    ?>
                        <div class="clear"></div>
<!--            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>-->
                        <?php
                } else {
                    ?>
					<tr>
                        <th width="9%"> Client</th>
                        <th width="8%"> Project </th>
                        <th width="9%">Amount</th>
                       <!-- <th width="9%">Refer</th>-->
                        <th width="9%">Delivery Date</th>
                        <th width="11%" style="border-right:0;"> Conversation</th>
                    </tr>
                   
<?php }
?>
                </tbody>
            </table>
            
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
        <!--</form>-->
    </div>
   
    <div class="Total-Div-Box">
        <div class="box-head1">
            <h1>My Invoices </h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv3">
            <table>
                <thead>
                    <tr>
                      
                        <th width="15%"> Due Date </th>
                        <th width="15%"> Invoice# </th>
                        <th width="13%"> Amount $ </th>
                     
                        <th width="12%">Client </th>
                        <th width="18%" style="border-right:0;">Send reminder</th>
                    </tr>
                </thead>
                <tbody>
                   <?
				 
				   for($i=0;$i<count($invoice_details);$i++){ ?>
                    <tr>
                        <td class="pdngTop"><? echo date('Y-m-d',strtotime($invoice_details[$i]['cr_date']));?></td>
                       
                        <td class="pdngTop"><a href="#" onclick="return view_invoice('<?=$invoice_details[$i]['invoice_number']?>')"><?=$invoice_details[$i]['invoice_number']?></a></td>
                        <td class="pdngTop"> <?=$invoice_details[$i]['amount']?></td>
                      
                        <td class="pdngTop"><?=$invoice_details[$i]['ClientFirstname']." ".$invoice_details[$i]['ClientLastname']?></td>
                        <td class="pdngTop" style="border-right:0;"><span class="send-btn"><a href="mailto:<?=$invoice_details[$i]['ClientEmail']?>">Send Reminder</a></span></td>
                    </tr>
                    <? } ?>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
	 <!--<div class="Total-Div-Box">
        <div class="box-head1">
            <h1>My OD HUB Account </h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv2">
            <table>
                <thead>
                    <tr>
                        <th width="16%">Date</th>
                        <th width="21%"> Type </th>
                        <th width="16%">Amount $ </th>
                        <th width="16%"> Source </th>
                        <th width="13%">Client </th>
                        <th width="18%" style="border-right:0;">Method</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pdngTop">12/5/12 </td>
                        <td class="pdngTop">Proffessional Referal Paid </td>
                        <td class="pdngTop"> $25 </td>
                        <td class="pdngTop">OD Hub </td>
                        <td class="pdngTop">OD Hub </td>
                        <td class="pdngTop" style="border-right:0;">Commission Payment</td>
                    </tr>
                    <tr>
                        <td class="pdng">12/5/12 </td>
                        <td class="pdng">Proffessional Referal Paid </td>
                        <td class="pdng"> $25 </td>
                        <td class="pdng">OD Hub </td>
                        <td class="pdng">OD Hub </td>
                        <td class="pdng" style="border-right:0;">Commission Payment</td>
                    </tr>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore">
                <ul>
                    <li><a href="#">Show more</a></li>
                    <li><a href="#">Manually Add Clients</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png" width="839" height="11" alt="" border="0"></div>
    </div>-->
	
   <!-- <div class="Total-Div-Box">
        <div class="box-head1">
            <h1>My Realistic Previews</h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv4">
            <table>
                <thead>
                    <tr>
                        <th width="16%">CLIENT FIRST, LAST </th>
                        <th width="21%"> PREVIEW </th>
                        <th width="16%" style="border-right:0;">RESPOND </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pdngTop">Kate More</td>
                        <td class="pdngTop"><a href="#">No Preview</a></td>
                        <td class="pdngTop" style="border-right:0;"><span class="send-btn"><a href="#">Active</a></span></td>
                    </tr>
                    <tr>
                        <td class="pdng">Kate More</td>
                        <td class="pdng"><span class="pdngTop"><a href="#">See Preview</a></span></td>
                        <td class="pdng" style="border-right:0;"><span class="send-btn"><a href="#">Edit Responce</a></span></td>
                    </tr>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
-->
<!--  By manish                       -->
<?php
if (!empty($refferal_history)) {
    ?>
        <div class="Total-Div-Box">
            <div class="box-head1">
                <h1>My Referrals history</h1>
                <div class="clear"></div>
            </div>
            <div class="tableDiv5">
                <table>
                    <thead>
                        <tr>
                            <th width="16%">From User </th>
                            <th width="21%"> To User </th>
                            <th width="16%"> Amount</th>
                            <th width="16%"> Reedem Amount</th>
                            <th width="21%"> Date  </th>
                            
                        </tr>
                    </thead>
                    <tbody>
    <?php
    for($i=0;$i<count($refferal_history);$i++) {
        ?>
                            <tr>
                                <td class="pdngTop"><?php echo $refferal_history[$i]['from_user']; ?></td>
                                <td class="pdngTop"><?php echo $refferal_history[$i]['to_user']; ?></td>
                                <td class="pdngTop"><?php echo $refferal_history[$i]['amount']; ?></td>
                                <td class="pdngTop"><?php echo $refferal_history[$i]['redeem_commissoin']; ?></td> 
								<td class="pdngTop"><?php echo $refferal_history[$i]['date']; ?></td>
                               
                            </tr>
        <?php
    }
    ?>
                    </tbody>
                </table>
                <div class="clear"></div>
                <div class="showmore1">
                    <ul>
                        <li><a href="#">Show more</a></li>
                    </ul>
                </div>
            </div>
            <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
        </div>
    <?php
}
?>

<?php
if (!empty($Account_history)) {
    ?>
        <div class="Total-Div-Box">
            <div class="box-head1">
                <h1>My Account history</h1>
                <div class="clear"></div>
            </div>
            <div class="tableDiv5">
                <table>
                    <thead>
                        <tr>
                            <th width="16%"> From User </th>
                            <th width="21%"> To User </th> 
							<th width="21%"> Payment Type </th>
							<th width="16%"> Amount</th>
                            <th width="16%"> Earned Amount</th>
                            <th width="21%"> Date  </th>
                            
                        </tr>
                    </thead>
                    <tbody>
    <?php
    for($i=0;$i<count($Account_history);$i++) {
        ?>
                            <tr>
                                <td class="pdngTop"><?php echo $Account_history[$i]['from_user']; ?></td>
                                <td class="pdngTop"><?php echo $Account_history[$i]['to_user']; ?></td>
                                <td class="pdngTop"><?php 
								if($Account_history[$i]['commisison_type']=="direct_payment"){
								echo "Direct Payment";
								}elseif($Account_history[$i]['commisison_type']=="refer_client_commission"){
								echo "Client refferal payment";
								} ?></td>
                                <td class="pdngTop"><?php echo $Account_history[$i]['amount']; ?></td>
                                <td class="pdngTop"><?php echo $Account_history[$i]['redeem_commissoin']; ?></td> 
								<td class="pdngTop"><?php echo $Account_history[$i]['date']; ?></td>
                               
                            </tr>
        <?php
    }
    ?>
                    </tbody>
                </table>
                <div class="clear"></div>
                <div class="showmore1">
                    <ul>
                        <li><a href="#">Show more</a></li>
                    </ul>
                </div>
            </div>
            <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
        </div>
    <?php
}
?>

</section>
<div class="clear"></div>
