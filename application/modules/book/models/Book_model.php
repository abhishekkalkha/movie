<?php
class Book_model extends CI_Model {

    function __construct(){
        
        parent::__construct();
    }

    function get_movie_details($data){ 		 
		 
		 $date = date('Y-m-d'); 
		 $id = $data['id'];
/*		 $this->db->select('tbz_show_details.id as id, tbz_movies.movie_name, tbz_movies.certificate, 
		 tbz_movies.image, tbz_format.format_name, tbz_language.name, dirs.actors_name as dir_name,
		 dirs.image as dir_names,
		 GROUP_CONCAT(cast.actors_name ORDER BY cast.id) as actors_names, 
		 GROUP_CONCAT(cast.image ORDER BY cast.id) as actors_image');
		 $this->db->from('tbz_show_details as tbz_show_details');
		 $this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id','left');
		 $this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
		 $this->db->join('tbz_actors cast', 'FIND_IN_SET(cast.id, tbz_movies.actor_name_id) > 0','left');
		 $this->db->join('tbz_actors dirs', 'dirs.id = tbz_movies.director_name_id','left');
		 $this->db->join('tbz_format','tbz_format.id = tbz_movies.format','left');
		 $this->db->join('tbz_language','tbz_language.id = tbz_show_details.language','left');
		 $this->db->where('tbz_show_details.movie_name_id',$id);
		 $this->db->where('tbz_show_details.date',$date);
		 $this->db->group_by("tbz_show_details.id");
		 $query = $this->db->get();
		 echo $this->db->last_query();*/

		$query = $this->db->query("SELECT `tbz_movies`.`movie_name`,`tbz_movies`.`image`,`tbz_movies`.`certificate`,`tbz_movies`.`format`,
		                  `tbz_movies`.`banner_image`,`tbz_language`.`name`,group_concat(DISTINCT `tbz_tags`.`tag_name` SEPARATOR ', ') as `tag_name`,
		                  group_concat(DISTINCT `tbz_actors`.`actors_name` SEPARATOR ', ') as `cast` from `tbz_show_details` 
		                  join `tbz_movies` ON `tbz_movies`.`id`=`tbz_show_details`.`movie_name_id` join `tbz_language` 
		                  on `tbz_movies`.`language`=`tbz_language`.`id` LEFT JOIN `tbz_tags` on 
		                  FIND_IN_SET(`tbz_tags`.`id`,`tbz_movies`.`tag_id`) LEFT JOIN `tbz_actors` on 
		                  FIND_IN_SET(`tbz_actors`.`id`,`tbz_movies`.`cast`) WHERE `tbz_show_details`.`movie_name_id` = '$id' 
		                  GROUP BY `tbz_movies`.`id`");
		 
		 return $query->row();
	}
     
     function get_crew($data){
     	$this->db->select('crew');
     	$this->db->from('tbz_show_details');
     	$this->db->join('tbz_movies','tbz_movies.id = tbz_show_details.movie_name_id');
     	$this->db->where('tbz_show_details.movie_name_id',$data['id']);
     	$this->db->group_by('`tbz_movies`.`id`');
     	return $query = $this->db->get()->row();
     }


/* DEFAULT
########################################################
--------------------------------------------------------*/
    function get_table_where( $select_data, $where_data, $table){
        
		$this->db->select($select_data);
		$this->db->where($where_data);
		$query  = $this->db->get($table);  //--- Table name = User
		$result = $query->result_array(); 
		
		return $result;	
    }
	function count_movie_rate($data){
		 
		$where_data = array('movie'=> $data);
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

	function get_show_theater($data){

		$date = $data->date;
		if($date==''){
			$date = date('Y-m-d');
		}
		$city = get_cookie("tb_search");
		$id = $data->id;
		/*$this->db->select('tbz_show_details.id,tbz_chinema.name, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",screen_timing)) SEPARATOR ",") as asasas,tbz_chinema_screen.layout,tbz_chinema_screen.preview');
		$this->db->from('tbz_show_details');
		$this->db->join('tbz_movies',"tbz_movies.id = tbz_show_details.movie_name_id AND tbz_movies.id = '$id'");
		$this->db->join('tbz_chinema','tbz_chinema.id =  tbz_show_details.cinemas_id','left');
		$this->db->join('tbz_chinema_screen','tbz_chinema_screen.cinemas_id=  tbz_show_details.cinemas_id','left');
		$this->db->where('tbz_show_details.date',$date);
		$this->db->where('tbz_show_details.city_id',$city);
		$this->db->group_by('tbz_chinema.id');*/

		$query = $this->db->query("SELECT GROUP_CONCAT(  DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.screen_timing)) SEPARATOR ',') as asasas,GROUP_CONCAT( DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.id)) SEPARATOR ',') as show_ids,`tbz_chinema_screen`.layout,`tbz_theater_details`.theater_name AS name,`tbz_theater_details`.id AS theater FROM `tbz_show_details` LEFT JOIN `tbz_chinema_screen` ON `tbz_show_details`.screen_name = `tbz_chinema_screen`.id LEFT JOIN `tbz_theater_details` ON `tbz_theater_details`.id = `tbz_show_details`.`cinemas_id`  WHERE `tbz_show_details`.movie_name_id = '$id' AND `tbz_show_details`.`date` = '$date' AND `tbz_theater_details`.`city` = '$city' GROUP BY `tbz_chinema_screen`.id");
//echo $this->db->last_query();
       // $query = $this->db->get();			
		return $query->result();
	}

	function get_theater_info($data){
		$id = $data->id;
		return $this->db->query("SELECT tbz_movies.movie_name,tbz_movies.certificate,tbz_language.name AS language,tbz_format.format_name,
		                        tbz_theater_details.theater_name AS theater,tbz_location.location,tbz_chinema_screen.preview,
		                        tbz_chinema_screen.screen_name,tbz_show_details.screen_timing FROM 
		                        `tbz_show_details` LEFT JOIN tbz_movies ON tbz_show_details.movie_name_id = `tbz_movies`.id
		                         LEFT JOIN tbz_language ON tbz_language.id = tbz_movies.language LEFT JOIN tbz_format ON 
		                         tbz_movies.format = tbz_format.id LEFt JOIN tbz_theater_details ON tbz_show_details.cinemas_id = tbz_theater_details.id LEFT JOIN tbz_location ON tbz_theater_details.city = tbz_location.id LEFT JOIN tbz_chinema_screen ON tbz_chinema_screen.cinemas_id = tbz_show_details.cinemas_id AND tbz_chinema_screen.id = tbz_show_details.screen_name WHERE tbz_show_details.id =".$id)->row();
	}

	function get_ticket_info($data){
		$id = $data->id;
		return $this->db->where('show_id',$id)->get('tbz_ticket_booked')->result();
	}

	function send_mail($msg){

		$settings = $this->db->get('tbz_settings')->row();
		//print_r($settings);
		$user = $this->session->userdata('logged_in');
		$user_id = $user['id'];
		$user = $this->db->where('id',$user_id)->get('tbz_users')->row();
		//print_r($user);

  /*      $configs = array(
			'protocol'=>'smtp',
			'smtp_host'=>$settings->smtp_host,
			'smtp_user'=>$settings->smtp_username,
			'smtp_pass'=>$settings->smtp_password,
			'smtp_port'=>'587'
			);*/

$configs = Array(
                'protocol' => 'smtp',
                'smtp_host' =>$settings->smtp_host,
                'smtp_port' => 587,
                'smtp_user' => $settings->smtp_username,// change it to yours
                'smtp_pass' => $settings->smtp_password, // change it to yours
                'smtp_timeout'=>20,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
                );

        //print_r($configs);

        /*$configs = array(
			'protocol'=>'smtp',
			'smtp_host'=>'mail.callmycab.in',
			'smtp_user'=>'no-reply@callmycab.in',
			'smtp_pass'=>'baAEanx7',
			'smtp_port'=>'587'
			);*/

			//$user->email = 'dsfsdf@gmail.com';
$this->load->library('email', $configs);
			$this->email->initialize($configs);
			
			$this->email->set_newline("\r\n");
			// prepare email
			$this->email
				->from($settings->smtp_username, $settings->title)
				->to($user->email)
				->subject('Booking Confirmed')
				->message($msg);
				// ->set_mailtype('html');
			// send email
			$this->email->send();

	}

	public function get_promo($data){
		
 		$current_date = date('Y-m-d');
 		$this->db->where('promocode',$data['id']);
 		$this->db->where('valid_from <=',$current_date);
 		$this->db->where('valid_to >=',$current_date);
 		$this->db->where('status','1');
 		
		$query = $this->db->get('tbz_promocode');
		//echo $this->db->last_query();
		return $result = $query->row();
		
	}

	public function update_promo($data){
		$data = $data->post_data;
 		$datas=array('status'=>2);
 		$this->db->where('promocode', $data->promocode);
		$this->db->update('tbz_promocode', $datas);
		$this->db->where('promocode',$data->promocode);	
		$query = $this->db->get('tbz_promocode')->row();
		//print_r($query);
		$datass = array('amount'=>$data->amount);
		$this->db->where('user_id',$data->user_id);
		$res = $this->db->update('tbz_booking_temporary',$datass);
		if($res){
			return 1;
		}

	}
	public function settings($country){
		$this->db->select('tbz_countries.currrency_symbol');
		$this->db->from('tbz_settings');
		$this->db->join('tbz_countries','tbz_countries.name=tbz_settings.country');
		$this->db->where('tbz_settings.country',$country);
		$query = $this->db->get()->row();
		//echo $this->db->last_query();
		return $query;

	}
	public function settings1(){
		return $query = $this->db->get('tbz_settings')->row();
	}


   
	
}