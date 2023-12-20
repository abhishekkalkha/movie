<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends MY_Controller {

	

	function __construct() {

        parent::__construct();

        $this->load->model('home_model','home');

        check_installer(); 

    }

	public function index(){
	
		$this->load->view('template/header');

		$this->load->view('home');

		$this->load->view('template/footer');

	}

	public function index_404(){

		

		//$this->load->view('template/header');

		$this->load->view('error');

		$this->load->view('template/footer');

	}



/* TOP TRENDING

########################################################

--------------------------------------------------------*/ 	

	public function topTrending(){



		$result = $this->home->get_topmovie_details();

		$i=0;

		foreach ($result as $values){

			

			$number = $this->home->count_movie_rate($values->id);

			$rate = $this->home->movie_rate($values->id);

			$percentage = intval(($rate/5)*100);

			$result[$i]->number =$number;

			$result[$i]->percentage =intval($percentage);

			++$i;

		}



	  print json_encode($result);



	}



/* SEARCH MOVIE LIST

########################################################

--------------------------------------------------------*/

	public function searchmovieList(){

     

		$data=json_decode(file_get_contents("php://input"));

		$result = $this->home->searchmovieList($data);

        

        print json_encode($result);

		

	}



/* SINGLE MOVIE DETAILS

########################################################

--------------------------------------------------------*/		

	public function singleMovie(){

		

		$this->load->view('template/header');

		$this->load->view('movie/single_movie1');

		$this->load->view('template/footer');

	}



/* SEARCH CITY

########################################################

--------------------------------------------------------*/

	public function getcity(){

		

		$data = json_decode(file_get_contents('php://input'));

		$result = $this->home->getcity($data);

		print json_encode($result);

	}



/* CITY BASED MOVIE

########################################################

--------------------------------------------------------*/

	public function cityBasedMovie(){



		$city = trim($_GET['data'])."";

		$expire = time()+86500;

		$cookie= array(

						'name'   => 'tb_search',

						'value'  => $city,

						'expire' => $expire,

			          );

		$this->input->set_cookie($cookie);

				

	}



/* TRAILERS-now showing

########################################################

--------------------------------------------------------*/

	public function getTrailerNowshowing(){

		

		$data = json_decode(file_get_contents("php://input"));

		$result = $this->home->getTrailerNowshowing($data); 
		
		$i=0;

		foreach ($result as $rowsss){

			

			$number = $this->home->count_movie_rate($rowsss->movie_id);

			$rate = $this->home->movie_rate($rowsss->movie_id);

			$percentage = ($rate /5)*100;

			$result[$i]->number =$number;

			$result[$i]->percentage =$percentage;

			++$i;

		}

		$data = array('error' => '','result' => $result);

		print json_encode($result);

	}



/* TRAILERS-coming soon

########################################################

--------------------------------------------------------*/	

	public function getTrailerCommingsoon(){

		

	    $result = $this->home->getTrailerCommingsoon();

		$i=0;

		foreach ($result as $rowsss){

			

			$number = $this->home->count_movie_rate($rowsss->id);

			$rate = $this->home->movie_rate($rowsss->id);

			$percentage = ($rate /5)*100;

			$result[$i]->number =$number;

			$result[$i]->percentage =$percentage;

			++$i;

		}

		$data = array('error' => '','result' => $result);

		print json_encode($result);

	}

	

/******* GET TRAILERS videos and Language Filter*******/

    public function includelanguages(){

		

		$result = $this->home->trailers_filter();

        print json_encode($result);

	}
	public function getimage(){
		$result = $this->allmovie->get_image();
		print json_encode($result);
	}




}