<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_project extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
    
    
	public function insert_project_data()
	{
        $project_name		 = inputEscapeString($this->input->request('project_name'));
		$project_description = inputEscapeString($this->input->request('project_description'));
		$project_category	 = inputEscapeString($this->input->request('project_category'));
		$state				 = inputEscapeString($this->input->request('state'));
		$w9_required		 = inputEscapeString($this->input->request('w9_required'));
		$job_type			 = inputEscapeString($this->input->request('job_type'));
		$start_price		 = inputEscapeString($this->input->request('start_price'));
		$end_price			 = inputEscapeString($this->input->request('end_price'));
		$price_type			 = inputEscapeString($this->input->request('price_type'));
		$post_by			 = inputEscapeString($this->input->request('post_by'));
		$skills		 		 = inputEscapeString($this->input->request('skills'));
		$post_date			 = date("Y-m-d H:i:s");
		$project_type_id	 = inputEscapeString($this->input->request('project_type_id'));
       
		
		$data  = array(
						 'project_name'			=> $project_name		,
						 'project_description'	=> $project_description ,
						 'project_category'		=> $fname				,
						 'state'				=> $state				,
                         'w9_required'    		=> $w9_required			,
						 'job_type'				=> $job_type			,
						 'start_price'			=> $start_price			,
						 'end_price'			=> $end_price			,
						 'price_type'			=> $price_type			,
						 'post_by'				=> $post_by				,
                         'skills'    			=> $skills				,
						 'post_date'			=> $post_date			,
						 'project_type_id'		=> $project_type_id
					  );
		$this->db->insert('project_details', $data); 
	}
	
	public function get_project_data($project_id)
	{
        $table_name  = "project_details";
		$select_flds = "*";
		$condition	 = "project_id = '".$project_id."'";
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return($result);
	}
}

/* End of file model_project.php */
/* Location: ./application_front/models/model_project.php */