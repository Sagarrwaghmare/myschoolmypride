<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Main  extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');
        $this->load->model('Recipients_Model');
        $this->load->model('Donations_Model');
        $this->load->model('Donor_Model');
        $this->load->model('Admin_Model');
        $this->load->model('Variable_Model');


        $this->load->helper('hash_helper');
        $this->load->helper('date_helper');
        $this->load->helper('view_helper');
    

        $this->load->library('pagination');

        $this->load->library('session');
        
        $auth = $this->session->userdata("Auth");
        // var_dump($auth,isset($auth));        


        // print_r(
        //     $this->Variable_Model->get_date_buffer()
        // );
    }

    public function login(){
        if($this->session->userdata("Auth") == "Admin"){
            redirect("admin");
        }

        
        $this->load->view("main/content/login");
        // echo "<a href='".base_url('main/process_login/admin/admin')."'>Login</a><br>";
        // echo $this->session->flashdata('loginres');


    }
    public function process_login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Admin_Model->get_by_username($username);

        if(!empty($user)){
            $user_password = $user[0]['password'];
            
            if($user_password == $password){
                $this->session->set_userdata("Auth","Admin");
                redirect("admin");
                
            }else{
                $this->session->set_flashdata('loginres', 'Wrong Password');
            }

        }else{
            $this->session->set_flashdata('loginres', 'Wrong Username');
        }

        redirect("login");
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("admin");
    }

