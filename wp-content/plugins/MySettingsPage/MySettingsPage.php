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

  public function sanitize( $input ) {
    $new_input = array();
    // 入力値を絶対値の数値にする
    if( isset( $input['id_number'] ) ){
      $new_input['id_number'] = absint( $input['id_number'] );
    }
    // 特殊文字のサニタイズ
    if( isset( $input['title'] ) ){
      $new_input['title'] = sanitize_text_field( $input['title'] );
    }
    // 配列値で結果を返す
    return $new_input;
  }

  public function print_section_info() {
    // 文字列の出力
    print 'Enter your settings below:';
  }

  public function id_number_callback() {
    // ID用のinputタグを出力する
    printf(
        '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
        isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
    );
  }

  public function title_callback() {
    // Title用のinputタグを出力する
    printf(
        '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
        isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
    );
  }

}

require(__DIR__ . '/MySettingsPage_admin.php');
