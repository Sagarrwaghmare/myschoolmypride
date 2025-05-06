<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipients_Model extends CI_Model{

    public function index(){
        
    }
// Metadata
public function describe(){
    $query = "DESCRIBE recipients";
    $data = $this->db->query($query);

    return $data->result_array();
}
// Metadata

// Searching
    public function get_all(){
        $query = $this->db->get('recipients');
        return $query->result_array();
    }
    public function get_all_desc(){
        $this->db->order_by('id',"DESC");
        $query = $this->db->get('recipients');
        return $query->result_array();
    }
    public function get_total_number(){
        $res = $this->db->count_all_results('recipients');

        return $res;
    }

    public function get_by_id($id){
        $query = $this->db->get_where('recipients',array('id'=>$id));
        return $query->result_array();
    }

    public function get_all_sponsored(){
        $this->db->order_by('updated_at',"DESC");
        $query = $this->db->get_where('recipients',array('sponsored'=>1));
        return $query->result_array();
    }

    public function get_all_non_spoonsored(){
        $query = $this->db->get_where('recipients',array('sponsored'=>0));
        return $query->result_array();
    }

    public function get_all_celebrated(){
        $this->db->order_by('updated_at',"DESC");
        $query = $this->db->get_where('recipients',array('celebrated'=>1));
        return $query->result_array();
    }

    public function get_last_id(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('recipients');
        return $query->result_array()[0]['id'];
    }

    public function get_like($text){
        $this->db->like('name', $text);
        // $this->db->or_like('email', $text);
        $query = $this->db->get('recipients');
        return $query->result_array();
    }

// Searching

// Editing


    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('recipients',$data);
    }

    // Adding
    public function addddddd($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('recipients',$data);
    }
    public function add($name,$address,$email,$gender,$father_occputation,$mother_occupation,$household_income,$contact,$birthdate,$wish,$info){
        $data = array(
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'gender'=>$gender,
            'father_occupation' => $father_occputation,
            'mother_occupation' => $mother_occupation,
            'household_income' => $household_income,
            'contact' => $contact,
            'birthdate' => $birthdate,
            'wish' => $wish,
            'bio'=>$info
        );

        $this->db->insert('recipients',$data);
    }
    // Adding


    // Updating
    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('recipients');
    }
    public function update_recipients($id,$fullname,$birthdate,$address,$Contact,$email,$income,$fatheroccupation,$motheroccupation,$wish,$sponsored,$celebrated,$sponsoredby,$videolink,$display,$info,$gender){
        
        $data = array(
            'name'=>$fullname,
            'birthdate'=>$birthdate,
            'address'=>$address,
            'contact'=>$Contact,
            'email'=>$email,
            'household_income'=>$income,
            'father_occupation'=>$fatheroccupation,
            'mother_occupation'=>$motheroccupation,
            'wish'=>$wish,
            'sponsored'=>$sponsored,
            'celebrated'=>$celebrated,
            'sponsored_by'=>$sponsoredby,
            'video_link'=>$videolink,
            'display'=>$display,
            'bio' => $info,
            'gender'=>$gender
        );

        
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('recipients');


    }

    public function update_unique_key_photos($id,$photos_folder,$birthday_photos,$profile_pic){
        $array = array(
        'photos_folder' =>$photos_folder,
        'birthday_photos' =>$birthday_photos,
        'profile_pic'=>$profile_pic
        );
        
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('recipients');
    }

    public function sponsor_true($id,$donator_id){
        
        date_default_timezone_set("Asia/Calcutta");

        $array = array(
            'sponsored'=>1,
            'sponsored_by'=>$donator_id,
            'updated_at'=> date('Y-m-d H:i:s',time()),
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('recipients');
    }
    // Updating
// Editing


}
?>