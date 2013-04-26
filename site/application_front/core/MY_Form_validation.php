<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_CI_Form_validation extends CI_Form_validation {

	var $CI;

	/**
	 * Constructor
	 */
	public function __construct($rules = array())
	{
		parent::__construct($props);
	}

}
// END Form Validation Class

/* End of file Form_validation.php */
/* Location: ./system/libraries/Form_validation.php */