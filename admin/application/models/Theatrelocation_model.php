<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theatrelocation_model extends CI_Model {

     public function add_Locations($data){

   	     $this->db->insert('tbz_location',$data);
     }
     public function get_data($id){
     	$this->db->where('id',$id);
     	return $query = $this->db->get('tbz_location')->row();
     }
     public function edit($id,$data){
     	$this->db->where('id',$id);
       $this->db->update('tbz_location',$data);
     }
     public function delete($id){
     	$data = array('status'=>'0');
     	$this->db->where('id',$id);
       $this->db->update('tbz_location',$data);
       return "success";
     }

     public function view(){
     	$this->db->where('status','1');
     	return $query = $this->db->get('tbz_location')->result();
     }
     public function get_location_details($data){
        $this->db->where('location',$data['location']);
       return $query = $this->db->get('tbz_location')->row();
     }
 
   
	}
