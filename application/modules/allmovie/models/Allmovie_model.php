<?php
class Allmovie_model extends CI_Model {

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
    function get_image(){
    	$this->db->select('banner_images');
     $this->db->limit(5,0);
    	$this->db->order_by('id',"DESC");
    	$this->db->where('status','1');
    	$query = $this->db->get('tbz_banners')->result();
        return $query;
    }

/* ALL MOVIE DETAILS
########################################################
--------------------------------------------------------*/  
       function allmoviesDetails($city){	
  
	/*	$date = date('Y-m-d');
		$this->db->select('tbz_movies.id,
			               tbz_movies.movie_name,
			               tbz_movies.image, 
			               tbz_movies.certificate,
			               tbz_movies.format,
		                   tbz_language.id as language,
		                   tbz_location.location, 
		                   tbz_language.name,
		                   ass.tag_name as select_tags,
						   GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",ass.tag_name)) SEPARATOR",") as select_tags');     
		$this->db->from('tbz_show_details');
		$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id','left');
		$this->db->join('tbz_language','tbz_language.id = tbz_show_details.language','left');
		//$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		$this->db->join('tbz_location','tbz_location.id = tbz_show_details.city_id','left');
		$this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
		$this->db->where('tbz_show_details.date',$date);
		$this->db->where('tbz_show_details.city_id',$city);
		$this->db->group_by('tbz_movies.id');	
		$query = $this->db->get();
		$result = $query->result();
        return $result;*/
		
		$date = date('Y-m-d');

		$query = $this->db->query("select tbz_movies.id,tbz_movies.language,tbz_movies.movie_name,
		                          tbz_movies.tag_id,tbz_movies.image,tbz_movies.certificate,
		                          tbz_movies.format,tbz_format.id as format_id,
		                          group_concat(DISTINCT `tbz_tags`.`tag_name` SEPARATOR ', ') as `tag_name` 
		                          from tbz_show_details LEFT join tbz_movies on tbz_movies.id = tbz_show_details.movie_name_id
				                   LEFT JOIN tbz_format on tbz_format.format_name = tbz_movies.format 
				                    LEFT JOIN tbz_tags on FIND_IN_SET(`tbz_tags`.`id`,`tbz_movies`.`tag_id`) 
								  LEFT JOIN tbz_theater_details on tbz_theater_details.id = tbz_show_details.cinemas_id
								   where tbz_show_details.date >= '$date' and tbz_theater_details.city = '$city' 
								   group by tbz_movies.id");
//echo $this->db->last_query();

        return $query->result();
	}
   
	function count_movie_rate($data){
		 
		$where_data = array('movie'=> $data);
		$select_data="*";
		$result = $this->get_table_where($select_data,$where_data,"tbz_reviews" );
		//echo $this->db->last_query();
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

/* FILTER-language
########################################################
--------------------------------------------------------*/ 	
	function getLanguageDetails(){
       $this->db->where('status',1);
		$result = $this->db->get('tbz_language')->result();
		return ($result);
	}

/* FILTER-genere
########################################################
--------------------------------------------------------*/ 
	function getGenreDetails(){
 $this->db->where('status',1);
		$result = $this->db->get('tbz_tags')->result();
		return ($result);
	}

/* FILTER-format
########################################################
--------------------------------------------------------*/
	function getFormatDetails(){
		 
		$result = $this->db->get('tbz_format')->result();
		return $result;
	}

/* TOP MOVIE DETAILS
########################################################
--------------------------------------------------------*/
	function getTopmovieDetails(){

		$query = $this->db->get('tbz_movies'); 
        return $query->result();
		 
	}

/* TOP REVIEWS
########################################################
--------------------------------------------------------*/
	function getTopreviewDetails(){

		$this->db->select('tbz_reviews.movie,
			               tbz_reviews.title,
			               tbz_reviews.comments,
			               tbz_reviews.rate,
			               tbz_reviews.time_date,
						   tbz_movies.movie_name,
						   tbz_movies.image,
						   tbz_movies.certificate');
		$this->db->from('tbz_reviews');
		$this->db->join('tbz_movies','tbz_movies.id = tbz_reviews.movie');
		$this->db->order_by('tbz_reviews.id','DESC');
		$query = $this->db->get();
		
		return $query->result();
	}

/* COMING SOON MOVIES
########################################################
--------------------------------------------------------*/
	function comingMovies($data){
		
		$date = date("Y-m-d");
		$this->db->select('tbz_movies.id as id,
		                   tbz_movies.movie_name,
		                   tbz_language.id as language, 
		                   tbz_movies.image,
		                  
		                   tbz_movies.certificate,
						   tbz_language.name,
						   tbz_movies.format,
						   ass.id as tag_id,
						   asss.tag_name as select_tagss,
						   GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",asss.tag_name)) SEPARATOR",") as select_tagss');   
						   
		$this->db->from('tbz_movies as tbz_movies');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
		//$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
	    $this->db->join('tbz_tags as asss', 'FIND_IN_SET(asss.id, tbz_movies.tag_id) > 0','left');
		$this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
		$this->db->where('tbz_movies.release_date >',$date);
		$this->db->group_by('tbz_movies.id');
		$query = $this->db->get();
		$result = $query->result();
        
        return $result;
	}
	
	
	function save_topreview_details($data)
	{
		//var_dump($data);
		$id = (int)$data->id;
		$table="tbz_reviews";
		
        $where_data = array(	// ----------------Array for check data exist ot not
			   'movie'     => $id ,
			   'user_id'     => $data->user_id
		);
		$select_data="*";
		$result = $this->get_table_where( $select_data, $where_data, $table);
		
		if(count($result)==0){
		
		//$id = (int)$data->id;
		//$rdata = array('movie' => $id,'title' => $data->title,'comments' => $data->details,'rate' => $data->rate,'user_id' => $data->user_id);
		$rdata = array('user_id' => $data->user_id, 'comments' => $data->comments, 'movie' => $id, 'rate' => $data->rate );
		$query = $this->db->insert('tbz_reviews',$rdata);
		
			$msg = array('status' => 'sucess','msg' => 'Movie rated successfully');
			$jsn = json_encode($msg);
			return $jsn;
		}else{
			$msg = array('status' => 'failed','msg' => 'Already rated');
			$jsn = json_encode($msg);
			return $jsn;
		}
	}
	
/* FILTER-language
########################################################
--------------------------------------------------------*/ 	
	function getLanguageval(){

		$result = $this->db->get('tbz_language')->result();
		return ($result);
	}

/* FILTER-genere
########################################################
--------------------------------------------------------*/ 
    function getGenreDetailsval(){

		$result = $this->db->get('tbz_tags')->result();
		return ($result);
	}
	
/* FILTER-format
########################################################
--------------------------------------------------------*/
	function getFormatDetailsvals(){
		 
		$result = $this->db->get('tbz_format')->result();
		return $result;
	}

/* FILTER-format
########################################################
--------------------------------------------------------*/
	function getFormatDetailsval(){
		 
		$result = $this->db->get('tbz_format')->result();
		return $result;
	}
	
}