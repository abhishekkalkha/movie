<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Role_model');
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

		$template['page'] = "role/create";
		$template['page_title'] = "Add Role";
         if(!empty($_POST)) {
		   if(isset($_POST)){
				$data=$_POST;
				 $r = $this->Role_model->get_role_fulldetails($data);	
		        if($r){
			     $this->session->set_flashdata('message',array('message' => 'Role already exist ','class' => 'danger'));
					redirect(base_url().'role/create');
		        }
		        else{
				$this->Role_model->add_role($data);
				$this->session->set_flashdata('message',array('message' => 'Role added successfully ','class' => 'success'));
				redirect(base_url().'role/index');
             }
		   }  
		 
	     }
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "role/list";
		$template['page_title'] = "View Role";
		$template['list'] = $this->Role_model->view();
		$this->load->view('template', $template);
	}
	public function edit_role(){
		$template['page'] = "role/edit";
		$template['page_title'] = "Edit Role";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
		$template['data'] = $this->Role_model->get_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	 $r = $this->Role_model->get_role_fulldetails($data);	
		        if($r){
			     $this->session->set_flashdata('message',array('message' => 'Role already exist ','class' => 'danger'));
					redirect(base_url().'role/create');
		        }
		        else{
		    	$this->Role_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => 'Role edited successfully ','class' => 'success'));
		    	redirect(base_url().'role');
		    }
		}
		   
		}
		 
		$this->load->view('template', $template);
	}

	public function delete_role(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Role_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Role deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'role');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Role not deleted ','class' => 'danger'));
		    		  redirect(base_url().'role');	
		    	}

		$this->load->view('template', $template);
	}


	
}
