<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
		$this->load->model('model_email');
		$this->load->model('model_login');
		$this->load->model('model_upload');
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'login';
		$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
	}
        
	/*function index()
	{
         
		 
		 if(isset($_COOKIE['CUSERID']) && isset($_COOKIE['CUSERTYPE'])){
				$this->nsession->set_userdata(USER_SESSION_ID, $_COOKIE['CUSERID']);
				$this->nsession->set_userdata('user_type', $_COOKIE['CUSERTYPE']);
				redirect('login/home');
			}
            
            else{
                    $this->template->write_view('header',  'common/header',$this->header_data);
                    $this->template->write_view('content', 'home/index',$this->middle_data); 
                    $this->template->write_view('footer',  'common/footer',$this->footer_data);
                    $this->template->render();
		}
			
	}*/
	
	public function signup()
	{
		$this->middle_data['client_signup_submit_link'] = base_url().$this->middle_data['controller'].'/client_signup_submit';
		
		$this->template->write_view('header',  'common/header',$this->header_data);
		$this->template->write_view('content', 'login/client_signup',$this->middle_data);
		$this->template->write_view('footer',  'common/footer',$this->footer_data);
		$this->template->render();
	}	       
	public function client_signup_submit()
	{
		$this->form_validation->set_rules('email', 'Email', 	'required|valid_email');
		$this->form_validation->set_rules('passd', 'Password', 				'required');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 			'required');
		$this->form_validation->set_rules('lname', 'Last Name', 			'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		else
		{
			$this->model_login->insert_client_data();
			
			$email = inputEscapeString($this->input->request('email'));
			$passd = inputEscapeString($this->input->request('passd'));
			$fname = inputEscapeString($this->input->request('fname'));
			
			$message   = "Hi ".$fname."<br><br>";
			$message  .= "Thank you for registering with us. Your Login Details as follows : -  <br>";
			$message  .= "Username : ".$email."    <br>";
			$message  .= "Password : ".$passd." <br><br>";						
			$message  .= "Thanks, <br>";
			$message  .= "Od Hub Team";
			$this->model_email->sendEmail(FROM_EMAIL_ADDR, $email, 'Thanks For Registration', $message);
			
			$this->template->write_view('header',  'common/header',$this->header_data);
			$this->template->write_view('content', 'login/client_signup_submit',$this->middle_data); 
			$this->template->write_view('footer',  'common/footer',$this->footer_data);
			$this->template->render();
		}
	}
	
	public function prof_signup()
	{
        
         $get_data = $this->input->get();
         
         
        $referral_code = $get_data['code'];
         
         
        $this->middle_data['prof_signup_submit_link'] = base_url().$this->middle_data['controller'].'/prof_signup_submit';
		$this->middle_data['referral_code'] = $referral_code;
		
		$this->template->write_view('header',  'common/header',$this->header_data);
		$this->template->write_view('content', 'login/prof_signup',$this->middle_data); 
		$this->template->write_view('footer',  'common/footer',$this->footer_data);
		$this->template->render();
	}	
	public function prof_signup_submit()
	{
        
		$this->form_validation->set_rules('email', 'Email', 	'required|valid_email');
		$this->form_validation->set_rules('passd', 'Password', 				'required');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 			'required');
		$this->form_validation->set_rules('lname', 'Last Name', 			'required');
		$this->form_validation->set_rules('addrs', 'Address',	 			'required');
		$this->form_validation->set_rules('city',  'City',	 				'required');
		$this->form_validation->set_rules('state', 'state',	 				'required');
		$this->form_validation->set_rules('zip',   'Zip',	 				'required');
		$this->form_validation->set_rules('wbsit', 'Website', 				'required');
		$this->form_validation->set_rules('educn', 'Education',	 			'required');
		$this->form_validation->set_rules('credn', 'Credentials',	 		'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->prof_signup();
		}
		else
		{
			
            DebugBreak();
            
            //--------- File Upload ------------------------
			  $file_name = '';
			  if(isset($_FILES['userimg']['name']) && $_FILES['userimg']['name'] <> "")
			  {
				  $field							= 'userimg';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  //$userInformation				= $this->model_login->loggedInUserInfo();
				  
				  $config1['allowed_types']	= 'gif|jpg|jpeg|png';
				  $config1['upload_path'] 	= file_upload_absolute_path().'userimages/';
				  $config1['optional'] 		= true;
				  $config1['max_size']		= '250';
                  $config1['max_width']      = '00';
				  $config1['max_size']  	= '3000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name = $uploadFileData[$field];
					  $this->model_upload->resized($file_name,'userimages');
					  $this->model_upload->thumbnail($file_name,'userimages');
				  }
			  }
			//--------- File Upload ------------------------			
			
			$this->model_login->insert_prof_data($file_name);
			
			$email = inputEscapeString($this->input->request('email'));
			$passd = inputEscapeString($this->input->request('passd'));
			$fname = inputEscapeString($this->input->request('fname'));
			
			$message   = "Hi ".$fname."<br><br>";
			$message  .= "Thank you for registering with us. Your Login Details as follows : -  <br>";
			$message  .= "Username : ".$email."    <br>";
			$message  .= "Password : ".$passd." <br><br>";						
			$message  .= "Thanks, <br>";
			$message  .= "Od Hub Team";
			$this->model_email->sendEmail(FROM_EMAIL_ADDR, $email, 'Thanks For Registration', $message);
			
			$this->template->write_view('header',  'common/header',				 $this->header_data);
			$this->template->write_view('content', 'login/client_signup_submit', $this->middle_data); 
			$this->template->write_view('footer',  'common/footer',				 $this->footer_data);
			$this->template->render();
		}
	}
	
	public function signin()
	{
		$this->middle_data['signin_submit_link'] = base_url().$this->middle_data['controller'].'/signin_submit';
		
		$errmsg = $this->nsession->userdata('errmsg');
		if($errmsg != ''){
			$this->middle_data['errmsg'] = $errmsg;
			$this->nsession->set_userdata('errmsg', '');
		}	
		
		$this->template->write_view('header',  'common/header', $this->header_data);
		$this->template->write_view('content', 'login/sign_in', $this->middle_data); 
		$this->template->write_view('footer',  'common/footer', $this->footer_data);
		$this->template->render();
	}	
	public function signin_submit()
	{
		$this->form_validation->set_rules('usertype', 'Usertype', 	'required');
		$this->form_validation->set_rules('username', 'Username', 	'required');
		$this->form_validation->set_rules('password', 'Password', 	'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->signin();
		}
		else
		{
			$usertype = inputEscapeString($this->input->request('usertype'));
			
			if($this->model_login->get_user_data()){
				if ($usertype == "Client")
				  redirect('client/show_home');
				elseif ($usertype == "Professional")
				  redirect('professional/show_home');
				
				$this->template->render();
			
			}else{
				$this->nsession->set_userdata('errmsg', 'Wrong username/password');
				
				redirect('login/signin');
			}
		}
	}
	
	public function signout()
	{
		$this->model_login->unset_user_session_data();
		
		$this->template->write_view('header',  'common/header',$this->header_data);
		$this->template->write_view('content', 'home/index',$this->middle_data); 
		$this->template->write_view('footer',  'common/footer',$this->footer_data);
		$this->template->render();
	}
}

/* End of file login.php */
/* Location: ./application_front/controllers/login.php */
