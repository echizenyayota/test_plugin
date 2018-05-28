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

// コールバック関数
function register_mysettings() {
	register_setting( 'test-settings-group', 'new_option_name' );
	register_setting( 'test-settings-group', 'some_other_option' );
	register_setting( 'test-settings-group', 'option_etc' );
}

// 管理画面ファイルの読み込み
require_once(__DIR__ . '/mytest_admin.php');
