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
      <li><a href="<?php echo $this->config->base_url();?>client/project_list">Projects</a></li>
      <li class="last"><a href="#">Realistic Previews</a></li>
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box">
  
  
  <?php if($projects_data){ //print_r($projects_data);?>
  
  
    <div class="box-head2">
      <h1>My OD Projects </h1>
      <div class="clear"></div>
    </div>
    <div class="tableDiv2">
       <table>
		<thead>
		<tr>
          <th width="09%">Project</th>
          <th width="08%">Description</th>
          <th width="09%" style="border-right:0;">Proposals</th>
		</tr>
		</thead>
		<tbody>
        <?php foreach($projects_data as $each_project){ ?>
		<tr>
          <td class="bold2"><a href="<?php echo $this->config->base_url();?>client/project_details?projectid=<?=$each_project->project_id?>"><?=$each_project->project_name?></a></td>
          <td class="pdngTop">
          <p><?=substr($each_project->project_description,1,50)?>...</p>          
          <div class="more1"><a href="<?php echo $this->config->base_url();?>client/project_details?projectid=<?=$each_project->project_id?>">more..</a></div>
          </td>
          <td class="pdngTop" style="border-right:0;"><span class="org-btn"><a href="<?php echo ($each_project->bids==0) ? '#' : $this->config->base_url().'client/proposal_list?projectid='.$each_project->project_id ?>">view (<?=$each_project->bids?>)</a></span>&nbsp;&nbsp;<span class="org-btn"><a href="<?php echo $this->config->base_url().'project/post_project?projectid='.$each_project->project_id ?>">Edit</a></span>&nbsp;&nbsp;
          <span class="org-btn">
          <a href="<?php echo $this->config->base_url().'conversation/project_conversation?projectid='.$each_project->project_id ?>">Conversation</a>
          </span>
          <span class="org-btn">
          <a href="<?php echo $this->config->base_url().'payment/release?projectid='.$each_project->project_id ?>">Payment</a>
          </span>
          
          </td>
		</tr>
        <?php } ?>
		</tbody>
	</table>
      <div class="clear"></div>
      <div class="showmore1">
        <ul>
          <li><a href="#">Show more</a></li>
        </ul>
      </div>
    </div>
    <div class="drop-shadow"><img src="<?php echo css_images_js_base_url();?>images/drop-shadow.png" width="839" height="11" alt="" border="0"></div>
    
  <?php }else{ ?>
  
    <div>Sorry, No Project Posted Yet.</div>
  
  <?php } ?>
  </div>
</section>
<div class="clear"></div>
