<?php
class Home_model extends CI_Model {

    function __construct(){
        
        parent::__construct();
    }

/* DEFAULT
########################################################
--------------------------------------------------------*/    
    function get_table_where($select_data,$where_data,$table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		$query  = $this->db->get($table);  //--- Table name = User
		$result = $query->result_array(); 
		
		return $result;	
    }

/* TOP TRENDING
########################################################
--------------------------------------------------------*/ 	
	function get_topmovie_details(){
		
		$query = $this->db->get('tbz_movies'); 
        return $query->result();
    }

    function count_movie_rate($data){
		 
		 $where_data = array('movie'=> $data);
		 $select_data="*";
		 $result = $this->get_table_where($select_data,$where_data,"tbz_reviews");
		
		return count($result);
	}
	function movie_rate($data){
		 
		$this->db->select("ROUND(AVG(rate)) as rating");
		$this->db->from('tbz_reviews');
		$this->db->where('movie',$data);
		$query = $this->db->get();
		$result = $query->row();

        return $result->rating;
	} 

/* SEARCH MOVIE LIST
########################################################
--------------------------------------------------------*/	

	function searchmovieList($data){
		
		$this->db->select("id,movie_name");
		$this->db->from('tbz_movies');
		$this->db->like('movie_name',$data['search_word']);
		$query = $this->db->get();
		$result = $query->result();
        
        return $result;
       
	}
/* SEARCH CITY
########################################################
--------------------------------------------------------*/
    function getcity($data){
		 		 
		$this->db->select("id,location");
		$this->db->from('tbz_location');
		$this->db->where('status',1);
		$this->db->like('location',$data['search_word']);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}

/* TRAILERS-now showing
########################################################
--------------------------------------------------------*/
	function getTrailerNowshowing($data){
		
		$date = date('Y-m-d');
		$this->db->select('tbz_show_details.id as id, tbz_movies.id as movie_id, tbz_movies.movie_name, tbz_language.name, tbz_movies.image, tbz_movies.trailer, tbz_language.id as language');
		$this->db->from('tbz_show_details as tbz_show_details');
		$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id','left');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
	    $this->db->where('tbz_show_details.date >',$date);
		$this->db->group_by('tbz_movies.id');
		$query = $this->db->get();
		$result = $query->result();
        
        return $result;
	}

/* TRAILERS-coming soon
########################################################
--------------------------------------------------------*/	
	function getTrailerCommingsoon(){
		
		$date = date("Y-m-d");
		$this->db->select('tbz_movies.id as id, tbz_movies.movie_name, tbz_language.name, tbz_movies.image, tbz_tags.tag_name, tbz_movies.trailer, tbz_language.id as language');
		$this->db->from('tbz_movies as tbz_movies');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
		$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		$this->db->where('tbz_movies.release_date > ',$date);
		$query = $this->db->get();
		$result = $query->result();
         
         return $result;
	}


/******* GET TRAILERS videos and Language Filter*******/	
	function trailers_filter()
	     { 
	     	  $this->db->where('status',1);
			  $query = $this->db->get('tbz_language'); 

              return $query->result();
	     }

	     function get_image(){
    	$this->db->select('banner_images');
     $this->db->limit(5,0);
    	$this->db->order_by('id',"DESC");
    	$this->db->where('status','1');
    	$query = $this->db->get('tbz_banners')->result();
        return $query;
    }
		    
	
}