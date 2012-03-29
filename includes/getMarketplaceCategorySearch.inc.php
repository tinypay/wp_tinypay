<?php
require('token.php');

if (!isset($_GET["categorie"]) || empty($_GET["categorie"])) {
	$search = '';
} else {
	$search = $_GET['categorie'];
}

try{
	$MarketplaceCategorySearch = $obj->getMarketplaceCategorySearch($tpmm_id,$search,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,'item_id,title,description,price,currency,user_id,user_name,user,image');
}catch(Exception $e){
		// tpm_debug($e);
	}


if (isset($MarketplaceCategorySearch) AND !empty($MarketplaceCategorySearch) AND isset($MarketplaceCategorySearch->results)){


	$category_items    = $MarketplaceCategorySearch->results;
}else{
	$category_items=array();
	$MarketplaceCategorySearch=array();
}

?>