<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_testimonial extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_testimonial()
	{
	  $sql_testmonial="Select * from lm_testimonials_tbl";
	  $result = $this->db->query($sql_testmonial);
      $data_result = $result->result_array();  
      return $data_result;
	}
	
}

/* End of file upload.php */
/* Location: ./application_front/controllers/upload.php */