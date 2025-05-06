<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model{

    public function index(){}

    public function get_all(){
        $query = $this->db->get('admin');
        return $query->result_array();
    }
    
    public function get_by_username($username){
        $query = $this->db->get_where('admin',array('username'=>$username));
        return $query->result_array();   
    }

    public function get_by_id($id){
        $query = $this->db->get_where('admin',array('id'=>$id));
        return $query->result_array();
    }

    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('admin',$data);
    }

    public function add($username,$email,$password){
        $data = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
        );
        $this->db->insert('admin',$data);
    }

    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('admin');
    }


}
?>