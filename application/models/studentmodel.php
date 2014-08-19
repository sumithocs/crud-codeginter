<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Studentmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function add_student($data)
	{
		if($this->db->insert('tbl_student',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get_all_students()
	{
		$this->db->select('*');
		$this->db->from('tbl_student'.' as s');
		$this->db->join('tbl_course'.' as c', 's.course_id = c.course_id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;		
	}
	
	
	
	public function delete_student($student_id)
	{
		$this->db->where('student_id', $student_id);		
		if($this->db->delete('tbl_student'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get_student_detail_by_id($student_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_student');
		$this->db->where('student_id',$student_id);
		//$this->db->join('tbl_course'.' as c', 's.course_id = c.course_id');
		$query = $this->db->get();		
		$row = $query->row();
		//print_r($row);die;
		return $row;
		
	}
	
	public function edit_student($student_id,$data)
	{
		$this->db->where('student_id', $student_id);				
		if($this->db->update('tbl_student', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
}