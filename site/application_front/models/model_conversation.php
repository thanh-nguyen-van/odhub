<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_conversation extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function get_conversation($project_id)
	{
		$table_name  = "lm_project_conversation";
		$select_flds = "*";
		$condition	 = "project_id = '".$project_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		$this->db->order_by("date", "desc");
		$query	= $this->db->get($table_name);
		$result = $query->result_array();
		
		return $result;
	}
	public function get_receiver($project_id)
	{
		$table_name  = "project_aword_map";
		$select_flds = "*";
		$condition	 = "project_id = '".$project_id."'";
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		return $result;
	}
	public function insert_conversation_data($attchment){
	
        $project_id		 = inputEscapeString($this->input->request('project_id'));
        $sender_id		 = inputEscapeString($this->input->request('sender_id'));
        $receiver_id	 = inputEscapeString($this->input->request('receiver_id'));
        $sender_type	 = inputEscapeString($this->input->request('sender_type'));
        $text_message	 = inputEscapeString($this->input->request('text_message'));
		$post_date		 = date("Y-m-d H:i:s");
		$data  = array(
						 'project_id'			=> $project_id		,
						 'sender_id'			=> $sender_id ,
						 'receiver_id'			=> $receiver_id	,
						 'sender_type'			=> $sender_type			,
						 'attachment'			=> $attchment	,
						 'text_message'			=> $text_message	,
						 'date'			=> $post_date			
					  );
					  
			$result = $this->db->insert('lm_project_conversation', $data);
			return $result;
		
	}
	
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */