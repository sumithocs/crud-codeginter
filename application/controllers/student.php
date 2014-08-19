<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('studentmodel');
		$this->load->model('coursemodel');
		$this->load->library('authlib');
		//$this->authlib->check_login();
		
	}
	
	public function view_add()
	{
		$this->data['courses'] = $this->coursemodel->get_courses();
		$this->load->view('view_add',$this->data);
	}

	public function add()
	{
		$txtFname = $this->input->post('txtFname');
		$txtLname = $this->input->post('txtLname');
		$txtAddress = $this->input->post('txtAddress');
		$cmbCourse = $this->input->post('cmbCourse');
		$imagename = "";
		
		$file_config['upload_path']    = './uploads/';                 
    	$file_config['allowed_types']  = 'gif|jpg|png|bmp|jpeg';
    	$file_config['encrypt_name']   = true;                        
    	$this->load->library('upload', $file_config);                 
    	if(!$this->upload->do_upload('fileImage'))
		{
			$upload_detail   = $this->upload->display_errors();
			$imagename = NULL;
   		}
		else
		{
        	$upload_detail    = $this->upload->data(); 
			$imagename = $upload_detail['file_name'];   
    	}
		
		$data = array(
			'fname'=> $txtFname,
			'lname'=> $txtLname,
			'address'=> $txtAddress,
			'course_id'=> $cmbCourse,
			'image'=> $imagename
			);
		$add = $this->studentmodel->add_student($data);
		if($add)
		{
			$this->session->set_flashdata('msg', 'Added Successfully!!');
			redirect('/auth/dashboard/');
		}
		else
		{
			$this->session->set_flashdata('msg', 'Adiing failed!!');
			redirect('/student/view_add/');
		}
	}
	
	public function delete($student_id)
	{
		$delete = $this->studentmodel->delete_student($student_id);
		if($delete)
		{
			$this->session->set_flashdata('msg', 'Deleted Successfully!!');			
		}
		else
		{
			$this->session->set_flashdata('msg', 'Deleting failed!!');			
		}
		
		redirect('/auth/dashboard/');
	}
	
	public function view_edit($student_id)
	{
		$this->data['student'] = $this->studentmodel->get_student_detail_by_id($student_id);
		$this->data['courses'] = $this->coursemodel->get_courses();
		$this->load->view('view_edit',$this->data);
	}
	
	public function edit()
	{
		$txtFname = $this->input->post('txtFname');
		$txtLname = $this->input->post('txtLname');
		$txtAddress = $this->input->post('txtAddress');
		$cmbCourse = $this->input->post('cmbCourse');
		$student_id = $this->input->post('student_id');
		$imagename = "";
		
		$file_config['upload_path']    = './uploads/';                 
    	$file_config['allowed_types']  = 'gif|jpg|png|bmp|jpeg';
    	$file_config['encrypt_name']   = true;                        
    	$this->load->library('upload', $file_config);                 
    	if(!$this->upload->do_upload('fileImage'))
		{
			$upload_detail   = $this->upload->display_errors();
			$imagename = NULL;
   		}
		else
		{
        	$upload_detail    = $this->upload->data(); 
			$imagename = $upload_detail['file_name'];   
    	}
		
		$data = array(
			'fname'=> $txtFname,
			'lname'=> $txtLname,
			'address'=> $txtAddress,
			'course_id'=> $cmbCourse,
			'image'=> $imagename
			);
		$add = $this->studentmodel->edit_student($student_id,$data);
		if($add)
		{
			$this->session->set_flashdata('msg', 'Edited Successfully!!');
			redirect('/auth/dashboard/');
		}
		else
		{
			$this->session->set_flashdata('msg', 'Editing failed!!');
			redirect('/student/view_edit/');
		}
	}
	
}