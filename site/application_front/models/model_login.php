<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function insert_client_data()
	{
		$email = inputEscapeString($this->input->request('email'));
		$passd = inputEscapeString($this->input->request('passd'));
		$fname = inputEscapeString($this->input->request('fname'));
		$lname = inputEscapeString($this->input->request('lname'));
		$phone = inputEscapeString($this->input->request('phone'));
		$zip   = inputEscapeString($this->input->request('zip'));
		
		$data  = array(
						 'ClientEmail'		=> $email ,
						 'ClientPassword'	=> $passd ,
						 'ClientFirstname'	=> $fname ,
						 'ClientLastname'	=> $lname ,
						 'ClientZipcode'	=> $zip   ,
						 'ClientJoinDate'	=> date("Y-m-d H:i:s")
					  );
		$this->db->insert('lm_clientdetail_tbl', $data); 
	}
	
	public function insert_prof_data($img_file_name)
	{
		$email = inputEscapeString($this->input->request('email'));
		$passd = inputEscapeString($this->input->request('passd'));
		$fname = inputEscapeString($this->input->request('fname'));
		$lname = inputEscapeString($this->input->request('lname'));
		$addrs = inputEscapeString($this->input->request('addrs'));
		$city  = inputEscapeString($this->input->request('city'));
		$state = inputEscapeString($this->input->request('state'));
		$zip   = inputEscapeString($this->input->request('zip'));
		$wbsit = inputEscapeString($this->input->request('wbsit'));
		$educn = inputEscapeString($this->input->request('educn'));
		$credn = inputEscapeString($this->input->request('credn'));
		
		$data  = array(
						 'ProfessionalEmail'		=> $email ,
						 'ProfessionalPassword'		=> $passd ,
						 'ProfessionalFirstname'	=> $fname ,
						 'ProfessionalLastname'		=> $lname ,
						 'ProfessionalAddress'		=> $addrs ,
						 'ProfessionalCity'			=> $city  ,
						 'ProfessionalState'		=> $state ,
						 'ProfessionalZipcode'		=> $zip   ,
						 'ProfessionalWebsite'		=> $wbsit ,
						 'ProfessionalDegree'		=> $educn ,
						 'ProfessionalAchievements'	=> $credn ,
						 'ProfessionalImage'		=> $img_file_name ,
						 'ProfessionalJoinDate'		=> date("Y-m-d H:i:s")
					  );
		$this->db->insert('lm_professionaldetail_tbl', $data); 
	}
	
	public function get_user_data()
	{
		$usertype = inputEscapeString($this->input->request('usertype'));
		$username = inputEscapeString($this->input->request('username'));
		$password = inputEscapeString($this->input->request('password'));
		
		if($usertype == "Client"){
			
			$table_name  = "lm_clientdetail_tbl";
			$select_flds = "ClientId, ClientUsername, ClientFirstname, ClientLastname, ClientEmail";
			$condition	 = "(ClientUsername = '".$username."' OR ClientEmail = '".$username."') AND ClientPassword = '".$password."'";
			
		}elseif($usertype == "Professional"){
			
			$table_name	 = 'lm_professionaldetail_tbl';
			$select_flds = "ProfessionalId, ProfessionalUsername, ProfessionalFirstname, ProfessionalLastname, ProfessionalEmail";
			$condition	 = "(ProfessionalUsername = '".$username."' OR ProfessionalEmail = '".$username."') AND ProfessionalPassword = '".$password."'";
		}
				
		
		$this->db->select($select_flds);
		$this->db->where($condition);
		
		$query	= $this->db->get($table_name);
		$result = $query->row_array();
		
		if($result){
			if($usertype == "Client"){
				
				$_SESSION[USER_SESSION_ID]		 = $result['ClientId'];
				$_SESSION[USER_SESSION_NAME]	 = $result['ClientUsername'];
				$_SESSION[USER_SESSION_FULLNAME] = $result['ClientFirstname']." ".$result['ClientLastname'];
				$_SESSION[USER_SESSION_EMAIL]	 = $result['ClientEmail'];
				$_SESSION[USER_SESSION_TYPE]	 = "Client";
				
			}elseif($usertype == "Professional"){
				
				$_SESSION[USER_SESSION_ID]		 = $result['ProfessionalId'];
				$_SESSION[USER_SESSION_NAME]	 = $result['ProfessionalUsername'];
				$_SESSION[USER_SESSION_FULLNAME] = $result['ProfessionalFirstname']." ".$result['ProfessionalLastname'];
				$_SESSION[USER_SESSION_EMAIL]	 = $result['ProfessionalEmail'];
				$_SESSION[USER_SESSION_TYPE]	 = "Professional";
			}
			return true;
		}else{
			return false;
		}
	}
	
	public function unset_user_session_data()
	{
		unset($_SESSION[USER_SESSION_ID]);
		unset($_SESSION[USER_SESSION_NAME]);
		unset($_SESSION[USER_SESSION_FULLNAME]);
		unset($_SESSION[USER_SESSION_EMAIL]);
		unset($_SESSION[USER_SESSION_TYPE]);
	}
}

/* End of file model_login.php */
/* Location: ./application_front/models/model_login.php */