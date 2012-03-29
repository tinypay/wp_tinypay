<?php
require('token.php');

if (!isset($_GET["category"]) || empty($_GET["category"])) { 
	    $marketplace_terms = '';
	} else { 
	    $marketplace_terms = $_GET['category'];

	} 
	
$marketplace_categories = array();	

try{
	$marketplace_info =$obj->getMarketplace($tpmm_id,'categories,description,title');
	
	if(isset($marketplace_info->categories) AND !empty($marketplace_info->categories)){
		$marketplace_categories	=$marketplace_info->categories;
	}
}catch(Exception $e){
		//tpm_debug($e);
	}

if(empty($marketplace_info)){
	$marketplace_info=array();
}


?>