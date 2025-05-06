<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_Model extends CI_Model{

    public function index(){}


// Metadata
    public function describe(){
        $query = "DESCRIBE donor";
        $data = $this->db->query($query);

        return $data->result_array();
    }
    public function add_column(){
        $query = "ALTER TABLE donor
        ADD COLUMN pan_no text;";

        $this->db->query($query);
    }
// Metadata

    public function get_all(){
        $query = $this->db->get('donor');
        return $query->result_array();
    }
    
    public function get_all_desc(){
        $this->db->order_by('id',"DESC");
        $query = $this->db->get('donor');
        return $query->result_array();
    }

    public function get_by_id($id){
        $query = $this->db->get_where('donor',array('id'=>$id));
        return $query->result_array();
    }

    public function get_id_names(){
        // $query = $this->db->get()
    }

    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('donor',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('donor',$data);
    }

    public function add_donor($cid,$name,$address,$contact,$email,$amount,$attend,$disclose,$details,$pan){
        $data = array(
            'cid'=>$cid,
            'name'=>$name,
            'address'=>$address,
            'contact'=>$contact,
            'email'=>$email,
            'donation_amount'=>$amount,
            'attend'=>$attend,
            'identity_disclose'=>$disclose,
            'details'=>$details,
            'pan_no'=>$pan
        );   
        $this->db->insert('donor',$data);
    }

    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('donor');
    }

    public function update_donor($arr,$id){
        print_r($arr);
        $this->db->set($arr);
        $this->db->where('id', $id);
        $this->db->update('donor');

        echo "updated";
    }


}
?>