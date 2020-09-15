<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
*/
class Front extends CI_Controller { 

  function __construct(){

    parent::__construct();
    $this->load->helper('common');
  //  $this->load->helper('mailer');    
        $this->load->library("email");  
    //$this->load->library('encrypt');
    
  }
 
  public function index()
  {
    $this->load->helper('common');
    $this->load->view('/f_sidebar');
    $this->load->view('/index');
  }

  public function aboutus()
  {
    $this->load->helper('common');
    $this->load->view('/f_sidebar');
    $this->load->view('About_Us_Pages/about_us');
  }

public function aboutus_cdp()
  {
    $this->load->helper('common');
     $this->load->view('About_Us_Pages/aboutus_cdp');
  }

public function community_deal($url)
  {
        
        $id = $url;
        $data['info'] = $this->db->get_where('communities',['id' => $id ])->row();
         $status = $data['info']->status;
        
         if($status == 1){
        
         $data['sponserimg'] = $this->db->get_where('sponsor_img',['community_id' => $id])->row();
         $this->load->model('Front_model');
        // $data['business'] = $this->Front_model->getBusiness($id); // get bussiness detail
        // $data['dealid'] = $this->db->get_where('business',['comunity_id' => $id])->row();       //iss business ki deals      
          
        
         $this->load->model('Front_model');
          $data['dealinfo'] = $this->Front_model->getActiveDeals($id);  
         //$data['dealinfo'] = $this->db->get_where('deals',['city_id' => $id])->result();

 
         $this->load->view('Prominent_public_pages/community_deal_page',$data);

         }

         else{
         $this->load->view('front/error');

         }


         
        
   
        }
  public function dealpage()
  {
      
    $this->load->helper('common');
     
     $dealid= $this->input->get('id');
       

        $data['dealinfo'] = $this->db->get_where('deals',['id' => $dealid])->row();
        $business_id  = $data['dealinfo']->business_id; //get community id

        $data['bussinessinfo'] = $this->db->get_where('business',['id' => $business_id])->row();
        $approvedComunity=$data['bussinessinfo']->comunity_id;
        $data['communityinfo'] = $this->db->get_where('communities',['id' => $approvedComunity])->row();
       
         $this->load->model('Front_model');
         $data['deals'] = $this->Front_model->getDeals($business_id);

 

      $this->load->view('Prominent_public_pages/dealpage',$data);
  }
     
       
public function contact_us()
  {
    $this->load->helper('common');
    $this->load->view('/f_sidebar');
    $this->load->view('About_Us_Pages/contact_us');
}

public function About_Us()
  {
    $this->load->helper('common');
    $this->load->view('/f_sidebar');
    $this->load->view('About_Us_Pages/comunity_aboutus');
}


  function send_contactus() {

      $formArray = array();
          $formArray['email']=$this->input->post('email');
          $formArray['firstname']=$this->input->post('firstname');
          $formArray['lastname']=$this->input->post('lastname');
          $formArray['comment']=$this->input->post('comment');
          
           $this->db->insert(' contactus', $formArray);
           
            $to =$this->input->post('email');

        // User email pass here
        $subject = "Small Biz Blast “Other Questions” form"; 
        //$message = $this->input->post('message'); 
        $from = 'info@buylocalblast.com';              // Pass here your mail id  yaha kam karna

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;padding-left:3%"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></center></td></tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">This email is to notify you that ';
      
        $emailContent .=' </p><p style="font-size:16px; text-align:center;">You have successfully submitted your query, our team will review it and get back to you soon.</p><p style="font-size:18px; text-align:center;">Thank you!</p>
';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             

       
        $config['protocol']    = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

         $config['smtp_user'] = 'info@buylocalblast.com'; //Important
        $config['smtp_pass'] = '{STmK7n_e62f'; //Important

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
        
        
        
        
         $to ='Dave@ExpansionDynamics.com,dave@buylocalblast.com';

        // User email pass here
        $subject = "Contact Us Form from SmallBizBlast"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;padding-left:3%"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></center></td></tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">This email is to notify you that ';
        
          
          $emailContent .= '<br> Name: ';
        $emailContent .= $this->input->post('firstname');
        
         $emailContent .= '<br> Email: ';
        $emailContent .= $this->input->post('email');
        
        $emailContent .= '<br> Message: ';
        $emailContent .= $this->input->post('comment');
        
         
        
       
       
        
        
       
        $emailContent .=' </p><p style="font-size:16px; text-align:center;"> Has submitted query on SmallBizBlast, Please review it.</p><p style="font-size:18px; text-align:center;">Thank you!</p>
';
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
           
           redirect(base_url().'Front/contact_us');

  }



public function bus_signup()
  {
       $this->load->helper('form');
       
    $id= $_GET['id'];
    $data['community'] = $this->db->get_where('communities',['id' => $id])->row();
   $data['signupInfo'] = $this->db->get_where('business_prefrence',['comunity_id' => $id])->row();

    
    $this->load->view('About_Us_Pages/businessheader',$data);
    $this->load->view('Enrolment_Pages/business_signup',$data);
  }

function insertsignup(){

        $id =$this->input->post('comunity_id');

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


        $this->load->model('Front_model');
        $this->Front_model->insertsignup($dataArray);


        $this->load->model('Admin_model');
        $this->Admin_model->bus_signup($dataArray);

        $data['emails'] = $this->db->get_where('communities',['id' => $id])->row();
        $email=$data['emails']->email;   


        $username=$this->input->post('username');
        $license=$this->input->post('license');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $zip=$this->input->post('zip');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $website=$this->input->post('website');
        $businessname=$this->input->post('name');


        $to = $email;


        // User email pass here
        $subject = "New Business Applied for SmallBizBlast Participation"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;padding-left:3%"><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></td></tr>';
        $emailContent .='<hr>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">This email is to notify you that ';
        $emailContent .= '<br> Businessname: ';
        $emailContent .= $businessname;
        $emailContent .= '<br> Username: ';
        $emailContent .= $username;
        $emailContent .= '<br> Licence: ';
        $emailContent .= $license;
        $emailContent .= '<br> Address: ';
        $emailContent .= $address;
        $emailContent .= '<br> City: ';
        $emailContent .= $city;
        $emailContent .= '<br> Zip: ';
        $emailContent .= $zip;
        $emailContent .= '<br> Phone: ';
        $emailContent .= $phone;
        $emailContent .= '<br> Email: ';
        $emailContent .= $email;
        $emailContent .= '<br> Website: ';
        $emailContent .= $website;
        $emailContent .= '<br>';
        $emailContent .=' has submitted the application form to participate in your community’s SmallBizBlast program.</p><p style="font-size:16px; text-align:center;">You can activate the business by logging in to your Community Admin account and clicking on “View Businesses”.  The business will be in ‘pending’ status until you move them to ‘active’ or ‘inactive’ status.</p><p style="font-size:16px; text-align:center;">Once you change the status to ‘active’ an automated email will go to that business letting them know they are now active and can log in and begin posting deals.</p>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             

       
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://mail.smallbizblast.com';
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
        redirect(base_url().'Front/enroll_business?id='.$id);

}


public function enroll_business()
        {
        $this->load->helper('common');

        $id =$_GET['id'];
        $data['slug'] = $this->db->get_where('communities',['id' => $id ])->row();

        $this->load->view('Enrolment_Pages/enroll_business',$data);
        }




public function privacy_policy()
  {
    $this->load->helper('common');
    $this->load->view('About_Us_Pages/privacy_policy');
  }
  public function term_condition()
  {
    $this->load->helper('common');
    $this->load->view('About_Us_Pages/terms_condition');
  }



 public function uploadPic()

        {        
        $config=[
        'upload_path'=> './uploads/business_signup/',
        'allowed_types'=>'gif|png|jpg|jppeg|pdf'
        ];

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters();
        if($this->upload->do_upload())
        {
        $dataArray=$this->input->post();
        $info=$this->upload->data();
        /* print_r($info);
        print_r($dataArray);*/

        $image_path=base_url("uploads/business_signup/".$info['raw_name'].$info['file_ext']);
        $dataArray['image']=$image_path;

        unset($dataArray['submit']);
        $this->load->model('Front_model');

        if($this->Front_model->insertsignup($dataArray))
        {
        echo 'Image uploaded';
        }
        else
        {
            $id =$this->input->post('comunity_id');
        $data['emails'] = $this->db->get_where('communities',['id' => $id])->row();
        $email=$data['emails']->email;
           
        $username=$this->input->post('username');
        $license=$this->input->post('license');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $zip=$this->input->post('zip');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $website=$this->input->post('website');
        $businessname=$this->input->post('name');

        $to = $email;
        // User email pass here
        $subject = "New Business Applied for SmallBizBlast Participation"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<hr>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">This email is to notify you that </p>';
        $emailContent .= '<br> <p style="font-size:16px;"><b> Businessname: ';
        $emailContent .= $businessname;
        $emailContent .= '<br> Username: ';
        $emailContent .= $username;
        $emailContent .= '<br> Licence: ';
        $emailContent .= $license;
        $emailContent .= '<br> Address: ';
        $emailContent .= $address;
        $emailContent .= '<br> City: ';
        $emailContent .= $city;
        $emailContent .= '<br> Zip: ';
        $emailContent .= $zip;
        $emailContent .= '<br> Phone: ';
        $emailContent .= $phone;
        $emailContent .= '<br> Email: ';
        $emailContent .= $email;
        $emailContent .= '<br> Website: ';
        $emailContent .= $website;
        $emailContent .= '<br> </b> <br>';
        $emailContent .=' has submitted the application form to participate in your community’s SmallBizBlast program.</p><p style="font-size:16px; text-align:center;">You can activate the business by logging in to your Community Admin account and clicking on “View Businesses”.  The business will be in ‘pending’ status until you move them to ‘active’ or ‘inactive’ status.</p><p style="font-size:16px; text-align:center;">Once you change the status to ‘active’ an automated email will go to that business letting them know they are now active and can log in and begin posting deals.</p>';
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

        redirect(base_url().'Front/enroll_business?id='.$id);
        }
        } 

        else{

        $id =$this->input->post('comunity_id');
        $data['emails'] = $this->db->get_where('communities',['id' => $id])->row();
        $email=$data['emails']->email;


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
 
        $username=$this->input->post('username');
        $license=$this->input->post('license');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $zip=$this->input->post('zip');
        $phone=$this->input->post('phone');
        $email=$this->input->post('email');
        $website=$this->input->post('website');
        $businessname=$this->input->post('name');

        $to = $email;
        // User email pass here
        $subject = "New Business Applied for SmallBizBlast Participation"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
        $emailContent .='<hr>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">This email is to notify you that </p>';
        $emailContent .= '<br> <p style="font-size:16px;"><b> Businessname: ';
        $emailContent .= $businessname;
        $emailContent .= '<br> Username: ';
        $emailContent .= $username;
        $emailContent .= '<br> Licence: ';
        $emailContent .= $license;
        $emailContent .= '<br> Address: ';
        $emailContent .= $address;
        $emailContent .= '<br> City: ';
        $emailContent .= $city;
        $emailContent .= '<br> Zip: ';
        $emailContent .= $zip;
        $emailContent .= '<br> Phone: ';
        $emailContent .= $phone;
        $emailContent .= '<br> Email: ';
        $emailContent .= $email;
        $emailContent .= '<br> Website: ';
        $emailContent .= $website;
        $emailContent .= '<br> </b> <br>';
        $emailContent .=' has submitted the application form to participate in your community’s SmallBizBlast program.</p><p style="font-size:16px; text-align:center;">You can activate the business by logging in to your Community Admin account and clicking on “View Businesses”.  The business will be in ‘pending’ status until you move them to ‘active’ or ‘inactive’ status.</p><p style="font-size:16px; text-align:center;">Once you change the status to ‘active’ an automated email will go to that business letting them know they are now active and can log in and begin posting deals.</p>';
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

        redirect(base_url().'Front/enroll_business?id='.$id);

        }   
        }     




public function cum_signup()
  {
    $this->load->helper('common');
    $this->load->view('/f_sidebar');
    $this->load->view('Enrolment_Pages/community_signup');
  }




 public function comunity_insert()

        {


        $dataArray = array();
        $dataArray['community_name']=$this->input->post('community_name');
        $dataArray['other_description']=$this->input->post('other_description');
        $dataArray['admin_name']=$this->input->post('admin_name');
        $dataArray['admin_phone']=$this->input->post('admin_phone');
        $dataArray['email']=$this->input->post('email');
        $dataArray['og_website']=$this->input->post('og_website');
        $dataArray['og_address']=$this->input->post('og_address');
        $dataArray['city']=$this->input->post('city');
        $dataArray['state']=$this->input->post('state');
        $dataArray['population_size']=$this->input->post('population_size');
        $dataArray['zip']=$this->input->post('zip');
        $dataArray['enrolment_code']=$this->input->post('enrolment_code');
        $dataArray['slug']=$this->seoUrl($dataArray['community_name']);

        $this->load->model('Front_model');
        $this->Front_model->insertComSignup($dataArray);
        
        $code= $this->input->post('enrolment_code');

        $communityname=$this->input->post('community_name');
        $state=$this->input->post('state');

         $to = 'dave@expansiondynamics.com';
        // User email pass here
        $subject = "New Community Wants to Enroll in SmallBizBlast"; 
        //$message = $this->input->post('message'); 
        $from = 'support@smallbizblast.com';              // Pass here your mail id  yaha kam karna

          $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;"><center><img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" vspace=10 /></center></td></tr>';
//        $emailContent .='<hr>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px; text-align:center;">A new community has completed the “Enroll Community” form and is waiting to be approved.</p><br><p style="font-size:16px; text-align:center;">Community Name: ';
        $emailContent .= $communityname;
        $emailContent .='</p><p style="font-size:16px; text-align:center;">State:';
        $emailContent .= $state;
        
       $emailContent .='</p>';
     
       $emailContent .='</p><p style="font-size:16px; text-align:center;">EnrolEnrollment Code:';
        $emailContent .= $code;
        
       $emailContent .='</p>';
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



        $this->save_routes();
        redirect(base_url().'Front/enroll_comunity'); 


        }




public function enroll_comunity()
  {
    $this->load->helper('common');
    $this->load->view('Enrolment_Pages/enroll_comunity');
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
      
      public function unsubscribeBountifull(){
          
          $id = 58;
         $this->db->update("email_subscription",$formArray, "community_id='$id'");
       $this->load->view('About_Us_Pages/unsubscribe');          
          
      }
      
      public function unsubscribeHappyville(){
          
         $id = 50;
          $formArray = 'unsubscribe';
         
            $this->db->update("email_subscription",$formArray, "community_id='$id'");
          
          
           
       $this->load->view('About_Us_Pages/unsubscribe');          
          
      }
      
      public function unsubscribe(){
          
           
         
        $this->load->view('About_Us_Pages/unsubscribe');          
          
      }

}