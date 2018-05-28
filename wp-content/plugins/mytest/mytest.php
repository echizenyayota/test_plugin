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

// 管理画面にプラグイン用カスタムメニューの追加
function test_create_menu() {
	//プラグイン設定ページの追加
	add_menu_page('TEST Plugin Settings', 'TEST Settings', 'administrator', __FILE__, 'test_settings_page',plugins_url('/images/icon.png', __FILE__));
	// 独自関数をコールバック関数とする
	add_action( 'admin_init', 'register_mysettings' );
}
add_action('admin_menu', 'test_create_menu');
