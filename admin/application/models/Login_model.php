<?php
class Login_model extends CI_Model

	{
	public

	function _consruct()
		{
		parent::_construct();
		}

	function Admin_login($username, $password)
		{
		$this->db->select('*');
		$this->db->from('tbz_admin');
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		$this->db->where('status!=',0);
		//$this->db->limit(1);
		$query = $this->db->get();
           //echo $this->db->last_query();
		  if ($query->num_rows() == 1)
		  {
			$result = $query->row();
			if($result->user_type == 1){
			$result->super_admin = 1;
			return $result;
		    }else{
		    	$result->super_admin = 0;
		    	return $result;
		    }
		  }
		  else{
		  	return false;
		  }
			}

		public function role(){
			$user1 = $this->session->userdata('user_type');	
		 
			$this->db->select('tbz_admin.user_type as rolename,A.role_id,A.page_id as pages');
			$this->db->from('tbz_admin');
			$this->db->join('tbz_role_permission A', ' tbz_admin.user_type = A.role_id');
			$this->db->where('tbz_admin.user_type',$user1);
			$query1 = $this->db->get();
			foreach($query1->result_array() as $row1){
				$this->session->set_userdata('permission',$row1['pages']);
			}
			 $user2 = $this->session->userdata('permission');
			 //print_r($user2);exit();
			 	echo $user1;

		}

		public function settings(){
		   return $query = $this->db->get('tbz_settings')->row();
		}
	}
	?>