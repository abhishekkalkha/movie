<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (isset($_SERVER['HTTP_ORIGIN'])) {



       header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");



       header('Access-Control-Allow-Credentials: true');



       header('Access-Control-Max-Age: 86400');    // cache for 1 day



   }





    // Access-Control headers are received during OPTIONS requests



    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {





        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))



            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");        





        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))



            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");





        exit(0);



    }

class Auth extends MY_Controller {



    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->library('session');

        $this->load->model('auth/Auth_model');

		$this->_authcontainer = $this->config->item('ci_my_admin_template_dir_auth') . "layout.php";

        // $loggeduser = $this->session->userdata('loggeduser');

        //     if(isset($loggeduser) && $loggeduser->user_type==3){

        //         redirect(base_url().'admin/manager');

        //     }

        //     if(isset($loggeduser) && $loggeduser->user_type==1){

        //         redirect(base_url().'admin');

        //     }

    }



    function index() {

    	//echo 'arun';
        $data['page'] = $this->config->item('ci_my_admin_template_dir_auth') . "login_form";

        $data['module'] = 'auth';

        $this->load->view($this->_authcontainer, $data);

    }

    function act_login(){

    	//echo $response = $this->auth_model->act_login($this->input->get());

		//$data = json_decode(file_get_contents("php://input"));

		$data = $_GET;

		

		

		        $resulttitle = $this->Auth_model->settings_view();

				$sess_arrays = array(

				'title' => $resulttitle->title

				);

				$this->session->set_userdata('title', $sess_arrays);

				

				

    	echo $response = $this->Auth_model->act_login($data);

    }

	function act_user_login(){

    	//echo $response = $this->auth_model->act_login($this->input->get());

		$data = json_decode(file_get_contents("php://input"));

    	echo $response = $this->Auth_model->act_user_login($data);

    }

    function act_register(){

        //echo $response = $this->auth_model->act_register($this->input->get());

		$data = json_decode(file_get_contents("php://input"));

        echo $response = $this->Auth_model->act_register($data);

    }

    function logout(){

        $array_items = array('loggeduser', 'loggeduserid');



        $this->session->unset_userdata($array_items);

        redirect(base_url().'auth');

    }

	



	// public function signup(){

		// $data = $_POST;

		// unset($data['cpassword']);

		// $fdata = array('first_name' => $data['first_name'],'last_name' => $data['last_name'],'email' => $data['email'],

		// 'password' => $data['password']);

		// echo $response = $this->auth_model->signup($fdata);

		

	// }

	// public function myaccount(){

		// $data['page'] = $this->config->item('ci_my_admin_template_dir_public') . "myaccount";

        // $data['module'] = 'auth';

        // $this->load->view($this->_container, $data);

	// }

	// public function signin(){

		// $response = $this->auth_model->signin();

	// }

	// function signout(){

		// $this->session->unset_userdata('user');

		// redirect('Home/index');

	// }

	// function forgetpassword() {

		// $data = $_POST;

		// $email = $data['user'];

		// if(isset($email)){

			// $password = $this->auth_model->get_password($email);

		// }else{

			// return false;

		// }

		// $config = Array(

			  // 'protocol' => 'smtp',

			  // 'smtp_host' => 'ssl://mail.callmycab.in',

			  // 'smtp_port' => 465,

			  // 'smtp_user' => 'no-reply@callmycab.in', // change it to yours

			  // 'smtp_pass' => 'Golden_reply', // change it to yours

			  // 'mailtype' => 'html',

			  // 'charset' => 'iso-8859-1',

			  // 'wordwrap' => TRUE

		// );



		// $message = 'You have requested the new password, Here is the new password:'. $password;

		// $this->load->library('email', $config);

		// //$this->email->initialize($config);

		// $this->email->set_newline("\r\n");

		// $this->email->from('mail2jasir.ka@gmail.com'); // change it to yours

		// $this->email->to($email);// change it to yours

		// $this->email->subject('Password reset');

		// $this->email->message($message);



		// if($this->email->send()){     

			   // return true;

		// } 

		// else{

				// return false;

			// }

	// }

}

