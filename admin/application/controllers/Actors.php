<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actors extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Actor_model');
         $this->load->helper('access');
        // print_r($this->session->userdata('backend_logged_in'));
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

		$template['page'] = "actors/add_new";
		$template['page_title'] = "Add Actors";
		$template['data'] = $this->Actor_model->get_role();
         if(!empty($_POST)) {
		   if(isset($_POST)){
             $data = $_POST;
                     $config['upload_path'] = './uploads/';
                     $config['allowed_types'] = '*';               
                     $config['max_size'] = '1000'; 
			         $this->load->library('upload', $config);
			         $new_name = time()."_".$_FILES['image']['name'];
					$config['file_name'] = $new_name;
		            $this->upload->initialize($config);


     	if (! $this->upload->do_upload('image'))
            {

			$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
  
                return FALSE;
             }

             	$file_data = $this->upload->data();
			    $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			   $data['image']=base_url().$config['upload_path'].$fname;
                $r = $this->Actor_model->get_actor_fulldetails($data);	
		        if($r){
			     $this->session->set_flashdata('message',array('message' => 'Actors already exist ','class' => 'danger'));
					redirect(base_url().'actors/create');
		        }
		        else{
			    $result = $this->Actor_model->add_actor($data);
				$this->session->set_flashdata('message',array('message' => 'Actors added successfully ','class' => 'success'));
				redirect(base_url().'actors/index');
               }
		   }
		   } 
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "actors/list";
		$template['page_title'] = "View actors";
		$template['list'] = $this->Actor_model->view();
		$this->load->view('template', $template);
	}
	public function edit_actors(){
	   $template['page']="actors/edit";
	   $template['page_title'] ='Edit Actors';
	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	   $template['datas'] = $this->Actor_model->get_role();
	   $template['data'] =  $this->Actor_model->get_data($id);/*editview*/	
	   $a= $template['data']->role;
	   $b = explode(",",$a);
	   $template['data']->role = $b;
	     if(!empty($template['data']))
	     {
		    if($_POST){
             $data = $_POST;
            // print_r($data);
                     $config['upload_path'] = './uploads/';
                     $config['allowed_types'] = '*';               
                     $config['max_size'] = '800'; 
			         $this->load->library('upload', $config);
			         $new_names = $_FILES['image']['name'];
			         $new_name = time()."_".$_FILES['image']['name'];
					$config['file_name'] = $new_name;
		            $this->upload->initialize($config);
                      if($new_names != ''){
                      	 if ($this->upload->do_upload('image')){
                      	 	$file_data = $this->upload->data();
						    $fname=$file_data['file_name'];
						    $config['upload_path'] = 'uploads/';
						    $data['image']=base_url().$config['upload_path'].$fname;

                      	 }

                      }
                       $r = $this->Actor_model->get_actor_fulldetails($data,$id);	
             	 if($r){
			     $this->session->set_flashdata('message',array('message' => 'Actors already exist ','class' => 'danger'));
					redirect(base_url().'actors/index');
		        }
		        else{
			    $result = $this->Actor_model->update_actor($id,$data);
				$this->session->set_flashdata('message',array('message' => 'Actor details updated successfully ','class' => 'success'));
				redirect(base_url().'actors');
             }
		   }
				
            }
			  $this->load->view('template',$template);
	}

	public function delete_actor(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Actor_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Actors deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'actors');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Actors not deleted ','class' => 'danger'));
		    		  redirect(base_url().'actors');	
		    	}

		$this->load->view('template', $template);
	}


	
}
