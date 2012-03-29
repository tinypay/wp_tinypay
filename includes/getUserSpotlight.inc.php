<?php
require ('token.php');

/* Get spotlight user items */

$options = get_option('tinypay_advanced_settings');


$tpm_spotlight_profile = $options['spotlight_seller'];

if(isset($user_info) AND !empty($user_info) AND isset($tpm_profile) AND $tpm_spotlight_profile == $tpm_profile){
	$seller_spotlight_info = $tpm_profile;
}else{

try{
	$seller_spotlight_info = $obj->getUserProfile($tpm_spotlight_profile,$select='avatar,bio,name,user_id,facebook,twitter');
}catch(Exception $e){
		// tpm_debug($e);
	}
}

if(!isset($user_items)){

	// slice user_items to 4
	$seller_spotlight_items = $obj->getUserItems($tpm_spotlight_profile,'description,currency,images,item_id,price,quantity,shipment_costs,shipment_costs_per_item,title,user', $not_select = null, $page = 1, $limit = 4, $marketplace_id = $tpmm_id);

}else{

	// slice user_items to 4
	$seller_spotlight_items = array_slice($user_items,0,4);
}
	

?>