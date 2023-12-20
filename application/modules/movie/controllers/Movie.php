<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('movie_model','movie'); 
        $this->load->helper('crew');
        check_installer();
    }
	
	public function index(){
		
		$this->load->view('template/header');
		$this->load->view('home');
		$this->load->view('template/footer');
	}

    public function view_details(){
		$this->uri->segment(3);
		$this->load->view('template/header');
		$this->load->view('movie/actor_details');
		$this->load->view('template/footer');
	}


/* MOVIE DETAILS
########################################################
--------------------------------------------------------*/ 	
	public function getmovieDetails(){
		
		$data = $_GET;
		//var_dump($data);
	    $result = $this->movie->select_showmovies($data);
		//var_dump($result);
		$number = $this->movie->count_movie_rate($data['id']);
		$rate = $this->movie->movie_rate($data['id']);
		$crew = $this->movie->get_crew($data['id']);
	    $crew = json_decode($crew->crew);
	    $new_result=array();
	    $array = array();
	   foreach($crew as $key =>$value){
          foreach ($value as $key => $val) {
               $tag_name = call_tag($key);
               $person = call_person($val);
               $array=array('role'=>$tag_name,
                            'actor_name'=>$person->actors_name,

                           );
               //$array = array($tag_name=>$person);
               $new_result[]= $array;
          }   
	   }
			if($rate !=NULL){
				$percentage = ($rate /5)*100;
				$result->percentage =$percentage;
				$result->rateavg =$rate;
				//$result->cast=$new_result;
			}
			if($number>0){
				$result->number =$number;
			}
			if($crew !=NULL){
				$result->cast=$new_result;
			}
			/*else
			{
				$result->number =0;
			}*/
			
			//$existvaluescrews = array_map('trim', explode(',',$result->crewactors_names));
			//$result->castandcrewsvalue = $existvaluescrews;
		$data = array('error' => '','result' => $result);
		print json_encode($result);
	}
	
	public function Details_comming(){
		
		$data = $_GET;
		//var_dump($data);
	    $result = $this->movie->select_commingshowmovies($data);
		//var_dump($result);
        $number = $this->movie->count_movie_rate($data['id']);
		$rate = $this->movie->movie_rate($data['id']);
			if($rate !=NULL){
				$percentage = ($rate /5)*100;
				$result->percentage =$percentage;
				$result->rateavg =$rate;
			}
			if($number>0){
				$result->number =$number;
			}

			
			//$existvaluescrews = array_map('trim', explode(',',$result->crewactors_names));
			//$result->castandcrewsvalue = $existvaluescrews;
			
			
		$data = array('error' => '','result' => $result);
		print json_encode($result);
		
	}

/* REVIEW DETAILS
########################################################
--------------------------------------------------------*/
	public function reviewDetails(){
		
		$data = $_GET;
		$result = $this->movie->reviewDetails($data['id']); 
		
		print json_encode($result);
	}

/* GALLERY
########################################################
--------------------------------------------------------*/	
	public function galleryDetails(){
		
		$data = $_GET;
		$result = $this->movie->galleryDetails($data); 
		//print_r($result);
		print json_encode($result);
	}

/* PEOPLE VIEWED MOVIES
########################################################
--------------------------------------------------------*/	
	public function peopleViewedmovies(){
		
		$data = $_GET;
		$result = $this->movie->peopleViewedmovies($data); 
		$i=0;
		foreach ($result as $rows){
			
			$number = $this->movie->count_movie_rate($rows->id);
			$rate = $this->movie->movie_rate($rows->id);
			$percentage = ($rate /5)*100;
			$result[$i]->number =$number;
			$result[$i]->percentage =$percentage;
			++$i;
		}
		
		print json_encode($result);

	}

/* LEAD CAST
########################################################
--------------------------------------------------------*/
	public function leadCast(){
		
		$data = $_GET;
	    $result = $this->movie->leadCast($data);
        $selectcrews = array_map('trim', explode(',', $result->cast_crews));
		$data = '';
		foreach($selectcrews as $row){
			$value =  array_map('trim', explode('<#>',  $row));
			$data[] = array('act_image' => $value[1],'name' =>$value[0],'id'=>$value[2]);
		}
		$result->castand_crews_values = $data;
		
		print json_encode($result);
	}


	public function leadCrew(){
		$data = $_GET;
	    $crew = $this->movie->get_crew($data['id']);
	     $crew = json_decode($crew->crew);
	    $new_result=array();
	    $array = array();
	   foreach($crew as $key =>$value){
          foreach ($value as $key => $val) {
               $tag_name = call_tag($key);
               $person = call_person($val);
               $array=array('role'=>$tag_name,
                            'actor_name'=>$person->actors_name,
                            'image'=>$person->image,
                            'id'=>$person->id
                           );
               //$array = array($tag_name=>$person);
               $new_result[]= $array;
          }   

	   }
	   $result = new StdClass;
	    $result->film_crews = $new_result;
	  //  print_r($result);
          print json_encode($result);
	}
/* REVIEWS
########################################################
--------------------------------------------------------*/	
	public function viewrating_details(){
		
		$data = $_GET;

		$result = $this->movie->viewrating_details($data['id']); 
		//$jdata = array('error' => '','result' => $result);
		print json_encode($result);
	}

	public function actorDetails(){
		$data =$_GET;
		$result = $this->movie->actorDetails($data);
		print json_encode($result);
	}
	
	public function showTheater(){
		$data = json_decode(file_get_contents("php://input"));
		$result = $this->movie->get_show_theater($data);	
		$next_Date = date('Y-m-d', strtotime("+2 days"));
		$result = array("data"=>$result,'nextdate'=>$next_Date);
		print json_encode($result);
	}
	
}