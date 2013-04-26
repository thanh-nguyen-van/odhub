<aside class="leftCol">
<form action="" method="post" name="search_form" id="search_form">
<input type="submit" name="search" id="search" value="Search" />
<div class="selc">Select State(s) :<br>

<?php
//debugbreak();
?>

<span>
<select name="state" id="state">
<option value="all">All</option>
<?php
foreach($state_details as $key=>$val){
?>
<option value="<?php echo $val->ProfessionalState?>"><?php echo $val->ProfessionalState?></option><?php
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
	foreach($lookingfor_details as $key=>$val){
?>

<div class="totaBoxD">
<span><input name="looking_for" type="radio" value="<?php echo $val->s_professional_looking_status_id;?>"></span> <p><?php echo $val->s_professional_looking_status_val;?>  </p>
<div class="clear"></div>
</div>
<?php
	}
?>
<h1>Credential:</h1>
<div class="totaBoxD">
<span><input name="" type="checkbox" value="" ></span><p>ACC (100+ hours of experience) </p>
<div class="clear"></div>
</div>

<div class="totaBoxD">
<span><input name="" type="checkbox" value=""></span><p>ACC (100+ hours of experience)</p>
<div class="clear"></div>
</div>

<div class="totaBoxD">
<span><input name="" type="checkbox" value=""></span><p>ACC (100+ hours of experience)</p>
<div class="clear"></div>
</div>



<h1>Type :</h1>
<?php
foreach($type_details as $key=>$val){
?>
<div class="totaBoxD">
<span><input name="type[]" id="type" type="checkbox" value="<?php echo $val->s_professional_type_id;?>" ></span><p><?php echo $val->s_professional_type_val;?></p>
<div class="clear"></div>
</div>
<?php
}
//debugbreak();
?>




<h1>Coaching Focus :</h1>

<?php
foreach($coatchfocus_details as $key=>$val){
?>
<div class="totaBoxD">
<span><input name="coaching_focus[]" id="coaching_focus" type="checkbox" value="<?php echo $val->s_professional_coaching_focus_id;?>" ></span><p><?php echo $val->s_professional_coaching_focus_val;?></p>
<div class="clear"></div>
</div>
<?php
}

?>
<h1 class="totaBoxD">Coaching Style :</h1>

<?php
foreach($coatchstyle_details as $key=>$val){
?>


<div class="totaBoxD">
<span><input name="coaching_style[]" id="coaching_style" type="checkbox" value="<?php echo $val->s_professional_coaching_style_id;?>" ></span><p><?php echo $val->s_professional_coaching_style_val;?></p>
<div class="clear"></div>
</div>
<?php
}

?>
<h1>Hourly Rate:</h1>

<?php
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
<span><input name="hourly_rate[]" id="hourly_rate" type="checkbox" value="<?php echo $val->grp;?>" ></span><p><?php echo $final_str; ?> (<?php echo $val->ct;?>)</p>
<div class="clear"></div>
</div>
<?php
}

?>




<h1>Total Contract Value:</h1>

<?php
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
<span><input name="contract_val[]" id="contract_val" type="checkbox" value="<?php echo $val->grp;?>" ></span><p><?php echo $final_str;?> (<?php echo $val->ct;?>)</p>
<div class="clear"></div>
</div>
<?php
}
?>
</div>

<div class="clear"></div>
</div>
</form>
</aside>