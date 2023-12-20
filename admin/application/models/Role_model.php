<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

	public function add_role($data){
		$result = array('role_name'=>$data['role_name'],
			            );
		$this->db->insert('tbz_role',$result);
 	}
 	 public function view(){
 	 	$this->db->where('status','1');
 	 	$query = $this->db->get('tbz_role');
 	 	return $list = $query->result();
 	 }

 	 public function get_data($id){
 	 	$this->db->where('id',$id);
       $query = $this->db->get('tbz_role');
       return $data = $query->row();
 	 }

 	 public function edit($id,$data){
 	 	$this->db->where('id',$id);
 	 	$this->db->update('tbz_role',$data);
 	 }

 	 public function delete($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_role',$data);
 	 	//echo $this->db->last_query();
 	 	return "success";
	}

	public function get_role_fulldetails($data){
		$this->db->where('role_name',$data['role_name']);
		$this->db->get('tbz_role');
	}
}
