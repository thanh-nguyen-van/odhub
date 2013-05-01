<?php
    $post_data = $this->input->post();
    
    
?>
<aside class="leftCol">  

<!--<input type="submit" name="search" id="search" value="Search" />--> <div class="btnB"><a href="<?php echo site_url('search'); ?>">Reset</a></div>
<div class="selc">Select State(s) :<br>

<?php
//debugbreak();
?>

<span>
<select name="state" id="state" onchange="submit_search_form();">
<option value="all">All</option>
<?php
  $state_selected_state = 1; 
  if(isset($post_data['state'])){
      $state_selected_state = $post_data['state'];
  }



foreach($state_details as $key=>$val){
?>
<option value="<?php echo $val->ProfessionalState?>" <?php if($state_selected_state == $val->ProfessionalState){echo "selected";}?>><?php echo $val->ProfessionalState?></option><?php
}
?>
</select></span>
<br>


<p>ctrl to pick more than one</p>
<br>
<br>


<div class="clear"></div>


<div class="chkBoxDiv">

<h1>I am looking for</h1>

<?php
     $looking_for = 0; 
      if(isset($post_data['looking_for'])){
          $looking_for = $post_data['looking_for'];
      }
  
	foreach($lookingfor_details as $key=>$val){
?>

<div class="totaBoxD">
<span><input name="looking_for" id="looking_for" type="radio" <?php if($looking_for == $val->s_professional_looking_status_id){echo "checked";}?> value="<?php echo $val->s_professional_looking_status_id;?>" onclick="submit_search_form()"></span> <p><?php echo $val->s_professional_looking_status_val;?>  </p>
<div class="clear"></div>
</div>
<?php
	}
?>            

<h1>Type :</h1>
<?php
$type_arr = array();
if(isset($post_data['type'])){
   $type_arr = $post_data['type'];
}

foreach($type_details as $key=>$val){
?>
<div class="totaBoxD">
<span><input name="type[]" id="" type="checkbox" value="<?php echo $val->s_professional_type_id;?>" <?php if(in_array($val->s_professional_type_id,$type_arr)){echo "checked";}?> onclick="submit_search_form()"></span><p><?php echo $val->s_professional_type_val;?></p>
<div class="clear"></div>
</div>
<?php
}
//debugbreak();
?>




<h1>Coaching Focus :</h1>

<?php

 $coaching_arr = array();
if(isset($post_data['coaching_focus'])){
   $coaching_arr = $post_data['coaching_focus'];
}


foreach($coatchfocus_details as $key=>$val){
?>
<div class="totaBoxD">
<span><input name="coaching_focus[]" id="coaching_focus" type="checkbox" <?php if(in_array($val->s_professional_coaching_focus_id,$coaching_arr)){echo "checked";}?> value="<?php echo $val->s_professional_coaching_focus_id;?>" onclick="submit_search_form()"></span><p><?php echo $val->s_professional_coaching_focus_val;?></p>
<div class="clear"></div>
</div>
<?php
}

?>
<h1 class="totaBoxD">Coaching Style :</h1>

<?php

 $coachings_arr = array();
if(isset($post_data['coaching_style'])){
   $coachings_arr = $post_data['coaching_style'];
}

foreach($coatchstyle_details as $key=>$val){
?>


<div class="totaBoxD">
<span><input name="coaching_style[]" id="coaching_style" type="checkbox" value="<?php echo $val->s_professional_coaching_style_id;?>" <?php if(in_array($val->s_professional_coaching_style_id,$coachings_arr)){echo "checked";}?> onclick="submit_search_form()"></span><p><?php echo $val->s_professional_coaching_style_val;?></p>
<div class="clear"></div>
</div>
<?php
}

?>
<h1>Hourly Rate:</h1>

<?php

$hourly_rate_arr = array();
if(isset($post_data['hourly_rate'])){
   $hourly_rate_arr = $post_data['hourly_rate'];
}


foreach($hourlyrate_details as $key=>$val){
	$final_arr = array();
	$amount_str = "";
	$range = $val->grp;
	$range_arr = explode('-',$range);
	
	foreach($range_arr as $amount){
		$amount_str = '$'.$amount;
		array_push($final_arr,$amount_str);
	}
	
	$final_str = implode(' - ',$final_arr);
	
	
?>
<div class="totaBoxD">
<span><input name="hourly_rate[]" id="hourly_rate" type="checkbox" value="<?php echo $val->grp;?>" <?php if(in_array($val->grp,$hourly_rate_arr)){echo "checked";}?> onclick="submit_search_form()"></span><p><?php echo $final_str; ?> (<?php echo $val->ct;?>)</p>
<div class="clear"></div>
</div>
<?php
}

?>




<h1>Total Contract Value:</h1>

<?php

 $contract_val_arr = array();
if(isset($post_data['contract_val'])){
   $contract_val_arr = $post_data['contract_val'];
}


foreach($contractval_details as $key=>$val){
	$final_arr = array();
	$amount_str = "";
	$range = $val->grp;
	$range_arr = explode('-',$range);
	
	foreach($range_arr as $amount){
		$amount_str = '$'.$amount;
		array_push($final_arr,$amount_str);
	}
	
	$final_str = implode(' - ',$final_arr);
	
?>
<div class="totaBoxD">
<span><input name="contract_val[]" id="contract_val" type="checkbox" value="<?php echo $val->grp;?>" <?php if(in_array($val->grp,$contract_val_arr)){echo "checked";}?> onclick="submit_search_form()"></span><p><?php echo $final_str;?> (<?php echo $val->ct;?>)</p>
<div class="clear"></div>
</div>
<?php
}
?>
</div>

<div class="clear"></div>
</div>

</aside>


