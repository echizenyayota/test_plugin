<?php
/**
 * @package express
 */
/*
Plugin Name: mytest
Plugin URI: https://example.com
Description: mytest
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: mytest
*/

// create custom plugin settings menu
function baw_create_menu() {

	//create new top-level menu
	add_menu_page('BAW Plugin Settings', 'BAW Settings', 'administrator', __FILE__, 'baw_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}
add_action('admin_menu', 'baw_create_menu');


function register_mysettings() {
	//register our settings
	register_setting( 'baw-settings-group', 'new_option_name' );
	register_setting( 'baw-settings-group', 'some_other_option' );
	register_setting( 'baw-settings-group', 'option_etc' );
}

require_once(__DIR__ . '/mytest_admin.php');
