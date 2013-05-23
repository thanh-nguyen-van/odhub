<?php
	$_SESSION['ci_click_logout'] = 1;	
	header("location:".$this->config->base_url()."../forum/ucp.php?mode=logout&sid=".$_SESSION['sid']);
?>