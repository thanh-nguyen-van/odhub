<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_content');
        $this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'home';
		$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
		//$this->leftmenu_data['left_menu']	= $this->model_content->get_menu("= 'left_menu'");
	}
	
	function index()
	{
		$this->template->write_view('header', 'common/header',$this->header_data);
		$this->template->write_view('content', 'home/index',$this->middle_data); 
		$this->template->write_view('footer', 'common/footer',$this->footer_data);
		$this->template->render();
	}
	
	public function my_404()
	{
		$this->template->write_view('header', 'common/header',$this->header_data);
		$this->template->write_view('content', 'home/my404',$this->middle_data); 
		$this->template->write_view('footer', 'common/footer',$this->footer_data);
		$this->template->render();
	}
	
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */