<?php
    $post_data = $this->input->post();
    
    
?>
<aside class="leftCol">  

<!--<input type="submit" name="search" id="search" value="Search" />--> <div class="btnB"><a href="<?php echo site_url('search'); ?>">Reset</a></div>
<div class="selc">


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
<? if($looking_for!=2){?>           
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
}
?>
<? if($looking_for!=2){?> 

<!--  Coaching style -->
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
}
?>
<? if($looking_for!=2){?> 

<!--  Coaching Credential -->
<h1 class="totaBoxD">Coaching Credential :</h1>


<div class="totaBoxD">
<span><input name="coaching_credential[]" id="coaching_credential" type="checkbox" value="1" onclick="submit_search_form()"></span><p>$1-100</p>
<span><input name="coaching_credential[]" id="coaching_credential" type="checkbox" value="100" onclick="submit_search_form()"></span><p>$100-200</p>
<span><input name="coaching_credential[]" id="coaching_credential" type="checkbox" value="200" onclick="submit_search_form()"></span><p>$200-300</p>
<span><input name="coaching_credential[]" id="coaching_credential" type="checkbox" value="300" onclick="submit_search_form()"></span><p>$400-500</p>
<div class="clear"></div>
</div>

<? } ?>
<? if($looking_for!=1){?> 
<!--  Skills -->
<h1 class="totaBoxD">Skills :</h1>

<?php

 $coachingcredn_arr = array();
if(isset($post_data['skill_details'])){
   $coachingcredn_arr = $post_data['skill_details'];
}


foreach($skill_details as $key=>$val){
?>


<div class="totaBoxD">
<span>
	<input name="skill_details[]" id="skill_details" type="checkbox" value="<?php echo $val->pr_skill_id;?>"  <?php if(in_array($val->pr_skill_id,$coachingcredn_arr)){echo "checked='checked'";}?> onclick="submit_search_form()"></span>
	<p><?php echo $val->skill_name;?></p>
	
	
	
	
	
	
	<div class="clear"></div>
</div>
<?php
}
}
?>

<!-- type -->
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
<? if($looking_for!=2){?> 
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
}
?>


<? if($looking_for!=1){?> 

<h1>Maximum Contract Value:</h1>

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
}
?>
</div>
<div class="clear"></div>
<br>
<br>
Select Country :<br>

  <?php
                        $countryList = $this->model_location->get_country_data();
                  
                        ?> <div class="dollarG"><span >
                        <select name="custom_country" id="custom_country" >
                          <option value="">--Select Country--</option>
                        <?php
                     
                            foreach($countryList as $country){ ?>
                                <option value="<?php echo $country['CountryId'];?>"><?php echo $country['Country'];?></option>    
                            <?php
                            }
                        ?>
                        </select>
                      </span></div>
                      <div class="clear"></div>
       
        <br />
         <br /
<div class="dollarG">
Select Satate :<br>
         <span id="generate_state_options">
                        <select name="state" id="state"  onchange="submit_search_form();" >
                          <option value="">--Select State--</option>
                         </select>
          </span>
</div>
<div class="clear"></div>

<div class="clear"></div>
</div>

</aside>

 <script>
          $('#custom_country').change(function()
          {
           
              var countryId = $(this).val();
            
             getStateList(countryId)
          });
          
          function getStateList(countryId){
            var pageUrl = '<?php echo base_url('login/ajaxGenerateStatelist')?>';
        
            $.ajax({
              url: pageUrl,
              type: "POST",
              data: {page_action : 'ajax_edit', c_country_id: countryId , param:'from_filter' },
              dataType: "html",
              success: function(msg) {
               
                $("#generate_state_options").html('');
                $("#generate_state_options").html(msg);
              }
            }); 
          }
                </script> 
