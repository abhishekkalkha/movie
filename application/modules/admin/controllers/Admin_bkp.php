<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
class Admin extends MY_Controller {

	function __construct() {
        parent::__construct();
		error_reporting(0);
        $this->load->database();
        $this->load->library('session');
        $this->load->model('admin/admin_model');
        $this->load->model('admin/form_fields');

        if ( ! $this->session->userdata('loggeduserid'))
        { 
            redirect(base_url().'auth'); 
        } 
        // Allow some methods?
        $loggeduser = $this->session->userdata('loggeduser');
            if($loggeduser->user_type==3){
                $allowed = array(
                    'manager','view_theater','add_cinemas','get_chinema','get_screen','add_screen','act_save_theater','get_theater_preview','update_theater_status','view_bookingdetails','show_details','get_show','add_booking','update_tableinput_form','table_list','view_screenDetails','screendetails_view','get_screnns','get_moviesings','get_theater_details','get_city_details','update','add_booking_detail','add_theater','get_location','get_yearrevenue','get_showlanguage','get_showtag','get_showformat','get_showlocation','get_showtheatername','view_gallery','add_gallery','add_galleries','gallery_details','gallery_delete','settings_add','settings','view_profile','get_profiledet','profile_view','edit_profile','add_profiles','get_settings','topmovie_details','settings_view','view_screenvalues');
                if ( ! in_array($this->router->fetch_method(), $allowed))
            {
                redirect(base_url().'admin/manager');
            }
            }
            
    }
	public function index()
	{
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "index";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
	}

	public function listing($table,$table_key=null)
	{
		$data['fields'] = $this->form_fields->table_field_list($table);
        $field_string = implode(",",$data['fields']);
        $this->db->select($field_string);
        $query = $this->db->get($table);
        //$data['datas'] = (count($query->result())) ? $query->result() : 'No result';
        $data['datas'] = (count($query->result())) ? $query->result() : 'No result';
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "page";
        $data['module'] = 'admin';
        $data['title'] = 'View All';
        $data['table'] = $table;
        $data['table_key'] = $table_key;
        $this->load->view($this->_admincontainer, $data);
	}
	
	public function edit($table,$table_key=null)
	{
		$data['datas'] = $this->form_fields->table_field_details($table,$table_key);
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "page";
        $data['module'] = 'admin';
        $data['title'] = 'Edit';
        $data['table'] = $table;
        $data['table_key'] = $table_key;        
        $this->load->view($this->_admincontainer, $data);
	}
	public function view()
	{
		$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "page";
        $data['module'] = 'admin';
        $data['title'] = 'View';
        $this->load->view($this->_admincontainer, $data);
	}

	public function table_list($table = NULL){
		
		//var_dump($table);
		$data['content'] = (is_null($table)) ? $this->admin_model->show_table() : $this->admin_model->show_table_fields($table);
		$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "table_list";
	        $data['module'] = 'admin';
	        $data['title'] = (is_null($table)) ? 'Tables' : base64_decode($table);
	        $data['table'] = $table;
	        $this->load->view($this->_admincontainer, $data);
	}

	public function get_field_list(){
		echo $response = $this->admin_model->get_all_by_table_name_and_where_as_row('tbz_tables',$this->input->get());
	}

	public function update_field_list(){
		echo $response = $this->admin_model->update_field_list($this->input->get());
	}

    public function update_menu_list(){
        echo $response = $this->admin_model->update_menu_list($this->input->get());
    }

    public function update_table_form(){
        echo $response = $this->admin_model->update_table_form($this->input->get());
    }

    public function get_menu_list(){
        $query = $this->db->get('tbz_menu')->result();
        echo json_encode($query);
    }
    public function get_menu_item(){
        $table = $this->input->get('data');
        $query = $this->db->get_where('tbz_menu', array('table_name' => $table))->row();
        echo json_encode($query);
    }


    public function profile_view()
    {
     
		
		    $loggeduser = $this->session->userdata('loggeduser');
			if (($loggeduser->user_type == 1 )){
			$data['content'] =  $this->db->get_where('tbz_users')->result() ;
			$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "profile_view";
			$data['module'] = 'admin';
			$this->load->view($this->_admincontainer, $data);
			}
			else
			{
            $data['content'] =  $this->db->where('id',$loggeduser->id)->get('tbz_users')->result();
			//echo $this->db->last_query();
            $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "profile_view";
            $data['module'] = 'admin';
            $this->load->view($this->_admincontainer, $data);
			}
    }



