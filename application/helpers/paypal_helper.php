<?php


function getSettings() {  
$CI = & get_instance();
$result = $CI->db->get('tbz_settings')->row();
$a = $CI->db->where('name',$result->country)->get('tbz_countries')->row();
$result->currency_code=$a->currency_code;
return $result;

}



?>	