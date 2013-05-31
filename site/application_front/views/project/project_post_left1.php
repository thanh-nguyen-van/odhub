<!doctype html>
<html class=""><head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
<title>od-hub</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/button_in.css" type="text/css" media="screen">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->




	
	



		
        
<!-- ----expandable----->     







<!--custom dropdown -->

<script src="http://192.168.1.50/odhub/site/public/js/jquery.dd.min.js"></script>
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
   
</head>
<body onLoad="MM_preloadImages('images/sign-h.jpg','images/fdbk-h.png','images/nd-hlp-h.png','images/y-btn-h.png','images/bl-h.png','images/s-icon1-h.png','images/s-icon2-h.png','images/s-icon3-h.png','images/get-s-h.png')">
<header>
<div class="top-header_bg">
<!--<div class="fdbk"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','images/fdbk-h.png',1)"><img src="images/fdbk.png" name="Image17" width="56" height="196" border="0"></a></div>
<div class="nd-hlp"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','images/nd-hlp-h.png',1)"><img src="images/nd-hlp.png" name="Image18" width="69" height="227" border="0"></a></div>-->
	<div class="container">
        <div class="top-left-sign"><span><a href="#">Sign  up</a></span>  for  a  free  account  today</div>
        <div class="main-menu">
                <ul>
                <li><a href="#">Search</a></li>
                <li><a href="#">How it Works</a></li>
                <li><a href="#">For Clients</a></li>
                <li><a href="#">For OD Professionals</a></li>
                <li class="sign-in"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','images/sign-h.jpg',1)"><img src="images/sign.jpg" name="Image15" width="66" height="24" border="0"></a></li>
                </ul>
      </div>
    </div>
    <div class="clear"></div>
</div>
<div class="container">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" border="0"></a></div>
    <div class="realize">
    	<h4>Realize your full potential</h4>
        <div class="b-line" align="right"><img src="images/b-line.jpg" alt=""></div>
        <div class="rlze-right"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','images/s-icon1-h.png',1)"><img src="images/s-icon1.png" alt="" name="Image22" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','images/s-icon2-h.png',1)"><img src="images/s-icon2.png" alt="" name="Image23" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','images/s-icon3-h.png',1)"><img src="images/s-icon3.png" alt="" name="Image24" width="24" height="30" border="0"></a></div>    
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">

<!--<div class="create-job-menu">
	<ul>
    	<li class="ab"><a href="#" class="actv">1. Create your job</a></li>
     	<li><a href="#">hhh</a></li>
     	<li class="ac"><a href="#">hhh</a></li>
    
    
    </ul>



</div>-->





<div class="menu">
					<ul class="glossymenu">
						<li class="active"><a href="index.html">1. Create your job<span>&nbsp;</span></a></li>
						<li><a href="aboutus.html">2. Select posting type <span>&nbsp;</span></a></li>
						<li><a href="courses.html">3. Preview<span>&nbsp;</span></a></li>
						
					</ul>
			
				</div>

<div class="clear"></div>





<div class="clear"></div>

<div class="Total-Div-Box">


<div class="create-job-im"><img src="images/create-job-im.png"  alt="" border="0"></div>
   <div class="clear"></div> 
    <p>Describe the job or list the skills you're looking for.</p>
    
    
<aside class="leftCol-post">

<form action="" method="get">
    
    <div class="form-Div">
    	<div class="name-your-job">
        	<p>name your job :</p>
            
            <input name="" type="text">
            <div class="clear"></div>
            <span>75 characters left</span>
        
        
        
        <div class="clear"></div>
        </div>
    
    
    <div class="total-radioDiv">
  		<div class="radio-btn">
        <span><input name="" type="radio" value="" checked></span>
        Leadership Coaching 
        </div>
  
    <div class="clear"></div>
    </div>
    
    
    <div class="total-radioDivR">
    
    <div class="radio-btn1">
        <span><input name="" type="radio" value="" ></span>Workshops, Facilitation and Assessments</div>
    
    <div class="clear"></div>
    </div>
    
    <div class="clear"></div>
    
    
    
    <div class="describe">
        	<p>Describe it:</p>
            
            <textarea name="" cols="" rows=""></textarea>
          <div class="clear"></div>
          
          <div class="layer1">
<p class="heading">Add Attachment <img src="images/small-plus.jpg" width="9" height="9" alt="" border="0"></p>
<div class="content"><input name="" type="file"></div>

</div>
            
            
            <div class="expR">4000 charecters left</div>
        
        
        
        <div class="clear"></div>
        
       <div class="req-skills">
       <p>(optional)<span>Request specific skills or needs </span></p>
       
       <div class="chkDiv"><span><input name="" type="checkbox" value=""></span>PHP</div>
       <div class="chkDiv"><span><input name="" type="checkbox" value=""></span>MySQL</div>
       
       <div class="chkDiv"><span><input name="" type="checkbox" value=""></span>JAVA</div>
       <div class="chkDiv"><span><input name="" type="checkbox" value=""></span>.NET</div>
       
       
       
       <div class="clear"></div>  
       </div> 
       
       
       <div class="total-priceG">
       <p>Pricing:</p>
        <div class="clear"></div>
       
       
 	<div class="icG"><input name="" type="radio" value=""></div>
    <div class="ic-pG">Maximum Contract Value </div>
    <div class="dollarG">$ <span><input type="text" name=""></span></div>
   
   <div class="clear"></div>
   
   
   
   
   
   
   
   
   </div>
       
       
        <div class="total-priceG">
       
 	<div class="icG"><input name="" type="radio" value="" checked></div>
    <div class="ic-pG">Hourly</div>
    <div class="dollarG1">$ <span>
    
  <select name="select" id="select">
      <option>-Select One-</option>
      <option>aaa</option>
      <option>aaa</option>
      </select>  
