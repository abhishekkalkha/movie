<?php
class Movie_model extends CI_Model {

    function __construct(){
        
        parent::__construct();
    }

/* DEFAULT
########################################################
--------------------------------------------------------*/ 
    function get_table_where($select_data,$where_data,$table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		$query  = $this->db->get($table);  
		$result = $query->result_array(); 
		
		return $result;	
    }

/* MOVIE DETAILS
########################################################
--------------------------------------------------------*/   
    function select_showmovies($data){
		
		$date = date('Y-m-d'); 
		$id = $data['id'];

	/*	$this->db->select('tbz_trailers.path,
		 	                tbz_show_details.id as id, 
		 	                tbz_movies.movie_name,
		                    tbz_movies.image,
		                    tbz_movies.certificate,
		                    tbz_movies.film_budget, 
		                    tbz_tags.tag_name, 
		                    tbz_movies.release_date, 
		                    tbz_movies.total_hours, 
		                    tbz_movies.description, 
		                    tbz_language.name, 
		                    tbz_reviews.title, 
		                    tbz_reviews.comments,
		                    dirsn.actors_name as director_name,
		                    GROUP_CONCAT(tbz_actors.actors_name  ORDER BY tbz_actors.id) as screen_playnames,
							
							ass.tag_name as tags_select,
						   GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",ass.tag_name)) SEPARATOR",") as tags_select 
		                    ');
		$this->db->from('tbz_show_details');
		
		$this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
		
		$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id','left');
		//$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
		$this->db->join('tbz_actors dirsn', 'dirsn.id = tbz_movies.director_name_id','left');
		$this->db->join('tbz_reviews','tbz_reviews.movie = tbz_movies.id','left');
		$this->db->join('tbz_trailers','tbz_trailers.movie = tbz_movies.id','left');
		$this->db->join('tbz_actors ', 'FIND_IN_SET(tbz_actors.id, tbz_movies.actor_name_id) > 0','left');
		$this->db->where('tbz_show_details.movie_name_id',$id);
		$this->db->where('tbz_show_details.date',$date);
		$this->db->group_by("tbz_show_details.id");
		$query = $this->db->get();
		echo $this->db->last_query();*/
		      $date = date("Y-m-d");
    $this->db->select(' tbz_movies.id as id,
                        tbz_movies.movie_name,
                        tbz_movies.image,
                        tbz_movies.banner_image,
                        tbz_movies.certificate,
                        tbz_movies.film_budget,
                        tbz_movies.release_date, 
                        tbz_movies.total_hours, 
                        tbz_movies.description,
                        tbz_language.name,
                        tbz_reviews.title, 
                        tbz_reviews.comments,
		               tbz_movies.trailer,
		               tbz_tags.tag_name,
		               tbz_movies.facebook,
		               tbz_movies.googleplus,
		               tbz_movies.twitter,
		              
		               dirsn.actors_name as director_name,
              
                        tbz_actors.actors_name as screen_playnames,
              GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",tbz_actors.actors_name)) SEPARATOR",") as screen_playnames,  
              
              ass.tag_name as tags_select,
                GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",ass.tag_name)) SEPARATOR",") as tags_select   
                        ');
    $this->db->from('tbz_movies');
    $this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
   // $this->db->join('tbz_trailers','tbz_trailers.movie = tbz_movies.id','left');
    //$this->db->join('tbz_show_details','tbz_show_details.movie_name_id = tbz_movies.id','left');
    $this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
    $this->db->join('tbz_reviews','tbz_reviews.movie = tbz_movies.id','left');
    $this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
    $this->db->join('tbz_actors dirsn', 'dirsn.id = tbz_movies.director_name_id','left');
    $this->db->join('tbz_actors ', 'FIND_IN_SET(tbz_actors.id, tbz_movies.actor_name_id) > 0','left');
    $this->db->where('tbz_movies.id',$id);
    /*$this->db->where('tbz_show_details.date',$date);*/
    $this->db->group_by("tbz_movies.id");
    $query = $this->db->get();
   //echo $this->db->last_query();
		$query =$query->row();
		 
		 return $query;

	}
	
	function select_commingshowmovies($data)
	{
		$date = date('Y-m-d'); 
		$id = $data['id'];

		$this->db->select(' tbz_movies.id as id,
		                    tbz_movies.movie_name,
		                    tbz_movies.image,
		                    tbz_movies.banner_image,
							tbz_movies.certificate,
		                    tbz_movies.film_budget,
							tbz_movies.release_date, 
		                    tbz_movies.total_hours, 
		                    tbz_movies.description,
							tbz_language.name,
                            tbz_reviews.title, 
		                    tbz_reviews.comments,
							tbz_movies.trailer,
							tbz_tags.tag_name,
							tbz_movies.facebook,
							tbz_movies.googleplus,
							tbz_movies.twitter,
							
							dirsn.actors_name as director_name,
							
		                    tbz_actors.actors_name as screen_playnames,
							GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",tbz_actors.actors_name)) SEPARATOR",") as screen_playnames,  
							
							ass.tag_name as tags_select,
						    GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",ass.tag_name)) SEPARATOR",") as tags_select   
		                    ');
		$this->db->from('tbz_movies');
		$this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
		//$this->db->join('tbz_trailers','tbz_trailers.movie = tbz_movies.id','left');
		//$this->db->join('tbz_show_details','tbz_show_details.movie_name_id = tbz_movies.id','left');
		$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		$this->db->join('tbz_reviews','tbz_reviews.movie = tbz_movies.id','left');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
		$this->db->join('tbz_actors dirsn', 'dirsn.id = tbz_movies.director_name_id','left');
		$this->db->join('tbz_actors ', 'FIND_IN_SET(tbz_actors.id, tbz_movies.actor_name_id) > 0','left');
		$this->db->where('tbz_movies.id',$id);
		//$this->db->where('tbz_show_details.date',$date);
		$this->db->group_by("tbz_movies.id");
		$query = $this->db->get();
		return $query->row();
	}
	
	function count_movie_rate($data){
		 
		$where_data = array('movie' => $data);
		$select_data="*";
		$result = $this->get_table_where( $select_data, $where_data, "tbz_reviews" );
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

/* REVIEW DETAILS
########################################################
--------------------------------------------------------*/	
	function reviewDetails($data){
		/*   
		$where_data = array('movie' => $data);
		$select_data="*";
		$result = $this->get_table_where($select_data, $where_data,"tbz_reviews" );
		if(count($result)>0){
			return $result;
		}
*/   
		$this->db->select('tbz_reviews.comments,tbz_reviews.id,tbz_reviews.movie,tbz_reviews.title,tbz_reviews.rate,tbz_users.first_name,tbz_users.image');
		$this->db->from('tbz_reviews');
		$this->db->join('tbz_users','tbz_users.id=tbz_reviews.user_id');
		$this->db->where('tbz_reviews.movie',$data);
		$query = $this->db->get()->result();
			//echo $this->db->last_query();
		return $query;
	
		
	}

/* GALLERY
########################################################
--------------------------------------------------------*/	
	function galleryDetails($data){

		$this->db->where('movie',$data['id']);
        $query = $this->db->get('tbz_gallery');
       // echo $this->db->last_query();
		$result = $query->result();

		return $result; 
	}

/* PEOPLE VIEWED MOVIES
########################################################
--------------------------------------------------------*/
	function peopleViewedmovies($data){
		
		$date = date('Y-m-d'); 
        $this->db->select('tbz_movies.id as id,
                           tbz_movies.movie_name, 
                           tbz_movies.certificate, 
                           tbz_movies.image, 
                           tbz_language.name, 
                           tbz_tags.tag_name,
						   pleview.tag_name as ple_select,
						   GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",pleview.tag_name)) SEPARATOR",") as ple_select   
                           ');
		$this->db->from('tbz_movies as tbz_movies');
		
		$this->db->join('tbz_tags as pleview', 'FIND_IN_SET(pleview.id, tbz_movies.tag_id) > 0','left');
		
		$this->db->join('tbz_show_details','tbz_show_details.movie_name_id = tbz_movies.id');
		$this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		$this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
	    $this->db->where('tbz_show_details.date>=',$date);
	    $this->db->where('tbz_movies.id!=',$data['id']);
	    //$this->db->group_by("tbz_show_details.movie_name_id");
	    $this->db->group_by("tbz_movies.id");
	    $query = $this->db->get();
	    //echo $this->db->last_query();
	    $result = $query->result();
				 
		return ($result);
	}

/* LEAD CAST
########################################################
--------------------------------------------------------*/
	function leadCast($data){
		 
		$date = date('Y-m-d'); 
		$id = $data['id'];   
		 
		$this->db->select('GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",tbz_actors.actors_name,tbz_actors.image,tbz_actors.id)) SEPARATOR",") as cast_crews ');
		$this->db->from('tbz_movies');
		$this->db->join('tbz_actors', 'FIND_IN_SET(tbz_actors.id, tbz_movies.cast) > 0','left');
		$this->db->where('tbz_movies.id',$data['id']);
		$this->db->group_by('tbz_movies.id');
		$query = $this->db->get();

		 return $query->row();
	}
/* REVIEWS
########################################################
--------------------------------------------------------*/	
	 	 function viewrating_details($data){
			 
		   $where_data = array(	// ----------------Array for check data exist ot not
			'movie'     => $data
		);
		$select_data="*";
		  //------------ Select table
		$result = $this->get_table_where( $select_data, $where_data, "tbz_reviews" );
		if(count($result)>0){
			return $result;
		}
		
	 }
	 /* function get_crew($data){
     	$this->db->select('crew');
     	$this->db->from('tbz_show_details');
     	$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id');
     	$this->db->where('tbz_show_details.movie_name_id',$data);
     	$this->db->group_by('`tbz_movies`.`id`');
     	$query = $this->db->get();
     	//echo $this->db->last_query();
     	return $query->row();
     }*/
	  
	   function get_crew($data){
     	$this->db->select('crew');
     	$this->db->from('tbz_movies');
     	//$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id');
     	$this->db->where('tbz_movies.id',$data);
     	$this->db->group_by('`tbz_movies`.`id`');
     	$query = $this->db->get();
     	//echo $this->db->last_query();
     	return $query->row();
     }

     
	  function actorDetails($data){
	  	$id = $data['id'];
	  /*	$this->db->where('id',$data['id']);
	  	return $query = $this->db->get('tbz_actors')->row();*/
	  	$query = $this->db->query("select tbz_actors.actors_name,tbz_actors.image,tbz_actors.description,group_concat(`tbz_role`.`role_name` SEPARATOR ', ') as `role_name` from `tbz_actors` join `tbz_role` on find_in_set(`tbz_role`.`id`,`tbz_actors`.`role`) where `tbz_actors`.`id`='$id'");
	  	//echo $this->db->last_query();
	  	return $query->row();
	  		  }

	  		 function get_show_theater($data){

		$date = $data->date;
		if($date==''){
			$date = date('Y-m-d');
			$next_Date = date('Y-m-d', strtotime("+2 days"));
			//print_r($next_Date);
			
		}
		$city = get_cookie("tb_search");
		$id = $data->id;
        // $query = $this->db->query("SELECT GROUP_CONCAT(  DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.screen_timing)) SEPARATOR ',') as asasas,GROUP_CONCAT( DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.id)) SEPARATOR ',') as show_ids,`tbz_chinema_screen`.layout,`tbz_show_details`.`date`,`tbz_theater_details`.theater_name AS name,`tbz_theater_details`.id AS theater FROM `tbz_show_details` LEFT JOIN `tbz_chinema_screen` ON `tbz_show_details`.screen_name = `tbz_chinema_screen`.id LEFT JOIN `tbz_theater_details` ON `tbz_theater_details`.id = `tbz_show_details`.`cinemas_id`  WHERE `tbz_show_details`.movie_name_id = '$id' AND `tbz_show_details`.`date` BETWEEN '$date' AND '$next_Date' AND `tbz_theater_details`.`city` = '$city' GROUP BY `tbz_chinema_screen`.id");
		$query = $this->db->query("SELECT GROUP_CONCAT(  DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.screen_timing)) SEPARATOR ',') as asasas,GROUP_CONCAT( DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.id)) SEPARATOR ',') as show_ids,`tbz_chinema_screen`.layout,`tbz_show_details`.`date`,`tbz_theater_details`.theater_name AS name,`tbz_theater_details`.id AS theater FROM `tbz_show_details` LEFT JOIN `tbz_chinema_screen` ON `tbz_show_details`.screen_name = `tbz_chinema_screen`.id LEFT JOIN `tbz_theater_details` ON `tbz_theater_details`.id = `tbz_show_details`.`cinemas_id`  WHERE `tbz_show_details`.movie_name_id = '$id' AND `tbz_theater_details`.`city` = '$city' GROUP BY `tbz_chinema_screen`.id");
//echo $this->db->last_query();
       // $query = $this->db->get();			
		return $query->result();
	}
}