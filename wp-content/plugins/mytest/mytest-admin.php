<div class="wrap">
  <h2>PayPal Express Checkout</h2>
  <form method="post" action="">
    <table class="form-table">
      <tr>
          <th scope="row">develop enviroment</th>
          <td><p><label><input name="my_sandbox" type="radio" value="0">sandbox</label><br/>
                  <label><input name="my_production" type="radio" value="1"/>production</label></p>
          </td>
      </tr>
      <tr>
          <th scope="row"><label for="my_clienttoken">clientToken</label></th>
          <td><input name="my_clienttoken" type="text" id="my_text" value="" class="regular-text" /></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_color">color</label></th>
              <td>
                  <select name="my_color" id="my_color">
                      <option value="0">gold</option>
                      <option value="1">blue</option>
                      <option value="2">silver</option>
                      <option value="3">black</option>
                  </select>
              </td>
      </tr>
      <tr>
          <th scope="row"><label for="my_size">size</label></th>
              <td>
                  <select name="my_size" id="my_size">
                      <option value="0">small</option>
                      <option value="1">medium</option>
                      <option value="2">large</option>
                      <option value="3">responsive</option>
                  </select>
              </td>
      </tr>
      <tr>
            <th scope="row"><label for="my_amount">amount</label></th>
            <td><input name="my_amount" type="text" id="my_amount" value="" class="" /></td>
      </tr>
      <tr>
          <th scope="row"><label for="my_current">current</label></th>
              <td>
                  <select name="my_current" id="my_current">
                      <option value="0">USD</option>
                      <option value="1">JPY</option>
                  </select>
              </td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
</div>
