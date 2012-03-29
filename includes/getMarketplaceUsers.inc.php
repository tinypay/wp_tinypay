<?php
require ('token.php');



try{
	$marketplace_shops = $obj->getMarketplaceUsers($tpmm_id,null,'facebook,twitter,linkedin,avatar,bio,name,user_id');
}catch(Exception $e){
		// tpm_debug($e);
	}

if(empty($marketplace_shops)){
	$marketplace_shops=array();
}

?>