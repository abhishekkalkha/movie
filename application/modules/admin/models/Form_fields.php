<?php
class Form_fields extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function table_field_list($table){
    	$filed_list_res = $this->db->get_where('tbz_tables',array('table'=>$table))->row();
    	foreach (json_decode($filed_list_res->details) as $key => $value) {
    		if($value->enable_in_list){
    			$array[]=$key;
    		}
    	}
    	return $array;
    }
    public function tag_type($type){
    	switch ($type) {
    		case 'varchar':
    			return 'input';
    			break;
			case 'date':
    			return 'input';
    			break;
    		case 'int':
    			return 'input';
    			break;
            case 'file':
                return 'input';
                break;
    		case 'enum':
    			return 'select';
    			break;
    		case 'longtext':
    			return 'textarea';
    			break;
    		
    	}
    }
    public function get_input_type($type){
    	switch ($type) {
    		case 'varchar':
    			return 'text';
    			break;
            case 'file':
                return 'file';
                break;
    		case 'int':
    			return 'number';
    			break;
    	}
    }

    public function get_values($comment,$value){
        $type =explode('->', $comment);
        $result = array();
    	switch ($type[0]) {

            case '0':
                foreach ($type as $key => $value) {
                    $res = explode(",", $value);
                    if($res[0] != '0')
                    {$result[]=$res[0];}
                }
                return $result;
                break;
            case 'get':
                //echo $comment;
                $cmt = explode('-', $type[1]);
                $table = $cmt[0];
                $where = array('id'=>$value);
                $select =$cmt[1] .' as value';
                $this->db->select($select);
                $respo = $this->db->get_where($table,$where)->row();
                $row_value = (count($respo)>0) ? get_object_vars($respo) : '';
                return $row_value;
                break;
            case 'join':
                $cmt = explode('-', $type[1]);
                $table = $cmt[0];
                $select =$cmt[1] ;
                $this->db->select($select);
                $respo = $this->db->get($table)->result_array();
                $row_value = (count($respo)>0) ? $respo : '';
                return $row_value;
                break;
        }
    }
    public function table_field_details($table,$table_key){
    	$sQuery =   "show full columns from ".$table;
    	$response = $this->db->query($sQuery)->result();
    	$filed_list_res = $this->db->get_where('tbz_tables',array('table'=>$table))->row();
    	$filed_list = json_decode($filed_list_res->details);
        // echo '<pre>';
        // print_r($filed_list);
    	if($table_key!=null){
    		$row_value = $this->db->get_where($table,array('id'=>$table_key))->row();
    	}
        //echo '<pre>';print_r($row_value);die();
    	foreach ($response as $key => $value) {
    		$field=$value->Field;
    		if($filed_list->$field->enable_in_form){
    			$value->enable=true;
    		}
    		$value->required = $filed_list->$field->required;
            $value->readonly = $filed_list->$field->readonly;
            //echo $filed_list->$field->file;
            $select_type = '';
            if($filed_list->$field->file_type==1){
                $select_type = 'file';
            }else{
                $type =  explode('(', $value->Type);
                $select_type = $type[0];
            }
    		
			
			//print_r($type);
   
			$value->class_name = ($filed_list->$field->date_type==1) ? 'date_field' : '';
    		$value->tag_type =(empty($value->Comment)) ? $this->tag_type($select_type) : 'select';
            $value->input_type ='';
    		if($value->tag_type=='input'){
    			$value->input_type =$this->get_input_type($select_type);
    		}
            
    		 $value->field_value = (isset($row_value) ? $row_value->$field : ($value->tag_type=='input' ? '' :1));
            //$value->field_value = $row_value->$field ;
            $value->field_available_value = '';
    		if($value->Comment!=''){
    			$value->field_available_value = $this->get_values($value->Comment,(isset($row_value)) ? $row_value->$field : '');
    		}
    		if($value->enable){
    			$result[$field]=array('Field'=>$value->Field,'enable'=>$value->enable,'required'=>$value->required,'readonly'=>$value->readonly,'tag_type'=>$value->tag_type,'input_type'=>$value->input_type,'value'=>$value->field_value,'field_available_value'=>$value->field_available_value,'class_name'=>$value->class_name);
    		}
    	}
        // echo '<pre>';
        // print_r($result);die();
    	return json_encode($result);
    }
	
	/*public function delete_tickets($table,$table_key){
		
		$sQuery =   "show full columns from ".$table;
    	$response = $this->db->query($sQuery)->result();
    	$filed_list_res = $this->db->get_where('tbz_tables',array('table'=>$table))->row();
    	$filed_list = json_decode($filed_list_res->details);

		 if($filed_list){
			 echo "success";
		 }
		 else
		 {
			 echo "error";
		 }	 
		 
		
	}*/
}
?>