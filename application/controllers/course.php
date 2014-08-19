<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('coursemodel');
	}
	
}