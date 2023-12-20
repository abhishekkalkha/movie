<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode_model extends CI_Model {

     public function add_promocode($data){

   	     $this->db->insert('tbz_promocode',$data);
     }

     public function view(){
     	$this->db->where('status!=','0');
     	return $query = $this->db->get('tbz_promocode')->result();
     }
     public function get_promocode($id){
     	$this->db->where('id',$id);
     	$query = $this->db->get('tbz_promocode');
     	return $query->row();
     }

     public function update_Promocode($id,$data){
     	$this->db->where('id',$id);
     	$this->db->update('tbz_promocode',$data);
     }
     
     public function get_promocode_data($data,$id){
          $this->db->where('id !=',$id);
          $this->db->where('promocode_type',$data['promocode_type']);
          $this->db->where('promocode',$data['promocode']);
          return $query = $this->db->get('tbz_promocode')->row();
     }
     public function delete($id){
     	$data = array('status'=>'0');
     	$this->db->where('id',$id);
     	$this->db->update('tbz_promocode',$data);
     		return "success";

     }

	}
