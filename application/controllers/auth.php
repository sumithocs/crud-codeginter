<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('authmodel');
		$this->load->model('studentmodel');		
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('/auth/dashboard/');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function login()
	{
		$username = $this->input->post('txtUsername');
		$password = $this->input->post('txtPassword');
		//echo $username."-".$password;
		$logged_in = $this->authmodel->check_login($username,$password);
		
		if($logged_in)
		{
			$this->session->set_userdata('logged_in', true);
			redirect('/auth/dashboard/');
		}
		else
		{
			$this->session->set_flashdata('msg', 'Login failed!!');
			redirect('/auth/');
			
		}
		//$this->load->view('welcome_message');
	}
	
	public function dashboard()
	{
		if($this->session->userdata('logged_in')){
			$this->data['students'] = $this->studentmodel->get_all_students();
			$this->load->view('dashboard',$this->data);
		}
		else
		{
			$this->session->set_flashdata('msg', 'Please Login!!');
			redirect('/auth/');
		}
	}
	
	public function logout()
	{
		$this->session->set_userdata('logged_in', false);
		redirect('/auth/');
		
	}
	
}