<?php include('includes/getUserSpotlight.inc.php'); ?>
<!-- The shortcode for this page is [tpm-user-profile] -->

<?php if (isset($seller_spotlight_info) AND !empty($seller_spotlight_info)): ?>	
	<div class="tpm-page-wrapper">
		<div class="tpm-subhead-wrapper clearfix">
				<div class="tpm-subhead-left">[ DE SPOTLIGHT ]</div>
				<div class="tpm-more"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPS; ?>">Bekijk andere shops</a></div>
	
		</div>
					<div class="tpm-dotted"></div>
		
					
					<div class="tpm-profile">
						<div class="tpm-avatar">
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $seller_spotlight_info->user_id; ?>">
							<img src="<?php echo $seller_spotlight_info->avatar; ?>"/></a>
						</div>
						<div class="tpm-info">	
							<div class="tpm-name">
								<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $seller_spotlight_info->user_id; ?>">
								<?php echo $seller_spotlight_info->name; ?></a>
							</div>
	
							<div class="tpm-bio">
								<?php echo $seller_spotlight_info->bio; ?>
							</div>
							
							<div class="tpm-meta">
														
								<div class="tpm-social">
															
								<?php if (isset($seller_spotlight_info->facebook)): ?>
									<a class="tpm-facebook" target="_blank" href="<?php echo $seller_spotlight_info->facebook; ?>">facebook</a>
								<?php endif; ?>
								<?php if (isset($seller_spotlight_info->user->twitter)): ?>
									<a class="tpm-twitter" target="_blank" href="<?php echo $seller_spotlight_info->twitter; ?>">twitter</a>
								<?php endif; ?>
								<?php if (isset($seller_spotlight_info->user->linkedin)): ?>
									<a class="tpm-linkedin" target="_blank" href="<?php echo $seller_spotlight_info->linkedin; ?>">linkedin</a>
								<?php endif; ?>
								
	
								</div>
	
								
									<div class="tpm-more">
									<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=
									<?php echo $seller_spotlight_info->user_id; ?>">View this shop</a>
								</div>
							</div>	
						</div>
					</div>
			<div class="clearfix"></div>			
		</div>		
<?php endif; ?>
