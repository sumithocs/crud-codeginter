<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	

	class Authlib extends CI_Controller {
		
	function __construct(){
		$CI =& get_instance();
	}

	public function check_login(){
		
		$CI =& get_instance();
		$CI->load->model('studentmodel');

		if($CI->session->userdata('logged_in')){			
			return true;
		}
		else
		{
			$CI->session->set_flashdata('msg', 'Please Login!!');
			return false;
		}
	}
	

	
}