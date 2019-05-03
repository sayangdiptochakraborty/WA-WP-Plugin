<?php
/**
 * The public-facing functionality of the plugin.
 */

class WA_WP_Public {

  /**
	 * The ID of this plugin.
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

  /**
	 * The version of this plugin.
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

  /**
	 * Initialize the class and set its properties.
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wa-wp-public.css', array(), $this->version, 'all' );
	}


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wa-wp-public.js', array( 'jquery' ), $this->version, false );
	}
	public function wa_wp_widget() {

		// // get data options
		$data = get_option('whatsapp_wpchat');
		$useragent=$_SERVER['HTTP_USER_AGENT'];



		if ($data == 0) {
			// whatsapp api url
			$whatsappApi = 'https://api.whatsapp.com/send?phone=918580964685&text=Hello!';
			$data['cta'] = 'Contact us on Whatsapp';
		} else {
			// whatsapp api url
			$whatsappApi = 'https://api.whatsapp.com/send?phone='.$data['nomorWhatsapp'].'&text='.stripslashes($data['isiChat']);

			/* Get the url of the current site
			 * Get the Title of the current Site
			 * Add them to the text area as specified by user.
			 */
			 
			if($data['p_title']=='Yes')
			{
				global $post;
	 		  $title=get_the_title( $post->ID );
				$whatsappApi.=' - '.$title;
			}
			if($data['p_url']=='Yes')
			{
				global $wp;
	 		  $current_url = home_url(add_query_arg(array($_GET), $wp->request));
				$whatsappApi.=' - '.$current_url;
			}
		}
		include_once( 'partials/wa-wp-public-display.php' );
	}
}
