<?php


function check_access($class,$method) {  

$called = $class.'/'.$method;
$CI = & get_instance();
$query = $CI->db->where('link',$called)->get('tbz_controller_functions')->row();
//print_r($query);
if(count($query)>0){
	$id = $CI->session->userdata('user_type');
	//print_r($id);
	$CI->db->where('role_id',$id);
   //$CI->db->where("FIND_IN_SET('$query->id',page_id) !=", 0);
	$r = $CI->db->get('tbz_role_permission');
	$query1 = $r->row();
	//print_r($query->id);
	 $page_name = array();
	 $page_name = explode(',', $query1->page_id);
	    if( in_array($query->id,$page_name))
        {
        	//echo "true";
          	return true;
        }
        else{
        	//echo "false";
          	return false;
        }
}
else{
	//echo "false";
	return true;
}
	
}





?>	