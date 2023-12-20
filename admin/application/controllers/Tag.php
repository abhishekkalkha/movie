<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Tag_model');
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
		$template['page'] = "tag/list";
		$template['page_title'] = "Tag List";
		$template['page_header'] = "Tag List";
		$template['result'] = $this->Tag_model->tag_list();		
		$this->load->view('template', $template);
	}
	public function create(){
		$template['page'] = "tag/create";
		$template['page_title'] = "Tag List";
		$template['page_header'] = "Tag List";
		if(!empty($_POST)) {
		   if(isset($_POST)){
				$data=$_POST;
		$r = $this->Tag_model->get_tag_details($data);	
		if($r){
$this->session->set_flashdata('message',array('message' => 'Tag already exist ','class' => 'danger'));
		redirect(base_url().'tag/create');
		}
		else{
		$this->Tag_model->add_tag($data);	
		$this->session->set_flashdata('message',array('message' => 'Tag added successfully ','class' => 'success'));
		redirect(base_url().'tag');
		   }
		}
	
		}	
		$this->load->view('template', $template);
	}

	public function edit_tag(){
		$template['page'] = "tag/edit";
		$template['page_title'] = "Edit tags";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
		$template['data'] = $this->Tag_model->edit_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$r = $this->Tag_model->get_tag_details($data);	
		if($r){
$this->session->set_flashdata('message',array('message' => 'Tag already exist ','class' => 'danger'));
		redirect(base_url().'tag/index');
		}
		else{
		    	$this->Tag_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => 'Tag edited successfully ','class' => 'success'));
		 	// redirect(base_url().'tag');	
		    	 redirect(base_url().'tag/index');
		    }
		}
		  
		}
		else{
		    	$this->session->set_flashdata('message',array('message' => 'Sorry tag not edited ','class' => 'danger'));
		    		  redirect(base_url().'tag');	
		}
		$this->load->view('template', $template);
	}

	public function delete_tag(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Tag_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Tag deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'tag');	
		    	}
		    	else{
		    		$this->session->set_flashdata('message',array('message' => 'Sorry tag not deleted ','class' => 'danger'));
		    		  redirect(base_url().'tag');	
		    	}

		$this->load->view('template', $template);
	}
}