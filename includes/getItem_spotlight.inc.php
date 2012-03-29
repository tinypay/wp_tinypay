<?php
require ('token.php');

$options = get_option('tinypay_advanced_settings');

$q='item_id:'.$options['spotlight_item_1'].'+OR+item_id:'.$options['spotlight_item_2'].'+OR+item_id:'.$options['spotlight_item_3'].'+OR+item_id:'.$options['spotlight_item_4'];

try{
	$marketplace_item   =$obj->getSearch($q);
}catch(Exception $e){
		// tpm_debug($e);
	}
	
if(!empty($marketplace_item)){

	if(isset($marketplace_item->results) AND !empty($marketplace_item->results)){
		$marketplace_items = $marketplace_item->results;
	}
	

}else{
	$marketplace_item=array();
	$marketplace_items=array();
}


?>