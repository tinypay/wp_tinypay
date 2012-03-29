<?php
require ('token.php');

if (isset($_GET['item']) and !empty($_GET['item'])){

	$item = $_GET['item'];

	/* Get item */

try{
	$marketplace_item =$obj->getItem($item,'currency,description,images,item_id,price,quantity,shipment_costs,shipment_costs_per_item,title,user');
}catch(Exception $e){
		// tpm_debug($e);
	}

	/* 	Check to see if we got a GOOD result, API provides an error message */
	if (!empty($marketplace_item->item_id)){
	
	
	if(isset($marketplace_item->images) AND !empty($marketplace_item->images)){
		$marketplace_images =$marketplace_item->images;
	}
	else
	{
		$marketplace_images = '';
	}
	
	if(isset($marketplace_item->user->user_id) AND !empty($marketplace_item->user->user_id)){
	$tpm_profile=$marketplace_item->user->user_id;
	}

	/* shipment costs */
	
	if(isset($marketplace_item->shipment_costs) AND !empty($marketplace_item->shipment_costs)){
	$tpm_shipment_costs =$marketplace_item->shipment_costs;
	}
		
		
		try{
			$tpm_shipment_countries =$obj->getShipmentCountries($item);
		}catch(Exception $e){
			// tpm_debug($e);
	}
		
		/* Display some seller items on the item page */
		$user_items= $obj->getUserItems($tpm_profile,'description,currency,images,item_id,price,quantity,shipment_costs,shipment_costs_per_item,title,user');

		if (!empty($user_items)){

			foreach ($user_items as $key=>$user_item ){
				if($user_item->item_id == $item){
					unset($user_items[$key]);
				}
			}
			$user_items = array_slice($user_items,0,4);
		}
	}

} else {
	$item = '';
}

?>