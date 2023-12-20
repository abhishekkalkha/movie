<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookingdetails extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Booking_model');
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
		
	public function index(){

		$template['page'] = "bookingdetails/create";
		$template['page_title'] = "View Booking details";
		$template['list'] = $this->Booking_model->get_film_details();
		 $this->load->view('template', $template);

	}

	public function get_data(){
			$template['page'] = "bookingdetails/getdata";
		$template['page_title'] = "Get data";
		/* $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} */
		 $movieid = $this->uri->segment(3); 
		 $theatreid = $this->uri->segment(4); 
		 $template['list'] = $this->Booking_model->get_film_data($movieid,$theatreid);
		 /*$a=0;
		          for($i = 0;$i < count($template['list']); $i++)
		           {
		             	$a = $a +$template['list'][$i]->amount;
              
		            }
                       $template['lists']=$a;*/

		  $this->load->view('template', $template);
	}

	public function get_userdata(){
		
		$template['list'] = $this->Booking_model->get_usersdata($_POST['id']);
		$template['currency'] = $this->Booking_model->get_currency();

             if($template['list'] == ''){
             	exit();
             }
             else{
                    $a=0;
		          for($i = 0;$i < count($template['list']); $i++)
		           {
		             	$a = $a +$template['list'][$i]->amount;
              
		            }
		            $template['lists'] = new StdClass;
                       $template['lists']->total=$a;

             		$this->load->view('bookingdetails/modal',$template);
             }
	
	}

}
