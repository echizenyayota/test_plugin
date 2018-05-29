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
  public function add_plugin_page() {
    // 設定メニューページにサブメニューページを追加する
    add_options_page(
        'Settings Admin',
        'My Settings',
        'manage_options',
        'my-setting-admin',
        array( $this, 'create_admin_page' ) // 使用するメソッドを明示する
    );
  }

  // 設定ページの作成
  public function create_admin_page() {
   // my_option_nameをoptionsのプロパティとする
   $this->options = get_option( 'my_option_name' );
   ?>
   <div class="wrap">
       <h2>My Settings</h2>
       <form method="post" action="options.php">
       <?php
           // 設定項目の表示
           settings_fields( 'my_option_group' );
           do_settings_sections( 'my-setting-admin' );
           // 保存して送信
           submit_button();
       ?>
       </form>
   </div>
   <?php
  }

  // ページの初期化
  public function page_init() {
    // 設定項目と無害化用コールバックの登録
    register_setting(
      'my_option_group',
      'my_option_name',
      array( $this, 'sanitize' )
    );
    // 設定をまとめる
    add_settings_section(
      'setting_section_id',
      'My Custom Settings',
      array( $this, 'print_section_info' ),
      'my-setting-admin'
    );
    // 設定項目の追加(ID Number)
    add_settings_field(
      'id_number', // ID
      'ID Number', // Title
      array( $this, 'id_number_callback' ),
      'my-setting-admin',
      'setting_section_id'
    );
    // 設定項目の追加(Title)
    add_settings_field(
      'title',
      'Title',
      array( $this, 'title_callback' ),
      'my-setting-admin',
      'setting_section_id'
    );
  }

  // 各項目のサニタイズをする
  public function sanitize( $input ) {



  }


}

require(__DIR__ . '/MySettingsPage_admin.php');
