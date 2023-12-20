<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

     public function get_film_details(){

   	    $this->db->select('tbz_movies.movie_name,tbz_theater_details.theater_name,tbz_movies_to_theatres.id,tbz_movies_to_theatres.movie_id,tbz_movies_to_theatres.theatre_id');
   	    $this->db->from('tbz_movies_to_theatres');
   	    $this->db->join('tbz_movies','tbz_movies.id=tbz_movies_to_theatres.movie_id','left');
   	    $this->db->join('tbz_theater_details','tbz_theater_details.id=tbz_movies_to_theatres.theatre_id','left');
   	    $this->db->where('tbz_movies_to_theatres.status',1);
   	    $this->db->group_by('tbz_movies_to_theatres.id');
   	    return $query = $this->db->get()->result();
        //echo $this->db->last_query();
     }
     
     public function get_film_data($movieid,$theatreid){
     	$this->db->select('screen_timing,date,screen_name,id');
     	$this->db->from('tbz_show_details');
     	$this->db->where('movie_name_id',$movieid);
     	$this->db->where('cinemas_id',$theatreid);
     	$query = $this->db->get();
     	return $query->result();
     }

     public function get_usersdata($id){
     	$this->db->select('CONCAT(tbz_users.first_name," ",tbz_users.last_name) AS name,tbz_booking_details.seat_no,tbz_booking_details.booking_id,tbz_booking_details.amount');
     	$this->db->from('tbz_booking_details');
     	$this->db->join('tbz_users','tbz_users.id=tbz_booking_details.user_id');
     	$this->db->where('tbz_booking_details.show_id',$id);
     	$query = $this->db->get();
     	return $query->result();
     }

     public function get_currency(){
      $this->db->select('tbz_countries.currrency_symbol');
      $this->db->from('tbz_settings');
      $this->db->join('tbz_countries','tbz_countries.name=tbz_settings.country');
      $this->db->group_by('tbz_settings.id');
      return $query = $this->db->get()->row();
     }
   
	}
