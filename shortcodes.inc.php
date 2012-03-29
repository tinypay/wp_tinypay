<?php

//DEVNOTE Fake ads for sidbar - Delete before install

function fakeads($atts, $content = null){
include ('fakeads.php');
}
add_shortcode("fakeads", "fakeads");


//Shortcodes

function tpm_item_spotlight($atts, $content = null){
include ('tpm_page_spotlight_item.tpl.php');
}
add_shortcode("item-spotlight", "tpm_item_spotlight");


function tpm_seller_spotlight($atts, $content = null){
include ('tpm_widget_seller_spotlight.tpl.php');
}
add_shortcode("tpm-seller-spotlight", "tpm_seller_spotlight");


function page_front($atts, $content = null){
include ('tpm_page_front.tpl.php');
}
add_shortcode("page-front", "page_front");


function tpm_help($atts, $content = null){
include ('tpm_page_help.tpl.php');
}
add_shortcode("tpm-help", "tpm_help");


function tpm_page_category_items($atts, $content = null){
include ('tpm_page_category_items.tpl.php');
}
add_shortcode("tpm-page-category-items", "tpm_page_category_items");


function tpm_page_item($atts, $content = null){
include ('tpm_page_item.tpl.php');
}
add_shortcode("tpm-page-item", "tpm_page_item");


function page_seller_profile($atts, $content = null){
include ('tpm_page_seller_profile.tpl.php');
}
add_shortcode("page-seller-profile", "page_seller_profile");


function widget_seller_profile($atts, $content = null){
include ('tpm_widget_seller_profile.tpl.php');
}
add_shortcode("widget-seller-profile", "widget_seller_profile");


function tpm_page_marketplace_search($atts, $content = null){
include ('tpm_page_search.tpl.php');
}
add_shortcode("page-marketplace-search", "tpm_page_marketplace_search");


function widget_search_box($atts, $content = null){
include ('tpm_widget_search_box.tpl.php');
}
add_shortcode("widget-search-box", "widget_search_box");


function tpm_widget_sidebar($atts, $content = null){
include ('tpm_widget_sidebar.tpl.php');
}
add_shortcode("tpm-widget-sidebar", "tpm_widget_sidebar");

function tpm_widget_forum($atts, $content = null){
include ('tpm_widget_forum.tpl.php');
}
add_shortcode("tpm-widget-forum", "tpm_widget_forum");


function tpm_widget_category($atts, $content = null){
include ('tpm_widget_category.tpl.php');
}
add_shortcode("widget-category", "tpm_widget_category");


function page_shops($atts, $content = null){
include ('tpm_page_shops.tpl.php');
update_option('marketplace/shops','marketplace-shops');
}
add_shortcode("page-shops", "page_shops");


function tpm_connect($atts, $content = null){
include ('tpm_connect.tpl.php');
}
add_shortcode("tpm-connect", "tpm_connect");


?>