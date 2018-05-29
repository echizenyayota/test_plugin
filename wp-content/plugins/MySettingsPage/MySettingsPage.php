<?php
/**
 * @package express
 */
/*
Plugin Name: MySettingsPage
Plugin URI: https://example.com
Description: MySettingsPage
Version: 0.0.0
Author: echizenya
Author URI: https://e-yota.com
License: GPLv2 or later
Text Domain: mytest
*/
class MySettingsPage {

  // プロパティ（フィールドコールバックで使用される値を保持）
  private $options;

  // コンストラクタで初期化（クラス内でadd_actionを使う場合は、array($this, ‘メソッド’)として使用するメソッドを明示しなければならない）
  public function __construct() {
    add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'page_init' ) );
  }

  // オプションページの追加
  public function add_plugin_page()　{
   // This page will be under "Settings"
   add_options_page(
       'Settings Admin',
       'My Settings',
       'manage_options',
       'my-setting-admin',
       array( $this, 'create_admin_page' )
   );
  }


}

require(__DIR__ . 'MySettingsPage_admin.php');
