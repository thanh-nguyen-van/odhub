<script src="<?php echo site_url('public/js/SpryTabbedPanels.js'); ?>" type="text/javascript"></script>
<link href="<?php echo site_url('public/css/SpryTabbedPanels.css'); ?>" rel="stylesheet" type="text/css" />
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="<?php echo $this->config->base_url(); ?>professional/edit_profile">My Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>professional/show_home">My Account</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>project/aword_project">My Projects</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>professional/invoice">Create Invoices</a></li>
			<li><a href="<?php echo $this->config->base_url(); ?>professional/review/">Realistic Previews</a></li>			
            <li class="last"><a target="_blank" href="<?php echo $this->config->base_url(); ?>../forum/">OD Hub Forums</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
    </div>
    


</section>
<div class="clear"></div>

<section class="container">
<div class="box-head"><h1>Please select your searchable criteria</h1></div>
<form action="<?=base_url('professional/SearchableSave/')."/".$type?>" method="POST" name="searchCriteriaForm">
<div class="listingDiv">
 <? if($type==1){ ?>
 <div>
    Coaching Focus : 
    <? for($i=0;$i<count($coatchfocus_details);$i++){ ?>
        <label class="srch_label"><input type="radio" class="" name="coaching_focus" id="coaching_focus" value="<?=$coatchfocus_details[$i]->s_professional_coaching_focus_id?>"/> <span><?=$coatchfocus_details[$i]->s_professional_coaching_focus_val?></span> </label>
     <? } ?><br/><br/>
   Coaching Style  :  
   <? for($i=0;$i<count($coatchstyle_details);$i++){ ?>
    <label class="srch_label"><input type="radio" class="" name="coaching_style" value="<?=$coatchstyle_details[$i]->s_professional_coaching_style_id?>" /> <span><?=$coatchstyle_details[$i]->s_professional_coaching_style_val?></span> </label>
   <? } ?><br/><br/>
   Coaching Credential : 
     <? for($i=0;$i<count($coatchcredential_details);$i++){ ?>
     <label class="srch_label"> <input type="radio" class="" name="coaching_credential" value="<?=$coatchcredential_details[$i]->id?>"/> <span><?=$coatchcredential_details[$i]->credential?></span> </label>
   <?}?><br/><br/>
   Coaching Hourly Rate  : 
       <label class="srch_label"> 
      <input class="" type="radio" value="1" name="hourly_rate">
      <span>$1-100</span>
      <input class="" type="radio" value="100" name="hourly_rate">
      <span>$100-200</span>
      <input class="" type="radio" value="200" name="hourly_rate">
      <span>$200-300</span>
      <input class="" type="radio" value="400" name="hourly_rate">
      <span>$400-500</span>

     </span> </label>
   






   <br/><br/>
</div>
<div class="srch-btn">
	<span class="send-btn"><input type="submit" class="sbn" value="Submit" onclick="return validatesearch();" /></span>
</div>
<?  } else{ ?>
 <div>
   Skills:<br> <?  
    $coachings_arr = array();
if(isset($post_data['coaching_style'])){
   $coachings_arr = $post_data['coaching_style'];
}
//print_r($skill_details);
foreach($skill_details as $key=>$val){
?>
    <label class="srch_label"><span></span> <input type="checkbox" class="" name="skill[]" value="<?php echo $val->pr_skill_id;?>"/><?php echo $val->skill_name;?></label><br> 
    <? } ?>
 <br>  
<label class="srch_label"><span>Maximum Contract Value</span> <input type="textbox" class="" name="max_contract_value"/></label>
    
</div>
<div class="srch-btn">
	<span class="send-btn"><input type="submit" class="sbn" value="Submit" onclick="return validatesearchskill();" /></span>
</div>
<?} ?>


</div>
</form>


<div class="drop-shadow"><img border="0" alt="" src="http://192.168.1.50/odhub/site/public/images/drop-shadow.png"></div>
</section>
<script type="text/javascript">
function validatesearch(){
var coaching = $("input[type='radio'][name='coaching_focus']:checked").val();
var coaching_style = $("input[type='radio'][name='coaching_style']:checked").val();
var coaching_credential = $("input[type='radio'][name='coaching_credential']:checked").val();
var hourly_rate = $("input[type='radio'][name='hourly_rate']:checked").val();
if(isNaN(coaching)){
  alert("Please select your Coaching Focus");
  return false;
}else if(isNaN(coaching_style)){
  alert("Please select your Coaching Style");
  return false;
}else if(isNaN(coaching_credential)){
  alert("Please select your Coaching Credential");
  return false;
}else if(isNaN(hourly_rate)){
  alert("Please select your Hourly Rate");
  return false;
}else{
  return true;
}
return false;

}
</script>