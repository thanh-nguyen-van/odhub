<div class="brk-line"></div>
</header>
<section class="container">
	<div class="in-left">
    	<div class="category">
          <ul>
          <?php foreach($left_menu as $each_leftmenu){ ?>
            <li>
            <a href="<?php echo site_url('static_content/index/'.$each_leftmenu['StaticPageId']) ?>" class=""> 
				<?php echo $each_leftmenu['StaticPageName'] ?> 
            </a>
            </li>
          <?php } ?>
           
          </ul>
        </div>
    </div>