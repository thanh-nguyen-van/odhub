<?php
    $post_data = $this->input->post();
	//debugbreak();
?> 
<aside class="leftCol-projects">

<div class="block-btn">
	<span><a href="<?=base_url('project/')?>">Reset</a></span>
</div>
<div class="selc-projects">
    <h1>category</h1>




<div class="chkBoxDiv-projects">



<?php

$pr_cat_name_for = 0; 
      if(isset($post_data['pr_cat_name'])){
          $pr_cat_name_for = $post_data['pr_cat_name'];
      }

foreach($category_details as $category){
?>
<div class="totaBoxD-pro"><span>
  <input name="pr_cat_name" id="pr_cat_name" type="radio" <?php if($pr_cat_name_for == $category->project_category){echo "checked";}?> value="<?php echo $category->project_category; ?>" onclick="submit_search_form();"/>
</span>
  <p><?php echo $category->pr_cat_name; ?></p>
<div class="clear"></div>
</div>
<?php
}
?>
<? if($pr_cat_name!=2){?>
<h2>Coaching Type:</h2>
<div class="totaBoxD-pro"><span>
  <input name="coaching_type" id="pr_cat_name" type="radio"  value="inperson" onclick="submit_search_form();"/>
</span>
  <p>In person</p>
  <span>
  <input name="coaching_type" id="pr_cat_name" type="radio"  value="inphone" onclick="submit_search_form();"/>
</span>
  <p>Phone</p>
<div class="clear"></div>
</div>

<? } ?> 
<? if($pr_cat_name!=1){?>
<h2>Skills:</h2>

<?php

$type_arr = array();
if(isset($post_data['projecttype'])){
   $type_arr = $post_data['projecttype'];
}


foreach($projecttypeInfo as $projecttype){
?>
<div class="totaBoxD-pro">
<span><input name="projecttype[]" id="projecttype" type="checkbox" value="<?php echo $projecttype->project_type_id; ?>" <?php if(in_array($projecttype->project_type_id,$type_arr)){echo "checked";}?> onclick="submit_search_form();"></span><p><?php echo $projecttype->project_type_txt; ?></p>
<div class="clear"></div>
</div>
<?php
}
?>
<!-- Project Leader ship -->
<? } ?>
<? if($pr_cat_name!=2){?>
<h2>Coaching Focus:</h2>

<?php

$type_arr = array();
if(isset($post_data['projectcoachingtype'])){
   $type_arr = $post_data['projectcoachingtype'];
}


foreach($project_leadership_coaching as $projecttype){
?>
<div class="totaBoxD-pro">
<span><input name="projectcoachingtype[]" id="projectcoachingtype" type="checkbox" value="<?php echo $projecttype->project_coaching_type_id; ?>" <?php if(in_array($projecttype->project_coaching_type_id,$type_arr)){echo "checked";}?> onclick="submit_search_form();"></span><p><?php echo $projecttype->leadership_coaching_text; ?></p>
<div class="clear"></div>
</div>
<?php
}
?>
<? } ?>
</div>


<div class="clear"></div>

</div>







</aside>



<aside class="pricingBox-Total">
<h1>Pricing <span>$</span></h1>

<div class="clear"></div>

<div class="mid-sec">

    <div class="mid-cont-pro">
    <span><input name="pricing_type[]" type="checkbox" value="Hourly" border="0"></span>
    
    <p>Hourly</p>

<div class="clear"></div>

</div>

<div class="mid-cont-Box">

<div class="inputBox"><input name="hourly_rate_start" type="text" placeholder="Min"></div>
<div class="tx">To</div>
<div class="inputBoxR"><input name="hourly_rate_end" type="text" placeholder="Max"></div>
<div class="clear"></div>
</div>

<div class="mid-cont-pro">
    <span><input name="pricing_type[]" type="checkbox" value="Fixed Price Job" border="0"></span>
    
    <p>Maximum Contract Value</p>

<div class="clear"></div>

</div>

<div class="mid-cont-Box">

<div class="inputBox"><input name="min_contract" type="text" placeholder="Min"></div>
<div class="tx">To</div>
<div class="inputBoxR"><input name="max_contract" type="text" placeholder="Max"></div>
<div class="clear"></div>
</div>


</div>


<div class="clear"></div>

</aside>

<input type="button" name="go" id="go" value="Go" onclick="submit_search_form()" class="btnB"/>

<aside class="pricingBox-Total">
<h1>Location Preference</h1>

<div class="clear"></div>

<div class="mid-sec2">



<div class="mid-cont-Box">

<select name="location" id="location" onchange="submit_search_form();">
<option value="all">-All-</option>
<?php

	$state_selected_state = 0; 
	  if(isset($post_data['location'])){
		  $state_selected_state = $post_data['location'];
	  }


	foreach($projectstate as $state){
?>
<option value="<?php echo $state->state?>" <?php if($state_selected_state == $state->state){echo "selected";}?>><?php echo $state->StateName;?></option><?php
	}
?>
</select>
<div class="clear"></div>
</div>


<div class="start-Date">

<div class="startdate"> <input type="radio" value="noimmediate" name="immediate" />start date</div>
<div class="cal">
 <input type="text" id="mydate" name="mydate" gldp-id="mydate" />
    
    
   
  
  <div class="clear"></div>
</div>

<input type="radio" value="immediate" name="immediate" />Immediate 
<div class="clear"></div>

</div>


<div class="clear"></div>
</div>


<div class="clear"></div>

</aside>









<div class="clear"></div>

