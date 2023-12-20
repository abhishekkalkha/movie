<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners_model extends CI_Model {

	public function insert_banners($data){
		$datas = array('banner_images'=>$data['banner_images'],
		               'status'=>'1'
		              );
		$this->db->insert('tbz_banners',$datas);
	}

	public function get_images(){
		$this->db->where('status','1');
	 return $query = $this->db->get('tbz_banners')->result();
	}

	public function delete_image($id){
	$data = array('status'=>'0');
	$this->db->where('id',$id);
	$this->db->update('tbz_banners',$data);
	return "success";

	}
}
