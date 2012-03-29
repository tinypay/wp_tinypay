<?php
require ('token.php');

if(isset($_GET['search'])){
	$search = $_GET['search'];
}else{
	$search = '';
}

try{
	$marketplace_search = $obj->getMarketplaceSearch($tpmm_id,$search,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,'description,title,item_id,user_name,price,image,user_id,currency');
}catch(Exception $e){
		// tpm_debug($e);
	}

if(!empty($marketplace_search)){

	if(isset($marketplace_search->results) AND !empty($marketplace_search->results)){
		$marketplace_items = $marketplace_search->results;
	}

}else{

	$marketplace_search=array();
	$marketplace_items=array();

}

?>