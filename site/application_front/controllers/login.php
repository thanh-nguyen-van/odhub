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
        $this->load->model('model_project');  
        $this->load->model('model_payment_calc');
        $this->load->model('model_proposal');
        $this->load->model('model_professional');
		$this->load->model('model_home');
                $this->load->model('model_countrystate');   
		
                          
                
          
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'login';
		$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
			$this->footer_data['video'] 		= $this->model_home->get_foot_video();
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
        $this->load->model('model_countrystate');      
        $get_data = $this->input->get();
        $referral_code = $get_data['code'];
        
        $this->middle_data['referral_code'] = $referral_code;
        
		 if(isset($_SESSION['emailExistMsg'])) 
		 	{
		 	 $this->middle_data['emailExistMsg'] = $_SESSION['emailExistMsg'];
			 unset($_SESSION['emailExistMsg']);
			}
		
        $sql_professional = "`referral_code`='".$referral_code."'";
        $ref_professional_details = $this->model_professional->getAllProfessional($sql_professional);
        $this->middle_data['ref_professional'] = $ref_professional_details;  
		
		/*echo"<pre>";
		print_r($this->middle_data);*/
        
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
			$idExist = $this->model_login->check_existing_mail();					//--- Checking if mail Id is existing
						
			if($idExist)
				{
				$_SESSION['emailExistMsg'] = "This mail id is allready exist.";
				$this->signup();
				}
			else
				{	
				$activation_code = md5($this->input->request('email'));
				$this->model_login->insert_client_data($activation_code);
				
				$email = inputEscapeString($this->input->request('email'));
				$passd = inputEscapeString($this->input->request('passd'));
				$fname = inputEscapeString($this->input->request('fname'));

				$activationURL = base_url('login/Clientactivation').'/'.base64_encode($activation_code);
				$message   = "Welcome to OD Hub<br>";
				$message  .= "Hi ".$fname."<br><br>";
				$message  .= "Thank you for registering with OD Hub. Looking to develop your business or network? Please click on the link below to verify your account and get started. : -  <br>";
				$message  .= "URL : <a href='".$activationURL."' target='_blank'>".$activationURL."</a>    <br>";
				$message  .= "Username : ".$email."    <br>";
				$message  .= "Password : ".$passd." <br><br>";						
				$message  .= "Thanks, <br>";
				$message  .= "OD Hub Team";
				echo $message; die; 
				$this->model_email->sendEmail(FROM_EMAIL_ADDR, $email, 'Thanks For Registration', $message);
				
				
			
				
				$this->template->write_view('header',  'common/header',$this->header_data);
				$this->template->write_view('content', 'login/client_signup_submit',$this->middle_data); 
				$this->template->write_view('footer',  'common/footer',$this->footer_data);
				$this->template->render();
				}
		}
	}
	
	public function prof_signup()
	{
        
         $get_data = $this->input->get();
         
         
        $referral_code = $get_data['code'];
         
         
        $this->middle_data['prof_signup_submit_link'] = base_url().$this->middle_data['controller'].'/prof_signup_submit';
		$this->middle_data['referral_code'] = $referral_code;
        $sql_professional = "`referral_code`='".$referral_code."'";
        $ref_professional_details = $this->model_professional->getAllProfessional($sql_professional);
        $this->middle_data['ref_professional']        = $ref_professional_details; 
        
        $this->middle_data['state_data']  = $this->model_project->getAllState();   
        $this->middle_data['servs_data'] = $this->model_project->getAllServs();
	
		
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
		$this->form_validation->set_rules('custom_country', 'Country',	 				'required');
		$this->form_validation->set_rules('state', 'state',	 				'required');
		$this->form_validation->set_rules('zip',   'Zip',	 				'required');
		
		$this->form_validation->set_rules('educn', 'Education',	 			'required');
		$this->form_validation->set_rules('credn', 'Credentials',	 		'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->prof_signup();
		}
		else
		{
			
           // DebugBreak();
            
            //--------- File Upload User images------------------------
			  $file_name = '';
			 		  
			  if(isset($_FILES['userimg']['name']) && $_FILES['userimg']['name'] != "")
			  {
				  $field							= 'userimg';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  //$userInformation				= $this->model_login->loggedInUserInfo();
				  
				  $config1['allowed_types']	= 'gif|jpg|jpeg|png';
				  $config1['upload_path'] 	= file_upload_absolute_path().'userimages/';
				  $config1['optional'] 		= true;
				  $config1['max_size']		= '250';
                  $config1['max_width']     = '00';
				  $config1['max_size']  	= '3000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name = $uploadFileData[$field];
					  $this->model_upload->resized($file_name,'userimages');
					  $this->model_upload->thumbnail($file_name,'userimages');
				  }
			  }
			   //--------- File Upload User images------------------------
			   
			   
			 //--------- File Upload User logo------------------------ 
			   $file_name2 = '';
			 		  
			  if(isset($_FILES['logoimg']['name']) && $_FILES['logoimg']['name'] != "")
			  {
				  $field							= 'logoimg';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  //$userInformation				= $this->model_login->loggedInUserInfo();
				  
				  $config1['allowed_types']	= 'gif|jpg|jpeg|png';
				  $config1['upload_path'] 	= file_upload_absolute_path().'userimages/';
				  $config1['optional'] 		= true;
				  $config1['max_size']		= '250';
                  $config1['max_width']     = '00';
				  $config1['max_size']  	= '3000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name2 = $uploadFileData[$field];
					  $this->model_upload->resized($file_name2,'userimages');
					  $this->model_upload->thumbnail($file_name2,'userimages');
				  }
			  }
			 //--------- File Upload User logo------------------------ 
			 
			//--------- File Upload User W9------------------------ 
			   $file_name3 = '';
			 		  
			  if(isset($_FILES['formimg']['name']) && $_FILES['formimg']['name'] != "")
			  {
				  $field							= 'formimg';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  //$userInformation				= $this->model_login->loggedInUserInfo();
				  
				  $config1['allowed_types']	= 'gif|jpg|jpeg|png';
				  $config1['upload_path'] 	= file_upload_absolute_path().'professionalw9/';
				  $config1['optional'] 		= true;
				  $config1['max_size']		= '250';
                  $config1['max_width']     = '00';
				  $config1['max_size']  	= '3000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name3 = $uploadFileData[$field];
					  $this->model_upload->resized($file_name3,'userimages');
					  $this->model_upload->thumbnail($file_name3,'userimages');
				  }
			  }
			 //--------- File Upload User logo------------------------ 
			 
			 
			//--------- File Upload ------------------------			
			
			
			$activation_code = md5($this->input->request('email'));
			
		
			
			
			$insert_id = $this->model_login->insert_prof_data($file_name,$file_name2,$file_name3,$activation_code);
          //  $this->model_login->insert_serv_data($insert_id);
            // Commission setup
            
               //DebugBreak();
               
               $paypal_details = $this->model_proposal->get_admin_paypal_acount();   
               
               $default_commission = $paypal_details[0]->default_commission_p_p;
               
               $referral_code = $this->input->request('referral_code');
               if($referral_code != ''){
               
               $referral_user_obj = $this->model_payment_calc->get_professional_id_from_code($referral_code);
			   
			  
               $referral_user_id = $referral_user_obj[0]->ProfessionalId;
			   
               
               $data['professional_id'] = $insert_id;
               $data['referred_professional_id'] = $referral_user_id;
               $data['reffered_client_id'] = 0;
               $data['amount'] = $default_commission;
               $data['commission_type'] = 'referral_professional';
               $data['redeem_commission'] = 0;
               
               $this->model_payment_calc->insert_professional_commission($data);
               
			   }
                      
               // Commission setup end
            
            
            
            
            
            /*
            $data['get_amount'] = 0;
            $data['due_amount'] = 25;
            $data['amount_for'] = 'professiona_affiliate';
            $data['ref_id_for'] = $insert_id;
                
             $this->model_payment_calc->insert_professional_payment($data);
            */
            
			
			$email = inputEscapeString($this->input->request('email'));
			$passd = inputEscapeString($this->input->request('passd'));
			$fname = inputEscapeString($this->input->request('fname'));
			
			$activationURL = base_url('login/activation').'/'.base64_encode($activation_code);
			$message   = "Welcome to OD Hub<br>";
			$message  .= "Hi ".$fname."<br><br>";
			$message  .= "Thank you for registering with OD Hub. You are on your way to building your business and developiing your network. Please click on the link below to verify your account and get started. : -  <br>";
			$message  .= "URL : <a href='".$activationURL."' target='_blank'>".$activationURL."</a>    <br>";
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
		//$this->form_validation->set_rules('usertype', 'Usertype', 	'required');
		$this->form_validation->set_rules('username', 'Username', 	'required');
		$this->form_validation->set_rules('password', 'Password', 	'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->signin();
		}
		else
		{
			//$usertype = inputEscapeString($this->input->request('usertype'));     //commented by manish
			$usertype = $this->model_login->get_user_data();
		
			if($usertype=="Client" || $usertype == "Professional"){
				if ($usertype == "Client")
				  redirect('client/show_home');
				elseif ($usertype == "Professional")
				  redirect('professional/forum_login');
				
				$this->template->render();
			
			}elseif($usertype=='inactive'){
				$this->nsession->set_userdata('errmsg', 'Your account is not activated yet.Please check you mail and activate your account first. ');
				redirect('login/signin');
			}else{
			
				$this->nsession->set_userdata('errmsg', 'Wrong username/password');
				
				redirect('login/signin');
			}
		}
	}
	
	public function signout()
	{
		$this->model_login->unset_user_session_data();
		
		redirect('professional/forum_logout');
		
		$this->template->write_view('header',  'common/header',$this->header_data);
		$this->template->write_view('content', 'home/index',$this->middle_data); 
		$this->template->write_view('footer',  'common/footer',$this->footer_data);
		$this->template->render();
	}
        
        //added by sk
        public function ajaxGenerateStatelist(){
            $htmlString = '<select name="state" id="state" class="input-r">
                       <option value="0">--Select State--</option>';
            if(isset($_POST['c_country_id']) && !empty($_POST['c_country_id'])){
                
               $c_country_id = addslashes($_POST['c_country_id']);
               $stateList = $this->model_countrystate->getAllState($c_country_id);
               
               if($stateList!=false){
                   
                   foreach($stateList as $states){
                       $htmlString .= '<option value="'.$states->c_state_name.'">'.$states->c_state_name.'</option>';
                   }
               }
               $htmlString .='</select>';
            }
            echo $htmlString;
            exit();
            
        }
		public function activation(){
			$this->load->helper('url');
			$activation_code = base64_decode($this->uri->segment(3, 0));
			if($this->model_login->activation_update($activation_code)){
				$this->nsession->set_userdata('errmsg', 'Your account is activated. ');
				redirect('login/signin');
			}else{
				$this->nsession->set_userdata('errmsg', 'Sorry something goes wrong.Please try again. ');
				redirect('login/signin');
			}
		}
		public function Clientactivation(){
			$this->load->helper('url');
			$activation_code = base64_decode($this->uri->segment(3, 0));
			if($this->model_login->clientactivation_update($activation_code)){
				$this->nsession->set_userdata('errmsg', 'Your account is activated. ');
				redirect('login/signin');
			}else{
				$this->nsession->set_userdata('errmsg', 'Sorry something goes wrong.Please try again. ');
				redirect('login/signin');
			}
		}
}

/* End of file login.php */
/* Location: ./application_front/controllers/login.php */
