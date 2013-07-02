 
<section class="container">


<div class="Total-Div-Box">
<nav class="clearfix">
        <ul class="clearfix">
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_profile/">Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_home">Account</a></li>
            <li class="last"><a href="<?php echo $this->config->base_url(); ?>client/project_list">Projects</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
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
 <input  type="hidden" name="pagination" id="pagination" value="0" />  
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
 function set_page(page_id){
	// alert(page_id);
	document.getElementById('pagination').value = page_id; 
	submit_search_form();
 }
 
 function submit_search_form(){
	 //alert("tet");
   //  document.getElementById('pagination').value = page_id;
    $("#search_form").submit(); 
 }
 function nextpage(){
	 page_id = document.getElementById('pagination').value;
	document.getElementById('pagination').value = parseInt(page_id) + 1;
    $("#search_form").submit(); 
 }
 
 function prevpage(){
	 page_id = document.getElementById('pagination').value;	 
	document.getElementById('pagination').value = parseInt(page_id) - 1;
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
<script language="javascript">
function contact_professional(ProfessionalId){
window.open("<?php echo $this->config->base_url();?>search/sendmessage/?ProfessionalId="+ProfessionalId,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;
}
function trigger_fav(professional_id,obj){
	//alert(professional_id);	
	var param = "";
	param = "professional_id="+professional_id;
	
	$.ajax({
       type: "POST",
        url: "<?php echo $this->config->base_url();?>search/set_favorite/",
         data: param
         }).done(function( msg ) {
			 //alert(msg);
			 if(msg == 2){
				 obj.src = "<?php echo css_images_js_base_url();?>" + "images/red-heart.png";
			 }
			 if(msg == 1){
				 obj.src = "<?php echo css_images_js_base_url();?>" + "images/grey-heart.png";
			 }
			 //alert(obj.src);
         //$( "#search_result" ).empty().append( msg );  
          });  
	return false;
}
</script>



<div class="clear"></div>
</div>


<div class="drop-shadow"><img src="<?=css_images_js_base_url()?>images/drop-shadow.png" alt="" border="0"></div>
</div>



</section>