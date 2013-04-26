<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_client extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function get_client_data($client_id)
	{
		$table_name  = "lm_clientdetail_tbl";
		$select_flds = "*";
		$condition	 = "ClientId = '".$client_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */