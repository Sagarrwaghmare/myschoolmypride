<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Donations_Model extends CI_Model{

    public function index(){}

// Metadata
    public function describe(){
        $query = "DESCRIBE donations";
        $data = $this->db->query($query);

        return $data->result_array();
    }
// Metadata


    public function get_all(){
        $query = $this->db->get('donations');
        return $query->result_array();
    }
    public function get_all_desc(){
        $this->db->order_by('id',"DESC");
        $query = $this->db->get('donations');
        return $query->result_array();
    }

    public function get_by_id($id){
        $query = $this->db->get_where('donations',array('id'=>$id));
        return $query->result_array();
    }
    public function get_last_id(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('donations');
        return $query->result_array()[0]['id'];
    }

    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('donations',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('donations',$data);
    }
    public function add_donations($fullname,$address,$contact,$email,$gender,$donationTo,$donationAmount,$pan,$attendBirthday,$discloseIdentity){
        $data = array(
            'name' => $fullname,
            'city' => $address,
            'contact' => $contact,
            'email' => $email,
            'gender' => $gender,
            'donated_for' => $donationTo,
            'amount' => $donationAmount,
            'Pan_no' => $pan,
            'attend' => $attendBirthday,
            'disclose' => $discloseIdentity,
            'tds_certificate_status'=> 0
        );
        $this->db->insert('donations',$data);
    }

    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('donations');
    }
    public function update_donations($arr,$id){
        $this->db->set($arr);
        $this->db->where('id', $id);
        $this->db->update('donations');
    }



    // Extra
    public function get_donations_by_months(){
        $query = $this->db->query("SELECT YEAR(donation_date) as year,MONTH(donation_date) as month,SUM(amount) as amount,COUNT(id) as count FROM donations GROUP BY  YEAR(donation_date),MONTH(donation_date) DESC");

        return $query->result_array();
    }

    public function get_donations_by_months_filter($start=null,$end=null,$gender=null,$city=null,$curYear = null,$curMonth = null){

        $gencard = "`gender`='$gender'";
        if($gender == 0){
            $gencard = TRUE;
        }

        $startdate = "$curYear-$curMonth-01";
        $enddate =   "$curYear-$curMonth-31";

        if($start != 0){
            $startdate = $start;
        }
        
        if($end != 0){
            $enddate = $end;
        }

        $citycard = "`city`='$city'";
        if($city == 0){
            $citycard = TRUE;
        }

        $datecard = "donation_date BETWEEN '$startdate' AND '$enddate'";

        $where = "WHERE $gencard AND $datecard AND $citycard";

        $query = $this->db->query("SELECT * FROM donations  $where");

        return $query->result_array();
    }

    public function get_months_donations($year,$month){
        $query = $this->db->query("SELECT * FROM `donations` WHERE YEAR(donation_date) = '$year' AND MONTH(donation_date)='$month' ");

        return $query->result();
    }


}
?>