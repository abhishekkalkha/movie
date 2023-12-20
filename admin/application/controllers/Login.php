<?php
@ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

public

	function __construct()
	
		{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		if ($this->session->userdata('super_admin'))
			{
			redirect(base_url() . 'welcome');
			}

		$this->load->helper(array(
			'form'
		));
		$this->load->model('login_model');
		}
	public function index()
	{
		$template['page_title'] = "Login";
		if (isset($_POST))
			{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
			if ($this->form_validation->run() == TRUE)
				{
				redirect(base_url() . 'welcome');
				}
			}
		$this->load->view('login_form.php');
	}

	function check_database($password)
		{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->login_model->Admin_login($username, md5($password));
		$setngs = $this->login_model->settings();
		if ($result)
			{
			$sess_array = array();
			$sess_array = array(
				'id' => $result->id,
				'user_type' => $result->user_type,
				'email' => $result->email,
				'password' => $result->password,
				'name' => $result->name,
				'phone' => $result->phone,
				'image' => $result->image,
                 'title'=>$setngs->title,
                 'title_short'=>$setngs->title_short
			);
			$this->session->set_userdata('super_admin', $result->super_admin);
			$this->session->set_userdata('backend_logged_in', $sess_array);
            $this->session->set_userdata('user_type', $result->user_type);
            $role = $this->login_model->role();
            if($role){
            	return TRUE;
            }
			return TRUE;
			}
		  else
			{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
			}
		}

	
}
