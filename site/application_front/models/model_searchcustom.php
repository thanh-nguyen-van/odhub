<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_searchcustom extends CI_Model
{
	public $table_name = "";
    
	function __construct()
	{
		parent::__construct();
        $this->table_name = "lm_professionaldetail_tbl";	
	}
	public function getFilterState($final_qry_str=1){
	$final_qry_str = 1;
        $sql_getCountry = "select * from `".$this->table_name."` `lpt` where ".$final_qry_str." group by `ProfessionalCountry` ";
        
        $sql_getCountry = "select `lpt`.`ProfessionalState`,`lst`.`StateName` `StateName` from `".$this->table_name."` `lpt` left join `lm_state_tbl` `lst` on `lpt`.`ProfessionalState` = `lst`.`StateId` where `lpt`.`ProfessionalState` !='' group by `lpt`.`ProfessionalState`";
        
        
        $result = $this->db->query($sql_getCountry);
          
        $data_result = $result->result();  
        
        return $data_result;
    }
    
    public function getFilterLookingfor($final_qry_str = 1){
        $final_qry_str = 1;
        $table_ref_name = 's_professional_looking_status';
        
      
				
		//Query change By manish		
         $sql_filterlookingfor = "select `lpt`.`s_professional_looking_status_id`,
                `spls`.`s_professional_looking_status_val` 
                from `".$this->table_name."` `lpt` join `".$table_ref_name."` `spls` on 
                `lpt`.`s_professional_looking_status_id`=`spls`.`s_professional_looking_status_id` where ".$final_qry_str." and  
                `lpt`.`s_professional_looking_status_id` is not null 
                group by `lpt`.`s_professional_looking_status_id`;";
      
        $result = $this->db->query($sql_filterlookingfor);
          
        $data_result = $result->result();  
        
        return $data_result;
    }
    
    public function getFiltertype($final_qry_str = 1){
        $final_qry_str = 1;
          $table_ref_name = 's_professional_type';
        
        // $sql_filtertype = "select `lpt`.`s_professional_type_id`,`spt`.`s_professional_type_val` from 
                // `".$this->table_name."` `lpt` left join `".$table_ref_name."` `spt` 
                // on `lpt`.`s_professional_type_id`=`spt`.`s_professional_type_id` where ".$final_qry_str." and  
                // `lpt`.`s_professional_type_id` is not null group by `lpt`.`s_professional_type_id`;"; 
				
				//query change by manish
				$sql_filtertype = "select `lpt`.`s_professional_type_id`,`spt`.`s_professional_type_val` from 
                `".$this->table_name."` `lpt` join `".$table_ref_name."` `spt` 
                on `lpt`.`s_professional_type_id`=`spt`.`s_professional_type_id` where ".$final_qry_str." and  
                `lpt`.`s_professional_type_id` is not null group by `lpt`.`s_professional_type_id`;";
        
        $result = $this->db->query($sql_filtertype);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    }
     public function getFiltercoatchfocus($final_qry_str = 1){
        $final_qry_str = 1;
          $table_ref_name = 's_professional_coaching_focus';
        
        // $sql_filtercoatchfocus = "select `lpt`.`s_professional_coaching_focus_id`,`spcf`.`s_professional_coaching_focus_val` from 
                    // `".$this->table_name."` `lpt` left join `".$table_ref_name."` `spcf` 
                    // on `lpt`.`s_professional_coaching_focus_id`=`spcf`.`s_professional_coaching_focus_id` where ".$final_qry_str." and 
                    // `lpt`.`s_professional_coaching_focus_id` is not null group by `lpt`.`s_professional_coaching_focus_id`;";
          // 
          //query change by manish
          $sql_filtercoatchfocus = "select `lpt`.`s_professional_coaching_focus_id`,`spcf`.`s_professional_coaching_focus_val` from 
                    `".$this->table_name."` `lpt` join `".$table_ref_name."` `spcf` 
                    on `lpt`.`s_professional_coaching_focus_id`=`spcf`.`s_professional_coaching_focus_id` where ".$final_qry_str." and 
                    `lpt`.`s_professional_coaching_focus_id` is not null group by `lpt`.`s_professional_coaching_focus_id`;";
        
        $result = $this->db->query($sql_filtercoatchfocus);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    }
   
     public function getFilterskill($final_qry_str = 1){
        $final_qry_str = 1;

        $table_ref_name = 'project_skill';
      
       // $sql_projectskill_info = "select `pt`.`pr_skill_id`,`pt`.`skill_name` from `".$this->table_name."` `pd` right join `".$table_ref_name."` `pt` on `pd`.`project_type_id` = `pt`.`pr_skill_id` where ".$final_qry_str." group by `pt`.`pr_skill_id`;";
       
       $sql_projectskill_info = "select `psm`.`professional_id`,`ps`.`skill_name`,`ps`.`pr_skill_id` from `professional_skill_map` `psm` right join `".$table_ref_name."` `ps` on `psm`.`skill_id`=`ps`.`pr_skill_id` where ".$final_qry_str." group by `ps`.`pr_skill_id`";
       
       $result = $this->db->query($sql_projectskill_info);
          
       $data_result = $result->result();  
        
       return $data_result;





         /* $table_ref_name = 'project_skill';
        
        // $sql_filtercoatchfocus = "select `lpt`.`s_professional_coaching_focus_id`,`spcf`.`s_professional_coaching_focus_val` from 
                    // `".$this->table_name."` `lpt` left join `".$table_ref_name."` `spcf` 
                    // on `lpt`.`s_professional_coaching_focus_id`=`spcf`.`s_professional_coaching_focus_id` where ".$final_qry_str." and 
                    // `lpt`.`s_professional_coaching_focus_id` is not null group by `lpt`.`s_professional_coaching_focus_id`;";
          // 
          //query change by manish
          $sql_filtercoatchfocus = "select `lpt`.`s_professional_coaching_focus_id`,`spcf`.`s_professional_coaching_focus_val` from 
                    `".$this->table_name."` `lpt` join `".$table_ref_name."` `spcf` 
                    on `lpt`.`s_professional_coaching_focus_id`=`spcf`.`s_professional_coaching_focus_id` where ".$final_qry_str." and 
                    `lpt`.`s_professional_coaching_focus_id` is not null group by `lpt`.`s_professional_coaching_focus_id`;";
        
        $result = $this->db->query($sql_filtercoatchfocus);
          
        $data_result = $result->result();  
        
        return $data_result;*/
        
        
    }
    public function getFiltercoatchstyle($final_qry_str = 1){
        $final_qry_str = 1;
          $table_ref_name = 's_professional_coaching_style';
        
        // $sql_filtercoatchstyle = "select `lpt`.`s_professional_coaching_style_id`,`spcs`.`s_professional_coaching_style_val` from 
                    // `".$this->table_name."` `lpt` left join `".$table_ref_name."` `spcs` 
                    // on `lpt`.`s_professional_coaching_style_id`=`spcs`.`s_professional_coaching_style_id` where ".$final_qry_str." and 
                    // `lpt`.`s_professional_coaching_style_id` is not null group by `lpt`.`s_professional_coaching_style_id`;";

		//query change by manish
		$sql_filtercoatchstyle = "select `lpt`.`s_professional_coaching_style_id`,`spcs`.`s_professional_coaching_style_val` from 
                    `".$this->table_name."` `lpt` join `".$table_ref_name."` `spcs` 
                    on `lpt`.`s_professional_coaching_style_id`=`spcs`.`s_professional_coaching_style_id` where ".$final_qry_str." and 
                    `lpt`.`s_professional_coaching_style_id` is not null group by `lpt`.`s_professional_coaching_style_id`;";
        
        $result = $this->db->query($sql_filtercoatchstyle);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    }
    public function getFiltercoatchcredential($final_qry_str = 1){
	$final_qry_str = 1;
        $table_ref_name = 's_professional_coaching_credential';
        if($final_qry_str!=1){

          $sql_filtercoatchcredential = "select `lpt`.`s_professional_coaching_credential_id`,`spcs`.`credential` from 
                    `".$this->table_name."` `lpt` join `".$table_ref_name."` `spcs` 
                    on `lpt`.`s_professional_coaching_credential_id`=`spcs`.`id` where ".$final_qry_str." and 
                    `lpt`.`s_professional_coaching_credential_id` is not null group by `lpt`.`s_professional_coaching_credential_id`;";
        }else{


            $sql_filtercoatchcredential = "select * from `".$table_ref_name."`;";
        }



        $result = $this->db->query($sql_filtercoatchcredential);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    }
    public function getFilterhourlyrate($final_qry_str = 1){
        $final_qry_str = 1;
        $sql_filterhourrate = "select count(*) ct,
             CASE
                WHEN `ProfessionalCharges` < 100 THEN '1-99'
                WHEN `ProfessionalCharges` < 200 THEN '100-199'
                WHEN `ProfessionalCharges` < 300 THEN '200-299'
                WHEN `ProfessionalCharges` < 400 THEN '300-399'
                WHEN `ProfessionalCharges` < 500 THEN '400-499'
                ELSE '1000+'
             END AS grp
             FROM `".$this->table_name."` `lpt` where ".$final_qry_str." AND `ProfessionalCharges` !='' group by `grp`";
         
         
        
        $result = $this->db->query($sql_filterhourrate);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    }
    
    public function getFiltercontractval($final_qry_str = 1){
        $final_qry_str = 1;
        $sql_filtercontractval = "select count(*) ct,
             CASE
                WHEN `s_professional_contract_charge` < 1000 THEN '1-1000'
                WHEN `s_professional_contract_charge` < 2000 THEN '1000-2000'
                WHEN `s_professional_contract_charge` < 3000 THEN '2000-3000'
                WHEN `s_professional_contract_charge` < 4000 THEN '3000-4000'
                WHEN `s_professional_contract_charge` < 5000 THEN '4000-5000'
                ELSE '5000+'
             END AS grp
             FROM `".$this->table_name."` `lpt` where `lpt`.`s_professional_contract_charge` is not null and ".$final_qry_str." group by `grp`; ";
         
         
        
        $result = $this->db->query($sql_filtercontractval);
          
        $data_result = $result->result();  
        
        return $data_result;
        
        
    } 
    
    public function fab_check($client_id,$professional_id){
        $sql_check_fab = "select * from `client_favorite` where `client_id`='".$client_id."' and `professional_id`='".$professional_id."'";
        $result = $this->db->query($sql_check_fab);
          
        $data_result = $result->result();  
        
        if(count($data_result)>0){
            return true;
        }
        else{
           return false; 
        }
        
    }
    
    
    public function configure_fav($client_id,$professional_id){       
        if($this->fab_check($client_id,$professional_id)){
            $sql_delete = "delete from `client_favorite` where `client_id`='".$client_id."' and `professional_id`='".$professional_id."'";
            $this->db->query($sql_delete );
            return 1;
        }
        else{
            $sql_insert = "insert into `client_favorite` set `client_id`='".$client_id."',`professional_id`='".$professional_id."'";
            $this->db->query($sql_insert);
            return 2;
        }
        
        
        
        
    }
    
    
    public function get_fab_professional($client_id){
        $sql_select_professional = "select * from `lm_professionaldetail_tbl` `lpt` where `lpt`.`ProfessionalID` in(
select `professional_id` from `client_favorite` where `client_id`='".$client_id."')";

        $result =  $this->db->query($sql_select_professional);
        $data_result = $result->result();        
        
        return $data_result;
        
        
    }
    
    
    
}

/* End of file model_location.php */
/* Location: ./application_front/models/model_location.php */