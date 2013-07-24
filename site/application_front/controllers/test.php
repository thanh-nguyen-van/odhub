<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MY_Controller 
{
	$content = new model_content;
	$content->get_menu("StaticPageType <> 'left_menu'");

        
	
}

/* End of file login.php */
/* Location: ./application_front/controllers/login.php */
