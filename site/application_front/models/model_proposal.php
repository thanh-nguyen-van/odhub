<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_proposal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = "proposal";    
    }
    
    
    function add_proposal($data){
        $insert_str = "";
        $insert_str_tmp = "";
        $insert_str_arr = array();
        
        
        foreach($data as $key=>$val){
            $insert_str_tmp = "`".$key."`='".$val."'";
            array_push($insert_str_arr,$insert_str_tmp);
        }
        
        
        $insert_str = implode(',',$insert_str_arr);        
        $insert_str = $insert_str.",`proposed_date`='".date("Y-m-d H:i:s")."'";
        
        $insert_sql = "insert into `".$this->table_name."` set ".$insert_str;        
        
        $this->db->query($insert_sql);
        
        
        
    }
    
    
    
    function get_proposal($project_id){
        $sql_proposal_list = "select `pr`.`proposal_description`, `pr`.`attachment`,`lpt`.`ProfessionalId`,concat(`lpt`.`ProfessionalFirstname`,' ',`lpt`.`ProfessionalLastname`) `fullname`,`lst`.`StateName` from `".$this->table_name."` `pr` left join `lm_professionaldetail_tbl` `lpt` on `pr`.`proposed_by` = `lpt`.`ProfessionalId` left join `lm_state_tbl` `lst` on `lpt`.`ProfessionalState` = `lst`.`StateId` where `project_id` = '".$project_id."' AND `pr`.`proposed_by` = '".$_SESSION[USER_SESSION_ID]."'";
        $result = $this->db->query($sql_proposal_list);
        
        $data_result = $result->result();  
        
        return $data_result;
    }
	function get_proposals($project_id){
        $sql_proposal_list = "select `pr`.`proposal_id`,`pr`.`attachment`,`pr`.`proposal_description`,`pr`.`price`,`lpt`.`ProfessionalId`,concat(`lpt`.`ProfessionalFirstname`,' ',`lpt`.`ProfessionalLastname`) `fullname`,`lst`.`StateName`, (select count(*) from `project_aword_map` where `project_id`='".$project_id."') as `awords` from `".$this->table_name."` `pr` left join `lm_professionaldetail_tbl` `lpt` on `pr`.`proposed_by` = `lpt`.`ProfessionalId` left join `lm_state_tbl` `lst` on `lpt`.`ProfessionalState` = `lst`.`StateId` where `project_id` = '".$project_id."'";
        $result = $this->db->query($sql_proposal_list);
        
        $data_result = $result->result();  
        
        return $data_result;
    }
	function get_proposal_byuser($project_id){
       $sql_proposal_list = "select `pr`.`proposal_id`,`pr`.`attachment`,`pr`.`proposal_description`,`pr`.`price`,`lpt`.`ProfessionalId`,concat(`lpt`.`ProfessionalFirstname`,' ',`lpt`.`ProfessionalLastname`) `fullname`,`lst`.`StateName`, (select count(*) from `project_aword_map` where `project_id`='".$project_id."') as `awords` from `".$this->table_name."` `pr` left join `lm_professionaldetail_tbl` `lpt` on `pr`.`proposed_by` = `lpt`.`ProfessionalId` left join `lm_state_tbl` `lst` on `lpt`.`ProfessionalState` = `lst`.`StateId` where `project_id` = '".$project_id."'";
      $result = $this->db->query($sql_proposal_list);
        
        $data_result = $result->result();  
        return $data_result;
    }
	
    
    function update_award_data($aword_id){
        $payment_date        = inputEscapeString($this->input->request('payment_date'));
        $price        = inputEscapeString($this->input->request('mc_gross'));
        $ipn_track_id        = inputEscapeString($this->input->request('auth'));
        
        $sql_update_aword = "update `project_aword_map` set `payment_date`='".$payment_date."',`price`='".$price."',`ipn_track_id`='".$ipn_track_id."' where `aword_id`='".$aword_id."'";
        $this->db->query($sql_update_aword);
        return true;
    }
    
	
	function insert_award_data($data=array())
	{
        $professionalid	= inputEscapeString($this->input->request('professionalid'));
		$proposalid		= inputEscapeString($this->input->request('proposalid'));
        $projectid        = inputEscapeString($this->input->request('projectid'));
        $mydate        = inputEscapeString($this->input->request('mydate'));
        $comment        = inputEscapeString($this->input->request('comment'));
        
        
		
		$data  = array(
						 'project_id'		=> $projectid		,
						 'proffetional_id'	=> $professionalid	,
						 'proposal_id'		=> $proposalid		,
                         'aword_date'        => date("Y-m-d H:i:s"),
                         'delivery_date'        => $mydate,
						 'comment'		=> $comment
					  );
					  
					  
		/*$insert_sql = "INSERT INTO `project_aword_map` SET
													   `project_id`		 = ".$projectid.",
													   `proffetional_id` = ".$professionalid.",
													   `proposal_id`	 = ".$proposalid.",
													   `aword_date`		 = '".date("Y-m-d H:i:s")."'";
		 $this->db->query($insert_sql);*/
		
		
		
		$this->db->insert('project_aword_map', $data); 
        $aword_id = $this->db->insert_id() ;
        return $aword_id;
        
    }
    
    
    function get_Professionalskill($professional_id){
        $sql_professional_skill = "select `psm`.*,`ps`.`skill_name` from `professional_skill_map` `psm` left join `project_skill` `ps` on `psm`.`skill_id` = `ps`.`pr_skill_id`
where `professional_id`= '".$professional_id."'";

        $result = $this->db->query($sql_professional_skill);
        
        $data_result = $result->result();  
        
        return $data_result;
    }
    
    
    function get_admin_paypal_acount(){
        $sql_admin_paypal_acount = "select * from `odhub_payment_setting`";
        $result = $this->db->query($sql_admin_paypal_acount);
        $data_result = $result->result();  
        return $data_result;
        
        
    }
    
    
    function getProfessionalInfo($project_id){
        $sql_professional_info = "select * from `project_aword_map` where `project_id`='".$project_id."'";
        $result = $this->db->query($sql_professional_info);
        $data_result = $result->result();  
        return $data_result;
    }
    
    
    function getProfessional_paypalId($search_str=0){
        $sql_professional_paypal = "select `paypal_email` from `lm_professionaldetail_tbl` where `ProfessionalId` in (".$search_str.")";
        $result = $this->db->query($sql_professional_paypal);
        $data_result = $result->result();  
        return $data_result;
    }
    
    
    
}