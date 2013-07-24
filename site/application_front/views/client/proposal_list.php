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

            <li><a href="<?php echo $this->config->base_url(); ?>client/show_home">My Home</a></li>
			 <li><a href="<?php echo $this->config->base_url(); ?>search">Search Professionals</a></li>
      <li class="last"><a href="<?php echo $this->config->base_url();?>client/project_list">My Projects</a></li>
	   <li class="rightalign"> <a href="<?php echo $this->config->base_url(); ?>client/edit_profile">My Account</a></li>

<!--      <li class="last"><a href="#">Realistic Previews</a></li>-->
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box">
    <div class="box-head4">
      <h1>proposal view</h1>
      <div class="clear"></div>
    </div>
    <div class="tableDiv1 proposals2">
    <?php if($proposals_data){ //print_r($proposals_data); ?>
        <table>
          <thead>
            <tr>
              <th width="25%">Professional Name</th>
              <th width="20%">Skills Set</th>
              <th width="30%">Proposal Description</th>
              <th width="10%">Attachment</th>
              <th width="05%">Budget</th>
              <th width="13%" style="border-right:0;"></th>
            </tr>
          </thead>
          <tbody>
          	<?php
			
			foreach($proposals_data as $each_proposal){ ?>
            <tr>
              <form name="awardform" id="awardform<?=$each_proposal->proposal_id?>" action="<?=$award_submit_link?>" method="post">
              <input type="hidden" name="professionalid" id="professionalid" value="<?=$each_proposal->ProfessionalId?>" />
              <input type="hidden" name="proposalid" id="proposalid" value="<?=$each_proposal->proposal_id?>" />
              <input type="hidden" name="projectid" id="projectid" value="<?=$project_id?>" />
              <td class="bold3"><p><?=$each_proposal->fullname?> (<?=$each_proposal->StateName?>)</p></td>
              <td><p><?=$professional_skills?></p></td>
              <td><p><?=$each_proposal->proposal_description?></p></td>
              <td align="center"><p>
                  <?php if($each_proposal->attachment!=''){?>
                      <a href="<?php echo site_url('../upload/porposal_files/'.$each_proposal->attachment);?>"><?php echo $each_proposal->attachment;?>  </a>
                  <?php }else{echo "No Attachment";}?></p></td>
              <td class="bold3">$<?=$each_proposal->price?></td>
              <td class="pdngTop" style="border-right:0;">
              <?php if($each_proposal->awords == 0){ 
			  $projectaword = $this->model_project->checkProjectAward($project_id);
			  if(empty($projectaword)){
			  ?>
			  
              <span class="prop-btn"><a href="#" onclick="document.getElementById('awardform<?=$each_proposal->proposal_id?>').submit();">Award</a></span>
              <?php } }?>
              </td>
              </form>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }else{ ?>
      	No Proposal Posted Yet ! ! ! !
      <?php } ?>
      <div class="clear"></div>
      <div class="showmore1">
        <ul>
          <li><a href="#">Show more</a></li>
        </ul>
      </div>
    </div>
    <div class="drop-shadow"><img src="<?php echo css_images_js_base_url();?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
  </div>
</section>
<div class="clear"></div>
