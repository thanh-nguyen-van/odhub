<?php
    $post_data = $this->input->post();
	//debugbreak();
?> 
<aside class="leftCol-projects">


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

<h2>Credential:</h2>

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

<p>start date</p>


<div class="cal">
 <input type="text" id="mydate" gldp-id="mydate" />
    <div gldp-el="mydate"
         style="width:260px; height:160px; position:absolute; top:70px; left:30px;">
    </div>
    
    <span class="cal-icon"><img src="images/calendar.png" width="18" height="17" alt="" border="0"></span>
  
  <div class="clear"></div>
</div>
<div class="clear"></div>

</div>


<div class="clear"></div>
</div>


<div class="clear"></div>

</aside>









<div class="clear"></div>
