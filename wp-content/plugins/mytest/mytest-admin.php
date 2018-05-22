<?php
// メニューで表示されるページの内容を返す関数
function mt_options_page() {
  // POSTデータがあれば設定を更新
  if (isset($_POST['my_text'])) {
    // 更新内容　https://codex.wordpress.org/Function_Reference/update_option#Example
    update_option('my_text', wp_unslash($_POST['my_text']));
    update_option('my_textarea', wp_unslash($_POST['my_textarea']));
    update_option('my_radio', $_POST['my_radio']);
    update_option('my_select', $_POST['my_select']);
    // チェックボックスはチェックされないとキーも受け取れないので、ない時は0にする
    $my_checkbox = isset($_POST['my_checkbox']) ? 1 : 0;
    update_option('my_checkbox', $my_checkbox);
  }
}
?>

<div class="wrap">
<h2>設定サンプル</h2>
<form method="post" action="">
  <table class="form-table">
      <tr>
          <th scope="row"><label for="my_text">マイテキスト</label></th>
          <td><input name="my_text" type="text" id="my_text" value="<?php form_option('my_text'); ?>" class="regular-text" /></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_textarea">マイテキストボックス</label></th>
          <td><textarea name="my_textarea" id="my_textarea" class="large-text code" rows="5" <?php echo esc_textarea(get_option('my_textarea')); ?>></textarea></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_checkbox">マイチェックボックス</label></th>
          <td><label><input name="my_checkbox" type="checkbox" id="my_checkbox" value="1" <?php checked( 1, get_option('my_checkbox')); ?> /> チェック</label></td>
      </tr>
      <tr>
          <th scope="row">マイラジオ</th>
          <td><p><label><input name="my_radio" type="radio" value="0" <?php checked( 0, get_option( 'my_radio' ) ); ?>	/>ラジオ0</label><br/>
                  <label><input name="my_radio" type="radio" value="1" <?php checked( 0, get_option( 'my_radio' ) ); ?>	/>ラジオ1</label></p>
          </td>
      </tr>
      <tr>
          <th scope="row"><label for="my_select">マイセレクト</label></th>
          <td>
              <select name="my_select" id="my_select">
                  <option value="0" <?php selected( 0, get_option( 'my_select' ) ); ?> >セレクト0</option>
                  <option value="1" <?php selected( 1, get_option( 'my_select' ) ); ?> >セレクト1</option>
              </select>
          </td>
      </tr>
  </table>
  <?php submit_button(); ?>
</form>
</div>
