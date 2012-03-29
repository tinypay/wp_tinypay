<?php include('includes/getMarketplaceSearch.inc.php');?>


<!-- The shortcode for this page is [tpm-widget-marketplace-search] -->

<div id="tpm-search-wrapper">
	<div id="tpm_search">
		<form id="tpm_search_form" method="GET" action="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SEARCH; ?>/" autocomplete="off">
			<input id="tpm_search_input" type="text" name="search" value="" title="What are you looking for?" autocomplete="off"> 
			<input id="tpm_search_submit" type="submit" value="" ></input>
		</form>
	</div>

	<div class="clearfix">
		<div id="tpm_sell_button"><a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SELL; ?>">Start selling</a></div>
	</div>
</div>