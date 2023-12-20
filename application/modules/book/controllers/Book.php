<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends MY_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('book_model','book'); 
        $this->load->library('paypal_lib');
        $this->load->helper('crew');
        check_installer();
    }
	public function bookMovie(){
		
		$this->uri->segment(3);
		$this->load->view('template/header');
		$this->load->view('book');
		$this->load->view('template/footer');
	}

/* GET BOOK MOVIE DETAILS
########################################################
--------------------------------------------------------*/     
    public function getMovies(){  
	  
		$data = $_GET;
	    $result = $this->book->get_movie_details($data);	
	    $crew = $this->book->get_crew($data);
	    $crew = json_decode($crew->crew);
	    $new_result=array();
	    $array = array();
	   foreach($crew as $key =>$value){
          foreach ($value as $key => $val) {
               $tag_name = call_tag($key);
               $person = call_person($val);
               $array=array('role'=>$tag_name,
                            'actor_name'=>$person->actors_name,
                            'image'=>$person->image);
               //$array = array($tag_name=>$person);
               $new_result[]= $array;
          }   
	   }
	    //print_r($new_result);
		$number = $this->book->count_movie_rate($data['id']);
		$rate = $this->book->movie_rate($data['id']);
		$percentage = ($rate /5)*100;
		$result->number =$number;
		$result->percentage =$percentage;
		$result->cast =$new_result;
       /* $existvalues = array_map('trim', explode(',',$result->actors_names));
		$existvalues1 = array_map('trim', explode(',',$result->actors_image));
		
		$result->castandcrews = $existvalues;
		$result->castandcrews1 = $existvalues1;*/
		
		$data = array('status' => 'success','result' => $result);
		print json_encode($data);
	}


	public function getDate(){
		$curr_Date = date('Y-m-d');
		$tom_Date = date('Y-m-d', strtotime("+1 days"));
		$next_Date = date('Y-m-d', strtotime("+2 days"));
		$data = array('error' => '','result' => array('current'=>$curr_Date,'tomorrow'=>$tom_Date,'next_Date'=>$next_Date));
		print json_encode($data);
	}

