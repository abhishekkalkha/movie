<?php


function call_tag($key) {  
$CI = & get_instance();
$query = $CI->db->where('id',$key)->get('tbz_role')->row();
return $query->role_name;

}

function call_person($value){
	$CI = & get_instance();
$query = $CI->db->where('id',$value)->get('tbz_actors')->row();
return $query;

}





?>	