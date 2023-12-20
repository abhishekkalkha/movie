<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_ctrl extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('Settings_model'); 
    }

    

/* MOVIE DETAILS
########################################################
--------------------------------------------------------*/ 	
	 public function view_settings()
	  {
		  
		/*$this->uri->segment(3);
		$this->load->view('template/header');
		$this->load->view('book');
		$this->load->view('template/footer');*/
		
		$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "add-settings";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
		        /*$template['page'] = 'settings/add-settings';
		        $template['page_title'] = 'Add Settings';*/
			    

		/*	$id = $this->session->userdata('logged_in_admin')['id'];
			   
		  
		 if($_POST){
			$data = $_POST;


			
			//array_walk($data, "remove_html");
	
			
			unset($data['submit']); 
			
			if(isset($_FILES['logo'])) {  
			$config = set_upload_logo('assets/uploads/logo');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["logo"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('logo')) {
					unset($data['logo']);
				}
				else {
					$upload_data = $this->upload->data();
					//$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
				if(isset($_FILES['favicon'])) {  
			$config = set_upload_favicono('assets/uploads/favicons');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["favicon"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('favicon')) {
					unset($data['favicon']);
				}
				else {
					$upload_data = $this->upload->data();
					//$data['favicon'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['favicon'] = $config['upload_path']."/".$upload_data['file_name'];
				}
			}

			$result = $this->Settings_model->update_settings($data);
			

			if($result) {
				
				 $this->session->set_flashdata('message',array('message' => 'Add Settings Details Updated successfully','class' => 'success'));
			}
			else {
			
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
			}
			}
			    
				
				
				$resulttitles = $this->Settings_model->settings_viewing();
				
				$sessing_arrays = array(
				'title' => $resulttitles->title
				);
				
				
				$this->session->set_userdata('title', $sessing_arrays);
				
			   
			//redirect(base_url().'Business_information/add_Businessinformation');
			  $template['result'] = $this->Settings_model->settings_viewing(); 
			  $this->load->view('template',$template);
		}*/ 
		
}
}
