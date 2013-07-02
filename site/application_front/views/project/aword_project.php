<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>         
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#mydate" ).datepicker();
  });
</script>
<section class="container">

<nav class="clearfix">
        <ul class="clearfix">
           
			 <li><a href="<?php echo $this->config->base_url(); ?>professional/view_profile">My Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>professional/show_home">My Account</a></li>
            <li class="last"><a href="<?php echo $this->config->base_url(); ?>project/aword_project">My Projects</a></li>
		

			
<!--            <li class="last"><a href="#">Realistic Previews</a></li>
            <li ><a href="<?php echo $this->config->base_url();?>project/">  Find Projects  </a></li>-->
        </ul>
        <a href="#" id="pull">Menu</a>
        
  
    </nav>
    
      
         <div class="menu-bot-Btn"><a href="<?php echo $this->config->base_url();?>project/">EXPLORE POSTED PROJECTS</a></div>  
         
         <div class="clear"></div>

<div class="Total-Div-Box-pro2">

   <form action="<?php echo $this->config->base_url();?>project/index_left/" id="search_form" method="post">   
   <div class="total-left-col" id="left_content">
    
   <?php
	  //$this->index_left();   
	 // Project::index_left(); 
	?>
  
</div>


</form>
<div id="search_result">

<?php
//debugbreak();
$data_result = $awarded_projects->result();
if(!empty($data_result)){
foreach($data_result as $result){
?>
<div class="total-right-pro-Div fullwidth">

<section class="rightCol-R">
<div class="box-head-proR">
        <h1><a href="<?php echo $this->config->base_url();?>project/aword_project_details?projectid=<? echo $result->project_id;?>"><?php echo $result->project_name; ?></a>
        
        
        
        </h1>
    
    </div>
     <div class="clear"></div>
 <div class="box-head-grey">
 <ul>
     <li><span><?php echo $result->job_type; ?>:</span> <p>$<?php echo $result->start_price; ?></p></li>
 
 </ul>
 
 
 <div class="clear"></div>
 </div>   
 
 
 <section class="rightCol-Boxmid">
 
 <article>
 <?php echo $result->project_description; ?>
 
 </article>
 
 <div class="cat">Category: <span>
 <?php 
 $category_details = Project::getCategoryName($result->project_category);
 echo $category_details[0]->pr_cat_name; 
 
 ?>
 </span></div>
 
 
 <?php

 $skill_set = Project::getSkillInfo($result->project_id);
 ?>
 
 
 <div class="skills">Skills: <span><?php echo $skill_set;?></span></div>
 
 <div class="clear"></div>
 
 <div class="bottom-glagDiv">
 <ul>
    <li><?php //echo $result->cl_name; ?></li>
    <li><?php 

	$state_info = Project::getStateName($result->state);
	echo $state_info[0]->StateName;
	//echo $result->StateName; 
	
	?></li>
 
 </ul>
 
 <?php if($result->project_filename!=''){?>Attachment : <span class="" id="" ><a href="<?php echo site_url('../upload/project_files/'.$result->project_filename);?>"> <?php echo $result->project_filename;?></a></span><div class="clear"></div><?php }?>
 </div>
 
  <div class="clear"></div>
 </section>
    

 <div class="clear"></div>

</section>



</div>
<?php
}
}

?>
<div style="text-align:center;font-size:12px;color:#F00; min-height:450px;">
<div class="total-right-pro-Div fullwidth">
<section class="rightCol-R">
<div class="box-head-proR">
        <h1>No projects awarded.</h1>
<div class="clear"></div>
 
    </div></section>

</div>
</div>
 </div>
 
 
<script>
/* attach a submit handler to the form */

 function submit_search_form(){
     
    $("#search_form").submit(); 
 }
             
   
$("#search_form").submit(function(event) {
    
 
  /* stop form from submitting normally */ 
  event.preventDefault();
 
  /* get some values from elements on the page: */
  var $form = $( this ),
      term = $form.find( 'input[name="state"]' ).val(),
      url = $form.attr( 'action' );
         param = $form.serialize();
        
      $.ajax({
       type: "POST",
        url: url,
         data: param
         }).done(function( msg ) {
         $( "#left_content" ).empty().append( msg );  
		 $( "#mydate" ).datepicker();
          });
	  
        
      $.ajax({
       type: "POST",
        url: "<?php echo $this->config->base_url();?>project/search_result/",
         data: param
         }).done(function( msg ) {
         $( "#search_result" ).empty().append( msg );  
          });    
          
         

});




</script>
 
 
 
 
 
    
<div class="clear"></div>

</div>

<div class="drop-shadow-project"><img src="<?php echo css_images_js_base_url();?>images/drop-shadow.png" alt="" border="0"></div>
<div class="clear"></div>
</section>