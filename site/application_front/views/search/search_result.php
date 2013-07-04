<aside class="rightCol">

<div class="rightCol-Top">
<h1>Professionals  <span>  Favorite</span></h1>

</div>

<div class="mid-cont">

<?php

foreach($data_result as $key=>$val){
	$ProfessionalId = $val->ProfessionalId;
	
?>
<div class="total-sec-Div">
    <div class="div-1">
        <div class="pic-p">
        <img src="<?php if($val->ProfessionalImage){ echo file_upload_base_url().'userimages/'.$val->ProfessionalImage; }else{ echo css_images_js_base_url().'images/pro-pic.png'; } ?>"   alt="" border="0">
        
       
        
        
        </div>
        <div class="pic-p-right">
        <h1><?php echo $val->ProfessionalFirstname.' '.$val->ProfessionalLastname; ?> </h1>
        <p>Location   -  <?php echo $val->ProfessionalCity; ?></p>
        
        
        </div> 
    
    </div>
    
    
    <div class="div-2">
   <?php

   $status = Search::check_fab($ProfessionalId);
   if($status){
	?>
    <a href="#"><img src="<?php echo css_images_js_base_url();?>images/red-heart.png" width="34" height="30" alt="" border="0" onclick="return trigger_fav('<?php echo $ProfessionalId;?>',this);"></a>
   <?php    
   }
   else{
	   ?>
     <a href="#"><img src="<?php echo css_images_js_base_url();?>images/grey-heart.png" width="34" height="30" alt="" border="0" onclick="return trigger_fav('<?php echo $ProfessionalId;?>',this);"></a>
	<?php   
   }
   ?>
    
    
    
    </div>
    
    
    <div class="div-3">
<!--        <div class="btnB"><a href="#">Realistic Preview</a></div>-->
        
        <div class="btnC"><a href="#" onclick="return contact_professional('<?php echo $ProfessionalId;?>');">Contact</a></div>
    
    
    </div>
    
<div class="clear"></div>    
</div>
<?php
}
?>
<div class="clear"></div>


<?php
//echo $present_selection;
$number_of_pagination =floor($number_of_project/25);
$remaining = $number_of_project%5;
if($remaining>0){
	$number_of_pagination = $number_of_pagination + 1;
}
?>
<div id="tnt_pagination">
<?php
if($present_selection == NULL){
	$present_selection = 0;
}
?>
<?php
if($present_selection != 0){
?>
<a href="#previous" onclick="return prevpage();">Prev</a>
<!--<span class="disabled_tnt_pagination" onclick="return prevpage();">Prev</span>-->
<?php
}
?>
<?php
for($i=0;$i<$number_of_pagination;$i++){
	if($i==$present_selection){
?>		
<span class="active_tnt_link"><?php echo $i+1;?></span>
<?php
	}
	else{
?>

	<a href="#<?php echo $i+1;?>" onclick="return set_page(<?php echo $i;?>)"><?php echo $i+1;?></a>
<?php
	}
}
?>

<?php
if($present_selection != $i-1){
?>
<a href="#forwaed" onclick="return nextpage();">Next</a>
<?php
}
?>

<div class="clear"></div>
</div>



</aside>