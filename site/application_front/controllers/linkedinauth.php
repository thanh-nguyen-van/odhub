<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linkedinauth extends MY_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->initData();
	}
	
	private function initData()
	{
		$this->middle_data['controller']	= 'linkedinauth';
	}
	public function index(){
	$this->load->library('linkedin');
	$config['base_url']             =   'http://iammanish.biz/linkedin/auth.php';
    $config['callback_url']         =   'http://iammanish.biz/linkedin/demo.php';
    $config['linkedin_access']      =   '3uvckevf4enn';
    $config['linkedin_secret']      =   'IXEisPmT0mzWeb05';

  //  include_once "linkedin.php";

    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

    # Now we retrieve a request token. It will be set as $linkedin->request_token
    $linkedin->getRequestToken();
    $_SESSION['requestToken'] = serialize($linkedin->request_token);
  
    # With a request token in hand, we can generate an authorization URL, which we'll direct the user to
    //echo "Authorization URL: " . $linkedin->generateAuthorizeUrl() . "\n\n";
    header("Location: " . $linkedin->generateAuthorizeUrl());

	// Application Details

    // Company:

    // ARC Infotech
    // Application Name:

    // test
    // API Key:

    // 3uvckevf4enn
    // Secret Key:

    // IXEisPmT0mzWeb05
    // OAuth User Token:

    // d6d16f44-f323-4f2d-ba8e-4b4978b8fba5
    // OAuth User Secret:

    // 4141a3a6-d8a3-45ff-9584-afdef744cf5b
	}
	public function getUser(){
	$this->load->library('linkedin');
	$config['base_url']             =   'http://iammanish.biz/linkedin/auth.php';
    $config['callback_url']         =   'http://iammanish.biz/linkedin/demo.php';
    $config['linkedin_access']      =   '3uvckevf4enn';
    $config['linkedin_secret']      =   'IXEisPmT0mzWeb05';

   
   
    
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];

        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);

        $_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->access_token     =   unserialize($_SESSION['oauth_access_token']);
   }


    # You now have a $linkedin->access_token and can make calls on behalf of the current member
    $xml_response = $linkedin->getProfile("~:(id,first-name,last-name,headline,picture-url,email-address)");
	
	
	
	//people-search:(people:(id,first-name,last-name,headline,picture-url,industry,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,type,size,industry,ticker)),educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes)),num-results)?first-name=parameter&last-name=parameter



    echo '<pre>';
    echo 'My Profile Info';
    echo $xml_response;
    echo '<br />';
    echo '</pre>';


    // $search_response = $linkedin->search("?company-name=ARC Infotech&count=10");
    //$search_response = $linkedin->search("?title=software&count=10");

   // echo $search_response;
    // $xml = simplexml_load_string($search_response);

    // echo '<pre>';
    // echo 'Look people who worked in facebook';
    // print_r($xml);
    // echo '</pre>';
	}
        
	
}

/* End of file login.php */
/* Location: ./application_front/controllers/login.php */
