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

}
add_action('admin_menu', 'test_create_menu');
