<?php

if($project_details)
{ 
	$project_id			 = $project_details[0]->project_id; 
	$project_name		 = $project_details[0]->project_name; 
	$project_description = $project_details[0]->project_description; 
        $project_filename = $project_details[0]->project_filename; 
	$project_category	 = $project_details[0]->project_category; 
	$price_type			 = $project_details[0]->price_type; 
	$project_visibility	 = $project_details[0]->project_visibility; 
	$start_price1		 = ($price_type == 'Contract') ? $project_details[0]->start_price : '0.00';
	$start_price2		 = ($price_type == 'Hourly')   ? $project_details[0]->start_price : '0.00';
	$project_start		 = $project_details[0]->project_start;
	$project_start_date	 = date("m/d/Y", strtotime($project_details[0]->project_start_date));
}
else
{ 
	$project_id			 = set_value('project_id'); 
	$project_name		 = set_value('project_name'); 
	$project_description = set_value('project_description'); 
	$project_filename = set_value('project_filename'); 
	$project_category	 = set_value('project_category'); 
	$price_type			 = set_value('price_type'); 
	$project_visibility	 = set_value('project_visibility'); 
	$start_price1		 = set_value('start_price1') ? set_value('start_price1') : '0.00';
	$start_price2		 = set_value('start_price2') ? set_value('start_price2') : '0.00';
	$project_start		 = set_value('project_start'); 
	$project_start_date	 = set_value('project_start_date') == '' ? date("m/d/Y") : set_value('project_start_date');
}

?>
<script language="javascript" type="text/javascript">
    function enable_pricing(txtboxid,divid)
    {
        if(txtboxid.name=='start_price1')
        {
                document.getElementById("rad2").innerHTML="$ <span><input type='text' name='start_price2' name='start_price2' value='<?php echo $start_price2;?>' disabled ></span>";
                document.getElementById("rad1").innerHTML="$ <span><input type='text' name='start_price1' id='name='start_price1' value='<?php echo $start_price1;?>' ></span>";
                txtboxid.focus();
        }
        if(txtboxid.name=='start_price2')
        {
                document.getElementById("rad1").innerHTML="$ <span><input type='text' name='start_price1' name='start_price1' value='<?php echo $start_price1;?>' disabled  ></span>";
                document.getElementById("rad2").innerHTML="$ <span><input type='text' name='start_price2' id='name='start_price2' value='<?php echo $start_price2;?>' ></span>";
                txtboxid.focus();
        }
    }
