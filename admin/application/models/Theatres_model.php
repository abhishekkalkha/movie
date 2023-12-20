<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theatres_model extends CI_Model {

     public function get_locations(){
        $this->db->where('status','1');

   	     return $query = $this->db->get('tbz_location')->result();
     }
     public function get_data($id){
     	$this->db->where('id',$id);
     	return $query = $this->db->get('tbz_theater_details')->row();
     }
     public function edit($id,$data){
     	$this->db->where('id',$id);
       $this->db->update('tbz_theater_details',$data);
       return "success";
     }
     public function delete($id){
     	$data = array('status'=>'0');
     	$this->db->where('id',$id);
       $this->db->update('tbz_theater_details',$data);
       return "success";
     }

     public function view(){
        $this->db->select('tbz_theater_details.id,tbz_theater_details.theater_name,tbz_theater_details.latitude,tbz_theater_details.longitude,tbz_location.location');
        $this->db->from('tbz_theater_details');


        $this->db->join('tbz_location','tbz_location.id = tbz_theater_details.city');
                $this->db->where('tbz_theater_details.status','1');
     	return $query = $this->db->get()->result();
     }

     public function add_theatres($data){
        $this->db->insert('tbz_theater_details',$data);
     }
    public function get_movies(){
                 
         return $query = $this->db->get('tbz_movies')->result();
     }
      public function get_theatres(){
                 $this->db->where('status','1');
         return $query = $this->db->get('tbz_theater_details')->result();
     }

     Public function get_moviesby_id($id){
        $this->db->select('tbz_movies.movie_name,tbz_movies.id');
        $this->db->from('tbz_movies_to_theatres');
        $this->db->join('tbz_movies','tbz_movies.id = tbz_movies_to_theatres.movie_id');
        $this->db->where('tbz_movies_to_theatres.theatre_id',$id);
         $query = $this->db->get();
         return $query->result();

     }

     public function get_screen(){
        return $query = $this->db->get('tbz_chinema_screen')->result();;
     }

     public function get_screenby_id($id){
        $this->db->where('cinemas_id',$id);
        return $query = $this->db->get('tbz_chinema_screen')->result();
     }

     public function addshow_details($data){
         $datas = $data['cinemas_id'];
         $movie = $data['movie_name_id'];
         $screen = $data['screen_name'];
         $a=explode("/",$data['date']);
         $data['date']=$a[2]."-".$a[0]."-".$a[1];
         $date =  $data['date'];

      
             for($i = 0;$i < count($data["screen_timing"]); $i++)
          {
            $link = array("cinemas_id" =>$datas,
                       "movie_name_id" =>$movie,
                       "screen_name" => $screen,
                       "date" => $date,
                      "screen_timing" => $data["screen_timing"][$i]);
              $this->db->where($link);
              $query = $this->db->get('tbz_show_details')->row();
          }
 
        if($query){
            return $query;
        }
        else{

          for($i = 0;$i < count($data["screen_timing"]); $i++)
             $this->db->insert('tbz_show_details', 
                array( "cinemas_id" =>$datas,
                       "movie_name_id" =>$movie,
                       "screen_name" => $screen,
                       "date" => $date,
                      "screen_timing" => $data["screen_timing"][$i])); 
        }
    }

      public function get_datas($id){
        $this->db->where('id',$id);
        return $query = $this->db->get('tbz_movies_to_theatres')->row();
     }
     public function edits($id,$data){

        $rs = $this->db->where($data)->where('status','1')->get('tbz_movies_to_theatres')->row();
        if(count($rs)==0 || $rs->id==$id){
            $this->db->where('id',$id);
            $this->db->update('tbz_movies_to_theatres',$data);
        } else {
            $this->db->where('id',$id);
            $this->db->update('tbz_movies_to_theatres',array('status'=>'0'));
        }
        
        
     }
     public function deletes($id){
        $data = array('status'=>'0');
        $this->db->where('id',$id);
       $this->db->update('tbz_movies_to_theatres',$data);
       return "success";
     }

     public function views(){

        $res =  $this->db->query('select `tbz_movies`.`movie_name`,`tbz_movies_to_theatres`.`id`,group_concat(`tbz_theater_details`.`theater_name` SEPARATOR ", ") as `theater_name` from `tbz_movies_to_theatres` join `tbz_theater_details` on find_in_set(`tbz_theater_details`.`id`,`tbz_movies_to_theatres`.`theatre_id`) join `tbz_movies` on `tbz_movies`.`id`=`tbz_movies_to_theatres`.`movie_id` where `tbz_movies_to_theatres`.`status`="1" group by `tbz_movies_to_theatres`.`id` ORDER BY tbz_movies_to_theatres.id DESC');

       return $res->result();
     }

     public function add_movies_theatres($res){
          /* exit();
      $array = $data['theatre_id'];
        $comma_separated = implode(",", $array);
        $data['theatre_id'] = $comma_separated;*/ 
   $datas = $res['movie_id'];
        for($i = 0;$i < count($res["theatre_id"]); $i++){
            $data = array("movie_id" =>$datas,
                          "theatre_id" => $res["theatre_id"][$i]);
            $this->db->where($data);
            $rs = $this->db->get('tbz_movies_to_theatres');
           
            if($rs->num_rows()==0)
            {
                $count++;
                $this->db->insert('tbz_movies_to_theatres',$data); 
               // echo $this->db->last_query();
            }
     }
 } 

     public function get_movie_by_theatres(){
        $this->db->select('tbz_movies.movie_name,tbz_theater_details.theater_name,tbz_chinema_screen.screen_name,tbz_show_details.id,tbz_show_details.date,tbz_show_details.screen_timing');
        $this->db->from('tbz_show_details');
        $this->db->join('tbz_movies','tbz_movies.id=tbz_show_details.movie_name_id');
        $this->db->join('tbz_theater_details','tbz_theater_details.id=tbz_show_details.cinemas_id');
        $this->db->join('tbz_chinema_screen','tbz_chinema_screen.id=tbz_show_details.screen_name');
        $this->db->group_by('tbz_show_details.id');
        $this->db->order_by('tbz_show_details.id','DESC');
        $query = $this->db->get();
        return $query->result();
     }
 public function get_showdatas($id){
    $this->db->where('id',$id);
    $query = $this->db->get('tbz_show_details');
    return $query->row();
 }

 public function editshows($id,$data){
      $a=explode("/",$data['date']);
         $data['date']=$a[2]."-".$a[0]."-".$a[1];
        $this->db->where('id',$id);
       $this->db->update('tbz_show_details',$data);

 }

 public function deleteshow($id){
    $this->db->where('id',$id);
    $this->db->delete('tbz_show_details');
    return "success";
 }

 public function screendata($data){
    $this->db->where('screen_name',$data['screen_name']);
    $this->db->where('cinemas_id',$data['cinemas_id']);
    $query = $this->db->get('tbz_chinema_screen')->row();
    if($query){
        return "fail";
    }
    else{
    $this->db->insert('tbz_chinema_screen',$data);
     $last_id = $this->db->insert_id();
     $this->db->select('tbz_chinema_screen.id,tbz_chinema_screen.cinemas_id,tbz_chinema_screen.screen_name,tbz_chinema_screen.row,tbz_chinema_screen.column,tbz_chinema_screen.chair_align,tbz_theater_details.theater_name');
     $this->db->from('tbz_chinema_screen');
     $this->db->join('tbz_theater_details','tbz_theater_details.id=tbz_chinema_screen.cinemas_id');
        $this->db->where('tbz_chinema_screen.id',$last_id);
        return $query = $this->db->get()->row();
 }
}

 public function screen_details($data){

   $datas = array('layout'=>json_encode($data['layout']),
                  'preview'=>json_encode($data['preview']),
                  'status'=>'1'
            );
  $this->db->where('id',$data['id']);
$this->db->update('tbz_chinema_screen',$datas);
return "success";
 }


 public function close_button($data){
    $this->db->where('id',$data);
      $this->db->delete('tbz_chinema_screen');
      return "success";
 }

 public function viewscreen(){
     $this->db->select('tbz_chinema_screen.id,tbz_chinema_screen.cinemas_id,tbz_chinema_screen.screen_name,tbz_chinema_screen.row,tbz_chinema_screen.column,tbz_chinema_screen.chair_align,tbz_theater_details.theater_name');
     $this->db->from('tbz_chinema_screen');
     $this->db->join('tbz_theater_details','tbz_theater_details.id=tbz_chinema_screen.cinemas_id');
     $this->db->where('tbz_chinema_screen.status',1);
        $this->db->group_by('tbz_chinema_screen.id');
        return $query = $this->db->get()->result();
 }

 public function delete_screen($id){
    $data = array('status'=>'0');
    $this->db->where('id',$id);
    $this->db->update('tbz_chinema_screen',$data);
     return "success";
 }
 public function get_screen_data($id){
    $this->db->where('id',$id);
    return $query = $this->db->get('tbz_chinema_screen')->row();
 }
   public function edit_screendata($data){
    $this->db->where('id!=',$data['id']);
     $this->db->where('screen_name',$data['screen_name']);
    $this->db->where('cinemas_id',$data['cinemas_id']);
    $query = $this->db->get('tbz_chinema_screen')->row();
    if($query){
        return "fail";
    }
    else{

    $datas = array('screen_name'=>$data['screen_name'],
                   'row'=>$data['row'],
                   'column'=>$data['column'],
                'cinemas_id'=>$data['cinemas_id'],
                'chair_align'=>$data['chair_align']
                 );
    $this->db->where('id',$data['id']);
    $q = $this->db->update('tbz_chinema_screen',$datas);
    if($q){
        $this->db->select('tbz_chinema_screen.id,tbz_chinema_screen.cinemas_id,tbz_chinema_screen.screen_name,tbz_chinema_screen.row,tbz_chinema_screen.column,tbz_chinema_screen.chair_align,tbz_theater_details.theater_name');
     $this->db->from('tbz_chinema_screen');
     $this->db->join('tbz_theater_details','tbz_theater_details.id=tbz_chinema_screen.cinemas_id');
        $this->db->where('tbz_chinema_screen.id',$data['id']);
        return $query = $this->db->get()->row();
    }
    else{
        return "fail";
    }
   }
}

public function get_theater_preview($id){
    $this->db->where('id',$id);
    $query = $this->db->get('tbz_chinema_screen')->row();
    return $query;
	}

    public function get_close_button2($data){
          $datas = array('screen_name'=>$data['screen_name'],
                   'row'=>$data['row'],
                   'column'=>$data['column'],
                'cinemas_id'=>$data['cinemas_id'],
                'chair_align'=>$data['chair_align']
                 );
        $this->db->where('id',$data['id']);
        $this->db->update('tbz_chinema_screen',$datas);
        return "success";
    }
}
