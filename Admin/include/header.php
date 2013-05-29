<!doctype html>
<html class="">
<head>
<meta charset="utf-8">

<title>od-hub</title>
<link rel="stylesheet" href="<?php echo $publicURL;?>css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $publicURL;?>css/button_in.css" type="text/css" media="screen">


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
$(document).ready(function(){
    $('#header_signup').hover(function(){
        
    });
});
</script>
</head>
<body onLoad="MM_preloadImages('<?php echo $publicURL;?>images/sign-h.jpg','<?php echo $publicURL;?>images/fdbk-h.png','<?php echo $publicURL;?>images/nd-hlp-h.png','<?php echo $publicURL;?>images/y-btn-h.png','<?php echo $publicURL;?>images/bl-h.png','<?php echo $publicURL;?>images/s-icon1-h.png','<?php echo $publicURL;?>images/s-icon2-h.png','<?php echo $publicURL;?>images/s-icon3-h.png')">
<header>
<div class="top-header_bg">
<?php if(strstr($_SERVER['PHP_SELF'],'index.php')){?>
<div class="fdbk"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','<?php echo $publicURL;?>images/fdbk-h.png',1)"><img src="<?php echo $publicURL;?>images/fdbk.png" name="Image17" width="56" height="196" border="0"></a></div>
<div class="nd-hlp"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','<?php echo $publicURL;?>images/nd-hlp-h.png',1)"><img src="<?php echo $publicURL;?>images/nd-hlp.png" name="Image18" width="69" height="227" border="0"></a></div>
<?php }?>
	<div class="container">
        <div class="top-left-sign"><span><a href="../site/login/signup" id="header_signup">Sign  up</a></span>  for  a  free  account  today</div>
        <nav class="main-menu">
                <ul>
                <li><a href="<?php echo $siteURL?>">Home</a></li>
                <li><a href="HowItWorks.php">How it Works</a></li>
                <li><a href="#">For Clients</a></li>
                <li><a href="#">For OD Professionals</a></li>
                <li class="sign-in"><a href="Login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','images/sign-h.jpg',1)"><img src="<?php echo $publicURL;?>images/sign.jpg" name="Image15" width="66" height="24" border="0"></a></li>
                </ul>
      </nav>
    </div>
    <div class="clear"></div>
</div>
<div class="container">
    <div class="logo"><a href="<?php echo $siteURL ?>"><img src="<?php echo $publicURL;?>images/logo.png" alt="" border="0"></a></div>
    <div class="realize">
    	<h4>Realize your full potential</h4>
        <div class="b-line" align="right"><img src="<?php echo $publicURL;?>images/b-line.jpg" alt=""></div>
        <div class="rlze-right"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','<?php echo $publicURL;?>images/s-icon1-h.png',1)"><img src="<?php echo $publicURL;?>images/s-icon1.png" alt="" name="Image22" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','<?php echo $publicURL;?>images/s-icon2-h.png',1)"><img src="<?php echo $publicURL;?>images/s-icon2.png" alt="" name="Image23" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','<?php echo $publicURL;?>images/s-icon3-h.png',1)"><img src="<?php echo $publicURL;?>images/s-icon3.png" alt="" name="Image24" width="24" height="30" border="0"></a></div>    
    </div>
    <div class="clear"></div>
</div>