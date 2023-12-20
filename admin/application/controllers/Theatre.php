<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theatre extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Theatres_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			/*$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();*/
			//$called = $class.'/'.$method;
			/*$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}*/


		 }
		
	public function create(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		$template['page'] = "theatre/theatre";
		$template['page_title'] = "Add Theatres";
		$template['list'] = $this->Theatres_model->get_locations();
         if(!empty($_POST)) {
		   if(isset($_POST)){
               $data = $_POST;
			    $result = $this->Theatres_model->add_theatres($data);
				$this->session->set_flashdata('message',array('message' => 'Theatres added successfully ','class' => 'success'));
				 redirect(base_url().'theatre');
			

		   }
		   } 
		 $this->load->view('template', $template);

	}

		public function edit_theatre(){
			$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "theatre/edit";
		$template['page_title'] = "Edit theatre";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
		$template['list'] = $this->Theatres_model->get_locations();
		$template['data'] = $this->Theatres_model->get_data($id);
		if(!empty($template['data'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$result = $this->Theatres_model->edit($id,$data);
		    	if($result == "success"){
		    	$this->session->set_flashdata('message',array('message' => 'Theatre edited successfully ','class' => 'success'));
		    	redirect(base_url().'theatre/index');
		       }
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}
	public function delete_theatre(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Theatres_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Theatre deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'theatre');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Theatre not deleted ','class' => 'danger'));
		    		  redirect(base_url().'theatre');	
		    	}

		$this->load->view('template', $template);
	}

	public function index(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
			$template['page'] = "theatre/list";
		$template['page_title'] = "View Theatres";
		$template['result'] = $this->Theatres_model->view();
		$this->load->view('template', $template);
	}
	public function addmovie(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "theatre/addmovie";
		$template['page_title'] = "Add Movies to Theatres";
		$template['list'] = $this->Theatres_model->get_movies();
		$template['data'] = $this->Theatres_model->get_theatres();
         if(!empty($_POST)) {
		   if(isset($_POST)){
               $data = $_POST;
			    $result = $this->Theatres_model->add_movies_theatres($data);
			    if($result == "fail"){
$this->session->set_flashdata('message',array('message' => 'Not alloted  ','class' => 'danger'));
			    }
			    else{
			    	$this->session->set_flashdata('message',array('message' => 'Movies alloted successfully ','class' => 'success'));
				 redirect(base_url('theatre/addmovie'));
			    }
				
			

		   }
		   } 
		 $this->load->view('template', $template);

	}

	public function edit_movietheatre(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "movietheatres/edit";
		$template['page_title'] = "Edit movies to theatre";
		 $id = $this->uri->segment(3);
		if($id==null){
		 redirect($this->router->fetch_class());
		} 
		$template['list'] = $this->Theatres_model->get_movies();
		$template['data'] = $this->Theatres_model->get_theatres();
		$template['lists'] = $this->Theatres_model->get_datas($id);
	
		$a= $template['lists']->theatre_id;
	   $b = explode(",",$a);
	   $template['lists']->theatre_id = $b;
		if(!empty($template['lists'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$this->Theatres_model->edits($id,$data);
		    	$this->session->set_flashdata('message',array('message' => ' Edited successfully ','class' => 'success'));
				 redirect(base_url('theatre/viewmovie'));
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}
	public function delete_movietheatre(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Theatres_model->deletes($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Deleted successfully ','class' => 'success'));
				 redirect(base_url().'movietheatres');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry not deleted ','class' => 'danger'));
				 redirect(base_url().'movietheatres');
		    	}

		$this->load->view('template', $template);
	}

	public function viewmovie(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
			$template['page'] = "movietheatres/list";
		$template['page_title'] = "View details";
		 //$template['list'] = $this->Customer_model->customer_list();
		$template['result'] = $this->Theatres_model->views();
		$this->load->view('template', $template);
	}

	public function addshow(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "theatre/addshow";
		$template['page_title'] = "Add Shows";
		$template['data'] = $this->Theatres_model->get_theatres();
		$template['list'] = $this->Theatres_model->get_movies();
		$template['screen'] = $this->Theatres_model->get_screen();
		if(!empty($_POST)) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	if($data['cinemas_id'] == 'Select Theatre'){
		    		 $this->session->set_flashdata('message',array('message' => 'Sorry, Please Select all fields ','class' => 'danger'));
				 redirect(base_url().'theatre/addshow');
		    	}
		    	else{
		    	$result = $this->Theatres_model->addshow_details($data);
		    	if($result){
		    		   $this->session->set_flashdata('message',array('message' => 'Sorry, Show already exist ','class' => 'danger'));
				 redirect(base_url().'theatre/addshow');
		    	}
		    	else{

		    	$this->session->set_flashdata('message',array('message' => ' Show time added successfully ','class' => 'success'));
				 redirect(base_url().'theatre/viewshow');
		    }
		}
		}
		   
		}
		$this->load->view('template', $template);
	}

	public function get_movies_by_id(){
		//print_r($_POST['theatre_id']);
		$result= $this->Theatres_model->get_moviesby_id($_POST['theatre_id']);
		 $results = '<option value="-1">Select Movie</option>';
            foreach($result as $movie) 
            {  
                $results .= '<option value="'.$movie->id.'">'. $movie->movie_name.' </option>';
            }              
            echo $results;
	}
	public function get_screen_by_id(){
		//print_r($_POST['theatre_id']);
		$result= $this->Theatres_model->get_screenby_id($_POST['theatre_id']);
		$datas = '<option value="-1">Select screen</option>';
            foreach($result as $screen) 
            {  
                $datas .= '<option value="'.$screen->id.'">'. $screen->screen_name.' </option>';
            }              
            echo $datas;

	}

	public function viewshow(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "theatre/viewshow";
		$template['page_title'] = "View Shows";
		$template['list'] = $this->Theatres_model->get_movie_by_theatres();
        $this->load->view('template', $template);
	}

	public function edit_showtheatre(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		$template['page'] = "theatre/editshow";
		$template['page_title'] = "Editshow";
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
			$template['data'] = $this->Theatres_model->get_theatres();
			$template['result'] = $this->Theatres_model->get_showdatas($id);
			$a = $template['result']->date;
			$b = explode("-",$a);
			$c = $b[1]."/".$b[2]."/".$b[0];
			 $template['result']->date = $c;
		$template['list'] = $this->Theatres_model->get_moviesby_id($template['result']->cinemas_id);
		$template['screen'] = $this->Theatres_model->get_screenby_id($template['result']->cinemas_id);

		if(!empty($template['result'])) 
		 {
 		   if($_POST)
		    {
		    	$data = $_POST;
		    	$this->Theatres_model->editshows($id,$data);
		    	$this->session->set_flashdata('message',array('message' => ' Edited successfully ','class' => 'success'));
				 redirect(base_url().'theatre/viewshow');
		    }
		   
		}
		 
		$this->load->view('template', $template);
	}

	public function delete_showtheatre(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Theatres_model->deleteshow($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Deleted successfully ','class' => 'success'));
				 redirect(base_url().'theatre/viewshow');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry not deleted ','class' => 'danger'));
				  redirect(base_url().'theatre/viewshow');
		    	}

		$this->load->view('template', $template);
	}

	public function addscreen(){
		$template['page'] = "theatre/addscreen";
		$template['page_title'] = "Add screen";
		$template['theater'] = $this->Theatres_model->view();
	$this->load->view('template', $template);
}

public function input_screendata(){

  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
   $result = $this->Theatres_model->screendata($request);
   if($result == 'fail'){
   	 $res= array( 'status'=>'failure','message'=> "Sorry Not received.Please try again later");
       }
       else{
         $res= array( 'status'=>'success','message'=> "getdata Successfully",'user'=>$result);
}
 echo json_encode($res);
}

public function theatre_screen_details(){
	  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result = $this->Theatres_model->screen_details($request);
    if($result == "success")
    {
    	 $res= array( 'status'=>'success','message'=> "Data submited Successfully");
    }
    else{
        $res= array( 'status'=>'failure','message'=> "Sorry Not submited.Please try again later");

    }
 echo json_encode($res);
}

public function close_button(){
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
	   $result = $this->Theatres_model->close_button($request);
	   if($result == "success"){
	   	 $res= array( 'status'=>'success','message'=> "Data submited Successfully");
	   }
	      else{
        $res= array( 'status'=>'failure','message'=> "Sorry Not submited.Please try again later");

    }
    echo json_encode($res);
}

public function viewscreen(){
	$template['page'] = "theatre/viewscreen";
		$template['page_title'] = "View screen details";
		$template['list'] = $this->Theatres_model->viewscreen();
		$this->load->view('template', $template);
}

public function delete_viewscreen(){
	 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Theatres_model->delete_screen($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Screen deleted successfully ','class' => 'success'));
		    		  redirect(base_url().'theatre/viewscreen');	
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Screen not deleted ','class' => 'danger'));
		    		   redirect(base_url().'theatre/viewscreen');	
		    	}

		$this->load->view('template', $template);
}
public function edit_viewscreen(){
	$id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 
	 $template['page'] = "theatre/edit_viewscreen";
		$template['page_title'] = "Edit screen";
		$template['theater'] = $this->Theatres_model->view();
		//$template['data'] = $this->Theatres_model->get_screen_data($id);
		$this->load->view('template', $template);

}
public function get_screendata(){
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
	$result = $this->Theatres_model->get_screen_data($request);
	if($result){
	 $res= array( 'status'=>'success','message'=> "Data submited Successfully",'user'=>$result);
    }
    else{
        $res= array( 'status'=>'failure','message'=> "Sorry Not submited.Please try again later");

    }
 echo json_encode($res);
}
public function edit_input_screendata(){
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
   $result = $this->Theatres_model->edit_screendata($request);
   if($result == 'fail'){
   	 $res= array( 'status'=>'failure','message'=> "Sorry Not received.Please try again later");
       }
       else{
         $res= array( 'status'=>'success','message'=> "getdata Successfully",'user'=>$result);
}
 echo json_encode($res);
}

public function view_viewscreen(){
	 $template['page'] = "theatre/view_viewscreen";
		$template['page_title'] = "View screen";

		$this->load->view('template', $template);

}
public function get_theater_preview(){
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
    $result = $this->Theatres_model->get_theater_preview($request);
    if($result){
    	 $res= array( 'status'=>'success','message'=> "getdata Successfully",'user'=>$result);
    }
    else{
    	$res= array( 'status'=>'failure','message'=> "Sorry Not received.Please try again later");
    }
    echo json_encode($res);
}
public function get_close_button2(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata,true);
     $result = $this->Theatres_model->get_close_button2($request);
     if($result == "success"){
      $res= array( 'status'=>'success','message'=> "update Successfully");
    }
    else{
    	$res= array( 'status'=>'failure','message'=> "Sorry Not received.Please try again later");
    }
    echo json_encode($res);
}
}
