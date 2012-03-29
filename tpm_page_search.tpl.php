<?php include('includes/getMarketplaceSearch.inc.php');?>


<!-- Let's add the search box -->
<?php include('tpm_widget_search_box.tpl.php');?>

<!-- The shortcode for this page is [tpm-page-marketplace-search] -->


<div class="tpm-page-wrapper">


<?php if (isset($_GET['search'])): ?>


<div id="tpm-paging" class="container">
    <div class="content clearfix">
		<?php if (!empty($marketplace_items)): ?>
			
		<div class="tpm-subhead">Search results</div>
		<div class="tpm-dotted"></div>			
			
		<?php foreach($marketplace_items as $marketplace_item) : ?><?php $marketplace_seller_id=$marketplace_item->user_id;
			try{
				$marketplace_seller_profile =$obj->getUserProfile($marketplace_seller_id,'avatar,bio,name,user_id');
			}catch(Exception $e){
				// tpm_debug($e);
			}
		?>

        <div id="tooltip_<?php echo $marketplace_item->item_id; ?>" class="tpm-item tooltip">
            <div class="item-inner">
                <div class="image">
                    <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $marketplace_item->item_id; ?>">
                    
                    <?php if (isset($marketplace_item->image->xsmall)): ?>
	                    <img src="<?php echo $marketplace_item->image->xsmall; ?>">
					<?php endif; ?>
                    
                    
                    </a>
                </div>

                <div class="tpm-title">
                    <?php echo truncate($marketplace_item->title,24); ?>
                </div>

                <div class="price <?php echo $marketplace_item->currency; ?>">
                    &nbsp;<?php echo $marketplace_item->price; ?>
                </div>

                <div class="tpm-meta-name">
                    <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user_id; ?>"><?php echo $marketplace_item->user_name; ?></a>
                </div>
            </div><!-- Data for the tooltip -->


            <div id="data_tooltip_<?php echo $marketplace_item->item_id; ?>" class="hidden">
                <div class="tooltip-inner">
                    <div class="tooltip-description">
                        <div class="tooltip-title">
                            <?php echo $marketplace_item->title; ?>
                        </div><?php echo truncate( $marketplace_item->description,130);?>
						<!-- <div class="price <?php echo $marketplace_item->currency; ?>"><strong class="tpm-highlight">&nbsp;<?php echo $marketplace_item->price; ?></strong></div> -->
                    </div>

                    <div class="tooltip-seller">
                        <div class="tooltip-subtitle">

                        </div><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELLER; ?>/?seller=<?php echo $marketplace_item->user_id; ?>"><img src="<?php echo $marketplace_seller_profile->avatar; ?>"></a>

                        <div class="tooltip-subtitle">
                            by <?php echo $marketplace_item->user_name; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	
				
			<?php endforeach;?>
			<?php else:?>
			<div class="tmp_message clearfix">No items found. Please try again.</div>
		<?php endif; ?>
		  	<?php if (isset($marketplace_item) AND !empty($marketplace_item) AND !array_key_exists('message',$marketplace_item)):?>

			<!-- Only show navigation if needed -->
			<?php if (count($marketplace_items)>12): ?>
				<div class="page_navigation clearfix"></div> 
			<?php endif; ?>
			<?php endif; ?>		
	
		</div>
	    </div>
	
<!-- Just show the top selling items widget if there isn't a query -->
<?php else: ?>
<?php include('tpm_widget_front.tpl.php'); ?>
<?php endif; ?>
</div>