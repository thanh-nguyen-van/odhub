<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class conversation extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
		$this->load->model('model_email');
		$this->load->model('model_client');
		$this->load->model('model_conversation');
		$this->load->model('model_professional');
		$this->load->model('model_project');
		$this->load->model('model_searchproject');
		$this->load->model('model_proposal');
		$this->load->model('model_location');
        $this->load->model('model_upload');
		$this->load->model('model_searchcustom');
		$this->load->model('model_home');
        $this->load->library('form_validation');
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'conversation';
		//$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
		$this->footer_data['video'] 		= $this->model_home->get_foot_video();
	}
	public function proposal_list()
	{
        $client_id	= $_SESSION[USER_SESSION_ID];
        $project_id = $this->input->get('projectid');
        
		$this->middle_data['project_id']	 	= $project_id;
		$this->middle_data['client_data']	 	= $this->model_client->get_client_data($client_id);
		$this->middle_data['proposals_data']	= $this->model_proposal->get_proposals($project_id);
		
        //$this->middle_data['award_submit_link']    = $this->config->base_url().'proposal/submit_award';
        
         
        
        
		$this->middle_data['award_submit_link']	= $this->config->base_url().'proposal/confirm/';
		
		$this->template->write_view('header',  'common/header',			$this->header_data);
		$this->template->write_view('content', 'client/proposal_list',	$this->middle_data);
		$this->template->write_view('footer',  'common/footer',			$this->footer_data);
		$this->template->render();
	}
    

public function project_conversation($projectId='')
	{	if($projectId!='')
		$project_id = $projectId;
		else
		$project_id = $this->input->get('projectid');
        $this->middle_data['project_id']	 	= $project_id;
		
		if($_SESSION['user_session_type']=="Client"){
			$this->middle_data['sender_id']	 						= $_SESSION[USER_SESSION_ID];//sender id
			$this->middle_data['sender_client_data']	 			= $this->model_client->get_client_data($_SESSION[USER_SESSION_ID]);
			$this->middle_data['sender_type']						= "Client";
			$this->middle_data['sender_name']						= $_SESSION['user_session_fullname'];
			$this->middle_data['get_receiver']	 					= $this->model_conversation->get_receiver($project_id);
			$this->middle_data['receiver_id']      					= $this->middle_data['get_receiver']['proffetional_id'];
			$this->middle_data['receiver_proffessional_details']	= $this->model_professional->get_professional_data($this->middle_data['receiver_id']);
		}else{
			$this->middle_data['sender_id']	 						= $_SESSION[USER_SESSION_ID];//sender id
			$this->middle_data['sender_proffessional_data']	 		= $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
			$this->middle_data['sender_type']						= "Proffessional";
			$this->middle_data['sender_name']						= $_SESSION['user_session_fullname'];
			$this->middle_data['get_receiver']	 					= $this->model_project->get_project_data($project_id);
			$this->middle_data['receiver_id']      					= $this->middle_data['get_receiver'][0]->post_by;
			$this->middle_data['receiver_client_details']			= $this->model_client->get_client_data($this->middle_data['receiver_id']);
		}
		$this->middle_data['project_conversation_submit_link']		= base_url().$this->middle_data['controller'].'/add_conversation';
		$this->middle_data['attachment_path']						= file_upload_absolute_path().'conversation_files/';
		$this->middle_data['conversation']	 						= $this->model_conversation->get_conversation($project_id);
		$this->middle_data['get_receiver']	 						= $this->model_conversation->get_receiver($project_id);
			
		
		$this->template->write_view('header',  'common/header',			$this->header_data);
		$this->template->write_view('content', 'conversation/project_conversation',	$this->middle_data);
		$this->template->write_view('footer',  'common/footer',			$this->footer_data);
		$this->template->render();
	}
public function add_conversation(){
		$text_message			= $this->input->post('text_message');
		
		$this->form_validation->set_rules('text_message', 'Message',    'required');	
		if ($this->form_validation->run() == FALSE)
                    {   
                            $this->project_conversation($this->input->post('project_id'));
                    }
			else
			{		
					
			$project_id 			= $this->input->post('project_id');
		
			
			//--------- File Upload ------------------------
			  $file_name = '';
			  if(isset($_FILES['atchmnt1']['name']) && $_FILES['atchmnt1']['name'] <> "")
			  {
				  $field							= 'atchmnt1';
				  $uploadFileData					= array();
				  $uploadFileData[$field.'_err']	= '';
				  
				  $config1['allowed_types']	= 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG|txt|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx|rtf|pdf';
				  $config1['upload_path'] 	= file_upload_absolute_path().'conversation_files/';
				  $config1['optional'] 		= true;
				  $config1['max_size']  	= '12000';
				                                        
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					 $file_name = $uploadFileData[$field];
					 
				  }else{
				  echo  "<script type=\"text/javascript\">alert('Wrong File heas been uploaded ,Only 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG|txt|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx|rtf|pdf' type file are allowed.');</script>";
				  redirect($this->config->base_url()."conversation/project_conversation?projectid=".$project_id, "location");
				 }
			  }
			//--------- File Upload ------------------------
			//-------------sending mail------------------------
			if($this->input->post('sender_type')=="Client"){
				//receiver will be proffessional
				$receiver_details	= $this->model_professional->get_professional_data($this->input->post('receiver_id'));
				
				$to  = $receiver_details['ProfessionalEmail']; // note the comma
				$subject = 'Conversation text from Client';
				$message = 'Dear '.$receiver_details['ProfessionalFirstname'].' sir,<BR> Here is the new message posted in conversation <BR> '.$this->input->post('text_message').'<br>'.date("Y-m-d H:i:s")."<br>Thank You<BR>ODHUB Webteam";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To: '.$receiver_details['ProfessionalFirstname'].' <'.$receiver_details['ProfessionalEmail'].'>'. "\r\n";
				$headers .= 'From: ODHUB Webteam <noreply@odhub.com>' . "\r\n";
			}else{
				//receiver will be client
				$receiver_details			=	$this->model_client->get_client_data($this->input->post('receiver_id'));
			
				$to  = $receiver_details['ClientEmail']; 
				$subject = 'Conversation text from proffessional';
				$message = 'Dear '.$receiver_details['ClientFirstname'].' sir,<BR> Here is the new message posted in conversation <BR> '.$this->input->post('text_message').'<br>'.date("Y-m-d H:i:s")."<br>Thank You<BR>ODHUB Webteam";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To: '.$receiver_details['ClientFirstname'].' <'.$receiver_details['ClientEmail'].'>'. "\r\n";
				$headers .= 'From: ODHUB Webteam <noreply@odhub.com>' . "\r\n";
				}
				// Mail it
				/* if(mail($to, $subject, $message, $headers)){
					$last_project_id = $this->model_conversation->insert_conversation_data($file_name);
					redirect("conversation/project_conversation?projectid=".$project_id, "location");
				} */
				$last_project_id = $this->model_conversation->insert_conversation_data($file_name);
				redirect($this->config->base_url()."conversation/project_conversation?projectid=".$project_id, "location");
	}
}
	
    
}

/* End of file client.php */
/* Location: ./application_front/controllers/client.php */