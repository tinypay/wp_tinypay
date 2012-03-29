<?php
include('includes/getItem.inc.php');
if (isset ($_GET['item'])){$item = $_GET['item'];}
if (isset ($_GET['order_id'])){$order_id = $_GET['order_id'];}
?>
<!-- The shortcode for this page is [tpm-item] -->

<?php if (isset($_GET['item']) and !empty($_GET['item']) and isset($marketplace_item->item_id)): ?>
	<div id="tpm_page_item">

<!-- If the user recently completed a transaction  -->
	<?php if(isset($order_id)):?>
		<?php include('tpm_order_status.php');?>

<!-- Otherwise, let's show the seller and the item  -->
	<?php else:?>
	<!-- The search box -->
		<?php include('tpm_widget_search_box.tpl.php');?>

	<!-- The seller profile -->
		<div class="tpm-subhead-wrapper clearfix">
			<div class="tpm-subhead-left"><span class="tpm-highlight"><?php echo $marketplace_item->title;?></span></div>
			<div class="tpm-subhead-right"><span class="<?php echo $marketplace_item->currency; ?>"><?php echo $marketplace_item->price; ?></span></div>
		</div>
		<div class="tpm-dotted"></div>
		<div class="clearfix">
		<div class="addthis_toolbox addthis_default_style">
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		</div>

	<!-- Item info  -->
			<?php if ($marketplace_item->quantity>0): ?>
			<div id="buy-now-button" class="clearfix">Buy now</div><?php endif; ?>
			<div id="stock">
			<?php if ($marketplace_item->quantity==0){ echo 'This item is sold out.';} ?>
			<?php if ($marketplace_item->quantity==1){ echo 'Last item!';} ?>
			<?php if ($marketplace_item->quantity==2 || $marketplace_item->quantity==2  ){ echo 'Last '.$marketplace_item->quantity.' items.';} ?>
			<?php if ($marketplace_item->quantity>4){ echo 'Stock: '.$marketplace_item->quantity;} ?>
			</div>
			</div>

	<!-- Item order form  -->
		<div id="tpm-buy-form-wrapper">
			<?php include('tpm_order_form.tpl.php');?>
		</div>

	<!-- Item info, pictures  -->
		<?php if (isset($marketplace_item->images[0]->medium)): ?>
		<div id="image"><img class="tpm_big" src="<?php echo $marketplace_item->images[0]->medium;?>"/></div>
		<?php endif; ?>

			<!-- Image thumbnails -->
			<?php if (isset($marketplace_item->images) AND count($marketplace_images)>2): ?>
				<div class="tpm-image-thumbs">
					<!-- Something fancy with these images -->
				<?php if (!empty($marketplace_images)): ?>
					<?php  foreach ($marketplace_images as $marketplace_image) : ?>
						<a href="#" rel="<?php echo $marketplace_image->medium;?>" class="image">
						<img src="<?php echo $marketplace_image->xxsmall;?>" class="thumb" border="0"/></a>
						<!-- A little trick to 'preload' the large images -->
						<div class="hidden" style="background-image: url(<?php echo $marketplace_image->medium;?>);"></div>
					<?php endforeach;?>
				<?php endif; ?>
				</div>
			<?php endif; ?>

		<div class="description">
			<?php echo $marketplace_item->description;?>
		</div>
		<?php if (empty($tpm_shipment_costs)):?>
			<div class="spacer20 clearfix"></div>
		<?php else: ?>
			<div class="shipping_to">
			<div><strong>Shipping only to</strong></div>
			<table id="shipping" border="0">
				<?php foreach ($tpm_shipment_costs as $tpm_shipment_cost) : ?>
					<tr>
						<td><?php if(isset($tpm_countries[$tpm_shipment_cost->area])):?>
								<?php echo $tpm_countries[$tpm_shipment_cost->area];?>
							<?php else:?>
								<?php echo $tpm_shipment_cost->title;?>
							<?php endif;?>
						</td>
						<td class="<?php echo $marketplace_item->currency;?>" style="text-align:right;"><?php echo $tpm_shipment_cost->shipment_cost;?></td>
					</tr>
				<?php endforeach;?>
			</table>
			</div>
		<?php endif;?>
	<?php endif; ?>

	<!-- Seller info here -->
		<div class="tpm-subhead">Shop</div>
		<div class="tpm-dotted"></div>
			<div class="tpm-profile">
					<div class="tpm-avatar">
						<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user->user_id; ?>">
						<img src="<?php echo $marketplace_item->user->avatar; ?>"/></a>
					</div>
					<div class="tpm-info">
						<div class="tpm-name">
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user->user_id; ?>">
							<?php echo $marketplace_item->user->name; ?></a>
						</div>

						<?php if(isset($marketplace_item->user->bio)): ?>
						<div class="tpm-bio">
							<?php echo $marketplace_item->user->bio; ?>
						</div>
						<?php endif; ?>

						<div class="tpm-meta">
						
							
							
								<div class="tpm-social">
														
							<?php if (isset($marketplace_item->user->facebook)): ?>
								<a class="tpm-facebook" target="_blank" href="<?php echo $marketplace_item->user->facebook; ?>">facebook</a>
							<?php endif; ?>
							<?php if (isset($marketplace_item->user->twitter)): ?>
								<a class="tpm-twitter" target="_blank" href="<?php echo $marketplace_item->user->twitter; ?>">twitter</a>
							<?php endif; ?>
							<?php if (isset($marketplace_item->user->linkedin)): ?>
								<a class="tpm-linkedin" target="_blank" href="<?php echo $marketplace_item->user->linkedin; ?>">linkedin</a>
							<?php endif; ?>
							

							</div>
							
							
						</div>
				</div>
		<div class="clearfix"></div>

	<!-- Seller's items go here -->
		<?php foreach($user_items as $user_item) : ?>

			<div id="tooltip_<?php echo $user_item->item_id; ?>" class="tpm-item tooltip">
				<div class="image">
					<?php if (isset($user_item->images[0]->xsmall)):?>
						<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $user_item->item_id; ?>">
						<img src="<?php echo $user_item->images[0]->xsmall; ?>"/>
						</a>
					<?php endif; ?>
				</div>
				<div class="tpm-title"><?php echo truncate($user_item->title,24);?></div>
				<div class="price">
					<span class="price <?php echo $user_item->currency; ?>"><?php
