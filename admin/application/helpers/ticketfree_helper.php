<?php


function pull_settings() {  
$CI = & get_instance();
$query = $CI->db->get('tbz_settings');
return $result = $query->result(); 
	
}





?>	
