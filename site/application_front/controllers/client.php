<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
		$this->load->model('model_email');
		$this->load->model('model_client');
		$this->load->model('model_professional');
		$this->load->model('model_project');
		$this->load->model('model_searchproject');
		$this->load->model('model_proposal');
		$this->load->model('model_location');
        $this->load->model('model_upload');
		$this->load->model('model_searchcustom');
		$this->load->model('model_conversation');
        $this->load->model('model_home');
        $this->load->model('model_message');
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'client';
		//$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
		$this->footer_data['video'] 		= $this->model_home->get_foot_video();
	}
	
	public function show_home()
	{
                $client_id = $_SESSION[USER_SESSION_ID];
        
				$this->middle_data['client_data']	= $this->model_client->get_client_data($client_id);
				$this->middle_data['country_data']	= $this->model_location->get_country_data($this->middle_data['client_data']['ClientCountry']);
				$this->middle_data['state_data']	= $this->model_location->get_state_data($this->middle_data['client_data']['ClientState']);
                $this->middle_data['fab_prof']      = $this->model_searchcustom->get_fab_professional($client_id);
               
                
                
                 $this->middle_data['client_invoice'] = $this->model_client->getClientInvoices($client_id);
                 $this->middle_data['nr_client_invoice'] = $this->model_client->getClientInvoices($client_id)->num_rows();
				 $this->middle_data['number_of_unread_message']= $this->model_message->getMessageSet($_SESSION[USER_SESSION_ID],'unread','client');
                 $invoiceProjectArray = $this->middle_data['client_invoice']->row_array();
                 if(!empty($invoiceProjectArray))
				 $invoiceProjectId = $invoiceProjectArray['project_id'];
                // $checkPayRelease = $this->model_client->checkPayRelease($invoiceProjectId);
                
		
		$this->template->write_view('header',  'common/header',		 $this->header_data);
		$this->template->write_view('content', 'client/client_home', $this->middle_data);
		$this->template->write_view('footer',  'common/footer',		 $this->footer_data);
		$this->template->render();
                
	}
	public function show_profile()
	{
		  $client_id = $this->input->get('client_id');
        
        if(!$client_id){
            $client_id = $_SESSION[USER_SESSION_ID];  
        } 
        
        
		 $this->middle_data['client_data']	= $this->model_client->get_client_data($client_id);
		 $this->middle_data['country_data']	= $this->model_location->get_country_data($this->middle_data['client_data']['ClientCountry']);
		 $this->middle_data['state_data']	= $this->model_location->get_state_data($this->middle_data['client_data']['ClientState']);
		 $this->middle_data['fab_prof']      = $this->model_searchcustom->get_fab_professional($client_id);
		 $this->middle_data['client_invoice'] = $this->model_client->getClientInvoices($client_id);
		 $this->middle_data['nr_client_invoice'] = $this->model_client->getClientInvoices($client_id)->num_rows();

		 $invoiceProjectArray = $this->middle_data['client_invoice']->row_array();
		 $invoiceProjectId = $invoiceProjectArray['project_id'];
		// $checkPayRelease = $this->model_client->checkPayRelease($invoiceProjectId);
		
		$this->load->view('common/head',            $this->header_data);
         $client_id = $this->input->get('client_id');
		 if(!$client_id){
			$this->load->view('common/header',            $this->header_data);
        }
		
		$this->load->view('client/client_profile',            $this->middle_data);
         if(!$client_id){
			$this->load->view('common/footer',            $this->footer_data);
        }
		$this->load->view('common/foot',            $this->footer_data);
        
        

		//$this->template->render();
                
	}
	
       function check_showhome($invoice_code){
           
           $record = $this->model_client->check_paybut($invoice_code);
           if(count($record)>0){
               return false;
           }
           else{
               return true;
           }
       } 
        
        
	public function project_list()
	{
        $client_id = $_SESSION[USER_SESSION_ID];
        
		$this->middle_data['client_data']	= $this->model_client->get_client_data($client_id);
		$this->middle_data['projects_data']	= $this->model_project->get_projects_data($client_id);
		
		$this->template->write_view('header',  'common/header',		  $this->header_data);
		$this->template->write_view('content', 'client/project_list', $this->middle_data);
		$this->template->write_view('footer',  'common/footer',		  $this->footer_data);
		$this->template->render();
	}	
	public function project_details()
	{
		$project_id								 = $this->input->get('projectid');
		$this->middle_data['project_details']	 = $this->model_project->get_project_data($project_id);
		$this->middle_data['project_skill_data'] = $this->model_searchproject->getProjectSkillDetails($project_id);		
		
		
		$this->load->view('common/head',			$this->header_data);
        $this->load->view('common/header',			$this->header_data);
        $this->load->view('client/project_details',	$this->middle_data);
        $this->load->view('common/footer',			$this->footer_data);
        $this->load->view('common/foot',			$this->footer_data);
	}
	
	public function proposal_list()
	{
        $client_id	= $_SESSION[USER_SESSION_ID];
        $project_id = $this->input->get('projectid');
        
		$this->middle_data['project_id']	 	= $project_id;
		$this->middle_data['client_data']	 	= $this->model_client->get_client_data($client_id);
		$this->middle_data['proposals_data']	= $this->model_proposal->get_proposals($project_id);
	
		$professionalID = $this->middle_data['proposals_data'][0]->ProfessionalId;
        $professional_skill_deatails = $this->model_professional->get_professional_skills_set($professionalID);
		$skills_string = '';
		
		for($i=0;$i<count($professional_skill_deatails);$i++){
			$skills[] = $this->model_professional->get_professional_skills_details($professional_skill_deatails[$i]['skill_id']);
			if(array_key_exists('skill_name',$skills[$i]))
			$skills_string .= $skills[$i]['skill_name'].",";
		}
		$this->middle_data['professional_skills'] = substr($skills_string,0,-1);
		
		$this->middle_data['award_submit_link']	= $this->config->base_url().'proposal/confirm/';
		
		$this->template->write_view('header',  'common/header',			$this->header_data);
		$this->template->write_view('content', 'client/proposal_list',	$this->middle_data);
		$this->template->write_view('footer',  'common/footer',			$this->footer_data);
		$this->template->render();
	}
    
    public function remove_fav(){
       // DebugBreak();
        $client_id = $_SESSION['user_session_id'];
        $get_data = $this->input->get();  
        $professional_id = $get_data['professional_id'];  
        
        $result = $this->model_searchcustom->configure_fav($client_id,$professional_id); 
        
        redirect('/client/show_home/', 'refresh'); 
    }
	public function give_review($project_id_form=''){

		$client_id	= $_SESSION[USER_SESSION_ID];
		if(isset($project_id_form) && $project_id_form!='')
		$project_id = $project_id_form;
		else
        $project_id = $this->input->get('projectid');
	
		$professional_details = $this->model_proposal->getProfessionalInfo($project_id);
	//	print_r($professional_details);
		$qry = "`ProfessionalId`='".$professional_details[0]->proffetional_id."'";
		$this->middle_data['professional_id']  = $professional_details[0]->proffetional_id;
        $professional_details_full = $this->model_professional->getAllProfessional($qry); 
		$this->middle_data['professional_name'] = $professional_details_full[0]->ProfessionalFirstname." ".$professional_details_full[0]->ProfessionalLastname;
		$this->middle_data['project_id'] = $project_id;
		$this->template->write_view('header',  'common/header',			$this->header_data);
		$this->template->write_view('content', 'client/give_review',	$this->middle_data);
		$this->template->write_view('footer',  'common/footer',			$this->footer_data);
		$this->template->render();
	}
	public function review_submit(){
			$this->form_validation->set_rules('review_percentage', 'Review',    'required');
			$this->form_validation->set_rules('review', 'Description',    'required');
		
                    if ($this->form_validation->run() == FALSE)
                    {   
                            $this->give_review($this->input->post('project_id'));
                    }
                    else
                    {
                        if($this->model_client->review_submit())
						redirect('/client/show_home/', 'refresh'); 
                    }
	
	}
	function showinvoice(){
        $this->middle_data['invs_details'] = $this->model_client->get_inv_details($this->input->get('invsid'));
		$qry = "`ProfessionalId`='".$this->middle_data['invs_details']['professional_id']."'";
		$this->middle_data['professional_details_full'] = $this->model_professional->getAllProfessional($qry); 
		$this->load->view('client/show_invoice', $this->middle_data); 
	  
    }
	 public function edit_profile() {
	  $client_id = $this->input->get('client_id');
        
        if(!$client_id){
            $client_id = $_SESSION[USER_SESSION_ID];  
        } 
        
        
		 $this->middle_data['client_data']	= $this->model_client->get_client_data($client_id);
		
		 $this->middle_data['country_data']	= $this->model_location->get_country_data($this->middle_data['client_data']['ClientCountry']);
		 $this->middle_data['state_data']	= $this->model_location->get_state_data($this->middle_data['client_data']['ClientState']);
		  // print_r($this->middle_data['country_data']);
		// die;
        if(isset($_SESSION['succ_msg'])){
             $this->middle_data['sucmsg'] = $_SESSION['succ_msg'];
             unset($_SESSION['succ_msg']);
        }
       // print_r($this->middle_data['prof_data']); 
      
        $this->middle_data['state_data1']        = $this->model_project->getAllState();   
        $this->middle_data['country_data1']        = $this->model_project->getAllCountry();   
		
	
		$this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'client/edit_profile', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }
    public function edit_profile_save($formName)
    {
		
	 if($formName=='general_info'){
                    $this->form_validation->set_rules('ClientUsername', 'User name',    'required');
                    $this->form_validation->set_rules('ClientFirstname', 'First Name',    'required');
                    $this->form_validation->set_rules('ClientLastname', 'Last Name',      'required');
                    $this->form_validation->set_rules('ClientAddress', 'Address',               'required');
                    $this->form_validation->set_rules('ClientZipcode', 'Zip code',        'required');
                    $this->form_validation->set_rules('ClientCountry', 'Country',    'required');
                    $this->form_validation->set_rules('ClientState', 'State / Region',    'required');
                    $this->form_validation->set_rules('ClientDescription', 'Description',    'required');
                 
                    $this->form_validation->set_error_delimiters('<div class=" ">', '</div>');
                    if ($this->form_validation->run() == FALSE)
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
                        if($this->model_client->update_info($this->input->post()))
                        {
                           $_SESSION['succ_msg'] = "Information updated successfully !";
   
                            redirect(site_url('client/edit_profile'));
                        }
                    }
                }
         
                
    }
	public function message(){
        $this->model_message->UpdateMessageView($_SESSION[USER_SESSION_ID]);
		$this->middle_data['message_data_set']= $this->model_message->getMessageSet($_SESSION[USER_SESSION_ID],'','client');
			
			$this->load->view('common/head',		 	$this->header_data);
			$this->load->view('common/header',			$this->header_data);
			$this->load->view('client/message', $this->middle_data);
			$this->load->view('common/footer',		 	$this->footer_data);
			$this->load->view('common/foot',		 	$this->footer_data);
		
		}
    
	
    
}

/* End of file client.php */
/* Location: ./application_front/controllers/client.php */