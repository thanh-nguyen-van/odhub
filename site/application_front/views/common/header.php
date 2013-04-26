<header>
<div class="top-header_bg">
<div class="fdbk"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','<?php echo css_images_js_base_url();?>images/fdbk-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/fdbk.png" name="Image17" width="56" height="196" border="0"></a></div>
<div class="nd-hlp"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','<?php echo css_images_js_base_url();?>images/nd-hlp-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/nd-hlp.png" name="Image18" width="69" height="227" border="0"></a></div>
	<div class="container">
        <div class="top-left-sign">
        <?php if(isset($_SESSION[USER_SESSION_ID]) and $_SESSION[USER_SESSION_ID] != ""){ ?>
        	<span>Welcome <?php echo $_SESSION[USER_SESSION_FULLNAME] ?>, <a href="<?php echo site_url('client/show_home'); ?>">My Account</a></span>
        <?php }else{ ?>
        	<span><a href="<?php echo site_url('login/signup'); ?>">Sign  up</a></span>  for  a  free  account  today
        <?php } ?>
        </div>
        
        <nav class="main-menu">
                <ul>
                <li><a href="<?php echo site_url('home/index'); ?>">Home</a></li>
                <li><a href="<?php if(isset($content_menu['howit_works'])) echo site_url('static_content/index/'.$content_menu['howit_works']['StaticPageId']); ?>">
						<?php if(isset($content_menu['howit_works']['StaticPageName'])) echo $content_menu['howit_works']['StaticPageName'] ?>
                    </a></li>
                <li><a href="#">For Clients</a></li>
                <li><a href="#">For OD Professionals</a></li>
                <li class="sign-in">
                <?php if(isset($_SESSION[USER_SESSION_ID]) and $_SESSION[USER_SESSION_ID] != ""){ ?>
                  <a href="<?php echo site_url('login/signout'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','<?php echo css_images_js_base_url();?>images/logout-h.jpg',1)"><img src="<?php echo css_images_js_base_url();?>images/logout.jpg" name="Image15" width="66" height="24" border="0"></a></li>
                <?php }else{ ?>
                  <a href="<?php echo site_url('login/signin'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','<?php echo css_images_js_base_url();?>images/sign-h.jpg',1)"><img src="<?php echo css_images_js_base_url();?>images/sign.jpg" name="Image15" width="66" height="24" border="0"></a></li>
                <?php } ?>
                </ul>
      </nav>
    </div>
    <div class="clear"></div>
</div>
<div class="container">
    <div class="logo"><a href="<?php echo site_url('home/index'); ?>"><img src="<?php echo css_images_js_base_url();?>images/logo.png" alt="" border="0"></a></div>
    <div class="realize">
    	<h4>Realize your full potential</h4>
        <div class="b-line" align="right"><img src="<?php echo css_images_js_base_url();?>images/b-line.jpg" alt=""></div>
        <div class="rlze-right"><a href="<?php echo site_url('login/signin'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','<?php echo css_images_js_base_url();?>images/s-icon1-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon1.png" alt="" name="Image22" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','<?php echo css_images_js_base_url();?>images/s-icon2-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon2.png" alt="" name="Image23" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','<?php echo css_images_js_base_url();?>images/s-icon3-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon3.png" alt="" name="Image24" width="24" height="30" border="0"></a></div>    
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>