<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminuser extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Adminuser_model');
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
		// if($this->session->userdata('super_admin') == 1){
		$template['page'] = "adminusers/create";
		$template['page_title'] = "Admin Users";
		$template['data'] =  $this->Adminuser_model->get_usertype();
		 if(!empty($_POST)) {
		   if(isset($_POST)){
		   	$data =$_POST;
		   	$email = $this->Adminuser_model->get_email($data['email']);
		   	if($email){
                 $this->session->set_flashdata('message',array('message' => 'Email Id already exist ','class' => 'danger'));
				redirect(base_url().'adminuser/create');
		   	}
		   	else{
			   $config['upload_path'] = './uploads/';
              $config['allowed_types'] = '*';               
              $config['max_size'] = '800'; 
	          $this->load->library('upload', $config);

	          $new_name = $_FILES['image']['name'];
			  $config['file_name'] = $new_name;
              $this->upload->initialize($config); 
              $file_data = $this->upload->data();
			  $fname=$file_data['file_name'];
			  if($fname!= ''){
			    $config['upload_path'] = 'uploads/';
			    $data['image']=base_url().$config['upload_path'].$fname;
              }
              
		        $this->Adminuser_model->adduser($data);
		        $this->session->set_flashdata('message',array('message' => 'Users added successfully ','class' => 'success'));
				redirect(base_url().'adminuser');
		   }
		}
	}
		$this->load->view('template', $template);
	// }
	// else{
		
	// 	    redirect(base_url().'welcome/my404');
	// }
}

	public function index(){
		$template['page'] = "adminusers/list";
		$template['page_title'] = "Admin Users";
		$template['data'] =  $this->Adminuser_model->get_data();
		$this->load->view('template', $template);
	}

	public function edit_user(){
		if($this->session->userdata('super_admin') == 1){
		$template['page']="adminusers/edit";
	   $template['page_title'] ='Edit Actors';
	   $template['data'] =  $this->Adminuser_model->get_usertype();

	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	    $template['datas'] = $this->Adminuser_model->get_details($id);
	    if(!empty( $template['datas'])){
	    	if($_POST){
	    		$data=$_POST;
	    		$result = $this->Adminuser_model->update_data($data,$id);
	    	
	    		$this->session->set_flashdata('message',array('message' => 'Updated successfully ','class' => 'success'));
				redirect(base_url().'adminuser');

	    }
	    }
	   $this->load->view('template', $template);
	}
	else{
		
		  redirect(base_url().'welcome/my404');
	}

	}

	public function delete_user(){
		if($this->session->userdata('super_admin') == 1){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Adminuser_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Deleted successfully ','class' => 'success'));
		    		redirect(base_url().'adminuser');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry not deleted ','class' => 'danger'));
		    		redirect(base_url().'adminuser');
		    	}

		$this->load->view('template', $template);
	}
	else{
		 redirect(base_url().'welcome/my404');
	}
}

	

	
}
