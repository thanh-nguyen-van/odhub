<?php
class InitHook 
{
	
	var $CI,$isLoggedIn;
	
	function __construct()
	{
		//echo "<br>This is Hook Constructor 1111111";
		$this->CI = NULL;
	}

	/*
	function InitHook()
	{
		//echo "<br>This is Hook Constructor 22222222";
	}
	*/

	function loadCustomCommonFunctions()
	{
		require_once(APPPATH.'third_party/functions'.EXT);
	}
	
	
	function initPreController()
	{
		//echo "<br>initPreController"; 
	}
	
	function initPostController()
	{
		$this->CI =& get_instance();
		$this->setLanguageId();
		//$this->get_max_year();
		$this->setTemplateData();
		$this->authenticateUser();
	}
	
	function setLanguageId()
	{
	   $GLOBALS['LANGUAGE_ID'] = 1;
	}
	//===================================================================================
	
	function get_max_year()
	{
	  $this->CI->load->model('model_winners');
	  $this->CI->header_data['max_winner_year'] = $this->CI->model_winners->get_max_year();
	}
	
	function authenticateUser()
	{
            $class = $this->CI->router->class;
            $method = $this->CI->router->method;
            $controllerMethodArray = array (
                                                'internal_emails'  => array('index','compose_mail'),
                                                'login'=>array('reviewList','my_profile','alertList'),
                                                'post_ride'=>array('view_passengers')
                                            );
		
            $returnMatch	=	$this->matchControllerMethod($controllerMethodArray,$class,$method);
            if($returnMatch)
            {
                if(!$this->isLoggedIn())
                {
                    redirect(base_url().'login/signup/');
                    die();
                }
            }
        }
        
        function matchControllerMethod($allowControllerMethodArr,$class,$method)
	{
		$returnMatch	=	false;
		foreach($allowControllerMethodArr as $key=>$methodArr)
		{
			if($key == $class)
			{
				foreach($methodArr as $methodKey=>$methodValue)
				{
					if($methodValue	==	$method)
					{
						$returnMatch	=	true;
					}
				}
				
			}					
		}
		return $returnMatch;
	}
        
	function setTemplateData()
	{
		if($this->CI)
		{
                     
                    $this->CI->header_data['title']	= 'Welcome to OD-HUB';
                     
                    $this->CI->template->set_template('front');
		}	
	}
        
        function isLoggedIn()
	{
			$USER_SESSION_ID = intval($this->CI->nsession->userdata(USER_SESSION_ID));
			if($USER_SESSION_ID > 0)
				return true;
			else
			 	return false;
	}
}
?>