</script>
<aside class="leftCol-post">
  <form name="projectPostForm" id="projectPostForm" action="<?php echo $post_project_submit_link ?>" enctype="multipart/form-data" method="post">
  	<?php if($project_id != ''){ ?>
    <input type="hidden" name="project_id" id="project_id" value="<?=$project_id?>" />
    <?php } ?>
    <div class="form-Div">
      <div class="name-your-job">
        <p>Name your project :</p> <input type="text" name="project_name" id="project_name" value="<?=$project_name?>" /> <?php echo form_error('project_name') ?>
        <div class="clear"></div>
        <span>75 characters left</span>
        <div class="clear"></div>
      </div>
      <div class="total-radioDiv">
        <div class="radio-btn"> <span><input type="radio" name="project_category" id="project_category1" value="1" <?php if($project_category == '1') echo "checked"; ?>></span> Leadership Coaching </div>
        <div class="clear"></div>
      </div>
      <div class="total-radioDivR">
        <div class="radio-btn1"> <span><input type="radio" name="project_category" id="project_category1" value="2" <?php if($project_category == '2') echo "checked"; ?>></span> Workshops, Facilitation and Assessments</div>        
         <?php echo form_error('project_category') ?>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <div class="describe">
        <p>Describe it:</p><textarea name="project_description" cols="" rows=""><?php echo $project_description ?></textarea> <?php echo form_error('project_description') ?><div class="clear"></div>
        <div class="layer1">
          <p class="heading">Add Attachment <img src="<?php echo css_images_js_base_url();?>images/small-plus.jpg" width="9" height="9" alt="" border="0"></p>
          <div class="content"><input type="file" name="atchmnt" id="atchmnt"></div>
          <?php if($this->input->get('projectid')){?> <?php if($project_filename!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/project_files/'.$project_filename);?>"> <?php echo $project_filename;?></a></span><div class="clear"></div><?php }?><?php }?>
        </div>
        <div class="expR">4000 charecters left</div>
        <div class="clear"></div>
        <div class="req-skills">
          <p>(optional)<span>Request specific skills or needs </span></p>
          <?php $i=0; foreach($project_skills_data as $each_project_skill){ ?>
            <div class="chkDiv">
            <span><input type="checkbox" name="skills[]" id="skills<?=$i?>" value="<?=$each_project_skill->pr_skill_id?>" 
				  <?php if(isset($skill_inputs[$each_project_skill->pr_skill_id]) == $each_project_skill->pr_skill_id) echo "checked"; ?>></span> <?=$each_project_skill->skill_name?>
            </div>
          <?php $i++; } ?>          
          <?php echo form_error('skills') ?>
          <div class="clear"></div>
        </div>
        <div class="total-priceG">
          <p>Pricing:</p>
          <div class="clear"></div>
          <div class="icG"><input type="radio" name="price_type" id="price_type1" value="Contract" <?php if($price_type == 'Contract') echo "checked"; ?> onclick="enable_pricing(start_price1,rad1)"></div>
          <div class="ic-pG">Maximum Contract Value </div> <div class="dollarG" id="rad1">$ <span><input type="text" name="start_price1" id="start_price1" value="<?=$start_price1?>" disabled="true" /></span></div>
          <div class="clear"></div>
        </div>
        <div class="total-priceG">
          <div class="icG"><input type="radio" name="price_type" id="price_type2" value="Hourly" <?php if($price_type == 'Hourly') echo "checked"; ?> onclick="enable_pricing(start_price2,rad2)"></div>
          <div class="ic-pG">Hourly</div> <div class="dollarG" id="rad2">$ <span><input type="text" name="start_price2" id="start_price2" value="<?=$start_price2?>" disabled="true" /></span></div>
          <div class="clear"></div>
        </div>
        Statename : 
        <select id="state" name="state">
		<?php
        
			for($i=0;$i<count($state_data);$i++){
		?>
        <option value="<?php echo $state_data[$i]->StateId;?>"><?php echo $state_data[$i]->StateName;?></option>
        <?php
			}
		?>
        </select>
        <br />
          Project Type : 
        <select id="project_type_id" name="project_type_id">
		<?php
        
			for($i=0;$i<count($projecttype);$i++){
		?>
        <option value="<?php echo $projecttype[$i]->project_type_id;?>"><?php echo $projecttype[$i]->project_type_txt;?></option>
        <?php
			}
		?>
        </select>
                	
                
        <div class="clear"></div>
        <div class="locationDiv">
          <div class="locationDivP">Location, Visibility and Other Options -</div>
          <div class="show-hide">
            <div class="layer1-a">
              <p class="heading-a">Show</p>
              <div class="content-a">
                <h3>Job Posting Visibility</h3>
                <div class="publicTotal">
                  <p><span><input type="radio" name="project_visibility" id="project_visibility1" value="P" <?php if($project_visibility == 'P') echo "checked"; ?>>
                  </span>Public- Visible to everyone</p>
                  <!--<div class="pub-sub"> <span><input name="" type="checkbox" value=""></span>Get more proposals. </div>-->
                  <div class="clear"></div>
                </div>
                <div class="publicTotal">
                  <p><span><input type="radio" name="project_visibility" id="project_visibility2" value="I" <?php if($project_visibility == 'I') echo "checked"; ?>>
                  </span>Invite only - Do not show list.Only candidates I invite can respond.</p>
                  <div class="clear"></div>
                </div>
                <!--<h3>Prefered Candidate Location</h3>
                <div class="publicTotal">
                  <p><span><input name="" type="checkbox" value=""></span>I prefered candidate from certain location(s).</p>
                  <div class="clear"></div>
                </div>
                <h3>Post This Job For</h3>
                <div class="dr-2"> <span>
                  <div class="dropdown-d2"> <a class="account-d2" > <span>15 days</span> </a>
                    <div class="submenu-d2" style="display: none; ">
                      <ul class="root">
                        <li > <a href="#Dashboard">Dashboard</a> </li>
                        <li > <a href="#Profile">Profile</a> </li>
                        <li > <a href="#settings">Settings</a> </li>
                        <li> <a href="#feedback">Send Feedback</a> </li>
                        <li> <a href="#signout">Sign Out</a> </li>
                      </ul>
                    </div>
                  </div>
                  </span></div>-->
                <div class="clear">
                
                </div>
                <h3>Propopsed Start Date</h3>
                <div class="publicTotal">
                  <p><span><input type="radio" name="project_start" id="project_start1" value="I" <?php if($project_start == 'I') echo "checked"; ?>></span>
                  Start immediately after proposal is selected.</p>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="calD-total">
                  <div class="radio-sec"> <span><input type="radio" name="project_start" id="project_start2" value="L" <?php if($project_start == 'L') echo "checked"; ?>>
                  </span>Job will start on </div>
                  <div class="calDiv" style="position:relative;">
                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
				  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
                  <link rel="stylesheet" href="/resources/demos/style.css" />
                  <script> $(function() { $( "#project_start_date" ).datepicker(); }); </script>
                    <input type="text" name="project_start_date" id="project_start_date" value="<?=$project_start_date?>" />
                    <div gldp-el="mydate2" style="width:260px; height:160px; position:absolute; top:70px; left:30px;"> </div>
                    <span class="calDiv-icon"><img src="<?php echo css_images_js_base_url();?>images/calendar.png" width="18" height="17" alt="" border="0"></span>
                    <div class="clear"></div>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="continue-btn"><a href="#" onclick="document.getElementById('projectPostForm').submit();">continue</a></div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </form>
  <div class="clear"></div>
</aside>
