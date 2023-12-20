<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
 public function data(){
 	$query = $this->db->get('tbz_countries');
 	return $query->result();
 }

 public function add_settings($data){
 	//print_r($data);
 	$array = $data['payment_options'];
		$comma_separated = implode(",", $array);
		$data['payment_options'] = $comma_separated;
        $this->db->update('tbz_settings',$data);

 }

 public function get_data(){
 	$query = $this->db->get('tbz_settings');
 	return $data = $query->row();
 }

 public function get_admin_data(){
 	$query = $this->db->get('tbz_admin');
 	return $data = $query->row();
 }
	
}
