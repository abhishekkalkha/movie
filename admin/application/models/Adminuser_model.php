<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminuser_model extends CI_Model {

	function get_usertype(){

		return $query = $this->db->where('status','1')->get('tbz_usertypes')->result();
	}

	function adduser($data){
		//print_r($data['password']);
		$data['password'] = md5($data['password']);
		$this->db->insert('tbz_admin',$data);
	}

	function get_data(){
		$this->db->select('tbz_admin.name,tbz_admin.id,tbz_admin.email,tbz_admin.phone,tbz_usertypes.name as usertypes');
		$this->db->from('tbz_usertypes');
		$this->db->join('tbz_admin','tbz_admin.user_type=tbz_usertypes.id');
		$this->db->where('tbz_admin.status',1);
		$this->db->group_by('tbz_admin.id');
		return $query = $this->db->get()->result();
	}
	function get_details($id){
		$this->db->where('id',$id);
		return $query = $this->db->get('tbz_admin')->row();
	}
	function update_data($data,$id){
		$this->db->where('id',$id);
		$this->db->update('tbz_admin',$data);
	}
	function delete($id){
		$data = array('status'=>'0');
		$this->db->where('id',$id);
      $this->db->update('tbz_admin',$data);
      return "success";
	}
	function get_email($email){
		$this->db->where('status','1');
		$this->db->where('email',$email);
		$query = $this->db->get('tbz_admin');
		return $query ->row();
	}


}
