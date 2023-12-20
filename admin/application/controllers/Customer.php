<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Customer_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			$r = check_access($class,$method);
			//echo $r;
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		 }
		
	public function customer_list()
	{
      
		$template['page'] = "customer/customer_list";
		$template['page_title'] = "Customers";
		 $template['list'] = $this->Customer_model->customer_list();
		
		$this->load->view('template', $template);
	}

}
