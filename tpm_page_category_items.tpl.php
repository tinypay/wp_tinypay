<?php include('includes/getMarketplaceCategorySearch.inc.php');?>

<!-- The shortcode for this page is [tpm-marketplace-categories] -->

<?php if (isset($category_items) AND !empty($category_items)): ?>	
	
	<!-- Let's add the search box -->
	<?php include('tpm_widget_search_box.tpl.php');?>
	
	
	<div class="tpm-page-wrapper">
	
	<!-- Let's add the category widget -->	
		<?php include('tpm_widget_category.tpl.php');?>	
		
		<div class="tpm-dotted"> </div>
		
		<div id="tpm-paging" class="container">
			<div class="content clearfix">
				<?php foreach($category_items as $category_item) : ?>
					<div id="tooltip_<?php echo $category_item->item_id; ?>" class="tpm-item tooltip">
						<div class="item-inner">
							<div class="image">
								<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $category_item->item_id; ?>">
								
									<?php if (isset($category_item->image->xsmall)): ?>
										<img src="<?php echo $category_item->image->xsmall; ?>"/>
									<?php endif; ?>
												
								</a>
							</div>
						<div class="tpm-title">
							<?php echo truncate($category_item->title,24); ?>
						</div>
						<div class="price">
							<span class="price <?php echo $category_item->currency; ?>"><?php echo $category_item->price; ?></span>
						</div>
						<div class="tpm-meta-name">
							by <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $category_item->user_id; ?>">
								<?php echo $category_item->user_name; ?>
							</a>
						</div>
						</div>
	
				<!-- Data for the tooltip -->					
						<div id="data_tooltip_<?php echo $category_item->item_id; ?>" class="hidden">
							<div class="tooltip-inner">
								<div class="tooltip-description">
									<div class="tooltip-title"><?php echo $category_item->title; ?></div>
									<?php  echo truncate( $category_item->description,130);?>
								</div>
								<div class="tooltip-seller">
									<div class="tooltip-subtitle">

									</div>
										<img src="<?php echo $category_item->user->avatar; ?>"/>
										<div class="tooltip-subtitle">by <?php echo $category_item->user_name; ?></div>
								</div>
							</div>
						</div>
						
					</div>
				<?php endforeach;?>
				</div>
				<div class="tpm-dotted"> </div>
				
				<!-- Only show navigation if needed -->
				<?php if (count($category_items)>12): ?>
					<div class="page_navigation clearfix"></div> 
				<?php endif; ?>

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
