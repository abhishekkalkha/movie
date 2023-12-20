<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
	public function customer_list(){
		$this->db->select('CONCAT(tbz_users.first_name," ",tbz_users.last_name) AS name,tbz_users.email,tbz_users.phone,tbz_users.status,tbz_users.gender,COUNT(tbz_booking_details.id) AS booking_count');
		$this->db->from('tbz_users');
		$this->db->join('tbz_booking_details','tbz_booking_details.user_id=tbz_users.id','left');
		$this->db->group_by('tbz_users.id');
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		return $list = $query->result(); 
	}

	public function edit_language($data){
		$result = array('name'=>$data['name']);
		$this->db->insert('tbz_language',$result);
 	}

 	public function get_data(){
 		$this->db->select('AVG(tbz_movie_rate.rate) as rate,tbz_movies.movie_name');
 		$this->db->from('tbz_movie_rate');
		$this->db->join('tbz_movies','tbz_movies.id=tbz_movie_rate.movie_id','left');
		$this->db->group_by('tbz_movie_rate.movie_id');
		$this->db->order_by('tbz_movie_rate.movie_id','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result(); 

 	}
 	public function get_film(){
 		 //$date = date("Y-m-d");
 		$this->db->select('SUM(tbz_booking_details.no_ticket) as sum,date');
 		$this->db->from('tbz_booking_details');
 		$this->db->group_by('tbz_booking_details.date');
 		$query = $this->db->get()->result();
 		//echo $this->db->last_query();
 		$result = array();
 		foreach($query as $value){
 			$value = (array)$value;
 		   $result[] = array(date('Y-m-d',strtotime($value['date'])),$value['sum']);
 		}

         return json_encode($result);
 	}
	}
