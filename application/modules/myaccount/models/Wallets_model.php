<?php
class Wallets_model extends CI_Model {

    function __construct(){
        
        parent::__construct();
    }
	
	
	function get_bookdate_details($id){
		$query = $this->db->query("SELECT `tbz_booking_details`.id,`tbz_movies`.image,`tbz_show_details`.date,
		                          `tbz_booking_details`.sub_total,`tbz_booking_details`.no_ticket,
		                          `tbz_booking_details`.booking_fees,`tbz_booking_details`.service_tax,
		                          `tbz_booking_details`.swachh_bharat_cess,`tbz_booking_details`.amount,
		                          `tbz_booking_details`.booking_id,`tbz_chinema`.name,`tbz_location`.location,
		                          `tbz_movies`.movie_name,`tbz_movies`.certificate,`tbz_show_details`.screen_timing,
		                          `tbz_booking_details`.qr_code FROM `tbz_booking_details` LEFT JOIN `tbz_show_details`
		                           ON `tbz_booking_details`.show_id = `tbz_show_details`.id LEFT JOIN `tbz_chinema` ON 
		                           `tbz_show_details`.cinemas_id = `tbz_chinema`.id LEFT JOIN `tbz_location` ON 
		                           `tbz_location`.id = `tbz_chinema`.location LEFt JOIN `tbz_movies` ON 
		                           `tbz_movies`.id = `tbz_show_details`.movie_name_id WHERE 
		                           `tbz_booking_details`.user_id = '$id' ORDER BY `tbz_booking_details`.`id` DESC");
		return $result = $query->result();		 		
	}
	
	function edit_profiles($id) {
		$this->db->where('id',$id);
        $query = $this->db->get('tbz_users');
		$result = $query->row();
		return $result; 
	}
	function updateProfile($data) {
		$where = "id!='".$data['id']."' AND( email='".$data['email']."' OR phone = '".$data['phone']."')";
		$this->db->select('email,phone');	
		$this->db->from('tbz_users');
        $this->db->where($where);

        $phone = $this->db->get();
       // echo $this->db->last_query();
       if($phone->num_rows())
       {
       	echo 1;
       }
       else{
		$this->db->where('id',$data['id']);
        $query = $this->db->update('tbz_users',$data);
		
		if($query){
			echo 0;
		}
		else{
			echo 1;
		}
	}
	}

	function changepassword($data){
		//print_r($data);

		$pass=$data['current_password'];
		$this->db->where('id',$data['id']);
		$this->db->where('password',  md5($pass));
		$query = $this->db->get('tbz_users');
		//echo $this->db->last_query();
		//die();
		//var_dump($query->result());
		if($query->num_rows() > 0)		
		{
			if($data['new_password']==$data['confirm_password'])
			{
				$value = array('password'=>md5($data['new_password']) );
				$this->db->where('id',$data['id']);
				$s=$this->db->update('tbz_users',$value);
				if($s)
				{
					echo 1;	
				}
				else
				{
					echo 0;
				}		
			}
			else
			{
				echo 2;
			}
		}
		else
		{
			echo 3;
		}
	}		
			
	
}

?>