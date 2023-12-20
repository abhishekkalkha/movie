<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theatrelocations extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Theatrelocation_model');
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

		$template['page'] = "theatrelocations/create";
		$template['page_title'] = "Add Locations";
         if(!empty($_POST)) {
		   if(isset($_POST)){
               $data = $_POST;
               $r = $this->Theatrelocation_model->get_location_details($data);	
		    if($r){
			$this->session->set_flashdata('message',array('message' => 'Location already exist ','class' => 'danger'));
					redirect(base_url().'theatrelocations/create');
		       }
		       else{
			    $result = $this->Theatrelocation_model->add_Locations($data);
				$this->session->set_flashdata('message',array('message' => 'Locations added successfully ','class' => 'success'));
				 redirect(base_url().'theatrelocations');
			}

		   }
		   } 
		 $this->load->view('template', $template);

	}

		public function edit_location(){
		$template['page'] = "theatrelocations/edit";
		$template['page_title'] = "Edit Location";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
		 //$template['list'] = $this->Customer_model->customer_list();
		$template['data'] = $this->Theatrelocation_model->get_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$r = $this->Theatrelocation_model->get_location_details($data);	
		        if($r){
			     $this->session->set_flashdata('message',array('message' => 'Location already exist ','class' => 'danger'));
					redirect(base_url().'theatrelocations/index');
		        }
		        else{
		    	$this->Theatrelocation_model->edit($id,$data);
		    	$this->session->set_flashdata('message',array('message' => 'Locations edited successfully ','class' => 'success'));
		    	 redirect(base_url().'theatrelocations');
		    }
		}
		   
		}
		 
		$this->load->view('template', $template);
	}
	public function delete_location(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Theatrelocation_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Locations deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'theatrelocations');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Locations not deleted ','class' => 'danger'));
		    		  redirect(base_url().'theatrelocations');	
		    	}

		$this->load->view('template', $template);
	}

	public function index(){
			$template['page'] = "theatrelocations/list";
		$template['page_title'] = "View Locations";
		$template['list'] = $this->Theatrelocation_model->view();
		$this->load->view('template', $template);
	}

}
