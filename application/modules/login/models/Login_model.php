<?php
class Login_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

/* SIGN IN
########################################################
--------------------------------------------------------*/ 	
	function signin($request) {
		
		$select_data = "*";
	    $table = "tbz_users";
		$this->db->select($select_data);
		$this->db->where('BINARY(email)', $request->email);
		$this->db->where('BINARY(password)',  md5($request->password));
		$query  = $this->db->get($table); 
		//echo $this->db->last_query(); //--- Table name = User
		$result = $query->row(); 
	
		if(count($result) > 0){ // user credential is success
            $sess_array = array();
			$sess_array = array(
			    'id' => $result->id,
			    'email' => $result->email,
			    'first_name'=> $result->first_name,
			    'last_name'=>$result->last_name,
			    'phone'=> $result->phone,
				'image'=> $result->image,
				'id'=> $result->id
		    );
			$this->session->set_userdata('logged_in',$sess_array);
			$user = $this->session->userdata('logged_in');	
            
          return $sess_array;	

		}else{
		  return false;
		}
	}

/* DEFAULT
########################################################
--------------------------------------------------------*/	
	function get_table_where($select_data, $where_data,$table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		$query  = $this->db->get($table);  //--- Table name = User
		$result = $query->result_array(); 
		return $result;	
    }

/* SIGN UP
########################################################
--------------------------------------------------------*/ 
    function is_email_exists($email){ 
		/* function return
			---------------------------------	 
			'true'   if user exist
			'false'  if user does not exist
		*/
			
		$select_data = "*"; 
		$where_data = array('email' => $email);
		$table = "tbz_users"; 
		$result = $this->get_table_where($select_data,$where_data,$table );
		if(count($result) > 0 ){ // check if user exist or not
			return true;
		}
			
	  return false;
	} 	
    function signup($request){
		
		$table = 'tbz_users';
		$request->password=md5($request->password);
		
		$this->db->insert($table, $request);
		$insert_id = $this->db->insert_id();
        $where_data = array('id'=> $insert_id);
		$select_data="*";
		$result = $this->get_table_where( $select_data, $where_data, $table );
		
       return $result[0];
		
	}	
	
	
	
	function forgetpassword($email){
         $this->db->where('email',$email);
         $query=$this->db->get('tbz_users');	
        //echo $this->db->last_query();	
         $query=$query->row();
	 $settings = get_icon();
	
         if($query)
         {         
           $username=$query->first_name;
           $from_email=$settings->admin_email;          
           $this->load->helper('string');
           $rand_pwd= random_string('alnum', 8);
           $password= array('password'=>md5($rand_pwd));
          // $password=array('password'=>$rand_pwd);                 
           $this->db->where('email',$email);
           $query=$this->db->update('tbz_users',$password);         
               if($query)
               {
               	 $this->load->library('email');
				   /*$configs = array(
						'protocol'=>'smtp',
						'smtp_host'=>$settings->smtp_host,
						'smtp_user'=>$settings->smtp_username,
						'smtp_pass'=>$settings->smtp_password,
						'smtp_port'=>'587'
						); 
						           */
$config = Array(
                'protocol' => 'smtp',
                'smtp_host' =>$settings->smtp_host,
                'smtp_port' => 587,
                'smtp_user' => $settings->smtp_username, // change it to yours
                'smtp_pass' => $settings->smtp_password, // change it to yours
                'smtp_timeout'=>20,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
                );
               
	        $this->email->initialize($config);
                $this->email->from($settings->smtp_username, $username);
                $this->email->to($email);
                $this->email->subject('Forget Password');
                $this->email->message('New Password is '.$rand_pwd.' ');
               if($this->email->send()) {        
                  return "EmailSend";
                  }
                  else
                  {
                  return "error";
                  }
                  }
           }
           else
           {
               return "EmailNotExist";
           }

         

    } 	
}