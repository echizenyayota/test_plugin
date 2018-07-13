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
    // my_option_nameをoptionsのプロパティとする →　option_nameカラムにmy_option_nameが入力される
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

  // 入力項目のサニタイズ
  public function sanitize( $input ) {
    $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );
        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
  }

  // 入力を促す文字列の出力
  public function print_section_info() {
    print 'Enter your settings below:';
  }

  // IDの入力
  public function id_number_callback() {
    printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

  // タイトルの入力
  public function title_callback() {
    printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
  }

}

require(__DIR__ . '/MySettingsPage_admin.php');