echo $user_item->price; ?></span>
				</div>
			</div>
				<div id="data_tooltip_<?php echo $user_item->item_id; ?>" class="hidden">
						<div class="tooltip-inner">
						<div class="tooltip-title"><?php echo $user_item->title; ?></div>
							<?php echo truncate($user_item->description,130);?>
						</div>
					</div>
		<?php endforeach;?>
	</div>

		<div class="clearfix">
			<?php if (is_user_logged_in()):?>
				<div id="contact-button">Contact seller</div>
			<?php else: ?>
				<div id="contact-button-disabled">Login to contact the seller</div>
			<?php endif;?>
			<div id="view-shop-button"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user->user_id; ?>">View shop</a></div>			
		</div>

<!-- if the user successfully submitted a contact form we let them know -->
	<div id="tpm-contact-loading"></div>
	<div id="tmp_contact_message">
		<p>Your message to <?php echo $marketplace_item->user->name; ?> about <?php echo $marketplace_item->title;?> has been sent.</p>
	</div>

	<!-- The contact form -->
		<div id="tpm-contact-form-wrapper">
			<?php include('tpm_contact_form.tpl.php');?>
		</div>

<?php else: ?>
	<div class="tmp_message clearfix">
	The item you are searching for does not exist (anymore). Try our search functionality to find a similar item.</div>
	<?php include('tpm_widget_search_box.tpl.php');?>

	<?php include('tpm_widget_front.tpl.php'); ?>
<?php endif; ?>
