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
		$this->load->model('model_upload');
        $this->load->model('model_all');
        $this->load->model('model_proposal');  
        $this->load->model('model_professional');  
        $this->load->model('model_home');
        $this->load->model('model_location');
        $this->load->model('model_countrystate');
        $this->initData();
        
        //$this->load->model('model_searchcustom');		
	}
	
	private function initData()
	{
        //DebugBreak();
       
       
       $method = $this->router->fetch_method();
       
        if($method != 'post_project' && $method!='post_project_submit' && $method!= 'post_project_2' && $method!= 'post_project_activate'){
        if(isset($_SESSION['user_session_type'])){
            if($_SESSION['user_session_type'] != 'Professional'){
                 redirect('/login/signin/', 'refresh');
            }  
        }
        else{
            redirect('/login/signin/', 'refresh');
        }
       } 
        
		$this->middle_data['controller'] = 'project';
		$this->footer_data['video'] 		= $this->model_home->get_foot_video();
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
    
    function aword_project(){
        //DebugBreak();
        $this->request_data = $this->input->post();
        $middle_data['awarded_projects'] = $this->model_professional->getMyAwardedProjects($_SESSION[USER_SESSION_ID]); 
        
        $this->load->view('common/head',$this->header_data);
        $this->load->view('common/header',$this->header_data);
        $this->load->view('project/aword_project',$middle_data);
        $this->load->view('common/footer',$this->footer_data);
        $this->load->view('common/foot',$this->footer_data);
    }
   
   function getCategoryName($category_id){
       $category_info = $this->model_all->getCategoryName($category_id);
       return $category_info;
   } 
   
   function getStateName($stateId){
       $state_info = $this->model_all->getStateName($stateId);
       return $state_info;
   }
     
    function index_left()
	{
       $final_qry_str = 1;
	   $final_qry_str_2 = 1;
       $this->request_data = $this->input->post();
       
        //DebugBreak();
        
       
        $final_qry_str = $this->model_all->project_search_rq($this->request_data);
        $final_qry_str_2 = $this->model_all->project_search_rq($this->request_data);
         
    	
        $data['category_details']	= $this->model_searchproject->getCategoryInfo($final_qry_str);
        $data['projecttypeInfo']	= $this->model_searchproject->getProjecttypeInfo($final_qry_str);
       // print_r($data['projecttypeInfo']); die;
        $data['project_leadership_coaching']	= $this->model_searchproject->project_leadership_coaching($final_qry_str);
		$data['projectstate']		= $this->model_searchproject->getFilterState($final_qry_str);
		$data['pr_cat_name'] = $this->input->post('pr_cat_name');
      // echo "<pre>";  
     // print_r($data);
	
        $this->load->view('project/project_left',$data);  
    } 
    
    function search_result()
	{
		$data = "";
         $this->request_data = $this->input->post();
         $pagination_value = $this->request_data['pagination'];
        //DebugBreak();
        
       
       $final_qry_str = $this->model_all->project_search_rq($this->request_data);
       //  echo $final_qry_str;
        
         $data_result = $this->model_searchproject->getProjectDetails_short($final_qry_str,$pagination_value);
         $data['data_result'] = $data_result;
         $data['number_of_project'] = $this->model_searchproject->num_record;
         $data['present_selection'] = $pagination_value;
         
        
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
    
    public function share(){
        //DebugBreak();
      
	   
	     
       $project_id = $this->input->get('ProjectId'); 
       $post_data = $this->input->post();
       
       if(isset($post_data['send_message'])){
           $subject = $post_data['subject'];
           $to = $post_data['to'];
           $content = $post_data['content']."<br/> Here is the URL for Project:-".base_url('project/details?projectid=').$project_id; 
           $url = $post_data['url'];
			
		
			
		   $headers  = 'MIME-Version: 1.0' . "\r\n";
           $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: '.$to . "\r\n";
            $headers .= 'From: OdHub <odhub@odhub.com>' . "\r\n";
            
			@mail($to, $subject, $content, $headers);
			
            $this->middle_data['mail_send'] = '1';
       }
	   $this->load->view('project/send_message_prof', $this->middle_data);
		
    }
    
    public function getSkill($professional_id){
        
        $professional_skill_data = $this->model_proposal->get_Professionalskill($professional_id);
        $professional_skill_arr	 = array();
        
        
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
      $this->middle_data['project_details']  = $this->model_project->get_project_data($this->request_data); 
	  $this->load->view('project/project_head', $this->middle_data);  
        
    }
    
   public function project_proposal()
   {
      $this->middle_data = array();  
      $project_id		 = $this->request_data;
      
      $proposal_details  = $this->model_proposal->get_proposal($project_id);
      $this->middle_data['proposal_details'] = $proposal_details;  
      
      $this->load->view('project/project_proposal', $this->middle_data);
        
    }
	public function project_proposal_byuser()
   {
      $this->middle_data = array();  
      $project_id		 = $this->request_data;
      
      $proposal_details  = $this->model_proposal->get_proposal_byuser($project_id);
      $this->middle_data['proposal_details'] = $proposal_details;  
      
      $this->load->view('project/project_proposal_aword', $this->middle_data);
        
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
        $this->middle_data['project_skills_data']       = $this->model_project->get_project_skills_data();
        $this->middle_data['state_data']        		= $this->model_project->getAllState();
		$this->middle_data['projecttype']				= $this->model_project->getProjectType();
		$this->middle_data['minimum_amount']				= $this->model_project->checkMinimumProjectAmount();
		if(isset($_SESSION['less_amount'])){
		$this->middle_data['less_minimum_amount_msg'] = $_SESSION['less_amount'];
		unset($_SESSION['less_amount']);
		}
		$this->middle_data['project_details']	= $this->model_project->get_project_data($this->input->get('projectid'));
		if($this->middle_data['project_details']){
			$project_skills						= $this->model_project->get_project_skills($this->input->get('projectid'));
			//print_r($project_skills);
			if(!empty($project_skills)){
			foreach($project_skills as $key=>$val)
		  		$skills[$val->pr_skill_id] = $val->pr_skill_id;
			$this->middle_data['skill_inputs']	= $skills;
			}
		}
		
        
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

		$this->request_data			= $this->input->post();		
		$this->request_skills_data	= $this->input->post('skills');
		
		foreach($this->request_data as $key=>$val)
		  if($key != 'skills')
		  	$this->form_validation->set_rules($key, str_replace('_',' ',$key), 'required');
		if(!empty($this->request_skills_data)){
		foreach($this->request_skills_data as $key=>$val)
		  	$skills[$val] = $val;
		}
		
		//if ($this->form_validation->run() == FALSE)
                if (0)
		{
			$this->middle_data['skill_inputs'] = $skills;
			$this->post_project();
		}
		else
		{
			$minimum_amount = $this->model_project->checkMinimumProjectAmount();
			if(($this->input->post('start_price1')!='') && ($this->input->post('start_price1') < $minimum_amount['minimum_project_amount'])){
			$_SESSION['less_amount'] = "Please Give more than or equal to minimum price for project"; 
			$this->post_project();
			}elseif(($this->input->post('start_price2')!='') && ($this->input->post('start_price2') < $minimum_amount['minimum_project_amount_hourly'])){
			$_SESSION['less_amount'] = "Please Give more than or equal to minimum price for project"; 
			$this->post_project();
			}else{
			
			//--------- File Upload ------------------------
			  $file_name = '';
			  if(isset($_FILES['atchmnt']['name']) && $_FILES['atchmnt']['name'] <> "")
			  {
				  $field			= 'atchmnt';
				  $uploadFileData		= array();
				  $uploadFileData[$field.'_err']= '';
				  
				  $config1['allowed_types']	= 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG|txt|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx|rtf|pdf';
				  $config1['upload_path'] 	= file_upload_absolute_path().'project_files/';
				  $config1['optional'] 		= true;
				  $config1['max_size']  	= '12000';
				      // print_r($uploadFileData.'~~~~'.$field.'~~~~~~'.print_r($config1));  die("asdasd");                               
				  $isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config1);
				  if($isUploaded)
				  {
					  $file_name = $uploadFileData[$field];
				  }
			  }
			//--------- File Upload ------------------------
			
			$last_project_id = $this->model_project->insert_project_data($file_name);
			$this->middle_data['project_id'] = $last_project_id;
			//
			$this->middle_data['project_details'] 			 = $this->model_project->get_project_data($last_project_id);
			$this->middle_data['skill_details']	  			 = $this->model_project->get_project_skills($last_project_id);
		
			$this->middle_data['post_project_activate_link'] = base_url().$this->middle_data['controller'].'/post_project_activate';
			$this->load->view('common/head',		 	$this->header_data);
			$this->load->view('common/header',			$this->header_data);
			$this->load->view('project/project_post_2', $this->middle_data);
			$this->load->view('common/footer',		 	$this->footer_data);
			$this->load->view('common/foot',		 	$this->footer_data);
			
		// commented by manish
			
		//	$this->template->write_view('header',  'common/header',			 $this->header_data);
		//	$this->template->write_view('content', 'project/project_post_1', $this->middle_data); 
		//	$this->template->write_view('footer',  'common/footer',			 $this->footer_data);
		//	$this->template->render();
		}
		}
	}
	
	public function post_project_2()
	{
		$this->middle_data['project_details'] 			 = $this->model_project->get_project_data($this->input->get('projectid'));
		$this->middle_data['skill_details']	  			 = $this->model_project->get_project_skills($this->input->get('projectid'));
		
		$this->middle_data['post_project_activate_link'] = base_url().$this->middle_data['controller'].'/post_project_activate';
		
		$this->load->view('common/head',		 	$this->header_data);
        $this->load->view('common/header',			$this->header_data);
        $this->load->view('project/project_post_2', $this->middle_data);
        $this->load->view('common/footer',		 	$this->footer_data);
        $this->load->view('common/foot',		 	$this->footer_data);
	}
	public function post_project_activate()
	{		
		$this->request_data = $this->input->post();
		$this->middle_data['last_project_id']	= $this->model_project->activate_project_data();
			
			
		$this->template->write_view('header',  'common/header',			 	 $this->header_data);
		$this->template->write_view('content', 'project/project_post_thank', $this->middle_data); 
		$this->template->write_view('footer',  'common/footer',			 	 $this->footer_data);
		$this->template->render();
	}
	public function proposal_submit()
	{		

		$this->middle_data['project_link']	= base_url('project/details/?projectid='.$this->input->get('projectid'));
			
			
		$this->template->write_view('header',  'common/header',			 	 $this->header_data);
		$this->template->write_view('content', 'professional/proposalthanks', $this->middle_data); 
		$this->template->write_view('footer',  'common/footer',			 	 $this->footer_data);
		$this->template->render();
	}
    public function aword_project_details(){
	$this->request_data = $this->input->get('projectid');		       
        //////////////////////////////
         $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
        $prof_data = $this->middle_data['prof_data'];
        $referral_code = $prof_data['referral_code'];
        $qry_str = "`lpt`.`p_user` = '" . $referral_code . "'";
        $referal_professional = $this->model_professional->getAllProfessional($qry_str);
        $this->middle_data['awarded_projects'] = $this->model_professional->getMyAwardedProjects($_SESSION[USER_SESSION_ID]);
      
         $this->middle_data['var_array'] = $this->middle_data['awarded_projects']->row_array();
        $awardedProjectId = $this->request_data;
        $checkReferal = $this->model_professional->checkIfReferred($awardedProjectId);
        
        $this->middle_data['referal_professional'] = $referal_professional;
        $this->middle_data['my_referal'] = $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();
        
        $referal_details = $this->model_all->getreferal_details($_SESSION[USER_SESSION_ID]);
        /////////////////////////////
		
        $this->load->view('common/head',			 $this->header_data);
        $this->load->view('common/header',			 $this->header_data);
        $this->load->view('project/project_aword_details', $this->middle_data);
        $this->load->view('common/footer',			 $this->footer_data);
        $this->load->view('common/foot',			 $this->footer_data);
	}
         public function checkIfReferred($project_id)
        {
           return $checkStatusReferer = $this->model_project->checkIfReferred($project_id);
            
        }       


}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */