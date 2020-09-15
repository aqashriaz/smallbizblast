 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 
	 public function send(){
        
        $to = 'uz391110@gmail.com,muhammad.yaqoob180@gmail.com';
        // User email pass here

        $subject = "Wellcome to Small Biz Blast"; 
        //$message = $this->input->post('message'); 
        $from = 'info@buylocalblast.com';              // Pass here your mail id  De

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;padding-left:3%"><img src="https://smallbizblast.gyzw.cc/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></td></tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px;">Welcome ';
        //$emailContent .= $this->input->post('username');
        $emailContent .=' has been approved for the <b>smallbizblast </b> program! </p>';  
        $emailContent .='<br>';
        $emailContent .='To log in & begin posting deals, go to :www.smallbizblast.com/Admin/login';
        $emailContent .='<br>';
        $emailContent .='Your username and password is as follows';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4> Username :';  
       // $emailContent .= $this->input->post('username');
        $emailContent .= '<br>';
        $emailContent .='Password :';
        //$emailContent .= $this->input->post('password');
        $emailContent .=' </h4><br>';
        $emailContent .='<br>';  
        $emailContent .='Attached you will find a “Quick Start” guide to help you start posting new deals and managing your account.  You will also find the “Participating Member” banner to post on your website and show your support for your community’s small business support program.';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4>Congratulations!</h4>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
          

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://mail.smallbizblast.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

       $config['smtp_user']    = 'info@buylocalblast.com';    //Important
    $config['smtp_pass']    = '{STmK7n_e62f';  //Important

        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

     
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
       // $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();
         $this->session->set_flashdata('success', 'business status updated successfully');
 
	 }
	 
	 public function send2(){
	     
	     
	         $to = 'uz391110@gmail.com';
        // User email pass here

        $subject = "Wellcome to Small Biz Blast"; 
        //$message = $this->input->post('message'); 
        $from = 'smallbizblast786@gmail.com';              // Pass here your mail id  De

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#ffff;padding-left:3%"><img src="https://smallbizblast.gyzw.cc/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></td></tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .='<p style="font-size:16px;">Welcome ';
        //$emailContent .= $this->input->post('username');
        $emailContent .=' has been approved for the <b>smallbizblast </b> program! </p>';  
        $emailContent .='<br>';
        $emailContent .='To log in & begin posting deals, go to :www.smallbizblast.com/Admin/login';
        $emailContent .='<br>';
        $emailContent .='Your username and password is as follows';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4> Username :';  
       // $emailContent .= $this->input->post('username');
        $emailContent .= '<br>';
        $emailContent .='Password :';
        //$emailContent .= $this->input->post('password');
        $emailContent .=' </h4><br>';
        $emailContent .='<br>';  
        $emailContent .='Attached you will find a “Quick Start” guide to help you start posting new deals and managing your account.  You will also find the “Participating Member” banner to post on your website and show your support for your community’s small business support program.';
        $emailContent .='<br>';
        $emailContent .='<br>'; 
        $emailContent .='<h4>Congratulations!</h4>';  
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";             
          

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user']    = 'smallbizblast786@gmail.com';    //Important
        $config['smtp_pass']    = 'SMALLbizblast12345';  //Important

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
 
	 
	     
	     
	 }
	 public function cronjob() // subscription send mail
        {
//happyvile 50
//south 56

        $id = 58; 
        $data['communities'] = $this->db->get_where('communities',['id' => $id ])->row();
       
        $slug=$data['communities']->slug;
         $cityname=$data['communities']->community_name;

        $date=$data['communities']->day_frequency;
        $newDate = date("l jS \of F", strtotime($date));

        $images['sponserImg'] = $this->db->get_where('sponsor_img',['community_id' => $id ])->row();
        $Img1=$images['sponserImg']->image;
        $Img2=$images['sponserImg']->image1;
         $this->load->model('User_model');
         $deals =$this->User_model->activeDeals($id); 
    
        
        $to = 'dave@expansiondynamics.com,digmoss@gmail.com';
     //   $to = 'dave@expansiondynamics.com';
        // User email pass here
        $subject = "Weekly Small Business Deals in ".$cityname; 
        
        $from = 'communitydeals@smallbizblast.com';  

        
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;">';
        $emailContent .='<tr><td style="margin-top:20px;"></td></tr>';
        $emailContent .='<tr><td colspan="3"><center><p style="font-size:18px;">Service Provided By</p><p  style="font-size:18px;"><b>';
        $emailContent .=$cityname;      
        $emailContent .='</b></p></center></td></tr>';
        $emailContent .= '<tr> <td height="115" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="30%" align="center" valign="top" class="logo"><img src="https://smallbizblast.gyzw.cc/assets/images/bg123.jpg" width="100px" height="100px" vspace=10 style="margin-top:10px;" /> </td> <td width="40%" align="center" valign="top" class="issue"> <img src="https://buylocalblast.com/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></td> <td width="30%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/assets/images/bg123.jpg" width="100px" height="100px" vspace=10 style="margin-top:10px;" />  </td> </tr> </table> </td> </tr>';
    
        $emailContent .='<br>';
        $emailContent .='<p ><center style="font-size:20px;"><b>Check out this week’s fresh deals you requested from your community’s small businesses!</b></center></p>';      

        $emailContent .='<br>';


        $emailContent .='<tr> <td height="50" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="80%" align="center" valign="top" style="background-color: #006fcf; color: white; font-size: 24px;"> These local, small business deals are good through,'.$newDate.' </td> </tr> </table> </td> </tr>';


          foreach ($deals as  $deal) {


             $emailContent .='<tr> <td height="80" align="left" valign="top" style="background-color:#ffffff"> <table width="100%" border="0" cellspacing="0"cellpadding="0" style="background-color:light;"> <tr> <td width="25%" align="center" valign="top" class="logo"> <img src="'.$deal->image.'" width="60px" height="60px" vspace=10 /> </td> <td width="50%" align="center" valign="top" class="issue"> <p style="width: 100%; font-size:20px"><b>'.$deal->detail1.'</b></p> </td> <td width="25%" align="center" valign="top" class="logo"> <p style="width: 100%">'.$deal->business_name.'</p> <p style="width: 80%; "> <button type="btn" style="background-color: #006fcf; color: white;"><a href="https://buylocalblast.com/Front/dealpage?id='.$deal->id.'" title="" style="color:white;">View Deal Details</a></button> </p> </td> </tr> </table> </td> </tr>';
             
        }
  
       
         
                 $emailContent .='<br>';
                $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td align="center" valign="top" class="issue"> <a href="https://buylocalblast.com/'.$slug.'" title="">View more</a> </td></tr><tr><td align="center" valign="top" class="issue"> <a href="https://buylocalblast.com/index.php/Front/unsubscribe" title="">unsubscribe</a> </td> </tr> </table> </td> </tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.smallbizblast.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user'] = 'communitydeals@smallbizblast.com'; //Important
        $config['smtp_pass'] = 't;4a77WCBuIN'; //Important

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
         
         
        }


	
	
	
}
