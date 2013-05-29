<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MY_Controller 
{
    public $request_data    = array();
    public $final_qry_str    = 1;
    public $environment = 'sandbox';
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_searchproject');
        $this->load->model('model_project');
        $this->load->model('model_all');
        $this->load->model('model_proposal');
        
        $this->initData();
        
        //$this->load->model('model_searchcustom');        
    }
    
    public function initData()
    {
        $this->middle_data['controller'] = 'project';
    }
    
    
    
    public function PPHttpPost($methodName_, $nvpStr_)
    {
     $environment = $this->environment;

     // Set up your API credentials, PayPal end point, and API version.
     // How to obtain API credentials:
     // https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_NVPAPIBasics#id084E30I30RO
     $API_UserName = urlencode('santanu.arc3_api1.gmail.com');
     $API_Password = urlencode('1369557732');
     $API_Signature = urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31ALJvGrWTVNxCf0WNkNe0DilvvIh0');
     $API_Endpoint = "https://api-3t.paypal.com/nvp";
     if("sandbox" === $environment || "beta-sandbox" === $environment)
     {
      $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
     }
     $version = urlencode('51.0');

     // Set the curl parameters.
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
     curl_setopt($ch, CURLOPT_VERBOSE, 1);

     // Turn off the server and peer verification (TrustManager Concept).
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, 1);

     // Set the API operation, version, and API signature in the request.
     $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

     // Set the request as a POST FIELD for curl.
     curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

     // Get response from the server.
     $httpResponse = curl_exec($ch);

     if( !$httpResponse)
     {
      exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) .')');
     }

     // Extract the response details.
     $httpResponseAr = explode("&", $httpResponse);

     $httpParsedResponseAr = array();
     foreach ($httpResponseAr as $i => $value)
     {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1)
      {
       $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
     }

     if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr))
     {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
     }

     return $httpParsedResponseAr;
    }
    
   
   public function relese_process($arr_professional,$price=0){
       
       
       
       $search_str = implode(',',$arr_professional);
       $professional_paypal = $this->model_proposal->getProfessional_paypalId($search_str);
       
        $vEmailSubject = 'PayPal payment';
      
        
       if(count($professional_paypal)>1){
          $receivers = array(
              0 => array(
                'receiverEmail' => $professional_paypal[0]->paypal_email, 
                'amount' => $price*(20/100),
                'uniqueID' => "id_001", // 13 chars max
                'note' => " payment of commissions"), // I recommend use of space at beginning of string.
              1 => array(
                'receiverEmail' => $professional_paypal[1]->paypal_email,
                'amount' => $price*(80/100),
                'uniqueID' => "A47-92w", // 13 chars max, available in 'My Account/Overview/Transaction details' when the transaction is made 
                'note' => " payoff of what I owed you"  // space again at beginning.
              )
            ); 
       }
       else{
              $receivers = array(
              0 => array(
                'receiverEmail' => $professional_paypal[0]->paypal_email, 
                'amount' => $price,
                'uniqueID' => "id_001", // 13 chars max
                'note' => " payment of commissions")
            );
           
       }
       
      
      
      
       $emailSubject = urlencode($vEmailSubject);
$receiverType = urlencode('EmailAddress');
$currency = urlencode('USD'); // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Receivers
// Use '0' for a single receiver. In order to add new ones: (0, 1, 2, 3...)
// Here you can modify to obtain array data from database.

$receiversLenght = count($receivers);

// Add request-specific fields to the request string.
$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";

$receiversArray = array();

for($i = 0; $i < $receiversLenght; $i++)
{
 $receiversArray[$i] = $receivers[$i];
}

foreach($receiversArray as $i => $receiverData)
{
 $receiverEmail = urlencode($receiverData['receiverEmail']);
 $amount = urlencode($receiverData['amount']);
 $uniqueID = urlencode($receiverData['uniqueID']);
 $note = urlencode($receiverData['note']);
 $nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}

// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = $this->PPHttpPost('MassPay', $nvpStr);
      
      
      
      
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
{
   return $receivers;         
    
    
}
else
{
 exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
}  
      
      
      
      
      
      
      
      
      
      
      
      
       
       
       
   }
   
   public function test_process($arr_professional,$price=0){
       
       DebugBreak();
           $vEmailSubject = 'PayPal payment';

/** MassPay NVP example.
 *
 *  Pay one or more recipients. 
*/

// For testing environment: use 'sandbox' option. Otherwise, use 'live'.
// Go to www.x.com (PayPal Integration center) for more information.
$environment = 'sandbox'; // or 'beta-sandbox' or 'live'.



$emailSubject = urlencode($vEmailSubject);
$receiverType = urlencode('EmailAddress');
$currency = urlencode('USD'); // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

// Receivers
// Use '0' for a single receiver. In order to add new ones: (0, 1, 2, 3...)
// Here you can modify to obtain array data from database.
$receivers = array(
  0 => array(
    'receiverEmail' => "santanu.arc1@gmail.com", 
    'amount' => "1.00",
    'uniqueID' => "id_001", // 13 chars max
    'note' => " payment of commissions"), // I recommend use of space at beginning of string.
  1 => array(
    'receiverEmail' => "santanu.cs5@gmail.com",
    'amount' => "2.38",
    'uniqueID' => "A47-92w", // 13 chars max, available in 'My Account/Overview/Transaction details' when the transaction is made 
    'note' => " payoff of what I owed you"  // space again at beginning.
  )
);
$receiversLenght = count($receivers);

// Add request-specific fields to the request string.
$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";

$receiversArray = array();

for($i = 0; $i < $receiversLenght; $i++)
{
 $receiversArray[$i] = $receivers[$i];
}

foreach($receiversArray as $i => $receiverData)
{
 $receiverEmail = urlencode($receiverData['receiverEmail']);
 $amount = urlencode($receiverData['amount']);
 $uniqueID = urlencode($receiverData['uniqueID']);
 $note = urlencode($receiverData['note']);
 $nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
}

// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = $this->PPHttpPost('MassPay', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
{
 exit('MassPay Completed Successfully: ' . print_r($httpParsedResponseAr, true));
}
else
{
 exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
}
       
       
   }
   
    
    
    public function release(){
    // print_r($_REQUEST);
    // die;
       $projectId = $this->input->get('projectid');
       $invoice_code = $this->input->get('invoice_code');
       
       $professional_details = $this->model_proposal->getProfessionalInfo($projectId);
       
       $arr_professional = array();
       $price = 0;
       //DebugBreak();
       foreach($professional_details as $details){
           $professional_id = $details->proffetional_id;
           array_push($arr_professional,$professional_id);
           $price = $details->price;
       }
       
       
       
       $receivers = $this->relese_process($arr_professional,$price);
      
     //  DebugBreak();
      $this->model_all->relese_payment($receivers,$projectId,$invoice_code);
       
       redirect('client/show_home', 'refresh');   
       
      // $this->test_process();
       
       
       
       //$this->model_proposal->add_proposal($data_arr); 
       
       //redirect('project/details/?projectid='.$this->request_data['project_id'], 'refresh');
    }
    
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */