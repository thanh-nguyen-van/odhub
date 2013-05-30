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
        
        $this->initData();
    }

    private function initData() {
        $this->middle_data['controller'] = 'professional';
        //$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
        //$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
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
        $awardedProjectId = $awardedProjectArray['project_id'];
        $checkReferal = $this->model_professional->checkIfReferred($awardedProjectId);
       
	   $this->middle_data['nr_awarded_projects'] = $this->middle_data['awarded_projects']->num_rows();
        $this->middle_data['referal_professional'] = $referal_professional;
        $this->middle_data['my_referal'] = $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);;
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();
        
        $referal_details = $this->model_all->getreferal_details($_SESSION[USER_SESSION_ID]);
        $this->middle_data['referal_payment'] = $referal_details;
        




        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/professional_home', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }
    public function refer_user($referal_user_id,$project_id,$proposal_id)
    {
        // ------- Fetch Awarded project details --------//
        $this->db->select('*');
        $this->db->from('project_aword_map');
        $this->db->where('project_id',$project_id);
        $this->db->where('proposal_id',$proposal_id);
        $exist_data_qry = $this->db->get();
        $exist_data_array = $exist_data_qry->row_array();
        // ------- Fetch Awarded project details --------//
        // ------------check to see if already referred ----//
        $this->db->select('*');
        $this->db->from('project_aword_map');
        $this->db->where('project_id',$project_id);
        $this->db->where('proffetional_id',$referal_user_id);
        $this->db->where('proposal_id',$proposal_id);
        $already_exist_data_qry = $this->db->get();
        //$already_exist_data_array = $already_exist_data_qry->num_rows();
        $nr_exist = $already_exist_data_qry->num_rows();
        // ------------check to see if already referred ----//
        
        if($nr_exist==0){
            //-----Insert into award table for reference professional ------//
       $data_arr = array(
           "project_id"=>$project_id, 
           "proffetional_id"=>$referal_user_id,
           "proposal_id"=>$proposal_id,
           "aword_date"=>$exist_data_array['aword_date'],
           "payment_date"=>$exist_data_array['payment_date'],        
           "price"=>$exist_data_array['price'],        
           "ipn_track_id"=>$exist_data_array['ipn_track_id'],        
           "delivery_date"=>$exist_data_array['delivery_date'],        
           "comment"=>$exist_data_array['comment'],        
               );
       if($this->db->insert('project_aword_map',$data_arr))
       {
           echo '1';
        }
        //-----Insert into award table for reference professional ------// 
       }else{
           // --- If already referred///
            echo '2';
             // --- If already referred///
        }
    }
	public function send_invoice(){
	// print_r($_REQUEST);
	// die;
        $this->middle_data['prof_data'] = $this->model_professional->get_professional_data($_SESSION[USER_SESSION_ID]);
		$project_id = $this->input->get('projectid');
		$this->middle_data['project_details']=$this->model_professional->get_project_data($project_id,$_SESSION[USER_SESSION_ID]);
		
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
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);;
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();
		
		//insert into database
		if($this->input->post('send_and_insert')=="send_and_insert"){
		$request_data = $this->input->post();
		$this->model_professional->SaveInvoiceData($request_data);		
		}
        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/send_invoice.php', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
   
	}
        public function checkIfReferred($project_id)
        {
           return $checkStatusReferer = $this->model_professional->checkIfReferred($project_id);
            
        }

}

/* End of file professional.php */
/* Location: ./application_front/controllers/professional.php */