<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Banners_model');
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
		
	public function create()
	{
      //echo "sdjkjsdsfgvdfgdfgdgdfgvdfg";
		$template['page'] = "banner/banners";
		$template['page_title'] = "Banners";

		//print_r($_POST);

		   if(isset($_FILES) && !empty($_FILES)){
             $data = $_FILES;
             //echo "sdghhfjgssgdsdggbfdgudhfg";
             // print_r($data);
  /*      $config['upload_path'] = './uploads/';
              $config['allowed_types'] = '*';               
              $config['max_size'] = '800'; 
	          $this->load->library('upload', $config);

	          $new_name = time()."_".$_FILES['banner_images']['name'];
			  $config['file_name'] = $new_name;
              $this->upload->initialize($config); 
              $file_data = $this->upload->data();
			  $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			    $data['banner_images']=$config['upload_path'].$fname;*/


 $config['upload_path'] = './uploads/';
                     $config['allowed_types'] = '*';               
                     $config['max_size'] = '2000'; 
			         $this->load->library('upload', $config);
			         $new_name = time()."_".$_FILES['banner_images']['name'];
					$config['file_name'] = $new_name;
		            $this->upload->initialize($config);


     	if (! $this->upload->do_upload('banner_images'))
            {

			$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
  
                return FALSE;
             }

             	$file_data = $this->upload->data();
			    $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			   $data['banner_images']=$config['upload_path'].$fname;




			   $this->Banners_model->insert_banners($data);
				$this->session->set_flashdata('message',array('message' => 'Banners added successfully ','class' => 'success'));
				//redirect(base_url().'actors/create');

		   
		   } 
		
		$this->load->view('template', $template);
	}

	public function index(){
				$template['page'] = "banner/view";
		$template['page_title'] = "Banners";
		$template['list'] = $this->Banners_model->get_images();
		$this->load->view('template', $template);
	}

	public function delete_image(){
				 $id = $this->uri->segment(3);
/*if($id==null){
 redirect($this->router->fetch_class());
} */

$result = $this->Banners_model->delete_image($id);
if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Banners deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'banners/index');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Banners not deleted ','class' => 'danger'));
		    		  redirect(base_url().'banners/index');	
		    	}

	}

}
