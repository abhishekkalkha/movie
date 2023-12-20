<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actor_model extends CI_Model {

	public function add_actor($data){

		$array = $data['role'];
		$comma_separated = implode(",", $array);
		$data['role'] = $comma_separated;

		if ($this->db->insert("tbz_actors", $data))
			{
			return true;
			}
 	}
 	public function get_role(){
 		$this->db->where('status',1);
 		$query = $this->db->get('tbz_role');
 		return $query->result();
 	}
 	 public function view(){	
      $res =  $this->db->query('select `tbz_actors`.`actors_name`,`tbz_actors`.`image`,
                               `tbz_actors`.`dob`,`tbz_actors`.`id`,`tbz_actors`.`description`, 
                               group_concat(`tbz_role`.`role_name` SEPARATOR ", ") as `role_name` from 
                               `tbz_actors` join `tbz_role` on find_in_set(`tbz_role`.`id`,`tbz_actors`.`role`) 
                               where `tbz_actors`.`status`="1" group by `tbz_actors`.`id` ');
       return $res->result();

 	 }

 	 public function get_data($id){
 	 	$this->db->where('id',$id);
       $query = $this->db->get('tbz_actors');
       return $data = $query->row();
 	 }

 	 public function update_actor($id,$data){
 	 	$array = $data['role'];
		$comma_separated = implode(",", $array);
		$data['role'] = $comma_separated;

 	 	$this->db->where('id',$id);
 	 	$this->db->update('tbz_actors',$data);
 	 }

 	 public function delete($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_actors',$data);
 	 	return "success";
	}
	public function get_actor_fulldetails($data,$id){
	    $this->db->where('id !=',$id);
		$this->db->where('actors_name',$data['actors_name']);
		return $query = $this->db->get('tbz_actors')->row();

	}
}
