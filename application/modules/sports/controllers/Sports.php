<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        check_installer();
        //$this->load->model('movie_model','movie'); 
    }
    public function index(){
		
		$this->load->view('template/header');
		$this->load->view('sports');
		$this->load->view('template/footer');
	}

    public function sports_detail(){
		
		$this->load->view('template/header');
		$this->load->view('sports_detail');
		$this->load->view('template/footer');
	}
	
	
}