<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_location extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function get_country_data($country_id)
	{
		$table_name  = "lm_country_tbl";
		$select_flds = "*";
		$condition	 = "CountryId = '".$country_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}
	
	public function get_state_data($state_id)
	{
		$table_name  = "lm_state_tbl";
		$select_flds = "*";
		$condition	 = "StateId = '".$state_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}
	
	
	
}





/* End of file model_location.php */
/* Location: ./application_front/models/model_location.php */