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
                    'manager','view_theater','add_cinemas','get_chinema','get_screen','add_screen','act_save_theater','get_theater_preview','update_theater_status','view_bookingdetails','show_details','get_show','add_booking','update_tableinput_form','table_list');
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






    //mercentor 
    public function manager()
    {
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "manager";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
    }
    public function view_theater(){
        $loggeduser = $this->session->userdata('loggeduser');
        $data['content'] =  $this->db->get_where('tbz_chinema',array('user_id'=>$loggeduser->id))->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "view_theater";
        $data['module'] = 'admin';
        $this->load->view($this->_admincontainer, $data);
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
        // Check if file already exists
        if (file_exists($target_file)) {
            echo  json_encode(array('status'=>false,'msg'=>'Sorry, file already exists.'));
            $uploadOk = 0;
        }
        // Allow certain file formats
        else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
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
                     $this->db->insert($sql_table,$sql_data);
                    echo json_encode(array('status'=>true,'msg'=>'The file '. basename( $_FILES["file"]["name"]). ' has been uploaded.'));
                }
                    
            } else {
                echo json_encode(array('status'=>false,'msg'=>'Sorry, there was an error uploading your file.'));
            }
        }
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
	
	 public function view_bookingdetails(){

			$loggeduser = $this->session->userdata('loggeduser');
			$data['content'] =  $this->db->get_where('tbz_booking_details',array('user_id'=>$loggeduser->id))->result() ;
			$data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "view_booking_details";
			$data['module'] = 'admin';
			$this->load->view($this->_admincontainer, $data);
   
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
	 
	public function add_gallery()
	{
		$loggeduser = $this->session->userdata('loggeduser');
        //$data['content'] =  $this->db->get_where('tbz_users',array('user_id'=>$loggeduser->id))->result() ;
        $data['page'] = $this->config->item('ci_my_admin_template_dir_admin') . "gallery";
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
}
