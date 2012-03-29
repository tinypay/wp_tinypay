<?php include('includes/getMarketplaceSearchBestSelling.inc.php')?>

<?php if (isset($bestselling_items) AND !empty($bestselling_items)): ?>	


<?php if (isset($tpm_sidebar_number)) {
    $stop_at = $tpm_sidebar_number+1;
		}else {
	$stop_at=4;
	} ?>

	<!-- The shortcode for this page is [tpm-widget-sidebar] -->
	
	<div class="tpm-widget-sidebar-wrapper clearfix">
		<div class="tpm-widget-sidebar-inner clearfix">
			<!-- <div class="tpm-widget-head">Marketplace <span class="tpm-widget-head-contrast">top items</span></div> -->
			<div class="tpm-widget-sidebar-title"><?php echo $tpm_sidebar_title; ?></div>
			<div class="tpm-dotted"></div>
			
			<?php $i = 0; shuffle ($bestselling_items); foreach($bestselling_items as $bestselling_item) : ?>
				<?php if (++$i == $stop_at) break; ?>
	
			<!-- Items, tooltip id and classes enable tooltip data below -->
			<div id="tooltip_<?php echo $bestselling_item->item_id; ?>" class="tpm-item tooltip">
				<div class="tpm-item">				
					<div class="image">
						<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $bestselling_item->item_id; ?>">
		
						<?php if (isset($bestselling_item->image->xsmall)): ?>
							<img src="<?php echo $bestselling_item->image->xsmall; ?>"/>
						<?php endif; ?>
						</a>
					</div>						
					<div class="tpm-title">
						<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $bestselling_item->item_id; ?>">
						<?php echo truncate($bestselling_item->title,24); ?>
						</a>
					</div>
					<div class="price <?php echo $bestselling_item->currency; ?>">
						<?php echo $bestselling_item->price; ?>
					</div>
					<div class="tpm-meta-name">
						by <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $bestselling_item->user_id; ?>">
						<?php echo $bestselling_item->user_name; ?>
						</a>
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
				</div>	
				</div>
			<?php endforeach;?>
		
			<div class="tpm-widget-footer"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/">Marketplace</a></div>
		</div>	
	</div>
	<?php endif; ?>
