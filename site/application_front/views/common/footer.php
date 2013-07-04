<?php /*?>
<link rel="stylesheet" href="<?php echo css_images_js_base_url();?>css/video-js.css" />

<script src="<?php echo css_images_js_base_url();?>js/video.js"></script><?php */?>
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
            <div class="video">
            
            <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100"
              poster="http://video-js.zencoder.com/oceans-clip.png"
              data-setup="{}">
            <source src="<?=file_upload_base_url()."video/".$video['video_file']?>" type='video/mp4' />
         <!--  /* <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
            <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
            <track kind="captions" src="demo.captions.vtt" srclang="en" label="English" />*/-->
          </video>
            
            <!--<a href="http://youtu.be/uuoBnTc2dYo"><img src="<?php echo css_images_js_base_url();?>images/video.jpg" alt=""></a>-->
            
            </div>
        </article>
        <div class="clear"></div>
    </div>
</section>
<footer class="footer">
	<div class="container">
       <div class="f-left"><a href="#"><img src="<?php echo css_images_js_base_url();?>images/f-logo.png" alt="" width="168" height="55" border="0"></a></div>
      <div class="f-mid">
      	<div>
          <a href="<?php echo site_url('home/index'); ?>">Home</a> 
          <a href="<?php if(isset($content_menu['about_us'])) echo site_url('static_content/index/'.$content_menu['about_us']['StaticPageId']); ?>">
            <?php if(isset($content_menu['about_us'])) echo $content_menu['about_us']['StaticPageName']; ?>
          </a> 
          <a href="<?php echo site_url('testimonial/Mytestimonial'); ?>">Testimonials</a> 
          <a href="<?php if(isset($content_menu['terms_of_service'])) echo site_url('static_content/index/'.$content_menu['terms_of_service']['StaticPageId']); ?>">
            <?php if(isset($content_menu['terms_of_service'])) echo $content_menu['terms_of_service']['StaticPageName']; ?>
          </a>
        </div>
        <div class="copy">
          &copy; Copyright.All right reserved. Privacy Policy.Powered by 
          <a target="_blank" href="http://arcinfotec.com" style="padding:0px; text-decoration:underline;">ArcInfotech</a>
        </div>
      </div>
      <div class="f-right">
      <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','<?php echo css_images_js_base_url();?>images/s-icon1-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon1.png" name="Image17" width="24" height="30" border="0"></a>
      <a href="<?if(isset($_SESSION['USER_SESSION_LINKED_IN'])){ print($_SESSION['USER_SESSION_LINKED_IN']);}?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','<?php echo css_images_js_base_url();?>images/s-icon2-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon2.png" name="Image18" width="24" height="30" border="0"></a>
      <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image19','','<?php echo css_images_js_base_url();?>images/s-icon3-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon3.png" name="Image19" width="24" height="30" border="0"></a></div>
      
      <div class="clear"></div>
  </div>
</footer>
