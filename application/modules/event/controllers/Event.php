<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        check_installer();
        //$this->load->model('movie_model','movie'); 
    }
    public function index(){
		
		$this->load->view('template/header');
		$this->load->view('event');
		$this->load->view('template/footer');
	}


	
	
}