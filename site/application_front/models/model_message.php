<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_message extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function SavemessageDetails($message_details){
		if($this->db->insert('lm_message', $message_details))
		return true;	
	}
	public function getMessageSet($reciever_id='', $status='', $reciever_type='', $sender_id=''){
		   //id, sender_id, reciever_id, sender_type, date, status, reciever_type, subject, message
		$this->db->select('*');
		$this->db->from('lm_message');
		
		if($reciever_id!='')
		$this->db->where('reciever_id',$reciever_id);
		if($status!='')
		$this->db->where('status',$status);
		if($reciever_type!='')
		$this->db->where('reciever_type',$reciever_type);
		
		if($status=='unread'){
			return $this->db->get()->num_rows();
		}else{
			return $this->db->get()->result_array();
		}		
	}
	public function UpdateMessageView($receiverId){
		$data = array('status'=>'read');
		$this->db->where('reciever_id', $receiverId);
		$this->db->update('lm_message', $data); 
	}
	
}

/* End of file upload.php */
/* Location: ./application_front/controllers/upload.php */