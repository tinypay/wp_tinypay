<?php
require ('token.php');

/* Get spotlight user items */

$options = get_option('tinypay_advanced_settings');
/* Get seller items for seller pages  */

if (!isset($_GET["seller"]) || empty($_GET["seller"])) {
	$tpm_profile = $options['spotlight_seller'];
} else {
	$tpm_profile = $_GET['seller'];

}

	/* Get user info */


try{
	$user_info = $obj->getUserProfile($tpm_profile,'avatar,bio,name,user_id,facebook,linkedin,twitter');
}catch(Exception $e){
		// tpm_debug($e);
	}


	if(empty($user_info)){
		$user_info=array();
	}

	/* Get user items */
	
try{
	$user_items = $obj->getUserItems($tpm_profile,'description,currency,images,item_id,price,quantity,shipment_costs,shipment_costs_per_item,title,user', $not_select = null, $page = null, $limit = null, $marketplace_id = $tpmm_id);
}catch(Exception $e){
		// tpm_debug($e);
	}	
	
	if(empty($user_items)){
		$user_items=array();
	}



?>