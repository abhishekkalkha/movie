<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rolemanagement extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('Rolemanagement_model');
		$this->load->helper('access');
			$this->load->model('Usertype_model');
		if(!$this->session->userdata('backend_logged_in')) {
				redirect(base_url());
			}
			/*$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
*/
		 }

	public function index(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

		$template['page'] = "role_management/list";
		$template['page_title'] = "Roles";
		$template['list'] = $this->Usertype_model->view();
			$this->load->view('template', $template); 
	}	 

	public function role_manage(){
		$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}
   		$template['data'] = $this->uri->segment(3);
		if($this->session->userdata('super_admin') == 1){

		$template['page'] = "role_management/role_management";
		$template['page_title'] = "Add role";
		$newarray = array();
			   $id = $this->uri->segment(3);
		if($id==null){
		 redirect($this->router->fetch_class());
		}
		$template['access'] = $this->Rolemanagement_model->get_access($id);
		$rs = $this->Rolemanagement_model->get_details();
		foreach ($rs as $row) {
			$result = $this->Rolemanagement_model->get_functions($row->id);
			$row->functions = $result;
			$newarray[] = $row;
		}
        $template['newarray'] = $newarray;
		$this->load->view('template', $template); 
       }
       else{
		redirect(base_url().'welcome/my404');
	}
	}

    public function update_role(){
    	$data = $_POST;

    	$id = $data['id'];
    	unset($data['id']);
    	$new =array();
    	$newarray = array();

    	foreach ($data as $rs) {
    		$var = implode(',',$rs);
    		$new[] = $var; 
     	}
    	foreach ($new as $value) {
    		$neww = implode(',',$new);
    		$newarray = $neww;
    	}

    	if(empty($newarray)):
    		$newarray = NULL;
    	endif;	
          //print_r($newarray);
    	$role = $this->Rolemanagement_model->update_role($newarray,$id);
    	echo $role;
    }
	
public function edit_role(){
	$class = $this->router->fetch_class();
			$method = $this->router->fetch_method();
			//$called = $class.'/'.$method;
			$r = check_access($class,$method);
			if($r == false)
			{
				redirect(base_url().'welcome/my404');
			}

	$template['page']="role_management/edit";
	   $template['page_title'] ='Edit role';
	   $id = $this->uri->segment(3);
if($id==null){
 redirect($this->router->fetch_class());
}
	   $template['data'] =  $this->Usertype_model->get_data($id);/*editview*/	
	     if(!empty($template['data']))
	     {
		    if($_POST){
             $data = $_POST;
			    $result = $this->Usertype_model->edit($id,$data);
				$this->session->set_flashdata('message',array('message' => 'Role updated successfully ','class' => 'success'));
				redirect(base_url().'rolemanagement');

		   }
				
            }
			  $this->load->view('template',$template);
}
	
}
