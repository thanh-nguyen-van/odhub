<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Input extends CI_Input 
{

	
	function __construct()
	{
		parent::__construct();
	}
	
	function loadVariable($name,$default)
	{
		if(isset($_REQUEST[$name]))
			return $_REQUEST[$name];
		else
			return $default;
	}


	function request($index = '', $default ='',$escaped = TRUE,$xss_clean = FALSE)
	{
		
		$data = $this->loadVariable($index,$default);

		if(is_array($data))
		{
			return $data;
		}
		
		if ($escaped === TRUE)
		{
			$data = inputEscapeString($data);
		}
		
		if ($xss_clean === TRUE)
		{
			$data = $this->xss_clean($data);
		}
		
		return trim($data);
	}
	
	
}
