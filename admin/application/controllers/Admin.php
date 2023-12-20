<?php
  @ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Admin_model');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			

		 }
		
	public function index(){

	if($this->session->userdata('super_admin') == 1){
		// print_r($this->session->userdata('backend_logged_in'));exit();
	    $id=$this->session->userdata['backend_logged_in']['id'];
	 
        if (isset ($_POST['save'])){
		    $data = $_POST;

/*---------------------professional photograph start---------------------*/
             
	        if(isset($_FILES['image'])){
		         $config['upload_path'] = './uploads/';
	             $config['allowed_types'] = '*';               
	             $config['max_size'] = '800'; 
				 $this->load->library('upload', $config);
				 if ( $this->upload->do_upload('image')){
		            $file_data = $this->upload->data();
				    $fname=$file_data['file_name'];
					$config['upload_path'] = 'uploads/';
					$data['image']=base_url().$config['upload_path'].$fname;	
		         }
	        }
/*------------------------professional photograph end---------------------*/

		    unset ($data['save']);
	        $this->load->helper(array('form'));
	        $this->load->library('form_validation');			   
	        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExist'); 

/*-----------------------------form validation start ------------------------------------*/

	   		 if ($this->form_validation->run() == FALSE){ 
	          	 $this->session->set_flashdata('message',array('message' => 'Username or Email is Invalid ','class' => 'success'));
             } 
             else { 						 										   
				   $result = $this->Admin_model->Update_admin($data, $id);
				   $select_result =$this->Admin_model->getadmin_all($id);
				   $set = $this->Admin_model->settings();
				   $sess_array = array(
								       'id'=>$select_result->id,
									 'email' => $select_result->email,
									 'image'=>$select_result->image,
									 'phone'=>$select_result->phone,
									 'name'=>$select_result->name,
									 'title'=>$set->title,
				                     'title_short'=>$set->title_short
							        );
				   $this->session->set_userdata('backend_logged_in', $sess_array);
				   $this->session->set_flashdata('message',array('message' => 'Profile Updated successfully','class' => 'success'));		       	
			 }
/*--------------------------------form validation end --------------------------------*/
	                            
/*---------------------------------End save button -------------------------------------*/

 //********************************************************************************* 

 /*---------------------------Start update button ----------------------------------*/

        } else if (isset ($_POST['update'])){
				$data = $_POST;
			    unset ($data['update']);
	           //validate new and confirm new password
                if($data['password_n'] !== $data['password_cn']) {
                   $this->session->set_flashdata('message', array('message' => 'Password does not match', 'title' => 'Error !', 'class' => 'danger'));								
                }else {							                                          
                        unset($data['password_cn']);						
                        $result = $this->Admin_model->update_admin_password($data, $id);
                        if($result) {
                            if($result === "notexist") {
                               $this->session->set_flashdata('message', array('message' => 'Entered Current Password Is Invalid', 'title' => 'Warning !', 'class' => 'warning'));									
                            } 
                            else {							
                               $this->session->set_flashdata('message', array('message' => 'Password updated successfully', 'title' => 'Success !', 'class' => 'success'));									
                            }
                        }
                        else {							
                             $this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));				
                        }
                }					
        }		
/*-----------------------------End update button -------------------------------------*/																		   
//*****************************************************************************************

        $template['data'] =$this->Admin_model->getadmin_all($id);
	    $template['page'] = "adminprofile/create";
    }
//***********************user update start*******************************
    elseif($this->session->userdata('super_admin') == 0){
					/*-----------------------set session id -------------------------*/
					//echo "jhasdjkfnakjsnfsdfsdfsdfsdfsdfsdfsdf";
      $id=$this->session->userdata['backend_logged_in']['id'];
         if (isset ($_POST['save'])){
		    $data = $_POST;
				/*-------------check if save or update button submitting the form ----*/
				/*------------------- Start save button -----------------------------*/
	    if(isset($_FILES['image'])){
	         $config['upload_path'] = './uploads/';
             $config['allowed_types'] = '*';               
             $config['max_size'] = '800'; 
			 $this->load->library('upload', $config);
			 if ( $this->upload->do_upload('image')){			                                                     	
	             $file_data = $this->upload->data();
			     $fname=$file_data['file_name'];
				 $config['upload_path'] = 'uploads/';
				 $data['image']=base_url().$config['upload_path'].$fname;																 
              }
        }
	/*---------------------professional photograph end--------------------*/
		unset($data['save']);
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_isEmailExist');
		/*---------------- form validation start ----------------------*/
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message',array('message' => 'Username Or Email is already exist ','class' => 'danger'));
		}else {
			$result= $this->Admin_model->Update_user($data, $id);
			$select_result =$this->Admin_model->getuser_all($id);
			$set = $this->Admin_model->settings();
			$sess_array = array(
				'id'=>$select_result->id,
				'email' => $select_result->email,
				'image'=>$select_result->image,
				'name'=>$select_result->name,
				'title'=>$set->title,
				'title_short'=>$set->title_short
				);
			$this->session->set_userdata('backend_logged_in', $sess_array);
			$this->session->set_flashdata('message',array('message' => 'Edit Profile Updated successfully','class' => 'success'));
		}
				/*---------------- form validation end ------------------------------*/
						/*---------------------Save Button End ---------------------------*/
	//*********************************************************************
			/*------------------------Start update button -------------------------*/
	    }else if (isset ($_POST['update'])){
						$data = $_POST;
						unset($data['update']);
						if($data['password_n'] !== $data['password_cn']) {
							$this->session->set_flashdata('message', array('message' => 'Password does not match', 'title' => 'Error !', 'class' => 'danger'));
						}else {
							unset($data['password_cn']);
							$result = $this->Admin_model->update_user_password($data, $id);
							if($result) {
								if($result === "notexist") {
									$this->session->set_flashdata('message', array('message' => 'Entered Current Password Is Invalid', 'title' => 'Warning !', 'class' => 'warning'));
								}else{
									$this->session->set_flashdata('message', array('message' => 'Password updated successfully', 'title' => 'Success !', 'class' => 'success'));
								}
							}else{
								$this->session->set_flashdata('message', array('message' => 'Sorry, Error Occurred', 'title' => 'Error !', 'class' => 'danger'));
							}
						}

		}
					/*----------------------End update button ----------------------------*/
	//*******************************************************************************************
					/*------------------------End LAWYER --------------------------------*/
					$template['data'] =$this->Admin_model->getuser_all($id);
					$template['page'] = "adminprofile/userprofile";
				}
//***********************user update end*******************************
				$template['page_title'] = "Your Profile";
		 $this->load->view('template', $template);
	}

 public function isEmailExist(){
 	 $this->load->library('form_validation');
    $this->load->model('Admin_model');
	 $id=$this->session->userdata['backend_logged_in']['id'];
	$email = $this->input->post('email');
    $is_exist = $this->Admin_model->isEmailExist($id,$email);
    if ($is_exist) {
		$this->session->set_flashdata('message',array('message' => 'Email  is already exist ','class' => 'success'));
          
        return false;
    } 
    else {
        return true;
    }
 }
	
}
