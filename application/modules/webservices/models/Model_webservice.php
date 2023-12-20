<?php
class Model_webservice extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function signup($request)
    { 

        $request['password'] = md5($request['password']);

       $this->db->insert('tbz_users',$request);
       $last_id = $this->db->insert_id();
 		$this->db->where('id',$last_id);
 		return $query = $this->db->get('tbz_users')->result();
    }

    public function checkuser($request){
    	$this->db->where('email',$request['email']);
    	return $q = $this->db->get('tbz_users')->num_rows();
    }
    public function checkusers($request){
     // print_r($request);
      $this->db->where('email',$request['email']);
      
        $this->db->where_not_in('id',$request['id']);
     $q = $this->db->get('tbz_users')->num_rows();
     //echo $this->db->last_query();
      return $q;
      
    }
    public function checkph($request){
       $this->db->where('phone',$request['phone']);
      
        $this->db->where_not_in('id',$request['id']);
     $q = $this->db->get('tbz_users')->num_rows();
     //echo $this->db->last_query();
      return $q;
    }

    public function signin($request){
    
        $this->db->where('email', $request['email']);
        $this->db->where('password',  md5($request['password']));
      $query  = $this->db->get('tbz_users');  //--- Table name = User
       return $query->row();
    }

    public function forgotpassword($request){
        
        $this->db->where('email',$request['email']);
         $query=$this->db->get('tbz_users');
                
         $query=$query->row();
       
         
     $settings = get_icon();
    
   
         if($query)
         {         
           $username=$query->first_name;
           $from_email=$settings->admin_email;          
           $this->load->helper('string');
           $rand_pwd= random_string('alnum', 8);
           $password= array('password'=>md5($rand_pwd));
           
/*           $password1=array('password'=>$password);          
           echo "asdasdsadsad".$password;
             echo $password;
             die();*/            
           $this->db->where('email',$request['email']);
            
         $query=$this->db->update('tbz_users',$password); 
          
               if($query)
               {
                   $configs = array(
                        'protocol'=>'smtp',
                        'smtp_host'=>$settings->smtp_host,
                        'smtp_user'=>$settings->smtp_username,
                        'smtp_pass'=>$settings->smtp_password,
                        'smtp_port'=>'587'
                        ); 
                 
                                   
                $this->load->library('email');
                $this->email->initialize($configs);
                $this->email->from($from_email, $username);
              $this->email->to($request);
            

                $this->email->subject('Forget Password');
                $this->email->message('New Password is '.$rand_pwd.' ');
                //echo $this->email->send();
               
               if($this->email->send()) {        
                  return "EmailSend";
                  }
                  else
                  {
                  return "error";
                  }
                  }
           }
           else
           {
               return "EmailNotExist";
           }

    }

    public function editprofile($request)
    {
      $this->db->where('id',$request);
     $q = $this->db->get('tbz_users');
     return $q->row();
    }

    public function updatedata($request){
      $this->db->where('id',$request['id']);
     $q= $this->db->update('tbz_users',$request);
      if($q)
      {
        return true;
      }
      else{
        return false;
      }
    }

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
    public function confirm($request){
     // $pass=$request['curntpaswrd'];
    $this->db->where('id',$request['id']);
    $this->db->where('password',  md5($request['curntpaswrd']));
    $query = $this->db->get('tbz_users');
    //var_dump($query->result());
    if($query->num_rows() == 1)   
    {
      if($request['newpaswrd']==$request['password'])
      {
        $value = array('password'=>md5($request['newpaswrd']) );
        $this->db->where('id',$request['id']);
        $s=$this->db->update('tbz_users',$value);
        if($s)
        {
          return 1; 
        }
        else
        {
          return 0;
        }   
      }
      else
      {
        return 2;
      }
    }
    else
    {
      return 3;
    }
    }

    public function booknghstry($request){
      $query = $this->db->query("SELECT `tbz_booking_details`.id,`tbz_movies`.image,
        `tbz_show_details`.date,`tbz_booking_details`.sub_total,`tbz_booking_details`.no_ticket,
        `tbz_booking_details`.booking_fees,`tbz_booking_details`.service_tax,
        `tbz_booking_details`.swachh_bharat_cess,`tbz_booking_details`.amount,
        `tbz_booking_details`.booking_id,`tbz_theater_details`.theater_name,
        `tbz_location`.location,`tbz_movies`.movie_name,`tbz_movies`.certificate,
        `tbz_show_details`.screen_timing,`tbz_booking_details`.qr_code 
        FROM `tbz_booking_details` LEFT JOIN `tbz_show_details` 
        ON `tbz_booking_details`.show_id = `tbz_show_details`.id 
        LEFT JOIN `tbz_theater_details` ON `tbz_show_details`.cinemas_id = `tbz_theater_details`.id 
        LEFT JOIN `tbz_location` ON `tbz_location`.id = `tbz_theater_details`.city
         LEFt JOIN `tbz_movies` ON `tbz_movies`.id = `tbz_show_details`.movie_name_id
          WHERE `tbz_booking_details`.user_id = '$request'
           ORDER BY `tbz_booking_details`.`id` DESC");
    return $result = $query->result();
    }

    public function gettrailers($date,$request){
//print_r($request);
        $this->db->select('tbz_movies.id,tbz_movies.trailer,tbz_movies.image,tbz_movies.movie_name,tbz_language.name');
        $this->db->from('tbz_show_details');             
      
        $this->db->join('tbz_movies','tbz_show_details.movie_name_id=tbz_movies.id');
         $this->db->join('tbz_theater_details','tbz_theater_details.id = tbz_show_details.cinemas_id');
        $this->db->join('tbz_language','tbz_movies.language=tbz_language.id');
          
            $this->db->where('tbz_theater_details`.`city`',$request['location_id']);
    $this->db->where('date >=',$date);
    $this->db->group_by('tbz_show_details.movie_name_id');  
           $query = $this->db->get();
          // echo $this->db->last_query();

         return $query->result();


    }

    public function cmngson($request){
     $date = date("Y-m-d");
    $this->db->select('tbz_movies.id as id, tbz_movies.movie_name,tbz_movies.trailer, tbz_language.name, tbz_movies.image, tbz_tags.tag_name, tbz_language.id as language');
    $this->db->from('tbz_movies as tbz_movies');
    $this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
    $this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
    // $this->db->join('tbz_trailers','tbz_trailers.movie = tbz_movies.id','left');
    $this->db->where('release_date > ',$date);
    $query = $this->db->get();
    //echo $this->db->last_query();
    $result = $query->result();
         
         return $result;

    }

    public function comngMovies($request){
      $date = date("Y-m-d");
    $this->db->select('tbz_movies.id as id,
                       tbz_movies.movie_name,
                       tbz_language.id as language, 
                       tbz_movies.image, 
                       tbz_movies.trailer,
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
    $this->db->where('release_date > ',$date);
    $this->db->group_by('tbz_movies.id');
    $query = $this->db->get();
   // echo $this->db->last_query();
    $result = $query->result();
        
        return $result;
    }

    public function getmoviedetails($request){
 
 /*     $this->db->select(' tbz_movies.id as id,
                        tbz_movies.movie_name,
                        tbz_movies.image,
              tbz_movies.certificate,
                        tbz_movies.film_budget,
              tbz_movies.release_date, 
                        tbz_movies.total_hours, 
                        tbz_movies.description,
              tbz_language.name,
                            tbz_reviews.title, 
                        tbz_reviews.comments,
              tbz_movies.trailer
              tbz_tags.tag_name,
              tbz_show_details.facebook_link,
              tbz_show_details.google_plus,
              tbz_show_details.twiter_link,
             
              dirsn.actors_name as director_name,
              
                        tbz_actors.actors_name as screen_playnames,
              GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",tbz_actors.actors_name)) SEPARATOR",") as screen_playnames,  
              
              ass.tag_name as tags_select,
                GROUP_CONCAT(DISTINCT (CONCAT_WS ("<#>",ass.tag_name)) SEPARATOR",") as tags_select   
                        ');
    $this->db->from('tbz_movies');
    $this->db->join('tbz_tags as ass', 'FIND_IN_SET(ass.id, tbz_movies.tag_id) > 0','left');
    $this->db->join('tbz_trailers','tbz_trailers.movie = tbz_movies.id','left');
    $this->db->join('tbz_show_details','tbz_show_details.movie_name_id = tbz_movies.id','left');
    $this->db->join('tbz_tags','tbz_tags.id = tbz_movies.tag_id','left');
    $this->db->join('tbz_reviews','tbz_reviews.movie = tbz_movies.id','left');
    $this->db->join('tbz_language','tbz_language.id = tbz_movies.language','left');
    $this->db->join('tbz_actors dirsn', 'dirsn.id = tbz_movies.director_name_id','left');
    $this->db->join('tbz_actors ', 'FIND_IN_SET(tbz_actors.id, tbz_movies.actor_name_id) > 0','left');
    $this->db->where('tbz_movies.id',$request);

    $this->db->group_by("tbz_movies.id");
    $query = $this->db->get();
    echo $this->db->last_query();
    return $query->row();
*/


$this->db->select(' tbz_movies.id as id,
                        tbz_movies.movie_name,
                        tbz_movies.image,
                        
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
    $this->db->where('tbz_movies.id',$request);
    //$this->db->where('tbz_show_details.date',$date);
    $this->db->group_by("tbz_movies.id");
    $query = $this->db->get();
    return $query->row();


  }
  
  public function count_movie_rate($request){
    /*echo "jhljkh";
     print_r($request);
    $where_data = array('movie' => $request);
    $select_data="*";
    $result = $this->get_table_where( $select_data, $where_data, "tbz_reviews" );*/
    $this->db->where('movie',$request);
   $result= $this->db->get("tbz_reviews");
  // echo $this->db->last_query();
    return count($result);
  }
  public function movie_rate($request){
     
    $this->db->select("ROUND(AVG(rate)) as rating");
    $this->db->from('tbz_reviews');
    $this->db->where('movie',$request);
    $query = $this->db->get();
    $result = $query->row();
        
        return $result->rating;
  }

  public function comments($request)
  {
  $this->db->select('comments');
  $this->db->where('movie',$request);
  $res=$this->db->get('tbz_reviews');
 // echo $this->db->last_query();
  return $res->result();
 }

  public function image($request){
  $this->db->select('image');
  $this->db->where('movie',$request);
  $res=$this->db->get('tbz_gallery');
  return $res->result();
 }


  public function latest_films($request){
    $date = date("Y-m-d");
  $this->db->select('tbz_movies.id,tbz_movies.image,tbz_movies.movie_name,tbz_language.name');
    $this->db->from('tbz_show_details');     
        
        $this->db->join('tbz_movies','tbz_show_details.movie_name_id=tbz_movies.id');
        $this->db->join('tbz_language','tbz_movies.language=tbz_language.id');
        $this->db->join('tbz_theater_details','tbz_theater_details.id = tbz_show_details.cinemas_id');
        $this->db->where('tbz_show_details.date ',$date);
        $this->db->where('tbz_theater_details.city',$request['city']);
        $this->db->group_by('tbz_movies.id');
        $this->db->order_by('release_date',"desc");

        $this->db->limit(5,0);
       $res= $this->db->get();
       // echo $this->db->last_query();die();
       return $res->result();



 
 }

 public function get_film_details($data){
    $this->db->select('tbz_movies.movie_name,tbz_language.name as language');
    $this->db->from('tbz_movies');     
       $this->db->join('tbz_language','tbz_movies.language=tbz_language.id');
       
        $this->db->where('tbz_movies.id',$data);
       
       $res= $this->db->get();
       // echo $this->db->last_query();
       return $res->result();
 }

  public function show_theater($request){
 // $date = $data->date;
    if($request->currnt_date==''){
      $date = date('Y-m-d');
    } else {
      $date = $request->currnt_date;
    }
    if(!isset($request->location_id)){
      $city = "1";
    }
    else{
      $city=$request->location_id;
    }
   
    /*$this->db->select('tbz_show_details.id,tbz_chinema.name, GROUP_CONCAT(  DISTINCT (CONCAT_WS ("<#>",screen_timing)) SEPARATOR ",") as asasas,tbz_chinema_screen.layout,tbz_chinema_screen.preview');
    $this->db->from('tbz_show_details');
    $this->db->join('tbz_movies',"tbz_movies.id = tbz_show_details.movie_name_id AND tbz_movies.id = '$id'");
    $this->db->join('tbz_chinema','tbz_chinema.id =  tbz_show_details.cinemas_id','left');
    $this->db->join('tbz_chinema_screen','tbz_chinema_screen.cinemas_id=  tbz_show_details.cinemas_id','left');
    $this->db->where('tbz_show_details.date',$date);
    $this->db->where('tbz_show_details.city_id',$city);
    $this->db->group_by('tbz_chinema.id');*/

    $query = $this->db->query("SELECT GROUP_CONCAT(  DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.screen_timing)) SEPARATOR ',') as asasas,GROUP_CONCAT( DISTINCT (CONCAT_WS ('<#>',`tbz_show_details`.id)) SEPARATOR ',') as show_ids,`tbz_chinema_screen`.layout,
      `tbz_language`.name AS language,`tbz_movies`.movie_name,`tbz_theater_details`.`theater_name`,`tbz_theater_details`.id AS theater FROM `tbz_show_details` 
      LEFT JOIN `tbz_chinema_screen` ON `tbz_show_details`.screen_name = `tbz_chinema_screen`.id
       LEFT JOIN `tbz_movies` ON  `tbz_show_details`.movie_name_id=`tbz_movies`.id 
       LEFT JOIN `tbz_language` ON `tbz_movies`.language=`tbz_language`.id
         LEFT JOIN `tbz_theater_details` ON `tbz_theater_details`.id = `tbz_show_details`.`cinemas_id` 
          WHERE `tbz_show_details`.movie_name_id = '$request->id' AND `tbz_show_details`.`date` = '$date' 
          AND `tbz_theater_details`.`city` = '$city' GROUP BY `tbz_chinema_screen`.id");
//echo $this->db->last_query();
       // $query = $this->db->get();      
    return $query->result();
 }
 public function get_theater_info($data){

    
    $query =  $this->db->query("SELECT tbz_movies.movie_name,tbz_movies.certificate,tbz_language.name AS language,tbz_format.format_name,tbz_theater_details.`theater_name` AS theater,tbz_location.location,tbz_chinema_screen.preview,tbz_chinema_screen.screen_name,tbz_show_details.screen_timing FROM `tbz_show_details` LEFT JOIN tbz_movies ON tbz_show_details.movie_name_id = `tbz_movies`.id LEFT JOIN tbz_language ON tbz_language.id = tbz_movies.language LEFT JOIN tbz_format ON tbz_movies.format = tbz_format.id LEFt JOIN tbz_theater_details ON tbz_show_details.cinemas_id = tbz_theater_details.id LEFT JOIN tbz_location ON tbz_theater_details.city = tbz_location.id LEFT JOIN tbz_chinema_screen ON tbz_chinema_screen.cinemas_id = tbz_show_details.cinemas_id AND tbz_chinema_screen.id = tbz_show_details.screen_name WHERE tbz_show_details.id =".$data)->row();
  //echo $this->db->last_query();die();
  return $query;
  
  }

  public function get_ticket_info($data){
   $this->db->select('ticket');
    $q= $this->db->where('show_id',$data)->get('tbz_ticket_booked')->result();
   //echo $this->db->last_query();die();
    return $q;
  }
  public function get_topmovie_details(){
    
    //$query = $this->db->get('tbz_movies'); 
    $query=$this->db->query(' SELECT ROUND(AVG(tbz_movie_rate.rate)*20) AS rate,tbz_movie_rate.movie_id,tbz_movies.* FROM `tbz_movie_rate` INNER JOIN tbz_movies ON tbz_movies.id = tbz_movie_rate.movie_id GROUP BY movie_id ORDER BY rate DESC');
        // echo $this->db->last_query();
        return $query->result();
    }
public function get_location(){
 $query= $this->db->get('tbz_location');
 return $query->result();

}
public function get_my_key($data){
  $this->db->select('app_secret_key');
  $this->db->where('app_secret_key',$data['mykey']);
  $query =$this->db->get('tbz_settings');
// echo $this->db->last_query();
  return $query->result();
}

}