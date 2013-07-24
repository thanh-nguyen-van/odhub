
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

<body onLoad="MM_preloadImages('<?php echo css_images_js_base_url();?>images/sign-h.jpg','<?php echo css_images_js_base_url();?>images/fdbk-h.png','<?php echo css_images_js_base_url();?>images/nd-hlp-h.png','<?php echo css_images_js_base_url();?>images/s-icon1-h.png','<?php echo css_images_js_base_url();?>images/s-icon2-h.png','<?php echo css_images_js_base_url();?>images/s-icon3-h.png','<?php echo css_images_js_base_url();?>images/get-bl-h.png','<?php echo css_images_js_base_url();?>images/crt_f-h.png')">
<header>


<div class="clear"></div>
<div class="banner1 b-n">
	<div class="container">
        <div class="bner-lft lft-p lft-np"><img src="<?php echo css_images_js_base_url();?>images/header-img2.png" alt="" border="0"></div>
        <div class="b-rgt1 bner-right br-p ">
        	<h4><?=$professional['0']['title']?></h4>
            <div class="txt2-2 txt2 "><?=$professional['0']['content']?></div>
        	<div class="btn-1" align="right"><a href="<?=base_url()?>login/prof_signup" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image20','','<?php echo css_images_js_base_url();?>images/crt_f-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/crt_f.png" alt="" name="Image20" width="260" height="49" border="0"></a></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</header>
<section class="container">
  <div class="parts p-1">
        <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/img5.jpg" alt="" border="0" ></div>
        <div class="rit-txt ">
        <h1><?=$professional['1']['title']?></h1>
        <p><?=$professional['1']['content']?></p>
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
        <h1><?=$professional['2']['title']?></h1>
        <p><?=$professional['2']['content']?></p>
        </div>
        <div class="rht-img" align="right"><img src="<?php echo css_images_js_base_url();?>images/img1.jpg" border="0"></div>
        <div class="clear"></div>
  </div> 
  <div class="parts p-1">
        <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/img2.jpg" border="0"></div>
        <div class="rit-txt">
        <h1><?=$professional['3']['title']?></h1>
        <p><?=$professional['3']['content']?></p>
        </div>
        <div class="clear"></div>
  </div>
  <div class="parts p-1">
        <div class="lft-txt">
        <h1><?=$professional['4']['title']?></h1>
        <p><?=$professional['4']['content']?></p>
        </div>
        <div class="rht-img" align="right"><img src="<?php echo css_images_js_base_url();?>images/img3.jpg" alt=""></div>
        <div class="clear"></div>
  </div> 
  <div class="parts p-1">
        <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/img4-2jpg.jpg" alt="" border="0"></div>
        <div class="rit-txt">
        <h1><?=$professional['5']['title']?></h1>
        <p><?=$professional['5']['content']?></p>
        </div>
        <div class="clear"></div>
  </div> 
  <div align="right"><a href="<?=base_url()?>login/prof_signup" target="_blank" onMouseOver="MM_swapImage('Image21','','<?php echo css_images_js_base_url();?>images/get-bl-h.png',1)" onMouseOut="MM_swapImgRestore()"><img src="<?php echo css_images_js_base_url();?>images/get-bl.png" alt="" name="Image21" width="182" height="49" border="0"></a></div>  
</section>
<section class="black-part">
	<div class="container">
    	<div>
        <h1>How it Works</h1>
        <div class="r-box-bg">If you refer a client who establishes a $2,500 contract, you receive a $200 Colleague Referral Commission.  Your colleague makes $2,050 from the referred client.</div>
        When you receive a referred client, you pay a commission on all billing for this  client (approximately 18% on most clients). The commission is subtracted from you invoice as follows :
          <ul>
          	<li>10% OD Hub community fees</li>
            <li>Colleague Referral Commission of $40 for every $500 you bill*</li>
            
          </ul>	
          <p class="recv">You receive a new client, your colleagues benefit.</p>
          <h2>Referring Clients to the Community earns commissions of up to 8% </h2>
          When you refer a client and that person selects an OD Professional on the site, you will receive a Colleague Referral Commission on all work between your colleague and the client. This commission is $40 for every $500 billed. 
The client finds the right professional for their needs; everyone benefits.<span class="recv">The client finds the right professional for their needs; everyone benefits.</span>
        </div>
        <div class="clear"></div>
      <div>
        <div class="blk-img"><img src="<?php echo css_images_js_base_url();?>images/bk-img.jpg" alt="" border="0"></div>
        <h2>Online Invoicing and Payments</h2>
If you like the Online Invoicing that you utilize for Referred Clients, you can utilize it for all of your clients. Simply add your clients to the site (these clients are kept private to you and do not get a login unless you request) and then start sending invoices. These is no fee for those that pay directly to you and the fee for online payments through OD Hub is just 3.5% to cover credit card fees and operational costs.  
        <h2>Referring Colleagues to the Community</h2>
        Receive a $75 account credit when you refer an OD Professional who registers on the site. These credits can be applied toward OD Hub community fees or Colleague Referral Commissions. These can also be paid out directly when the referred colleague finds work on the site and initiates a contract.  <p class="recv">Your colleague gets a new client; you benefit from  building the community.</p>. </div>
      <h2>The OD Hub Community Gives Back</h2>
        OD Hub believes in paying it forward and donates 15% of all profits to Dress for Success, whose mission is to promote the economic independence of disadvantaged women by providing professional attire, a network of support and the career development tools to help women thrive in work and in life.
        <h2>OD Hub Community Fees</h2>
        The OD Hub keeps 10% of all referred client matches to cover operational, IT, and credit card expenses associated with the online invoicing of referred clients. Donations for Dress for Success are made from these funds.
     	<h2>What do I have to do? </h2>
      <ul>
          	<li>Completing Statements of Work for ALL client work that comes from OD Hub (failure to do so will result in removal from the site).</li>
            <li style="background-position:top left;">Utilize the online invoicing for all referred clients. Simple and intuitive, our online invoicing can be automated based on your Statement of Work (*you are not required to receive payments through OD Hub, but there is no extra cost).</li>
            
          </ul>
      <div class="clear"></div>
    </div>
</section>
<div class="clear"></div>