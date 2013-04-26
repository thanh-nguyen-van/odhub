<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($title)) echo ucfirst($title); ?></title>
<meta name="keywords" content="<?php if(isset($meta_keywords)) echo $meta_keywords; ?>"  />
<meta name="description" content="<?php if(isset($meta_description)) echo $meta_description; ?>" />
<meta name="content-type" content="<?php if(isset($meta_content)) echo $meta_content; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_images_js_base_url();?>css/style.css">
<link rel="stylesheet" href="<?php echo css_images_js_base_url();?>css/button_in.css" type="text/css" media="screen">
<script type="text/javascript" src="<?php echo css_images_js_base_url();?>js/jquery-1.9.0.min.js"></script>
<script src="<?php echo css_images_js_base_url();?>js/respond.min.js"></script>
<script type="text/javascript" src="<?php echo css_images_js_base_url();?>js/jquery.validate.min.js"></script>

<script type="text/javascript" src="<?php echo css_images_js_base_url();?>js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo css_images_js_base_url();?>js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo css_images_js_base_url();?>js/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script type="text/javascript" src="<?php echo css_images_js_base_url();?>js/customInput.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo css_images_js_base_url();?>css/customInput.css" />

<script src="<?php echo css_images_js_base_url();?>js/ui/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo css_images_js_base_url();?>css/themes/base/jquery.ui.all.css" />

<script src="<?php echo css_images_js_base_url();?>js/jquery.timepicker.js"></script>
<link rel="stylesheet" href="<?php echo css_images_js_base_url();?>css/jquery.timepicker.css" />

<script src="<?php echo css_images_js_base_url();?>js/jquery-ui-timepicker-addon.js"></script>

<script type="text/javascript"  src="<?php echo css_images_js_base_url();?>raty-master/lib/jquery.raty.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo css_images_js_base_url();?>images/favicon.png">
    
    
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
</script>
    
    
    
</head>
<body>