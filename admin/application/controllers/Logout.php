<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
				
 	}
	
	function index() {
		$this->session->unset_userdata('backend_logged_in');
		$this->session->unset_userdata('super_admin');
		session_destroy();
       redirect(base_url());
	}
}
