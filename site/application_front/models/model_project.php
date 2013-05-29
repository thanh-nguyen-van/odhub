<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_project extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
    
    
	public function insert_project_data($project_filename)
	{
		$project_id			 = $this->input->request('project_id') != '' ? $this->input->request('project_id') : '';
		
        $project_name		 = inputEscapeString($this->input->request('project_name'));
		$project_description = inputEscapeString($this->input->request('project_description'));
		$project_category	 = $this->input->request('project_category');
		//$state			 = inputEscapeString($this->input->request('state'));
		//$w9_required		 = inputEscapeString($this->input->request('w9_required'));
		//$job_type			 = inputEscapeString($this->input->request('job_type'));
		//$end_price		 = inputEscapeString($this->input->request('end_price'));
		$price_type			 = $this->input->request('price_type');
		$start_price		 = $price_type == 'Contract' ? $this->input->request('start_price1') : $this->input->request('start_price2') ;
		//$post_by			 = inputEscapeString($this->input->request('post_by'));
        $skills              = $this->input->request('skills');
        $project_visibility  = $this->input->request('project_visibility');
        $state               = $this->input->request('state');
		$project_type_id	 = $this->input->request('project_type_id');
		$project_start 		 = $this->input->request('project_start');
		$project_start_date	 = $this->input->request('project_start_date');
		$post_date			 = date("Y-m-d H:i:s");
		
		//$project_type_id	 = inputEscapeString($this->input->request('project_type_id'));
       
		
		$data  = array(
						 'project_name'			=> $project_name		,
						 'project_description'	=> $project_description ,
						 'project_category'		=> $project_category	,
						 //'state'				=> $state				,
                         //'w9_required'    	=> $w9_required			,
						 //'job_type'			=> $job_type			,
						 'start_price'			=> $start_price			,
						 //'end_price'			=> $end_price			,
						 'price_type'			=> $price_type			,
						 //'post_by'			=> $post_by				,
                         //'skills'    			=> $skills				,
						 'project_filename'		=> $project_filename	,
						 'project_visibility'	=> $project_visibility	,
						 'project_start'		=> $project_start		,
                         'project_start_date'   => $project_start_date  ,
                         'state'				=> $state				,
						 'project_type_id'		=> $project_type_id		,
						 'post_date'			=> $post_date			
						 //'project_type_id'	=> $project_type_id
					  );
					  
		if($project_id == ''){
			$this->db->insert('project_details', $data);
			$project_id = $this->db->insert_id();
		}else{
			$this->db->where('project_id',$project_id);
			$this->db->update('project_details', $data);
		}
		
		//------------------------ Project Skills ----------------------------------
		  $this->db->where('project_id', $project_id);
		  $this->db->delete('project_skill_map');
			if(!empty($skills)){
			 foreach($skills as $eachSkill){
				  $data = array('project_id' => $project_id, 'skill_id' => $eachSkill);
				  $this->db->insert('project_skill_map', $data);
			  }
		  }
		//------------------------ Project Skills ----------------------------------
		
		return($project_id);
	}
	public function activate_project_data()
	{
		$project_id		= $this->input->request('project_id');		
        $project_status	= $this->input->request('project_status');
		
		$data  = array('project_status' => $project_status);
					  
		$this->db->where('project_id',$project_id);
		$this->db->update('project_details', $data);
		
		return($project_id);
	}
	
	public function get_project_skills($project_id)
	{
		$sql_get_skill_names = "SELECT * FROM `project_skill` 
								WHERE `pr_skill_id` IN 
								 (SELECT `skill_id` FROM `project_skill_map`
								  WHERE `project_id`='".$project_id."')";

		//echo $sql_get_project_data; exit;
        
        $result		 = $this->db->query($sql_get_skill_names);          
        $data_result = $result->result();
		
		return($data_result);
	}
	public function get_project_skills_data($skill_id='')
	{
		$table_name  = "project_skill";
		$select_flds = "*";
		$condition	 = "pr_skill_id = '".$skill_id."'";
				
		
		$this->db->select($select_flds);
		if($skill_id != '') 
			$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->result();
		
		return $result;
	}
	
	public function get_project_data($project_id)
	{
        $sql_get_project_data = "select `pd`.`project_id`,`pd`.`project_name`,`pd`.`project_category`,`pd`.`project_description`,`pd`.`job_type`,`pd`.`price_type`,
if(`pd`.`w9_required`=1,'W9 Required','W9 Not Required') `w9_status`,`pd`.`start_price`,`pd`.`end_price`,`pd`.`project_filename`,`pd`.`project_visibility`,`pd`.`project_start`,`pd`.`project_start_date`,`pd`.`project_status`,
concat(`lct`.`ClientFirstname`,' ',`lct`.`ClientLastname`) `client_name`,date_format(`pd`.`post_date`,'%M %d, %Y') `post_date`,date_format(`pd`.`project_start_date`,'%M %D, %Y') `job_st_dt` from `project_details` as `pd` left join `lm_clientdetail_tbl` `lct` on `pd`.`post_by` = `lct`.`ClientId` where `pd`.`project_id` = '".$project_id."'";

//echo $sql_get_project_data; exit;
        
        $result = $this->db->query($sql_get_project_data);
          
        $data_result = $result->result();  
        
        
        
        
        /*
        $table_name  = "project_details";
		$select_flds = "*";
		$condition	 = "project_id = '".$project_id."'";
		
        
        
        
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		*/
        
		return($data_result);
	}
	
	public function get_projects_data($client_id)
	{
        $table_name  = "project_details";
		$select_flds = "*";
		$condition	 = "post_by = '".$client_id."' AND project_status = 'A'";
        
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->result_array();
		
		$sql = "SELECT `p_d`.`project_id` , `p_d`.`project_name` , `p_d`.`project_description` , `p_d`.`post_by` , 
				(
				SELECT count( * )
				FROM `proposal` `p`
				WHERE `p`.`project_id` = `p_d`.`project_id`
				) `bids` , 
				(
				SELECT IF( count( * ) = '0', 'Not Awarded', 'Awarded') 
				FROM `project_aword_map` `p_a`
				WHERE `p_a`.`project_id` = `p_d`.`project_id`
				) `awarded` ,
				`p_d`.`post_date`
				FROM `project_details` `p_d`
				LEFT JOIN `lm_clientdetail_tbl` `l_c_t` ON `l_c_t`.`ClientId` = `p_d`.`post_by`
				WHERE `p_d`.`post_by` = '83' AND `p_d`.`project_status` = 'A'
				";
				
		$result		 = $this->db->query($sql);          
        $data_result = $result->result();
		
        
		return($data_result);
	}
    
    
  public function getAllState(){
      $sql_get_state = "select * from `lm_state_tbl`";
      $result = $this->db->query($sql_get_state);
          
      $data_result = $result->result(); 
      return($data_result);
  }
    
  public function getProjectType(){
      $sql_get_type = "select * from `project_type`";
      $result = $this->db->query($sql_get_type);
          
      $data_result = $result->result(); 
      return($data_result);
      
      
      
      
  }  
    
    
}







/* End of file model_project.php */
/* Location: ./application_front/models/model_project.php */