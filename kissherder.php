<?php
/**
 * @package KissHerder
 * @version 1.1
 */
/*
Plugin Name: KissHerder
Plugin URI: http://grasshopperherder.com/
Description: Easily add KissMetrics code and user tracking
Author: Tristan Kromer, Peter Backx
Version: 1.1
Author URI: http://grasshopperherder.com/
License: GPLv2

Copyright 2012 Tristan Kromer, Peter Backx (email : tristan@grasshopperherder.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

if ( !defined('KISSHERDER_FEEDBACK_LINK') ) {
	define('KISSHERDER_FEEDBACK_LINK', 'mailto:tristan@grasshopperherder.com');
}

if ( !is_admin() ) {
	$options = get_option('kissherder_options');
	$api_key = $options['api_key'];
	if(!empty($api_key)) {
		require_once( plugin_dir_path(__FILE__).'/includes/user.php' );
		add_action('wp_head', 'kissherder_display');
		add_action('wp_enqueue_scripts', 'kissherder_javascript');
		if($options['show_footer']) {
			add_action('wp_footer', 'kissherder_powered_by');
		}
	}
}

/**
 * plugin activation code
 */
function kissherder_create_options() {
    $options = array(
      'api_key' => '',
      'subscribe_event'   => 'Subscribe RSS',
      'subscribe_options' => '',
      'comment_event'   => 'Comment form submitted',
      'comment_options' => '',
      'read_event'   => 'Read article',
      'read_options' => '',
      'show_footer' => 'on',
    );
    $dbOptions = get_option("kissherder_options");
    if(!empty($dbOptions)) {
      foreach($dbOptions as $key => $option) {
        $options[$key] = $option;
      }
    }
    update_option("kissherder_options", $options);
}

register_activation_hook(__FILE__, 'kissherder_create_options');

/**
 * admin code
 */
if ( is_admin() ) {
	require_once(plugin_dir_path(__FILE__).'/includes/admin.php' );
	add_action('admin_menu', 'kissherder_admin_menu');
	add_action('admin_init', 'kissherder_admin_init');
}

?>
