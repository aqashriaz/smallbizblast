<?php

require($_SERVER['DOCUMENT_ROOT'].'/vendor/mailer/PHPMailerAutoload.php');

function smtp_gmail($to_m, $from_m, $subject, $message){
	$ci =& get_instance();
	$adm = $ci->db->order_by('id','asc')->get_where("users","capability = '1'")->row();
	//$from = (isset($adm->email)) ? $adm->email : "";
	date_default_timezone_set('Etc/UTC');
	$to = $to_m["email"];
	$to_label = $to_m["label"];
	$from = $from_m["email"];
	$from_label = $from_m["label"];
	
	$mail = new PHPMailer(true);
	
	//SMTP Settings
	$mail->IsSMTP();                                      // Set mailer to use SMTP
	//db info
	$smtp_cred = $ci->db->get_where('site',['id' => 1])->row();
	
	$mail->Host = $smtp_cred->smtp_host;                 // Specify main and backup server
	$mail->Port = $smtp_cred->smtp_port;                                    // Set the SMTP port
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $smtp_cred->smtp_user;                // SMTP username
	$mail->Password = $smtp_cred->smtp_pass;                  // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	
	try {
		$mail->addReplyTo("noreply@myfolder.online", $to_label);
		if(is_array($to)){
			foreach($to as $k){
				$mail->addAddress($k, $to_label);
			}
		}else{
			$mail->addAddress($to, $to_label);
		}
		
		
		//$mail->SetFrom($from, $from_label);
		//From email address and name
		$mail->From = $from;
		$mail->FromName = $from_label;


		$mail->WordWrap = 50;               // set word wrap
		$mail->Priority = 1; 
		$mail->IsHTML(true);  
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->Send();
	} 
	catch (phpmailerException $e) {
  		echo $e->errorMessage(); 
	} catch (Exception $e) {
  		echo $e->getMessage(); 
	}
	
}

function smtp_gmail2($to_m, $from_m, $subject, $message){
	$ci =& get_instance();
	$adm = $ci->db->order_by('id','asc')->get_where("users","capability = '1'")->row();
	//$from = (isset($adm->email)) ? $adm->email : "";
	date_default_timezone_set('Etc/UTC');
	$to = $to_m["email"];
	$to_label = $to_m["label"];
	$from = $from_m["email"];
	$from_label = $from_m["label"];
	
	$mail = new PHPMailer(true); 
	try {
		$mail->AddReplyTo("noreply@admin.com", $to_label);
		foreach($to as $k=>$v){
			$mail->AddAddress($v, 'Status changed');
		}
		$mail->SetFrom($from, $from_label);
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	} 
	catch (phpmailerException $e) {
  		echo $e->errorMessage(); 
	} catch (Exception $e) {
  		echo $e->getMessage(); 
	}
}

?>