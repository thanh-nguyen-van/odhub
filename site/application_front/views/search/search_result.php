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
        <h1><?php echo $val->ProfessionalFirstname.' '.$val->ProfessionalLastname; ?> More</h1>
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


<div id="tnt_pagination">
<span class="disabled_tnt_pagination">Prev</span><span class="active_tnt_link">1</span><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#forwaed">Next</a></div>


<div class="clear"></div>
</div>



</aside>