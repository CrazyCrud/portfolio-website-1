<?php

header('Content-Type: application/json');

include_once 'default.inc.php';

$email = $message = $captcha = false;
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = trim(htmlentities($_POST['email']));
	if(!((strpos($email, ".") > 0) && (strpos($email, "@") > 0)) || preg_match("/[^a-zA-Z0-9.@_-]/", $email)){
		$email = false;
	}
}

if(isset($_POST['message']) && !empty($_POST['message'])){
	$message = htmlentities($_POST['message']);
}

if(isset($_POST['captcha']) && !empty($_POST['captcha'])){
	if(intval($_POST['number-1']) + intval($_POST['number-2']) == intval($total)){
		$captcha = true;
	}
}

if($email != false && $message != false && $captcha != false){
	if(mail($me, "Portfolio - Request", $message, null, "-f".$email)){
		echo json_encode(array('state' => 'success'));
	} else{
		echo json_encode(array('state' => 'error'));
	}
}else{
	echo json_encode(array('state' => 'error', 'email' => $email, 'message' => $message, 'captcha' => $captcha));
}





?>