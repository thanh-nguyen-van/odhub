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
        public function getMyAwardedProjects($professionalUserId)
        {
            $this->db->select("*");
            $this->db->from("project_aword_map");
            $this->db->where(array("project_aword_map.proffetional_id"=>$professionalUserId,"project_aword_map.ipn_track_id !="=>''));
            $this->db->join('project_details', 'project_details.project_id = project_aword_map.project_id', 'left');
            $this->db->join('proposal', 'proposal.proposal_id = project_aword_map.proposal_id', 'left');
            $this->db->join('lm_clientdetail_tbl', 'lm_clientdetail_tbl.ClientId = project_details.post_by', 'left');
            $this->db->order_by('project_aword_map.aword_id','desc');
            $result =  $this->db->get();
            //echo $this->db->last_query();
            return  $result;
            
            
        }
        public function getMyReferals($professionalUserId)
        {
            //$qry = $this->db->query("SELECT * FROM lm_professionaldetail_tbl where p_user in(select referral_code from lm_professionaldetail_tbl where ProfessionalId='".$professionalUserId."')");
           
            $this->db->select("referral_code");    
            $this->db->from("lm_professionaldetail_tbl"); 
            $this->db->where("ProfessionalId",$professionalUserId);
            $result2 = $this->db->get()->row_array();
          
            //print_r($result2);
            $this->db->select("*");
            $this->db->from("lm_professionaldetail_tbl");
            $this->db->where(array("p_user"=>$result2['referral_code']));
            return $this->db->get();

        }
    
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */