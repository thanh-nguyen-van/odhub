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
        $this->model_proposal->insert_award_data();
		
		$this->template->write_view('header',  'common/header',			$this->header_data);
		$this->template->write_view('content', 'client/award_thanks',	$this->middle_data);
		$this->template->write_view('footer',  'common/footer',			$this->footer_data);
		$this->template->render();
	}
        
	
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */