<div class="first-sec">
        <section class="icon-sec1-Total">
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon1.png" width="18" height="20" alt="" border="0"></div>
          <div class="l-iconR">Posted: <?=$project_details[0]->post_date?> </div>
          <div class="clear"></div>
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon2.png" width="19" height="20" alt="" border="0"></div>
          <div class="l-iconR">Location: Anywhere</div>
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
        </section>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <section class="second-sec">
        <div class="second-sec-bord">
          <div class="sm-pic"><img src="<?php echo css_images_js_base_url();?>images/sm-pro-pic.jpg"  alt="" border="0"></div>
          <div class="sm-picR">
            <h1><?=$project_details[0]->client_name;?> </h1>
            <div class="clear"></div>
            <p><span><img src="<?php echo css_images_js_base_url();?>images/flag.jpg" width="16" height="11" alt="" border="0"></span> Thiland </p>
          </div>
          <div class="clear"></div>
        </div>
        <div class="second-sec-cont">
          <?=$project_details[0]->project_description;?>
          <div class="desire-skill">Desires Skills</div>
          <p class="micro">Microsoft Access Administration, MySQL Administration, PHP</p>
          <div class="clear"></div>
          <?php if($project_details[0]->project_filename!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/project_files/'.$project_details[0]->project_filename);?>"> <?php echo $project_details[0]->project_filename;?></a></span><div class="clear"></div><?php }?>
        </div>
        <section class="grey-Div">Job ID:123456</section>
        <div class="clear"></div>
      </section>
 <form name="form2" id="form2">
    <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_details[0]->project_id;?>">        
 </form>     
