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

  // 初期化（コンストラクタ。クラス内でadd_actionを使う場合は、array($this, ‘メソッド’)とする）
  public function __construct() {
    add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'page_init' ) );
  }


}

require(__DIR__ . 'MySettingsPage_admin.php');
