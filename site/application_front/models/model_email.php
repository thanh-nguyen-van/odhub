<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_email extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function sendEmail($from_mail, $mailto, $subject, $message)
	{
		$header	 = 'MIME-Version: 1.0' . "\r\n";
		$header	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header	.= "From: Od Hub <".$from_mail.">" . "\r\n";
		$header	.= 'X-Mailer: PHP/' . phpversion();
		
		@mail($mailto, $subject, $message, $header);
	}
	
}

/* End of send mail.php */
/* Location: ./application_front/controllers/upload.php */