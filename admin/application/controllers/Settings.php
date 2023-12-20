<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Settings_model');
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
		if($this->session->userdata('super_admin') == 1){
		 $template['page'] = "settings/create";
		 $template['page_title'] = "View Reviews";
		 $template['list'] = $this->Settings_model->data();
		 $template['data'] = $this->Settings_model->get_data();
         if(!empty($_POST)) {
	       if(isset($_POST)){
	    	  $data = $_POST;
   	          $config['upload_path'] = './uploads/';
              $config['allowed_types'] = '*';               
              $config['max_size'] = '800'; 
	          $this->load->library('upload', $config);
              $new_names =  $_FILES['logo']['name'];
	          $new_name = time()."_".$_FILES['logo']['name'];
			  $config['file_name'] = $new_name;
              $this->upload->initialize($config); 
              if($new_names != '')
              {
              if ($this->upload->do_upload('logo')){
           /* {
			$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
                return FALSE;
             }
*/
              $file_data = $this->upload->data();
              //print_r($file_data);exit();
			  $fname=$file_data['file_name'];

			 // if($fname!= ''){
			    $config['upload_path'] = 'uploads/';
			   $data['logo']=$config['upload_path'].$fname;
             }
         }
                $names= $_FILES['favicon']['name'];
		        $name = time()."_".$_FILES['favicon']['name'];
				$config['file_name'] = $name;
	            $this->upload->initialize($config);
	            if($names != ''){
                  if ($this->upload->do_upload('favicon')) {
             	    $file_data = $this->upload->data();
			        $fname=$file_data['file_name'];
			        $config['upload_path'] = 'uploads/';
			        $data['favicon']=$config['upload_path'].$fname;
                }
              }
                //print_r($data);exit();
			    $result = $this->Settings_model->add_settings($data);
			    $res = $this->Settings_model->get_data();
			    $admin = $this->Settings_model->get_admin_data();
			    $sess_array = array(
			         'name' => $admin->name,
                     'image' => $admin->image,
                     'title'=>$res->title,
                     'title_short'=>$res->title_short
			                        );
			    $this->session->set_userdata('backend_logged_in', $sess_array);
				$this->session->set_flashdata('message',array('message' => 'Settings added successfully ','class' => 'success'));
				redirect(base_url().'settings');

		   }
		}
		$this->load->view('template', $template);
	}
	else{
		redirect(base_url().'welcome/my404');
	}
	}
	
}
