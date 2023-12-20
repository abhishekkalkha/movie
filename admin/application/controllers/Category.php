<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
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

		$template['page'] = "category/create";
		$template['page_title'] = "Add Category";
         if(!empty($_POST)) {
		   if(isset($_POST)){
				$data=$_POST;
				$this->Category_model->add_category($data);
				$this->session->set_flashdata('message',array('message' => 'category added successfully ','class' => 'success'));
				redirect(base_url().'category');
		   }  
	     }
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "category/list";
		$template['page_title'] = "View category";

		$template['list'] = $this->Category_model->view();

		$this->load->view('template', $template);
	}
	public function edit_category(){
		$template['page'] = "category/edit";
		$template['page_title'] = "Edit category";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		$template['data'] = $this->Category_model->get_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$this->Category_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => 'Category edited successfully ','class' => 'success'));
		    	 redirect(base_url().'category');
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}

	public function delete_category(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Category_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Category deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'category');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Category not deleted ','class' => 'danger'));
		    		  redirect(base_url().'category');	
		    	}

		$this->load->view('template', $template);
	}


	
}
