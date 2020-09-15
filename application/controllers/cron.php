#!/usr/bin/php
<?php

/*
|--------------------------------------------------------------
| CRON JOB BOOTSTRAPPER
|--------------------------------------------------------------
|
| This section is used to get a cron job going, using standard
| CodeIgniter controllers and functions.
|
| 1) Set the CRON_CI_INDEX constant to the location of your
|    CodeIgniter index.php file
| 2) Make this file executable (chmod a+x cron.php)
| 3) You can then use this file to call any controller function:
|    ./cron.php --run=/controller/method [--show-output] [--log-file=logfile] [--time-limit=N] 
|
| GOTCHA: Do not load any authentication or session libraries in
| controllers you want to run via cron. If you do, they probably
| won't run right.
|
*//*

define('CRON_CI_INDEX', 'index.php');   // Your CodeIgniter main index.php file
//define('CRON_CI_INDEX', '/var/www/vhosts/myaccount/index.php');   // Your CodeIgniter main index.php file
define('CRON', TRUE);   // Test for this in your controllers if you only want them accessible via cron

// Parse the command line
$script = array_shift($argv);
$cmdline = implode(' ', $argv);
$usage = "Usage: cron.php --run=/controller/method [--show-output][-S] [--log-file=logfile] [--time-limit=N]\n\n";
$required = array('--run' => FALSE);
$uri = '';

foreach($argv as $arg)
{
    list($param, $value) = explode('=', $arg);
    
    switch($param)
    {
        case '--run':
            // Simulate an HTTP request
            $uri = $value;
            $_SERVER['PATH_INFO'] = $value;
            $_SERVER['REQUEST_URI'] = $value;
            $_SERVER['SERVER_NAME'] = 'localhost';
            $required['--run'] = TRUE;
        break;

        case '-S':
        case '--show-output':
            define('CRON_FLUSH_BUFFERS', TRUE);
        break;

        case '--log-file':
            if(is_writable($value)) define('CRON_LOG', $value);
            else die("Logfile $value does not exist or is not writable!\n\n");
        break;

        case '--time-limit':
            define('CRON_TIME_LIMIT', $value);
        break;

        default:
            die($usage);
    }
}

if (!defined('CRON_FLUSH_BUFFERS'))
{
    define('CRON_FLUSH_BUFFERS', FALSE);
}

$_SERVER['argv'][1] = $uri;

for ($i=2; $i<$argc; $i++)
    $_SERVER['argv'][$i] = '';

if( ! defined('CRON_LOG'))
{
    define('CRON_LOG', 'cron.log');
}

if( ! defined('CRON_TIME_LIMIT'))
{
    define('CRON_TIME_LIMIT', 0);
}

foreach($required as $arg => $present)
{
    if( ! $present)
    {
        die($usage);
    }
}

// Set run time limit
set_time_limit(CRON_TIME_LIMIT);

// Run CI and capture the output
ob_start();

chdir(dirname(CRON_CI_INDEX));
require(CRON_CI_INDEX);           // Main CI index.php file
$output = ob_get_contents();
 
if(CRON_FLUSH_BUFFERS === TRUE)
{
    while(@ob_end_flush());     // display buffer contents
}
else
{
    ob_end_clean();
}

// Log the results of this run
error_log("////// ".date('Y-m-d H:i:s')." cron.php $cmdline\r\n", 3, CRON_LOG);
error_log(str_replace("\n", "\r\n", $output), 3, CRON_LOG);
error_log("\r\n////// \r\n\r\n", 3, CRON_LOG);

echo "\n\n"; 

*/








<?php if (! defined('BASEPATH')) {
 exit('No direct script access allowed');
}
class Cron extends MY_Controller
{

 public function __construct()
 {
   parent::__construct();
   if (!$this->input->is_cli_request()) {
   show_error('Direct access is not allowed');
   }
 }

 public function run()
 {
    $this->load->library('core/CronRunner');
    
/*        $id  = $this->input->post('community_id');
        $community_name = $this->input->post('community_name');
        $data['comunity'] = $this->db->get_where('communities',['id' => $id])->row();
       // $slug = $data['comunity']->slug;
       // $status = $data['comunity']->status;
        $formArray = array();
        $formArray['email']=$this->input->post('email');
        $formArray['community_id']=$this->input->post('community_id');
        $formArray['community_name']=$this->input->post('community_name');
        $formArray['status']=$status;

*//*
        $this->load->model('Admin_model');
        $this->Admin_model->email_subscribe($formArray);

*/
        $to = 'muhammad.yaqoob180@gmail.com';
        // User email pass here
        $subject = "Weekly Deals";
        //$message = $this->input->post('message');
        $from = 'smallbizblast786@gmail.com'; // Pass here your mail id yaha kam karna

        
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="800px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;">';
        $emailContent .='<tr><td style="margin-top:20px;"></td></tr>';
        $emailContent .='<tr><td colspan="3"><center><h5 style="font-size:18px;">Service Provided By<br>';
        $emailContent .='Happyville';      
        $emailContent .='</h5></center></td></tr>';
        $emailContent .= '<tr> <td height="115" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="30%" align="center" valign="top" class="logo"><img src="https://smallbizblast.gyzw.cc/uploads/stark_industries_orig23.png" width="100px" height="100px" vspace=10 style="margin-top:10px;" /> </td> <td width="40%" align="center" valign="top" class="issue"> <img src="https://smallbizblast.gyzw.cc/assets/images/smallbizblast-logo-main-web.png" width="130px" height="130px" vspace=10 /></td> <td width="30%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/uploads/wayne-enterprises-logo-large.png" width="100px" height="100px" vspace=10 style="margin-top:10px;" />  </td> </tr> </table> </td> </tr>';
    
        $emailContent .='<br>';
        $emailContent .='<p style="font-size:14px;">Welcome to Happyville`s Small Biz Blast program. We`re eager to promote our wonderful small business community here in our great city. Please take a moment and sign up (in the upper right corner) for our weekly email giving you all the latest fresh deals from our small businesses. Our small businesses are eager to earn your business and ongoing support!</p>';      

        $emailContent .='<br>';
        $emailContent .='<tr> <td height="50" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="80%" align="center" valign="top" style="background-color: #006fcf; color: white; font-size: 24px;"> These local, small business deals are good through, Thursday 21st of May </td> </tr> </table> </td> </tr>';

        $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0" style="background-color:light;"> <tr> <td width="25%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/uploads/business_signup/BBB-logo3.png" width="60px" height="60px" vspace=10 /> </td> <td width="50%" align="center" valign="top" class="issue"> <p style="width: 100%; font-size:20px">Buy 1 Dozen, Get 1 Free!</p> </td> <td width="25%" align="center" valign="top" class="logo"> <p style="width: 100%">Bun Basket</p> <p style="width: 80%; "> <button type="btn" style="background-color: #006fcf; color: white;"><a href="https://smallbizblast.gyzw.cc/happyville" title="" style="color:white;">View Deal Details</a></button> </p> </td> </tr> </table> </td> </tr>';
         $emailContent .='<br>';
        $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="25%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/uploads/deals/REEM_OF_PAPER.png" width="60px" height="60px" vspace=10 /> </td> <td width="50%" align="center" valign="top" class="issue"> <p style="width: 100%; font-size:20px"> Buy 1 Ream, Get a Box </p> </td> <td width="25%" align="center" valign="top" class="logo"> <p style="width: 100%"> Dunder Mifflin Inc </p> <p style="width: 80%; "> <button type="btn" style="background-color: #006fcf; color: white;"><a href="https://smallbizblast.gyzw.cc/happyville" title="" style="color:white;">View Deal Details</a></button> </p> </td> </tr> </table> </td> </tr>';
         $emailContent .='<br>';
          $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0" style="background-color:light;"> <tr> <td width="25%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/uploads/deals/COPY_MACHINE.png" width="60px" height="60px" vspace=10 /> </td> <td width="50%" align="center" valign="top" class="issue"> <p style="width: 100%; font-size:20px">Used Copy Machine $20</p> </td> <td width="25%" align="center" valign="top" class="logo"> <p style="width: 100%">Initech</p> <p style="width: 80%; "> <button type="btn" style="background-color: #006fcf; color: white;"><a href="https://smallbizblast.gyzw.cc/happyville" style="color:white;" title="">View Deal Details</a></button> </p> </td> </tr> </table> </td> </tr>';
         $emailContent .='<br>';
        $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td width="25%" align="center" valign="top" class="logo"> <img src="https://smallbizblast.gyzw.cc/uploads/deals/BANANANANANA.png" width="60px" height="60px" vspace=10 /> </td> <td width="50%" align="center" valign="top" class="issue"> <p style="width: 100%; font-size:20px">50% off ALL frozen banana </p> </td> <td width="25%" align="center" valign="top" class="logo"> <p style="width: 100%"> Bluth Company </p> <p style="width: 80%; "> <button type="btn" style="background-color: #006fcf; color: white;"><a href="https://smallbizblast.gyzw.cc/happyville" title="" style="color:white;">View Deal Details</a></button> </p> </td> </tr> </table> </td> </tr>';
                $emailContent .='<br>';
                $emailContent .='<br>';
                $emailContent .='<tr> <td height="80" align="left" valign="top"> <table width="100%" border="0" cellspacing="0"cellpadding="0"> <tr> <td align="center" valign="top" class="issue"> <a href="https://smallbizblast.gyzw.cc/happyville" title="">View more</a> </td> </tr> </table> </td> </tr>';
        
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#ffff;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='' target='_blank' style='text-decoration:none;color: #b19f18b0;'>smallbizblast.com</a></p></td></tr></table></body></html>";

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user'] = 'smallbizblast786@gmail.com'; //Important
        $config['smtp_pass'] = 'SMALLbizblast12345'; //Important

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
     //   redirect('Admin/index');
        //redirect(base_url().$slug);
     

    $cron = new CronRunner();
    $cron->run();
 }
}