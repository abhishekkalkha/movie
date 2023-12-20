<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie_model extends CI_Model {

	public function get_language(){
		$this->db->where('status','1');
		return $query = $this->db->get('tbz_language')->result();
	}
	public function get_tag(){
		$this->db->where('status','1');
		return $query = $this->db->get('tbz_tags')->result();
	}
	public function get_cast(){
		$this->db->where('status','1');
		return $query = $this->db->get('tbz_actors')->result();
	}
	public function get_format(){
		return $query = $this->db->get('tbz_format')->result();
	}

	public function add_movie($data){
		$array = $data['tag_id'];
		$comma_separated = implode(",", $array);
		$data['tag_id'] = $comma_separated;
		$array = $data['cast'];
		$comma_separated = implode(",", $array);
		$data['cast'] = $comma_separated;
		$a=explode("/",$data['release_date']);
         $data['release_date']=$a[2]."-".$a[0]."-".$a[1];
		$this->db->insert('tbz_movies',$data);

	}

	public function view(){
		$res = $this->db->query('select `tbz_movies`.`id`,`tbz_movies`.`movie_name`,`tbz_movies`.`certificate`,`tbz_movies`.`release_date`,`tbz_language`.`name`,`tbz_movies`.`id`,group_concat(DISTINCT `tbz_tags`.`tag_name` SEPARATOR ", ") as `tag_name`,group_concat(DISTINCT `tbz_actors`.`actors_name` SEPARATOR ", ") as `cast` from `tbz_movies` LEFT JOIN `tbz_language` on `tbz_language`.`id`=`tbz_movies`.`language` LEFT JOIN `tbz_tags` on FIND_IN_SET(`tbz_tags`.`id`,`tbz_movies`.`tag_id`) LEFT JOIN `tbz_actors` on FIND_IN_SET(`tbz_actors`.`id`,`tbz_movies`.`cast`) group by `tbz_movies`.`id` ORDER BY tbz_movies.id DESC');
			 return $res->result();
	}

	public function get_data($id){
		$this->db->where('id',$id);
		$query = $this->db->get('tbz_movies');
		return $query->row();
	}

	public function update_movie($id,$data){
		$array = $data['tag_id'];
		$comma_separated = implode(",", $array);
		$data['tag_id'] = $comma_separated;
		$array = $data['cast'];
		$comma_separated = implode(",", $array);
		$data['cast'] = $comma_separated;
		$a=explode("/",$data['release_date']);
         $data['release_date']=$a[2]."-".$a[0]."-".$a[1];
         $this->db->where('id',$id);
		$this->db->update('tbz_movies',$data);

	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('tbz_movies');
		return "success";
	}

	public function get_role(){
	  return $query = $this->db->get('tbz_role')->result();
	}

	public function get_actors(){
		$this->db->where('status','1');
		return $query = $this->db->get('tbz_actors')->result();
	}

	public function get_actors_by_id($id){
     	$query =$this->db->query("select * from tbz_actors where FIND_IN_SET('$id',role) and status='1'");
     	return $query->result();

	}

	public function get_role_by_id($id){
		$this->db->where('id',$id);
		  return $query = $this->db->get('tbz_role')->row();
	}

	public function get_pics($id){
		$this->db->where('movie',$id);
		return $query = $this->db->get('tbz_gallery')->result();
	}

	public function insert_images($data,$id){

		$datas = array('movie'=>$id,
		              'image'=>$data['image']);
		$this->db->insert('tbz_gallery',$datas);
	}

	public function delete_image($id){
		$this->db->where('id',$id);
		$query = $this->db->delete('tbz_gallery');
		return 1;
	}
}
