<?php
/**
 * The admin-specific functionality of the plugin.
 */
class WA_WP_Admin {
	/**
	 * The ID of this plugin.
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wa-wp-admin.css', array(), $this->version, 'all' );
	}
	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wa-wp-admin.js', array( 'jquery' ), $this->version, false );
	}
	public function admin_init_register() {
		register_setting( 'whatsapp-wpchat-group', 'whatsapp_wpchat' );
	}
	public function wa_wp_options_page()
	{
	    add_submenu_page(
	        'tools.php',
	        'WhatsApp WP Plugin',
	        'WA-WP Plugin',
	        'manage_options',
	        'wa-wp',
	        array( $this, 'display_plugin_setup_page' )
	    );
	}
	public function display_plugin_setup_page() {
		// get option
		$data = get_option('whatsapp_wpchat');

		// show form on admin page
		include_once( 'partials/wa-wp-admin-display.php' );
	}
}
