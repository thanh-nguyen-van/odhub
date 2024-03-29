<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposal extends MY_Controller 
{
	public $request_data	= array();
    public $final_qry_str	= 1;
	function __construct()
	{
		parent::__construct();
        $this->load->model('model_searchproject');
        $this->load->model('model_project');
        $this->load->model('model_all');
        $this->load->model('model_proposal');
        $this->load->model('model_upload');     
        $this->load->model('model_home');
        $this->load->model('model_paypal');     
        $this->load->model('model_professional');     
        $this->initData();
        
        //$this->load->model('model_searchcustom');		
	}
	
	public function initData()
	{
		$this->middle_data['controller'] = 'project';
			$this->footer_data['video'] 		= $this->model_home->get_foot_video();
	}
	 public function showproposal(){
	 //Array ( [project_id] => 1 [proposal_description] => dscdcsdc [price] => sdcdsc [dalivery_date] => 06/30/2013 )
	 $this->middle_data['proposal_data'] = $this->input->post();
	  
	   //        file attachment upload
                    $file_name = '';
			  if(isset($_FILES['proposal_attach']['name']) && $_FILES['proposal_attach']['name'] <> "")
			  {
				  $field		= 'proposal_attach';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  
				  $config1['allowed_types']	= 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG|txt|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx|rtf|pdf';
				  $config1['upload_path'] 	= file_upload_absolute_path().'porposal_files/';
				  $config1['optional'] 		= true;
				  $config1['max_size']  	= '12000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name = $uploadFileData[$field];
                                            $data_arr['attachment']	  = $file_name;
				  }

                          }
						  
		// $this->load->view('common/header',            $this->header_data);
      // $this->load->view('project/showproposal',    $this->middle_data);
     // $this->load->view('common/footer',            $this->footer_data); 
	  $this->template->write_view('header',  'common/header',            $this->header_data);
        $this->template->write_view('content', 'project/showproposal',    $this->middle_data);
        $this->template->write_view('footer',  'common/footer',            $this->footer_data); 
         $this->template->render();
	   
	 }
    public function saveproposal(){

       $this->request_data = $this->input->post();
       $data_arr = array()  ;
       $data_arr['proposal_description'] = $this->request_data['proposal_description'];
       $data_arr['price'] = $this->request_data['price'];
       $data_arr['project_id'] = $this->request_data['project_id'];
       
       $date = $this->request_data['dalivery_date'];
       $date_arr = explode('/',$date);
       $date_final = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
       
       
       $data_arr['dalivery_date'] = $date_final;
       $data_arr['proposed_by']	  = $_SESSION[USER_SESSION_ID];
       
                                 
       $this->model_proposal->add_proposal($data_arr); 
       
       redirect('project/proposal_submit/?projectid='.$this->request_data['project_id'], 'refresh');
    }
	
	public function submit_award()
	{
        
        //DebugBreak();
        
       // DebugBreak();
        $paypal_details = $this->model_proposal->get_admin_paypal_acount();
        
        $API_USERNAME = $paypal_details[0]->paypal_acount_email;
        $API_PASSWORD = $paypal_details[0]->paypal_acount_password;
        $API_KEY = $paypal_details[0]->paypal_api_key;
        
                                                    
      //  $paypal_obj = new paypal_pro($API_USERNAME,$API_PASSWORD,$API_KEY);
        $paypal_obj = $this->model_paypal->setvar($API_USERNAME,$API_PASSWORD,$API_KEY,'','');
        
        $methodToCall = 'doDirectPayment';
        $currencyCode="USD";
        $paymentAction = urlencode("Sale");
        $firstName = $this->input->request('firstname');
        $lastName = $this->input->request('lastname');
        $creditCardType = $this->input->request('creditCardType');
        $creditCardNumber = $this->input->request('creditCardNumber');
        $expDateMonth = $this->input->request('expDateMonth');
        $expDateYear = $this->input->request('expDateYear');
        $cvv2Number = $this->input->request('cvv2Number'); 
        $amount = $this->input->request('amount');
        
        $nvpstr='&PAYMENTACTION='.$paymentAction.'&AMT='.$amount.'&CREDITCARDTYPE='.$creditCardType.'&ACCT='.$creditCardNumber.'&EXPDATE='.$expDateMonth.$expDateYear.'&CVV2='.$cvv2Number.'&FIRSTNAME='.$firstName.'&LASTNAME='.$lastName.'&CURRENCYCODE='.$currencyCode;
        
        $resArray = $this->model_paypal->hash_call($methodToCall,$nvpstr);
        
        if($resArray['ACK']=='Failure'){
          $this->middle_data['status_msg'] = $resArray['L_LONGMESSAGE0'];
        }
        else{
        $transaction_arr =  array(
                         'payment_date'        => $resArray['TIMESTAMP']        ,
                         'price'    => $resArray['AMT']    ,
                         'ipn_track_id'        => $resArray['TRANSACTIONID']        
                      );    
        
        
        $price = $this->input->request('amount');
        $aword_id = $this->model_proposal->insert_award_data($transaction_arr);
        $this->middle_data['price'] = $price;
        $this->middle_data['aword_id'] = $aword_id;
        
        $projectid = $this->input->request('projectid');
        $this->middle_data['projectid'] = $projectid;
        }
        //mail to professional
		$professional_deatails = $this->model_professional->get_professional_data($this->input->request('professionalid'));
		
		$to  = $professional_deatails['ProfessionalUsername'] ; // note the comma
		// subject
		$subject = "Congrats, You've been awarded an OD Hub Project";

		// message
		$message =  $professional_deatails['ProfessionalFirstname'].",<br/>Congratulations! You've been awarded a new project on OD Hub. Your client is expecting you to contact them within two business days to get started. Click here to login for more details.  Let us know if we can be of assistance, The OD Hub Team";

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: '.$professional_deatails['ProfessionalFirstname'].' <'.$professional_deatails['ProfessionalUsername'].'>' . "\r\n";
		$headers .= 'From: OD Hub webteam <ODHub@noreply.com>' . "\r\n";
		
		// Mail it
		@mail($to, $subject, $message, $headers);
        
         
         
		 
       $this->template->write_view('header',  'common/header',            $this->header_data);
        $this->template->write_view('content', 'client/award_thanks',    $this->middle_data);
        $this->template->write_view('footer',  'common/footer',            $this->footer_data); 
         $this->template->render();   
	}
       
       
    public function notify_award(){
        
      //DebugBreak();  
      $auth = $this->input->request('auth');
      $this->model_proposal->update_award_data();
        
    }
    
    public function update_award(){
        
        //DebugBreak();
        $auth = $this->input->request('auth');     
        if($auth!=NULL && $auth!=''){
            $aword_id = $this->input->get('aword_id');
            $this->model_proposal->update_award_data($aword_id); 
        }
       $this->template->write_view('header',  'common/header',            $this->header_data);
        $this->template->write_view('content', 'client/award_thanks',    $this->middle_data);
        $this->template->write_view('footer',  'common/footer',            $this->footer_data);
        $this->template->render(); 
        
    }
       
       
       
   public function confirm(){
       
       //DebugBreak();
       $professionalid    = inputEscapeString($this->input->request('professionalid'));
       $proposalid        = inputEscapeString($this->input->request('proposalid'));
       $projectid        = inputEscapeString($this->input->request('projectid'));
        
       $this->middle_data['professionalid'] =  $professionalid;
       $this->middle_data['proposalid'] = $proposalid;
       $this->middle_data['projectid'] = $projectid;
       
        //DebugBreak();
        $project_data = $this->model_project->get_project_data($projectid);
        
        $this->middle_data['project_data'] = $project_data; 
         $this->middle_data['award_submit_link']    = $this->config->base_url().'proposal/submit_award';
         $this->middle_data['award_notify_link']    = $this->config->base_url().'proposal/notify_award';
         
        
       
        
        
       $this->template->write_view('header',  'common/header',            $this->header_data);
       $this->template->write_view('content', 'client/confirm',    $this->middle_data);
       $this->template->write_view('footer',  'common/footer',            $this->footer_data);
       $this->template->render(); 
       
   }    
	
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */