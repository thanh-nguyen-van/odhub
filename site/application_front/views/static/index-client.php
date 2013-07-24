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
<body onLoad="MM_preloadImages('<?php echo css_images_js_base_url();?>images/sign-h.jpg','<?php echo css_images_js_base_url();?>images/fdbk-h.png','<?php echo css_images_js_base_url();?>images/nd-hlp-h.png','<?php echo css_images_js_base_url();?>images/s-icon1-h.png','<?php echo css_images_js_base_url();?>images/s-icon2-h.png','<?php echo css_images_js_base_url();?>images/s-icon3-h.png','<?php echo css_images_js_base_url();?>images/get-s-h.png')">


<header>
<div class="clear"></div>
<div class="banner1">
	<div class="container">
        <div class="bner-lft b-left1"><img src="<?php echo css_images_js_base_url();?>images/header-img1.png" alt="" border="0"></div>
        <div class="b-rgt1 bner-right ">
        	<h4><?=$client['0']['title']?></h4>
            <div class="txt2-1 txt2 "><?=$client['0']['content']?></div>
        	<div class="btn-1"><a href="<?=base_url()?>login/signup" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image20','','<?php echo css_images_js_base_url();?>images/get-s-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/get-s.png" name="Image20" width="170" height="46" border="0"></a></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</header>

<section class="container">
  <div class="parts p-1">
        <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/img1-1.jpg" ></div>
        <div class="rit-txt ">
        <h1><?=$client['1']['title']?></h1>
        <p><?=$client['1']['content']?></p>
        <ul>
        	<li><a href="#">Leadership Coaching</a></li>
            <li><a href="#">Career Coaching</a></li>
            <li><a href="#">Myers-Briggs Type Indicator (MBTI)</a></li>
            <li><a href="#">Hermann Brain Dominance Instrument (HBDI)</a></li>
             <li><a href="#">DiSC</a></li>
            <li><a href="#">Workshop Facilitation</a></li>
            <li><a href="#">360 Assessment</a></li>
           <li><a href="#">Leadership On-Boarding</a></li>
             <li><a href="#">Emotional Intelligence</a></li>
            <li><a href="#">Strengths Finder</a></li>
            <li><a href="#">Hogan</a></li>
        </ul>
        </div>
        <div class="clear"></div>
  </div>
  <div class="parts p-1">
        <div class="lft-txt">
        <h1><?=$client['2']['title']?></h1>
        <p><?=$client['2']['content']?></p>
        </div>
        <div class="rht-img" align="right"><img src="<?php echo css_images_js_base_url();?>images/img3.jpg" border="0"></div>
        <div class="clear"></div>
  </div> 
  <div class="parts p-1">
        <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/img3-3.jpg" border="0"></div>
        <div class="rit-txt">
        <h1><?=$client['3']['title']?></h1>
        <p><?=$client['3']['content']?></p>
        </div>
        <div class="clear"></div>
  </div>
  <div class="parts p-1">
        <div class="lft-txt">
        <h1><?=$client['4']['title']?></h1>
        <p><?=$client['4']['content']?></p>
        </div>
        <div class="rht-img" align="right"><img src="<?php echo css_images_js_base_url();?>images/img4.jpg" alt=""></div>
        <div class="clear"></div>
  </div> 
  <div><a href="<?=base_url()?>login/signup" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image21','','<?php echo css_images_js_base_url();?>images/get-s-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/get-s.png" alt="" name="Image21" width="170" height="46" border="0"></a></div>   
</section>
<section class="line-brk">
	<div class="container">
    	<div align="center"><img src="<?php echo css_images_js_base_url();?>images/line-img.jpg" alt="" border="0"></div>
        
      <div class="clear"></div>
    </div>
</section>
<div class="clear"></div>
