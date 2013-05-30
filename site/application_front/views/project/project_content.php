<?php
foreach($data_result as $result){
	
?>
<div class="total-right-pro-Div">

<section class="rightCol-R">
<div class="box-head-proR">
        <h1><?php echo $result->project_name; ?>
        
        <span><a href="<?php echo site_url('project/details?projectid='.$result->project_id); ?>">Bid Here<?php //echo $result->project_type_txt; ?></a></span>
        
        </h1>
    
    </div>
     <div class="clear"></div>
 <div class="box-head-grey">
 <ul>
     <li><span><?php echo $result->job_type; ?>:</span> <p>$<?php echo $result->start_price; ?></p></li>
 <li>Posted:20 minutes ago</li>
 <li>0 Proposals
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
 </section>
    

 <div class="clear"></div>

</section>



</div>
<?php
}
?>