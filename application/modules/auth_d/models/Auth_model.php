<?php
class Auth_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function act_login($data){
    	$where = json_decode($data['data'],true);
    	$where['password'] = md5($where['password']);
    	$table=$data['table_name'];
    	//return ($this->db->get_where($table,$where))? '{"status":true}' : '{"status":false}';
    	if(($this->db->get_where($table,$where))){
    		$array = $this->db->get_where($table,$where)->row();
            // print_r($array);
    		$this->session->set_userdata('loggeduser',$array);
            $this->session->set_userdata('loggeduserid',$array->id);
			$this->session->set_userdata('image',$array->image);
			
	
            return '{"status":true,"user_type":"'.$array->user_type.'"}';
    	 }else{
            return '{"status":false}';
    	}
    	
    }
	public function act_user_login($data){
		
		//$data = json_decode(file_get_contents("php://input"),true);
		$email = $data->data->username;
		$pass = md5($data->data->password);
		
		$table = 'tbz_users';
		$qry_em = $this->db->query('select count(*) as cnt from tbz_users where email ="' . $email . '" and 
									password ="' . $pass . '"');
		$qry_res = $qry_em->row();
		

				
		$count = $qry_res->cnt;
		
		if ($count == 0) {
			$arr = array('status' => "false", 'error1' => 'Invalid username or password');
			$jsn = json_encode($arr);
			return $jsn;
		} else {
				$this->db->where('email',$email);
				$qry = $this->db->get('tbz_users');
				$row = $qry->row();
				$id = $row->id;
				$utype = $row->user_type;
				$where = array('email' => $email);
				if($utype == '1'){
					
					$udata = $this->db->get_where($table,$where)->row();
					$this->session->set_userdata('loggedstatus',$udata);
					//$this->session->set_userdata('loggeduserid',$id);
					$data = $this->session->userdata('udata');
					$arr = array('status' => true,'user_type' => $utype,'error1' => '');
					$jsn = json_encode($arr);
					return $jsn;
				}
				else if($utype == '3'){
					$udata = array('id' => $id,'user' => $email,'user_type' => $utype);
					$this->session->set_userdata('loggedstatus',$udata);
					//$this->session->set_userdata('loggeduserid',$id);
					$arr = array('status' => true,'user_type' => $utype, 'error1' => '');
					$jsn = json_encode($arr);
					return $jsn;
				}
				else{
					$udata = $this->db->get_where($table,$where)->row();
					$this->session->set_userdata('loggedstatus',$udata);
					//$this->session->set_userdata('loggeduserid',$id);
					$arr = array('status' => true,'user_type' => $utype,'error1' => '');
					$jsn = json_encode($arr);
					return $jsn;
				}
				
			} 	
    }
	public function act_register($data){
		$fname = $data->first_name;
		$lname = $data->last_name;
		$email = $data->email;
		$image = $data->image;
		$pass = md5($data->password);
		
		$qry_em = $this->db->query('select count(*) as cnt from tbz_users where email ="' . $email . '"');
		$qry_res = $qry_em->row();
		$count = $qry_res->cnt;
		$reg_data = array('first_name' => $fname,'last_name' => $lname,'email' => $email,'password' => $pass,'user_type' => 2);
		if ($count = 0) {
			$qry = $this->db->insert('tbz_users',$reg_data);
				
				$udata = array('user' => $email,'utype' => 'user');
				$this->session->set_userdata('logged_user',$udata);
				//$this->session->set_userdata('profile_pic',$array->profile_picture);
				//$data = $this->session->userdata('udata');
				
			if ($qry>0) {
				$arr = array('msg' => "User Created Successfully!!!", 'error' => '' );
				$jsn = json_encode($arr);
				return $jsn;
			} else {
				$arr = array('msg' => "", 'error' => 'Error In inserting record');
				$jsn = json_encode($arr);
				return $jsn;
			}
		} else {
			$arr = array('msg' => "", 'error' => 'User Already exists with same email id');
			$jsn = json_encode($arr);
			return $jsn;
		}
    }
	/*
    public function act_login($data){
    	
    	$where = json_decode($data['data'],true);
    	$where['password'] = md5($where['password']);
    	$table=$data['table_name'];
    	//return ($this->db->get_where($table,$where))? '{"status":true}' : '{"status":false}';
    	if(($this->db->get_where($table,$where))){
    		$array = $this->db->get_where($table,$where)->row();
            // print_r($array);
    		$this->session->set_userdata('loggeduser',$array);
            $this->session->set_userdata('loggeduserid',$array->id);
            // echo $data = $this->session->userdata('loggeduserid');
            // print_r($this->session->userdata('loggeduser'));
            // print_r($array);
            // die();
            return '{"status":true,"user_type":"'.$array->user_type.'"}';
    	}else{
            return '{"status":false}';
    	}
    	
    }
	
    public function act_register($data){
        $sql_data = json_decode($data['data'],true);
        $email = $sql_data['email'];
        $sql_data['password'] = md5($sql_data['password']);
        $table_name = $data['table_name'];
        $query = $this->db->get_where($table_name,array('email'=>$email));
        $arr = $query->row();
        if(count($arr)==0){
            $this->db->insert($table_name,$sql_data);
            $this->session->set_userdata('loggeduserid',$this->db->insert_id());
            $array = $this->db->get_where($table_name,array('id'=>$this->db->insert_id()))->row();
            $this->session->set_userdata('loggeduser',$array);
            return '{"status":true,"user_type":"'.$sql_data["user_type"].'"}';
        }else{
            return '{"status":false,"msg":"Mail-id already exist"}';
        }
    }
	*/
	public function signup($fdata){
		return ($this->db->insert('tbz_users', $fdata)) ? '{"status":true,"msg":"Successfully Inserted ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
	}
	public function signin(){
		$user = $_POST['username'];
		$pass = md5($_POST['password']);

		$pdata = array('email' => $user,'password' => $pass);
		$query = $this->db->get_where('tbz_users',$pdata);
		$count = count($query->result());
		if($count == 0){
			echo "false";
		}else {
			$result = $query->result();
			$this->session->set_userdata('logged_user',$result);
			echo  "true";
		}
	}
	public function get_password($email){
		$this->db->where('email',$email);
		$query = $this->db->get('tbz_users');
		$row = $query->row();
		return $row->password;
	}
	
	
	  function settings_view(){
		 
		  $query = $this->db->query(" SELECT * FROM `tbz_settings` order by id DESC ")->row();
		  return $query ;
	 }


}
?>