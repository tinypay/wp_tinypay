<?php
include('includes/getItem_spotlight.inc.php');
?>
<!-- The shortcode for this page is [tpm-item] -->

<?php if (isset($marketplace_items) AND !empty($marketplace_items)): ?>	

	<div id="tpm_page_item">
		<div id="slides" class="clearfix">
			<div class="pagination_outer clearfix"><div class="tpm-subhead-pager">Featured</div><div class="pagination top"></div>
		</div>
		<div class="tpm-dotted"> </div>
		
			<!-- The seller profile -->
			<div class="slides_container">
		
					<?php foreach($marketplace_items as $marketplace_item) : ?>
		
			<!-- Item info, pictures  -->
			<div class="slide">
			<div class="tpm_caption">
				<div class="tpm_slide_title"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $marketplace_item->item_id; ?>"><?php echo $marketplace_item->title; ?></a></div>
				<div class="tpm_slide_price <?php echo $marketplace_item->currency; ?>">&nbsp;<?php echo $marketplace_item->price; ?></div>
			</div>
		
				<div class="image"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $marketplace_item->item_id; ?>"><img src="<?php echo str_replace('s.jpg','m.jpg',$marketplace_item->image->small)?>"/></a></div>
			<!-- Seller info here -->
					<div class="tpm-profile">
						<div class="tpm-avatar">
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user->user_id; ?>">
							<img src="<?php echo $marketplace_item->user->avatar; ?>"/></a>
						</div>
						<div class="tpm-info">
							<div class="tpm-slide-name">by 
								<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user->user_id; ?>">
								<?php echo $marketplace_item->user->name; ?></a>
							</div>
	
							<div class="tpm-bio">
								<?php echo $marketplace_item->user->bio; ?>
							</div>
	
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
									
									
									
									<div class="tpm-more">
										<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPS; ?>/">All shops</a>
									</div>
								</div>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
<?php endif; ?>

