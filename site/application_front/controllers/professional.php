<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Professional extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_content');
        $this->load->model('model_email');
        $this->load->model('model_professional');
        $this->load->model('model_location');
        $this->load->model('model_upload');
        $this->load->model('model_all');
        $this->load->model('model_project');
		$this->load->helper('download');
		$this->load->model('model_home');
		
        $this->initData();
    }

    private function initData() {
        $this->middle_data['controller'] = 'professional';
        //$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
        //$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
		$this->footer_data['video'] 		= $this->model_home->get_foot_video();
    }

    public function forum_login() {
        $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);

        $this->template->write_view('content', 'professional/forum_login', $this->middle_data);

        $this->template->render();
    }

    public function forum_logout() {
        $this->template->write_view('content', 'professional/forum_logout', $this->middle_data);

        $this->template->render();
    }

    public function show_home() {

        $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
        $prof_data = $this->middle_data['prof_data'];

        $this->middle_data['country_data'] = $this->model_location->get_country_data($this->middle_data['prof_data']['ProfessionalCountry']);
        $this->middle_data['state_data'] = $this->model_location->get_state_data($this->middle_data['prof_data']['ProfessionalState']);

        $referral_code = $prof_data['referral_code'];

        $qry_str = "`lpt`.`p_user` = '" . $referral_code . "'";
        $referal_professional = $this->model_professional->getAllProfessional($qry_str);
        $this->middle_data['awarded_projects'] = $this->model_professional->getMyAwardedProjects($_SESSION[USER_SESSION_ID]);
        $this->middle_data['awarded_projects_details'] = $this->middle_data['awarded_projects']->result_array();
        $awardedProjectArray = $this->middle_data['awarded_projects']->row_array();

        if (!empty($awardedProjectArray)) {
            $awardedProjectId = $awardedProjectArray['project_id'];
            $checkReferal = $this->model_professional->checkIfReferred($awardedProjectId);
        }
        $this->middle_data['nr_awarded_projects'] = $this->middle_data['awarded_projects']->num_rows();
        $this->middle_data['referal_professional'] = $referal_professional;
        $this->middle_data['my_referal'] = $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();

        $referal_details = $this->model_all->getreferal_details($_SESSION[USER_SESSION_ID]);
		
        $this->middle_data['referal_payment'] = $referal_details;
	

		$this->middle_data['refferal_history'] = $this->model_professional->Refferal_history($_SESSION[USER_SESSION_ID]);
		$this->middle_data['Account_history'] = $this->model_professional->Account_history($_SESSION[USER_SESSION_ID]);
		//review part
		$review_details = $this->model_professional->get_review($_SESSION[USER_SESSION_ID]);
		$temp_review = 0;
		for($i=0;$i<count($review_details);$i++){
		
		$temp_review += $review_details[$i]['rating'];
		
		}
		if(count($review_details)>0)
		$this->middle_data['average_review'] = $temp_review/count($review_details);
		
		$this->middle_data['invoice_details'] = $this->model_professional->getProfessionalInvoices($_SESSION[USER_SESSION_ID]);
	
        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/professional_home', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }

    public function refer_user($referal_user_id, $project_id, $proposal_id) {
        // ------- Fetch Awarded project details --------//
        $this->db->select('*');
        $this->db->from('project_aword_map');
        $this->db->where('project_id', $project_id);
        $this->db->where('proposal_id', $proposal_id);
        $exist_data_qry = $this->db->get();
        $exist_data_array = $exist_data_qry->row_array();
        // ------- Fetch Awarded project details --------//
        // ------------check to see if already referred ----//
        $this->db->select('*');
        $this->db->from('project_aword_map');
        $this->db->where('project_id', $project_id);
        $this->db->where('proffetional_id', $referal_user_id);
        $this->db->where('proposal_id', $proposal_id);
        $already_exist_data_qry = $this->db->get();
        //$already_exist_data_array = $already_exist_data_qry->num_rows();
        $nr_exist = $already_exist_data_qry->num_rows();
        // ------------check to see if already referred ----//

        if ($nr_exist == 0) {
            //-----Insert into award table for reference professional ------//
            $data_arr = array(
                "project_id" => $project_id,
                "proffetional_id" => $referal_user_id,
                "proposal_id" => $proposal_id,
                "aword_date" => $exist_data_array['aword_date'],
                "payment_date" => $exist_data_array['payment_date'],
                "price" => $exist_data_array['price'],
                "ipn_track_id" => $exist_data_array['ipn_track_id'],
                "delivery_date" => $exist_data_array['delivery_date'],
                "comment" => $exist_data_array['comment'],
            );
            if ($this->db->insert('project_aword_map', $data_arr)) {
                echo '1';
            }
            //-----Insert into award table for reference professional ------// 
        } else {
            // --- If already referred///
            echo '2';
            // --- If already referred///
        }
    }

    public function send_invoice() {
        // print_r($_REQUEST);
        // die;
        $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
        $project_id = $this->input->get('projectid');
        $this->middle_data['project_details'] = $this->model_professional->get_project_data($project_id, $_SESSION[USER_SESSION_ID]);

        $prof_data = $this->middle_data['prof_data'];
        $this->middle_data['country_data'] = $this->model_location->get_country_data($this->middle_data['prof_data']['ProfessionalCountry']);
        $this->middle_data['state_data'] = $this->model_location->get_state_data($this->middle_data['prof_data']['ProfessionalState']);
        $referral_code = $prof_data['referral_code'];
        $qry_str = "`lpt`.`p_user` = '" . $referral_code . "'";
        $referal_professional = $this->model_professional->getAllProfessional($qry_str);
        $this->middle_data['awarded_projects'] = $this->model_professional->getMyAwardedProjects($_SESSION[USER_SESSION_ID]);
        $this->middle_data['nr_awarded_projects'] = $this->middle_data['awarded_projects']->num_rows();
        $this->middle_data['referal_professional'] = $referal_professional;
        $this->middle_data['my_referal'] = $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        ;
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();

        //insert into database
        if ($this->input->post('send_and_insert') == "send_and_insert") {
            $request_data = $this->input->post();
            $this->model_professional->SaveInvoiceData($request_data);
        }
        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/final_send_invoice.php', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }

    public function checkIfReferred($project_id) {
        return $checkStatusReferer = $this->model_professional->checkIfReferred($project_id);
    }

    public function checkIfinvoiceSend($project_id) {
        return $checkStatusSendinvoice = $this->model_professional->checkIfinvoiceSend($project_id);
    }

    public function edit_profile() {
        $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
        if(isset($_SESSION['succ_msg'])){
             $this->middle_data['sucmsg'] = $_SESSION['succ_msg'];
             unset($_SESSION['succ_msg']);
        }
       // print_r($this->middle_data['prof_data']); 
        $this->middle_data['country_data'] = $this->model_location->get_country_data($this->middle_data['prof_data']['ProfessionalCountry']);
       
		$this->middle_data['state_data'] = $this->model_location->get_state_data($this->middle_data['prof_data']['ProfessionalState']);
        $this->middle_data['state_data1']        = $this->model_project->getAllState();   
        $this->middle_data['country_data1']        = $this->model_project->getAllCountry();   
		$this->middle_data['professional_skill_deatails'] = $this->model_professional->get_professional_skills_set($_SESSION[USER_SESSION_ID]);
		$this->middle_data['skill_set'] = $this->model_all->get_All_skills_set();
	
		$this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/edit_profile', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }
    public function edit_profile_save($formName)
    {
       //print_r($this->input->post());
                if($formName=='general_info'){
                    $this->form_validation->set_rules('ProfessionalFirstname', 'First Name',    'required');
                    $this->form_validation->set_rules('ProfessionalLastname', 'Last Name',      'required');
                    $this->form_validation->set_rules('ProfessionalCity', 'City',               'required');
                    $this->form_validation->set_rules('ProfessionalZipcode', 'Zip code',        'required');
                    $this->form_validation->set_rules('ProfessionalState', 'State / Region',    'required');
                    $this->form_validation->set_rules('ProfessionalCountry', 'Country',    'required');
                    $this->form_validation->set_rules('ProfessionalState', 'State / Region',    'required');
                    $this->form_validation->set_rules('ProfessionalState', 'State / Region',    'required');
                    $this->form_validation->set_rules('ProfessionalState', 'State / Region',    'required');
                    $this->form_validation->set_error_delimiters('<div class=" ">', '</div>');
                    if ($this->form_validation->run() == FALSE)
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
                        if($this->model_professional->update_info($this->input->post()))
                        {
                           $_SESSION['succ_msg'] = "Information updated successfully !";
   
                            redirect(site_url('professional/edit_profile'));
                        }
                    }
                }
                if($formName=='skill_expertise'){
                    // $this->form_validation->set_rules('ProfessionalYear', 'Expertise year',    'required');
                    // $this->form_validation->set_rules('ProfessionalDegree', 'Degree',      'required');
                    // $this->form_validation->set_rules('ProfessionalSpecialization', 'Specialization',               'required');
                    // $this->form_validation->set_rules('ProfessionalAchievements', 'Achievement',        'required');
                    // $this->form_validation->set_rules('ProfessionalDescription', 'Short description',    'required');
                    // $this->form_validation->set_rules('ProfessionalKeyword', 'Keywords',    'required');
                    
                    $this->form_validation->set_error_delimiters('<div class=" ">', '</div>');
                   // if ($this->form_validation->run() == FALSE)
                    if (0)
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
						
                        if($this->model_professional->update_info($this->input->post()))
                        {
                           $_SESSION['succ_msg'] = "Information updated successfully !";
   
                            redirect(site_url('professional/edit_profile'));
                        }
                    }
                }
                if($formName=='contact'){
                    $this->form_validation->set_rules('paypal_email', 'Paypal Email',    'required');
                    $this->form_validation->set_rules('linkedin_url', 'LinkedIn URL',      'required');
                    
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    if ($this->form_validation->run() == FALSE)
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
                        if($this->model_professional->update_info($this->input->post()))
                        {
                           $_SESSION['succ_msg'] = "Information updated successfully !";
   
                            redirect(site_url('professional/edit_profile'));
                        }
                    }
                }
                if($formName=='prof_img_up'){
                  
                    $this->form_validation->set_rules('ProfessionalImage', 'Select image',    'required');                                    
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    if ( 0 )
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
                      
                    if($_FILES['ProfessionalImage']['name']!=''){
					$field = 'ProfessionalImage';
					$cut_pdf = explode(".",$_FILES['ProfessionalImage']['name']);
					$file_name = explode(" ",$cut_pdf[0]);
					$array_count = count($file_name);
					if($array_count>0){
					for($i=0;$i<$array_count;$i++){
						$file_name_pdf = implode("_",$file_name);
						}
					}else{
						$file_name_pdf = $cut_pdf;
					}
					
					$randdom_no = rand('0000','9999');
					$config['file_name'] = $file_name_pdf.$randdom_no;
					$config['upload_path'] = file_upload_absolute_path().'userimages/';
					$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
					$config['max_size']	= '999999999999';
					
					$isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config);
                     if($isUploaded)
                      {
                   		 $ProfessionalImage = $uploadFileData[$field];                        
					 }
				}else{
				 $ProfessionalImage = '';
				}
				if($this->model_professional->update_info(array("ProfessionalImage"=>$ProfessionalImage)))
                        {
                       	 $_SESSION['succ_msg'] = "Information updated successfully !"; 
   
                            redirect(site_url('professional/edit_profile'));
                        }
                    }
                }
				if($formName=='company_logo_up'){
                  
                    $this->form_validation->set_rules('company_logo', 'Select image',    'required');                                    
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    if ( 0 )
                    {   
                            $this->edit_profile();
                    }
                    else
                    {
                      
                    if($_FILES['company_logo']['name']!=''){
					$field = 'company_logo';
					$cut_pdf = explode(".",$_FILES['company_logo']['name']);
					$file_name = explode(" ",$cut_pdf[0]);
					$array_count = count($file_name);
					if($array_count>0){
					for($i=0;$i<$array_count;$i++){
						$file_name_pdf = implode("_",$file_name);
						}
					}else{
						$file_name_pdf = $cut_pdf;
					}
					
					$randdom_no = rand('0000','9999');
					$config['file_name'] = $file_name_pdf.$randdom_no;
					$config['upload_path'] = file_upload_absolute_path().'userimages/';
					$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
					$config['max_size']	= '999999999999';
					
					$isUploaded = $this->model_upload->fileUpload($uploadFileData,$field,$config);
                     if($isUploaded)
                      {
                   		 $ProfessionalImage = $uploadFileData[$field];                        
					 }
				}else{
				 $ProfessionalImage = '';
				}
				if($this->model_professional->update_info(array("company_logo"=>$ProfessionalImage)))
                        {
                       	 $_SESSION['succ_msg'] = "Information updated successfully !"; 
   
                            redirect(site_url('professional/edit_profile'));
                        }
                    }
                }
                
    }
	public function view_profile(){
        
        $professional_id = $this->input->get('professional_id');
        
        if(!$professional_id){
            $professional_id = $_SESSION[USER_SESSION_ID];  
        }
        
        
		$this->middle_data['prof_data']			 = $this->model_professional->get_professional_data($professional_id);
		$this->middle_data['country_data']		 = $this->model_location->get_country_data($this->middle_data['prof_data']['ProfessionalCountry']);
        $this->middle_data['state_data'] 		 = $this->model_location->get_state_data($this->middle_data['prof_data']['ProfessionalState']);
        $this->middle_data['state_data1']        = $this->model_project->getAllState();   
        $this->middle_data['country_data1']      = $this->model_project->getAllCountry();
		$professional_skill_deatails = $this->model_professional->get_professional_skills_set($professional_id);
		$skills_string = '';
		
		for($i=0;$i<count($professional_skill_deatails);$i++){
			$skills[] = $this->model_professional->get_professional_skills_details($professional_skill_deatails[$i]['skill_id']);
			if(array_key_exists('skill_name',$skills[$i]))
			$skills_string .= $skills[$i]['skill_name'].",";
		}
		$this->middle_data['professional_skills'] = substr($skills_string,0,-1);

			$this->load->view('common/head',		 	$this->header_data);
			
			$professional_id = $this->input->get('professional_id');
			if(!$professional_id){ 
				$this->load->view('common/header',			$this->header_data);
			}
			$this->load->view('professional/view_profile', $this->middle_data);
			if(!$professional_id){ 
				$this->load->view('common/footer',		 	$this->footer_data);
			}
			$this->load->view('common/foot',		 	$this->footer_data);
		
		
       /* $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/view_profile', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
		
        $this->template->render();
		*/
		}
	public function invoice(){
		 $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
        $project_id = $this->input->get('projectid');
        	$prof_data = $this->middle_data['prof_data'];
        $this->middle_data['country_data'] = $this->model_location->get_country_data($this->middle_data['prof_data']['ProfessionalCountry']);
        $this->middle_data['state_data'] = $this->model_location->get_state_data($this->middle_data['prof_data']['ProfessionalState']);
		
		
				
		$this->middle_data['awarded_projects'] = $this->model_professional->getMyAwardedProjects($_SESSION[USER_SESSION_ID])->result_array();
		
        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/send_invoice', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
	}
	public function review(){
	 $professional_id = $this->input->get('professional_id');
        
        if(!$professional_id){
            $professional_id = $_SESSION[USER_SESSION_ID];  
        }
	$review_details = $this->model_professional->get_review($professional_id);
	$this->middle_data['review_details'] = $review_details;
	$temp_review = 0;
		for($i=0;$i<count($review_details);$i++){
		
		$temp_review += $review_details[$i]['rating'];
		
		}
	if(count($review_details)>0)
	$this->middle_data['average_review'] = $temp_review/count($review_details);
	
			$this->load->view('common/head',		 	$this->header_data);
			
			$professional_id = $this->input->get('professional_id');
			if(!$professional_id){ 
				$this->load->view('common/header',			$this->header_data);
			}
			$this->load->view('professional/review', $this->middle_data);
			if(!$professional_id){ 
				$this->load->view('common/footer',		 	$this->footer_data);
			}
			$this->load->view('common/foot',		 	$this->footer_data);
	
	}
	function showinvoice(){
        $this->middle_data['invs_details'] = $this->model_professional->get_inv_details($this->input->get('invsid'));
		$this->load->view('professional/show_invoice', $this->middle_data); 
	  
    }
    
    
    public function popUpEmail(){
        //echo $professional_id = $_SESSION[USER_SESSION_ID];
        //echo '<pre>';print_r($_POST);
        //$this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/popup_referal', $this->middle_data);
       // $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    } 
	public function updateLookingstatus(){     //ajax call
	
        if($this->model_professional->update_lookng(array("s_professional_looking_status_id"=>$this->uri->segment(3, 0))))
		echo true;
		exit;
    }

}

/* End of file professional.php */
/* Location: ./application_front/controllers/professional.php */