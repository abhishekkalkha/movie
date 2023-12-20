<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Language_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		 }
		
	public function create(){

		$template['page'] = "language/create";
		$template['page_title'] = "Edit Language";
         if(!empty($_POST)) {
		   if(isset($_POST)){
				$data=$_POST;

				$this->Language_model->add_language($data);
				$this->session->set_flashdata('message',array('message' => 'Language added successfully ','class' => 'success'));
				redirect(base_url().'language/index');
		   }  
	     }
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "language/list";
		$template['page_title'] = "View languages";
		$template['list'] = $this->Language_model->view();
		$this->load->view('template', $template);
	}
	public function edit_language(){
		$template['page'] = "language/edit";
		$template['page_title'] = "View languages";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
		$template['data'] = $this->Language_model->get_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$this->Language_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => 'Language edited successfully ','class' => 'success'));
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}

	public function delete_language(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Language_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Language deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'language/index');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Language not deleted ','class' => 'danger'));
		    		  redirect(base_url().'language/index');	
		    	}

		$this->load->view('template', $template);
	}


	
}
