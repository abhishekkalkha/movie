<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movietheatres_model extends CI_Model {

     public function get_movies(){
                 
   	     return $query = $this->db->get('tbz_movies')->result();
     }
      public function get_theatres(){
                 $this->db->where('status','1');
         return $query = $this->db->get('tbz_theater_details')->result();
     }
     public function get_data($id){
     	$this->db->where('id',$id);
     	return $query = $this->db->get('tbz_movies_to_theatres')->row();
     }
     public function edit($id,$data){
                $array = $data['theatre_id'];
        $comma_separated = implode(",", $array);
        $data['theatre_id'] = $comma_separated;
     	$this->db->where('id',$id);
       $this->db->update('tbz_movies_to_theatres',$data);
     }
     public function delete($id){
     	$data = array('status'=>'0');
     	$this->db->where('id',$id);
       $this->db->update('tbz_movies_to_theatres',$data);
       return "success";
     }

     public function view(){

        $res =  $this->db->query('select `tbz_movies`.`movie_name`,`tbz_movies_to_theatres`.`id`,group_concat(`tbz_theater_details`.`theater_name` SEPARATOR ", ") as `theater_name` from `tbz_movies_to_theatres` join `tbz_theater_details` on find_in_set(`tbz_theater_details`.`id`,`tbz_movies_to_theatres`.`theatre_id`) join `tbz_movies` on `tbz_movies`.`id`=`tbz_movies_to_theatres`.`movie_id` where `tbz_movies_to_theatres`.`status`="1" group by `tbz_movies_to_theatres`.`id` ');

       return $res->result();
     }

     public function add_movies_theatres($data){

        $array = $data['theatre_id'];
        $comma_separated = implode(",", $array);
        $data['theatre_id'] = $comma_separated;
        $this->db->insert('tbz_movies_to_theatres',$data);
     }
 
   
	}
