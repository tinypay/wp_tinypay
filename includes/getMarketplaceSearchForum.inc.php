<?php
require ('token.php');

if (!isset($_GET["winkelen"]) || empty($_GET["winkelen"])) {
	$marketplace_terms = '';
} else {
	$marketplace_terms = $_GET['winkelen'];

}

//we use this to get the forum category then we send it as a category
$url = $_SERVER['REQUEST_URI'];
$topic= str_replace('/','',str_replace('forum/','',$url));
$topic= str_replace('/','',str_replace('wordpress/','',$url));


try{
$marketplace_widget_h_search =$obj->getMarketplaceSearch($tpmm_id,$topic,'22',null,null,null,null,null,null,null,null,null,null,null,null,null,'best_selling','description,title,item_id,user_name,price,image,user_id,currency,user',null);
}catch(Exception $e){
		// tpm_debug($e);
	}


if (count($marketplace_widget_h_search)<1) {

	try{
		$marketplace_widget_h_search =$obj->getMarketplaceSearch($tpmm_id,null,'22',null,null,null,null,null,null,null,null,null,null,null,null,null,'best_selling','description,title,item_id,user_name,price,image,user_id,currency,user',null);
	}catch(Exception $e){
			// tpm_debug($e);
		}
	
	$topic='toppersss';

}

if(!empty($marketplace_widget_h_search)){
	$marketplace_widget_h_items =$marketplace_widget_h_search->results;

}else{
	$marketplace_widget_h_search=array();
	$marketplace_widget_h_items=array();
}

?>