</span></div>
    
   <div class="clear"></div>
   
   </div>
        
            <div class="clear"></div>  
        
       <div class="locationDiv">
       <div class="locationDivP">Location, Visibility and Other Options -</div>
       
       <div class="show-hide">
       
       <div class="layer1-a">
<p class="heading-a">Show</p>
       <div class="content-a">
       <h3>Job Posting Visibility</h3>
       
       <div class="publicTotal">
       <p><span><input name="" type="radio" value=""></span>Public- Visible to everyone</p>
       	<div class="pub-sub">
        <span><input name="" type="checkbox" value=""></span>Get more proposals.
        
        </div>
       
       <div class="clear"></div>   
       
       </div>
       
       <div class="publicTotal">
       <p><span><input name="" type="radio" value=""></span>Invite only - Do not show list.Only candidates I invite can respond.</p>
       <div class="clear"></div>   
       
       </div>
       
       <h3>Prefered Candidate Location</h3>
       
       <div class="publicTotal">
       <p><span><input name="" type="checkbox" value=""></span>I prefered candidate from certain location(s).</p>
       <div class="clear"></div>   
       
       </div>
       
       <h3>Post This Job For</h3> 
       
      <div class="dr-2">
      <span>
    <div class="dropdown-d2">
	<a class="account-d2" >
	<span>15 days</span>
	</a>
	<div class="submenu-d2" style="display: none; ">

	  <ul class="root">
<li >
	      <a href="#Dashboard" >Dashboard</a>
	    </li>

	    
	    <li >
	      <a href="#Profile" >Profile</a>
	    </li>
	   <li >

	      <a href="#settings">Settings</a>
	    </li>
	   

	    <li>
	      <a href="#feedback">Send Feedback</a>
	    </li>



	    <li>
	      <a href="#signout">Sign Out</a>
	    </li>
	  </ul>
	</div>
	</div>
  
</span></div>

      <div class="clear"></div>   
       
        <h3>Propopsed Start Date</h3>   
        
        <div class="publicTotal">
       <p><span><input name="" type="radio" value=""></span>Start immediately after proposal is selected.</p>
       <div class="clear"></div>   
       
       </div>
        
       <div class="clear"></div>         
        
        
        <div class="calD-total">
        <div class="radio-sec">
        <span><input name="" type="radio" value=""></span>Job will start on
        
        </div>
        
        
       <div class="calDiv" style="position:relative;">
 <input type="text" id="mydate2" gldp-id="mydate2" />
    <div gldp-el="mydate2"
      style="width:260px; height:160px; position:absolute; top:70px; left:30px;">
    </div>
    
    <span class="calDiv-icon"><img src="images/calendar.png" width="18" height="17" alt="" border="0"></span>
  
  <div class="clear"></div>
</div>     

</div>
      <div class="clear"></div>    
       
       </div>
 <div class="clear"></div>  
</div>
        <div class="clear"></div>  
       </div>

       
        <div class="clear"></div>  
       </div> 
        
        
         <div class="clear"></div>  
         
         
       <div class="continue-btn"><a href="#">continue</a></div> 
         
            <div class="clear"></div>      
        </div>
    
    
    
    
    
    
    
    
    </div>
    

<div class="clear"></div>
</form>
<div class="clear"></div>
</aside>

<aside class="expR">
<img src="images/ad.png" alt="" width="301" height="398" border="0">
<div class="clear"></div>
</aside>

<div class="clear"></div>
</div>
<div class="clear"></div>



</section>


<section class="blue-bg">
	<div class="container">
        <article class="left-part">
        	<h3>Latest News</h3>
            <ul>
            	<li><p><a href="#">Lorem Ipsum is simply dummy text</a></p> 
of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
              <li><p><a href="#">Lorem Ipsum is simply dummy text</a></p> 
of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
             <li class="more"><a href="#">More...</a></li>

            </ul>
        </article>
        <article class="right-part">
       	  <div class="v-txt">
           	<h3>Latest News</h3>
              Lorem Ipsum is simply dummy text of the printing and typesetting <br>
              <br>
            industry. 

Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
              <p class="more"><a href="#">More...</a></p>
          </div>
            <div class="video"><img src="images/video.jpg" alt=""></div>
        </article>
        <div class="clear"></div>
    </div>
</section>
<footer class="footer">
	<div class="container">
       <div class="f-left"><a href="#"><img src="images/f-logo.png" alt="" width="168" height="55" border="0"></a></div>
      <div class="f-mid">
      	<div><a href="#">Home</a> <a href="#">About Us</a> <a href="#">Testimonials</a> <a href="#">Terms of Service</a></div>
        <div class="copy">&copy; Copyright.All right reserved. Privacy Policy.Powered by <a href="#" style="padding:0px; text-decoration:underline;">ArcInfotech</a></div>
      </div>
      <div class="f-right">
      <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','images/s-icon1-h.png',1)"><img src="images/s-icon1.png" name="Image17" width="24" height="30" border="0"></a>
      <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','images/s-icon2-h.png',1)"><img src="images/s-icon2.png" name="Image18" width="24" height="30" border="0"></a>
      <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image19','','images/s-icon3-h.png',1)"><img src="images/s-icon3.png" name="Image19" width="24" height="30" border="0"></a></div>
      
      <div class="clear"></div>
  </div>
</footer>

<script>  
function changeValue(val)  
{  
 $('#selector').html(val);  
}  
</script> 
<script>  
function changeValue(val)  
{  
 document.getElementById('selector').innerHTML = val;  
}  
</script>  
</body>
</html>


