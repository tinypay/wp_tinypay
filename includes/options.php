<?php
//http://theme.fm/2011/10/how-to-create-tabs-with-the-settings-api-in-wordpress-2590/

class marketplace_settings {
	
	/*
	 * For easier overriding we declared the keys here as well as our tabs array which is populated
	 * when registering settings
	 */
	private $manage_settings_key = 'tinypay_manage';
	private $advanced_settings_key = 'tinypay_advanced_settings';
	private $plugin_options_key = 'marketplace_options';
	private $plugin_settings_tabs = array();
	
	/*
	 * Fired during plugins_loaded (very very early),so don't miss-use this, only actions and filters,
	 * current ones speak for themselves.
	 */
	function __construct() {
		add_action( 'init', array( &$this, 'load_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_manage_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_advanced_settings' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menus' ) );
	}
	
	/*
	 * Loads both the manage and advanced settings from the database into their respective arrays. Uses
	 * array_merge to merge with default values if they're missing.
	 */
	function load_settings() {
		$this->manage_settings = (array) get_option( $this->manage_settings_key );
		$this->advanced_settings = (array) get_option( $this->advanced_settings_key );
		
		// Merge with defaults
		
		$this->advanced_settings = array_merge( array(
			'advanced_option' => 'Advanced value'
		), $this->advanced_settings );
	}
	
	/*
	 * Registers the manage settings via the Settings API, appends the setting to the tabs array of the object.
	 */
	function register_manage_settings() {
		$this->plugin_settings_tabs[$this->manage_settings_key] = 'Manage';
		
		register_setting( $this->manage_settings_key, $this->manage_settings_key );
		add_settings_section( 'section_manage', 'Tinypay Marketplace Management', array( &$this, 'section_manage_desc' ), $this->manage_settings_key );
	}

	/*
	 * The following methods provide descriptions for their respective sections, used as callbacks with add_settings_section
	 */
	function section_manage_desc() { include_once('embed_marketplace.php');}
	function section_advanced_desc() { echo 'Do not change theses settings unless you know what you are doing.'; }
	
	
	/*
	 * Registers the advanced settings and appends the key to the plugin settings tabs array.
	 */
	function register_advanced_settings() {
		$this->plugin_settings_tabs[$this->advanced_settings_key] = 'Advanced';
		
		register_setting( $this->advanced_settings_key, $this->advanced_settings_key );
		add_settings_section( 'section_config', 'Tinypay Configuration', array( &$this, 'section_advanced_desc' ), $this->advanced_settings_key );
		add_settings_field( 'access_token', 'Access Token', array( &$this, 'field_access_token' ), $this->advanced_settings_key, 'section_config' );
		add_settings_field( 'tinypay_public_access_key', 'Tinypay Public Access Key', array( &$this, 'field_tinypay_public_access_key' ), $this->advanced_settings_key, 'section_config' );
		add_settings_field( 'tinypay_private_access_key', 'Tinypay Private Access Key', array( &$this, 'field_tinypay_private_access_key' ), $this->advanced_settings_key, 'section_config' );
		add_settings_field( 'embed_script', 'Embed Script', array( &$this, 'field_embed_script' ), $this->advanced_settings_key, 'section_config' );
		add_settings_field( 'api_error', 'API Error Message', array( &$this, 'field_api_error' ), $this->advanced_settings_key, 'section_config' );
		
		add_settings_section( 'section_marketplace', 'Marketplace Settings', array( &$this, 'section_advanced_desc' ), $this->advanced_settings_key );
		add_settings_field( 'marketplace_id', 'Marketplace ID', array( &$this, 'field_marketplace_id' ), $this->advanced_settings_key, 'section_marketplace' );
		add_settings_field( 'spotlight_seller', 'Spotlight seller', array( &$this, 'field_spotlight_seller' ), $this->advanced_settings_key, 'section_marketplace' );
		add_settings_field( 'spotlight_item_1', 'Spotlight item 1', array( &$this, 'field_spotlight_item_1' ), $this->advanced_settings_key, 'section_marketplace' );
		add_settings_field( 'spotlight_item_2', 'Spotlight item 2', array( &$this, 'field_spotlight_item_2' ), $this->advanced_settings_key, 'section_marketplace' );
		add_settings_field( 'spotlight_item_3', 'Spotlight item 3', array( &$this, 'field_spotlight_item_3' ), $this->advanced_settings_key, 'section_marketplace' );
		add_settings_field( 'spotlight_item_4', 'Spotlight item 4', array( &$this, 'field_spotlight_item_4' ), $this->advanced_settings_key, 'section_marketplace' );

		

	}
	
	/*
	 * Advanced Option field callback, same as above.
	 */
	function field_access_token() {
		?>
		<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[access_token]" value="<?php echo !empty($this->advanced_settings['access_token']) ? esc_attr( $this->advanced_settings['access_token'] ) : ''; ?>" />
		<div>Enter your Paypal <a href="http://developers.tinypay.me/how-to-retrieve-paypal-access-tokens">access token</a> here. </div>
		<?php
	}

	function field_marketplace_id() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[marketplace_id]" value="<?php echo !empty($this->advanced_settings['marketplace_id']) ? esc_attr( $this->advanced_settings['marketplace_id'] ) : ''; ?>" />
		<div>Log in to Tinypay.me and view your marketplace to locate your Marketplace ID. </div>

		<?php
	}
	function field_spotlight_seller() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[spotlight_seller]" value="<?php echo !empty($this->advanced_settings['spotlight_seller']) ? esc_attr( $this->advanced_settings['spotlight_seller'] ) : ''; ?>" />
		<div>Add the ID of the user you'd like to spotlight. </div>

		<?php
	}
	function field_spotlight_item_1() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[spotlight_item_1]" value="<?php echo !empty($this->advanced_settings['spotlight_item_1']) ? esc_attr( $this->advanced_settings['spotlight_item_1'] ) : ''; ?>" />
		<div>Select an item to spotlight. </div>

