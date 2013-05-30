<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');          

class Model_all extends CI_Model
{
    public $request_data = "";
    public function project_search_rq($request_data){
        
       // DebugBreak();
       
       $this->request_data = $request_data;        
            
        if($this->request_data != NULL){       
           $arr_cond_arr = array();
           
           if($this->request_data['location']!='all'){
                $cond_str = "`pd`.`state`='".$this->request_data['location']."'";
                array_push($arr_cond_arr,$cond_str);
            }
           
            if(isset($this->request_data['pr_cat_name'])){
               //$tmp_str = implode(',',$this->request_data['pr_cat_name']);
               $cond_str = "`pd`.`project_category` = ".$this->request_data['pr_cat_name'];
               array_push($arr_cond_arr,$cond_str);
            }
            
            
            if(isset($this->request_data['mydate'])){
                $mydate = $this->request_data['mydate'];
                if($mydate!=""){
                $mydate_arr = explode('/',$mydate);
                $mydate_str = $mydate_arr[2].$mydate_arr[1].$mydate_arr[0];
                $cond_str = "date_format(`post_date`,'%Y%m%d') >= '".$mydate_str."'";
                array_push($arr_cond_arr,$cond_str);
                }
                
            }
            
            if(isset($this->request_data['projecttype'])){
               $tmp_str = implode(',',$this->request_data['projecttype']);
               $cond_str = "`pd`.`project_type_id` in(".$tmp_str.")";
               array_push($arr_cond_arr,$cond_str);
            }
            
            if(isset($this->request_data['pricing_type'])){
                
                $tmp_arr = array();
                
                if(in_array("Hourly",$this->request_data['pricing_type'])){
                    
                    //$cond_str = "`pd`.`start_price` between ".$this->request_data['hourly_rate_start']." and ".$this->request_data['hourly_rate_end'];
                    $cond_str = "`pd`.`job_type` = 'Hourly' and `pd`.`start_price` between ".$this->request_data['hourly_rate_start']." and ".$this->request_data['hourly_rate_end'];
                    array_push($tmp_arr,$cond_str);
                    
                }
                
                if(in_array("Fixed Price Job",$this->request_data['pricing_type'])){
                    $cond_str = "`pd`.`job_type` = 'Fixed Price Job' and `pd`.`start_price` between ".$this->request_data['min_contract']." and ".$this->request_data['max_contract'];
                    array_push($tmp_arr,$cond_str);
                }     
               
               $tmp_str = implode(' or ',$tmp_arr);
               $cond_str = "(".$tmp_str.")";
               
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
         
         
      return $final_qry_str;
           
    } 
    
    
    public function relese_payment($receivers,$projectId,$invoice_code){
        
         $sql_get_aword_details = "select * from `project_aword_map` where `project_id`='".$projectId."'";
         $result = $this->db->query($sql_get_aword_details);
        
         $data_result = $result->result();  
         
         
         $sql_get_client_id = "select `post_by` from `project_details` where `project_id`='".$projectId."'";
         $client_result = $this->db->query($sql_get_client_id);
         $client_info = $client_result->result();
         
         $client_id = $client_info[0]->post_by;
         
         $from_acount = 'santanu.arc3_api1.gmail.com';
         
         
         
         $i=0;
         foreach($data_result as $result){
             $professional_id = $result->proffetional_id;
             $project_cost = $result->price;
             $amount = $receivers[$i]['amount'];
             $to_acount = $receivers[$i]['receiverEmail'];
                          
             $sql_insert_payrelese_history = "insert into `payrelese_history` set `project_id`='".$projectId."',`client_id`='".$client_id."',`professional_id`='".$professional_id."',`amount`='".$amount."',`project_cost`='".$project_cost."',`from_acount`='".$from_acount."',`to_acount`='".$to_acount."',`date`='". date('Y-m-d H:i:s')."',`invoice_code`='".$invoice_code."'";
             $this->db->query($sql_insert_payrelese_history);
              $i = $i + 1;
         }
         
        
        
        
        
        
    }
        
    
    public function getreferal_details($professional_id = 0){
        $sql_referal_details = "select `p_h`.`client_id`,`p_h`.`amount`,`p_h`.`project_cost`,`p_h`.`date`,concat(`lct`.`ClientFirstname`,' ',`lct`.`Clientlastname`) `client_name` from
        `payrelese_history` `p_h` left join `lm_clientdetail_tbl` `lct`
        on  `p_h`.`client_id` = `lct`.`ClientId`
        where
        `p_h`.`amount`!=`p_h`.`project_cost` and `p_h`.`professional_id` = '".$professional_id."'";
        
        $referal_result = $this->db->query($sql_referal_details);
        $result = $referal_result->result();
        
        return $result;
        
        
    }
    
    
    public function getCategoryName($category_id){
       
       $sql_category_name = "select * from `project_category` where `pr_cat_id`='".$category_id."'"; 
       $category_result = $this->db->query($sql_category_name);
       $category_info = $category_result->result(); 
       return $category_info;
    }
   
    public function getStateName($state_id){
       
       $sql_state_name = "select * from `lm_state_tbl` where `StateId`='".$state_id."'"; 
       $state_result = $this->db->query($sql_state_name);
       $state_info = $state_result->result(); 
       return $state_info;
    }
    
}