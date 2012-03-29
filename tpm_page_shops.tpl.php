<?php include('includes/getMarketplaceUsers.inc.php');?>

<!-- The shortcode for this page is [tpm-marketplace-categories] -->

<!-- Let's add the search box -->
<?php include('tpm_widget_search_box.tpl.php');?>

<?php if (isset($marketplace_shops) AND !empty($marketplace_shops) AND isset($marketplace_item[0]->user_id)): ?>	

	<div class="tpm-page-wrapper">
		<div class="tpm-subhead">Marketplace shops</div>
		<div class="tpm-dotted"></div>
		<div id="tpm-paging" class="container">
		<div class="content clearfix">
		
				<?php foreach($marketplace_shops as $marketplace_shop) : ?>
				<div class="tpm-profile">
					<div class="tpm-avatar">
						<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_shop->user_id; ?>">
						<img src="<?php echo $marketplace_shop->avatar; ?>"/></a>
					</div>
					<div class="tpm-info">
						<div class="tpm-name">
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_shop->user_id; ?>">
							<?php echo $marketplace_shop->name; ?></a>
						</div>
	
						<div class="tpm-bio">
							<?php echo $marketplace_shop->bio; ?>
						</div>
	
						<div class="tpm-meta">
							
							<div class="tpm-social">
															
								<?php if (isset($marketplace_shop->facebook)): ?>
									<a class="tpm-facebook" target="_blank" href="<?php echo $marketplace_shop->facebook; ?>">facebook</a>
								<?php endif; ?>
								<?php if (isset($marketplace_shop->twitter)): ?>
									<a class="tpm-twitter" target="_blank" href="<?php echo $marketplace_shop->twitter; ?>">twitter</a>
								<?php endif; ?>
								<?php if (isset($marketplace_shop->linkedin)): ?>
									<a class="tpm-linkedin" target="_blank" href="<?php echo $marketplace_shop->linkedin; ?>">linkedin</a>
								<?php endif; ?>
								</div>

							<div class="tpm-more">
								<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=
								<?php echo $marketplace_shop->user_id; ?>">View this shop</a>
							</div>
						</div>
					</div>
			<div class="clearfix"></div>
		</div>
			<?php endforeach;?>
			</div>
				<!-- Only show navigation if needed -->
				<?php if (count($marketplace_shops)>12): ?>
					<div class="page_navigation clearfix"></div>
				<?php endif; ?>
		</div>
	</div>
<?php else:
$options = get_option('tinypay_advanced_settings');
if(isset ($options['api_error']) AND !empty($options['api_error'])){
echo '<div class="tmp_message">'.$options['api_error'].'</div>';
} else{
echo '';
}
?>

<?php endif; ?>
