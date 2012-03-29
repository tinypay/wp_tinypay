<?php
require_once ('includes/token.php');
//Get the order status

if (!isset($_GET['order_id']) || empty($_GET['order_id'])) { 
	    $order_status = '';
	} else { 
		$order_id = $_GET['order_id'];
		
		try{
		$order_status	=$obj->getOrderStatus($order_id);
}catch(Exception $e){
		// tpm_debug($e);
	}
		
		
	} 

?>


<!-- Show a message if the order id is not blank -->
<?php if (isset($order_status->status)): ?><div class="tmp_message clearfix"><?php endif; ?>


	<!-- Change the message depending on the situation -->
	
	<?php if (isset($order_status->status) AND $order_status->status =='completed'): ?>
	
	<strong>Congratulations!</strong> Your order of <?php echo $marketplace_item->title;?> at <?php echo $marketplace_item->user->name; ?> is completed. You have received an email with a confirmation of your order.

	<?php elseif (isset($order_status->status) AND $order_status->status =='created'): ?>
		Your order of <?php echo $marketplace_item->title;?> has not yet been completed.
	<?php elseif (isset($order_status->status) AND $order_status->status =='pending'): ?>
		Your order of <?php echo $marketplace_item->title;?> has not yet been completed.
	<?php elseif (isset($order_status->status) AND $order_status->status =='cancelled'): ?>
		Your order of <?php echo $marketplace_item->title;?> has been cancelled.
	<?php endif; ?>

<!-- Close the div if the order id is not blank -->
<?php if (isset($order_status->status)): ?></div><?php endif; ?>