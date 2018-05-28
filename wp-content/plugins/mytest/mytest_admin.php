<?php function test_settings_page() { ?>

  <div class="wrap">
    <h2>Your Plugin Page Title</h2>
    <form method="post" action="options.php">
      <?php settings_fields( 'test-settings-group' ); ?>
      <?php do_settings_sections( 'test-settings-group' ); ?>
      <?php submit_button(); ?>
    </form>
  </div>

<?php } ?>
