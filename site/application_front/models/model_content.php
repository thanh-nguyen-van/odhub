<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_content extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();	
	}
	
	public function get_menu($condition)
	{
		$rs = array();
		$this->db->select('StaticPageId,StaticPageType, StaticPageName');
		$this->db->where($condition);
		$this->db->order_by("StaticPageId", "ASC");
		$query  = $this->db->get('lm_staticpage_tbl');
		$result = $query->result_array();
		
		foreach($result as $res)
		{
			$rs[$res['StaticPageType']] = $res;
		}
		return $rs;
	}
	
	public function get_left_menu($condition)
	{
		$this->db->select('StaticPageId,StaticPageType, StaticPageName');
		$this->db->where($condition);
		$this->db->order_by("StaticPageId", "ASC");
		$query  = $this->db->get('lm_staticpage_tbl');
		$result = $query->result_array();
		
		return $result;
	}
		
	public function get_menu_content($page_id)
	{
		$this->db->select('*');
		$this->db->where('StaticPageId',$page_id);
		$query  = $this->db->get('lm_staticpage_tbl');
		$result = $query->row_array();
		return $result;
	}
}

/* End of file home.php */
/* Location: ./application_front/controllers/home.php */