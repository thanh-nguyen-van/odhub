<?php

foreach($data_result as $result){
	
?>
<div class="total-right-pro-Div">

<section class="rightCol-R">
<div class="box-head-proR">
        <h1><?php echo $result->project_name; 
        $awardstatus  = $this->model_project->checkProjectAward($result->project_id);
		if(empty($awardstatus)){
		?>
        <span><a href="<?php echo site_url('project/details?projectid='.$result->project_id); ?>">Bid Here<?php //echo $result->project_type_txt; ?></a></span>
        <?}else{?>
		 <span style="text-decoration:none;">Project Awarded</span>
		 <? }?>
        </h1>
    
    </div>
     <div class="clear"></div>
 <div class="box-head-grey">
 <ul>
     <li><span><?php echo $result->job_type; ?>:</span> <p>$<?php echo $result->start_price; ?></p></li>
	 
 <li>Posted: <?=date("d-M-Y", strtotime($result->post_date));?></li>
 <li><? $proposal = $this->model_project->projectlist($result->project_id); if(!empty($proposal)) echo $proposal['proposal']." Proposal"; else "0 Proposal";?>
 </li>
 </ul>
 
 
 <div class="clear"></div>
 </div>   
 
 
 <section class="rightCol-Boxmid">
 
 <article>
 <?php echo $result->project_description; ?>
 
 </article>
 
 <div class="cat">Category: <span><?php echo $result->project_category; ?></span></div>
 
 
 <?php
 $skill_set = Project::getSkillInfo($result->project_id);
 ?>
 
 
 <div class="skills">Skills: <span><?php echo $skill_set;?></span></div>
 
 <div class="clear"></div>
 
 <div class="bottom-glagDiv">
 <ul>
     <li><?php echo $result->cl_name; ?></li>
    <li><span><img src="images/flag.jpg" width="16" height="11" alt="" border="0"></span><?php echo $result->StateName; ?></li>
 
 </ul>
     
 
 </div>
 
  <div class="clear"></div>
  <?php if($result->project_filename!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/project_files/'.$result->project_filename);?>"> <?php echo $result->project_filename;?></a></span><div class="clear"></div><?php }?>
 </section>
    

 <div class="clear"></div>

</section>



</div>
<?php
}
?>
<?php
//echo $present_selection;
$number_of_pagination =floor($number_of_project/25);
$remaining = $number_of_project%5;
if($remaining>0){
	$number_of_pagination = $number_of_pagination + 1;
}
?>
<div id="tnt_pagination">
<?php
if($present_selection == NULL){
	$present_selection = 0;
}
?>
<?php
if($present_selection != 0){
?>
<a href="#previous" onclick="return prevpage();">Prev</a>
<!--<span class="disabled_tnt_pagination" onclick="return prevpage();">Prev</span>-->
<?php
}
?>
<?php
for($i=0;$i<$number_of_pagination;$i++){
	if($i==$present_selection){
?>		
<span class="active_tnt_link"><?php echo $i+1;?></span>
<?php
	}
	else{
?>

	<a href="#<?php echo $i+1;?>" onclick="return set_page(<?php echo $i;?>)"><?php echo $i+1;?></a>
<?php
	}
}
?>

<?php
if($present_selection != $i-1){
?>
<a href="#forwaed" onclick="return nextpage();">Next</a>
<?php
}
?>
</div>