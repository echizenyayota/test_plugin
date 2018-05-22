<div class="wrap">
<h2>設定サンプル</h2>
<form method="post" action="">
  <table class="form-table">
      <tr>
          <th scope="row"><label for="my_text">マイテキスト</label></th>
          <td><input name="my_text" type="text" id="my_text" value="" class="regular-text" /></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_textarea">マイテキストボックス</label></th>
          <td><textarea name="my_textarea" id="my_textarea" class="large-text code" rows="5"></textarea></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_checkbox">マイチェックボックス</label></th>
          <td><label><input name="my_checkbox" type="checkbox" id="my_checkbox" value="1"> チェック</label></td>
      </tr>
      <tr>
          <th scope="row">マイラジオ</th>
          <td><p><label><input name="my_radio" type="radio" value="0">ラジオ0</label><br/>
                  <label><input name="my_radio" type="radio" value="1">ラジオ1</label></p>
          </td>
      </tr>
      <tr>
          <th scope="row"><label for="my_select">マイセレクト</label></th>
          <td>
              <select name="my_select" id="my_select">
                  <option value="0">セレクト0</option>
                  <option value="1">セレクト1</option>
              </select>
          </td>
      </tr>
  </table>
</form>
</div>
