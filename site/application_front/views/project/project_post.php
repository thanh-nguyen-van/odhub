<div class="clear"></div>
<div class="brk-line"></div>
</header>

<!-- -----------------------------------------------------------------------------------------------------------  --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script> 

<!-- ----expandable-----> 

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".content").hide();
  //toggle the componenet with class msg_body
  jQuery(".heading").click(function()
  {
    jQuery(this).next(".content").slideToggle(500);
  });
});
</script> 
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".content-a").hide();
  //toggle the componenet with class msg_body
  jQuery(".heading-a").click(function()
  {
	if(jQuery('.content-a').is(':visible')){
		jQuery(this).text('show').removeClass('hide');
		jQuery('.content-a').slideUp(500);
		}
		else {
		jQuery(this).text('Hide').addClass('hide');
		jQuery('.content-a').slideDown(500);
			
			}
  });
});
</script> 
<!--custom dropdown --> 

<script src="js/jquery.dd.min.js"></script> 
<script>
function createByJson() {
	var jsonData = [					
					{description:'Choos your payment gateway', value:'', text:'Payment Gateway'},					
					{image:'images/Amex-56.png', description:'My life. My card...', value:'amex', text:'Amex'},
					{image:'images/Discover-56.png', description:'It pays to Discover...', value:'Discover', text:'Discover'},
					{image:'images/Mastercard-56.png', title:'For everything else...', description:'For everything else...', value:'Mastercard', text:'Mastercard'},
					{image:'images/Cash-56.png', description:'Sorry not available...', value:'cash', text:'Cash on devlivery', disabled:true},
					{image:'images/Visa-56.png', description:'All you need...', value:'Visa', text:'Visa'},
					{image:'images/Paypal-56.png', description:'Pay and get paid...', value:'Paypal', text:'Paypal'}
					];
	$("#byjson").msDropDown({byJson:{data:jsonData, name:'payments2'}}).data("dd");
}
$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
												if(val!="")
													window.location = val;
											}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
		
	//convert
	$("select").msDropdown();
	createByJson();
	$("#tech").data("dd");
});
function showValue(h) {
	console.log(h.name, h.value);
}
$("#tech").change(function() {
	console.log("by jquery: ", this.value);
})
//
</script> 

<!--drop2--> 

<script type="text/javascript" >
$(document).ready(function()
{
$(".account-d2").click(function()
{
var X=$(this).attr('id');

if(X==1)
{
$(".submenu-d2").hide();
$(this).attr('id', '0');	
}
else
{

$(".submenu-d2").show();
$(this).attr('id', '1');
}
	
});

//Mouseup textarea false
$(".submenu-d2").mouseup(function()
{
return false
});
$(".account-d2").mouseup(function()
{
return false
});


//Textarea without editing.
$(document).mouseup(function()
{
$(".submenu-d2").hide();
$(".account-d2").attr('id', '');
});
	
});
	
	</script> 
<!--calander--> 

<script src="js/glDatePicker.min.js"></script> 
<script type="text/javascript">
	$(window).load(function()
	{
		$('#mydate2').glDatePicker();
	});
</script> 
<!-- -----------------------------------------------------------------------------------------------------------  -->

<section class="container">
  <div class="menu">
    <ul class="glossymenu">
        <li class="active"><a>1. Post a Project <span>&nbsp;</span></a></li>
       
        <li><a>2. Preview <span>&nbsp;</span></a></li>
    </ul>
  </div>
  <div class="clear"></div>
  <div class="Total-Div-Box">
    <div class="create-job-im"><img src="<?php echo css_images_js_base_url();?>images/create-job-im.png"  alt="" border="0"></div>
    <div class="clear"></div>
    <p>Describe the job or list the skills you're looking for.</p>
    
    <?php Project::project_post_left(); ?>
    
    <?php Project::project_post_right(); ?>
    
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<div class="clear"></div>