/* GET THEATER DATA
########################################################
--------------------------------------------------------*/

	public function showTheater(){
		
		$data = json_decode(file_get_contents("php://input"));
		$result = $this->book->get_show_theater($data);	
		if(count($result)>0){

			if($data->date==''){
				$data->date = date('Y-m-d');
			}	

			$current_date = date('Y-m-d');

			$seat_rate = array();
			foreach($result as $rows){
				$seat = json_decode($rows->layout);

				foreach ($seat as $seat_price) {
					$seat_rate[] = $seat_price->price->value;
				}

				$show_time_array = array_map('trim', explode(',',$rows->asasas));

				

				foreach ($show_time_array as $time) {
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
			for($i=$start_value;$i<$min_end;$i++){
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


			foreach($show_time  as $time){
				$time = DateTime::createFromFormat('H:i a', $time);
				if($time >= $mor_start && $time <= $mor_end){
					$time_range[] = array("shift"=>'Morning',"value"=>'12:00-11:59 AM');
		        }

		        if($time >= $after_start && $time <= $after_end){
					$time_range[] = array("shift"=>'Afternoon',"value"=>'12:00-03:59 PM');
		        }

		        if($time >= $eve_start && $time <= $eve_end){
					$time_range[] = array("shift"=>'Evening',"value"=>'04:00-06:59 PM');
		        }

		        if($time >= $night_start && $time <= $night_end){
					$time_range[] = array("shift"=>'Night',"value"=>'07:00-11:59 PM');
		        }
			}

			$time_range = array_map("unserialize", array_unique(array_map("serialize", $time_range)));

			$theater_array = array();

			foreach ($result as $rows) {
				if (array_key_exists($rows->theater, $theater_array)) { 					
				    $theater_array[$rows->theater]['show_ids'] = $theater_array[$rows->theater]['show_ids'].','.$rows->show_ids;
				} else {
					$theater_array[$rows->theater] =array();
					$theater_array[$rows->theater]['name'] = $rows->name;
					$theater_array[$rows->theater]['show_ids'] = $rows->show_ids;
				}
				
			}		



			$all_result = array();

			foreach ($theater_array as $key=>$rows) {
				$rows = (object)$rows;
				$new_result['time'] = array();
				$time_array = array();

				
				$new_result['name'] = $rows->name;
				//$new_result['time'] = array_map('trim', explode(',',$rows->asasas));

				$ids = array_map('trim', explode(',',$rows->show_ids));

				foreach ($ids as $rs) {
					$time_array[$rs]['time'] = $this->get_show_id($rs);
				}
				$array = asort($time_array);



				


				$newDateTime = date('h:i A', strtotime('+1 hour'));

				$new_time = array();

				foreach ($time_array as $time_arr) {
					array_push($new_time, $time_arr['time']);
				}


				/*usort($time_array, function($a, $b) {
   					$x = (strtotime($a['time']) > strtotime($b['time']));
   					return $x;
				});
				print_r($time_array);
				die();*/

				/*usort($new_time,function($a,$b){
    				return $a - $b;
				});*/



				foreach ($time_array as $key=>$time) {
					if($current_date==$data->date){
						$current = $newDateTime;
						$minutes_diff = round((strtotime($time['time']) - strtotime($current)) / 60);

						if($minutes_diff>0){
							$new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
						} else {
							$new_result['time'][] = array('show_id'=>$key,'status'=>'inactive','time'=>$time['time']);
						}
					} else {
						$new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
					}
					

				}

				

				

			array_push($all_result,$new_result);	
			
		}
		$data = array('error' => '','result' => $all_result,'price_range'=>$price_range,'show_time'=>$time_range);

		
	} else {
		$all_result = array();
		$data = array('error' => '','result' => $all_result);
	}

		
	  print json_encode($data);

		

		
	}

	public function get_show_id($id){
		$row = $this->db->where('id',$id)->get('tbz_show_details')->row();
		return $row->screen_timing;

	}


	public function calltimeTheater(){
		$data = json_decode(file_get_contents("php://input"));
		//$data = (object) array('date'=>'2016-09-19','id'=>1);

		$result = $this->book->get_show_theater($data);


		$mor_start = DateTime::createFromFormat('H:i a', "12:00 AM");
	    $mor_end = DateTime::createFromFormat('H:i a', "11:59 AM");

	    $after_start = DateTime::createFromFormat('H:i a', "12:00 PM");
        $after_end = DateTime::createFromFormat('H:i a', "03:59 PM");

        $eve_start = DateTime::createFromFormat('H:i a', "04:00 PM");
        $eve_end = DateTime::createFromFormat('H:i a', "06:59 PM");

        $night_start = DateTime::createFromFormat('H:i a', "07:00 PM");
        $night_end = DateTime::createFromFormat('H:i a', "11:59 PM");

			
        if($data->date==''){
			$data->date = date('Y-m-d');
		}	

		$current_date = date('Y-m-d');

		
        $result_key = array();
        $time_array = array();




		//$seat = json_decode($rows->layout);

		if($data->time!=''){
		
			foreach($result as $key => $rows){
				

				$show_time_array = array_map('trim', explode(',',$rows->asasas));

				

				foreach ($show_time_array as $time) {
					$actual_time = $time;
					$time = DateTime::createFromFormat('H:i a', $time);

					if($time >= $mor_start && $time <= $mor_end){
						if($data->time == 'Morning'){
							$result_key[] = $key;
							$time_array[$key][] = $actual_time;
						}
			        }

			        if($time >= $after_start && $time <= $after_end){
			        	if($data->time == 'Afternoon'){
			        		$result_key[] = $key;
							$time_array[$key][] = $actual_time;
						}
			        }

			        if($time >= $eve_start && $time <= $eve_end){
						if($data->time == 'Evening'){
							$result_key[] = $key;
							$time_array[$key][] = $actual_time;
						}
			        }

			        if($time >= $night_start && $time <= $night_end){
			        	if($data->time == 'Night'){
			        		$result_key[] = $key;
							$time_array[$key][] = $actual_time;
						}
			        }
				}


				

			}

			$result_key = array_unique($result_key);



			foreach ($result_key as $row) {
				$test_result = array();
				$test_result = $result[$row];
				$time = $time_array[$row];	
				$test_result->asasas = $time;
				$filter_result[] = $test_result;
			}
		} else {
			foreach($result as $rows){
				$rows->asasas = array_map('trim', explode(',',$rows->asasas));
				$filter_result[] = $rows;
			}
		}

				
		$all_result = array();

		foreach ($filter_result as $rows) {
			$new_result['time'] = array();
			$new_result['id'] = $rows->id;
			$new_result['name'] = $rows->name;
			$newDateTime = date('h:i A');
			foreach ($rows->asasas as $time) {			

				if($current_date==$data->date){
						$current = $newDateTime;
						$minutes_diff = round((strtotime($time) - strtotime($current)) / 60);

						if($minutes_diff>0){
							$new_result['time'][] = array('status'=>'active','time'=>$time);
						} else {
							$new_result['time'][] = array('status'=>'inactive','time'=>$time);
						}
					} else {
						$new_result['time'][] = array('status'=>'active','time'=>$time);
					}
			}

			//$new_result['time'] = $rows->asasas;

			$seat = json_decode($rows->layout);

			
			
						
			array_push($all_result,$new_result);	
			
		}

		//print_r($all_result);


		$data = array('error' => '','result' => $all_result);
	   print json_encode($data);
	}


	public function callTheater(){

		$data = json_decode(file_get_contents("php://input"));


		
		//$data = (object) array('date'=>'2016-09-19','id'=>1);

		$result = $this->book->get_show_theater($data);


		$mor_start = DateTime::createFromFormat('H:i a', "12:00 AM");
	    $mor_end = DateTime::createFromFormat('H:i a', "11:59 AM");

	    $after_start = DateTime::createFromFormat('H:i a', "12:00 PM");
        $after_end = DateTime::createFromFormat('H:i a', "03:59 PM");

        $eve_start = DateTime::createFromFormat('H:i a', "04:00 PM");
        $eve_end = DateTime::createFromFormat('H:i a', "06:59 PM");

        $night_start = DateTime::createFromFormat('H:i a', "07:00 PM");
        $night_end = DateTime::createFromFormat('H:i a', "11:59 PM");

			
        if($data->date==''){
			$data->date = date('Y-m-d');
		}	

		$current_date = date('Y-m-d');

		
        $result_key = array();
        $time_array = array();

        $seat_rate = array();
        $price_result = array();

		if($data->price!=''){

			list($start,$end) = explode(' - ', $data->price);



			//$seat = json_decode($rows->layout);
			foreach($result as $rows){
				$seat_rate = array();
				$seat = json_decode($rows->layout);			

				foreach ($seat as $seat_price) {
					$rate = $seat_price->price->value;
					if($start<=$rate && $end>=$rate){						
						$price_result[] = $rows;
						break;
					}
				}

			}
		} else {
			$price_result = $result;
		}

		


        $theater_array = array();

			foreach ($price_result as $rows) {
				if (array_key_exists($rows->theater, $theater_array)) { 					
				    $theater_array[$rows->theater]['show_ids'] = $theater_array[$rows->theater]['show_ids'].','.$rows->show_ids;
				} else {
					$theater_array[$rows->theater] =array();
					$theater_array[$rows->theater]['name'] = $rows->name;
					$theater_array[$rows->theater]['show_ids'] = $rows->show_ids;
				}
				
			}




		//$seat = json_decode($rows->layout);

		if($data->time!=''){
		
			foreach($theater_array as $key => $rows){

				$rows = (object)$rows;
				$new_result['time'] = array();
				$time_array = array();

				
				$new_result['name'] = $rows->name;
				//$new_result['time'] = array_map('trim', explode(',',$rows->asasas));

				$ids = array_map('trim', explode(',',$rows->show_ids));

				foreach ($ids as $rs) {
					$time_array[$rs]['time'] = $this->get_show_id($rs);
				}
				
				

				
				
				

				foreach ($time_array as $time_key=>$time_new) {
					$actual_time = $time_new['time'];
					$time = DateTime::createFromFormat('H:i a', $time_new['time']);

					if($time >= $mor_start && $time <= $mor_end){
						if($data->time == 'Morning'){
							$result_key[] = $key;
							$time_array_new[$key][] = $time_key;
						}
			        }

			        if($time >= $after_start && $time <= $after_end){
			        	if($data->time == 'Afternoon'){
			        		$result_key[] = $key;
							$time_array_new[$key][] = $time_key;
						}
			        }

			        if($time >= $eve_start && $time <= $eve_end){
						if($data->time == 'Evening'){
							$result_key[] = $key;
							$time_array_new[$key][] = $time_key;
						}
			        }

			        if($time >= $night_start && $time <= $night_end){
			        	if($data->time == 'Night'){
			        		$result_key[] = $key;
							$time_array_new[$key][] = $time_key;
						}
			        }
				}


				

			}



			$result_key = array_unique($result_key);



			foreach ($result_key as $row) {
				
				$test_result = array();
				$test_result = $theater_array[$row];
				$time = $time_array_new[$row];
				$test_result['show_ids'] = $time;
				$filter_result[] = $test_result;
			}
		} else {
			foreach($theater_array as $rows){
				$rows['show_ids'] = array_map('trim', explode(',',$rows['show_ids']));		

				$filter_result[] = $rows;
			}
		}

				
		$all_result = array();



		foreach ($filter_result as $rows) {
			/*$new_result['time'] = array();
			
			$new_result['name'] = $rows->name;
			$newDateTime = date('h:i A', strtotime('+1 hour'));



			
			foreach ($rows->asasas as $key=>$time) {			

				if($current_date==$data->date){
						$current = $newDateTime;
						$minutes_diff = round((strtotime($time['time']) - strtotime($current)) / 60);

						if($minutes_diff>0){
							$new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
						} else {
							$new_result['time'][] = array('show_id'=>$key,'status'=>'inactive','time'=>$time['time']);
						}
					} else {
						$new_result['time'] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
					}
			}*/

			//$new_result['time'] = $rows->asasas;

			//$seat = json_decode($rows->layout);

			$rows = (object)$rows;
				$new_result['time'] = array();
				$time_array = array();

				
				$new_result['name'] = $rows->name;
				//$new_result['time'] = array_map('trim', explode(',',$rows->asasas));

				//$ids = array_map('trim', explode(',',$rows->show_ids));

				foreach ($rows->show_ids as $rs) {
					$time_array[$rs]['time'] = $this->get_show_id($rs);
				}
				$array = asort($time_array);

				/*usort($time_array,function($a,$b){
    				return $a['time'] - $b['time'];
				});*/


				$newDateTime = date('h:i A', strtotime('+1 hour'));

				foreach ($time_array as $key=>$time) {
					if($current_date==$data->date){
						$current = $newDateTime;
						$minutes_diff = round((strtotime($time['time']) - strtotime($current)) / 60);

						if($minutes_diff>0){
							$new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
						} else {
							$new_result['time'][] = array('show_id'=>$key,'status'=>'inactive','time'=>$time['time']);
						}
					} else {
						$new_result['time'][] = array('show_id'=>$key,'status'=>'active','time'=>$time['time']);
					}
					

				}




				usort($new_result['time'],function($a,$b){
    				return $a['time'] - $b['time'];
				});

			
			
						
			array_push($all_result,$new_result);	
			
		}


		
		//$filter_result = array();
		

		


		

		
		/*$all_result = array();

		foreach ($filter_result as $rows) {
			$new_result['id'] = $rows->id;
			$new_result['name'] = $rows->name;
			$rows->asasas = array_map('trim', explode(',',$rows->asasas));
			$new_result['time'] = array();

			$newDateTime = date('h:i A');
			foreach ($rows->asasas as $time) {			

				if($current_date==$data->date){
						$current = $newDateTime;
						$minutes_diff = round((strtotime($time) - strtotime($current)) / 60);

						if($minutes_diff>0){
							$new_result['time'][] = array('status'=>'active','time'=>$time);
						} else {
							$new_result['time'][] = array('status'=>'inactive','time'=>$time);
						}
					} else {
						$new_result['time'] = array('status'=>'active','time'=>$time);
					}
			}

			$seat = json_decode($rows->layout);

		
			
			

			

		
			array_push($all_result,$new_result);	
			
		}*/

		//print_r($all_result);


		$data = array('error' => '','result' => $all_result);
	   print json_encode($data);

		

		
	}


	public function showTheaterInfo(){
		$data = json_decode(file_get_contents("php://input"));
		$result = $this->book->get_theater_info($data);
		$booked = $this->book->get_ticket_info($data);

		$data = array('error' => '','result' => $result,'booked'=>$booked);
	   print json_encode($data);
	}

	public function payment_form(){  
	  
		$data = $_GET;
		$seat = json_decode($data['seat']);
		$session_id  = session_id();
		$show_id = $data['show_id'];

		$price = 0;
		$user = $this->session->userdata('logged_in');
		$user_id = $user['id'];

		$no_of_seat = count($seat);

		$booking_fees = $no_of_seat*20;

		$service_tax = (($booking_fees*14)/100);

		$swachh_bharat = (($booking_fees*.5)/100);

		$internet_fee = $booking_fees + $service_tax + $swachh_bharat;




		foreach ($seat as $rs) {
			$seat_ids[] = $rs->seat_id;
			$seat_name[] = $rs->seat_name;
			$price += $rs->price;
		}

		$sub_total = $price;

		$price = round($price + $internet_fee);

		$seat_ids = implode(',', $seat_ids);
		$seat_name = implode(',', $seat_name);

		$user = $this->session->userdata('logged_in');		
		$user_id = $user['id'];
		$this->db->where('user_id',$user_id)->delete('tbz_booking_temporary');

		$data = array('session_id'=>$session_id,
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

		$result = array('no_seat'=>$no_of_seat,'seat'=>$seat_name,'sub_total'=>$sub_total,'internet_fee'=>$internet_fee,'booking_fees'=>$booking_fees,'service_tax'=>$service_tax,'swachh_bharat'=>$swachh_bharat,'price'=>$price,'user_id'=>$user_id);



		$data = array('error' => '','result'=>$result);
		print json_encode($data);



		
	}

	public function payment_process(){
		$data = json_decode(file_get_contents("php://input"));
		$rs = $data->post_data;
        
		if($rs->payment=="card"){
			$this->authorise_payment($rs);
		} else if($rs->payment=="paypal") {
			$this->paypal_payment($rs);
		}
		else{
			$result = $this->booking_complete('Cash','');
			print json_encode($result);

		}
	}

	public function authorise_payment($info){
	
		$user = $this->session->userdata('logged_in');		
		$user_id = $user['id'];

		$user = $this->db->where('id',$user_id)->get('tbz_users')->row();

		$session_id = session_id();

		$rs = $this->db->where('user_id',$user_id)->get('tbz_booking_temporary')->row();
		$desc = 'Booking of tickets '.$rs->seat.' user '.$user_id;



		$auth_net = array(
			'x_card_num'			=> $info->card_no, //'4111111111111111', // Visa
			'x_exp_date'			=> $info->card_month.'/'.$info->card_year,
			'x_card_code'			=> $info->card_cvv,
			'x_description'			=> $desc,
			'x_amount'				=> $info->amount,
			'x_first_name'			=> $user->first_name,
			'x_last_name'			=> $user->last_name,
			'x_address'				=> '',
			'x_city'				=> $user->location,
			'x_state'				=> 'India',
			'x_zip'					=> '',
			'x_country'				=> 'IN',
			'x_phone'				=> $user->phone,
			'x_email'				=> $user->email,
			'x_customer_ip'			=> $this->input->ip_address(),
			);
		$this->authorize_net->setData($auth_net);

		// Try to AUTH_CAPTURE
		if( $this->authorize_net->authorizeAndCapture() )
		{
			//echo '<h2>Success!</h2>';
			//echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
			//echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';
			$txn_id = $this->authorize_net->getTransactionId();
			$result = $this->booking_complete('Authorize',$txn_id);
			print json_encode($result);

		}
		else
		{
			
			$error = $this->authorize_net->getError();
			$result = array('status'=>false,'error'=>$error);	
			print json_encode($result);		
		}
	
	
	}


	public function paypal_payment($amount) {
		
		$returnURL = base_url().'book/success';
        $cancelURL = base_url().'book/cancel';
        $notifyURL = base_url().'book/success';
        $paypalID = $this->config->item('business');
        

        $this->paypal_lib->add_field('business', $paypalID);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Booking Ticket");
        $this->paypal_lib->add_field('custom', "BookedId");
        $this->paypal_lib->add_field('item_number',  "123456325");
        $this->paypal_lib->add_field('amount',  $amount);
       

        $this->paypal_lib->paypal_auto_form();
	}


	function success(){

		//print_r($_POST);
		$paypalInfo	= $this->input->post();


		$data['customer_id'] = $paypalInfo['custom'];		
		$data['id']	= $paypalInfo["item_number"];
		$data['txn_id']	= $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['client_email'] = $paypalInfo["payer_email"];
		$data['payment_status']	= $paypalInfo["payment_status"];
		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		$new_result = $this->booking_complete('paypal',$data['txn_id']);

		//print_r($new_result);

		if($new_result['insert_id']){
			redirect(base_url('book/success_page/'.$new_result['insert_id']));
		}
		
		
		//print json_encode($result);

    }

    function booking_complete($type,$txn_id){
    	$book_id = 'TB'.rand('11111','99999');
    	$id = session_id();
    	$user = $this->session->userdata('logged_in');		
		$user_id = $user['id'];
    	$rs = $this->db->where('session_id',$id)->get('tbz_booking_temporary')->row();
/*    	if($code != ''){
    	$query = $this->db->where('promocode',$code)->get('tbz_promocode')->row();
        }
        if($query){
        	$off = $query->off;
        }
        else{
        	$off = null;
        }*/
    	
    	$data = array('show_id'=>$rs->show_id,
    				  'date'=>date('Y-m-d H:i:s'),
    				  'no_ticket'=>$rs->no_ticket,
    				  'seat_no'=>$rs->seat,
    				  'amount'=>$rs->amount,
    				  'booking_id'=>$book_id,
    				  'user_id'=>$user_id,
    				  'payment'=>$type,
    				  'status'=>'Completed',
    				  'txn_id'=>$txn_id,
    				  'sub_total'=>$rs->sub_total,
					  'booking_fees'=>$rs->booking_fees,
					  'service_tax'=>$rs->service_tax,
					  'swachh_bharat_cess'=>$rs->swachh_bharat_cess
					  /*'Promocode_off'=>$off*/
    				  );
    	$this->db->insert('tbz_booking_details',$data);
    	$data['insert_id'] = $this->db->insert_id();
    	$this->db->where('session_id',$id)->delete('tbz_booking_temporary');
    	$data['status'] = true;    	

    	//$this->book->send_mail($mail);
    	$seats = explode(',', $rs->seat_ids);
    	foreach ($seats as $row) {
    		$this->db->insert('tbz_ticket_booked',array('show_id'=>$rs->show_id,'ticket'=>$row));
    	}

    	return $data;
    }

    function cancel(){    	
    	$this->load->view('template/header');
		$this->load->view('payment_error');
		$this->load->view('template/footer');
    }

    function success_page($id=null){
    	$this->send_mail($id);
    	$data['result'] = $this->db->where('id',$id)->get('tbz_booking_details')->row();
    	$this->load->view('template/header');
		$this->load->view('payment_sucess',$data);
		$this->load->view('template/footer');
    	$this->generating_code($id);
    }

    function send_mail($id){
    	$data['result'] = $this->db->query("SELECT CONCAT( tbz_users.first_name, ' ', tbz_users.last_name ) AS user_name, tbz_movies.movie_name, tbz_theater_details.theater_name, tbz_location.location, tbz_chinema_screen.screen_name, tbz_show_details.date, tbz_show_details.screen_timing, tbz_booking_details.seat_no, tbz_booking_details.sub_total, tbz_booking_details.booking_fees, tbz_booking_details.service_tax, tbz_booking_details.swachh_bharat_cess, tbz_booking_details.amount, tbz_booking_details.booking_id, tbz_booking_details.status, tbz_booking_details.txn_id FROM tbz_booking_details LEFT JOIN tbz_users ON tbz_users.id = `tbz_booking_details`.user_id LEFT JOIN tbz_show_details ON tbz_show_details.id = tbz_booking_details.show_id LEFT JOIN tbz_movies ON tbz_movies.id = tbz_show_details.movie_name_id LEFT JOIN tbz_theater_details ON tbz_theater_details.id = tbz_show_details.cinemas_id LEFT JOIN tbz_chinema_screen ON tbz_chinema_screen.id = tbz_show_details.screen_name LEFT JOIN tbz_location ON tbz_location.id = tbz_theater_details.city WHERE tbz_booking_details.id =".$id)->row();
    	
    	$msg = $this->load->view('template/confirm_mail',$data,true);
    	$this->book->send_mail($msg);
    }

    function generating_code($id){
    	$result = $this->db->where('id',$id)->get('tbz_booking_details')->row();
    	$this->load->library('ciqrcode');
		$params['data'] = $result->booking_id;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'assets/public/img/qrcode/'.$result->booking_id.'.png';
		$this->ciqrcode->generate($params);
		$path = 'assets/public/img/qrcode/'.$result->booking_id.'.png';

		$this->db->where('id',$id)->update('tbz_booking_details',array('qr_code'=>$path));
    }

    public function check_promo(){
    	 $data =  $_POST;
    	    $query = $this->book->get_promo($data);
	    if(count($query)>0){

	    	//$this->book->update_promo($data);

	    // echo $amt=$query->off;
	    	echo json_encode($query);

	    }
	    else{
	    	echo 0;
	    }
    }

public function settings(){
	$result = $this->book->settings1();
		$results = $this->book->settings($result->country);
    //print_r($result);
	print json_encode($results);
}

public function check_promocode(){
	$data = json_decode(file_get_contents("php://input"));
	$result = $this->book->update_promo($data);
	if($result == 1){
		$data = array('status' => 'success');
	}
  print json_encode($data);
}

	
}