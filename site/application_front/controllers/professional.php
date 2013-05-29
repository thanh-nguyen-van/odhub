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
        $this->middle_data['nr_awarded_projects'] = $this->middle_data['awarded_projects']->num_rows();
        $this->middle_data['referal_professional'] = $referal_professional;
        $this->middle_data['my_referal'] = $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);
        $this->model_professional->getMyReferals($_SESSION[USER_SESSION_ID]);;
        $this->middle_data['nr_my_referal'] = $this->middle_data['my_referal']->num_rows();




        $this->template->write_view('header', 'common/header', $this->header_data);
        $this->template->write_view('content', 'professional/professional_home', $this->middle_data);
        $this->template->write_view('footer', 'common/footer', $this->footer_data);
        $this->template->render();
    }
    public function refer_user()
    {
       $referal_user_id=$_REQUEST['referal_user_id'];
       $project_id=$_REQUEST['project_id'];
       $proposal_id=$_REQUEST['proposal_id'];
       echo "asdasd";
       $qry = "insert into project_aword_map set project_id='".$project_id."', proffetional_id='".$referal_user_id."',proposal_id='".$proposal_id."' ";
       if($this->db->insert($qry))
       {
           echo '1';
       }
    }

}

/* End of file professional.php */
/* Location: ./application_front/controllers/professional.php */