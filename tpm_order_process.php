<?php

require_once ('includes/token.php');


$item_id = $_POST['item_id'];
$name = $_POST['buy-name'];
$email = $_POST['buy-email'];
$quantity = $_POST['buy-quantity'];
if(isset($_POST['buy-address_line_1'])) {$address_line_1 = $_POST['buy-address_line_1'];} else {$address_line_1=null;}
if(isset($_POST['buy-postal_zip_code'])) {$postal_zip_code = $_POST['buy-postal_zip_code'];} else {$postal_zip_code=null;}
if(isset($_POST['buy-state_province'])) {$state_province = $_POST['buy-state_province'];} else {$state_province=null;}
if(isset($_POST['buy-city'])) {$city = $_POST['buy-city'];} else {$city=null;}
if(isset($_POST['buy-country'])) {$country = $_POST['buy-country'];} else {$country=null;}
$return_url 		= $_POST['item_page'];
$cancel_url 		= $_POST['item_page'];


try{
	$tpm_create_order=$obj->createOrder($item_id, $name, $email, $address_line_1,'', $postal_zip_code, $state_province, $city, $country, '', $quantity, $return_url, $cancel_url , $tpmm_id);
}catch(Exception $e){
		// tpm_debug($e);
	}


header("Location: $tpm_create_order->paypal_url");
?>