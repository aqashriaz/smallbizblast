<?php
/**
 * 
*/
class Admin extends CI_Controller {
  function __construct(){
          parent::__construct();
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->library('session');
          $seg = $this->uri->segment(2);
          if(!isset($_SESSION['admin_session']) && $seg !='login' ){
          redirect(base_url('Admin/login'));
          }
          if(isset($_GET['logout'])){     
          unset($_SESSION['admin_session']); 
          redirect(base_url('Admin/login')); 
          } 
      }

  public function login()         //login functionality for admin
      {
      if(isset($_POST['submit'])){      
      $username = $_POST['username'];
      $pass = $_POST['password'];
      $this->db->where('username',$username);
      $this->db->where('password',$pass);       
      $que = $this->db->get('admin')->row(); 
      if($que)
      {
      $_SESSION['admin_session'] = $que->id;
      $_SESSION['admin_role'] = $que->admin_role;  
      $admin_role =$_SESSION['admin_role'];
      redirect(base_url('Admin/index')); 

     // header("Location: https://stackoverflow.com/questions/33686117/codeigniter-3-redirect-function-not-working");
            }
      else {
         $this->session->set_flashdata('error', 'Invalid username/password');   
      } 
     }

      $this->load->view("admin/login");
      }

  public function index()        // admin dashboard depending on admin_role
      {
      $data['admin_role'] = $_SESSION['admin_role'];

      if($_SESSION['admin_role'] == 'davemoss')
        {
        $this->load->model('Admin_model');
        $formArray["communities"]= $this->Admin_model->getallcomunities();
        $formArray["com_active1"]= $this->Admin_model->count_active_com();
        $formArray["com_deact1"]= $this->Admin_model->count_inactive_com();
        $formArray["bus_active1"]= $this->Admin_model->count_active_bus();
        $formArray["bus_deact1"]= $this->Admin_model->count_inactive_bus();
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/master_admin_home', $formArray);
        } 
      if($_SESSION['admin_role'] == 'communityadmin')
        {

        $id = $_SESSION['admin_session'];
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $comunity_id  = $data['admin_info']->comunity_id;
        $data2['admin_info'] = $this->db->get_where('admin',['comunity_id' => $comunity_id  ])->row();
        $data2['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();                 

        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_admin_home',$data2);
        }
      if($_SESSION['admin_role'] == 'businessadmin')
        {      
             $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
             $business_id  = $data['admin_info']->business_id;
             $data2['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
             $comunity_id  = $data2['business_info']->approved_by;
             $data2['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->helper('form');
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_admin_home',$data2);

        }    
      }

  public function addnewcommunity() //add new comunity view page master admin
      {
      if($_SESSION['admin_role'] == 'davemoss')
      {
      $this->load->helper('common');
      $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
      $this->load->view('Master_Admin_Portal_Pages/add_new_community');
      }
      else
      {
        $this->load->view('errors/error');
      }
      }

  function add_community()  //davemoss add comunity
      {
      if($_SESSION['admin_role'] == 'davemoss')
      {               
      $formArray = array();
      $formArray['community_name']=$this->input->post('community_name');
      $formArray['admin_name']=$this->input->post('admin_name');
      $formArray['admin_phone']=$this->input->post('admin_phone');
      $formArray['admin_username']=$this->input->post('admin_username');
      $formArray['state']=$this->input->post('state');
      $formArray['email']=$this->input->post('email');
      $formArray['password']=$this->input->post('password');
      $formArray['dateposted']=date('Y-m-d');
      $formArray['slug']=$this->seoUrl($formArray['community_name']);
      $this->load->model('Admin_model');
      $this->Admin_model->insertcommunity($formArray);
      $this->save_routes();
      $this->session->set_userdata('form_message',['type' => 'success','message' => 'Add Community in Pending State']);
      $this->session->set_flashdata('success', 'Community added successfully');
      redirect(base_url().'admin/addnewcommunity');
      }
      else
      {
        $this->load->view('errors/error');
      }
      }

     public function seoUrl($text)
     {
       $text = strtolower(htmlentities($text));
       $text =  str_replace(' ', '-', $text);
       return $text;   
     }

     private function save_routes(){
         $this->load->model('Admin_model');
     $routes = $this->Admin_model->get_all_routes();
     $data = array();
      if(!empty($routes)){       
        $data[] = '<?php '; 
       foreach ($routes as $route) {   
            $data[] = '$route[\''.$route['slug'].'\'] = \''.'Front'.'/'.'community_deal/'.$route['id'].'\';';

     }
     $output = implode("\n", $data); 
     write_file(APPPATH.'cache/routes.php',$output);
      }
      }

  public function viewComunity() // davemoss view list of comunities
      {
      if($_SESSION['admin_role'] == 'davemoss')
      {
      $id = $this->input->get('id');
      $this->load->model('Admin_model');
      $formArray['comunity']=$this->Admin_model->getComunity($id);
      $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
      $this->load->view('Master_Admin_Portal_Pages/edit_comunity',$formArray); 
      }
      else{
        $this->load->view('errors/error');
      }
      }  


  public function updateComunity()  // change status of comunity & send mail 
          {
          if($_SESSION['admin_role'] == 'davemoss')
          {
          $id = $this->input->post('id');
          $formArray = array();
          $formArray['id']=$id;
          $formArray['status']=$this->input->post('status');
          $data1['community'] = $this->db->get_where('communities',['id' =>$id])->row();
          $community_name = $data1['community']->community_name;
          $slug = $data1['community']->slug;
          $comunity_name = $data1['community']->community_name;
          $formArray['status']=$this->input->post('status');
          if($formArray['status'] == 1)
          {
          $dataArray = array();
          $dataArray['comunity_id']=$id;
          $dataArray['username']=$this->input->post('username');
          $dataArray['password']=$this->input->post('password');
          $dataArray['admin_role']='communityadmin';
          $this->load->model('Admin_model');
          $this->Admin_model->insertAdmin($dataArray);
          $this->Admin_model->updateStatus($formArray,$id);    
          $to = $this->input->post('email');
          // User email pass here
          $subject = "SmallBizBlast Program: Your Community Has Been APPROVED!"; 
          //$message = $this->input->post('message'); 
          $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';

          $emailContent .='<hr>';  
          $emailContent .='<tr><td style="height:20px"></td></tr>';
          $emailContent .='<h5  style="font-size:16px; text-align:center;">Welcome! ';
          $emailContent .=$comunity_name;
          $emailContent .=' Has Been APPROVED for the SmallBizBlast program!</h5>';  
          $emailContent .='<br>';
          $emailContent .='<p  style="font-size:16px; ">Your Community Deals website is: www.buylocalblast.com/'.$slug;
          $emailContent .='<br>';
          $emailContent .='<br>';
          $emailContent .='<h4 style="font-size:16px;"> Username :';  
          $emailContent .= $this->input->post('username');
          $emailContent .= '<br>';
          $emailContent .='Password :';
          $emailContent .= $this->input->post('password');
          $emailContent .=' </h4><br>';
          $emailContent .='<p style="font-size:16px;">You can log in to your Community Admin portal here: https://buylocalblast.com/Admin/login';
          $emailContent .='<br>';
          $emailContent .='Attached, you will find a “Quick Start” guide to rolling out your SmallBizBlast program as well as two banners:</p>';
          $emailContent .='<p  style="font-size:16px;">1. “Click for Local Deals” to be placed on your website and wherever else you like.</p><img src="https://buylocalblast.com/assets/images/dealclick.png" width="130px" height="130px" vspace=10 /><p style="font-size:16px;"><a href="https://buylocalblast.com/assets/pdf/business.pdf">Business Quick-Start Guide</a> </p><p  style="font-size:16px;">2.  “Participating Member” to be placed on participating business websites (you choose if mandatory or not).  Businesses will receive this banner via email once they have been approved by you to participate.</p><img src="https://buylocalblast.com/assets/images/emailpart.png" width="130px" height="130px" vspace=10 /><p style="font-size:16px;"><a href="https://buylocalblast.com/assets/pdf/community.pdf">Community Quick-Start Guide </a></p>';

          $emailContent .='<tr><td style="height:20px"></td></tr>';
          $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";         
          $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
          $config['smtp_port']    = '465';
          $config['smtp_timeout'] = '60';

        $config['smtp_user'] = 'support@smallbizblast.com'; //Important
        $config['smtp_pass'] = 'IuO&*jIn?FAR'; //Important


          $config['charset']    = 'utf-8';
          $config['newline']    = "\r\n";
          $config['mailtype'] = 'html'; // or html
          $config['validation'] = TRUE; // bool whether to validate email or not      

          $this->email->initialize($config);
          $this->email->set_mailtype("html");
          $this->email->from($from);
          $this->email->to($to);
          $this->email->subject($subject);
          $this->email->message($emailContent);
          $this->email->send();
          redirect(base_url().'Admin/index');  

          }
          else{
          $this->load->model('Admin_model');
          $this->Admin_model->updateStatus($formArray,$id);
          $this->session->set_flashdata('success', 'Community status updated successfully');
          redirect(base_url().'Admin/index');  
          }     

          }
          else{
          $this->load->view('errors/error');
          }
          }  



  public function updateData()  //update comunity
        {
        if($_SESSION['admin_role'] == 'communityadmin' || $_SESSION['admin_role'] == 'davemoss')
        {
               $id = $this->input->post('id');              
        $adminid = $this->input->post('adminid');       
        $dataArray = array();
        $dataArray['admin_name']=$this->input->post('username');
        $dataArray['password']=$this->input->post('password');        
        $dataArray['admin_phone']=$this->input->post('admin_phone');
        $dataArray['email']=$this->input->post('email');
        $dataArray['welcome_text']=$this->input->post('welcome_text');
        $dataArray['disclaimer_text']=$this->input->post('disclaimer_text');
        $dataArray['administrative_notice']=$this->input->post('administrative_notice');
        $dataArray['eligibility_text']=$this->input->post('eligibility_text');
        $dataArray['facebook']=$this->input->post('facebook');
        $dataArray['instagram']=$this->input->post('instagram');
        $dataArray['twitter']=$this->input->post('twitter');
        $this->load->model('Admin_model');
        $this->Admin_model->updateStatus($dataArray,$id);        
         $formArray['username']=$this->input->post('username');
         $formArray['password']=$this->input->post('password');       
        
         $this->db->update("admin",$formArray, "id='$adminid'");
        $this->session->set_flashdata('success', 'update successfully');
        redirect(base_url().'admin/index');                
        }
        else{
        $this->load->view('errors/error');
        }
        }  

  public function deleteComunity() // delete comunity
        {
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $id = $this->input->get('id');
        $this->load->model('Admin_model');
        $this->Admin_model->delete_comunity($id);
        $this->session->set_flashdata('success', 'Community Deleted successfully');
        redirect(base_url().'admin/index');
        }
        else{
        $this->load->view('errors/error');
        }
        }  

  public function updatePrefrences()
        {
if($_SESSION['admin_role'] == 'communityadmin'){
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $id  = $data['admin_info']->comunity_id;          
        $dataArray = array();  
        $dataArray['email_frequency']=$this->input->post('email_frequency');
         $dataArray['day']=$this->input->post('day_frequency');
        
         $day=$this->input->post('day_frequency');
date_default_timezone_set('America/Los_Angeles'); 
   
$date = new DateTime();
        if($day=='Monday'){
         $date->modify('next monday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Tuesday'){
         $date->modify('next tuesday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Wednesday'){
         $date->modify('next wednesday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Thursday'){
         $date->modify('next thursday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Friday'){
         $date->modify('next friday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Saturday'){
         $date->modify('next saturday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Sunday'){
         $date->modify('next sunday');
         $date= $date->format('Y-m-d'); 
        }
        $dataArray['day_frequency']=$date;
        $this->load->model('Admin_model');
        $this->Admin_model->updateStatus($dataArray,$id);
        redirect(base_url().'admin/index');  
      }
      if($_SESSION['admin_role'] == 'davemoss')
        { 
          $id = $this->input->post('comunity_id');
          $dataArray = array();
        $dataArray['email_frequency']=$this->input->post('email_frequency');      
         $dataArray['day']=$this->input->post('day_frequency');       
         $day=$this->input->post('day_frequency');            
   date_default_timezone_set('America/Los_Angeles'); 
           
$date = new DateTime();
        if($day=='Monday'){
         $date->modify('next monday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Tuesday'){
         $date->modify('next tuesday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Wednesday'){
         $date->modify('next wednesday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Thursday'){
         $date->modify('next thursday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Friday'){
         $date->modify('next friday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Saturday'){
         $date->modify('next saturday');
         $date= $date->format('Y-m-d'); 
        }
        if($day=='Sunday'){
         $date->modify('next sunday');
         $date= $date->format('Y-m-d'); 
        }
        $dataArray['day_frequency']=$date;     
         $this->load->model('Admin_model');
       
        $this->Admin_model->updateStatus($dataArray,$id);
         $this->session->set_flashdata('success', 'Updated successfully');
        redirect(base_url().'admin/com_prefrences?id='.$id);
        }

        }

  public function sendemail() //send emails by Master Admin
        {
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $active= $this->input->post('active'); 
         if($active == 'communities'){          
        $this->load->model('Admin_model');
        $active=$this->Admin_model->getActiveEmails(); 
        foreach ($active as $obj) {
        $new_arr[] = $obj->email;  
        }
        $res_arr = implode(',',$new_arr);
        $to = $res_arr;
        $cc = $this->input->post('cc'); 
        $bcc = $this->input->post('bcc'); 
        $subject = $this->input->post('subjectline'); 
        $message = $this->input->post('message'); 
 
       $this->load->library('email');
        $this->email->initialize(array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://mail.smallbizblast.com',
        'smtp_user' => 'info@buylocalblast.com',
        'smtp_pass' => '{STmK7n_e62f',
        'smtp_port' => 465,
        'crlf' => "\r\n",
        'newline' => "\r\n"
        ));

        $from = 'info@buylocalblast.com';          // Pass here your mail id

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<tr><td style="height:20px;"><p style="height:20px;font-size:18px;"> ';
        $emailContent .=$message;  
        $emailContent .='</p></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";        

       $this->email->bcc($bcc);
        $this->email->cc($cc);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'Email sent to all Active Communities ');
        redirect(base_url().'admin/infoblast');
        }
        elseif ($active == 'business') {
        $this->load->model('Admin_model');
        $activeBusiness= $this->Admin_model->getActiveBusiness();

        foreach ($activeBusiness as $obj) {
        $new_arr[] = $obj->email;  
        }

        $res_arr = implode(',',$new_arr);      
        $to = $res_arr;
        $cc = $this->input->post('cc'); 
        $bcc = $this->input->post('bcc'); 

        $subject = $this->input->post('subjectline'); 
        $message = $this->input->post('message'); 
       $this->load->library('email');
        $this->email->initialize(array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://mail.smallbizblast.com',
        'smtp_user' => 'info@buylocalblast.com',
        'smtp_pass' => '{STmK7n_e62f',
        'smtp_port' => 465,
        'crlf' => "\r\n",
        'newline' => "\r\n"
        ));

        $from = 'info@buylocalblast.com';          // Pass here your mail id
     $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<tr><td style="height:20px;"><p style="height:20px;font-size:18px;"> ';
        $emailContent .=$message;  
        $emailContent .='</p></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>"; 
        $this->email->bcc($bcc);
        $emailContent .='<br>';
        $this->email->cc($cc);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
     
        $this->email->send();
         $this->session->set_flashdata('success', 'Email sent to all Active Business ');
        redirect(base_url().'admin/infoblast');
        }
        redirect(base_url().'admin/metrics');
        }
        else
        {
        $this->load->view('errors/error');
        }
        }
   
  public function infoblast()
        {
        if($_SESSION['admin_role'] == 'davemoss')
        {  
        $this->load->helper('common');
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/master_admin_infoblast');
        }
        else
        {
        $this->load->view('errors/error');
        }
        }
   
  public function metrics()
        {
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $this->load->helper('common');
        $this->load->model('Admin_model');        
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/metrices');
        }
        else
        {
        $this->load->view('errors/error');
        }
        }

     public function business(){
//www
       if($_SESSION['admin_role'] == 'davemoss')
        {
        $id = $this->input->get('id');
        $to = $_SESSION['to'];
        $from = $_SESSION['from'];
        $this->load->model('Admin_model');                         
        $this->load->model('User_model');

       $info = $this->db->get_where('business',['comunity_id' => $id])->result(); 
           $i=0;

        if($info)
                {
                  foreach ($info as $r)
                    {
                          
                         $data['reg'][$i]['name']=$r->name;
                         $data['reg'][$i]['business_id']=$r->id;                        
                        $user_profile=$this->User_model->getdealInfo($r->id, $from, $to);                      
                        $data['reg'][$i]['s']= $user_profile;
                        $i++;
                    }  
               }  
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/bussiness_name',$data);
       }
        else
        {
        $this->load->view('errors/error');
        }

       } 

  public function setting()
        {
        if($_SESSION['admin_role'] == 'davemoss')
        { 
        $this->load->helper('common');
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/change_password');
        }
        else
        {
        $this->load->view('errors/error');
        }
        }

  function change_password(){

       if($_SESSION['admin_role'] == 'davemoss')
        {
        $id['id'] =$_SESSION['admin_session']; 
        $data['data'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();

        $password  = $data['data']->password;
        $oldpassword=$this->input->post('oldpassword');     
        if($password==$oldpassword){
        $formArray = array();
        $formArray['password']=$this->input->post('password');
        $this->db->where('id',$_SESSION['admin_session']);
        $query=$this->db->update('admin',$formArray);
        if($query){
       $this->session->set_flashdata('success', 'Password change successfully');
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/change_password');
        }   
        }
        else{
        $this->session->set_userdata('form_message',['type' => 'error','message' => 'Sorry Please old password not matched.']);      
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view("Master_Admin_Portal_Pages/change_password");
        }       
        }
         else
        {
        $this->load->view('errors/error');
        }
        }
   
  function sponsor(){

        if($_SESSION['admin_role'] == 'davemoss')
        {
        $this->load->helper('common');
        $this->load->model('Admin_model');
        $formArray["communities"]= $this->Admin_model->getallcomunities();
        $formArray["sponsor_img"]= $this->Admin_model->sponsor_img();
        $formArray['communityinfo'] = $this->db->get('sponsor_img')->result();
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/sponsor',$formArray);   
        }
        else
        {
        $this->load->view('errors/error');
        }
        }
   
  public function multiple_files(){  
       
        if($_SESSION['admin_role'] == 'davemoss')
        {
     

        $this->load->library('upload');
        $image = array();
        $ImageCount = count($_FILES['image']['name']);
        $imageNames  = "";

        $uploadImgData['image']=" ";
         

        for($i = 0; $i < $ImageCount; $i++){
        $_FILES['file']['name']       = $_FILES['image']['name'][$i];
        $_FILES['file']['type']       = $_FILES['image']['type'][$i];
        $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$i];
        $_FILES['file']['error']      = $_FILES['image']['error'][$i];
        $_FILES['file']['size']       = $_FILES['image']['size'][$i];

        $uploadPath = 'uploads/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'png|gif';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
        $imageData = $this->upload->data();
        $image_path=base_url("uploads/".$imageData['raw_name'].$imageData['file_ext']);
        $data['image']=$image_path;

        if($i == 0 ){
        $imageNames = $data['image'];
        }
        else{
        $imageNames .= " , ";
        $imageNames .=  $data['image'];
        }      
                            }
        }
        if(!empty($uploadImgData))
        {
        $uploadImgData['image'] = $imageNames;
        $images =(explode(",",$imageNames));
        $community_idd =$this->input->post('community_id');
       $data1['admin_info'] = $this->db->get_where('communities',['id' => $community_idd])->row();
        $community_namee = $data1['admin_info']->community_name; 
        $formArray=array();
        $formArray['image']=$images[0];
        $formArray['image1']=$images[1];
        $formArray['community_id']=$this->input->post('community_id');
        $formArray['community_name']=$community_namee;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');        
      $this->db->replace("sponsor_img",$formArray, "community_id='$community_idd'");  
        $this->session->set_flashdata('success', 'Sponsor Iamges Added successfully');
        redirect(base_url().'admin/sponsor');                
     
        }

        }
        else{
        $this->load->view('errors/error');
        }
        }  

 public function contactus()
        {
         if($_SESSION['admin_role'] == 'davemoss')
        {
        $this->load->helper('common');
        $this->load->model('Admin_model');
        $formArray["contactus"]= $this->Admin_model->getreview();

        $this->load->view('Master_Admin_Portal_Pages/admin_sidebar');
        $this->load->view('Master_Admin_Portal_Pages/review_contact_us',$formArray);
        }
        else
        {
        $this->load->view('errors/error');

        }
        }
  public function com_home()
        {
         if($_SESSION['admin_role'] == 'communityadmin')
        {
        $this->load->helper('common');
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_admin_home');
        }
        else
        {
        $this->load->view('errors/error');
        }
        }

  public function insertsignup(){
      $dataArray = array();
      $dataArray['username']=$this->input->post('username');
      $dataArray['password']=$this->input->post('password');
      $dataArray['name']=$this->input->post('name');
      $dataArray['license']=$this->input->post('license');
      $dataArray['address']=$this->input->post('address');
      $dataArray['address2']=$this->input->post('address2');
      $dataArray['city']=$this->input->post('city');
      $dataArray['zip']=$this->input->post('zip');
      $dataArray['phone']=$this->input->post('phone');
      $dataArray['email']=$this->input->post('email');
      $dataArray['facebook']=$this->input->post('facebook');
      $dataArray['twitter']=$this->input->post('twitter');
      $dataArray['instagram']=$this->input->post('instagram');
      $dataArray['website']=$this->input->post('website');
      $dataArray['comunity_id']=$this->input->post('comunity_id');    
         $this->load->model('Admin_model');
      $this->Admin_model->bus_signup($dataArray);
      $this->session->set_flashdata('success', 'New business added successfully');
      redirect(base_url().'admin/index');
      }

  public function add_business()
        {
        if($_SESSION['admin_role'] == 'communityadmin')
        {
          $this->load->helper('common');

          $id = $_SESSION['admin_session'];

          $data1['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
          $communityid  = $data1['admin_info']->comunity_id;     
          $data['info'] = $this->db->get_where('communities',['id' => $communityid])->row();
          $data['signupInfo'] = $this->db->get_where('business_prefrence',['comunity_id' => $communityid])->row();
          $this->load->view('Community_Admin_Portal_pages/community_sidebar');
          $this->load->view('Community_Admin_Portal_pages/add_business',$data);
        }
        if( $_SESSION['admin_role'] == 'davemoss')
        {
                   
          $communityid  = $_GET['id'];;     
          $data['info'] = $this->db->get_where('communities',['id' => $communityid])->row();
          $data['signupInfo'] = $this->db->get_where('business_prefrence',['comunity_id' => $communityid])->row();      
          $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
          $this->load->view('Community_Admin_Portal_pages/add_business',$data);

        }
        
        }
        function addmatrices(){
 
        $from = $this->input->post('startdate');
        $to = $this->input->post('enddate');
        $formArray['to']= $to;
        $formArray['from']=$from; 
         
         $_SESSION['to']=$to ;
         $_SESSION['from']=$from ;
         
        $this->load->model('Admin_model');
        $this->load->model('User_model');         

        $emails= $this->Admin_model->fetchEmails2($from,$to);
        $formArray["totalemails"]= $this->Admin_model->emailNum5($from,$to);                 
           $i =0;
           if($emails)
                {
                  foreach ($emails as $r)
                    {
                         $formArray['reg'][$i]['community_name']=$r->community_name;
                         $formArray['reg'][$i]['community_id']=$r->community_id;
                         $formArray['reg'][$i]['status']=$r->status;

                        $user_profile=$this->User_model->get_email_details($r->community_id, $from, $to);
                          
                        $formArray['reg'][$i]['s']= $user_profile;
                        $i++;
                    }  
                }    
       
       $deals= $this->Admin_model->masterFetch($from,$to);        
      $formArray["dealnumber"]= $this->Admin_model->dealNum9($from,$to);
      $j =0;
           if($deals)
                {
                  foreach ($deals as $r)
                    {
                         $formArray['reg'][$j]['city_name']=$r->cityname;
                         $formArray['reg'][$j]['city_id']=$r->city_id;
 
                        $deal_profile=$this->User_model->get_deal_details($r->city_id, $from, $to);
                          
                        $formArray['reg'][$j]['num']= $deal_profile;
                        $j++;
                     } 
                }      

    $formArray["sumClicks"]= $this->Admin_model->dealNum8($from,$to); 
    $dealinfo2= $this->Admin_model->fetchDeals($from,$to);
      $k =0;
           if($dealinfo2)
                {
                  foreach ($dealinfo2 as $r)
                    {
                         $formArray['reg'][$k]['city_name']=$r->cityname;
                         $formArray['reg'][$k]['city_id']=$r->city_id;
 
                        $deal_profile2=$this->User_model->get_deal_details2($r->city_id, $from, $to);
                          
                        $formArray['reg'][$k]['num2']= $deal_profile2;
                        $k++;
                     }  
                }        

        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/master_admin_metrics',$formArray);

  }
 
  public function com_metrics()
        {
        if($_SESSION['admin_role'] == 'communityadmin')
        {
        $this->load->helper('common');
        $this->load->model('Admin_model');
         $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $id  = $data['admin_info']->comunity_id; 
        
        $formArray["totalemails"]= $this->Admin_model->countActiveEmail($id);
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_metrices',$formArray);
        }
          if($_SESSION['admin_role'] == 'davemoss'){ 
       
        $id=$_GET['id'];         
        $this->load->model('Admin_model');
        $formArray["totalemails"]= $this->Admin_model->countActiveEmail($id);
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_metrices', $formArray);
          }
        
        else
        {
        $this->load->view('errors/error');
        }
        }

  function com_matrics(){
 if($_SESSION['admin_role'] == 'communityadmin')
        {
        $from = $this->input->post('startdate');
        $to = $this->input->post('enddate');    
        $_SESSION['cto']=$to;
        $_SESSION['cfrom']=$from;
       $communityid=   $this->input->post('comunity_id');
         $data1['admin_info'] = $this->db->get_where('admin',['id' => $communityid])->row();
          $id  = $data1['admin_info']->comunity_id; 
         $this->load->model('Admin_model');
        $this->load->model('User_model');         
        $formArray["emails"]= $this->Admin_model->fetchEmails($from,$to,$id);
        $formArray["totalemails"]= $this->Admin_model->emailNum($from,$to,$id);
         
        $formArray['to']= $to;
        $formArray['from']=$from;  

         $dealss= $this->Admin_model->fetchDeals2($from,$to,$id);
         $formArray["dealnumber"]= $this->Admin_model->dealNum($from,$to,$id); 

          $k =0;
           if($dealss)
                {
                  foreach ($dealss as $r)
                    {
                         $formArray['reg'][$k]['business_name']=$r->business_name;
                         $formArray['reg'][$k]['business_id']=$r->business_id;
 
                        $deal_profile3=$this->User_model->get_deal_details3($r->business_id, $from, $to);
                          
                        $formArray['reg'][$k]['num3']= $deal_profile3;
                        $k++;
                     }  
                } 

         $formArray["sumClicks"]= $this->Admin_model->dealNum2($from,$to,$id);   
         $dealss2= $this->Admin_model->fetchBusiness($from,$to,$id);
         $i =0;
           if($dealss2)
                {
                  foreach ($dealss2 as $r)
                    {
                         $formArray['reg'][$i]['business_name']=$r->business_name;
                         $formArray['reg'][$i]['business_id']=$r->business_id;
 
                        $deal_profile4=$this->User_model->get4($r->business_id, $from, $to);
                          
                        $formArray['reg'][$i]['num4']= $deal_profile4;
                        $i++;
                     }  

                } 

        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_admin_metrics',$formArray);
        }
   if($_SESSION['admin_role'] == 'davemoss'){
     $id=$this->input->post('comunity_id');
        $from = $this->input->post('startdate');
        $to = $this->input->post('enddate');
        $id=   $this->input->post('comunity_id');
  
        $_SESSION['cto']=$to;
        $_SESSION['cfrom']=$from;    
        $this->load->model('Admin_model');
        $this->load->model('User_model');         

        $formArray["emails"]= $this->Admin_model->fetchEmails($from,$to,$id);
        $formArray["totalemails"]= $this->Admin_model->emailNum($from,$to,$id);
            
        $formArray['to']= $to;
        $formArray['from']=$from;  

         $dealss= $this->Admin_model->fetchDeals2($from,$to,$id);
         $formArray["dealnumber"]= $this->Admin_model->dealNum($from,$to,$id); 

          $k =0;
           if($dealss)
                {
                  foreach ($dealss as $r)
                    {
                         $formArray['reg'][$k]['business_name']=$r->business_name;
                         $formArray['reg'][$k]['business_id']=$r->business_id;
 
                        $deal_profile3=$this->User_model->get_deal_details3($r->business_id, $from, $to);
                          
                        $formArray['reg'][$k]['num3']= $deal_profile3;
                        $k++;
                     }  

                } 
         $formArray["sumClicks"]= $this->Admin_model->dealNum2($from,$to,$id);   
         $dealss2= $this->Admin_model->fetchBusiness($from,$to,$id);
        $i =0;
           if($dealss2)
                {
                  foreach ($dealss2 as $r)
                    {
                         $formArray['reg'][$i]['business_name']=$r->business_name;
                         $formArray['reg'][$i]['business_id']=$r->business_id;
 
                        $deal_profile4=$this->User_model->get4($r->business_id, $from, $to);
                          
                        $formArray['reg'][$i]['num4']= $deal_profile4;
                        $i++;
                     }  

                } 
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_admin_metrics',$formArray);

       }
        
       }
        public function metricBusiness(){
   
          if($_SESSION['admin_role'] == 'communityadmin')
        {
           $id =$_GET['id'];
         $data['info'] = $this->db->get_where('deals',['business_id' => $id])->result();
        $this->load->model('Admin_model');         
          $data["totaldeals"]= $this->Admin_model->countDeal1($id);           
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/metricBusiness',$data);
        }

       if($_SESSION['admin_role'] == 'davemoss')
        {
        $this->load->model('Admin_model');         
           
           $id =$_GET['id'];
         $data['info'] = $this->db->get_where('deals',['business_id' => $id])->result();
                             $data["totaldeals"]= $this->Admin_model->countDeal1($id);    
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/metricBusiness',$data);
        }
         
       }

  public function com_business_signup()
        {
          if($_SESSION['admin_role'] == 'communityadmin')
        {
  
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $id  = $data['admin_info']->comunity_id; 
        $data['signup'] = $this->db->get_where('business_prefrence',['comunity_id' => $id])->row();

        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_business_signup_preferences',$data);

        }
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $id  = $_GET['id']; 
        $data['signup'] = $this->db->get_where('business_prefrence',['comunity_id' => $id])->row();
        
       /* print_r($data);
        exit();*/
      
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_business_signup_preferences',$data);

        }
      
        }

  function updateprefrence(){
 

    if($_SESSION['admin_role'] == 'communityadmin')
        {

        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $id  = $data['admin_info']->comunity_id;     

        $formArray = array();
        $formArray['comunity_id']=$id;
        $formArray['licence']=$this->input->post('licence');
        $formArray['prefill']=$this->input->post('prefill');
        $formArray['cityname']=$this->input->post('cityname');
        $formArray['state']=$this->input->post('state');
        
        
        $data= $this->db->get_where('business_prefrence',['comunity_id' => $id])->row();
       if($data){
        $this->db->update("business_prefrence",$formArray, "comunity_id='$id'");
        $this->session->set_flashdata('success', 'Field added successfully');
        redirect(base_url().'admin/index');      
             }
            else{
            $this->db->insert("business_prefrence",$formArray);
            $this->session->set_flashdata('success', 'Field added successfully');
            redirect(base_url().'admin/index');  
            }          
       }
       else   {
           
             $id =$this->input->post('id');
            $formArray = array();
            $formArray['comunity_id']=$this->input->post('id');
            $formArray['licence']=$this->input->post('licence');
            $formArray['prefill']=$this->input->post('prefill');
            $formArray['cityname']=$this->input->post('cityname');
            $formArray['state']=$this->input->post('state');   
            
             $id  = $this->input->post('id');; 
             $data= $this->db->get_where('business_prefrence',['comunity_id' => $id])->row();
            /* print_r($data);
             exit();*/
             if($data){
                  
                 $this->db->update("business_prefrence",$formArray, "comunity_id='$id'");
                $this->session->set_flashdata('success', 'Field added successfully');
                redirect(base_url().'admin/index');      
             }
             else{
                $this->db->insert("business_prefrence",$formArray);
                 $this->session->set_flashdata('success', 'Field added successfully');
                 redirect(base_url().'admin/index');  
             }
                 
             }
        
        
           

        

        } 

  public function com_prefrences()
        {
        if($_SESSION['admin_role'] == 'communityadmin')
        {
           $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
            $id  = $data['admin_info']->comunity_id;     
        $data['info'] = $this->db->get_where('communities',['id' => $id ])->row();
        $this->load->helper('common');
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_smallbizblast_preferences',$data);
        }
         if($_SESSION['admin_role'] == 'davemoss')
        {

          $id=$_GET['id'];
        $data['info'] = $this->db->get_where('communities',['id' => $id ])->row();
        
        $this->load->helper('common');
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_smallbizblast_preferences',$data);
         }         
        }

  public function com_view_business()
        {

        if($_SESSION['admin_role'] == 'communityadmin')
        {
        $dataArray['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $comunity_id= $dataArray['admin_info']->comunity_id; 
        $data['info'] = $this->db->get_where('communities',['id' => $comunity_id ])->row();
        $data['community_name']  = $data['info']->community_name; 
        $this->load->model('Admin_model');   
        $data['admin_info'] = $this->Admin_model->getB($comunity_id);      
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/community_view_businesses',$data);
        }

        if($_SESSION['admin_role'] == 'davemoss' ){

            $id = $_GET['id'];
        $data['info'] = $this->db->get_where('communities',['id' => $id ])->row();
        $data['community_name']  = $data['info']->community_name; 
      
        $data['admin_info'] = $this->db->get_where('business',['comunity_id' => $id ])->result();
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_view_businesses',$data);
        }
         
        }

    public function updateBusinessAdmin()
        {
          if($_SESSION['admin_role'] == 'businessadmin')
        {

        $id = $this->input->post('id'); 
       $old_image= $_REQUEST['image'];
         
        $image  = $_FILES['image']['name'];       
        if($image != '' ){
        $config=[
                        'upload_path'=> './uploads/business_signup/',
                        'allowed_types'=>'gif|png'
                       ];
 
                 $this->load->library('upload',$config);
                  $this->upload->initialize($config);

                 $this->load->library('form_validation');

                $this->form_validation->set_error_delimiters();
                if($this->upload->do_upload('image'))
                {
                  $photo_path =base_url('./uploads/business_signup/'.$image); 
                  $new_photo = $photo_path;           
              }
        }
        if($image == ''){
          $new_photo = $old_image;
        }   
        $dataArray = array();
        $dataArray['hide']=$this->input->post('hide');
        $dataArray['username']=$this->input->post('username');
        $dataArray['password']=$this->input->post('password');
        $dataArray['email']=$this->input->post('email');
        $dataArray['phone']=$this->input->post('phone');
        $dataArray['address']=$this->input->post('address');
        $dataArray['website']=$this->input->post('website');
        $dataArray['youtube']=$this->input->post('youtube');
        $dataArray['instagram']=$this->input->post('instagram');
        $dataArray['facebook']=$this->input->post('facebook');
        $dataArray['twitter']=$this->input->post('twitter');
        $dataArray['covid']=$this->input->post('covid');
         $dataArray['license']=$this->input->post('license');
         $dataArray['state']=$this->input->post('state');
         
        $dataArray['image']=$new_photo;    
        
        $this->load->model('Admin_model');
        $this->Admin_model->updateBusiness($dataArray,$id);
        $idd = $_SESSION['admin_session'];
        
         
        $formArray['username']=$this->input->post('username');
        $formArray['password']=$this->input->post('password');
        $this->db->update("admin",$formArray, "id='$idd'");
          $this->session->set_flashdata('success', 'business data updated successfully');    
        redirect(base_url().'admin/index');  
        } 
        if($_SESSION['admin_role'] != 'businessadmin')
        {
        
       $old_image= $_REQUEST['image'];
       $id = $this->input->post('id');
       
        $image  = $_FILES['image']['name'];
       
        if($image != '' ){
        $config=[
                        'upload_path'=> './uploads/business_signup/',
                        'allowed_types'=>'gif|png'
                       ];
 
                 $this->load->library('upload',$config);
                  $this->upload->initialize($config);

                 $this->load->library('form_validation');

                $this->form_validation->set_error_delimiters();
                if($this->upload->do_upload('image'))
                {
                  $photo_path =base_url('./uploads/business_signup/'.$image); 
                  $new_photo = $photo_path;           
              }
        }
        if($image == ''){
          $new_photo = $old_image;
        }     

        $dataArray = array();
        $dataArray['username']=$this->input->post('username');
        $dataArray['hide']=$this->input->post('hide');
        $dataArray['password']=$this->input->post('password');
        $dataArray['email']=$this->input->post('email');
        $dataArray['phone']=$this->input->post('phone');
        $dataArray['address']=$this->input->post('address');
        $dataArray['website']=$this->input->post('website');
        $dataArray['youtube']=$this->input->post('youtube');
        $dataArray['instagram']=$this->input->post('instagram');
        $dataArray['facebook']=$this->input->post('facebook');
        $dataArray['twitter']=$this->input->post('twitter');
        $dataArray['covid']=$this->input->post('covid');
        $dataArray['license']=$this->input->post('license');
        $dataArray['image']=$new_photo;         
        $dataArray['state']=$this->input->post('state');
        
        
        $this->load->model('Admin_model');
        $this->Admin_model->updateBusiness($dataArray,$id);
        $businessid=$this->input->post('id');
        $data1['admin_info'] = $this->db->get_where('admin',['business_id' => $businessid])->row();
        $adminid = $data1['admin_info']->id;
         
        $formArray['username']=$this->input->post('username');
        $formArray['password']=$this->input->post('password');
        $this->db->update("admin",$formArray, "id='$adminid'");
        $this->session->set_flashdata('success', 'business data updated successfully');
        redirect('admin/adminbusiness'.'?id='.$id, 'refresh'); 
        }
 
        }

  public function addDeal()
        {
          if($_SESSION['admin_role'] == 'businessadmin')
        {
        $dataArray = array();
        $dataArray['business_id']=$this->input->post('business_id');
        $dataArray['business_name']=$this->input->post('business_name');
        $dataArray['business_logo']=$this->input->post('business_logo');

        $dataArray['detail1']=$this->input->post('detail1');
        $dataArray['detail2']=$this->input->post('detail2');
        $dataArray['limitation']=$this->input->post('limitation');
        $dataArray['cityname']=$this->input->post('cityname');
        $dataArray['city_id']=$this->input->post('city_id');     
        $dataArray['dateposted']=date('Y-m-d');           
       $this->load->model('Admin_model');

        $this->Admin_model->insertDeal($dataArray,$id);
        $this->session->set_flashdata('success', 'business deals updated successfully');
        redirect(base_url().'admin/index');  
        }
        else
        {
        $this->load->view('errors/error');
        }
        }

    public function editDeal(){

          if($_SESSION['admin_role'] == 'businessadmin')
        { $id2 = $_GET['id2'];            
          $data['deal'] = $this->db->get_where('deals',['id' => $id2 ])->row();
         $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/editDeal',$data);

        }
      if($_SESSION['admin_role'] != 'businessadmin')
        {
           $id1 = $_GET['id'];
            $id2 = $_GET['id2'];            
          $data['deal'] = $this->db->get_where('deals',['id' => $id2 ])->row();        
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/editDeal',$data);       
        }
    }

    public function dealStatus(){
      $id2 =$this->input->post('business_id'); 
      $id = $this->input->post('id');       
        $dataArray = array();
        $dataArray['detail1']=$this->input->post('detail1');
        $dataArray['detail2']=$this->input->post('detail2');
        $dataArray['limitation']=$this->input->post('limitation');
        $dataArray['count']=$this->input->post('count');
        $dataArray['status']=$this->input->post('status');
       $dataArray['dateposted']=date('Y-m-d');;
 
         $this->db->update("deals",$dataArray, "id='$id'"); 
            $this->session->set_flashdata('success', 'Deal updated successfully');
            if($_SESSION['admin_role'] == 'businessadmin')
        {
             redirect(base_url().'admin/business_deal_list');  

        }
        else{
        redirect('admin/business_deal_list'.'?id='.$id2, 'refresh'); 
        }  
     }    

  public function uploadPic()       // deal image
 
        {   
  
        $config=[
        'upload_path'=> './uploads/deals/',
        'allowed_types'=>'gif|png'
        ];
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        if($this->upload->do_upload())
        {
            $dataArray=$this->input->post();
            $info=$this->upload->data();                       
            $image_path=base_url("uploads/deals/".$info['raw_name'].$info['file_ext']);
            $dataArray['image']=$image_path;

            unset($dataArray['submit']);
            $this->load->model('Admin_model');

            if($this->Admin_model->insertDeal($dataArray))
            {
          //$this->load->view('errors/error');
            }
            else
            {
            $this->session->set_flashdata('success', 'New deal added successfully');          
            redirect('admin/index');
            }
        } 

        else{        
        $dataArray = array();
        $dataArray['business_id']=$this->input->post('business_id');
        $dataArray['business_name']=$this->input->post('business_name');
        $dataArray['business_logo']=$this->input->post('business_logo');

        $dataArray['detail1']=$this->input->post('detail1');
        $dataArray['detail2']=$this->input->post('detail2');
        $dataArray['limitation']=$this->input->post('limitation');
        $dataArray['cityname']=$this->input->post('cityname');
        $dataArray['license']=$this->input->post('license');
        $dataArray['city_id']=$this->input->post('city_id');
        $dataArray['dateposted']=date('Y-m-d');             
        $this->load->model('Admin_model');
        $this->Admin_model->insertDeal($dataArray,$id);
        $this->session->set_flashdata('success', 'New deal added successfully');          
            redirect('admin/index');
  
        }   
        }    

  public function editbusiness()
        {
        if($_SESSION['admin_role'] == 'communityadmin')
        {   
        $id=$this->input->get('id2');

        $data['admin_info'] = $this->db->get_where('business',['id' => $id])->row(); 
         
        $this->load->view('Community_Admin_Portal_pages/community_sidebar');
        $this->load->view('Community_Admin_Portal_pages/edit_business',$data);       }

        if($_SESSION['admin_role'] == 'davemoss'){

        $id=$this->input->get('id2');

        $data['admin_info'] = $this->db->get_where('business',['id' => $id])->row(); 
         $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/edit_business',$data); 
       }
        else
        {
        $this->load->view('errors/error');

        }
        }
  public function business_status()  // email layout when business active send mail to business admin
        {
        if($_SESSION['admin_role'] == 'communityadmin')
        {
        $id = $this->input->post('id'); 
        $data1['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $approvedby = $data1['admin_info']->comunity_id;
        $data1['community'] = $this->db->get_where('communities',['id' => $approvedby])->row();
        $community_name = $data1['community']->community_name;
        $businessname = $this->input->post('name'); 
        $username = $this->input->post('username'); 
        $formArray['status']=$this->input->post('status');
        if($formArray['status'] == 1)
        {                
        $dataArray = array();
        $dataArray['business_id']=$id;
        $dataArray['username']=$this->input->post('username');
        $dataArray['password']=$this->input->post('password');
        $dataArray['admin_role']='businessadmin';
        $this->load->model('Admin_model');
        $this->Admin_model->insertAdmin($dataArray);
        $formArray['activated']=date('y-m-d');    
        $this->Admin_model->updateBusinessStatus($formArray,$id); 
        $to = $this->input->post('email');
        // User email pass here
        $subject = "Welcome to Small Biz Blast"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail attach deal 
          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px;">Congratulations!</p>';  
        $emailContent .='<br>';
        $emailContent .='To log in & begin posting deals, go to :www.buylocalblast.com/Admin/login';
        $emailContent .='<br>';
        $emailContent .='Your username and password is as follows';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4> Username :';  
        $emailContent .= $username;
        $emailContent .= '<br>';
        $emailContent .='Password :';
        $emailContent .= $this->input->post('password');
        $emailContent .=' </h4><br>';
        $emailContent .='<br>';  
        $emailContent .='<br>';
         $emailContent .='<tr><td><p style="font-size:16px;">Attached you will find a<a href="https://buylocalblast.com/assets/pdf/business.pdf"> “Quick Start”</a> guide to help you start posting new deals and managing your account.  You will also find the  “Participating Member” banner to post on your website and show your support for your community’s small business support program.</p></td></tr><tr><td style="background:#ffff;" align="left"><img src="https://buylocalblast.com/assets/images/emailpart.png" width="130px" height="130px" vspace=10  /></td></tr>'; 
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
         $config['smtp_user'] = 'support@smallbizblast.com'; //Important
        $config['smtp_pass'] = 'IuO&*jIn?FAR'; //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'business status updated successfully');
        redirect(base_url().'Admin/com_view_business');  
        }
        else{
        $dataArray = array();
        $dataArray['status']=$this->input->post('status');
        $dataArray['deactivated']=date('y-m-d');
        $this->load->model('Admin_model');
        $this->Admin_model->updateBusinessStatus($dataArray,$id);
        $this->session->set_flashdata('success', 'business status updated successfully');
        redirect(base_url().'admin/com_view_business');  
        }     
        }
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $id2 = $this->input->post('id2'); 
        $id = $this->input->post('id'); 
        $approvedby = $this->input->post('approved_by');
        $data1['community'] = $this->db->get_where('communities',['id' => $approvedby])->row();
        $community_name = $data1['community']->community_name;
        $businessname = $this->input->post('name'); 
        $username = $this->input->post('username'); 

        $formArray['status']=$this->input->post('status');
        if($formArray['status'] == 1)
        {                
        $dataArray = array();
        $dataArray['business_id']=$id;
        $dataArray['username']=$this->input->post('username');
        $dataArray['password']=$this->input->post('password');
        $dataArray['admin_role']='businessadmin';
        $this->load->model('Admin_model');
        $this->Admin_model->insertAdmin($dataArray);
        $formArray['activated']=date('y-m-d');
           $this->Admin_model->updateBusinessStatus($formArray,$id);    
        $to = $this->input->post('email');       
        $subject = "Welcome to Small Biz Blast"; 
         $from = 'support@smallbizblast.com';          // Pass here your mail id  De
          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';

        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px;">Congratulations!</p>';  
        $emailContent .='<br>';
        $emailContent .='To log in & begin posting deals, go to :www.buylocalblast.com/Admin/login';
        $emailContent .='<br>';
        $emailContent .='Your username and password is as follows';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4> Username :';  
        $emailContent .= $username;
        $emailContent .= '<br>';
        $emailContent .='Password :';
        $emailContent .= $this->input->post('password');
        $emailContent .=' </h4><br>';
        $emailContent .='<br>';  
        $emailContent .='<br>';  
        $emailContent .='<tr><td><p style="font-size:16px;">Attached you will find a<a href="https://buylocalblast.com/assets/pdf/business.pdf"> “Quick Start”</a> guide to help you start posting new deals and managing your account.  You will also find the “Participating Member” banner to post on your website and show your support for your community’s small business support program.</p></td></tr><tr><td style="background:#ffff;" align="left"><img src="https://buylocalblast.com/assets/images/emailpart.png" width="130px" height="130px" vspace=10  /></td></tr>';

        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
 
        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
      $config['smtp_user'] = 'support@smallbizblast.com'; //Important
        $config['smtp_pass'] = 'IuO&*jIn?FAR'; //Important
        
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'business status updated successfully');
        redirect('admin/com_view_business'.'?id='.$id2, 'refresh');                
        }
        else{
        $dataArray = array();
        $dataArray['status']=$this->input->post('status');
        $dataArray['deactivated']=date('y-m-d');
        $this->load->model('Admin_model');
        $this->Admin_model->updateBusinessStatus($dataArray,$id);
        $this->session->set_flashdata('success', 'business status updated successfully');
        redirect('admin/com_view_business'.'?id='.$id2, 'refresh');             
        }     
        }
        }


  public function com_infoblast()
      {
      if($_SESSION['admin_role'] == 'communityadmin')
      {  
      $this->load->view('Community_Admin_Portal_pages/community_sidebar');
      $this->load->view('Community_Admin_Portal_pages/info_blast_to_businesses');
      }
      if($_SESSION['admin_role'] == 'davemoss'){         
       $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
      $this->load->view('Community_Admin_Portal_pages/info_blast_to_businesses');
      }
       else
      {
       $this->load->view('errors/error');
      }
      }

  public function communityEmails()     // is ky main bi changing krni hain..
        {
        if($_SESSION['admin_role'] == 'communityadmin' ||  $_SESSION['admin_role'] == 'davemoss')
        {
         $active= $this->input->post('active'); 
         if($active == 'active'){  
        $this->load->model('Admin_model');
        $active=$this->Admin_model->activeBEmails(); 
        foreach ($active as $obj) {
        $new_arr[] = $obj->email;  
        }
        $res_arr = implode(',',$new_arr);
         $to = $res_arr; 
         $cc = $this->input->post('cc'); 
        $bcc = $this->input->post('bcc'); 
        $subject = $this->input->post('subjectline'); 
        $message = $this->input->post('message'); 
        $from = 'info@buylocalblast.com';              // Pass here your mail id 
       $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px;"><p style="height:20px;font-size:18px;"> ';
        $emailContent .=$message;  
        $emailContent .='</p></td></tr>';
       $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://smallbizblast.com/' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
      $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
        $config['smtp_user']    = 'info@buylocalblast.com';    //Important
        $config['smtp_pass']    = '{STmK7n_e62f';  //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->email->bcc($bcc);
        $this->email->cc($cc);
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'Email sent to all Active Business ');
        redirect(base_url().'admin/index');
        }
        elseif ($active == 'inactive') {
        $this->load->model('Admin_model');
        $activeBusiness= $this->Admin_model->inactiveBEmails();
        foreach ($activeBusiness as $obj) {
        $new_arr[] = $obj->email;  
        }
        $res_arr = implode(',',$new_arr);
         $to = $res_arr;         
         
        $cc = $this->input->post('cc'); 
        $bcc = $this->input->post('bcc'); 
        $subject = $this->input->post('subjectline'); 
        $message = $this->input->post('message'); 
        $from = 'info@buylocalblast.com';              // Pass here your mail id
          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px;"><p style="height:20px;font-size:18px;"> ';
        $emailContent .=$message;  
        $emailContent .='</p></td></tr>';
         $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://smallbizblast.com/' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
        $config['smtp_user'] = 'info@buylocalblast.com'; //Important
        $config['smtp_pass']    = '{STmK7n_e62f';  //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->email->bcc($bcc);
        $this->email->cc($cc);
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'Email sent to all InActive Business ');
        redirect(base_url().'admin/index');
        }
        else{
        $this->load->model('Admin_model');
        $activeBusiness= $this->Admin_model->allBEmails();
        foreach ($activeBusiness as $obj) {
        $new_arr[] = $obj->email;  
        }
        $res_arr = implode(',',$new_arr);
        $to = $res_arr;  
        $cc = $this->input->post('cc'); 
        $bcc = $this->input->post('bcc'); 
        $subject = $this->input->post('subjectline'); 
        $message = $this->input->post('message'); 
        $from = 'info@buylocalblast.com';              // Pass here your mail id
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<tr><td style="height:20px;"><p style="height:20px;font-size:18px;"> ';
        $emailContent .=$message;  
        $emailContent .='</p></td></tr>';
     
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://smallbizblast.com' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             

        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

         $config['smtp_user']    = 'info@buylocalblast.com';    //Important
        $config['smtp_pass']    = '{STmK7n_e62f';  //Important
        
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
       $this->email->bcc($bcc);
        $this->email->cc($cc);
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
        $this->session->set_flashdata('success', 'Email sent to all  Business ');
        redirect(base_url().'admin/index');
        } 

        }
         else
        {
        $this->load->view('errors/error');
        }
        }

  public function business_home()
        {
        if($_SESSION['admin_role'] == 'businessadmin')
        {
        $this->load->helper('common');
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_admin_home');
        }
         else
        {
        $this->load->view('errors/error');
        }
        }

  public function business_new_deal()
        {
         if($_SESSION['admin_role'] == 'businessadmin')
        {
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $business_id  = $data['admin_info']->business_id;
        $data2['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
         $comunity_id  = $data2['business_info']->comunity_id;
        $data2['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->helper('form');
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/add_new_deals',$data2);
        }
         if($_SESSION['admin_role'] != 'businessadmin')
        {         
        $business_id  = $_GET['id'];
        $data2['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
         $comunity_id  = $data2['business_info']->comunity_id;
        $data2['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->helper('form');
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/add_new_deals',$data2);
        }
 
        
        }

  public function business_deal_list()
        {
          if($_SESSION['admin_role'] == 'businessadmin')
        { 
        $deal_id = $_SESSION['admin_session'];        
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $deal_id   = $data['admin_info']->business_id;              
        $data['deal_info'] = $this->db->get_where('deals',['business_id' =>$deal_id ])->result();
         $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $business_id  = $data['admin_info']->business_id;
        $data['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
        $comunity_id  = $data['business_info']->comunity_id;
        $data['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/view_deal_list',$data);
        }

        if($_SESSION['admin_role'] != 'businessadmin')
        {
       $deal_id = $_GET['id'];
         $this->load->model('Admin_model');
        $data['deal_info']=$this->Admin_model->get_deals($deal_id);       
        $business_id  = $_GET['id'];
        $data['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
        $comunity_id  = $data['business_info']->comunity_id;
        $data['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
         $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/view_deal_list',$data); 
         }
 
        }

 public function business_reactive_deals()
        {
        if($_SESSION['admin_role'] == 'businessadmin')
        {
        $this->load->helper('common');
        $id = $this->input->get('id');
        $this->load->model('Admin_model');
        $data['deal']=$this->Admin_model->getdeal($id);
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $business_id  = $data['admin_info']->business_id;
        $data['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
        $comunity_id  = $data['business_info']->comunity_id;
        $data['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/view_reactive_deals',$data);
        }

        if($_SESSION['admin_role'] != 'businessadmin')
        {
        $this->load->helper('common');
        $id = $this->input->get('id2');
        $id2 = $this->input->get('id');
          $data['business_info'] = $this->db->get_where('business',['id' =>$id2 ])->row();
       $this->load->model('Admin_model');
        $data['deal']=$this->Admin_model->getdeal($id);
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/view_reactive_deals',$data);
        } 
        }

  public function updateDeal()  //update comunity
        {
          $NewDate=Date('y:m:d', strtotime('+7 days'));
       if($_SESSION['admin_role'] == 'businessadmin')
        {         
         $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $business_id  = $data['admin_info']->business_id;
        $id = $this->input->post('id');       
        $dataArray = array();
        $dataArray['detail1']=$this->input->post('detail1');
        $dataArray['business_id']=$business_id;
        $dataArray['status']=0;
        $dataArray['detail2']=$this->input->post('detail2');
        $dataArray['limitation']=$this->input->post('limitation');
        $dataArray['image']=$this->input->post('image');
        $dataArray['business_logo']=$this->input->post('business_logo');
        $dataArray['city_id']=$this->input->post('city_id');
        $dataArray['cityname']=$this->input->post('cityname');
        $dataArray['business_name']=$this->input->post('business_name');      
         $dataArray['dateposted']=$NewDate;
         $this->db->insert(' deals', $dataArray);
        $this->session->set_flashdata('success', 'Deal reactive successfully');
        redirect(base_url().'admin/business_deal_list');                
        }
        if($_SESSION['admin_role'] != 'businessadmin')
        {
          $id= $this->input->post('business_id');            
        $dataArray = array();
        $dataArray['detail1']=$this->input->post('detail1');
        $dataArray['business_id']=$this->input->post('business_id');
        $dataArray['status']=0;
        $dataArray['detail2']=$this->input->post('detail2');
        $dataArray['limitation']=$this->input->post('limitation');
        $dataArray['image']=$this->input->post('image');
        $dataArray['business_logo']=$this->input->post('business_logo');
        $dataArray['city_id']=$this->input->post('city_id');
        $dataArray['cityname']=$this->input->post('cityname');
        $dataArray['business_name']=$this->input->post('business_name');        
         $dataArray['dateposted']=$NewDate;
         $this->db->insert(' deals', $dataArray);
        $this->session->set_flashdata('success', 'Deal reactive  successfully');
         redirect('admin/business_deal_list'.'?id='.$id, 'refresh');                
        }
        }

  public function cancelDeal(){
         if($_SESSION['admin_role'] == 'businessadmin')
        {
        $id = $this->input->get('id');
        $this->load->model('Admin_model');
        $this->Admin_model->cancel_deal($id);
        redirect(base_url().'admin/business_deal_list');
        }
        else{
        $id = $this->input->get('id');
        $this->load->model('Admin_model');
        $this->Admin_model->cancel_deal($id);
        $this->session->set_flashdata('success', 'Deal deleted  successfully');
        redirect(base_url().'admin/index');    
        } 
      }
 
  
  public function business_metrics()
        {
          if($_SESSION['admin_role'] == 'businessadmin')
        {      
        $this->load->model('Admin_model');
       $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $business_id  = $data['admin_info']->business_id;
        $data['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
        $comunity_id  = $data['business_info']->approved_by;
        $data['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_matrics',$data);
        }
         
        if($_SESSION['admin_role'] != 'businessadmin')
        {                
        $business_id  = $_GET['id'];
        $data['business_info'] = $this->db->get_where('business',['id' =>$business_id ])->row();
        $comunity_id  = $data['business_info']->comunity_id;
        $data['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_matrics',$data);
        }  
        }

  function bus_matrics(){

      if($_SESSION['admin_role'] != 'businessadmin')
        {          
         $from = $this->input->post('startdate');
        $to = $this->input->post('enddate');
        $id = $this->input->post('comunity_id');
        $_SESSION['bto']=$to;
        $_SESSION['bfrom']=$from;
       $formArray["from"] = $from;
       $formArray["to"] = $to;
        $this->load->model('Admin_model');
        $formArray["communities"]= $this->Admin_model->getallcomunities();
        $formArray["deals_info"]= $this->Admin_model->fetchDeals3($from,$to,$id);
        $formArray["sumClicks"]= $this->Admin_model->dealNum5($from,$to,$id);     
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_metrics',$formArray);
       }if($_SESSION['admin_role'] == 'businessadmin')
       {
         $this->load->helper('common');
        $from = $this->input->post('startdate');
        $to = $this->input->post('enddate');
         $comunity_id =$this->input->post('comunity_id');
         $data1['admin_info'] = $this->db->get_where('admin',['id' => $comunity_id])->row();
       $id  = $data1['admin_info']->business_id;             
        $this->load->model('Admin_model');
        $formArray["communities"]= $this->Admin_model->getallcomunities();
        $formArray["deals_info"]= $this->Admin_model->fetchDeals3($from,$to,$id);
         $formArray["sumClicks"]= $this->Admin_model->dealNum5($from,$to,$id);  
     
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_metrics',$formArray);

       }
        }

  function signupPrefrence(){
        if($_SESSION['admin_role'] == 'communityadmin')
        {
        $data['admin_info'] = $this->db->get_where('admin',['id' => $_SESSION['admin_session']])->row();
        $id  = $data['admin_info']->comunity_id;
        $formArray = array();
        $formArray['comunity_id']=$id;
        $formArray['licence']=$this->input->post('licence');
        $formArray['prefill']=$this->input->post('prefill');
        $formArray['cityname']=$this->input->post('cityname');
        $formArray['state']=$this->input->post('state');
        $this->db->insert(' business_prefrence', $formArray);
        redirect(base_url().'admin/index');           
        }
         else
        {
        $this->load->view('errors/error');
        }
        }


       public function adminhome(){
   
  if($_SESSION['admin_role'] == 'davemoss')
        {
         $communityid  = $this->input->get('id'); 
         $_SESSION['id']=$communityid;
         $data['info'] = $this->db->get_where('communities',['id' => $communityid])->row(); 
         $status = $data['info']->status;        
         if($status == 1){            
       $id =  $communityid;
       $data2['admin_info'] = $this->db->get_where('admin',['comunity_id' => $id  ])->row();
        $data2['comunity_info'] = $this->db->get_where('communities',['id' => $id  ])->row();     
        $this->load->view('Community_Admin_Portal_pages/community_sidebar2');
        $this->load->view('Community_Admin_Portal_pages/community_admin_home',$data2);     
        }
         else{
          $this->session->set_flashdata('success', 'Sorry this community is not active yet');     
          redirect('Admin/index');
         }
       }
   }
          
 
 public function deleteSponser() // delete sponser image
        {
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $id = $this->input->get('id');
        $this->db->delete('sponsor_img' ,'id ="'.$id.'"'); 
        $this->session->set_flashdata('success', 'Sponser Image Deleted successfully');
        redirect(base_url().'admin/index');
        }
        else{
           $this->load->view('errors/error');
        }
        }
        
   public function adminbusiness(){

   if($_SESSION['admin_role'] != 'businessadmin')
        {
        $business_id  = $this->input->get('id'); 
        $_SESSION['businessid']=$business_id;
        $data['info'] = $this->db->get_where('business',['id' => $business_id])->row();         
        $status = $data['info']->status;
        $id =  $business_id;           
        $data2['business_info'] = $this->db->get_where('business',['id' =>$id ])->row();
        $comunity_id  = $data2['business_info']->comunity_id;
        $data2['comunity_info'] = $this->db->get_where('communities',['id' =>$comunity_id ])->row();            
        $this->load->helper('form');
        $this->load->view('Business_Admin_Portal_Pages/business_sidebar');
        $this->load->view('Business_Admin_Portal_Pages/business_admin_home',$data2);     
 
       }
}
 public function deletebusiness (){
         $id= $_GET['id'];
        $this->db->delete('business' ,'id ="'.$id.'"'); 
        $this->session->set_flashdata('success', 'Business deleted successfully.');        
        redirect('Admin/index'); 
}
public function email_subscription() // subscription send mail
        {
        $id  = $this->input->post('community_id');         
        $community_name = $this->input->post('community_name');
        $data['comunity'] = $this->db->get_where('communities',['id' => $id])->row();
        $slug = $data['comunity']->slug;
        $status = $data['comunity']->status;
        $formArray = array();
        $formArray['email']=$this->input->post('email');
        $formArray['community_id']=$this->input->post('community_id');
        $formArray['community_name']=$this->input->post('community_name');
         $formArray['email_status']='subscribe';               
        $formArray['status']=$status;
        $formArray['dateposted']=date('Y-m-d');
        $this->load->model('Admin_model');
        $this->Admin_model->email_subscribe($formArray);
        $to = $this->input->post('email');
         $subject = "CONFIRMED: You’re signed up to receive fresh local business deals!";
         $from = 'support@smallbizblast.com'; // Pass here your mail id yaha kam karna
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;">';
        $emailContent .='<tr><td style="margin-top:20px;"></td></tr>';
        $emailContent .='<tr><td colspan="3"><center><h5 style="font-size:18px;">Service Provided By</h5> </center></td></tr>';
        $emailContent .='<tr><td colspan="3"><center><h2 style="font-size:22px;">';
        $emailContent .=$community_name;      
        $emailContent .='</h2></center></td></tr>';
        $emailContent .= '<tr><td><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" class="img-fluid" style="width: 130px; height: 130px;"></center></td></tr>';
        $emailContent .='<br>';
        $emailContent .='<br>';
        $emailContent .='</p><br>';
        $emailContent .='<tr><td style="font-size:16px; text-align:center;">"</td></tr>';
        $emailContent .='<tr><td><p style="font-size:16px; text-align:center;">Congrats! You will begin receiving fresh local small business deals this week for the following community:';
         $emailContent .=$community_name;   
         $emailContent .='<br></p>';         
        $emailContent .='<p style="font-size:16px; text-align:center;">In the meantime, you can always view the existing deals';
        $emailContent .='<a href="https://buylocalblast.com/';
        $emailContent .= $slug;
        $emailContent .='"title="link of deal page"> HERE.</a></p><p style="font-size:16px; text-align:center;">Thank you for supporting your local, small business community!</td></tr>';
        $emailContent .='<br>';        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '60';
        $config['smtp_user'] = 'support@smallbizblast.com'; //Important
        $config['smtp_pass'] = 'IuO&*jIn?FAR'; //Important
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();

        redirect('Admin/sub_email?id='.$id );
         }


public function sub_email(){      
        $id =$_GET['id'];
        $data['slug'] = $this->db->get_where('communities',['id' => $id ])->row();
        $this->load->model('Admin_model');
        $this->load->view("Prominent_public_pages/subscribe_email",$data);
        }

public function emailSignups(){          
      $id =$_GET['id'];
      $data['emails'] = $this->db->get_where('email_subscription',['community_id' => $id ])->result();
      $data['info'] = $this->db->get_where('email_subscription',['community_id' => $id ])->row();
      $this->load->model('Admin_model');
      $data["totalemails"]= $this->Admin_model->countEmail($id);   
      $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
      $this->load->view('Master_Admin_Portal_Pages/emailSignups',$data);
}


public function dealsDeatils(){
        $id =$_GET['id'];
        $data['info'] = $this->db->get_where('deals',['business_id' => $id ])->result();  
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/deals',$data);
      }

 public function masterDeals(){
        if($_SESSION['admin_role'] == 'davemoss')
        {
        $id = $this->input->get('id');
         $this->load->model('User_model');
        $data["total"]= $this->User_model->countAll($id);
        $data["totalBusiness"]= $this->User_model->getBusiness($id);
        $business_info= $this->User_model->getInfo($id);
      $k =0;
           if($business_info)
                {
                  foreach ($business_info as $r)
                    {
                         $data['reg'][$k]['name']=$r->name;
                         $data['reg'][$k]['id']=$r->id;
 
                        $deal_profile2=$this->User_model->get_deal_details55($r->id);
                          


                        $data['reg'][$k]['num2']= $deal_profile2;
                        $k++;
                     }  


                } 
        
        $this->load->view("Master_Admin_Portal_Pages/admin_sidebar");
        $this->load->view('Master_Admin_Portal_Pages/masterDeals',$data);
       }
        else
        {
          $this->load->view('errors/error');
        }

       } 
  function logout(){
        unset($_SESSION['admin_session']);
        redirect('Admin/login');
        }

 }        