    //mercentor 
    public function manager()
    {
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "manager";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
		
    }
     public function view_theater(){

		    $loggeduser = $this->session->userdata('loggeduser');
			//echo $loggeduser->user_type;
			if (($loggeduser->user_type == 1 ))
			{
		
			$data['content'] =  $this->db->get_where('tbz_chinema')->result() ;
			//echo $this->db->last_query();
			$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "view_theater";
			$data['module'] = 'admin';
			//echo $this->db->last_query();
			$this->load->view($this->_admincontainer, $data);
			}
			else
			{
			//$loggeduser = $this->session->userdata('loggeduser');
            $data['content'] =  $this->db->get_where('tbz_chinema',array('user_id'=>$loggeduser->id))->result() ;
            $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "view_theater";
            $data['module'] = 'admin';
            $this->load->view($this->_admincontainer, $data);
			}
    }

	public function add_cinemas(){
        // $postdata = file_get_contents("php://input"); $request = json_decode($postdata);
        // print_r($request);
        // print_r($this->input->post());
        // print_r($_FILES);
        $sql_data=$this->input->post('data');
        $target_dir = "assets/public/img/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_data['image'] = $target_file;
        $sql_data['user_id'] = $this->session->userdata('loggeduserid');
        $sql_table = 'tbz_chinema';
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_FILES["file"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                //echo "{'status':false,'msg':'File is an image - " . $check["mime"] . ".'}";
                $uploadOk = 1;
            } else {
                //echo "{'status':false,'msg':'File is not an image.'}";
                $uploadOk = 0;
            }
        }
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, your file was not uploaded.'));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                if(isset($sql_data['id']) && $sql_data['id']!=''){
                    $this->db->where('id', $sql_data['id']);
                    $this->db->update($sql_table,$sql_data);
                    echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                   
                }else{
                     $this->db->insert($sql_table, $sql_data);
                     echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                }
				
            } else {
                echo json_encode(array('status'=>false,'msg'=>'Sorry, there was an error uploading your file.'));
            }
        }
    }
	
	
		public function add_galleries(){
        // $postdata = file_get_contents("php://input"); $request = json_decode($postdata);
        // print_r($request);
        // print_r($this->input->post());
        // print_r($_FILES);
        $sql_data=$this->input->post('data');
        $target_dir = "assets/public/img/gallery/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_data['image'] = $target_file;
       // $sql_data['user_id'] = $this->session->userdata('loggeduserid');
        $sql_table = 'tbz_gallery';
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_FILES["file"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                //echo "{'status':false,'msg':'File is an image - " . $check["mime"] . ".'}";
                $uploadOk = 1;
            } else {
                //echo "{'status':false,'msg':'File is not an image.'}";
                $uploadOk = 0;
            }
        }
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, your file was not uploaded.'));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                if(isset($sql_data['id']) && $sql_data['id']!=''){
                    $this->db->where('id', $sql_data['id']);
                    $this->db->update($sql_table,$sql_data);
                    echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                   
                }else{
                     $this->db->insert($sql_table, $sql_data);
                     echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                }
				
            } else {
                echo json_encode(array('status'=>false,'msg'=>'Sorry, there was an error uploading your file.'));
            }
        }
    }
	
		 public function screendetails_view(){
		 
		 
		$sql_data=$this->input->post('data');
		//print_r($sql_data);die();
        $target_dir = "assets/public/img/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_data['image'] = $target_file;
		$sql_data['user_id'] = $this->session->userdata('loggeduserid');
		

        //$sql_data['user_id'] = $this->session->userdata('loggeduserid');
        //$sql_table = 'tbz_chinema';
		
		//print_r($sql_data);
		
		        if (false === strpos($sql_data['facebook_link'], '://')) {
					$sql_data['facebook_link'] = 'http://' . $sql_data['facebook_link'];
				}
				
				 if (false === strpos($sql_data['google_plus'], '://')) {
					$sql_data['google_plus'] = 'http://' . $sql_data['google_plus'];
				}
				
			    if (false === strpos($sql_data['twiter_link'], '://')) {
					$sql_data['twiter_link'] = 'http://' . $sql_data['twiter_link'];
				}
				
				if (false === strpos($sql_data['linkedin_link'], '://')) {
					$sql_data['linkedin_link'] = 'http://' . $sql_data['linkedin_link'];
				}
		
		echo $response = $this->admin_model->screendetails_view($sql_data);
        
    }

    public function get_chinema(){
        $array = $this->input->get();
        $where = array('id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->row();
        echo json_encode($data);
    }
	
	

    public function add_screen(){
        echo $response = $this->admin_model->add_screen($this->input->get());
    }

	
	public function get_screen(){
        $array = $this->input->get();
        $where = array('cinemas_id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->result();
        $data_array = array('count'=>count($data),'data'=>$data);
        echo json_encode($data_array);
    }

   
    public function theater_align(){
        $array = $this->input->get('data');
        $array = json_decode($array,true);
        foreach ($array as $key => $value) {
            $temp[$value['type']][]=$value;
        }
        echo json_encode($temp);
    }
    public function act_save_theater(){
        $data = json_decode(file_get_contents("php://input"));
        echo $response = $this->admin_model->act_save_theater($data);
    }

    public function get_theater_preview(){
        echo $response = $this->admin_model->get_theater_preview($this->input->get());
    }
    public function update_theater_status(){
        echo $response = $this->admin_model->update_theater_status($this->input->get());
    }
	
	public function delete_action(){
	
		   $array = $this->input->GET();
           $id = $array['id'];	
		   $table = $array['table'];
           echo $response = $this->admin_model->delete_agent($id,$table);
		 	 
	}

	 public function show_details(){
		  
        $loggeduser = $this->session->userdata('loggeduser');
        $data['content'] =  $this->db->get_where('tbz_show_details',array('user_id'=>$loggeduser->id))->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "show_details";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
    }
	
	  public function get_show(){
        $array = $this->input->get();
        $where = array('id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->row();
        echo json_encode($data);
      }
	
	 public function update_tableinput_form(){
        echo $response = $this->admin_model->update_tableinput_form($this->input->get());

     }
	 
	public function view_gallery()
	{
		$loggeduser = $this->session->userdata('loggeduser');
        $data['contentss'] =  $this->db->get_where('tbz_movies')->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "gallery";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
	}
	
	
	
	public function add_gallery()
	{
		$loggeduser = $this->session->userdata('loggeduser');
        //$data['content'] =  $this->db->get_where('tbz_users',array('user_id'=>$loggeduser->id))->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "add_gallery";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
	}
	
	
	public function save_gallery()
	{
		$data = json_decode(file_get_contents("php://input"));
		echo $response = $this->admin_model->save_gallery($data);
	}
	public function add_promocode()
	{
		$loggeduser = $this->session->userdata('loggeduser');
		//$data['content'] =  $this->db->get_where('tbz_users',array('user_id'=>$loggeduser->id))->result() ;
		$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "add_promocode";
		$data['module'] = 'admin';
		$this->load->view($this->_admincontainer, $data);	
	}
	public function get_movies()
	{
		$response = $this->admin_model->get_movies();
		print_r(json_encode($response));
	}
	public function get_category()
	{
		$response = $this->admin_model->get_category();
		print_r(json_encode($response));
	}
	public function save_promocode()
	{
		$data = json_decode(file_get_contents("php://input"));
		echo $response = $this->admin_model->save_promocode($data);
	}
	
	
	
	
	 public function get_screnns(){		
        $array = $this->input->get();
        $where = array('id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->row();
        echo json_encode($data);
    }
	
	 public function get_moviesings()
		{
			$response = $this->admin_model->get_moviesings();
			echo json_encode($response);
		}
		
	 public function get_movies_name(){
		 
		   $response = $this->admin_model->getmovie();
		   echo json_encode($response);
	 }
		
     public function get_showlanguage()
	 {
		    $response = $this->admin_model->get_showlanguage();
			echo json_encode($response);
	 }
	 
	  public function get_showlocation()
	 {
		    $response = $this->admin_model->get_showlocation();
			echo json_encode($response);
	 }
	 
	 
	 public function view_screenDetails(){
		  echo $response = $this->admin_model->get_screenDetails($this->input->get());
     }
	 
	 /* public function view_screenvalues(){
		  echo $response = $this->admin_model->get_screensval($this->input->get());
     }*/
	 
	 
	  public function add_booking_detail(){
        echo $response = $this->admin_model->add_booking_detail($this->input->get());
    }
	
	  public function view_bookingdetails(){

			$loggeduser = $this->session->userdata('loggeduser');
			$data['content'] =  $this->db->get_where('tbz_booking_details',array('user_id'=>$loggeduser->id))->result() ;
			$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "view_booking_details";
			$data['module'] = 'admin';
			$this->load->view($this->_admincontainer, $data);
     }

	 public function get_location()
		{
			$response = $this->admin_model->get_location();
			echo json_encode($response);
		}
	 public function get_bookingcounts()
		{
			$response = $this->admin_model->get_bookingcounts();
			echo json_encode($response);
		}
	 public function get_view_movie()
	 {
		    $response = $this->admin_model->get_view_movie();
			echo json_encode($response);
	 }
	 
	 public function get_upcomming_movie()
	 {
		    $result = $this->admin_model->get_upcomming_movie();
		    $data = array('error' => '','result' => $result);
		    print_r(json_encode($data));
	 }
	 
	 public function now_showing_details()
		{
			$result = $this->admin_model->now_showing_details();
			//$data = array('error' => '','result' => $result);
			print_r(json_encode($result));
		}
	  
	
	 public function topmovie_details()
	   {
			$result = $this->admin_model->topmovie_details();
			print json_encode($result);
	   }

	  public function gallery_details()
	 {
		 $data = $this->input->get();
		 $response = $this->admin_model->gallery_details($data);   
		 print json_encode($response);
	 }

	 public function get_yearrevenue()
	   {
			echo $response = $this->admin_model->get_yearrevenue($this->input->get());
	   }
	   
	 public function get_monthrevenue()
	 {
		 echo $response = $this->admin_model->get_monthrevenue($this->input->get());
	 }
	 
	 public function get_dayrevenue()
	 {
		 echo $response = $this->admin_model->get_dayrevenue($this->input->get());
	 }
	 
	  public function get_daycalculateamount()
	 {
		 //echo $response = $this->admin_model->get_daycalculateamount($this->input->get());   

         if(isset($_POST["cd"]) && isset($_POST["cds"]))
              
          {
              $start_date = $_POST['cd'];
              $end_date = $_POST['cds'];
          }
          else
          {
              $start_date = date('Y-m-01');
              $end_date = date('Y-m-d');
          }		 
		    $result = $this->admin_model->get_daycalculateamount($start_date, $end_date);
			print json_encode($result);
			
		
	 }

     function image_upload(){
        error_reporting(0);
        $dir = FCPATH."assets/admin/img/uploads/";
        $path = "assets/admin/img/uploads/"; 
        list($file_name,$ext) = split('[.]', $_FILES["image"]["name"]);
        $file_name = time().rand(0, 999).".".$ext;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dir.$file_name);
        echo $path.$file_name;
     }
	 

		 
	   function gallery_delete(){
		   
		   $array = $this->input->GET();
           $id = $array['id'];
		   $response = $this->admin_model->gallery_delete_img($id);
		   print json_encode($response);
		   
	   }
	   
	   
	
	   public function settings_add(){
		   
        $sql_data=$this->input->post('data');
		$target_dir_logo = "assets/public/img/logo/";
		$target_dir = "assets/public/img/favicon/";
        
		$target_file_logo = $target_dir_logo . basename($_FILES["logo"]["name"]);
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		
        //$target_file = $target_dir . basename($_FILES["file"]["favicon"]);       
        $sql_data['logo'] = $target_file_logo;
        $sql_data['favicon'] = $target_file;
		
		//$sql_data['id'] = $this->session->userdata('loggeduserid');
		//var_dump($sql_data['id'] = $this->session->userdata('loggeduserid'));
        $sql_table = 'tbz_settings';
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
            if(isset($_FILES['favicon'])) {  
			$config = set_upload_favicono('assets/public/img/favicon/');
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["file"]['name'];
			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('favicon')) {
					unset($data['favicon']);
				}
				else {
					$upload_data = $this->upload->data();
					//$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['favicon'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
 
 
		
			if(isset($_FILES['logo'])) {  
			move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file_logo);
			
			$config['upload_path'] = 'assets/public/img/logo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['width'] = 60;
			$config['height'] = 80;
			$config['overwrite']     = FALSE;
			//$config = set_upload_favicono('assets/public/img/logo/');
			//die();
			$this->load->library('upload');
			
			$new_name = time()."_".$_FILES["logo"]['name'];
			$config['file_name'] = $new_name;
	
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('logo')) {
					unset($data['logo']);
				}
				else {
					$upload_data = $this->upload->data();
					//$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['logo'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
				}
			}
			
			
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, your file was not uploaded.'));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                if(isset($sql_data['id']) && $sql_data['id']!=''){					
                    $this->db->where('id', $sql_data['id']);
                    $result = $this->db->update($sql_table,$sql_data);					
                 //	var_dump($result);
                        //$this->session->set_userdata('title',$sql_data['title']);
                $resulttitle = $this->admin_model->settings_view();
				$sess_arrays = array(
				'title' => $resulttitle->title
				);
				$this->session->set_userdata('title', $sess_arrays);	

                    echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));					
                }else{
                     $this->db->insert($sql_table, $sql_data);
                     echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                }

            } else {
                echo json_encode(array('status'=>false,'msg'=>'Sorry, there was an error uploading your file.'));
            }
        }
    }
	
	
	
	 
	
	public function settings()
	{
		$loggeduser = $this->session->userdata('loggeduser');
        //$data['content'] =  $this->db->get_where('tbz_users',array('user_id'=>$loggeduser->id))->result() ;
		$data['content'] =  $this->db->get_where('tbz_settings')->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "settings";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
	}
		

    public function edit_profile(){
		
		$loggeduser = $this->session->userdata('loggeduser');
        //$data['content'] =  $this->db->get_where('tbz_users',array('user_id'=>$loggeduser->id))->result() ;
		$data['content'] =  $this->db->get_where('tbz_users')->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "profile_view";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
	}

    public function get_profiledet(){
		$array = $this->input->get();
        $where = array('id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->row();
        echo json_encode($data);
	}

    public function get_settings(){
		$array = $this->input->get();
        $where = array('id'=>$array['id']);
        $table = $array['table'];
        $data = $this->db->get_where($table,$where)->row();
        echo json_encode($data);
	}	
	
	

    public function add_profiles(){
		
		$sql_data=$this->input->post('data');
        $target_dir = "assets/admin/img/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_data['image'] = $target_file;
        $sql_data['id'] = $this->session->userdata('loggeduserid');
				
        $sql_table = 'tbz_users';
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_FILES["file"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                //echo "{'status':false,'msg':'File is an image - " . $check["mime"] . ".'}";
                $uploadOk = 1;
            } else {
                //echo "{'status':false,'msg':'File is not an image.'}";
                $uploadOk = 0;
            }
        }
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            echo json_encode(array('status'=>false,'msg'=>'Sorry, your file was not uploaded.'));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                if(isset($sql_data['id']) && $sql_data['id']!=''){					
                    $this->db->where('id', $sql_data['id']);
                    $result = $this->db->update($sql_table,$sql_data);		
                                    /*if($sql_data == $this->session->userdata('loggeduserid')['id']) {
									$this->session->userdata('image',$sql_data['image']);
								   }*/
								   $this->session->set_userdata('image',$sql_data['image']);
								  // $this->session->set_userdata('first_name',$sql_data['first_name']);
								  // $this->session->set_userdata('last_name',$sql_data['last_name']);
								   
								   //$this->session->set_userdata('first_name', $sess_arrays);	
								   
                     echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));					
                     }else{
                     $this->db->insert($sql_table, $sql_data);
                     echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                }
				
            } else {
                echo json_encode(array('status'=>false,'msg'=>'Sorry, there was an error uploading your file.'));
            }
        }
		
	} 

}
