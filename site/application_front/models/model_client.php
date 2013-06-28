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
   public function review_submit(){
    $professional_id			= 			inputEscapeString($this->input->request('professional_id'));
	$project_id					= 			inputEscapeString($this->input->request('project_id'));
	$review						= 			inputEscapeString($this->input->request('review'));
	$review_percentage			= 			inputEscapeString($this->input->request('review_percentage'));
	$client_id					= 			$_SESSION[USER_SESSION_ID]; 
	$data  = array(
						 'rating'		=> $review_percentage		,
						 'review'	=>  $review	,
						 'prof_id'		=> $professional_id		,
                         'client_id'        => $client_id,
                         'project_id'        => $project_id ,
						 'rv_date'        => $date = date('Y/m/d H:i:s')

					 );
		
		if($this->db->insert('lm_professional_review_tbl', $data))
		return true; 		
	
      }
	public function get_inv_details($invid)
	{
	  //	$this->db->select('*');
	  	$this->db->select('lm_invoice.project_id,lm_invoice.professional_id,lm_invoice.invoice_number,lm_invoice.amount,lm_invoice.cr_date,lm_professionaldetail_tbl.ProfessionalFirstname,lm_professionaldetail_tbl.ProfessionalLastname,project_details.project_name');
		$this->db->from('lm_invoice');
		$this->db->join('lm_professionaldetail_tbl', 'lm_professionaldetail_tbl.ProfessionalId = lm_invoice.professional_id');
		$this->db->join('project_details', 'project_details.project_id = lm_invoice.project_id');
		$this->db->where('invoice_number', $invid);
		$query = $this->db->get();
	
		return $query->row_array();
	}
	  public function update_info($postdata) {
	
        //foreach($postdata as $postdata){$data["$postdata"] = $postdata;}
       $this->db->where('ClientId', $_SESSION[USER_SESSION_ID]);
       $this->db->update('lm_clientdetail_tbl', $postdata); 
	   
       return true;
    }
	  
}

/* End of file model_client.php */
/* Location: ./application_front/models/model_client.php */