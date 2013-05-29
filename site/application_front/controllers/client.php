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
        
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'client';
		//$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
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
                 $invoiceProjectArray = $this->middle_data['client_invoice']->row_array();
                 $invoiceProjectId = $invoiceProjectArray['project_id'];
                // $checkPayRelease = $this->model_client->checkPayRelease($invoiceProjectId);
                
		
		$this->template->write_view('header',  'common/header',		 $this->header_data);
		$this->template->write_view('content', 'client/client_home', $this->middle_data);
		$this->template->write_view('footer',  'common/footer',		 $this->footer_data);
		$this->template->render();
                
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
		
        //$this->middle_data['award_submit_link']    = $this->config->base_url().'proposal/submit_award';
        
         
        
        
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

	
    
}

/* End of file client.php */
/* Location: ./application_front/controllers/client.php */