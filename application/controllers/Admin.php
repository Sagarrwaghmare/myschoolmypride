<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class  Admin  extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->view('base/base');

        $this->load->library('session');

        $auth = $this->session->userdata("Auth");
        // var_dump($auth,isset($auth));        

        $this->load->model('Recipients_Model');
        $this->load->model('Donations_Model');
        $this->load->model('Donor_Model');
        $this->load->model('Variable_Model');
        $this->load->model('Admin_Model');
        

        $this->load->helper('date_helper');

        
        if($this->session->userdata("Auth") != "Admin"){
            redirect("login");
        }

        // print_r($_SERVER['QUERY_STRING']);
        // print_r($_SERVER['REQUEST_URI']);
        // print_r($_SERVER['PATH_INFO']);
    }

// PAGES    

    public function index(){

        $this->load->view('admin/template/header',array('page_title'=>"Admin Dashboard"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        // FETHCING DATA
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y h:i:s a', time());
        $today_in_sec = strtotime($today);
        
        $recipients = $this->Recipients_Model->get_all();
        $upcoming_birthdays   = combinedDatesArray($recipients,$today_in_sec);

        $donations = $this->Donations_Model->get_all_desc();
        $data = array(
            'upcoming_birthdays'=>$upcoming_birthdays,
            'donations'=>$donations
        );
        
        $this->load->view('admin/content/dashboard',$data);


        // $this->load->view('admin/template/footer');
        // echo "<a href='admin/process_login'>Login</a>";
        // echo "<a href='admin/logout'>Logout</a>";
    }

    public function donations($year = null,$month = null){

        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donations"));

        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        if($year == null && $month == null){
            $data = array(
                'donations'=>$this->Donations_Model->get_donations_by_months()
            );
            $this->load->view('admin/content/donations',$data);

        }else{
            $data = array(
                'donation'=>$this->Donations_Model->get_months_donations($year,$month),
                'recipients'=>$this->Recipients_Model->get_all()
            );
            $this->load->view('admin/content/donations-inner',$data);
        }

        // $this->load->view('admin/template/footer');
    }

    
    public function donors($id=null){
        $this->load->view('admin/template/header',array('page_title'=>"Admin Donors"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');

        
        if($id==null){
            $data = array(
                'donors'=>$this->Donor_Model->get_all(),
            );
            $this->load->view('admin/content/donors',$data);
        }else{
            $donor = $this->Donor_Model->get_by_id($id);
            $recipId = $donor[0]['cid'];
            $recipient_data = $this->Recipients_Model->get_by_id($recipId);

            // print_r($recipient_data);
            $data = array(
                'donor'=>$donor,
                'recipients'=>$recipient_data
            );
            $this->load->view('admin/content/donors-inner',$data);   
        }

        // $this->load->view('admin/template/footer');
    }

    public function recipients($id = null){
        $this->load->view('admin/template/header',array('page_title'=>"Admin Recipients"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');



        if($id == null){
            $data = array(
                'recipients'=> $recipients = $this->Recipients_Model->get_all()
            );
            $this->load->view('admin/content/recipients',$data);
        }else{
            $rep = $this->Recipients_Model->get_by_id($id);
// /home/436710.cloudwaysapps.com/muamwmjuef/public_html/assets/images/recipients/ID534DATE1714479612/personal_photos/ID534DATE17144796121716890440.jpg
            $photos_folder = "assets/images/recipients/".$rep[0]['photos_folder']."/personal_photos"; //personal_photos
            $birthday_photos = "assets/images/recipients/".$rep[0]['birthday_photos']."/celebration_photos"; //celebration_photos
            // print_r( $birthday_photos );
            
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
            

            // print_r($birthday_photos_array);

            $donations = $this->Donations_Model->get_all();

            $data = array(
                'recipient'=> $recipients = $this->Recipients_Model->get_by_id($id),
                "photos_folder_array"=>$photos_folder_array,
                "birthday_photos_array"=>$birthday_photos_array,
                "donations"=>$donations,
            );
            $this->load->view('admin/content/recipient-inner',$data);
        }

        // $this->load->view('admin/template/footer');
    }

    public function addrecipient(){

        $this->load->view('admin/template/header',array('page_title'=>"Admin Recipients"));
        // dasboard nav is flex row which closing tag should end in next view 
        $this->load->view('admin/content/dashboard-nav');
        
        $this->load->view('admin/content/recipient-add');
    }


    public function users(){
        
        $this->load->view('admin/template/header',array('page_title'=>"Admin Users"));

        // dasboard nav is flex row which closing tag should end in next view 
        $data = array(
            'admins'=>$this->Admin_Model->get_all(),
        );
        $this->load->view('admin/content/dashboard-nav');
        $this->load->view('admin/content/users',$data);

        // $this->load->view('admin/template/footer');
    }

    public function donationInfo($id){
        $this->load->view('admin/template/header',array("page_title"=>"Donation"));
        
        $don = $this->Donations_Model->get_by_id($id);
        $rid = $don[0]['donated_for'];
        $recipient_data = $this->Recipients_Model->get_by_id($rid);

        $data = array(
            'donation'=>$this->Donations_Model->get_by_id($id),
            'recipients'=>$recipient_data
        );

        // print_r($data);

        $this->load->view('admin/content/dashboard-nav',$data);
        $this->load->view('admin/content/InfoDonation',$data);


        
    }
    
// PAGES


// Functions


    
    public function logout(){
        $this->session->unset_userdata('auth');
        redirect("admin");
    }

    public function export($type = null){
        $data = [];

        switch ($type) {
            case 'recipient':

                $tableHeader = $this->Recipients_Model->describe();
                $tableHeader = array_column($tableHeader, 'Field');

                $recipients = $this->Recipients_Model->get_all();
                $data = array_merge(array($tableHeader),$recipients);
                
                break;
            
            case 'donation':
                
                $tableHeader = $this->Donations_Model->describe();
                $tableHeader = array_column($tableHeader, 'Field');

                $recipients = $this->Donations_Model->get_all();
                $data = array_merge(array($tableHeader),$recipients);

                break;
                // Donations_Model
            case 'donor':
                
                $tableHeader = $this->Donor_Model->describe();
                $tableHeader = array_column($tableHeader, 'Field');

                $recipients = $this->Donor_Model->get_all();
                $data = array_merge(array($tableHeader),$recipients);

                break;
            default:
                # code...
                return;
                break;
        }


        
        // $spreadsheet = new Spreadsheet();
        // $worksheet = $spreadsheet->getActiveSheet();
        
        foreach ($data as $rowNum => $rowData) {            
            // $worksheet->fromArray($rowData, null, 'A' . ($rowNum + 1));
        }

        $filepath = "data.xlsx";

        // $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($filepath).'"');
        // $writer->save('php://output');
    }


    // donors
    public function update_donor($id){
        // print_r($_POST);

        $this->Donor_Model->update_donor($_POST,$id);
        redirect("admin/donors/$id");
    }
    // donations
    public function update_donations($id){
        print_r($_POST);
        $this->Donations_Model->update_donations($_POST,$id);
        echo "Donation Updated";

        redirect("admin/donationInfo/$id");
    }

    // recipients
    public function add_recipient(){
        // print_r($this->input->post());
        // Insert into database and create directory's for future uploads
        $name =  $this->input->post('name');
        $address = $this->input->post('address');
        $email =  $this->input->post('email');
        $gender = $this->input->post('gender');
        $father_occputation =   $this->input->post('father_occputation');
        $mother_occupation = $this->input->post('mother_occupation');
        $household_income = $this->input->post('household_income');
        $contact = $this->input->post('contact');
        $birthdate = $this->input->post('birthdate');
        $wish =  $this->input->post('wish');

        $info = $this->input->post('information');

        
        // Photos
        $profile_pic = $this->input->post('profile_pic');

        

        // Adding...
        $this->Recipients_Model->add($name,$address,$email,$gender,$father_occputation,$mother_occupation,$household_income,$contact,$birthdate,$wish,$info);

        // Getting Last ID, ie the record just inserted
        $last_id = $this->Recipients_Model->get_last_id();
        $unique_key = "ID".$last_id."DATE".time();
        print_r($unique_key);


        // update the unique key in record
        
        $imageExtention = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
        $images_name = $unique_key.".".$imageExtention;
        $this->Recipients_Model->update_unique_key_photos($last_id,$unique_key,$unique_key,$images_name);


        
        $config['upload_path']          = './assets/images/profile_pictures/';
        $config['file_name']            = $unique_key;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = $this->Variable_Model->get_img_upload_size();
        $config['max_width']            = $this->Variable_Model->get_img_upload_width();
        $config['max_height']           = $this->Variable_Model->get_img_upload_height();


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('profile_pic'))
        {
            $error = array('error' => $this->upload->display_errors());

            // $this->load->view('upload_form', $error);
            // 
            // echo "Error<br>";
            // print_r($error);
            $this->Recipients_Model->delete($last_id);
            $this->session->set_flashdata('FileForm',"$error[error]");

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            // $this->load->view('upload_success', $data);
            // echo "success<br>";
            // print_r($data);       
            // $this->session->set_flashdata('FileForm','File uploaded');
            $this->session->set_flashdata('RecipientInfo','Recipient Added');


                
            // Making Directory based of unique_key
            // Directory Path:   website/assets/images/recipients/ID1DATE20240420/celebration_photos,personal_photos
            // mkdir makes directory in the root folder here.
            // if directory structure not found then shows error
            // so first make path by path
            $path = "assets/images/recipients/$unique_key";
            mkdir($path);
            mkdir($path."/celebration_photos");
            mkdir($path."/personal_photos");

            $indexFile = "<!DOCTYPE html>
            <html>
            <head>
                <title>403 Forbidden</title>
            </head>
            <body>
            <p>Directory access is forbidden.</p>
            </body>
            </html>";
            
            write_file($path.'/index.html', $indexFile);
            write_file($path.'/celebration_photos/index.html', $indexFile);
            write_file($path.'/personal_photos/index.html', $indexFile);

        }
        redirect("/admin/addrecipient");
    }
    public function update_recipient(){
        $id = $this->input->post('id');
        $fullname  = $this->input->post('fullname');
        $birthdate = $this->input->post('birthdate');
        $address  = $this->input->post('address');
        $Contact  = $this->input->post('Contact');
        $email = $this->input->post('email');
        $income  = $this->input->post('income');
        $fatheroccupation  = $this->input->post('fatheroccupation');
        $motheroccupation  = $this->input->post('motheroccupation');
        $wish  = $this->input->post('wish');
        $sponsored  = $this->input->post('sponsored');
        $celebrated = $this->input->post('celebrated');
        $sponsoredby  = $this->input->post('sponsoredby');
        $videolink  = $this->input->post('videolink');
        $display = $this->input->post('display');

        $info = $this->input->post('bio');

        $gender = $this->input->post('gender');


        echo "<pre>";

        // print_r($this->input->post());
        var_dump($_POST);

        // return 

        $this->Recipients_Model->update_recipients($id,$fullname,$birthdate,$address,$Contact,$email,$income,$fatheroccupation,$motheroccupation,$wish,$sponsored,$celebrated,$sponsoredby,$videolink,$display,$info,$gender);

        print_r("Recipient Updated");

        redirect("admin/recipients/$id");

    }
    public function delete_recipient($id,$unique_key){
        // API
        // echo "DELETE RECORD $id, $unique_key";
        
    }

    public function test(){

        // $data = $this->Donor_Model->describe();
        // echo "<pre>";

        // foreach ($data as $key => $value) {
            
        //     print_r($value['Field']);
        //     echo " type: ";
        //     print_r($value['Type']);
        //     echo "<br>";

        // }

        // $data = $this->Donations_Model->describe();
        // echo "<br>";

        // foreach ($data as $key => $value) {
            
        //     print_r($value['Field']);
        //     echo " type: ";
        //     print_r($value['Type']);
        //     echo "<br>";

        // }       
        // $data = $this->Recipients_Model->describe();
        // echo "<br>";


        // foreach ($data as $key => $value) {
            
        //     print_r($value['Field']);
        //     echo " type: ";
        //     print_r($value['Type']);
        //     echo "<br>";

        // }

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        
        $prefs = array(
            // 'tables'        => array('table1', 'table2'),   // Array of tables to backup.
                                                            // Omitting this means all tables.
            'ignore'        => array(),                     // List of tables to omit from the backup
            'format'        => 'zip',                       // gzip, zip, txt. 'zip' is recommended for compression.
            'filename'      => 'my_db_backup.sql',          // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n"                         // Newline character used in backup file
        );

        $backup = $this->dbutil->backup($prefs);

        // Check if backup was successful (it usually returns a string)
        if ($backup === FALSE) {
             show_error('Database backup failed.');
             return;
        }

        // Define backup file name
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip'; // Change extension if you chose 'gzip' or 'txt'

        // Load the download helper and send the file to your browser
        force_download($db_name, $backup);

        // Optional: You could try writing to a file on the server first,
        // but direct download is often easier if permissions allow execution.
        // $backup_path = FCPATH . 'backups/' . $db_name; // Make sure 'backups' folder exists and is writable
        // if (write_file($backup_path, $backup)) {
        //     echo 'Backup saved to: ' . $backup_path;
        // } else {
        //     echo 'Unable to write the backup file to disk.';
        // }



        echo "Hello Test";
        
    }


    public function change_photo(){

        $id = $this->input->post('id');
        $imgName = $this->input->post('imgName');

        // var_dump($id,$imgName);

        // echo "Hello";

        // return;
        if($id == null || $imgName == null){
            // redirect('admin/recipients');
        }else{
            var_dump($id,$imgName);
            print_r($this->input->post());

            
        $config['upload_path']          = './assets/images/profile_pictures/';
        $config['file_name']            = $imgName;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = $this->Variable_Model->get_img_upload_size();
        $config['max_width']            = $this->Variable_Model->get_img_upload_width();
        $config['max_height']           = $this->Variable_Model->get_img_upload_height();
        $config['overwrite']            = true;


        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('changeProfilePic')){
            $error = array('error' => $this->upload->display_errors());
            echo "Error<br>";
            print_r($error);
            
            $this->session->set_flashdata('changeProfilePic',"Error: $error[error]");
        }else{
            $data = array('upload_data' => $this->upload->data());
            echo "success<br>";
            print_r($data);
            $this->session->set_flashdata('changeProfilePic',"File Uploaded Successfully");            
        }


        redirect("admin/recipients/$id");
        }
    }

    public function add_photo($id = null,$unique_key = null,$type = null){
        // 0 = photos folder
        // 1 = celebration folder
        
        if($id == null || $unique_key == null || $type == null){
        }else{

            if($type == 1){
                // celebration
                $this->session->set_flashdata('type',1);            
                $type = "celebration_photos";
            }else{
                // normal
                $this->session->set_flashdata('type',0);            
                $type = "personal_photos";
            }

            $unique_key_id = $unique_key;

            $imageExtention = pathinfo($_FILES["uploadImg"]["name"], PATHINFO_EXTENSION);
            
            // /home/436710.cloudwaysapps.com/muamwmjuef/public_html/assets/images/recipients/ID534DATE1714479612/personal_photos/ID534DATE17144796121716890440.jpg
            $config['upload_path']          = "./assets/images/recipients/$unique_key_id/$type/";
            $config['file_name']            = $unique_key_id."".time().".".$imageExtention;
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = $this->Variable_Model->get_img_upload_size();
            $config['max_width']            = $this->Variable_Model->get_img_upload_width();
            $config['max_height']           = $this->Variable_Model->get_img_upload_height();

            // var_dump($config['upload_path'],$unique_key_id);
            // print_r($_FILES);

            
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('uploadImg')){
            $error = array('error' => $this->upload->display_errors());
            echo "Error<br>";
            print_r($error);
            print_r($config['upload_path']);
            
            $this->session->set_flashdata('addPhoto',"Error: $error[error]");
        }else{
            $data = array('upload_data' => $this->upload->data());
            echo "success<br>";
            print_r($data);
            print_r($config['upload_path']);

            
            $this->session->set_flashdata('addPhoto',"File Uploaded Successfully");            
        }

        redirect("admin/recipients/$id");
        }
        
    }
    public function photo_delete($unique_key = null,$value = null){
        // API
    }
// Functions

}


?>