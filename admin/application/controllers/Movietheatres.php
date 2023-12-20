<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movietheatres extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Movietheatres_model');
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
		
	public function create(){

		$template['page'] = "movietheatres/create";
		$template['page_title'] = "Add Movies to Theatres";
		$template['list'] = $this->Movietheatres_model->get_movies();
		$template['data'] = $this->Movietheatres_model->get_theatres();
         if(!empty($_POST)) {
		   if(isset($_POST)){
               $data = $_POST;
			    $result = $this->Movietheatres_model->add_movies_theatres($data);
				$this->session->set_flashdata('message',array('message' => 'Movies alloted successfully ','class' => 'success'));
				 redirect(base_url().'movietheatres');
			

		   }
		   } 
		 $this->load->view('template', $template);

	}

		public function edit_movietheatre(){
		$template['page'] = "movietheatres/edit";
		$template['page_title'] = "Edit movies to theatre";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
		$template['list'] = $this->Movietheatres_model->get_movies();
		$template['data'] = $this->Movietheatres_model->get_theatres();
		$template['lists'] = $this->Movietheatres_model->get_data($id);
	
		$a= $template['lists']->theatre_id;
	   $b = explode(",",$a);
	   $template['lists']->theatre_id = $b;
		if(!empty($template['lists'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$this->Movietheatres_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => ' Edited successfully ','class' => 'success'));
				 redirect(base_url().'movietheatres');
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}
	public function delete_movietheatre(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Movietheatres_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Deleted successfully ','class' => 'success'));
				 redirect(base_url().'movietheatres');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry not deleted ','class' => 'danger'));
				 redirect(base_url().'movietheatres');
		    	}

		$this->load->view('template', $template);
	}

	public function index(){
			$template['page'] = "movietheatres/list";
		$template['page_title'] = "View details";
		$template['result'] = $this->Movietheatres_model->view();
		$this->load->view('template', $template);
	}

}
