<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Static_content extends MY_Controller
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
		$this->middle_data['controller']	= 'static_content';
		$this->header_data['content_menu']	= $this->model_content->get_menu("StaticPageType <> 'left_menu'");
			$this->footer_data['video'] 		= $this->model_home->get_foot_video();
	}
        
	public function index()
	{
		$this->leftmenu_data['left_menu']	= $this->model_content->get_left_menu("StaticPageType = 'left_menu'");
		
		$page_id = $this->uri->segment(3,0);
		$this->leftmenu_data['page_id']		= $page_id;
		$this->middle_data['menu_content']	= $this->model_content->get_menu_content($page_id);
		
		$this->template->write_view('header',	 'common/header',$this->header_data);
		$this->template->write_view('leftmenu',  'common/left_menu',$this->leftmenu_data); 
		$this->template->write_view('content',	 'static/index',$this->middle_data);
		$this->template->write_view('footer',	 'common/footer',$this->footer_data);
		$this->template->render();
	}
	
	public function how_it_works()
	{
		$this->template->write_view('header',	 'common/header',$this->header_data);
		$this->template->write_view('leftmenu',  'common/left_menu',$this->leftmenu_data); 
		$this->template->write_view('content',	 'static/how-it-works',$this->middle_data); 
		$this->template->write_view('footer',	 'common/footer',$this->footer_data);
		$this->template->render();
	}
	public function learnmore()
	{
		$this->load->helper('url');
	
		$this->middle_data['content'] = $this->model_content->get_content($this->uri->segment(3));
		$this->template->write_view('header',	 'common/header',$this->header_data);
		$this->template->write_view('content',	 'static/learn_more',$this->middle_data); 
		$this->template->write_view('footer',	 'common/footer',$this->footer_data);
		$this->template->render();
	}
	
	
}

/* End of file login.php */
/* Location: ./application_front/controllers/login.php */