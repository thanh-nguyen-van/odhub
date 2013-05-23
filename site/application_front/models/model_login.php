<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
    public function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ',$charsetint = '0123456789')
        {
            $str = '';
            $count = strlen($charset);
            $length1 = $length;
            while ($length--) {
                $str .= $charset[mt_rand(0, $count-1)];
            }
            $count = strlen($charsetint);     
            while ($length1--) {
                $str .= $charsetint[mt_rand(0, $count-1)];
            }
            return $str;
        }
    
    
	public function insert_client_data()
	{
        $email		= inputEscapeString($this->input->request('email'));
		$username	= inputEscapeString($this->input->request('email'));
		$passd		= inputEscapeString($this->input->request('passd'));
		$fname		= inputEscapeString($this->input->request('fname'));
		$lname		= inputEscapeString($this->input->request('lname'));
		$phone		= inputEscapeString($this->input->request('phone'));
		$zip		= inputEscapeString($this->input->request('zip'));
       
		
		$data  = array(
						 'ClientEmail'		=> $email ,
						 'ClientPassword'	=> $passd ,
						 'ClientFirstname'	=> $fname ,
						 'ClientLastname'	=> $lname ,
                         'ClientZipcode'    => $zip   ,
						 'ClientUsername'	=> $username   ,
						 'ClientJoinDate'	=> date("Y-m-d H:i:s")
					  );
		$this->db->insert('lm_clientdetail_tbl', $data); 
	}
	
	public function insert_prof_data($img_file_name)
	{ 
        $username	= inputEscapeString($this->input->request('email'));
		$email		= inputEscapeString($this->input->request('email'));
		$passd		= inputEscapeString($this->input->request('passd'));
		$fname		= inputEscapeString($this->input->request('fname'));
		$lname		= inputEscapeString($this->input->request('lname'));
		$addrs		= inputEscapeString($this->input->request('addrs'));
		$city		= inputEscapeString($this->input->request('city'));
		$state		= inputEscapeString($this->input->request('state'));
		$zip		= inputEscapeString($this->input->request('zip'));
		$wbsit		= inputEscapeString($this->input->request('wbsit'));
		$educn		= inputEscapeString($this->input->request('educn'));
        $credn		= inputEscapeString($this->input->request('credn'));
        $p_user		= inputEscapeString($this->input->request('referral_code'));
		//$referral_code = inputEscapeString($this->input->request('referral_code'));
        
         $referral_code = $fname.'-'.$this->randString(8);    
		
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
						 'ProfessionalJoinDate'		=> date("Y-m-d H:i:s"),
                         'referral_code'            => $referral_code,
                         'ProfessionalUsername'     => $username,
                         'p_user'                   => $p_user                         
					  );
                      
                      
		$res = $this->db->insert('lm_professionaldetail_tbl', $data);
		
		if($res){
			$sql_select_user = "select `user_permissions` from `phpbb_users` where `user_id`='1'";
			$rs				 = mysql_query($sql_select_user);
			$rr				 = mysql_fetch_array($rs);
			$permission 	 = $rr['user_permissions'];
			
			
			$forum_user_sql  = "INSERT IGNORE INTO `phpbb_users` 
													 SET `user_type` 				= '0', 
														 `group_id`	 				= '2', 
														 `user_permissions`			= '".$permission."', 
														 `user_perm_from`			= '0', 
														 `user_ip`					= '".$_SERVER['REMOTE_ADDR']."', 
														 `user_regdate`				= '".time()."', 
														 `username`					= '".$username."', 
														 `username_clean`			= '".$username."', 
														 `user_password`			= '".md5($passd)."', 
														 `user_passchg`				= '".time()."', 
														 `user_pass_convert`		= '0', 
														 `user_email`				= '".$email."', 
														 `user_birthday`			= '', 
														 `user_lastvisit`			= '0', 
														 `user_lastmark`			= '', 
														 `user_lastpost_time`		= '0', 
														 `user_lastpage`			= '', 
														 `user_last_confirm_key`	= '', 
														 `user_last_search`			= '0', 
														 `user_warnings`			= '0', 
														 `user_last_warning`		= '0', 
														 `user_login_attempts`		= '0', 
														 `user_inactive_reason`		= '0', 
														 `user_inactive_time`		= '0', 
														 `user_posts`				= '0', 
														 `user_lang`				= 'en', 
														 `user_timezone`			= '0.00', 
														 `user_dst`					= '0', 
														 `user_dateformat`			= 'd-m-Y g:i a', 
														 `user_style`				= '1', 
														 `user_rank`				= '0', 
														 `user_colour`				= '', 
														 `user_new_privmsg`			= '0', 
														 `user_unread_privmsg`		= '0', 
														 `user_last_privmsg`		= '0', 
														 `user_message_rules`		= '0', 
														 `user_full_folder`			= '-3', 
														 `user_emailtime`			= '0', 
														 `user_topic_show_days`		= '0', 
														 `user_topic_sortby_type`	= 't', 
														 `user_topic_sortby_dir`	= 'd', 
														 `user_post_show_days`		= '0', 
														 `user_post_sortby_type`	= 't', 
														 `user_post_sortby_dir`		= 'a', 
														 `user_notify`				= '0', 
														 `user_notify_pm`			= '1', 
														 `user_notify_type`			= '0', 
														 `user_allow_pm`			= '1', 
														 `user_allow_viewonline`	= '1', 
														 `user_allow_viewemail`		= '1', 
														 `user_allow_massemail`		= '1', 
														 `user_options`				= '230271', 
														 `user_avatar`				= '', 
														 `user_avatar_type`			= '0', 
														 `user_avatar_width`		= '0', 
														 `user_avatar_height`		= '0', 
														 `user_sig`					= '', 
														 `user_sig_bbcode_uid`		= '', 
														 `user_sig_bbcode_bitfield`	= '', 
														 `user_from`				= '', 
														 `user_icq`					= '', 
														 `user_aim`					= '', 
														 `user_yim`					= '', 
														 `user_msnm`				= '', 
														 `user_jabber`				= '', 
														 `user_website`				= '', 
														 `user_occ`					= '', 
														 `user_interests`			= '', 
														 `user_actkey`				= '', 
														 `user_newpasswd`			= '', 
														 `user_form_salt`			= 'c99e5c305c2877bc', 
														 `user_new`					= '1', 
														 `user_reminded`			= '0', 
														 `user_reminded_time`		= '0'";
			mysql_query($forum_user_sql);
		}
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