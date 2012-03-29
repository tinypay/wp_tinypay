<?php
require_once ('includes/token.php');

$destination 	= $_POST['item_page'];
$user_id 		= $_POST['user_id'];
$name			= $_POST['contact-name'];
$email			= $_POST['contact-email'];
$message		= $_POST['contact-message'];
$subject		= $_POST['contact-subject'];

try{
	$tpm_contact=$obj->contactUser($access_token,$user_id,$name,$email,$message,$subject);
}catch(Exception $e){
		// tpm_debug($e);
	}


header("Location:".$destination);
?>