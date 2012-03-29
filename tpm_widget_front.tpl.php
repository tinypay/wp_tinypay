<?php include('includes/getMarketplaceSearchBestSelling.inc.php')?>

<?php if (isset($bestselling_items) AND !empty($bestselling_items)): ?>	
	<div class="tpm-widget-front-wrapper">
		<div class="tpm-widget-front-inner clearfix">
				<div class="tpm-subhead">Top items</div>
				<div class="tpm-dotted"></div>
			<?php $i = 0; shuffle($bestselling_items); foreach($bestselling_items as $bestselling_item) : ?>
				<?php if (++$i == 9) break; ?>
	
			<!-- Items, tooltip id and classes enable tooltip data below -->
			<div id="tooltip_<?php echo $bestselling_item->item_id; ?>" class="tpm-item tooltip">
				<div class="image">
					<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $bestselling_item->item_id; ?>">
					<?php if (isset($bestselling_item->image->small)): ?>
							<img class="thumb" src="<?php echo $bestselling_item->image->small; ?>"/>
					<?php endif; ?>
					</a>
				</div>
				<div class="tpm-title">
					<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $bestselling_item->item_id; ?>">
					<?php echo truncate($bestselling_item->title,24); ?>
					</a>
				</div>
				<div class="price <?php echo $bestselling_item->currency; ?>">
					&nbsp;<?php echo $bestselling_item->price; ?>
				</div>
				<div class="tpm-meta-name">
					by <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $bestselling_item->user_id; ?>">
					<?php echo $bestselling_item->user_name; ?>
					</a>
				</div>
			</div>
	
			<!-- Tooltip data -->
			<div id="data_tooltip_<?php echo $bestselling_item->item_id; ?>" class="hidden">
				<div class="tooltip-inner">
					<div class="tooltip-description">
						<div class="tooltip-title"><?php echo $bestselling_item->title; ?></div>
						<?php echo truncate( $bestselling_item->description,130);?>
					</div>
					<div class="tooltip-seller">
						<div class="tooltip-subtitle">
						</div>
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $bestselling_item->user_id; ?>">
							<img src="<?php echo $bestselling_item->user->avatar; ?>"/></a>
							<div class="tooltip-subtitle">by <?php echo $bestselling_item->user_name; ?></div>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="tpm-meta-name float-right">powered by <a href="http://tinypay.me">Tinypay.me</a></div>

<?php else:
$options = get_option('tinypay_advanced_settings');
if(isset ($options['api_error']) AND !empty($options['api_error'])){
echo '<div class="tmp_message">'.$options['api_error'].'</div>';
} else{
echo '';
}
?>
<?php endif; ?>
