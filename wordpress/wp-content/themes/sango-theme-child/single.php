<?php get_header(); ?>


<!--20230509_ここから記述追加-->
<?php
// 現在のカテゴリーのデータを取得
$cat = get_the_category();
$cat = $cat[0];

// 親カテゴリーがあるか判定
if ( $cat->parent ) { // $cat->category_parentでもok
  // 親カテゴリーのデータを取得
  $parent_cat = get_category( $cat->parent );

}
?>

<div class="wrp_title">
  <div class="con_title">
    <!-- 親カテゴリーがある場合は親を表示、そうでない場合はcカテゴリーを表示 -->
    <span class="ttl__en"><?php if ( $cat->parent ) { echo $parent_cat->slug; } else { echo $cat->slug; }?></span>
    <h2 class="page-title ttl__jp"><?php if ( $cat->parent ) { echo $parent_cat->name; } else { echo $cat->name; }?></h2>
  </div><!--con_title-->
</div><!--wrp_title-->
<!--ここまで記述追加-->

  <div id="content"<?php column_class();?>>
    <div id="inner-content" class="wrap cf">
      <main id="main">
        <?php if (have_posts()) :
          while (have_posts()) :
          the_post();
        ?>
          <article id="entry" <?php post_class(); ?>>
            <?php
              get_template_part('parts/single/entry-header');//タイトルまわり
              get_template_part('parts/single/entry-content');//本文まわり
              // 記事フッター
              get_template_part('parts/single/entry-footer');
              // アクセス数をカウント：人気記事ウィジェットのため
              sng_set_post_views(get_the_ID());
              comments_template(); // コメント
              insert_json_ld(); // 構造化データ
            ?>
            </article>
            <?php get_template_part('parts/single/prev-next-entry'); // 前後の記事へのリンク ?>
          <?php endwhile; ?>
        <?php else : ?>
          <?php get_template_part('content', 'not-found'); // コンテンツが見つからない場合 ?>
        <?php endif; ?>
      </main>
      <?php get_sidebar();?>
    </div>
  </div>
<?php get_footer(); ?>