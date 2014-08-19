<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coursemodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function get_courses()
	{
		$this->db->select('*');
		//$this->db->select('coursename');		
		$this->db->where('active',1);
		$query = $this->db->get('tbl_course');
		$result = $query->result_array();
		return $result;
		
	}
	
}