		<?php
	}
	function field_spotlight_item_2() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[spotlight_item_2]" value="<?php echo !empty($this->advanced_settings['spotlight_item_2']) ? esc_attr( $this->advanced_settings['spotlight_item_2'] ) : ''; ?>" />
		<div>Select an item to spotlight. </div>

		<?php
	}
	function field_spotlight_item_3() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[spotlight_item_3]" value="<?php echo !empty($this->advanced_settings['spotlight_item_3']) ? esc_attr( $this->advanced_settings['spotlight_item_3'] ) : ''; ?>" />
		<div>Select an item to spotlight. </div>

		<?php
	}
	function field_spotlight_item_4() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[spotlight_item_4]" value="<?php echo !empty($this->advanced_settings['spotlight_item_4']) ? esc_attr( $this->advanced_settings['spotlight_item_4'] ) : ''; ?>" />
		<div>Select an item to spotlight. </div>

		<?php
	}
	function field_embed_script() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[embed_script]" value="<?php echo !empty($this->advanced_settings['embed_script']) ? esc_attr( $this->advanced_settings['embed_script'] ) : ''; ?>" />
		<div>Paste marketplace embed script here. It's available when visiting your marketplace options page on TinyPay.me. </div>

		<?php
	}
	function field_api_error() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[api_error]" value="<?php echo !empty($this->advanced_settings['api_error']) ? esc_attr( $this->advanced_settings['api_error'] ) : ''; ?>" />
		<div>Enter the message to display to the user if a request fails. </div>

		<?php
	}
	
	function field_tinypay_public_access_key() {
		?>
		<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[tinypay_public_access_key]" value="<?php echo !empty($this->advanced_settings['tinypay_public_access_key']) ? esc_attr( $this->advanced_settings['tinypay_public_access_key'] ) : ''; ?>" />

		<?php
	}

	function field_tinypay_private_access_key() {
		?>
	<input class="tpm-settings-field" type="text" name="<?php echo $this->advanced_settings_key; ?>[tinypay_private_access_key]" value="<?php echo !empty($this->advanced_settings['tinypay_private_access_key']) ? esc_attr( $this->advanced_settings['tinypay_private_access_key'] ) : ''; ?>" />
		<div>Public and Private API keys are available at <a href="http://www.mashape.com/apis/Tinypay.me">http://www.mashape.com/apis/Tinypay.me</a>. </div>

		<?php
	}

	/*
	 * Called during admin_menu, adds an options page under Settings called My Settings, rendered
	 * using the plugin_options_page method.
	 */
	function add_admin_menus() {
		add_options_page( 'Marketplace Settings', 'Marketplace Settings', 'manage_options', $this->plugin_options_key, array( &$this, 'plugin_options_page' ) );
	}
	
	/*
	 * Plugin Options page rendering goes here, checks for active tab and replaces key with the related
	 * settings key. Uses the plugin_options_tabs method to render the tabs.
	 */
	function plugin_options_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->manage_settings_key;
		?>
		<div class="wrap">
			<?php $this->plugin_options_tabs(); ?>
			<form method="post" action="options.php">
				<?php wp_nonce_field( 'update-options' ); ?>
				<?php settings_fields( $tab ); ?>
				<?php do_settings_sections( $tab ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
	
	/*
	 * Renders our tabs in the plugin options page, walks through the object's tabs array and prints
	 * them one by one. Provides the heading for the plugin_options_page method.
	 */
	function plugin_options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->manage_settings_key;

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';	
		}
		echo '</h2>';
	}
};

// Initialize the settings page
add_action( 'plugins_loaded', create_function( '', '$marketplace_settings = new marketplace_settings;' ) );