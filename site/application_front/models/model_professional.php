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
        // -------------Select current user referrel code ------------//
        
            $this->db->select("referral_code");    
            $this->db->from("lm_professionaldetail_tbl"); 
            $this->db->where("ProfessionalId",$professionalUserId);
            $result2 = $this->db->get()->row_array();
          // -------------Select current user referrel code ------------//
          // -------------Select referrel professional details ------------//
         
            $this->db->select("*");
            $this->db->from("lm_professionaldetail_tbl");
            $this->db->where(array("p_user"=>$result2['referral_code']));
            return $this->db->get();
         // -------------Select referrel professional details ------------//    
        }
		public function get_project_data($projectId,$proffesionalID)
        {
			$this->db->select("post_by");    
            $this->db->from("project_details"); 
            $this->db->where("project_id",$projectId);
            $result2 = $this->db->get()->row_array();
		$clientID = $result2['post_by'];
		$sql_get_project_details = "select pro.* , clnt.* ,proj.project_name from `project_aword_map` AS pro , `lm_clientdetail_tbl` AS clnt , `project_details` AS proj where pro.`project_id`='".$projectId."' AND pro.`proffetional_id`='".$proffesionalID."' AND clnt.ClientId = '".$clientID."' AND proj.project_id='".$projectId."'";
        $project_result = $this->db->query($sql_get_project_details);
		return $project_result->row_array();
           
        }
     public function checkIfReferred($project_id){
            $this->db->select("count(*)");    
            $this->db->from("project_aword_map"); 
            $this->db->where("project_id",$project_id);
        }
	public function SaveInvoiceData($invoiceData){
		$invoiceNumber = "INV".rand();
		$Invoicedate = date("Y-m-d H:i:s");
		$sql_invoice_query = "INSERT INTO `lm_invoice` (`project_id`, `client_id`, `professional_id`, `invoice_number`, `cr_date`, `amount`) VALUES ('".$invoiceData['project_id']."', '".$invoiceData['ClientId']."', '".$invoiceData['proffessionalId']."', '".$invoiceNumber."', '".$Invoicedate."', '".$invoiceData['amount']."')";
		$this->db->query($sql_invoice_query);
		//redirect('professional/show_home');
		}
		
		
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */