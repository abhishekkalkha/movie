<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

	// Access-Control headers are received during OPTIONS requests
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		exit(0);
	}
class Webservices extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		
		$this->load->model('Model_webservice');
		
		
		
 	}

  public function signup(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
 // print_r($request);

    $checkuser=$this->Model_webservice->checkuser($request);
    // print_r($checkuser);
    
    if($checkuser>0){
       $res=  array( 'status'=>'failure','message'=> "Email Id Already exists");
    }
    else{
       $result = $this->Model_webservice->signup($request);
       
       if($result){
         $res= array( 'status'=>'success','message'=> "Registration Successfull",'user'=>$result);
       }
       else{
         $res= array( 'status'=>'failure','message'=> "Sorry Not Registered.Please try again");
       }
    }
    
  
    print json_encode($res);
  }

  public function signin(){

     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata,true);
     //print_r($request);
     $result = $this->Model_webservice->signin($request);
     if($result){
       $finresult = array( 'status'  => 'success','message' =>'Successfully Login', 'code'    => 'success','result'=>$result);
     }else{
       $finresult = array( 'status'  => 'failed','message' => 'Unknown Credential , please try again!', 'code' => 'Login failed');     
  }

     print json_encode($finresult);
  }

  public function forgot(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);

    $result = $this->Model_webservice->forgotpassword($request);
         if($result=="EmailSend")
         {
             $finresult = array( 'status'  => 'success','message' =>'Password changed successfully', 'code'    => 'success','result'=>$result);
         }
         else if($result=="EmailNotExist" )
         {    
             $finresult = array( 'status'  => 'failed','message' => 'Mail id not exist!', 'code' => 'Not exist');
         } 
         print json_encode($finresult);
  }

  public function editprofile(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result = $this->Model_webservice->editprofile($request);
   
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'get data', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Mail id not exist!', 'code' => 'Not edited');
    }
     print json_encode($final);
  }

  public function updatedata(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    //print_r($request);
     $checkuser=$this->Model_webservice->checkusers($request);
     $phone=$this->Model_webservice->checkph($request);
     //print_r($checkuser);
     //print_r($phone);
     if($checkuser > 0 || $phone > 0){
      $final= array('status'=>'failed','message'=> "Email Id or Phone number Already exists");
     }
     else
     {
      $result = $this->Model_webservice->updatedata($request);
      if($result)
       {
         $final =  array( 'status'  => 'success','message' =>'Updated Successfully', 'code'    => 'success','result'=>$result);
       }
       else{
         $final=array( 'status'  => 'failed','message' => 'Sorry Not updated..Try again', 'code' => 'Not Updated');
       }
     }
    print json_encode($final);
  }

  public function confirmpassword(){
     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata,true);
     $result = $this->Model_webservice->confirm($request);
    // print_r($result);
     if($result == 1){
       $final =  array( 'status'  => 'success','message' =>'Updated Successfully', 'code'    => 'success','result'=>$result);
     }
     else{
       $final=array( 'status'  => 'failed','message' => 'Sorry Not updated..Try again', 'code' => 'Invalid');
     }
     print json_encode($final);
  }

  public function booking_history(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result = $this->Model_webservice->booknghstry($request);
    if($result)
    {
       $final =  array( 'status'  => 'success','message' =>'Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no films', 'code' => 'No history');
    }
    print json_encode($final);
  }

  public function trailers(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $date = date('Y-m-d');
    if(!isset($request['location_id'])){
      $request['location_id'] = 1;
    }
    $result=$this->Model_webservice->gettrailers($date,$request);   
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no trailers now', 'code' => 'No trailers');
    }
    print json_encode($final);

  }

  public function commngsoon(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result = $this->Model_webservice->cmngson($request);
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no films', 'code' => 'No trailers');
    }
    print json_encode($final);
  }


  public function comingMovies(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result=$this->Model_webservice->comngMovies($request);
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'Movies Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no films', 'code' => 'No movies');
    }
    print json_encode($final);   
  }
     

  public function getmoviedetails(){
     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata,true);
     $result=$this->Model_webservice->getmoviedetails($request);
     $crew = $this->Model_webservice->get_crew($request);
               $crew = json_decode($crew->crew);
      $new_result=array();
      $array = array();
     foreach($crew as $key =>$value){
          foreach ($value as $key => $val) {
               $tag_name =  $this->call_tag($key);
               $person = $this->call_person($val);
               $array=array('role'=>$tag_name,
                            'actor_name'=>$person->actors_name,

                           );
               //$array = array($tag_name=>$person);
               $new_result[]= $array;
          }   
     }
     $number = $this->Model_webservice->count_movie_rate($request);
     $rate = $this->Model_webservice->movie_rate($request);
     $comments=$this->Model_webservice->comments($request);
     $images = $this->Model_webservice->image($request);

if($crew !=NULL){
        $result->cast=$new_result;
      }
     if($rate !=NULL)
     {
        $percentage = ($rate /5)*100;
        $result->percentage =$percentage;
        $result->rateavg =$rate;
        $result->comments= $comments;
        $result->pics=$images;
     }
     if($number>0){
        $result->number =$number;
     }
     if($result)
     {
         $final =  array( 'status'  => 'success','message' =>'Movies Selected Successfully', 'code'    => 'success','result'=>$result);
     }
     else{
          $final=array( 'status'  => 'failed','message' => 'Sorry There is no films', 'code' => 'No movies');
     }
     print json_encode($final);   
  }
function call_tag($key) {  
$query = $this->db->where('id',$key)->get('tbz_role')->row();
return $query->role_name;

}

function call_person($value){
$query = $this->db->where('id',$value)->get('tbz_actors')->row();
return $query;

}

  public function getdate(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $curr_Date = date('Y-m-d');
    $tom_Date = date('Y-m-d', strtotime("+1 days"));
    $next_Date = date('Y-m-d', strtotime("+2 days"));
    $data = array('error' => '','result' => array('current'=>$curr_Date,'tomorrow'=>$tom_Date,'next_Date'=>$next_Date));
    print json_encode($data);
  }

  public function latest_films(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true); 
    if(!isset($request['city'])){
      $request['city'] = 1;
    }
    $result=$this->Model_webservice->latest_films($request);
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'Movies Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no films', 'code' => 'No movies');
    }
    print json_encode($final);   
  }

  public function theatre(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $request = (object)$request;
    $film=$this->Model_webservice->get_film_details($request->id);
    $result=$this->Model_webservice->show_theater($request);
    if(count($result)>0)
    {
      if($request->currnt_date=='')
      {
         $request->currnt_date = date('Y-m-d');
      }
      $current_date = date('Y-m-d');
      $seat_rate = array();
      foreach($result as $rows)
      {
         $seat = json_decode($rows->layout);
         foreach ($seat as $seat_price)
         {
           $seat_rate[] = $seat_price->price->value;
         }
         $show_time_array = array_map('trim', explode(',',$rows->asasas));
         foreach ($show_time_array as $time) 
         {
           $show_time[] = $time;
         }
      }
      $seat_rate = array_unique($seat_rate);
      $show_time = array_unique($show_time);
      usort($show_time, function($a, $b) { return $a - $b; });
      usort($seat_rate, function($a, $b) { return $a - $b; });
      $min_rate = min($seat_rate);
      $max_rate = max($seat_rate);
      $min_start = floor($min_rate/100);
      $min_end = ceil($max_rate/100);   
      $start_end = ($min_start+1)*100;
      $start_value = $min_start+1;
      $price_range[] =  $min_rate." - ".$start_end;
      $j = 0;
      for($i=$start_value;$i<$min_end;$i++)
      {
          $price_start = $start_value;
          $price_end = $start_value+1;
          $price_range[] =  (($price_start*100)+1)." - ".($price_end*100);
          if($price_end==$min_end){
            continue;
          }
          $start_value = $price_end;
      }
      $mor_start = DateTime::createFromFormat('H:i a', "12:00 AM");
      $mor_end = DateTime::createFromFormat('H:i a', "11:59 AM");
      $after_start = DateTime::createFromFormat('H:i a', "12:00 PM");
      $after_end = DateTime::createFromFormat('H:i a', "03:59 PM");
      $eve_start = DateTime::createFromFormat('H:i a', "04:00 PM");
      $eve_end = DateTime::createFromFormat('H:i a', "06:59 PM");
      $night_start = DateTime::createFromFormat('H:i a', "07:00 PM");
      $night_end = DateTime::createFromFormat('H:i a', "11:59 PM");
      foreach($show_time  as $time)
      {
        $time = DateTime::createFromFormat('H:i a', $time);
        if($time >= $mor_start && $time <= $mor_end)
        {
          $time_range[] = array("shift"=>'Morning',"value"=>'12:00-11:59 AM');
        }
        if($time >= $after_start && $time <= $after_end)
        {
          $time_range[] = array("shift"=>'Afternoon',"value"=>'12:00-03:59 PM');
        }
        if($time >= $eve_start && $time <= $eve_end)
        {
          $time_range[] = array("shift"=>'Evening',"value"=>'04:00-06:59 PM');
        }
        if($time >= $night_start && $time <= $night_end)
        {
          $time_range[] = array("shift"=>'Night',"value"=>'07:00-11:59 PM');
        }
      }

      $time_range = array_map("unserialize", array_unique(array_map("serialize", $time_range)));
      $theater_array = array();
      foreach ($result as $rows) 
      {
        if (array_key_exists($rows->theater, $theater_array))
        {           
          $theater_array[$rows->theater]['show_ids'] = $theater_array[$rows->theater]['show_ids'].','.$rows->show_ids;
        }
        else {
          $theater_array[$rows->theater] =array();
          $theater_array[$rows->theater]['name'] = $rows->theater_name;
          $theater_array[$rows->theater]['movie_name'] = $rows->movie_name;
          $theater_array[$rows->theater]['language'] = $rows->language;
          $theater_array[$rows->theater]['show_ids'] = $rows->show_ids;
        }        
      }   
      $all_result = array();
      foreach ($theater_array as $key=>$rows)
      {
        $rows = (object)$rows;
        $new_result['time'] = array();
        $time_array = array();
        $new_result['name'] = $rows->name;
        $new_result['movie_name'] = $rows->movie_name;
        $new_result['language'] = $rows->language;
        $ids = array_map('trim', explode(',',$rows->show_ids));
        foreach ($ids as $rs) 
        {
          $time_array[$rs]['time'] = $this->get_show_id($rs);
        }
        $array = asort($time_array);
        $newDateTime = date('h:i A', strtotime('+1 hour'));
        $new_time = array();
        foreach ($time_array as $time_arr)
        {
          array_push($new_time, $time_arr['time']);
        }
        foreach ($time_array as $key=>$time)
         {
           if($current_date==$request->currnt_date)
           {
             $current = $newDateTime;
             $minutes_diff = round((strtotime($time['time']) - strtotime($current)) / 60);
             if($minutes_diff>0)
             {
               $new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
             }
             else {
               $new_result['time'][] = array('show_id'=>$key,'status'=>'inactive','time'=>$time['time']);
             }
           } 
           else {
             $new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
           } 
         }
        array_push($all_result,$new_result);    
      } 
      $data = array('status' => 'success','result' => $all_result,'price_range'=>$price_range,'show_time'=>$time_range,'','film_info'=>$film);    
    }
    else {
     $data = array('status' => 'success','result' => array(),'price_range'=>array(),'show_time'=>array(),'','film_info'=>$film);
    } 
    print json_encode($data);  
  }

  public function get_show_id($id){
    $row = $this->db->where('id',$id)->get('tbz_show_details')->row();
    return $row->screen_timing;
  }

  public function callTheater(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $request = (object)$request;
    $result = $this->Model_webservice->show_theater($request);
    $mor_start = DateTime::createFromFormat('H:i a', "12:00 AM");
    $mor_end = DateTime::createFromFormat('H:i a', "11:59 AM");
    $after_start = DateTime::createFromFormat('H:i a', "12:00 PM");
    $after_end = DateTime::createFromFormat('H:i a', "03:59 PM");
    $eve_start = DateTime::createFromFormat('H:i a', "04:00 PM");
    $eve_end = DateTime::createFromFormat('H:i a', "06:59 PM");
    $night_start = DateTime::createFromFormat('H:i a', "07:00 PM");
    $night_end = DateTime::createFromFormat('H:i a', "11:59 PM");  
    if($request->currnt_date=='')
    {
      $request->currnt_date = date('Y-m-d');
    } 
    $current_date = date('Y-m-d');
    $result_key = array();
    $time_array = array();
    $seat_rate = array();
    $price_result = array();
    if($request->price!='')
    {
      list($start,$end) = explode(' - ', $request->price);
      foreach($result as $rows)
      {
        $seat_rate = array();
        $seat = json_decode($rows->layout);     
        foreach ($seat as $seat_price)
        {
          $rate = $seat_price->price->value;
          if($start<=$rate && $end>=$rate)
          {           
            $price_result[] = $rows;
            break;
          }
        }
      }
    }
    else {
      $price_result = $result;
    }
    $theater_array = array();
    foreach ($price_result as $rows)
    {
      if (array_key_exists($rows->theater, $theater_array))
      {           
        $theater_array[$rows->theater]['show_ids'] = $theater_array[$rows->theater]['show_ids'].','.$rows->show_ids;
      }
      else {
        $theater_array[$rows->theater] =array();
        $theater_array[$rows->theater]['name'] = $rows->name;
        $theater_array[$rows->theater]['show_ids'] = $rows->show_ids;
        $theater_array[$rows->theater]['movie_name'] = $rows->movie_name;
        $theater_array[$rows->theater]['language'] = $rows->language;
      }  
    }
    if($request->time!='')
    {
      foreach($theater_array as $key => $rows)
      {
        $rows = (object)$rows;
        $new_result['time'] = array();
        $time_array = array();
        $new_result['name'] = $rows->name;
        $new_result['movie_name'] = $rows->movie_name;
        $new_result['language'] = $rows->language;
        $ids = array_map('trim', explode(',',$rows->show_ids));
        foreach ($ids as $rs) 
        {
          $time_array[$rs]['time'] = $this->get_show_id($rs);
        }
        foreach ($time_array as $time_key=>$time_new)
        {
          $actual_time = $time_new['time'];
          $time = DateTime::createFromFormat('H:i a', $time_new['time']);
          if($time >= $mor_start && $time <= $mor_end)
          {
            if($request->time == 'Morning')
            {
              $result_key[] = $key;
              $time_array_new[$key][] = $time_key;
            }
          }
          if($time >= $after_start && $time <= $after_end)
          {
            if($request->time == 'Afternoon')
            {
              $result_key[] = $key;
              $time_array_new[$key][] = $time_key;
            }
          }
          if($time >= $eve_start && $time <= $eve_end)
          {
            if($request->time == 'Evening')
            {
              $result_key[] = $key;
              $time_array_new[$key][] = $time_key;
            }
          }
          if($time >= $night_start && $time <= $night_end)
          {
            if($request->time == 'Night')
            {
              $result_key[] = $key;
              $time_array_new[$key][] = $time_key;
            }
          }
        }
      }
      $result_key = array_unique($result_key);
      foreach ($result_key as $row)
      {  
        $test_result = array();
        $test_result = $theater_array[$row];
        $time = $time_array_new[$row];
        $test_result['show_ids'] = $time;
        $filter_result[] = $test_result;
      }
    }
    else {
      foreach($theater_array as $rows)
      {
        $rows['show_ids'] = array_map('trim', explode(',',$rows['show_ids']));    
        $filter_result[] = $rows;
      }
    }
    $all_result = array();
    foreach ($filter_result as $rows)
    {
      $rows = (object)$rows;
      $new_result['time'] = array();
      $time_array = array();  
      $new_result['name'] = $rows->name;
      foreach ($rows->show_ids as $rs)
      {
        $time_array[$rs]['time'] = $this->get_show_id($rs);
      }
      $array = asort($time_array);
      $newDateTime = date('h:i A', strtotime('+1 hour'));
      foreach ($time_array as $key=>$time)
      {
        if($current_date==$request->currnt_date)
        {
          $current = $newDateTime;
          $minutes_diff = round((strtotime($time['time']) - strtotime($current)) / 60);
          if($minutes_diff>0)
          {
            $new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
          } 
          else {
            $new_result['time'][] = array('show_id'=>$key,'status'=>'inactive','time'=>$time['time']);
          }
        }
        else {
          $new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
        }
      }
      usort($new_result['time'],function($a,$b)
      {
          return $a['time'] - $b['time'];
      });           
      array_push($all_result,$new_result);        
    }
    $data = array('error' => '','result' => $all_result);
      print json_encode($data);    
  }

  public function showTheaterInfo(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata,true);

    $bookedarray=array();
    $result = $this->Model_webservice->get_theater_info($data);
    $booked = $this->Model_webservice->get_ticket_info($data);
    foreach ($booked as $rs)
    {
      $bookedarray[]=$rs;
    }
    $data = array('error' => '','result' => $result,'booked'=>$bookedarray);
    print json_encode($data);
  }

  public function payment_form(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata,true);
    $show_id = $data['show_id'];
    $seat=json_decode($data['seat']);
    $price = 0;
    $user_id = $data['user_id']; 
    $no_of_seat = count($seat);
    $booking_fees = $no_of_seat*20;
    $service_tax = (($booking_fees*14)/100);
    $swachh_bharat = (($booking_fees*.5)/100);
    $internet_fee = $booking_fees + $service_tax + $swachh_bharat;
    foreach ($seat as $rs)
    {
      $seat_ids[] = $rs->seat_id;
      $seat_name[] = $rs->seat_name;
      $price += $rs->price;
    }
    $sub_total = $price;
    $price = round($price + $internet_fee);
    $seat_ids = implode(',', $seat_ids);
    $seat_name = implode(',', $seat_name);
    $this->db->where('user_id',$user_id)->delete('tbz_booking_temporary');
    $data = array(
            'user_id'=>$user_id,
            'show_id'=>$show_id,
            'seat'=>$seat_name,
            'seat_ids'=>$seat_ids,
            'no_ticket'=>$no_of_seat,
            'amount'=>$price,
            'sub_total'=>$sub_total,
            'booking_fees'=>$booking_fees,
            'service_tax'=>$service_tax,
            'swachh_bharat_cess'=>$swachh_bharat,
            'time'=>date('Y-m-d H:i:s'));
    $this->db->insert('tbz_booking_temporary',$data);
    $last_id = $this->db->insert_id();
    $result = array('no_seat'=>$no_of_seat,'seat'=>$seat_name,'sub_total'=>$sub_total,'internet_fee'=>$internet_fee,'booking_fees'=>$booking_fees,'service_tax'=>$service_tax,'swachh_bharat'=>$swachh_bharat,'price'=>$price,'insert_id'=>$last_id);
    if($result)
    {
      $data = array('status' => 'success','message'=>'data received','result'=>$result);
    }
    else{
      $data = array('status' => 'failed','message'=>'sorry failed');
    }
    print json_encode($data);
  }

  public function booking_complete(){
    $postdata = file_get_contents("php://input");
    $dataa = json_decode($postdata,true);
    $book_id = 'TB'.rand('11111','99999'); 
    $rs = $this->db->where('id',$dataa)->get('tbz_booking_temporary')->row();

    $data = array('show_id'=>$rs->show_id,
              'date'=>date('Y-m-d H:i:s'),
              'no_ticket'=>$rs->no_ticket,
              'seat_no'=>$rs->seat,
              'amount'=>$rs->amount,
              'booking_id'=>$book_id,
              'user_id'=>$rs->user_id,          
              'status'=>'Completed',
              'sub_total'=>$rs->sub_total,
              'booking_fees'=>$rs->booking_fees,
              'service_tax'=>$rs->service_tax,
              'swachh_bharat_cess'=>$rs->swachh_bharat_cess,
              );
    $this->db->insert('tbz_booking_details',$data);
    $data['insert_id'] = $this->db->insert_id();
    $this->db->where('id',$dataa)->delete('tbz_booking_temporary');
    $data['status'] = true;     
    $seats = explode(',', $rs->seat);
    //print_r($rs->seat_ids);die();
    foreach ($seats as $row)
    {
      $this->db->insert('tbz_ticket_booked',array('show_id'=>$rs->show_id,'ticket'=>$row));
    }
    if($data)
    {
       $res =  array( 'status'  => 'success','message' =>'Retrive data Successfully', 'code'    => 'success','result'=>$data);
    }
    else{
          $res=array( 'status'  => 'failed','message' => 'Sorry There is no details', 'code' => 'No trailers');
    }
    print json_encode($res);
  }

  public function get_film_details(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata,true);
    $result=$this->Model_webservice->get_film_details($data);
    if($result)
    {
      $final =  array( 'status'  => 'success','message' =>'Selected Successfully', 'code'    => 'success','result'=>$result);
    }
    else{
      $final=array( 'status'  => 'failed','message' => 'Sorry There is no films on this date', 'code' => 'No history');
    }
     print json_encode($final);
  }

  public function toptrendings(){
     $result=$this->Model_webservice->get_topmovie_details();
     print json_encode($result);
  }

  public function location(){
     $result=$this->Model_webservice->get_location();
     print json_encode($result);
  }

  public function get_booked_tickets(){
    $result = $this->Model_webservice->get_ticket();
  }

  public function get_my_key(){
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata,true);
    print_r($data);
    $result = $this->Model_webservice->get_my_key($data);
    if($result){
      $res= array( 'status'=>'success','message'=> "key exist");
    }
    else{
      $res= array( 'status'=>'failure','message'=> "Sorry Not exist");
    }
    print json_encode($res);
  }
}