<?php ob_start('ob_gzhandler'); ?>  

	<!-- The shortcode for this page is [page-front] -->

	<!-- Let's add the search box -->
	<?php include('tpm_widget_search_box.tpl.php');?>
	
	<!-- Let's add the banner -->
	<!-- <?php include('tpm_banner.php');?> -->

	<!-- Let's add the featured items box -->
	<?php include('tpm_widget_spotlight_item.tpl.php');?>
	
	<!-- ugly markup -->
	<div class="clearfix"><p></p></div>
	<div class="clearfix"><p></p></div>
	
	<!-- Let's add the category widget -->	
	<?php include('tpm_widget_category.tpl.php');?>	
	
	
	<!-- ugly markup -->
	<div class="clearfix"><p></p></div>
	
	<!-- Let's add the best sellers -->
	<?php include('tpm_widget_front.tpl.php');?>
	

	<!-- <?php include('tpm_widget_forum.tpl.php'); ?> -->
	
	<!-- ugly markup -->
	<div class="clearfix"><p></p></div>
	<div class="clearfix"><p></p></div>
		
<?php ob_end_flush(); ?>  