// Pages
    public function index(){

        
        // Data Fetching
        $recipients = $this->Recipients_Model->get_all();
        
        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        $today_in_sec = $today_in_sec + $this->Variable_Model->get_date_buffer();

        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);


        $celebrated = $this->Recipients_Model->get_all_celebrated();
        // celebrated birthdays
        $celebrated_birthdays = combinedDatesArrayDesc($celebrated,$today_in_sec);
        // $celebrated_birthdays = $this->Recipients_Model->get_all_sponsored();
        
        $donations = $this->Donations_Model->get_all();
        $new_donation_arr = array();

        foreach ($donations as $key => $value) {
            // ($value['id'],$value);
            $new_donation_arr[$value['id']] = $value;
        }

        $data = array(
            'upcoming_birthdays'=>$upcoming_birthdays,
            'celebrated_birthdays'=>$celebrated_birthdays,
            'donations' => $new_donation_arr,
        );       


        $this->load->view("main/template/header",array("page_title"=>"Home"));
        $this->load->view("main/template/hero");
        $this->load->view("main/content/home",$data);
        $this->load->view("main/template/footer");
    }

    public function howitworks(){
        $this->load->view("main/template/header",array("page_title"=>"How it Works"));
        
        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"How it Works");
        $this->load->view('main/template/hero-banner',$heroContent);

        $this->load->view('main/content/howitworks');

        $this->load->view("main/template/footer");

    }
    public function about(){
        $this->load->view("main/template/header",array("page_title"=>"About us"));
        
        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"About us");
        $this->load->view('main/template/hero-banner',$heroContent);

        $this->load->view('main/content/about_new');

        $this->load->view("main/template/footer");

    }
    
    public function upcoming_birthdays($page = null){       
        // fetching data from database 
        $recipients = $this->Recipients_Model->get_all();

        // upcoming birthday        
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today) + $this->Variable_Model->get_date_buffer();

        $upcoming_birthdays = combinedDatesArray($recipients,$today_in_sec);
        
    


        // Pagination
        $config['base_url'] = base_url('upcoming');
        $config['total_rows'] = sizeof($upcoming_birthdays);
        $limit = 6;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);
        // Pagination



        // DATA 
        $data=array(
            'upcoming_birthdays'=>divideDataByOffset($upcoming_birthdays,$page,$limit)
            // 'upcoming_birthdays'=>$upcoming_birthdays
        );

        $this->load->view("main/template/header",array("page_title"=>"Upcoming Birthdays"));


        
        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Upcoming Birthdays");
        $this->load->view('main/template/hero-banner',$heroContent);

        $this->load->view("main/content/upcoming",$data);
        $this->load->view("main/template/footer");
        
        // Dates are fetched from database
        // new columns are added in database with birthdate with current year, and the new birthdate in seconds
        // today's date is converted into seconds. and compared with the birthdays.
        // lesser seconds are added behind the combined array and more seconds after.
        // The combined array data is similar but sorted based of current date
        // $comArr = combinedDatesArray($data,$today_in_sec);
    }
    
    public function celebrated_birthdays($page= null){

        

        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);

        $celebrated = $this->Recipients_Model->get_all_celebrated();
        // celebrated birthdays
        $celebrated_birthdays = combinedDatesArrayDesc($celebrated,$today_in_sec);


        
        $config['base_url'] = base_url('celebrated');
        $config['total_rows'] = sizeof($celebrated_birthdays);
        $limit = 6;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);
        
        

        // $celebrated_birthdays = $this->Recipients_Model->get_all_celebrated();
        $donations = $this->Donations_Model->get_all();
        $new_donation_arr = array();

        foreach ($donations as $key => $value) {
            // ($value['id'],$value);
            $new_donation_arr[$value['id']] = $value;
        }

        $data = array(
            'celebrated_birthdays'=>divideDataByOffset($celebrated_birthdays,$page,$limit),
            'donations'=> $new_donation_arr,
        );


        // echo "<pre>";
        // print_r($new_donation_arr);
        // echo "</pre>";

        // CHANGE PAGINTAION IN UPCOMING AND CELEBRATED// REMOVE IT OUT OF GRID OR IT'S CONSIDERED GRID ELEMENT AND CHANGES POSITON

        $this->load->view("main/template/header",array("page_title"=>"Celebrated Birthdays"));


        
        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Birthdays Celebrated");
        $this->load->view('main/template/hero-banner',$heroContent);

        $this->load->view("main/content/celebrated",$data);
        $this->load->view("main/template/footer");
    }

    public function donate($id = null){

        $this->load->view('main/template/header',array('page_title'=>"Donation Form"));

        $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Donate Now");
        $this->load->view('main/template/hero-banner',$heroContent);
        
        if($id == null){
            // DEFAULT DONATION PAGE
            $non_sponsoreds = $this->Recipients_Model->get_all_non_spoonsored();
            $data = array(
                'default'=>1,
                'non_sponsoreds'=>$non_sponsoreds
            );

            $this->load->view('main/content/donation-form',$data);
            
        }else{
            // RECIPIENT DONATION PAGE
            $decrypt_id = numhash($id);
            $data = array(
                'default'=>0,
                'recipient'=>$this->Recipients_Model->get_by_id($decrypt_id),
            );

            // $this->load->view('main/template/header',array('page_title'=>"Donate"));
            $this->load->view('main/content/donation-form',$data);

            
        }
        $this->load->view('main/template/footer');


    }

    public function child($id = null){
        if($id != null){
            $decrypt_id = numhash($id);
            $data = $this->Recipients_Model->get_by_id($decrypt_id);
            $donation_id = $data[0]['sponsored_by'];

            $name = $data[0]['name'];
            $celebrated = $data[0]['celebrated'];
            $sponsored = $data[0]['sponsored'];


            $photos_folder = "assets/images/recipients/".$data[0]['photos_folder']."/personal_photos"; //personal_photos
            $birthday_photos = "assets/images/recipients/".$data[0]['birthday_photos']."/celebration_photos"; //celebration_photos
            
            function returnFileArray($photo_dir){
                $dir = $photo_dir;
                $file_array = array();
                
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            // echo "filename:" . $file ."<br>";
                                array_push($file_array,$file);
                            
                        }
                    closedir($dh);
                    }
                }

                // $file_array = array_slice($file_array,2);
                return $file_array;
            }

            $photos_folder_array = returnFileArray($photos_folder);
            $birthday_photos_array = returnFileArray($birthday_photos);

            // var_dump($photos_folder_array,$birthday_photos_array);

            // var_dump(,);
            // var_dump($photos_folder,$photos_folder_array,$birthday_photos,$birthday_photos_array);



            $data = array(
                "data"=>$data[0],
                "photos_folder_array"=>$photos_folder_array,
                "birthday_photos_array"=>$birthday_photos_array,
            );
            // print_r($data);

            $this->load->view("main/template/header",array('page_title'=>"$name"));

            if($celebrated == 1){

                
                // $donation_id
                $donation_arr = array("donation_arr"=>$this->Donations_Model->get_by_id($donation_id));
                
                
                $data = array_merge($data,$donation_arr);               
                

                
                $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Birthday Celebrated");
                $this->load->view('main/template/hero-banner',$heroContent);
                
                $this->load->view("main/content/celebrated-inner",$data);

            }else{


                
                $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Upcoming Birthday");
                $this->load->view('main/template/hero-banner',$heroContent);

                if($sponsored == 1){
                    $donation_arr = array("donation_arr"=>$this->Donations_Model->get_by_id($donation_id));
                    $data = array_merge($data,$donation_arr);                      
                }

                $this->load->view("main/content/upcoming-inner",$data);
            }
            // $this->load->view("main/content/profile",$data);

            $this->load->view("main/template/footer");            
        }else{

        }

    }
// Pages


// Functions
    public function sponsor($id){
        $this->Recipients_Model->sponsor_true($id);
        redirect("");
    }

    public function donation_success(){
        // $this->load->view('main/template/header',array('page_title'=>"Donation Successful"));
        
        // $heroContent = array('image_name'=>"birthdayBanner.jpg",'heading_content'=>"Thank you for your Donation");
        // $this->load->view('main/template/hero-banner',$heroContent);
        $donationId = $_GET['id'];
        $data = $this->Donations_Model->get_by_id($donationId);
        // var_dump(empty($data),$data);

        $name = "Donor";
        
        if(!empty($data) && $donationId != 0){
            $name = $data[0]['name'];
        }
        // print_r($name);

        $arr = array('name'=>$name);

        $this->load->view('main/content/donation_success',$arr);
        // $this->load->view('main/template/footer');

        // echo "Donation Successful";
    }

    public function process_donation_form(){
        // API
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

        echo "done";

        // redirect("donate");
    }


// Functions

}


?>