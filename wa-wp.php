<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/sayangdiptochakraborty
 * @since             1.0.0
 * @package           WA-WP
 *
 * @wordpress-plugin
 * Plugin Name:       WhatsApp WordPress Plugin
 * Description:       A simple click to chat button WhatsApp plugin. The WhatsApp Icon with or without text can be placed on any 4 corners of the screen. When clicked it will redirect to WhatsApp Web when the user is on PC, or WhatsApp app otherwise. Custom text message including the page title and page url from where the button was clicked can also be included.
 * Version:           1.0.0
 * Author:            sayangdiptochakraborty
 * Author URI:        https://github.com/sayangdiptochakraborty
 * License:           GPL V2 or later
 */

 /*
 Copyright (C) 2019  Sayangdipto Chakraborty

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

 // If this file is called directly, abort.
 if ( ! defined( 'WPINC' ) ) {
 	die;
 }

define('WHATSAPP_WPPLUGIN','1.0.0');

/*
 * The code that runs during plugin activation
 * This function is included under includes/class-wa-wp-activator.php
 */

function activate_wa_wp()
{
 require_once plugin_dir_path(__FILE__).'includes/class-wa-wp-activator.php';
 WA_WP_Activator::activate();
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'configure_action_link' );

function configure_action_link( $links ) {
	$configuration_link = '<a href="' . admin_url( 'tools.php?page=wa-wp' ) . '">' . __( 'Configure', 'wa-wp' ) . '</a>';
	return array_merge( $links, array( $configuration_link ) );
}
 /*
  * The code that runs during plugin activation
  * This function is included under includes/class-wa-wp-deactivator.php
  */

 function deactivate_wa_wp()
 {
   require_once plugin_dir_path(__FILE__).'includes/class-wa-wp-deactivator.php';
   WA_WP_Deactivator::deactivate();
 }

register_activation_hook( __FILE__, 'activate_wa_wp' );
register_deactivation_hook( __FILE__, 'deactivate_wa_wp' );

require plugin_dir_path( __FILE__ ) . 'includes/class-wa-wp.php';

function run_wa_wp() {
	$plugin = new WA_WP();
	$plugin->run();
}
run_wa_wp();
