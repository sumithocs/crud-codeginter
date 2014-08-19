<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function check_login($username,$password)
	{	
		$this->db->select('*');
		//$this->db->select('username, password');
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$query = $this->db->get('tbl_auth');
		$result = $query->num_rows();
		//echo $this->db->last_query();die;
		if($result>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}