<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_searchproject extends CI_Model
{
	public $table_name = "";
    
	function __construct()
	{
		parent::__construct();
        $this->table_name = "project_details";	
	}
	public function getFilterState($final_qry_str=1){  
        $table_ref_name = 'lm_state_tbl';
        $sql_getCountry = "select `pd`.`state`,`lst`.`StateName` from `".$this->table_name."` `pd` left join `".$table_ref_name."` `lst` on 
        `pd`.`state` = `lst`.`StateId` where ".$final_qry_str." group by `pd`.`state`";
        $result = $this->db->query($sql_getCountry);
          
        $data_result = $result->result();  
        
        return $data_result;
    }
    
    public function getCategoryInfo($final_qry_str = 1){
        $table_ref_name = 'project_category';
      
        $sql_category_info = "select `pd`.`project_category`,`pc`.`pr_cat_name` from `".$this->table_name."` `pd` left join 
`".$table_ref_name."` `pc` on `pd`.`project_category` = `pc`.`pr_cat_id` where ".$final_qry_str." group by `pd`.`project_category`";
       
       $result = $this->db->query($sql_category_info);
          
       $data_result = $result->result();  
        
       return $data_result;
    }
    
    public function getProjecttypeInfo($final_qry_str = 1){
        $table_ref_name = 'project_type';
      
        $sql_projecttype_info = "select `pd`.`project_type_id`,`pt`.`project_type_txt` from `".$this->table_name."` `pd` left join 
`".$table_ref_name."` `pt` on `pd`.`project_type_id` = `pt`.`project_type_id` where ".$final_qry_str." group by `pd`.`project_type_id`;";
       
       $result = $this->db->query($sql_projecttype_info);
          
       $data_result = $result->result();  
        
       return $data_result;
    }
    
    
    public function getProjectDetails_short($final_qry_str=1){
        
         $sql_getproject = "select `project_id`,`project_name`,`job_type`,`project_description`,`pc`.`pr_cat_name` `project_category`,`lst`.`StateName`,
                            `start_price`,`end_price`,concat(`lct`.`ClientFirstname`,' ',`lct`.`ClientLastname`) `cl_name`,`skills`,`post_date`,
                            `pt`.`project_type_txt` from `project_details` `pd` left join 
                            `project_category` `pc` on `pd`.`project_category` = `pc`.`pr_cat_id` left join `lm_state_tbl` `lst` on 
                            `pd`.`state` = `lst`.`StateId` left join `lm_clientdetail_tbl` `lct` on `pd`.`post_by` = `lct`.`ClientId`
                            left join `project_type` `pt` on `pd`.`project_type_id` = `pt`.`project_type_id` where ".$final_qry_str;
        $result = $this->db->query($sql_getproject);
          
        $data_result = $result->result();  
        
        return $data_result;
        
    }
    
    public function getProjectSkillDetails($project_id){
        
        $sql_project_skill_details = "select `psm`.*,`ps`.`skill_name` from `project_skill_map` `psm` left join `project_skill` `ps` 
on `psm`.`skill_id` = `ps`.`pr_skill_id` where `project_id`= '".$project_id."'";

        $result = $this->db->query($sql_project_skill_details);
          
        $data_result = $result->result();  
        
        return $data_result;
        
    }       

}       



/* End of file model_location.php */
/* Location: ./application_front/models/model_location.php */