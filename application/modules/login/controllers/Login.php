<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        check_installer();
        $this->load->model('Login_model','login'); 
    }
	
/* SIGN IN
########################################################
--------------------------------------------------------*/ 	
	public function signin(){
		
		$data = json_decode(file_get_contents("php://input"));
        $result = $this->login->signin($data);
         
        if($result!=false){
			$finresult[] = array( 'status'  => 'success','message' =>'Successfully Login', 'code'    => 'success','result'=>$result);
		}else{
			$finresult[] = array( 'status'  => 'failed','message' => 'Unknown Credential , please try again!', 'code' => 'Login failed');			
		}

		print json_encode($finresult);

	}


	public function get_user_info(){
		
		$sessionData = $this->session->userdata('logged_in');
	    $session_id = $sessionData['id'];
		
		$this->db->select('*');
	    $this->db->where('id', '$session_id');
	    $query = $this->db->get('tbz_users');
	    $result = $query->row();
		
		if($result){
			$result->status = 'success';			
		} else {
			$result = array();
		}

		print json_encode($result);

	}

/* SIGN UP
########################################################
--------------------------------------------------------*/ 	
	public function signup(){
		
		$data = json_decode(file_get_contents("php://input"));
	    $user_status = $this->login->is_email_exists($data->email);
				
			if($user_status){ //CHECK MAIL ID OR USER NAME EXIST
				if($user_status){
					$error_list = array('message' => 'Email Already in Use');
				}
					$string="";
					foreach($error_list as $key=>$value){
					   $string .= $value;
				    }
					$finresult = array( 
									'status'  => 'failed',
									'message' => $string,
									'code'    => 'exists'
								    );
					
				print json_encode($finresult);
			}else{
				
			    $finresults=$this->login->signup($data);
			    $sess_array = array();
				$sess_array = array(
							    'id' => $finresults['id'],
							    'email' => $finresults['email'],
							    'first_name'=> $finresults['first_name'],
							    'phone'=> $finresults['phone'],
							    'image'=> $finresults['image'], 
							    'id'=> $finresults['id'], 
			                   );
				$this->session->set_userdata('logged_in',$sess_array);
			    $result = array( 'status'  => 'success','message' => 'Successfully registered','code'    => 'registered');
			    print json_encode( $result );
		    }
	}

/* SIGN OUT
########################################################
--------------------------------------------------------*/ 
	public function logout(){
       $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }


public function Forget_Password()
		{
		
		$template['page_title'] ="ticketbazzar"; 
	$template['page'] ="header";

		 $request = file_get_contents("php://input");
         $data = json_decode($request);

			if (isset($_POST))
			{
			
			
         $email = $this->input->post('email');

           $result=$this->login->forgetpassword($email);
          // print_r($result);
           if($result=="EmailSend")
           {
              echo "loggedIn";
			   
           }

           else if($result=="EmailNotExist")
           {
               
			   echo "No";
           } 
		}
		else
		{
           $this->load->view('template',$template);
		}		
		}

		public function session_check(){
			$sessionData = $this->session->userdata('logged_in');
			if(!empty($sessionData)){
				$result = array('status'=>'success','result'=>$sessionData);
			} else {
				$result = array('status'=>'error','result'=>'');
			}
			print json_encode($result); 	
		}
			
	

    	
	
}










