 
<section class="container">


<div class="Total-Div-Box">

    <div class="box-head3">
        <h1>MEET OUR PROFESSIONALS
        
      <span class="post-Btn"><a href="<?php echo site_url('project/post_project'); ?>">post project</a></span>
        
        </h1>
    
    </div>
    
    <div class="listingDiv2">
    
    <div class="inner-sec-1">Start browsing profiles to find your perfect fit. Use the filters on the left to select Professionals based on your region or need. If you prefer 
to describe your needs and be contacted, <a href="#">click here</a>.
</div>
 <form action="<?php echo $this->config->base_url();?>search/index_left/" id="search_form" method="post">   
<div id="left_content">    


<?php
//$this->index_left();   
Search::index_left(); 
?>

</div>
</form>      

<div id="search_result">
<?php
//$this->index_left();
Search::search_result(); 
?>
</div>

 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>          
 
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
          });
          
      $.ajax({
       type: "POST",
        url: "<?php echo $this->config->base_url();?>search/search_result/",
         data: param
         }).done(function( msg ) {
         $( "#search_result" ).empty().append( msg );  
          });    
          
          

});
</script>



<div class="clear"></div>
</div>


<div class="drop-shadow"><img src="images/drop-shadow.png" alt="" border="0"></div>
</div>



</section>