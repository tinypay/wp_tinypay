<?php include('includes/getMarketplaceSearchForum.inc.php'); ?>
<?php if (isset($marketplace_widget_h_items) AND !empty($marketplace_widget_h_items)): ?>	
	<div class="tpm-widget-forum-wrapper clearfix">
		<div class="tpm-widget-forum-inner clearfix">
			<div class="tpm-widget-head">
				<span class="tpm-widget-head-contrast">Top Items</span> <?php echo $topic; ?>
			</div>
		<?php $i = 0; shuffle ($marketplace_widget_h_items); foreach($marketplace_widget_h_items as $marketplace_widget_h_item) : ?>
				<?php if (++$i == 8) break; ?>
				<!-- Items, tooltip id and classes enable tooltip data below -->	
				<div id="tooltip_<?php echo $marketplace_widget_h_item->item_id; ?>" class="tpm-item tooltip">
	
					<div class="tpm-item">
						<div class="image">
						
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $marketplace_widget_h_item->item_id; ?>">
							
									<?php if (isset($marketplace_widget_h_item->image->xxsmall)): ?>
										<img src="<?php echo $marketplace_widget_h_item->image->xxsmall; ?>"/>
									<?php endif; ?>
							</a>
						</div>
					</div>
					<!-- Tooltip data -->
					<div id="data_tooltip_<?php echo $marketplace_widget_h_item->item_id; ?>" class="hidden">
					
	
						<div class="tooltip-inner">
							<div class="tooltip-description">
								<div class="tooltip-title"><?php echo $marketplace_widget_h_item->title; ?></div>
								<?php echo truncate( $marketplace_widget_h_item->description,130);?>
							</div>
							<div class="tooltip-seller">
								<div class="tooltip-subtitle">
								</div>
									<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=
									<?php echo $marketplace_widget_h_item->user_id; ?>">
									<img src="<?php echo $marketplace_widget_h_item->user->avatar; ?>"/></a>
									<div class="tooltip-subtitle">by <?php echo $marketplace_widget_h_item->user_name; ?></div>
							</div>
						</div>
					</div>
				</div>			
			<?php endforeach;?> 
		
			<div class="tpm-more"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPPING; ?>">View all</a></div>
		</div>
	</div>
<?php endif; ?>
