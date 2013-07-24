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
	function get_for_client()
	{
	  $this->db->select('*');
		$this->db->from('lm_for_client');
		return $this->db->get()->result_array();
	}function get_for_professional()
	{
	  $this->db->select('*');
		$this->db->from('lm_for_professional');
		return $this->db->get()->result_array();
	}
	
	function get_foot_video()
	{
		$this->db->select('video_file');
		$this->db->from('im_home_video');
		return $this->db->get()->row_array();
	}
	function insert_feedback($feedback_data){

		if($this->db->insert('lm_user_feedback', $feedback_data))
		return true;
		else
		return false; 
	}
	
}

/* End of file upload.php */
/* Location: ./application_front/controllers/upload.php */