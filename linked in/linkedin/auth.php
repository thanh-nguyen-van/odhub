<?php
    session_start();

    $config['base_url']             =   'http://iammanish.biz/linkedin/auth.php';
    $config['callback_url']         =   'http://iammanish.biz/linkedin/demo.php';
    $config['linkedin_access']      =   '3uvckevf4enn';
    $config['linkedin_secret']      =   'IXEisPmT0mzWeb05';

    include_once "linkedin.php";

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

	
	
	
	?>
