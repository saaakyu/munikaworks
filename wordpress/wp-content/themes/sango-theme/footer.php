<?php

use SANGO\App;

$should_show_footer = App::get('layout')->should_render_footer();
if ($should_show_footer) {
  App::get('layout')->render_footer();
}
?>
</div> <!-- id="container" -->
<?php footer_nav_menu(); // モバイルフッターメニュー ?>
<?php go_top_btn(); // トップへ戻るボタン ?>
<?php wp_footer(); ?>
</body>
</html>
