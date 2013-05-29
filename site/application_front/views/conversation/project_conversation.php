<script language="javascript">
function contact_professional(ProfessionalId){
window.open("<?php echo $this->config->base_url();?>search/sendmessage/?ProfessionalId="+ProfessionalId,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;
}
</script>

<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <nav class="clearfix">
    <ul class="clearfix">
      <li><a href="<?php echo $this->config->base_url();?>client/show_home">Profile</a></li>
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
    <div class="tableDiv1 proposals2">
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
             <td><p><? if($present_user_id ==  $conversation[$i]['sender_id']){ ?>You <? }else{ if($sender_type=="Client"){?> Proffessional <?}else{?> Client <?} } ?>&nbsp; >> &nbsp;<?php echo $conversation[$i]['text_message']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$conversation[$i]['date'] ?><br><? if($conversation[$i]['attachment']){?>attachments: <a href="<? echo $attachment_path.$conversation[$i]['attachment'];?>"><? echo $conversation[$i]['attachment'];?></a><? }?></p></td>
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
	<textarea rows="4" cols="122" name="text_message" placeholder="some text..........."></textarea>
	<input type="file" name="atchmnt1">
	<input type="submit" name="send_text" value="Send">
	</form>
    <div class="drop-shadow"><img src="images/drop-shadow.png"  height="11" alt="" border="0"></div>
  </div>
</section>
<div class="clear"></div>
