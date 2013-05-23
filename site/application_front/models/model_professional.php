<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_professional extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function get_professional_data($prof_id)
	{
		$table_name  = "lm_professionaldetail_tbl";
		$select_flds = "*";
		$condition	 = "ProfessionalId = '".$prof_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}
    
    public function getAllProfessional($final_qry_str){
          
        $_tablename = 'lm_professionaldetail_tbl';
          
          $sql_getAllProfessional = "select * from `".$_tablename."` `lpt` where ".$final_qry_str;
          $result = $this->db->query($sql_getAllProfessional);
          
          $data_result = $result->result();  
           
          return $data_result;
    }
    
    public function get_professional_skills($prof_id)
	{
		$table_name  = "professional_skill_map";
		$select_flds = "*";
		$condition	 = "professional_id = '".$prof_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}    
    
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */