<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertypes extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Usertype_model');
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

		$template['page'] = "usertypes/create";
		$template['page_title'] = "Add role";
         if(!empty($_POST)) {
		   if(isset($_POST)){
             $data = $_POST;
    
			    $result = $this->Usertype_model->add_role($data);
				$this->session->set_flashdata('message',array('message' => 'Role added successfully ','class' => 'success'));
				redirect(base_url().'usertypes');
		   }
		   } 
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "usertypes/list";
		$template['page_title'] = "View roles";
		$template['list'] = $this->Usertype_model->view();
		$this->load->view('template', $template);
	}
	public function edit_role(){
	   $template['page']="usertypes/edit";
	   $template['page_title'] ='Edit role';
	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	   $template['data'] =  $this->Usertype_model->get_data($id);/*editview*/	
	     if(!empty($template['data']))
	     {
		    if($_POST){
             $data = $_POST;
			    $result = $this->Usertype_model->edit($id,$data);
				$this->session->set_flashdata('message',array('message' => 'Role updated successfully ','class' => 'success'));
				redirect(base_url().'usertypes');

		   }
				
            }
			  $this->load->view('template',$template);
	}

	public function delete_role(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Usertype_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Role deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'usertypes');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Role not deleted ','class' => 'danger'));
		    		  redirect(base_url().'usertypes');	
		    	}

		$this->load->view('template', $template);
	}


	
}
