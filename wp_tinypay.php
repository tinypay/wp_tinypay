<?php
/*
	Plugin Name:  Tinypay
	Plugin URI:   http://www.tinypay.me/
	Description:  A custom-built plugin to enable a TinyPay.me marketplace on your wordpress site.
	Version:      1.0
	Author:       TinyPay Staff
	Author URI:   http://www.tinypay.me
	Text Domain:  tinypay
    Copyright 2011  TinyPay.me  (email : db@tinypay.me)
*/

wp_enqueue_script('jquery');

require_once('tinypay_config.php');
require_once('shortcodes.inc.php');
require_once('includes/functions.php');

//DEVNOTE: Enable options and warn if they are not filled in
require_once('includes/options.php');

wp_enqueue_style('forms', plugins_url( 'css/tpm_forms.css', __FILE__ ));
wp_enqueue_style('shared-style', plugins_url( 'css/tpm_style.css', __FILE__ ));

//Adding shared CSS and Javascript
wp_enqueue_script('pagination', plugins_url( 'js/jquery.pajinate.min.js', __FILE__ ),'jquery');
wp_enqueue_script('tooltip', plugins_url( 'js/tooltip.jquery.js', __FILE__ ),'jquery');
wp_enqueue_script('popup', plugins_url( 'js/jquery.popupWindow.js', __FILE__ ),'jquery');
wp_enqueue_script('validation', plugins_url( 'js/tpm_validation.js', __FILE__ ),'jquery');
wp_enqueue_script('currency', plugins_url( 'js/jquery.formatCurrency.min.js', __FILE__ ),'jquery');
wp_enqueue_script('form', plugins_url( 'js/jquery.form.js', __FILE__ ),'jquery');
wp_enqueue_script('slides', plugins_url( 'js/slides.min.jquery.js', __FILE__ ),'jquery');
wp_enqueue_script('clickable', plugins_url( 'js/jquery.clickable.js', __FILE__ ),'jquery');
wp_enqueue_script('shared-script', plugins_url( 'js/tpm_custom.js', __FILE__ ),'jquery');
wp_enqueue_script('addthis', 'http://s7.addthis.com/js/250/addthis_widget.js#pubid=tinypay');


//DEVNOTE: Show errors -- disable on production
ini_set('display_errors', true);
error_reporting(E_ALL | E_NOTICE);

register_activation_hook(__FILE__, 'create_wordpress_pages');

//Enables shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

//Adds a customizable sidebar widget -- Widgets can also be added with a shortcode
include_once('tpm_widget_sidebar.inc.php');

//Adds facebook open graph meta tags to item pages

add_action('wp_head', 'add_og_meta_tags');
	
function add_og_meta_tags() {
if (isset ($_GET['item'])){
include('includes/getItem.inc.php');
	if (isset($marketplace_item) AND !empty($marketplace_item) AND isset($marketplace_item->item_id)){
		
		echo '<meta property="fb:app_id" content="107555272612415"/> 
			<meta property="fb:admins" content="1079422871,100000946509627,813122365,557191973,1506341156"/> 
			<meta property="og:site_name" content="tinypay.me"/> 
			<meta property="og:type" content="product"/> 
			<meta property="og:title" content="'.$marketplace_item->title.'"/> 
			<meta property="og:description" content="'.$marketplace_item->description.'"/> 
			<meta property="og:url" content="'.bloginfo('url').'/item/?item='.$marketplace_item->item_id.'"/>'. 
			(!empty($marketplace_item->images) ? '<meta property="og:image" content="'.$marketplace_item->images[0]->xsmall.'"/>' : ''). 
			'<meta property="og:latitude" content="0"/>';	
		}			
	}
}
?>