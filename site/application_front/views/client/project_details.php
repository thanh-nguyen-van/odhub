<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <nav class="clearfix">
    <ul class="clearfix">
      <li><a href="<?php echo $this->config->base_url(); ?>client/edit_profile">My Account</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_home">My Home</a></li>
      <li class="last"><a href="<?php echo $this->config->base_url();?>client/project_list">My Projects</a></li>
      <!--<li class="last"><a href="#">Realistic Previews</a></li>-->
    </ul>
    <a href="#" id="pull">Menu</a> </nav>


<?php if($project_details){ //print_r($project_details); ?>
<div class="Total-Div-Box-pro">
<h1><?php echo $project_details[0]->project_name ?></h1>

<div class="share"><a href="mailto:emailaddress">Share</a></div>

<aside class="leftCol-pro1">

	<div class="first-sec1">

	<section class="icon-sec1-Total">
    	<div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon1.png" width="18" height="20" alt="" border="0"></div>
    	<div class="l-iconR">Posted: <?=$project_details[0]->post_date?> </div>
        <div class="clear"></div>
        <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon2.png" width="19" height="20" alt="" border="0"></div>
        <div class="l-iconR">Location: INDIA</div>
        <div class="clear"></div>
        <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon3.png" width="20" height="19" alt="" border="0"></div>
        <div class="l-iconR">Start: Immediately </div>
            
            
            <div class="clear"></div>
            
    </section>
    
    
    <section class="icon-sec2-Total">
            <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon4.png" width="20" height="13" alt="" border="0"></div>
            <div class="l-iconR">Budget: $<?=$project_details[0]->start_price?></div>
            <div class="clear"></div>
            <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon5.png" width="16" height="20" alt="" border="0"></div>
            <div class="l-iconR"><?=$project_details[0]->job_type;?></div>
            <div class="clear"></div>
            <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon6.png" width="18" height="20" alt="" border="0"></div>
            <div class="l-iconR"><?=$project_details[0]->w9_status;?></div>
                
                
                <div class="clear"></div>
                
        </section>
        
<div class="clear"></div>
        </div>
<div class="clear"></div>

<section class="second-sec1">

<div class="second-sec-bord1">
  <div style="font-size:16px; font-weight:bold">Project Details</div>
  <div class="clear"></div>
</div>


<div class="second-sec-cont">

<p><?php echo $project_details[0]->project_description ?></p>

<?php //print_r($project_skill_data); ?>

<div class="desire-skill">Desires Skills</div>

<p class="micro">
<?php 
	foreach($project_skill_data as $each_project_skill){
		echo $each_project_skill->skill_name . ', ';
	} 
?>
</p>

<div class="clear"></div>
<?php if($project_details[0]->project_filename!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/project_files/'.$project_details[0]->project_filename);?>"> <?php echo $project_details[0]->project_filename;?></a></span><div class="clear"></div><?php }?>
</div>


<section class="grey-Div1">Job ID: <?php echo $project_details[0]->project_id ?></section>


<div class="clear"></div>
</section>



<div class="clear"></div>
</aside>





<div class="clear"></div>
</div>
<?php } ?>

<div class="clear"></div>


<div class="drop-shadow-1"><img src="<?php echo css_images_js_base_url();?>images/drop-shadow.png" alt="" width="839" height="11" border="0"></div>
</section>
<div class="clear"></div>