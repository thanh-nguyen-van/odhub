<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller 
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
	
	private function initData()
	{
		$this->middle_data['controller'] = 'project';
	}
	    
	function index()
	{    
        $this->request_data = $this->input->post();
        
        $this->load->view('common/head',$this->header_data);
        $this->load->view('common/header',$this->header_data);
        $this->load->view('project/index');
        $this->load->view('common/footer',$this->footer_data);
        $this->load->view('common/foot',$this->footer_data);
	}  
     
    function index_left()
	{
       $final_qry_str = 1;
       $this->request_data = $this->input->post();
        
        //DebugBreak();
        
        
        $final_qry_str = $this->model_all->project_search_rq($this->request_data);
         
        
        $data['category_details']	= $this->model_searchproject->getCategoryInfo($final_qry_str);
        $data['projecttypeInfo']	=  $this->model_searchproject->getProjecttypeInfo($final_qry_str);
        $data['projectstate']		=  $this->model_searchproject->getFilterState($final_qry_str);
        
        
     
        $this->load->view('project/project_left',$data);  
    } 
    
    function search_result()
	{
		$data = "";
        
      
        
         $this->request_data = $this->input->post();
        
        //DebugBreak();
        
        
         $final_qry_str = $this->model_all->project_search_rq($this->request_data);
        
        
         $data_result = $this->model_searchproject->getProjectDetails_short($final_qry_str);
         $data['data_result'] = $data_result;
        
         
         
    
        
        $this->load->view('project/project_content',$data);  
    }
	
    public function getSkillInfo($project_id){
        $project_skill_data = $this->model_searchproject->getProjectSkillDetails($project_id);
        $project_skill_arr = array();
        
        
        foreach($project_skill_data as $key=>$val){
            $skill_name = $val->skill_name;
            array_push($project_skill_arr,$skill_name);
        }
        
        $project_skillset_str = implode(',',$project_skill_arr);
        
        return $project_skillset_str;
    }
    
    
	public function details()
	{
        //DebugBreak();
        
		$this->request_data = $this->input->get('projectid');		
		
		
		$this->load->view('common/head',			 $this->header_data);
        $this->load->view('common/header',			 $this->header_data);
        $this->load->view('project/project_details', $this->middle_data);
        $this->load->view('common/footer',			 $this->footer_data);
        $this->load->view('common/foot',			 $this->footer_data);
	}
    
    
    public function getSkill($professional_id){
        
        $professional_skill_data = $this->model_proposal->get_Professionalskill($professional_id);
        $professional_skill_arr = array();
        
        
        foreach($professional_skill_data as $key=>$val){
            $skill_name = $val->skill_name;
            array_push($professional_skill_arr,$skill_name);
        }
        
        $skillset_str = implode(',',$professional_skill_arr);
        
        return $skillset_str;
    }
    
    
    public function project_head()
	{
      $this->middle_data = array();  
      $this->middle_data['project_details']  = $this->model_project->get_project_data($this->request_data['projectid']);  
      $this->load->view('project/project_head', $this->middle_data);  
        
    }
    
   public function project_proposal()
   {  
  
      $this->middle_data = array();  
      $project_id = $this->request_data;
      
      $proposal_details = $this->model_proposal->get_proposal($project_id);
      
      $this->middle_data['proposal_details'] = $proposal_details;  
      
      $this->load->view('project/project_proposal', $this->middle_data);
        
    }
    
    public function project_proposal_post()
	{        
      $this->middle_data = array();  
      $this->load->view('project/project_proposal_post', $this->middle_data);  
    }
    
    
    
	public function project_post_left()
   {        
      $this->middle_data = array();  
      $this->load->view('project/project_post_left', $this->middle_data);  
    }
	public function project_post_right()
   {        
      $this->middle_data = array();  
      $this->load->view('project/project_post_right', $this->middle_data);  
    }   
	public function post_project()
	{

		$this->middle_data['post_project_submit_link']	= base_url().$this->middle_data['controller'].'/post_project_submit';
        $this->middle_data['project_skills_data']        = $this->model_project->get_project_skills_data();
        $this->middle_data['state_data']        = $this->model_project->getAllState();
		$this->middle_data['projecttype']		= $this->model_project->getProjectType();
		
        
        
		/*$errmsg = $this->nsession->projectdata('errmsg');
		if($errmsg != ''){
			$this->middle_data['errmsg'] = $errmsg;
			$this->nsession->set_projectdata('errmsg', '');
		}*/
		
		$this->load->view('common/head',		  $this->header_data);
        $this->load->view('common/header',		  $this->header_data);
        $this->load->view('project/project_post', $this->middle_data);
        $this->load->view('common/footer',		  $this->footer_data);
        $this->load->view('common/foot',		  $this->footer_data);
	}	
	public function post_project_submit()
	{
		$this->request_data = $this->input->post();
		
		foreach($this->request_data as $key=>$val)
		  $this->form_validation->set_rules($key, str_replace('_',' ',$key), 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//$this->middle_data['project_post_data'] = $this->request_data;
			$this->post_project();
		}
		else
		{
			$this->model_project->insert_project_data();
			
			$this->template->write_view('header',  'common/header',				 $this->header_data);
			$this->template->write_view('content', 'project/project_post_thank', $this->middle_data); 
			$this->template->write_view('footer',  'common/footer',				 $this->footer_data);
			$this->template->render();
		}
	}
    
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */