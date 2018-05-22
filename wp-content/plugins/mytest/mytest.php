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
function register_my_custom_menu_page() {
	add_menu_page( 'test plugin', 'test plugin', 'administrator', 'mytest/mytest-admin.php', '', plugins_url( 'mytest/images/ecoteki.png' ), 66 );
}

add_action( 'admin_menu', 'register_my_custom_menu_page' );
