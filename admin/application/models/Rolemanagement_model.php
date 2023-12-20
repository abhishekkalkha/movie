<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rolemanagement_model extends CI_Model {

function rolename(){
	$names=array('1','3');
		$this->db->select('tbz_usertypes.id,tbz_usertypes.name,tbz_users.first_name
						  ');						   
		$this->db->from('tbz_usertypes ');
			$this->db->join('tbz_users', 'tbz_usertypes.id = tbz_users.user_type','left');
			$this->db->where_in('tbz_usertypes.id',$names);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}
 
	public function get_details(){
		return $query = $this->db->get('tbz_controller')->result();
	}
	public function get_functions($id){
		$this->db->where('c_id',$id);
		$query = $this->db->get('tbz_controller_functions');
		return $query->result();
	}

	public function update_role($data,$id){

		$datas =array(
			          'page_id'=>$data
			    );
		$selects =$this->db->query("select * from tbz_role_permission where role_id ='$id'"); 
	
		if($selects->num_rows() == 0) {
		
		 $datas =array('role_id'=>$id,
			          'page_id'=>$data
			    );
			if( $this->db->insert('tbz_role_permission',$datas)){
				return 1;
			}else{
				return 2;
			}
		}else{

			 foreach($selects->result_array() as $row){

				$this->db->where('role_id', $id);
				$query = $this->db->update('tbz_role_permission',$datas);
				
				if($query){
					return 3;
				}else{
					return 4;
				}
			}
		}
	}

	public function get_access($id){
		$rs = $this->db->where('role_id',$id)->get('tbz_role_permission')->row();
		$result = array();
		if(count($rs)>0){
			$result = explode(',', $rs->page_id);
		} else {
			$result = array();
		}
		return $result;
	}

	
}
