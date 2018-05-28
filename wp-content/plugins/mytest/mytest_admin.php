<?php function test_settings_page() { ?>

  <div class="wrap">
    <h2>Your Plugin Page Title</h2>
    <form method="post" action="options.php">
      <?php settings_fields( 'test-settings-group' ); ?>
      <?php do_settings_sections( 'test-settings-group' ); ?>
      <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php get_option('new_option_name'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php get_option('some_other_option'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php get_option('option_etc'); ?>" /></td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>

<?php } ?>
