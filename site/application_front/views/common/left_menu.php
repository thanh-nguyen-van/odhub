<div class="brk-line"></div>
</header>
<section class="container">
	<div class="in-left">
    	<div class="category">
          <ul>
          <?php foreach($left_menu as $each_leftmenu){ ?>
            <li>
            <a href="<?php echo site_url('static_content/index/'.$each_leftmenu['StaticPageId']) ?>" class="<?php if($each_leftmenu['StaticPageId'] == $page_id) echo "current" ?>"> 
				<?php echo $each_leftmenu['StaticPageName'] ?> 
            </a>
            </li>
          <?php } ?>
            <!--<li><a href="#">Overview</a></li>
            <li><a href="#">See all accounts</a></li>
            <li><a href="#">Auto categorization</a></li>
            <li><a href="#">Easy budgeting</a></li>
            <li><a href="#">Timely alerts</a></li>
            <li><a href="#">Safe and secure</a></li>
            <li><a href="#">What's free</a></li>
            <li><a href="#">Helpful graphs</a></li>
            <li><a href="#">Achieve your goals</a></li>
            <li><a href="#">Find savings</a></li>
            <li><a href="#">Track investments</a></li>
            <li><a href="#">Mobile apps</a></li>
            <li><a href="#">Bill reminders</a></li>-->
          </ul>
        </div>
    </div>