<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_client extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_client_data($client_id) {
        $table_name = "lm_clientdetail_tbl";
        $select_flds = "*";
        $condition = "ClientId = '" . $client_id . "'";


        $this->db->select($select_flds);
        $this->db->where($condition);

        $query = $this->db->get($table_name);
        $result = $query->row_array();

        return $result;
    }

    // --- Client Invoioces showing --- //
    public function getClientInvoices($client_id) {
        //$this->db->select("*");
        //$this->db->from("lm_invoice");
        $this->db->where("lm_invoice.client_id",$client_id);
        $this->db->join("lm_professionaldetail_tbl","lm_professionaldetail_tbl.ProfessionalId = lm_invoice.professional_id","left");
        //$this->db->join("payrelese_history","payrelese_history.project_id = lm_invoice.project_id","left");
        return $this->db->get('lm_invoice');   
        
    }
    // --- Client Invoioces showing --- //
   public function check_paybut($invoice_code){
       $sql_checkpaybut = "select * from `payrelese_history` where `invoice_code`='".$invoice_code."'";
        $result = $this->db->query($sql_checkpaybut);
          
        $data_result = $result->result();  
        
        
        return $data_result;
        
       
       
       
   }
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */