<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allmovie extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('allmovie_model','allmovie'); 
        check_installer();
    }
	public function index(){

		// print_r($_SESSION);
		// echo '<br/>';
		
		$this->load->view('template/header');
		$this->load->view('allmovies');
		$this->load->view('template/footer');
	}

/* All MOVIES
########################################################
--------------------------------------------------------*/ 	
	public function allmovies(){
 
		$city = get_cookie('tb_search');
		$result = $this->allmovie->allmoviesDetails($city);
		
		$i=0;
		foreach($result as $row){
			
			$number = $this->allmovie->count_movie_rate($row->id);
			$rate = $this->allmovie->movie_rate($row->id);
			$percentage = ($rate /5)*100;
			$result[$i]->number =$number;
			$result[$i]->percentage =$percentage;
			++$i;
		}

		
		$data = array('error' => '','result' => $result);

		print_r(json_encode($data));
		
	}

/* FILTER-language
########################################################
--------------------------------------------------------*/ 		
	public function languagFilter(){
		
		$result = $this->allmovie->getLanguageDetails();
        print json_encode($result);
		
	}

/* FILTER-genere
########################################################
--------------------------------------------------------*/ 
	public function genereFilter(){
	 	
	 	$result = $this->allmovie->getGenreDetails();
        print json_encode($result);
	}

/* FILTER-format
########################################################
--------------------------------------------------------*/
	public function formatFilter(){
		
		$result = $this->allmovie->getFormatDetails();
		print json_encode($result);
	}

/* TOP MOVIE DETAILS
########################################################
--------------------------------------------------------*/
	public function topmovieDetails(){
		
		$result = $this->allmovie->getTopmovieDetails();
		$i=0;
		foreach ($result as $rows){
			
			$number = $this->allmovie->count_movie_rate($rows->id);
			$rate = $this->allmovie->movie_rate($rows->id);
			$percentage = intval(($rate/5)*100);
			$result[$i]->number =$number;
			$result[$i]->percentage =intval($percentage);
			++$i;
		}
		print json_encode($result);	
	}

/* TOP REVIEWS
########################################################
--------------------------------------------------------*/
	public function topreviewDetails(){

		$result = $this->allmovie->getTopreviewDetails();
        print json_encode($result);
	}

/* COMING SOON MOVIES
########################################################
--------------------------------------------------------*/	
	public function comingMovies(){
		
		$data = $_GET;
	    $result = $this->allmovie->comingMovies($data);
		$i=0;
		foreach ($result as $rowss){
			
			$number = $this->allmovie->count_movie_rate($rowss->id);
			$rate = $this->allmovie->movie_rate($rowss->id);
			$percentage = ($rate /5)*100;
			$result[$i]->number =$number;
			$result[$i]->percentage =$percentage;
			++$i;
		}

		$data = array('error' => '','result' => $result);
		print json_encode($result);
	}
/* RATE-Movies
########################################################
--------------------------------------------------------*/ 		
	public function rate_movie()
	{
		$data = json_decode(file_get_contents("php://input"));
		echo $result = $this->allmovie->save_topreview_details($data);
	}
/* RATE-Movies
########################################################
--------------------------------------------------------*/ 
	
	/* FILTER-language
########################################################
--------------------------------------------------------*/ 		
	public function languagFiltersval(){
		
		$result = $this->allmovie->getLanguageval();
        print json_encode($result);
		
	}

/* FILTER-genere
########################################################
--------------------------------------------------------*/ 
	public function genereFilterval(){
	 	
	 	$result = $this->allmovie->getGenreDetailsval();
        print json_encode($result);
	}
	
/* FILTER-format
########################################################
--------------------------------------------------------*/
	public function formatFiltervals(){
		
		$result = $this->allmovie->getFormatDetailsvals();
		print json_encode($result);
	}

/* FILTER-format
########################################################
--------------------------------------------------------*/
	public function formatFiltervalues(){
		
		$result = $this->allmovie->getFormatDetailsval();
		print json_encode($result);
	}
	public function getimage(){
		$result = $this->allmovie->get_image();
		print json_encode($result);
	}

	
}