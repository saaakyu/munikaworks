<?php

use SANGO\App;

$contentBlockId = get_theme_mod('sng_notfound_content_block', false);
$notfound_image_option = get_option('image_404_thumbnail');
$default_notfound_image = get_template_directory_uri() . '/library/images/notfound.jpg';
$notfound_image = $notfound_image_option ? esc_url_raw(wp_get_attachment_url($notfound_image_option)) : $default_notfound_image;
$notfound_title = apply_filters('sng_notfound_title', '404エラー');
$notfound_title_eng = apply_filters('sng_notfound_title_eng', 'Error');
$notfound_posts_title = apply_filters('sng_notfound_posts_title', '記事が見つかりません');
$image_data  = wp_get_attachment_metadata($notfound_image_option);
$image_size = "";
if ($image_data) {
  $width = $image_data['width'];
  $height = $image_data['height'];
  $image_size = " width=\"${width}\" height=\"${height}\"";
}
?>

<div class="center">
  <span class="ttl__en">
    <?php
    if (is_search() || is_archive()) {
      echo $notfound_posts_title_eng;
    } else {
      echo $notfound_title_eng;
    } ?>
  </span>

  <h2 class="ttl__jp pink">
    <?php
    if (is_search() || is_archive()) {
      echo $notfound_posts_title;
    } else {
      echo $notfound_title;
    } ?>
  </h2>
</div>

<article class="notfound">
  <!-- <div class="nofound-img"><img src="<?php echo apply_filters('sng_notfound_image', $notfound_image) ?>"<?php echo $image_size ?>> -->
  <?php if (is_404()) {
  ?>
    <h2 class="nofound_txt blue center">お探しのページが<br class="view_sp">見つかりません</h2>
  <?php }
  ?>
  </div>
  <div class="nofound-contents">
    <?php
    if ($contentBlockId) {
      $contentBlock = App::get('content-block');
      $html = $contentBlock->get_content_block($contentBlockId);
      echo $html;
    } else { ?>
      <?php if (is_search()) : ?>
        <p class="txt"><?php echo apply_filters('sng_notfound_search', '指定されたキーワードでは記事が見つかりませんでした。別のキーワード、もしくはカテゴリーから記事をお探しください。') ?></p>
      <?php elseif (is_archive()) : ?>
        <p class="txt"><?php echo apply_filters('sng_notfound_archive', 'まだ記事が投稿されていません。') ?></p>
      <?php else : ?>
        <p class="txt"><?php echo apply_filters('sng_notfound_contents', 'お探しのページは一時的にアクセスができない状況にあるか、移動もしくは削除された可能性があります。<br>お手数ではございますが、トップページにて目的のページをお探しください。') ?></p>
      <?php endif; ?>
      <?php //get_search_form(); 
      ?>
      <!-- <p>以下のカテゴリー一覧から記事を探すこともできます。</p>
    <div class="withtag_list">
      <span>カテゴリー</span>
      <ul>
        <?php wp_list_categories('depth=2&title_li='); ?>
      </ul>
    </div> -->
      <div class="pink_btn"><a href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a></div>

    <?php } ?>
  </div>
</article>