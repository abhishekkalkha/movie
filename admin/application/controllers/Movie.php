<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Movie_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
	/*		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
*/
		 }
		
	public function create(){

		$template['page'] = "movie/create";
		$template['page_title'] = "Add Movies";
		$template['language'] = $this->Movie_model->get_language();
		$template['tag'] = $this->Movie_model->get_tag();
		$template['cast'] = $this->Movie_model->get_cast();
		$template['actors'] = $this->Movie_model->get_actors();
		$template['role'] = $this->Movie_model->get_role();
		$template['format'] = $this->Movie_model->get_format();
         if(!empty($_POST)) {
	       if(isset($_POST)){
	    	  //$data = $_POST;
	       	$data['movie_name'] = $this->input->post('movie_name');
	       	$data['certificate'] =$this->input->post('certificate');
	       	  	$data['format'] = $this->input->post('format');
	       	$data['language'] = $this->input->post('language');
	       	$data['release_date'] =$this->input->post('release_date');
	       	$data['total_hours'] = $this->input->post('total_hours');
	       	$data['tag_id'] =$this->input->post('tag_id');
	       	$data['trailer'] = $this->input->post('trailer');
	       	$data['description'] =$this->input->post('description');
	       	$data['facebook'] =$this->input->post('facebook');
	       	$data['googleplus'] = $this->input->post('googleplus');
	       	$data['twitter'] =$this->input->post('twitter');
	       	$data['cast'] =$this->input->post('cast');
	       	$actorcount = $this->input->post('actors');
	       	$rolecount = $this->input->post('role');
   	          $config['upload_path'] = './uploads/';
              $config['allowed_types'] = '*';               
              $config['max_size'] = '800'; 
	          $this->load->library('upload', $config);
              $new_names = $_FILES['image']['name'];
	          $new_name =  time()."_".$_FILES['image']['name'];
			  $config['file_name'] = $new_name;
              $this->upload->initialize($config); 
            if($new_names != ''){
            	if ($this->upload->do_upload('image')){

            		$file_data = $this->upload->data();
			  $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			    $data['image']=base_url().$config['upload_path'].$fname;
            	}
            }
              

                $names =  $_FILES['banner_image']['name'];
		        $name =  time()."_".$_FILES['banner_image']['name'];
				$config['file_name'] = $name;
	            $this->upload->initialize($config);
         if ($names != ''){
         	if ($this->upload->do_upload('banner_image')) {
                 	$file_data = $this->upload->data();
			    $fname=$file_data['file_name'];

			      $config['upload_path'] = 'uploads/';
			      $data['banner_image']=base_url().$config['upload_path'].$fname;
             }
         }
             
			      $new_array=array();
                  for($i=0;$i<count($actorcount);$i++){
                  	
                  	if($rolecount[$i]>0)
                  		$new_array[][$rolecount[$i]] = $actorcount[$i];
                 
                  
                  }
                  $data['crew']=$new_array;
                 $data['crew'] = json_encode($data['crew']);
               
			    $result = $this->Movie_model->add_movie($data);
				$this->session->set_flashdata('message',array('message' => 'Movies added successfully ','class' => 'success'));
				redirect(base_url().'movie');

		   }
		}
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "movie/list";
		$template['page_title'] = "View movies";
		$template['list'] = $this->Movie_model->view();
		$this->load->view('template', $template);
	}
	public function edit_movie(){
	   $template['page']="movie/edit";
	   $template['page_title'] ='Edit Movie';
	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	   $template['language'] = $this->Movie_model->get_language();
	   $template['tag'] = $this->Movie_model->get_tag();	
	   	$template['cast'] = $this->Movie_model->get_cast();
	   	$template['format'] = $this->Movie_model->get_format();
	   	$template['actors'] = $this->Movie_model->get_actors();
		$template['role'] = $this->Movie_model->get_role();
	   $template['data'] = $this->Movie_model->get_data($id);
	   $date = $template['data']->release_date;
	   $new = explode("-",$date);
	   $new_date = $new[1]."/".$new[2]."/".$new[0];
	    $template['data']->release_date = $new_date;
	   $a= $template['data']->tag_id;
	   $b = explode(",",$a);
	   $template['data']->tag_id = $b;
	   $c = $template['data']->cast;
	   $d = explode(",",$c);
	   $template['data']->cast = $d;
	   $crew =json_decode($template['data']->crew) ;
 $i=0;$j=0;
  $new_array = array();
  $new_array1 = array(); 
	   foreach($crew as $key =>$value){
          foreach ($value as $key => $val) {
                $new_array[$i++] = $key; 
                $new_array1[$j++] = $val; 
          }   
	   }
	   $template['data']->role=$new_array;
	    $template['data']->actors=$new_array1;
	     if(!empty($template['data']))
	     {
		    if($_POST){
             $data['movie_name'] = $this->input->post('movie_name');
	       	$data['certificate'] =$this->input->post('certificate');
	       	$data['language'] = $this->input->post('language');
	       	$data['release_date'] =$this->input->post('release_date');
	       	$data['total_hours'] =$this->input->post('total_hours');
	       	$data['trailer'] =$this->input->post('trailer');
	       	$data['facebook'] =$this->input->post('facebook');
	       	$data['twitter'] =$this->input->post('twitter');
	       	$data['googleplus'] =$this->input->post('googleplus');
	       	$data['tag_id'] =$this->input->post('tag_id');
	       	$data['cast'] =$this->input->post('cast');
	       	$actorcount = $this->input->post('actors');
	       	$rolecount = $this->input->post('role');
	       	 $config['upload_path'] = './uploads/';
              $config['allowed_types'] = '*';               
              $config['max_size'] = '800'; 
	          $this->load->library('upload', $config);
              $new_names = $_FILES['image']['name'];
	          $new_name =  time()."_".$_FILES['image']['name'];
			  $config['file_name'] = $new_name;
              $this->upload->initialize($config); 
            if($new_names != ''){
            	if ($this->upload->do_upload('image')){

            		$file_data = $this->upload->data();
			  $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			    $data['image']=base_url().$config['upload_path'].$fname;
            	}
            }
              

                $names =  $_FILES['banner_image']['name'];
		        $name =  time()."_".$_FILES['banner_image']['name'];
				$config['file_name'] = $name;
	            $this->upload->initialize($config);
         if ($names != ''){
         	if ($this->upload->do_upload('banner_image')) {
                 	$file_data = $this->upload->data();
			    $fname=$file_data['file_name'];

			      $config['upload_path'] = 'uploads/';
			      $data['banner_image']=base_url().$config['upload_path'].$fname;
             }
         }
         
               $new_array=array();
               for($i=0;$i<count($actorcount);$i++){

               	if($rolecount[$i]>0)
                 $new_array[][$rolecount[$i]] = $actorcount[$i];
                  
                  }
                  $data['crew']=$new_array;
                 $data['crew'] = json_encode($data['crew']);
			    $result = $this->Movie_model->update_movie($id,$data);
				$this->session->set_flashdata('message',array('message' => 'Movies updated successfully ','class' => 'success'));
				redirect(base_url().'movie');

		   }
				
            }
			  $this->load->view('template',$template);
	}

	public function delete_movie(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Movie_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Movies deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'movie');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry Movies not deleted ','class' => 'danger'));
		    		  redirect(base_url().'movie');	
		    	}

		$this->load->view('template', $template);
	}
    
    public function get_actors_by_id(){
    	$res = $this->Movie_model->get_role_by_id($_POST['role_id']);
    	$result = $this->Movie_model->get_actors_by_id($_POST['role_id']);
          $results = '<option value="-1">Select '.$res->role_name.'</option>';
            foreach($result as $actors) 
            {  
                $results .= '<option value="'.$actors->id.'">'. $actors->actors_name.' </option>';
            }              
            echo $results; 

    }


    public function get_list(){
    	$actors = $this->Movie_model->get_actors();
		$roles = $this->Movie_model->get_role();
		$role_result = '<option value="-1">Select Role</option>';
            foreach($roles as $role) 
            {  
                $role_result .= '<option value="'.$role->id.'">'. $role->role_name.' </option>';
            }  
        $actor_result = '<option value="-1">Select Actor</option>';
            foreach($actors as $actor) 
            {  
                $actor_result .= '<option value="'.$actor->id.'">'. $actor->actors_name.' </option>';
            }  

            print json_encode(array('role'=>$role_result,'actor'=>$actor_result)); 
            
    }

    public function edit_gallery(){
    	$id = $this->uri->segment(3);
    	$template['page'] = "movie/view_gallery";
		$template['page_title'] = "View Gallery";

    	  if(isset($_FILES) && !empty($_FILES)){
             $data = $_FILES;
             $config['upload_path'] = './uploads/';
                     $config['allowed_types'] = '*';               
                     $config['max_size'] = '800'; 
			         $this->load->library('upload', $config);
			         $new_name = time()."_".$_FILES['image']['name'];
					$config['file_name'] = $new_name;
		            $this->upload->initialize($config);


     	if (! $this->upload->do_upload('image'))
            {

			$this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
  
                return FALSE;
             }

             	$file_data = $this->upload->data();
			    $fname=$file_data['file_name'];
			    $config['upload_path'] = 'uploads/';
			   $data['image']=$config['upload_path'].$fname;

			   $this->Movie_model->insert_images($data,$id);
				$this->session->set_flashdata('message',array('message' => 'Images added successfully ','class' => 'success'));
         }
         
    	$template['list'] = $this->Movie_model->get_pics($id);
    	$this->load->view('template', $template);
    }

    public function delete_gallery($id){
    	$id = $_POST['image_id'];//$this->uri->segment(3);
/*if($id==null){
 redirect($this->router->fetch_class());
} 
*/
		    	$result = $this->Movie_model->delete_image($id);
		    	echo $result;
		    	/*if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'Image deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'movie/edit_gallery');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry image
Image not deleted ','class' => 'danger'));
		    		  redirect(base_url().'movie/edit_gallery');	
		    	}

		$this->load->view('template', $template);*/

    }
	

	
}
