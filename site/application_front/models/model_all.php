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
    
    
}