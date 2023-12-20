<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	public function view(){
		return $query = $this->db->get('tbz_admin')->row();
	}

	public function isEmailExist($id,$email){
		$this->db->select('*');
		$this->db->where('id !=', $id);
		$this->db->where('email', $email);
		$query = $this->db->get('tbz_admin');

		if ($query->num_rows() > 0)
			{
			return true;
			}
		  else
			{
			return false;
			}
	}

	public function Update_admin($data,$id){
		$this->db->where('id', $id);
		$result = $this->db->update('tbz_admin', $data);
		return "success";
	}
	public function update_admin_password($data,$id){
		$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['password_c']));
		$this->db->where("id", $id);
		$this->db->from("tbz_admin");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['password_n']);
			$this->db->where('id', $id);
			$result = $this->db->update('tbz_admin', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}
	}

		public

	function getadmin_all($id)
		{
		$this->db->select('*');
		$this->db->from('tbz_admin');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
		}

		public function Update_user($data,$id){
			$this->db->where('id', $id);
		$result = $this->db->update('tbz_admin', $data);
		return "success";

		}

		public function getuser_all($id){
			$this->db->select('*');
		$this->db->from('tbz_admin');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
		}
		public function update_user_password($data,$id){
			$this->db->select("count(*) as count");
		$this->db->where("password", md5($data['password_c']));
		$this->db->where("id", $id);
		$this->db->from("tbz_admin");
		$count = $this->db->get()->row();

		// var_dump($count);

		if ($count->count == 0)
			{
			return "notexist";
			}
		  else
			{
			$update_data['password'] = md5($data['password_n']);
			$this->db->where('id', $id);
			$result = $this->db->update('tbz_admin', $update_data);
			if ($result)
				{
				return true;
				}
			  else
				{
				return false;
				}
			}

		}

		public function settings(){
			return $query = $this->db->get('tbz_settings')->row();
		}
}
