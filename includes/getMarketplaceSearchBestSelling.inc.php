<?php
require ('token.php');

try{
$getMarketplaceSearchBestSelling =$obj->getMarketplaceSearch($tpmm_id,null,'12',null,null,null,null,null,null,null,null,null,null,null,null,null,'best_selling','description,title,item_id,user_name,price,image,user,user_id,currency',null);
}catch(Exception $e){
		// tpm_debug($e);
	}


if(!empty($getMarketplaceSearchBestSelling->results) AND is_array($getMarketplaceSearchBestSelling->results)){
	
	if(isset($getMarketplaceSearchBestSelling->results) AND !empty($getMarketplaceSearchBestSelling->results)){
		$bestselling_items =$getMarketplaceSearchBestSelling->results;
	}
	

}else{
	$getMarketplaceSearchBestSelling=array();
	$bestselling_items=array();

}

?>