<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller 
{
	public $request_data = array();
    public $final_qry_str = 1;
	function __construct()
	{
		parent::__construct();
        $this->load->model('model_professional');
        $this->load->model('model_searchcustom');
		$this->load->model('model_home');
		$this->load->model('model_message');
	   $this->initData();
	}
	
    public function initData(){
       // DebugBreak();
      
       if(isset($_SESSION['user_session_type'])){
            if($_SESSION['user_session_type'] != 'Client'){
                 redirect('/login/signin/', 'refresh');
            }  
        }
        else{
            redirect('/login/signin/', 'refresh');
        } 
          	$this->footer_data['video'] 		= $this->model_home->get_foot_video();
        
    }

	function index()
	{     
        
        
        
             
         $this->request_data = $this->input->post();
        
        $this->load->view('common/head',$this->header_data);
        $this->load->view('common/header',$this->header_data);
        $this->load->view('search/index');
        $this->load->view('common/footer',$this->footer_data);
        $this->load->view('common/foot',$this->footer_data);
        
		
	}  
     
    function index_left(){ 
    
        $this->request_data = $this->input->post();
		$looking_for = $this->input->post('looking_for');
         
        


        
        if($this->request_data != NULL){
            $arr_cond_arr = array();
            
            
            if($this->request_data['state']!='all'){
                $cond_str = "`lpt`.`ProfessionalState`='".$this->request_data['state']."'";
                array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['type'])){
               $tmp_str = implode(',',$this->request_data['type']);
               $cond_str = "`lpt`.`s_professional_type_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['coaching_focus'])){
               $tmp_str = implode(',',$this->request_data['coaching_focus']);
               $cond_str = "`lpt`.`s_professional_coaching_focus_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);                 
            }
            if(isset($this->request_data['coaching_style'])){
               $tmp_str = implode(',',$this->request_data['coaching_style']);
               $cond_str = "`lpt`.`s_professional_coaching_style_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            if(isset($this->request_data['hourly_rate'])){
                $h_rate_arr = array();
                foreach($this->request_data['hourly_rate'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`ProfessionalCharges` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`ProfessionalCharges` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
                
            }
            if(isset($this->request_data['contract_val'])){
                  unset($h_rate_arr);
                  $h_rate_arr = array();
                foreach($this->request_data['contract_val'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`s_professional_contract_charge` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`s_professional_contract_charge` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
            }
            if(isset($this->request_data['looking_for'])){
               $tmp_str = $this->request_data['looking_for'];
               $cond_str = "`lpt`.`s_professional_looking_status_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            
            $final_qry_str = '('.implode(') and (',$arr_cond_arr).')';
        }
        
        
        
       if(!isset($final_qry_str)){
           $final_qry_str = 1; 
         } 
         
         if(isset($final_qry_str)){
            if($final_qry_str == "()"){
            $final_qry_str = 1;
           }
       
         }    
        
        $this->final_qry_str = $final_qry_str;
        
       // echo $final_qry_str;
        // DebugBreak();
   
        $data['state_details'] = $this->model_searchcustom->getFilterState($final_qry_str);
        $data['lookingfor_details'] = $this->model_searchcustom->getFilterLookingfor($final_qry_str);
		$data['type_details'] = $this->model_searchcustom->getFiltertype($final_qry_str);
		
		$data['coatchfocus_details'] = $this->model_searchcustom->getFiltercoatchfocus($final_qry_str);
        $data['coatchstyle_details'] = $this->model_searchcustom->getFiltercoatchstyle($final_qry_str);
		
        $data['hourlyrate_details'] = $this->model_searchcustom->getFilterhourlyrate($final_qry_str);
        $data['contractval_details'] = $this->model_searchcustom->getFiltercontractval($final_qry_str);
        
        
        
        
     
        $this->load->view('search/search_left',$data);  
    } 
    
    function sendmessage(){
        
        
        
       $get_arr = $this->input->get(); 
       $post_data = $this->input->post();
	   
       
       if(isset($post_data['send_message'])){
	   
	   //id, sender_id, reciever_id, sender_type, date, status, reciever, subject, message
	   $message_details = array('subject' => $post_data['subject'],
								'message' => $post_data['content'],		   
								'reciever_id' => $post_data['proffessional_id'],
								'reciever_type' => 'professional',
								'sender_id' => $_SESSION['user_session_id'],
								'sender_type' => 'client',
								'date' => date("Y-m-d H:i:s")
							);
			
			
			
			
			$to  = $post_data['to'];
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //Additional headers
            $headers .= 'To: '.$to . "\r\n";
            $headers .= 'From: OdHub <odhub@odhub.com>' . "\r\n";
            $subject = "New Message From Client";
			$content = "Sir,<br/> You have a new message from client .Please login to OD Hub to view message.";

           // Mail it
           @mail($to, $subject, $content, $headers); 
           if($this->model_message->SavemessageDetails($message_details)) 
            $data['mail_send'] = '1';
           
       }
       
       
       $professional_id = $get_arr['ProfessionalId'];
        
       $professional_details = $this->model_professional->get_professional_data($professional_id);
       
       $data['professional_details'] = $professional_details;
       
        $this->load->view('search/send_message_prof',$data); 
    }
    
	

	
	
    
    function search_result(){  
        
        
        
        $this->request_data = $this->input->post();
         $pagination_value = $this->request_data['pagination'];   
         
         //DebugBreak();
        

        
        if($this->request_data != NULL){
            $arr_cond_arr = array();
            
            
            if($this->request_data['state']!='all'){
                $cond_str = "`lpt`.`ProfessionalState`='".$this->request_data['state']."'";
                array_push($arr_cond_arr,$cond_str);
            }
            
            if(isset($this->request_data['type'])){
               $tmp_str = implode(',',$this->request_data['type']);
               $cond_str = "`lpt`.`s_professional_type_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);
            }
            if(isset($this->request_data['coaching_focus'])){
               $tmp_str = implode(',',$this->request_data['coaching_focus']);
               $cond_str = "`lpt`.`s_professional_coaching_focus_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);                 
            }
            if(isset($this->request_data['coaching_style'])){
               $tmp_str = implode(',',$this->request_data['coaching_style']);
               $cond_str = "`lpt`.`s_professional_coaching_style_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            if(isset($this->request_data['hourly_rate'])){
                $h_rate_arr = array();
                foreach($this->request_data['hourly_rate'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`ProfessionalCharges` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`ProfessionalCharges` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
                
            }
            if(isset($this->request_data['contract_val'])){
                  unset($h_rate_arr);
                  $h_rate_arr = array();
                foreach($this->request_data['contract_val'] as $h_rate_range){
                    if(strpos($h_rate_range,'+')>0){
                        $h_rate_range = str_replace('+','',$h_rate_range);
                        $h_rate_str = $h_rate_range;
                        $tmp_str = '`lpt`.`s_professional_contract_charge` > '.$h_rate_str;
                    }
                    else{
                    $h_rate_str = str_replace('-',' and ',$h_rate_range);
                    $tmp_str = '`lpt`.`s_professional_contract_charge` between '.$h_rate_str;
                    } 
                   
                   array_push($h_rate_arr,$tmp_str); 
                                        
                }
                
                $tmp_str = implode(') or (',$h_rate_arr);
                $cond_str = '('.$tmp_str.')';    
                array_push($arr_cond_arr,$cond_str);
                
            }
            if(isset($this->request_data['looking_for'])){
               $tmp_str = $this->request_data['looking_for'];
               $cond_str = "`lpt`.`s_professional_looking_status_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str); 
            }
            
            $final_qry_str = '('.implode(') and (',$arr_cond_arr).')';
        }
        
        
         if(!isset($final_qry_str)){  
             $final_qry_str = 1;  
         } 
         
         if(isset($final_qry_str)){
             if($final_qry_str == "()"){
             $final_qry_str = 1;
             } 
         }    
         
 
        $this->final_qry_str = $final_qry_str;
        
        
        
        
        
        
        $data_result = $this->model_professional->getAllProfessional($this->final_qry_str,$pagination_value);
        $data['data_result'] = $data_result;
        $data['number_of_project'] = $this->model_professional->num_record;
        $data['present_selection'] = $pagination_value;
        
        //print_r($data); die;
        $this->load->view('search/search_result',$data);  
    } 
    
    function set_favorite(){
          
        $post_data = $this->input->post();       
        $client_id = $_SESSION['user_session_id'];
        $professional_id = $post_data['professional_id'];
        
        
        $result = $this->model_searchcustom->configure_fav($client_id,$professional_id);
        
        echo $result;
                      
    }
   
    function check_fab($professional_id = 0){
         $client_id = $_SESSION['user_session_id'];
        
         $status = $this->model_searchcustom->fab_check($client_id,$professional_id);
        
         return $status;
        
        
        
        
    }
               
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */