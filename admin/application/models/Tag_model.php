<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {
	 function __construct() {
        parent::__construct();
    }

    function tag_list(){
    	return $this->db->where('status','1')->order_by('tag_name','ASC')->get('tbz_tags')->result();
    }
    function add_tag($data){
    	$this->db->insert('tbz_tags',$data);
    }

    function edit_data($id){
    	$this->db->where('id',$id);
 	 	$query = $this->db->get('tbz_tags');
 	 	return $query->row();
    }
    function get_tag_details($data){
        $this->db->where('tag_name',$data['tag_name']);
        return $query = $this->db->get('tbz_tags')->row();

    }
    function edit($id,$data){
    	
    	$this->db->where('id',$id);
 	 	$this->db->update('tbz_tags',$data);
    }
     public function delete($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_tags',$data);
 	 	//echo $this->db->last_query();
 	 	return "success";
	}
}