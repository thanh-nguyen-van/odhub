<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Only for custom state and country population
 */
class Model_CountryState extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
        
        
        function getAllCountry(){
            $this->db->order_by("c_country_name", "asc");
            $this->db->from('lm_custom_country');
            $this->db->where(array('c_country_status' => '1'));
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
                return $query->result();
            }
            else
                return false;
        }
        
        function getAllState($countryId){
            $this->db->order_by("c_state_name", "asc");
            $query = $this->db->get_where('lm_custom_state', array('c_state_status' => '1','c_country_id' => $countryId));
            
            if ($query->num_rows() > 0){
                return $query->result();
            }
            else
                return false;
        }
}