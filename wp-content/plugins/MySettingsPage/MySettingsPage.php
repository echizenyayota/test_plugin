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

  // プロパティ
  private $options;

  // コンストラクタ
  public function __construct() {
    add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'page_init' ) );
  }

  // 設定メニューページにサブメニューページを追加する
  public function add_plugin_page() {
    add_options_page(
        'Settings Admin',
        'My Settings',
        'manage_options',
        'my-setting-admin',
        array( $this, 'create_admin_page' ) // 使用するメソッドを明示する
    );
  }

  // 設定ページの表示
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

  // 設定項目の初期化
  public function page_init() {
    register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'id_number', // ID
            'ID Number', // Title
            array( $this, 'id_number_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'title',
            'Title',
            array( $this, 'title_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );      
  }



}

require(__DIR__ . '/MySettingsPage_admin.php');
