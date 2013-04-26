<?php
class MY_Controller extends CI_Controller
{
  	var $data;
  	var $header_data;
	var $topmenu_data;
    var $leftmenu_data;
  	var $middle_data;
	var $footer_data;
    var $footer_contents;
	
	function __construct($props = array())
	{
		parent::__construct($props);
		$this->data			 = array();
		$this->header_data	 = array();
		$this->topmenu_data  = array();
        $this->leftmenu_data =array();
  		$this->middle_data	 = array();
		$this->footer_data	 = array();
	}

}
?>
