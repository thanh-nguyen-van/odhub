<div class="banner">
	<div class="container">
        <div class="bner-lft"><img src="<?php echo css_images_js_base_url();?>images/header-img.png" alt="" border="0"></div>
        <div class="bner-right">
        	<h4>Connecting leaders and organizations to the best people in organizational development</h4>
            <div class="txt2">so everyone can realize their full potential; We leverage the power of the network to make development available to those that are less fortunate.</div>
        	<div class="btn"><a href="<?php echo site_url('search'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image20','','<?php echo css_images_js_base_url();?>images/y-btn-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/y-btn.png" alt="" name="Image20" width="257" height="50" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image21','','<?php echo css_images_js_base_url();?>images/bl-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/bl.png" alt="" name="Image21" width="221" height="50" border="0"></a></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</header>
<section class="container">

<?php 
				$num=0;	
				for($i=0;$i<count($home);$i++)
				{
					$z=$num++;
					if(($z%2) == 0)
					{
					
					?>
               
               
               
       <div class="parts">
      <div class="lft-img"><img src="<?php echo css_images_js_base_url();?>images/<?php  echo $home[$i]['image_path'] ?>" ></div>
        <div class="rit-txt">
        <h1><?php  echo $home[$i]['title'] ?></h1>
        <p><?php  echo $home[$i]['content'] ?></p>
        </div>
        <div class="clear"></div>
  </div>
		
<?php
					}
					else
					{
						?>
                      
                      
                      <div class="parts">
        <div class="lft-txt">
       <h1><?php  echo $home[$i]['title'] ?></h1>
        <p><?php  echo $home[$i]['content'] ?></p>
        </div>
      <div class="rht-img" align="right"><img src="<?php echo css_images_js_base_url();?>images/<?php  echo $home[$i]['image_path'] ?>" border="0"></div>
        <div class="clear"></div>
  </div>
                        
                        
                        <?php
					}
					
}
?>

  
  
  
      
</section>
<section class="line-brk">
	<div class="container">
    	<div align="center"><img src="<?php echo css_images_js_base_url();?>images/line-img.jpg" alt="" border="0"></div>
        <div class="total-box">
        <article class="box1">
      	 <h2>Clients Seeking OD/Coaching</h2>
         <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting...<a href="#">more</a></p>
         <div class="btns">
         <div class="lft-b"><span class="button-wrapper1 btn-small1"><input type="button" onClick="submitSearch()" value="Learn More" class="button1" name="search"></span>
</div>
         <div class="lft-b"><span class="button-wrapper1 btn-small1"><input type="button" onClick="submitSearch()" value="Get Started" class="button1" name="search"></span>
</div>
<div class="clear"></div>
         </div>
<div class="clear"></div>
      </article>
        <article class="box1">
      	 <h2>OD Professionals/Coaches</h2>
         <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting...<a href="#">more</a></p>
         <div class="btns">
             <div class="lft-b"><span class="button-wrapper2 btn-small2"><input type="button" onClick="submitSearch()" value="Learn More" class="button2" name="search"></span>
    </div>
             <div class="lft-b"><span class="button-wrapper2 btn-small2"><input type="button" onClick="submitSearch()" value="Get Started" class="button2" name="search"></span>
    </div>
             <div class="clear"></div>
         </div>
      </article>
      <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
</section>
<div class="clear"></div>