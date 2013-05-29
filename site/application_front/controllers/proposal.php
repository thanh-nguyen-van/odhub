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
        
        $this->initData();
        
        //$this->load->model('model_searchcustom');		
	}
	
	public function initData()
	{
		$this->middle_data['controller'] = 'project';
	}
	
    public function saveproposal(){
    // print_r($_REQUEST);
	// die;
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
       
       redirect('project/details/?projectid='.$this->request_data['project_id'], 'refresh');
    }
	
	public function submit_award()
	{
        
        $price = $this->input->request('amount');
        $aword_id = $this->model_proposal->insert_award_data();
        $this->middle_data['price'] = $price;
        $this->middle_data['aword_id'] = $aword_id;
        
        $projectid = $this->input->request('projectid');
        $this->middle_data['projectid'] = $projectid;
       
        //DebugBreak();
        $paypal_details = $this->model_proposal->get_admin_paypal_acount();
        
        $paypal_email = $paypal_details[0]->paypal_email;
        $this->middle_data['paypal_email'] = $paypal_email;
        
        
        $project_data = $this->model_project->get_project_data($projectid);
        
        $this->middle_data['project_data'] = $project_data; 
		
         //$this->template->write_view('content', 'client/award_thanks',    $this->middle_data); 
         $this->middle_data['award_success_link']    = $this->config->base_url().'proposal/update_award';
         $this->middle_data['award_notify_link']    = $this->config->base_url().'proposal/notify_award';
         
         
		 $this->template->write_view('content', 'client/redirect_paypal',    $this->middle_data); 
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