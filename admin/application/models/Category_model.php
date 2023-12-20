<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function add_category($data){
		$result = array('name'=>$data['name']
			            );
		$this->db->insert('tbz_category',$result);
 	}
 	 public function view(){
 	 	$this->db->where('status','1');
 	 	$query = $this->db->get('tbz_category');
 	 	//echo $this->db->last_query();
 	 	return $list = $query->result();
 	 }

 	 public function get_data($id){
 	 	$this->db->where('id',$id);
       $query = $this->db->get('tbz_category');
       return $data = $query->row();
 	 }

 	 public function edit($id,$data){
 	 	$this->db->where('id',$id);
 	 	$this->db->update('tbz_category',$data);
 	 }

 	 public function delete($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_category',$data);
 	 	//echo $this->db->last_query();
 	 	return "success";
	}
}
