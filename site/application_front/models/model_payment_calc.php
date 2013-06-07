<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');          

class model_payment_calc extends CI_Model
{
    
    public function get_professional_id_from_code($code=""){
        $select_profesional_id = "select * from `lm_professionaldetail_tbl` where `referral_code`='".$code."'";
         $result = $this->db->query($select_profesional_id);
        
        $data_result = $result->result();  
        
        return $data_result;
    }
    
    
    public function insert_professional_payment($data){
        $professional_id = $data['professional_id'];
        $get_amount = $data['get_amount'];
        $due_amount = $data['due_amount'];
        $amount_for = $data['amount_for'];
        $ref_id_for = $data['ref_id_for'];
        
        $sql_insert_professional_payment = "insert into `professional_payment_status` set `professional_id`='".$professional_id."',`get_amount`='".$get_amount."',`due_amount`='".$due_amount."',`amount_for`='".$amount_for."',`ref_id_for`='".$ref_id_for."',`date`=curdate()";
        $this->db->query($sql_insert_professional_payment);
    }
    
    
   public function insert_professional_commission($data){
       
       $professional_id = $data['professional_id'];
       $referred_professional_id = $data['referred_professional_id'];
       $reffered_client_id = $data['reffered_client_id'];
       $amount = $data['amount'];
       $commission_type = $data['commission_type'];
       $redeem_commission = $data['redeem_commission'];
       
       $insert_sql = "insert into `professional_commission_earn` set `professional_id`='".$professional_id."',`referral_professional_id`='".$referred_professional_id."',`referral_client_id`='".$reffered_client_id."',`amount`='".$amount."',`commisison_type`='".$commission_type."',`date`=curdate(),`redeem_commissoin`='".$redeem_commission."'";
       $this->db->query($insert_sql);
   } 
    
   public function ballence_amount($professional_id){
       $sql_ballence_amount = "select sum(`amount`) `sum_amount`,sum(`redeem_commissoin`) `sum_redeem_amt` from `professional_commission_earn` where `referral_professional_id`='".$professional_id."' and
`commisison_type`='referral_professional'";
       $result = $this->db->query($sql_ballence_amount);
       $data_result = $result->result();  
       return $data_result;
           
   } 
   public function add_site_commission($data){
       
       $commission_amount = $data['commission_amount'];
       $from_client_id = $data['from_client_id'];
       $project_id = $data['project_id'];
       
       $insert_site_comission = "insert into `site_commission` set `commission_amount`='".$commission_amount."',`from_client_id`='".$from_client_id."',`project_id`='".$project_id."',`date`=curdate()";
       
       $this->db->query($insert_site_comission);
      
       
       
   } 
    
}