<?php
class Admin_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //check value is available or not
    function check_existency($table,$field_names,$values){
        if(is_array($field_names) && is_array($values)){
            foreach ($field_names as $key => $value) {
                $row[]=array($value=>$values[$key]);
            }
        }else{$row =array($field_names => $values); }
        return  $this->db->get_where($table, $row)->result();
    }
    
    //return all table names
    function show_table()
    {
        $query = $this->db->query('show tables');
        return $query->result();
    }

    //return specified table fields
    function show_table_fields($table)
    {
        $table_name = base64_decode($table);
        $query = $this->db->query('SHOW COLUMNS FROM '.$table_name);
        
        return $query->result();
    }

    //return values from specified table
    function get_all_by_table_name($table){
        return  json_encode($this->db->get($table)->result());
    }

    function get_all_by_table_name_and_where_as_row($table,$where){
        $result =$this->db->get_where($table, $where)->row();
        if($result==''){
            $fields = $this->db->query('SHOW COLUMNS FROM '.$where['table'])->result();
            foreach ($fields as $key => $value) {
                $results[$value->Field]=array('enable_in_list'=>true,'enable_in_form'=>true,'required'=>true,'readonly'=>true);
            }
            $result['details'] = json_encode($results);
        }
        return  json_encode($result,true);
    }
    //insert or update table display manner
    function update_field_list($data){
        $sql_data = $data['data'];
        $sql_table = $data['table'];
        // echo '<pre>';
        // print_r($sql_data);
        // die();
        $datas=array('table'=>$sql_table,'details'=>$sql_data);
        if($this->check_existency('tbz_tables','table',$sql_table)){
            $this->db->where('table',$sql_table);
            return ($this->db->update('tbz_tables', $datas)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
        }else{
            return ($this->db->insert('tbz_tables', $datas)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
        }
        //return $this->db->insert('tbz_tables', $datas); 
    }
    //insert or update menu items 
    function update_menu_list($data){
        $data = json_decode($data['data'],true);
        $sql_data = $data;
        $sql_table = $data['table_name'];

        //$datas=array($sql_data);
        if($this->check_existency('tbz_menu','table_name',$sql_table)){
            $this->db->where('table_name',$sql_table);
            return ($this->db->update('tbz_menu', $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
        }else{
            return ($this->db->insert('tbz_menu', $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
        }
    }
    //insert or update table(s) items 
    function update_table_form($data){
		
        $s_data = json_decode($data['data'],true);
        $sql_data = $s_data;
        $sql_table = $data['table_name'];

        //$datas=array($sql_data);
        $s_data['id'];
        if($s_data['id']!='null'){
			//$this->session->userdata['loggeduser']['image'] = $sql_data['image'];
			if($sql_table=='tbz_users'){
				$loggeduser = $this->session->userdata('loggeduser');
				$loggeduser->image = $sql_data['image'];
				$this->session->set_userdata('loggeduser',$loggeduser);
			}
				
				
            $this->db->where('id',$s_data['id']);
            return ($this->db->update($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
			
				
		
				
			
        }else{
           return ($this->db->insert($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
            
        }
    }

    public function add_screen($data){
        $s_data = json_decode($data['data'],true);
        $sql_data = $s_data;
        $sql_table = $data['table'];

        $id = $sql_data['cinemas_id'];
		
		$screen_name = $sql_data['screen_name'];
		
		
	
        //$datas=array($sql_data);
        //$s_data['id'];
		
		//if(isset($s_data['id']) && $s_data['id']!='null')
        //$query = $this->db->query("SELECT  * FROM ".$sql_table." WHERE cinemas_id = $id and screen_name = $screen_name");
	
	      $query = $this->db->query("Select * FROM ".$sql_table." WHERE cinemas_id = $id and screen_name = $screen_name");
		

		//$query->$this->db->row();
		
		//$this->db->select->('tbz_chinema_screen');
		
		if(isset($s_data['id']) && $s_data['id']!= 'null')
		{
            $this->db->where('id',$s_data['id']);
            return ($this->db->update($sql_table, $sql_data)) ? '{"status":true,"id":"'.$id.'","msg":"Successfully Updated ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
        }else{

		if($query->num_rows()==0){
			
			return ($this->db->insert($sql_table, $sql_data)) ? '{"status":true,"id":"'.$id.'","msg":"Successfully Updated ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
			   
        } else {
			return '{"status":false,"id":"'.$id.'","msg":"Sorry !Duplicate Screen name"}';
		}
			
		}
			
		
    }

    public function act_save_theater($data){
        $sql_data = (array)$data->data;
        $sql_data['layout'] = json_encode($sql_data['layout']);
        $sql_data['preview'] = json_encode($sql_data['preview']);
        $sql_data['status'] = '1';
        $sql_table = $data->table_name;
        if(isset($sql_data['id']) && $sql_data['id']!='null'){
            $this->db->where('id',$sql_data['id']);
            return ($this->db->update($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
        }else{
           return ($this->db->insert($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
            
        }
    }

    public function get_theater_preview($data){
		
        $table = $data['table_name'];
        $where = array('id'=>$data['data']);
        return json_encode($this->db->get_where($table,$where)->row());
    }

    public function update_theater_status($data){
        $table = $data['table_name'];
        $where = array('id'=>$data['data']);
        
        $res_data = $this->db->get_where($table,$where)->row();
        $status = ($res_data->status=='1') ? '0' : '1';
        $sql_data = array('status'=>$status);
        $this->db->where('id',$data['data']);
        return ($this->db->update($table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
    }
	
	public function delete_agent($id,$table){           		 
		 //$this->db->delete($table, array('id' => $id));
		 return ($this->db->delete($table, array('id' => $id))) ? '{"status":true,"msg":"Successfully Deleted ."}' : '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
		 
	 }
	 

	  function update_tableinput_form($data){
		   
        $s_data = json_decode($data['data'],true);
        $sql_data = $s_data;
        $sql_table = $data['table_name'];
	 
	     if (isset($s_data['id']) && !empty($s_data['id']))
			 {
			 
						$this->db->where('id',$s_data['id']);
            return ($this->db->update($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
					}else{  
						 return ($this->db->insert($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';  
					}
	  }
	  
	  function save_gallery($data){
		
         $sql_table = $data->table_name;
		 $sql_data =  $data->image;
		 
		 $user = $this->session->userdata('loggeduser');
		 $this->db->where('id',$user->id);
		 $this->db->set('image',$sql_data);
		  return ($this->db->update($sql_table)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
		}
		 function get_movies(){
		  $this->db->select('id,movie_name');
		  $qry = $this->db->get('tbz_movies');
		 return $qry->result();
	  }
	  function get_category(){
		  $this->db->select('id,name');
		  $qry = $this->db->get('tbz_category');
		 return $qry->result();
	  }
	  function save_promocode($data){
		  $arr = array('movie_id' => $data->id,'category' => $data->category,'promocode' => $data->code,
		  'valid-from' => $data->vfrom,'valid-to' => $data->vto,'discount' => $data->discount,
		  'min_amount' => $data->minamt,'max_amount' => $data->maxamt);
		  return ($this->db->insert('tbz_promocode',$arr)) ? '{"status":true,"msg":"Successfully Inserted ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}'; 
		  /*$qry = $this->db->insert('tbz_promocode',$arr);
		  echo $id = $qry->insert_id();die();*/
		  
		  //$this->db->where('movie_name',$data->name);
		  //$this->db->set('pcode',$id);
		  //$this->db->update('tbz_movies');
		  
	  }
	  	 
	  
	  public function get_screenDetails($data){
		  
       /*
				$this->db->select('tbz_show_details.id as id, tbz_show_details.movie_name_id, tbz_movies.movie_name, tbz_show_details.date,  tbz_show_details.screen_name, tbz_location.location, tbz_chinema.name, tbz_show_details.screen_timing');
				$this->db->from('tbz_show_details' );
				$this->db->join('tbz_movies', 'tbz_show_details.movie_name_id = tbz_movies.id','left');
				$this->db->join('tbz_chinema', 'tbz_show_details.cinemas_id = tbz_chinema.id','left');
				$this->db->join('tbz_location', 'tbz_location.id = tbz_chinema.location','left');			
				
				$this->db->where('tbz_show_details.screen_name',$data['data']);
				$this->db->where('tbz_show_details.cinemas_id',$data['cini']);
				//$query = $this->db->get();
			    //$result = $query->result();				
				$result = $this->db->get()->result();
				return json_encode($result);*/

					$result = $this->db->query("SELECT tbz_chinema_screen.cinemas_id,tbz_chinema_screen.screen_name,tbz_chinema.name,tbz_chinema.location FROM tbz_chinema_screen LEFT JOIN tbz_chinema ON tbz_chinema_screen.cinemas_id = tbz_chinema.id WHERE tbz_chinema_screen.id =".$data['data'])->row();
					
					
				
				/*$this->db->select('tbz_show_details.id as id, tbz_show_details.movie_name_id, tbz_movies.movie_name, tbz_show_details.date,  tbz_show_details.screen_name, tbz_location.location, tbz_chinema.name, tbz_show_details.screen_timing');
				$this->db->from('tbz_show_details' );
				$this->db->join('tbz_movies', 'tbz_show_details.movie_name_id = tbz_movies.id','left');
				$this->db->join('tbz_chinema', 'tbz_show_details.cinemas_id = tbz_chinema.id','left');
				$this->db->join('tbz_location', 'tbz_location.id = tbz_show_details.city_id','left');			
				
				$this->db->where('tbz_show_details.screen_name',$data['data']);
				$this->db->where('tbz_show_details.cinemas_id',$data['cini']);
				//$query = $this->db->get();
			    //$result = $query->result();				
				$result = $this->db->get()->result();*/
				return json_encode($result);
       }
	   
	/*   public function get_screensval($data)
	   {
		   $this->db->select('tbz_show_details.id as id, tbz_show_details.movie_name_id, tbz_movies.movie_name, tbz_show_details.date,  tbz_show_details.screen_name, tbz_location.location, tbz_chinema.name, tbz_show_details.screen_timing');
				$this->db->from('tbz_show_details' );
				$this->db->join('tbz_movies', 'tbz_show_details.movie_name_id = tbz_movies.id','left');
				$this->db->join('tbz_chinema', 'tbz_show_details.cinemas_id = tbz_chinema.id','left');
				$this->db->join('tbz_location', 'tbz_location.id = tbz_chinema.location','left');			
				
				$this->db->where('tbz_show_details.screen_name',$data['data']);
				$this->db->where('tbz_show_details.cinemas_id',$data['cini']);
				//$query = $this->db->get();
			    //$result = $query->result();				
				$result = $this->db->get()->result();
				return json_encode($result);
	   }*/
	
 public function screendetails_view($sql_data){

 
    	//var_dump($sql_data);
    	//exit();

        //$s_data = json_encode($sql_data,true);
        //$sql_data = $s_data;
		     /* $array = $sql_data['tag_id'];
              $comma_separated = implode(",", $array);
              $sql_data['tag_id']=$comma_separated;*/
		
		$show_times = $sql_data['screen_timing'];
		unset($sql_data['screen_timing']);
		unset($sql_data['location']);
		foreach($show_times as $show_time) {
        
		$sql_table = 'tbz_show_details';
		$sql_data['screen_timing'] = $show_time;
        $id = $sql_data['cinemas_id'];

        //$datas=array($sql_data);
        //$s_data['id'];
        if(isset($sql_data['id']) && $sql_data['id']!='null'){
            $this->db->where('id',$sql_data['id']);
            $result = $this->db->update($sql_table, $sql_data);
        }else{
           $result = $this->db->insert($sql_table, $sql_data);
            
        }
		}
		if($result) {

		 return '{"status":true,"id":"'.$id.'","msg":"Successfully Updated ."}';
		}
		else {
			return '{"status":false,"id":"'.$id.'","msg":"Sorry !Something went wrong .Please try later"}';
		}
    }
	
	
	  function get_moviesings(){
		  $this->db->select('id,movie_name');
		  $qry = $this->db->get('tbz_movies');
		  return $qry->result();
	  }
	  
	  function getmovie(){
		  
		  $this->db->select('id,movie_name');
		  $qry = $this->db->get('tbz_movies');
		  return $qry->result();
		  
	  }
	  
	   function get_showlanguage(){
		  $this->db->select('id,name');
		  $qry = $this->db->get('tbz_language');
		  return $qry->result();
	  }
	  
	 /* function get_showtag(){
		  
		  $this->db->select('id,tag_name');
		  $qry = $this->db->get('tbz_tags');
		  return $qry->result();
	  }*/
	  
	  /* function get_showformat(){
		  
		  $this->db->select('id,format_name');
		  $qry = $this->db->get('tbz_format');
		  return $qry->result();
	  }*/
	  
	  function get_showlocation(){
		  
		  $this->db->select('id,location');
		  $qry = $this->db->get('tbz_location');
		  return $qry->result();
	  }
	  
	 function add_booking_detail($data){
		   
        $s_data = json_decode($data['data'],true);
        $sql_data = $s_data;
        $sql_table = $data['table'];
	 
	     if (isset($s_data['id']) && !empty($s_data['id']))
			// if(isset($s_data['id']) && $s_data['id']!= 'null')
			 {
						
						$this->db->where('id',$s_data['id']);
                     return ($this->db->update($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';
			}else
					
			{  
				 return ($this->db->insert($sql_table, $sql_data)) ? '{"status":true,"msg":"Successfully Updated ."}' : '{"status":false,"msg":"Sorry !Something went wrong .Please try later"}';  
			}	
			
	  }
	  
	   function get_location(){
		  $this->db->select('id,location');
		  $qry = $this->db->get('tbz_location');
		  return $qry->result();
	  }
	  
	  function get_bookingcounts(){
		 
		  $query=$this->db->get('tbz_booking_details');
		  $num = $query->num_rows();
		  return $num;
		   
	  }
	  
	 function get_view_movie(){
		 
		 $query = $this->db->get('tbz_movies');
		 $num = $query->num_rows();
		 return $num; 
	 }
	 
	 function get_upcomming_movie()
	 {
		 $date = date("Y-m-d");
		 $this->db->where('release_date',$date);
		 $query = $this->db->get('tbz_movies');
		 //return $query->result();
		 $num = $query->num_rows();
		 return $num; 
	 }
	 
	 function now_showing_details()
	    {	
		 $date = date("Y-m-d");
		 $this->db->where('tbz_show_details.date',$date);
		 $query = $this->db->get('tbz_show_details');
		 $num = $query->num_rows();
		 return $num; 
	    }
		
	 function topmovie_details()
	  {
		$this->db->select('tbz_reviews.movie,tbz_reviews.title,tbz_reviews.comments,tbz_reviews.rate,tbz_reviews.time_date,
								tbz_movies.movie_name,tbz_movies.image,tbz_movies.certificate');
		$this->db->from('tbz_reviews');
		$this->db->join('tbz_movies','tbz_movies.id = tbz_reviews.movie');
		$query = $this->db->get();
		return $query->result();
	
	  }
	 
	 function get_yearrevenue($data)
	  {
		 $date = date('Y');
		 $this->db->select('amount')->from('tbz_booking_details as date');
		 $this->db->where("DATE_FORMAT(date,'%Y')", $date );
		 $query = $this->db->get();
		 $period_array = array();
         foreach ($query->result_array() as $row)
		 {
           $period_array[] = intval($row['amount']); //can it be float also?
         }
		 $total = array_sum($period_array);
		 return $total;    
	 }
	 
	 function get_monthrevenue($data)
	 {
		 $date = date('y-m');
		 $this->db->select('amount')->from('tbz_booking_details as date');
		 $this->db->where("DATE_FORMAT(date,'%y-%m')", $date);
		 $query = $this->db->get();
		 $period_array = array();
		 foreach($query->result_array() as $row)
		 {
			 $period_array[] = intval($row['amount']);
		 }
		 $total = array_sum($period_array);
		 return $total;	 
	 }
	 
	 function get_dayrevenue($data)
	 {
		 $date = date('y-m-d');
		 $this->db->select('amount')->from('tbz_booking_details as date');
		 $this->db->where("DATE_FORMAT(date,'%y-%m-%d')", $date);
		 $query = $this->db->get();
		 $period_array = array();
		 foreach($query->result_array() as $row)
		 {
			 $period_array[] = intval($row['amount']);
		 }
		 $total = array_sum($period_array);
		 return $total;	 
	 }
	 
	/*  function gallery_details($data){
		  
		$id = $data['id'];
		$this->db->select('tbz_movies.id as id, tbz_movies.movie_name, tbz_gallery.image' );
		$this->db->from('tbz_movies');
		$this->db->join('tbz_gallery','tbz_gallery.movie = tbz_movies.id','left');
		
		$this->db->where('tbz_movies.id',$id);
		
		$query = $this->db->get();
		$this->db->last_query();
		return $query->result();
	 }*/
	 
	 
	  function gallery_details($data){
		  
		$id = $data['id'];
		$this->db->select('tbz_gallery.id as id, tbz_movies.movie_name, tbz_gallery.image' );
		$this->db->from('tbz_movies');
		$this->db->join('tbz_gallery','tbz_gallery.movie = tbz_movies.id','left');
		
		$this->db->where('tbz_movies.id',$id);
		
		$query = $this->db->get();
		$this->db->last_query();
		return $query->result();
	 }
	 
	 
	 
	 
	 
	 
	  function get_daycalculateamount($start_date, $end_date)
	   {
		/* $date = date('y-m-d');	 
		 $this->db->select('SUM(amount) as amount,date')->from('tbz_booking_details as date');
         //$this->db->where('date >= ',$start_date); 
         //$this->db->where('date <= ',$end_date); 
		 $this->db->group_by('date');
		 $query = $this->db->get();
		 return $query->result();*/
		 	 	
             $date = date('y-m-d');		 
		     $this->db->select('SUM(amount) as amount,date')->from('tbz_booking_details as date');
			 $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date);  $this->db->where('date >= ',$start_date); 
             $this->db->where('date <= ',$end_date); 
			 $this->db->group_by('date');
		     $query = $this->db->get();
		     return $query->result(); 
		 
	 }
	 
	 
	 /* function gallery_delete($id) {
		
				 $this->db->where('id', $id);
				 $result = $this->db->delete('tbz_gallery'); 

				 if($result) {
					 return "Success";
				 }
				 else {

					 return "Error";
				 }
	 }*/
       function gallery_delete_img($id){  

		         $this->db->where('id', $id);
				 $result = $this->db->delete('tbz_gallery'); 
                  //print_r($this->db->last_query());
		         // die();
				 if($result) {
					 return "Success";
				 }
				 else {
					 return "Error";
				 }
				 
	    }
		
		
	
	 
	 
	/* function update_settings($data){
		 
		           $result = $this->db->update('settings', $data); 
				   return $result;
	}*/
	
	
	 
	/* public function get_single_settings($id){
		
		  
		       $query = $this->db->where('id',$id);
			   $query = $this->db->get('settings');
			   $result = $query->row();
			   return $result;  
	 }	
	 */
	/* public function update_settings($data){
		 
		           //$this->db->where('id', $id);
				   $result = $this->db->insert('tbz_settings', $data); 
			
				   return $result;
	 }*/
	 
	 /* function settings_viewing(){
		 
		  $query = $this->db->query(" SELECT * FROM `tbz_settings` order by id DESC ")->row();
		  return $query ;
	 }*/
	 
	 
	  function settings_view(){
		 
		  $query = $this->db->query(" SELECT * FROM `tbz_settings` order by id DESC ")->row();
		  return $query ;
	 }

	
	 
	  
}
?>