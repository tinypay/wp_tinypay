<?php 
	require_once('includes/getItem.inc.php');	
	global $current_user;
	get_currentuserinfo();
		
?>

<h2>Buy <?php echo $marketplace_item->title; ?></h2>
<form id="tpm-buy-form" class="tpmForm" action="<?php echo plugins_url('tpm_order_process.php', __FILE__) ?>" method="post">
	
	<input type="hidden" id="tpm_item_id" name="item_id" value="<?php echo $item; ?>">
	<input type="hidden" id="marketplace_id" name="marketplace_id" value="<?php echo $tpmm_id; ?>">	
	<input type="hidden" id="cancel_url" name="cancel_url" value="/foo">
	<input type="hidden" id="return_url" name="return_url" value="/foo">
	<input type="hidden" id="buy-address_2" name="address_line_2" value="">
	<input type="hidden" id="tpm_order_comment" name="comment" value="">
	<input type="hidden" name="item_page" value="<?php echo bloginfo('url').'/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item='.$marketplace_item->item_id; ?>">
	<input type="hidden" name="buy_inventory" id="buy-inventory" name="inventory" value="<?php echo $marketplace_item->quantity ?>">
	<div class="clearfix">
		<div id="tpm_quantity" class="rowElem float-left">
			<input id="buy-quantity" type="text" name="buy-quantity" value="1">
			<label id="buy-quantityInfo" class="error" for="buy-quantity"></label>
		</div>   
		<div id="tpm_total" class="float-right">
			<span id="subtotal" class="hidden"><?php echo $marketplace_item->price;?></span>
			<span id="price" class="<?php echo $marketplace_item->currency;?>"><?php echo $marketplace_item->price;?></span>
		</div> 
	</div>
	
	<div class="clearfix">
		<div class="float-left tpm-subtotal-grey">+ Shipping costs</div>
		<div class="float-right">
			<span id="shipment_cost" class="<?php echo $marketplace_item->shipment_costs_per_item; ?>"></span>
			<span class="tpm-subtotal-grey <?php echo $marketplace_item->currency;?>" id="shipping_per_item"></span>
			<span class="tpm-subtotal-grey <?php echo $marketplace_item->currency;?>" id="shipping_per_order"></span>
		</div>
	</div>	
	<div class="clearfix"></div>
	<hr/>
		
	<div class="clearfix" style="text-align:right;width:100%;">
		<strong>Total <span class="col_right <?php echo $marketplace_item->currency;?>" id="total"></span></strong> 
		<p></p>
	</div>
	
	<div class="rowElem left">
	
	<!-- If the user is logged in, fill in some of the form -->
		<label id="buy-nameInfo" for="buy-name">Your name</label>
		<input id="buy-name" name="buy-name" type="text" value="<?php if (is_user_logged_in()){echo $current_user->user_firstname.' '.$current_user->user_lastname;} ?>" />
	</div> 
	<div class="rowElem right clearfix">
		<label for="buy-email">E-mail address:</label>
		<input id="buy-email" type="text" name="buy-email" value="<?php if (is_user_logged_in()){ echo $current_user->user_email;} ?>">
	</div> 
	
	<!-- 	If this item doesn't ship, skip the address -->
	<?php if (isset($tpm_shipment_countries[0]->area) AND !empty($tpm_shipment_countries[0]->area)):?>		
		<div class="rowElem left">
			<label for="buy-address-line-1">Address:</label>
			<input	type="text" name="buy-address-line-1" value="">
		</div>     
		<div class="rowElem right clearfix">
			<label for="buy-postal-code">Postal: </label>
			<input	type="text" name="buy-postal-zip-code" value="">
		</div>
		<div class="rowElem left ">
			<label for="buy-state-province">State/province: </label>
			<input	type="text" name="buy-state-province" value="">
		</div>
		<div class="rowElem right clearfix">
			<label for="buy-city">City: </label>
			<input	type="text" name="buy-city" value="">
		</div>
		<div class="rowElem left">
			<label for="buy-country">Country: </label> 					

			<select id="buy-country" name="buy-country">
				<?php if (!empty($tpm_shipment_countries)): ?>
					<?php foreach ($tpm_shipment_countries as $tpm_shipment_country) : ?>	
					<option id="shipping-option" value="<?php echo $tpm_shipment_country->area;?>" data="<?php echo $tpm_shipment_country->shipment_cost;?>" <?php if ($tpm_shipment_country->area == 'NL'): ?>selected="selected"<?php endif;?>>
					
					<?php if(isset($tpm_countries[$tpm_shipment_country->area])):?>
						<?php echo $tpm_countries[$tpm_shipment_country->area];?>
					<?php else:?>
						<?php echo $tpm_shipment_country->title;?>
					<?php endif;?></option>
					<?php endforeach;?> 
				<?php endif;?> 
			</select>
		</div>
	<?php endif;?> 
	<div class="clearfix"></div>	
	<div class="rowElem">
		<label for="buy-comment">Add an optional comment to the seller:</label> 
		<textarea name="buy-comment" rows="3" cols="40"></textarea>
	</div> 
	<div class="buy_button">
		<input type="submit" value="Submit your order" >
	</div>     
</form>

<div class="tpm-dotted"></div>