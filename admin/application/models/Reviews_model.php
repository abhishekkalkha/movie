<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends CI_Model {

	public function review_list(){
		$this->db->select('tbz_reviews.title,tbz_reviews.comments,tbz_reviews.rate,CONCAT(tbz_users.first_name," ",tbz_users.last_name) AS name,tbz_movies.movie_name,tbz_reviews.status,tbz_reviews.id');
		$this->db->from('tbz_reviews');
		$this->db->join('tbz_users','tbz_users.id=tbz_reviews.user_id','left');
		$this->db->join('tbz_movies','tbz_movies.id=tbz_reviews.movie','left');

		$query = $this->db->get();
		return $query->result();
 	}


 	 public function update_status($id){
 	 	$data = array('status'=>'1');
 	 	$this->db->where('id',$id);
 	 	$this->db->update('tbz_reviews',$data);
 	 	return "success";
 	 }

 	 public function enable_status($id){
 	 	$data = array('status'=>'0');
 	 $this->db->where('id',$id);
 	 	$result = $this->db->update('tbz_reviews',$data);
 	 	//echo $this->db->last_query();
 	 	return "success";
	}
}
