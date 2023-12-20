<?php

function check_installer(){
  
  $file = "INSTALLER_TRUE.php";
    if(file_exists($file)){
        redirect(base_url().'Installer/installer.php');
    } 
}
function set_upload_logo($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['width'] = 60;
    $config['height'] = 80;
	$config['overwrite']     = FALSE;

	return $config;
}



function set_upload_favicono($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}



function remove_html(&$item, $key)
{
    $item = strip_tags($item);
}

function get_city(){

	$ci =& get_instance();

	if(!isset($_COOKIE['tb_search'])) {
    	$city = "CITY";    	
	} else {
		$city = get_cookie('tb_search');

		$rs = $ci->db->where('id',$city)->get('tbz_location')->row();
		$city = $rs->location;

	}

	return $city;
}

function get_user_data(){
	$ci =& get_instance();
	$sessionData = $ci->session->userdata('logged_in');
    $session_id = $sessionData['id'];
	
	$ci->db->select('*');
    $ci->db->where('id', $session_id);
    $query = $ci->db->get('tbz_users');
    $result = $query->row();
	
	if($result){
		$result->status = 'success';
		return $result;
	} else {
		return false;
	}
}

function get_icon(){
	$CI = & get_instance();
	
	$CI->db->select('*');
	$CI->db->where('id', 1);
	$CI->db->from('tbz_settings');
	$result = $CI->db->get()->row();
	return $result;
	//$CI->load->model("settings_model");
	//$settings = $CI->settings_model->get_settings();
	//$CI->session->set_userdata('edmlead_settings',$settings);*/
	//return $settings;
	
	
}
function getSettings() {  
$CI = & get_instance();
$result = $CI->db->get('tbz_settings')->row();
$a = $CI->db->where('name',$result->country)->get('tbz_countries')->row();
$result->currency_code=$a->currency_code;
return $result;

}
?>