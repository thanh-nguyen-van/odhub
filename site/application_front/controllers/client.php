<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
		$this->load->model('model_email');
		$this->load->model('model_client');
		$this->load->model('model_location');
		$this->load->model('model_upload');
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
		$this->middle_data['client_data']	= $this->model_client->get_client_data($_SESSION[USER_SESSION_ID]);
		$this->middle_data['country_data']	= $this->model_location->get_country_data($this->middle_data['client_data']['ClientCountry']);
		$this->middle_data['state_data']	= $this->model_location->get_state_data($this->middle_data['client_data']['ClientState']);
		
		$this->template->write_view('header',  'common/header',		 $this->header_data);
		$this->template->write_view('content', 'client/client_home', $this->middle_data);
		$this->template->write_view('footer',  'common/footer',		 $this->footer_data);
		$this->template->render();
	}
}

/* End of file client.php */
/* Location: ./application_front/controllers/client.php */