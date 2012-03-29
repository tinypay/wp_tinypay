Tinypay is a Wordpress plugin that adds a TinyPay.me Marketplace to your wordpress site. 



=== Installation ===

1. Copy wp_tinypay folder to plugins directory\
2. Go to Admin/Plugins and activate Tinypay plugin
3. Go to Admin/Settings/Marketplace Settings and click Advanced tab
4. Under Tinypay configuration, setup the following
		a. Paypal access token http://developers.tinypay.me/how-to-retrieve-paypal-access-tokens
		b. Tinypay public/private key http://www.mashape.com/apis/Tinypay.me
		c. Embed script (login to tinypay marketplace and go to marketplace settings tab and copy embed shop code)
		d. API error message
5. Enter marketplace id and setup spotlight seller and items
6. Save changes
7. Setup wordpress pages with Tinypay shortcodes below.  For example, create page called Marketplace and enter [page-front]
8. Go marketplace page, you should be able to view Featured Items, Categories, Top Selling Items


=== Tinypay Pages ===

Instead of automatically generating pages, this plugin employs "Shortcodes" for most of its interface. This gives you the flexibility to place things wherever you like.  Shortcodes are snippets [example-example] that can be placed on pages and sidebar widgets to add content provided by this plugin.


Title "Marketplace" 
Permalink: marketplace 
Shortcode: [page-front]

Title: "Shopping"
Permalink: shopping
Parent: marketplace
Shortcode: [tpm-page-category-items]

Title: "Item"
Permalink: item
Parent: marketplace
Shortcode: [tpm-page-item]
(Does not appear in menu)

Title: "Seller"
Permalink: seller
Parent: marketplace
Shortcode: [page-seller-profile]

Title: "Shops"
Permalink: shops
Parent: marketplace
Shortcode: [page-shops]

Title: "Sell"
Permalink: sell
Parent: marketplace
Shortcode: [tpm-connect]

Title: "My shop"
Permalink: my-shop
Parent: marketplace
Shortcode: [tpm-connect]

Title: "Help"
Permalink: help
Parent: marketplace
Shortcode: [tpm-help]

Title: "Search"
Permalink: search
Parent: marketplace
Shortcode: [page-marketplace-search]

Once these pages are created, go to wp-admin/plugins.php and activate the Tinypay marketplace plugin.


==== Best Selling Widget ====


Top items widget:
This widget is availabe at /wp-admin/widgets.php
and can be dragged to the sidebar. Clicking the widget will expose settings to change the number of items to be displayed. 


==== More Shortcodes ====

In addition to these pages, there are a number of shortcodes that can be added to templates:

Search box: [widget-search-box]
This shortcode has already been added to most Creacorner pages, but can be added to other pages by adding the shortcode [widget-search-box]

Marketplace category list: [widget-category]
Marketplace categories can be added to pages by placing the shortcode [widget-category]

Featured seller: [tpm-seller-spotlight]
This will display a link to a particular user's (indicated on the marketplace settings page)


=== Customization ===

Effort was taken to separate the code and the display elements to allow staff to edit pages. In particular, pages with the extension "tpl.php" are MOSTLY html. (Be sure not to edit the PHP tags unless you know what you're doing)

CSS files are included to make customization easy:

tpm_style.css - Styles for most of the elements in the pluging
tpm_forms.css - Extra styles for  forms
validate.css - A few styles for errors that appear on forms

tpm_temp.css – Temporary styles to override some basic Wordpress styles. (Optional, by default this is commented in the tinypay.php plugin init file)


=== Removing the Tinypay plugin ===

To remove the Tinypay plugin just go to the Plugins section of your WP Dashboard and click the "Delete" link. 

Delete or disable the marketplace pages in /wp-admin/edit.php?post_type=page


== Change Log ==

1.0 Initial release
