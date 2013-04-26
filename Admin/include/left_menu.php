<?php 
require_once('include/connect.php');

$leftmenu_query="SELECT * FROM ".$table['staticpage']." where `StaticPageType`='left_menu' and `Status`='Y' order by `SortOrder` ";
$leftmenu_result=mysql_query($leftmenu_query);

?>
<div class="category">
            <ul>
            <?php while($leftmenu=mysql_fetch_array($leftmenu_result)) { ?>
            <li><a class="<? if($leftmenu['StaticPageId'] == $_REQUEST['menuId']) { echo 'current'; }?>" href="LeftMenuContent.php?menuId=<?=$leftmenu['StaticPageId']?>"><?=$leftmenu['StaticPageName']?></a></li>
            <?php } ?>
            </ul>
</div>

<!--<div class="category">
            <ul>
            <li><a href="#">Overview</a></li>
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
            <li><a href="#">Bill reminders</a></li>
            </ul>
</div>-->