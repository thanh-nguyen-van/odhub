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
         
        
        $data['category_details'] = $this->model_searchproject->getCategoryInfo($final_qry_str);
        $data['projecttypeInfo'] =  $this->model_searchproject->getProjecttypeInfo($final_qry_str);
        $data['projectstate'] =  $this->model_searchproject->getFilterState($final_qry_str);
        
        
        
        
        
        

     /*   
        if($this->request_data != NULL){
            $arr_cond_arr = array();
            
            
            if($this->request_data['state']!='all'){
                $cond_str = "`lpt`.`ProfessionalState`='".$this->request_data['state']."'";
                array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['type'])){
               $tmp_str = implode(',',$this->request_data['type']);
               $cond_str = "`lpt`.`s_professional_type_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['coaching_focus'])){
               $tmp_str = implode(',',$this->request_data['coaching_focus']);
               $cond_str = "`lpt`.`s_professional_coaching_focus_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);                 
            }
            if(isset($this->request_data['coaching_style'])){
               $tmp_str = implode(',',$this->request_data['coaching_style']);
               $cond_str = "`lpt`.`s_professional_coaching_style_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            if(isset($this->request_data['hourly_rate'])){
                $h_rate_arr = array();
                foreach($this->request_data['hourly_rate'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`ProfessionalCharges` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`ProfessionalCharges` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
                
            }
            if(isset($this->request_data['contract_val'])){
                  unset($h_rate_arr);
                  $h_rate_arr = array();
                foreach($this->request_data['contract_val'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`s_professional_contract_charge` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`s_professional_contract_charge` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
            }
            if(isset($this->request_data['looking_for'])){
               $tmp_str = $this->request_data['looking_for'];
               $cond_str = "`lpt`.`s_professional_looking_status_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            
            $final_qry_str = '('.implode(') and (',$arr_cond_arr).')';
        }
        
        
        
       if(!isset($final_qry_str)){
           $final_qry_str = 1; 
         } 
         
         if(isset($final_qry_str)){
            if($final_qry_str == "()"){
            $final_qry_str = 1;
           }
       
         }    
        
        $this->final_qry_str = $final_qry_str;
        
        
        // DebugBreak();
        
        $data['state_details'] = $this->model_searchcustom->getFilterState($final_qry_str);
        $data['lookingfor_details'] = $this->model_searchcustom->getFilterLookingfor($final_qry_str);
        $data['type_details'] = $this->model_searchcustom->getFiltertype($final_qry_str);
        $data['coatchfocus_details'] = $this->model_searchcustom->getFiltercoatchfocus($final_qry_str);
        $data['coatchstyle_details'] = $this->model_searchcustom->getFiltercoatchstyle($final_qry_str);
        $data['hourlyrate_details'] = $this->model_searchcustom->getFilterhourlyrate($final_qry_str);
        $data['contractval_details'] = $this->model_searchcustom->getFiltercontractval($final_qry_str);
        
        
      */
      
        
        
     
        $this->load->view('project/project_left',$data);  
    } 
    
    function search_result()
	{
		$data = "";
        
      
        
         $this->request_data = $this->input->post();
        
        DebugBreak();
        
        
         $final_qry_str = $this->model_all->project_search_rq($this->request_data);
        
        
         $data_result = $this->model_searchproject->getProjectDetails_short($final_qry_str);
         $data['data_result'] = $data_result;
        
         
         
       /*          

        
        if($this->request_data != NULL){
            $arr_cond_arr = array();
            
            
            if($this->request_data['state']!='all'){
                $cond_str = "`lpt`.`ProfessionalState`='".$this->request_data['state']."'";
                array_push($arr_cond_arr,$cond_str);
            }
            
            if(isset($this->request_data['type'])){
               $tmp_str = implode(',',$this->request_data['type']);
               $cond_str = "`lpt`.`s_professional_type_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['coaching_focus'])){
               $tmp_str = implode(',',$this->request_data['coaching_focus']);
               $cond_str = "`lpt`.`s_professional_coaching_focus_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);                 
            }
            if(isset($this->request_data['coaching_style'])){
               $tmp_str = implode(',',$this->request_data['coaching_style']);
               $cond_str = "`lpt`.`s_professional_coaching_style_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            if(isset($this->request_data['hourly_rate'])){
                $h_rate_arr = array();
                foreach($this->request_data['hourly_rate'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`ProfessionalCharges` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`ProfessionalCharges` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
                
            }
            if(isset($this->request_data['contract_val'])){
                  unset($h_rate_arr);
                  $h_rate_arr = array();
                foreach($this->request_data['contract_val'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`s_professional_contract_charge` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`s_professional_contract_charge` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
            }
            if(isset($this->request_data['looking_for'])){
               $tmp_str = $this->request_data['looking_for'];
               $cond_str = "`lpt`.`s_professional_looking_status_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            
            $final_qry_str = '('.implode(') and (',$arr_cond_arr).')';
        }
        
        
         if(!isset($final_qry_str)){  
             $final_qry_str = 1;  
         } 
         
         if(isset($final_qry_str)){
             if($final_qry_str == "()"){
             $final_qry_str = 1;
             } 
         }    
         
 
        $this->final_qry_str = $final_qry_str;
        
        
        
        $data_result = $this->model_professional->getAllProfessional($this->final_qry_str);
        $data['data_result'] = $data_result;
        
        */
        
        $this->load->view('project/project_content',$data);  
    }
	
	public function details()
	{
		$this->request_data = $this->input->get('projectid');		
		$this->middle_data['project_details']  = $this->model_project->get_project_data($this->request_data['projectid']);
		
		$this->load->view('common/head',			 $this->header_data);
        $this->load->view('common/header',			 $this->header_data);
        $this->load->view('project/project_details', $this->middle_data);
        $this->load->view('common/footer',			 $this->footer_data);
        $this->load->view('common/foot',			 $this->footer_data);
	}
	
	public function post_project()
	{
		$this->middle_data['post_project_submit_link'] = base_url().$this->middle_data['controller'].'/post_project_submit';
		
		$errmsg = $this->nsession->userdata('errmsg');
		if($errmsg != ''){
			$this->middle_data['errmsg'] = $errmsg;
			$this->nsession->set_userdata('errmsg', '');
		}	
		


		$this->load->view('common/head',$this->header_data);
        $this->load->view('common/header',$this->header_data);
        $this->load->view('project/project_post',$this->header_data);
        $this->load->view('common/footer',$this->footer_data);
        $this->load->view('common/foot',$this->footer_data);
	}	
	public function post_project_submit()
	{
		$this->request_data = $this->input->post();
		
		foreach($this->request_data as $key=>$val)
		  $this->form_validation->set_rules($key, str_replace('_',' ',$key), 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->post_project();
		}
		else
		{
			$this->model_project->insert_project_data();
			
			$this->template->write_view('header',  'common/header',			$this->header_data);
			$this->template->write_view('content', 'project/project_post',	$this->middle_data); 
			$this->template->write_view('footer',  'common/footer',			$this->footer_data);
			$this->template->render();
		}
	}
    
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */