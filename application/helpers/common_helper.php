<?php
function getThumbnail($x){
	$y = stripslashes($x);
	$z = json_decode($y,true);
	return $z[0];
}

function form_message(){
	$ci =& get_instance();
	
	if(!empty($ci->session->userdata('form_message'))){
		$msg = $ci->session->userdata('form_message');
		$cls = ($msg['type'] == 'error')?'danger':'success';
		echo '<div class="alert alert-'.$cls.'">'.$msg['message'].'</div>';
	}
	$ci->session->unset_userdata('form_message');
}

function get_image($name){
	$fullPath = '/uploads/'.$name;
	if(!empty($name) && file_exists($_SERVER['DOCUMENT_ROOT'].$fullPath)){
		return base_url('uploads/'.$name);
	}else{
		return base_url('assets/images/faviconoflogo.png');
	}
}

?>