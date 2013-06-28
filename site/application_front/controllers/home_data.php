<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_data extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
		$this->load->model('model_home');
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'home';
		$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
			$this->footer_data['video'] 		= $this->model_home->get_foot_video();
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
	}
	
	
	
	public function home()
	{
		$this->middle_data['testimonial']	= $this->model_testimonial->get_testimonial();
		
		$this->template->write_view('header', 'common/header',$this->header_data);
		$this->template->write_view('content', 'testimonial/testimonial',$this->middle_data); 
		$this->template->write_view('footer', 'common/footer',$this->footer_data);
		$this->template->render();
	}
	
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */