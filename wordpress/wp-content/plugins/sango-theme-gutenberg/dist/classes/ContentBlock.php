<?php

namespace SangoBlocks;

class ContentBlock
{

  private $table_name = 'sgb_cb_click';
  private $is_lazy = false;

  public function set_lazy_mode($is_lazy) {
    $this->is_lazy = $is_lazy;
  }

  public function is_lazy_mode() {
    return $this->is_lazy;
  }

  public function init()
  {
    $this->register_content_block();
    if (is_user_logged_in()) {
      $this->add_custom_column();
      add_action('admin_menu', [$this, 'add_admin_menu']);
      add_action('save_post', [$this, 'save_post']);
      $this->register_content_block_as_block_patterns();
    }
    $this->exclude_from_search();
    $this->register_shortcode();
    add_filter( 'sng_content_block', 'do_blocks', 9 );
    add_filter( 'sng_content_block', 'wptexturize' );
    add_filter( 'sng_content_block', 'convert_smilies', 20 );
    add_filter( 'sng_content_block', 'prepend_attachment' );
    add_filter( 'sng_content_block', 'wp_filter_content_tags' );
    add_filter( 'sng_content_block', 'wp_replace_insecure_home_url' );
  }

  public function createDb() {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name(
      cb_click_id BIGINT(20) NOT NULL AUTO_INCREMENT,
      cb_id BIGINT(20) NOT NULL,
      cb_click_date DATETIME NOT NULL,
      cb_click_url VARCHAR(255),
      cb_click_label VARCHAR(255),
      PRIMARY KEY (cb_click_id)
    ) $charset_collate";
    dbDelta($sql);
  }

  // コンテンツブロックの登録
  public function register_content_block()
  {
    register_post_type(
      'content_block',
      array(
        'labels'      => array(
          'name'      => 'コンテンツブロック',
          'all_items' => 'コンテンツブロック一覧',
        ),
        'taxonomies' => array('content_block_category'),
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => true,
        'menu_position' => 20,
        'map_meta_cap' => true,
        'menu_icon'     => App::getUrl('images/content-block.png')
      )
    );
    register_taxonomy(
      'content_block_category',
      'content_block',
      array(
        'hierarchical' => true,
        'query_var' => true,
        'label' => 'カテゴリー',
        "show_in_menu" => true,
        "show_admin_column" => true,
        'singular_label' => 'カテゴリー',
        'show_in_rest' => true,
        // 'public' => true,
        'show_ui' => true
      )
    );
    add_action(
      'restrict_manage_posts',
      function ( $post_type ) {
        if ( 'content_block' === $post_type ) {
          $taxonomy = 'content_block_category';
          wp_dropdown_categories(
            [
              'show_option_all' => 'すべてのカテゴリー',
              'orderby'         => 'name',
              'selected'        => get_query_var( $taxonomy ),
              'hide_empty'      => 0,
              'name'            => $taxonomy,
              'taxonomy'        => $taxonomy,
              'value_field'     => 'slug',
              'hierarchical'    => 1,
            ]
          );
        }
      }
    );

  }

  public function add_admin_menu()
  {
    $sango_logo = '<svg class="sng-edit-logo" width="227" height="344" viewBox="0 0 227 344" fill="none" xmlns="http://www.w3.org/2000/svg" size="24"><path d="M147.145 158.393c-92.383 21.826-111.79 12.003-111.79 12.003s-22.124 19.741-10.4 38.598c11.726 18.857 32.882 16.265 37.705 16.637 4.825.37 56.397-12.852 56.397-12.852s35.709-26.308 61.246-37.288c25.537-10.979 14.093-22.939 14.093-22.939a56.542 56.542 0 00-8.455-.609c-10.634-.002-22.559 2.614-38.796 6.45z" fill="currentColor"></path><path d="M41.137 116.899C15.945 137.731-4.219 156.162.76 186.869c8.452 52.109 62.882 38.726 62.882 38.726-38.82.81-14.354-40.006 80.098-110.104C231.817 50.123 187.41 0 187.41 0 128.406 54.597 41.137 116.899 41.137 116.899zM107.086 225.304c-31.334 35.079-18.86 70.981-18.86 70.981l.088.048c9.797 32.834 43.522 47.157 43.522 47.157-54.126-77.964 97.956-120.143 94.703-164.278-1.872-23.947-34.458-26.967-34.458-26.967 19.599 10.73-40.828 23.612-84.995 73.059z" fill="currentColor"></path><path d="M107.086 225.304c-31.334 35.079-18.86 70.981-18.86 70.981l.088.048c9.797 32.834 43.522 47.157 43.522 47.157-100.023-58.503 51.335-144.158 70.899-158.588 18.062-13.321 8.794-24.473 7.868-25.508-9.276-6.085-18.522-7.149-18.522-7.149 19.599 10.73-40.828 23.612-84.995 73.059z" fill="currentColor"></path></svg>';
    add_meta_box('sng-content-block-setting', "${sango_logo} SANGO設定", [$this, 'add_custom_field'], 'content_block', 'side');
  }

  public function pv_field()
  {
    global $post;
    $meta_value = get_post_meta($post->ID, 'sng_content_block_pv_count', true);
    $data = "内部リンクのクリック率等を計測する";
    $check = ($meta_value) ? "checked" : "";
    echo '<p class="sng-field-title"><img draggable="false" role="img" class="emoji" alt="🔢" src="https://twemoji.maxcdn.com/v/14.0.2/svg/1f522.svg"> PV設定</p>';
    echo '<div style="margin-top: 10px;"><label><input type="checkbox" name="sng_content_block_pv_count" value="' . $data . '" ' . $check . '>' . $data . '</label></div>';
  }

  public function patterns_field()
  {
    global $post;
    $meta_value = get_post_meta($post->ID, 'sng_content_block_disable_block_pattern', true);
    $data = "ブロックパターンとして登録しない";
    $check = ($meta_value) ? "checked" : "";
    echo '<p class="sng-field-title"><img draggable="false" role="img" class="emoji" alt="🧩" src="https://twemoji.maxcdn.com/v/14.0.2/svg/1f9e9.svg"> ブロックパターン設定</p>';
    echo '<div style="margin-top: 10px;"><label><input type="checkbox" name="sng_content_block_disable_block_pattern" value="' . $data . '" ' . $check . '>' . $data . '</label></div>';
  }

  public function add_custom_field()
  {
    $this->pv_field();
    $this->patterns_field();
    $css = <<< EOM
    .interface-complementary-area .sng-field-title,
    .sng-field-title {
      border-bottom: 2px solid #58a9ef;
      font-size: 13px;
      margin-top: 30px !important;
      font-weight: bold;
    }
    .sng-edit-logo {
      width: 16px;
      height: 16px;
      vertical-align: middle;
    }
    #sng-content-block-setting .hndle {
      justify-content: flex-start;
    }
    #sng-content-block-setting .hndle svg {
      margin-right: 5px;
      width: 16px;
      height: 16px;
    }
EOM;
    echo '<style>' . $css . '</style>';
  }

  public function count_click($id, $meta)
  {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;
    $count_key = 'content_block_click_count';
    $num = get_post_meta($id, $count_key, true);
    $wpdb->insert($table_name, array(
      "cb_id" => $id,
      "cb_click_label" => $meta["label"],
      "cb_click_url" => $meta["url"],
      "cb_click_date" => date("Y-m-d H:i:s")
    ));
    if ($num == '') {
      $num = 1;
      delete_post_meta($id, $count_key);
      add_post_meta($id, $count_key, '1');
    } else {
      $num++;
      update_post_meta($id, $count_key, $num);
    }
    return array (
      'count' => $num
    );
  }

  public function count_pv($id)
  {
    $count_key = 'content_block_pv_count';
    $num = get_post_meta($id, $count_key, true);
    if ($num == '') {
      $num = 1;
      delete_post_meta($id, $count_key);
      add_post_meta($id, $count_key, '1');
    } else {
      $num++;
      update_post_meta($id, $count_key, $num);
    }
    return array (
      'count' => $num
    );
  }

  public function save_post($post_id)
  {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $post_id;
    }
    // クイックポストの時は何もしない
    if (isset($_POST['action']) && $_POST['action'] == 'inline-save') {
      return $post_id;
    }
    if (function_exists('sng_update_custom_option_fields')) {
      sng_update_custom_option_fields($post_id, 'sng_content_block_pv_count');
      sng_update_custom_option_fields($post_id, 'sng_content_block_disable_block_pattern');
    }
  }

  public function add_custom_column()
  {
    add_filter('manage_content_block_posts_columns', function($columns) {
      return array_merge($columns, [
        'pv' => __('計測', 'textdomain'),
        'patterns' => __('ブロックパターン', 'textdomain'),
      ]);
    });

    add_action('manage_content_block_posts_custom_column', function($column_key, $post_id) {
      if ($column_key == 'pv') {
        $pv = get_post_meta($post_id, 'content_block_pv_count', true);
        $clicked = get_post_meta($post_id, 'content_block_click_count', true);
        $ratio = $clicked ? round($clicked / $pv * 100, 2) : 0;
        $analyticsEnabled = get_post_meta($post_id, 'sng_content_block_pv_count', true);

        if (!$pv) {
          $pv = 0;
        }

        if (!$clicked) {
          $clicked = 0;
        }

        if (strlen($analyticsEnabled)) {
          echo "
            <div>PV数: $pv</div>
            <div>ボタンクリック数: $clicked</div>
            <div>ボタンクリック率: $ratio %</div>
          ";
        } else {
          echo "無効";
        }

      } else if ($column_key == 'patterns') {
        $patterns = get_post_meta($post_id, 'content-block-disable-patterns', true);
        if (!strlen($patterns)) {
          echo "有効";
        } else {
          echo "無効";
        }
      }
    }, 10, 2);
  }

  public function exclude_from_search()
  {
    global $wp_post_types;
    if ( post_type_exists( 'content_block' ) ) {
      $wp_post_types['content_block']->exclude_from_search = true;
    }
  }

  // 利用可能なコンテンツブロックを取得
  public function available_content_blocks()
  {
    return get_posts(
      array(
        'numberposts' => -1,
        'post_type'   => 'content_block',
        'post_status' => 'publish'
      )
    );
  }

  // 利用可能なコンテンツブロックの(id => 名前)の一覧をオブジェクトの配列で出力
  // 例
  // [ '25' => '自己紹介', '10' => '記事下用' ]
  public function available_content_block_name_list()
  {
      $posts = $this->available_content_blocks();
      if (! $posts) {
          return null;
      }

      $blocks = array();
      foreach ($posts as $post) {
          $blocks[ $post->ID ] = $post->post_title;
      }
      return $blocks;
  }

  public function register_content_block_as_block_patterns()
  {
      $availableBlocks = $this->available_content_blocks();
      if (!function_exists('register_block_pattern_category')) {
        return;
      }
      register_block_pattern_category(
        'sgb/content-block',
        array( 'label' => 'SANGO コンテンツブロック' )
      );

      foreach ($availableBlocks as $block) {
          $content = $block->post_content;
          $title = $block->post_title;
          $id = $block->ID;
          $disable = get_post_meta($block->ID, 'sng_content_block_disable_block_pattern', true);
          if (strlen($disable) > 0) {
            return;
          }
          register_block_pattern(
            'sgb/'.$id,
            array(
              'title' => $title,
              'categories' => array('sgb/content-block'),
              'content' => $content
            )
          );
      }
  }

  public function register_shortcode() {
    add_shortcode('content_block', array($this, 'get_shortcode_content_block'));
  }

  public function get_shortcode_content_block($atts) {
    $class = isset($atts['class']) ? $atts['class'] : '';
    if (!isset($atts['id'])) {
      return '';
    }
    return $this->get_content_block($atts['id'], $class);
  }

  public function get_meta($post_id)
  {
    $pv = get_post_meta($post_id, 'content_block_pv_count', true);
    $clicked = get_post_meta($post_id, 'content_block_click_count', true);
    $analyticsEnabled = get_post_meta($post_id, 'sng_content_block_pv_count', true);
    $ratio = $clicked ? round($clicked / $pv * 100, 2) : 0;
    $edit_url = "post.php?post=$post_id&action=edit";

    return array(
      'pv' => $pv,
      'clicked' => $clicked,
      'ratio' => $ratio,
      'editUrl' => $edit_url,
      'analyticsEnabled' => $analyticsEnabled
    );
  }

  public function get_content_block($id, $class = '')
  {
      if (is_admin()) {
        return '';
      }

      if (!$id) {
          return;
      }
      $the_post = get_post($id);
      // コンテンツブロックが見つからない場合
      if (! $the_post) {
          return '';
      }

      if ($the_post->post_type !== 'content_block') {
        return '';
      }
      // コンテンツブロックが非公開の場合は、ログインユーザーのみ閲覧可
      if (! ('publish' === $the_post->post_status || is_user_logged_in())) {
          return '';
      }
      // phpcs:ignore

      $admin_html = "";

      $edit_url = get_edit_post_link($id);

      $pv_count = get_post_meta($id, 'sng_content_block_pv_count', true);

      $class_name = 'sgb-content-block post-' . $id;

      if ($pv_count && !is_user_logged_in()) {
        $class_name .= ' js-sgb-content-block';
      }

      if ($class) {
        $class_name .= ' ' . $class;
      }

      if (is_user_logged_in()) {
        $admin_html = "<a class=\"sgb-content-block__admin-link\" href=\"$edit_url\" target=\"_blank\">このブロックを編集</a>";
        $class_name .= ' sgb-content-block--admin';
      }

      $content = apply_filters('sng_content_block', $the_post->post_content);
      $content = str_replace('data-src', 'src', $content);

      // 目次ブロックが挿入されないようにする
      $doc = new \DOMDocument();
      @$doc->loadHTML('<?xml encoding="UTF-8">' . $content);
      $xpath = new \DomXPath($doc);
      $toc_class_name='toc';
      $tocs = @$xpath->query("//div[contains(@class, '$toc_class_name')]");
      foreach ($tocs as $toc) {
        @$toc->parentNode->removeChild($toc);
      }
      $content = @$doc->saveHTML();
      $content = str_replace('<?xml encoding="UTF-8">', '', $content);
      $content = str_replace('<html><body>', '', $content);
      $content = str_replace('</body></html>', '', $content);
      $content = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">', '', $content);

      return
      '<div class="'.$class_name.'" data-id="'.$id.'">' .
        $admin_html .
        $content .
      '</div>';
  }
}

