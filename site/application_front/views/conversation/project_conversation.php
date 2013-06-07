<script language="javascript">
function contact_professional(ProfessionalId){
window.open("<?php echo $this->config->base_url();?>search/sendmessage/?ProfessionalId="+ProfessionalId,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;
}
</script>

<script type="text/javascript">
 function getFile(){
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }
</script>

<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <nav class="clearfix">
    <ul class="clearfix">
      <li><a href="<?php echo $this->config->base_url();?>client/view_profile">Profile</a></li>
      <li><a href="<?php echo $this->config->base_url();?>client/show_home">Account</a></li>
      <li><a href="<?php echo $this->config->base_url();?>client/proposal_list">Projects</a></li>
      <li class="last"><a href="#">Realistic Previews</a></li>
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box">
    <div class="box-head4">
      <h1>Conversation</h1>
      <div class="clear"></div>
    </div>
    <div class="tableDiv1 proposals2 lowspace">
    <?php if($conversation){ //print_r($proposals_data); ?>
        <table>
          <thead>
            <tr>
              <th width="25%">&nbsp;</th>
             
            </tr>
          </thead>
          <tbody>
          	<?php for($i=0;$i<count($conversation);$i++){ ?>
            <tr>
             <td>
             
             <p><? if($sender_id ==  $conversation[$i]['sender_id']){ echo '<span><img src="'.css_images_js_base_url().'images/comment1.png" name="Image18" alt=""></span>'.$sender_name." [You]"; }else{ if($sender_type=="Client"){ echo '<span><img src="'.css_images_js_base_url().'images/comment.png" name="Image18" alt=""></span>'.$receiver_proffessional_details['ProfessionalFirstname']." ".$receiver_proffessional_details['ProfessionalLastname']." [proffessional]"; }else{ echo '<span><img src="'.css_images_js_base_url().'images/comment.png" name="Image18" alt=""></span>'.$receiver_client_details['ClientFirstname']." ".$receiver_client_details['ClientLastname']." [client]";} } ?>&nbsp;
			 <span class="midlealigne"><img src="<?php echo css_images_js_base_url();?>images/aero.png" name="Image18" alt=""></span> 
			 &nbsp; <?php echo $conversation[$i]['text_message']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$conversation[$i]['date'] ?>
			 <span class="attachment"><? if($conversation[$i]['attachment']){?><strong>&nbsp; &nbsp; &nbsp; &nbsp; Attachments:</strong> <a href="<? echo $attachment_path.$conversation[$i]['attachment'];?>"><? echo $conversation[$i]['attachment'];?></a><? }?></span>
			 </p>
			 </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }else{ ?>
      	No Conversation started  Yet ! ! ! !
      <?php } ?>
    </div>
	 <div class="clear"></div><br>
	<form name="conversation" action="<?=$project_conversation_submit_link ;?>" enctype="multipart/form-data" method="post">
	<input type="hidden" name="project_id" value="<?=$project_id?>">
	<input type="hidden" name="receiver_id" value="<?=$receiver_id?>">
	<input type="hidden" name="sender_id" value="<?=$sender_id?>">
	<input type="hidden" name="sender_type" value="<?=$sender_type?>">
	<textarea class="conv-textfield" rows="" cols="" name="text_message" placeholder="some text..........."></textarea>
	<!--<input type="file" name="atchmnt1">-->
    <div class="upload-btn">
    
    <input type="submit" name="send_text" value="Send" class="inputsend">
    
    	<div id="yourBtn" onclick="getFile()">Upload file</div>
   		<div style='height: 0px; width: 0px;overflow:hidden;'>
                            <input id="upfile" type="file" name="atchmnt1" value="upload" onchange="sub(this)"/>
                            </div>
                            
                          
    </div>
    
   
	
    <div class="clear"></div>
	</form>

  </div>
</section>
<div class="clear"></div>
