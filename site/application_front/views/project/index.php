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
            <li><a href="<?php echo $this->config->base_url();?>professional/show_home">Profile</a></li>
            <li><a href="<?php echo $this->config->base_url();?>professional/show_home">Account</a></li>
            <li><a href="<?php echo $this->config->base_url();?>project/">Projects</a></li>
            <li class="last"><a href="#">Realistic Previews</a></li>
            <li class="last"><a href="#">  Find Projects  </a></li>
        </ul>
        <a href="#" id="pull">Menu</a>
    </nav>


<div class="Total-Div-Box-pro2">

   <form action="<?php echo $this->config->base_url();?>project/index_left/" id="search_form" method="post">   
   <div class="total-left-col" id="left_content">
    
   <?php
	  //$this->index_left();   
	  Project::index_left(); 
	?>
  
</div>
<input type="button" name="go" id="go" value="Go" onclick="submit_search_form()"/>

</form>
<div id="search_result">

<?php
//$this->index_left(); 

	Project::search_result(); 
	?>
 
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

<div class="drop-shadow-project"><img src="images/drop-shadow.png" alt="" border="0"></div>
<div class="clear"></div>
</section>