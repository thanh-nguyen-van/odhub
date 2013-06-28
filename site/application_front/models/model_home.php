<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_home extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_home()
	{
	  $sql_home="Select * from  im_home_page";
	  
	  $result = $this->db->query($sql_home);
      $data_result = $result->result_array();  
      return $data_result;
	}
	
	function get_foot_video()
	{
		$this->db->select('video_file');
		$this->db->from('im_home_video');
		return $this->db->get()->row_array();
	}
	
}

/* End of file upload.php */
/* Location: ./application_front/controllers/upload.php */