  <?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->model('Customer_model');
		if(!$this->session->userdata('backend_logged_in')) { 
			redirect(base_url().'login/index');
		 }
 	}
	public function index()
	{
		
		$results= $this->Customer_model->get_data();
		$new_result = array();
          foreach ($results as $result) {
            $a = $result->rate;
             $percentage = ($a /5)*100;
            $result->rates = $percentage;
            $new_result[] = $result;

          }
            $template['data'] = $new_result;

        $this->load->view('templates/header-script');
		$this->load->view('templates/header');
		$this->load->view('templates/left-menu');
		$this->load->view('templates/welcome',$template);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer-script');
		

	}
	public function chart(){
	$result= $this->Customer_model->get_film();
	echo $result;
	}
    
    public function my404(){
    	$this->load->view('error_404');
    }
	
}
