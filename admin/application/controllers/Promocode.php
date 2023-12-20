<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Promocode_model');
		$this->load->helper('access');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		 }
		
	public function create(){

		$template['page'] = "promocode/create";
		$template['page_title'] = "Add Promocode";
         if(!empty($_POST)) {
		   if(isset($_POST)){
             $res = explode(" - ", $this->input->post('valid_from'));
                 $a=explode("/",$res[0]);
		         $validfrom=$a[2]."-".$a[0]."-".$a[1];
		         $b = explode("/",$res[1]);
		         $validto=$b[2]."-".$b[0]."-".$b[1];

                 $data = array('promocode'=>$this->input->post('promocode'),
               	              'valid_from'=>$validfrom,
               	              'valid_to'=>$validto,
               	              'promocode_type'=>$this->input->post('promocode_type'),
               	              'off'=>$this->input->post('off'),
               	              'status'=>$this->input->post('status')
               	            );
                 $r = $this->Promocode_model->get_promocode_data($data);
                 if($r){
                    	$this->session->set_flashdata('message',array('message' => 'promocode already exist ','class' => 'danger'));
                redirect(base_url().'promocode/create');
                 }
                 else{
			    $result = $this->Promocode_model->add_promocode($data);
				$this->session->set_flashdata('message',array('message' => 'promocode added successfully ','class' => 'success'));
				 //redirect(base_url().'promocode');
			}

		   }
		   } 
		 $this->load->view('template', $template);

	}

	public function index(){
			$template['page'] = "promocode/list";
		$template['page_title'] = "View promocode";
		$template['list'] = $this->Promocode_model->view();

		$this->load->view('template', $template);
	}

	public function edit_promocode(){
	   $template['page']="promocode/edit";
	   $template['page_title'] ='Edit promocode';
	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	   $template['data'] = $this->Promocode_model->get_promocode($id);
	   // $row = array('a'=>$template['data']->valid_from,
    //          	    'b'=>$template['data']->valid_to
    //          	          );
	   $aa = $template['data']->valid_from;
	    $new = explode("-",$aa);
	   $aa = $new[1]."/".$new[2]."/".$new[0];
	   $bb = $template['data']->valid_to;
	  $neww = explode("-",$bb);
	   $bb = $neww[1]."/".$neww[2]."/".$neww[0];
       $res = $aa."-".$bb;
       //$res = implode("-",$row);
       $template['data']->valid_from = $res;

	     if(!empty($template['data']))
	     {
		    if($_POST){
	         
	             $res = explode("-", $this->input->post('valid_from'));
	            
                 $a=explode("/",$res[0]);
		         $validfrom=$a[2]."-".$a[0]."-".$a[1];
		         $b = explode("/",$res[1]);
		         $validto=$b[2]."-".$b[0]."-".$b[1];

               $data = array('promocode'=>$this->input->post('promocode'),
               	              'valid_from'=>$validfrom,
               	              'valid_to'=>$validto,
               	              'promocode_type'=>$this->input->post('promocode_type'),
               	              'off'=>$this->input->post('off'),
               	              'status'=>$this->input->post('status')
               	            );
            
                  $r = $this->Promocode_model->get_promocode_data($data,$id);
                  if($r){
                 $this->session->set_flashdata('message',array('message' => 'promocode already exist ','class' => 'danger'));
                redirect(base_url().'promocode/index');
                  }
                  else{
			     $result = $this->Promocode_model->update_Promocode($id,$data);
				 $this->session->set_flashdata('message',array('message' => 'promocode updated successfully ','class' => 'success'));
				 redirect(base_url().'promocode');
		    }
		}
				
         }
			  $this->load->view('template',$template);
	}

	public function delete_promocode(){
		 $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
} 

		    	$result = $this->Promocode_model->delete($id);
		    	if($result == 'success'){
		    		$this->session->set_flashdata('message',array('message' => 'promocode deleted successfully ','class' => 'success'));
		    		 redirect(base_url().'promocode');
		    	}
		    	else{
		    			$this->session->set_flashdata('message',array('message' => 'Sorry promocode not deleted ','class' => 'danger'));
		    		  redirect(base_url().'promocode');
		    	}

		$this->load->view('template', $template);
	}


	
}
