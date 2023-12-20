<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertype_model extends CI_Model {

	public function add_role($data){
		$this->db->insert('tbz_usertypes',$data);
 	}
 	 public function view(){
 	 	$this->db->where('status','1');
 	 	$query = $this->db->get('tbz_usertypes');
 	 	return $list = $query->result();
 	 }

 	 public function get_data($id){
 	 	$this->db->where('id',$id);
       $query = $this->db->get('tbz_usertypes');
       return $data = $query->row();
 	 }

 	 public function edit($id,$data){
 	 	$this->db->where('id',$id);
 	 	$this->db->update('tbz_usertypes',$data);
 	 }

 	 public function delete($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_usertypes',$data);
 	 	//echo $this->db->last_query();
 	 	return "success";
	}
}
