<?php include('includes/getMarketplace.inc.php');?>

<?php if (isset($marketplace_categories) AND !empty($marketplace_categories)): ?>	
		
		<!-- The shortcode for this page is [tpm-widget-winkelen] -->
		
		
		<div class="tpm-widget-category-wrapper">
			<div class="tpm-subhead">Categories</div>
			<div class="tpm-dotted"></div>
			<div class="tpm-categories clearfix">			
					<?php foreach($marketplace_categories as $category) : ?>
						<div class="tpm-category <?php echo $category->title; ?><?php if ($marketplace_terms==$category->category_id) {echo ' selected';}?>">
							<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPPING; ?>/?category=<?php echo $category->category_id; ?>">
							
							<?php echo $category->title; ?></a>
						</div>
					<?php endforeach;?> 
			</div>
					<div class="tpm-more"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPPING; ?>">View all</a></div>
		
			<div class="clearfix"></div>
		</div>

<?php endif; ?>
