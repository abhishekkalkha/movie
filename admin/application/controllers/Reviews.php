<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Reviews_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		 }
		
	
	public function index(){
			$template['page'] = "Reviews/list";
		$template['page_title'] = "View Reviews";
		 $template['list'] = $this->Reviews_model->review_list();
	
		//print_r($template['list']);
		$this->load->view('template', $template);
	}
	public function status(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}	
		  $s=$this->Reviews_model->update_status($id);
		  $this->session->set_flashdata('message', array('message' => 'Review enable Successfully','class' => 'success'));
				  redirect(base_url().'reviews');
	}

     public function status_active(){

				  $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}		   
				  $s=$this->Reviews_model->enable_status($id);
				  $this->session->set_flashdata('message', array('message' => 'Review disable Successfully','class' => 'success'));
				   redirect(base_url().'reviews');
	 }	
	
}
