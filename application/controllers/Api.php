<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  API  extends CI_Controller {
    public function __construct(){
        parent::__construct();
        header("Content-Type:application/json");

        $this->load->library('session');


        
        $this->load->model('Recipients_Model');
        $this->load->model('Donor_Model');
        $this->load->model('Donations_Model');
        $this->load->model('Admin_Model');


        $this->load->helper('hash_helper');
        $this->load->helper('date_helper');
        $this->load->helper('view_helper');

    }
    public function index(){}

    public function fetch_admins(){
        $data = $this->Admin_Model->get_all();
        print_r(json_encode($data));
    }
    public function add_admins(){
        // print_r($_POST);
        $this->Admin_Model->add($_POST['username'],$_POST['email'],$_POST['password']);

        echo "1";
    }

    public function process_donation_form(){
        $data = $this->input->post();

        $fullname = $this->input->post('fullname');
        $address = $this->input->post('address');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $donationTo = numhash($this->input->post('donationTo'));
        $donationAmount = $this->input->post('donationAmount');
        $pan = $this->input->post('pan');
        $attendBirthday = $this->input->post('attendBirthday');
        $discloseIdentity = $this->input->post('discloseIdentity');

        // echo "<pre>";
        // print_r($data);

        // INSERT INTO DONATIONS
        $this->Donations_Model->add_donations($fullname,$address,$contact,$email,$gender,$donationTo,$donationAmount,$pan,$attendBirthday,$discloseIdentity);

        
        // GET LAST DONATION
        $donator_id = $this->Donations_Model->get_last_id();
        // UPDATE SPONRED IN RECIPIENT TABLE
        $this->Recipients_Model->sponsor_true($donationTo,$donator_id);

        // Add Donor
        $this->Donor_Model->add_donor($donationTo,$fullname,$address,$contact,$email,$donationAmount,$attendBirthday,$discloseIdentity,$donator_id,$pan);
        
        echo "done";
    }

    public function fetch_recipients_key_value(){
        $recipients = $this->Recipients_Model->get_all_desc();
        // $data;

        foreach ($recipients as $key => $value) {
            $id = $value['id'];
            $data[$id] = $value;
        }
        print_r(json_encode($data));   
    }
    public function fetch_recipients_desc(){
        $recipients = $this->Recipients_Model->get_all_desc();
        print_r(json_encode($recipients));   
    }

    public function fetch_donation_by_id($id){
        $data = $this->Donations_Model->get_by_id($id);
        print_r(json_encode($data));
    }
    public function fetch_last_donation(){
        $donator_id = $this->Donations_Model->get_last_id();
        print_r(json_encode($donator_id));
    }

    public function fetch_donations(){
        $Donations=$this->Donations_Model->get_all();
        print_r(json_encode($Donations));
    }
    public function fetch_donors(){
        $data = $this->Donor_Model->get_all();
        print_r(json_encode($data));
    }
    public function fetch_donors_desc(){
        $data = $this->Donor_Model->get_all_desc();
        print_r(json_encode($data));
    }
    public function fetch_donations_by_year(){
        $donations =$this->Donations_Model->get_donations_by_months();
        
        print_r(json_encode($donations));
    }

    public function fetch_donations_by_year_filter(){        
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $gender = $this->input->post('gender');
        $city = $this->input->post('city');
        
        $curYear = $this->input->post('currYear');
        $curMonth = $this->input->post('currMonth');

        $var = $this->Donations_Model->get_donations_by_months_filter($start,$end,$gender,$city,$curYear,$curMonth);

        print_r(json_encode($var));
    }

    public function total_recipients(){
        $total = $this->Recipients_Model->get_total_number();
        print_r($total);
    }
    
    public function fetch_upcoming(){
        // fetching data from database 

        $recipients = $this->Recipients_Model->get_all();

        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);
        print_r(json_encode($upcoming_birthdays));
    }
    

    public function fetch_celebrated(){
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);

        $celebrated = $this->Recipients_Model->get_all_celebrated();
        // celebrated birthdays
        $celebrated_birthdays = combinedDatesArrayDesc($celebrated,$today_in_sec);

        print_r(json_encode($celebrated_birthdays));

    }

    // SEARCH
    public function search_recipients(){

        $text = $this->input->post("text");
        $data = $this->Recipients_Model->get_like($text);
        
        print_r(json_encode($data));

    }
    // DELETE

    public function delete_donation($id){
        $this->Donations_Model->delete($id);
        echo "1";
    }
    
    public function delete_donor($id){
        $this->Donor_Model->delete($id);
        echo "1";
    }

    public function delete_recipient($id,$unique_key){

        if($id == null || $unique_key == null){
        }else{
            
            $dirname = (explode(".",$unique_key))[0];
            delete_files("./assets/images/recipients/$dirname", TRUE);
            rmdir("./assets/images/recipients/$dirname");
            
            unlink("./assets/images/profile_pictures/$unique_key"); 
            
            $this->Recipients_Model->delete($id);
            echo "DELETE RECORD $id, $unique_key";

        }
        
    }

    public function delete_photo($unique_key = null,$value = null,$type = null,$id = null){
        if($unique_key != null && $value != null && $type != null){

            // smiles4birthdays-demo\assets\images\recipients\ID394DATE1714374088\celebration_photos
            // assets\images\recipients\ID394DATE1714374088\personal_photos
            var_dump($unique_key,$value,$type);
            unlink("./assets/images/recipients/$unique_key/$type/$value"); 
            echo "Deleted";
            
            // redirect("admin/recipients/$id");

        }
    }
}


?>