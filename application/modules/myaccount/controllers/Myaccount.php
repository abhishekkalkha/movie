<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('Wallets_model'); 
        check_installer();
    }
	
    public function index(){
    	$user = $this->session->userdata('logged_in');

    	$data['user'] = $this->Wallets_model->edit_profiles($user['id']); 
    	$data['booking'] = $this->Wallets_model->get_bookdate_details($user['id']);

    	$this->load->view('template/header');
    	
		$this->load->view('myaccount',$data);

		$this->load->view('template/footer');
		
	}
	

    public function getbookedmovie(){

		
        print json_encode($result);
	}
	
	
    public function updateProfile(){
		$data = $_POST;
		//print_r($data);
		$user = $this->session->userdata('logged_in');
		$data['id']=$user['id'];

		$data['date_of_birth']= $data['year'].'-'.$data['month'].'-'.$data['day'];
		unset($data['year']);
		unset($data['month']);
		unset($data['day']);
		//print_r($data);
		$result = $this->Wallets_model->updateProfile($data);
		echo $result;
		  
	}
    
    public function changePassword(){
	
	//var_dump($_POST);
	$data = $_POST;
	$user = $this->session->userdata('logged_in');
	//print_r($user);
    $data['id']=$user['id'];
    //print_r($data);
	$result = $this->Wallets_model->changepassword($data);
    echo $result;
        
	}
}