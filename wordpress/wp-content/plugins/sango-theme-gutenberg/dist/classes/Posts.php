<?php

namespace SangoBlocks;

class Posts {
  function init() {}
  function get_posts_slider($array_posts, $option) {
    $shown_count = 0;
    $slidesToShow = $option['slidesToShow'];
    $slidesToShowMobile = $option['slidesToShowMobile'];
    $centerMode = var_export($option['centerMode'], true);
    $align = $option['align'];
    $infeed = $option['showInfeed'];
    $arrows = var_export($option['arrows'], true);
    $autoplay = var_export($option['autoplay'], true);
    $autoplay_speed = $option['autoplaySpeed'] * 1000;
    $dots = var_export($option['dots'], true);
    $ad5 = get_theme_mod('ad_infeed5');
    $ad_pos1 = get_theme_mod('ad_infeed_pos1', -1);
    $ad_pos2 = get_theme_mod('ad_infeed_pos2', -1);
    $ad_pos3 = get_theme_mod('ad_infeed_pos3', -1);
    $ad_enabled = get_theme_mod('enable_ad_infeed', false) && $infeed;
    $ad_pos_array = $ad_enabled ? array($ad_pos1, $ad_pos2, $ad_pos3) : array();
    $output = "";

    foreach ($array_posts as $i => $post) {
      if ($ad5 && is_numeric(array_search($i + 1 + $shown_count, $ad_pos_array))) {
        $shown_count++;
        $output .= "<li>$ad5</li>";
      }
      list($url, $title, $_img, $_date) = sng_get_entry_link_data($post->ID, 'thumb-520', true);
      $src = featured_image_src('thumb-520', $post->ID);
      $img = '<img data-lazy="' . $src . '" src="' . $src . '" alt="' . $title . '" width="520" height="300" >';
      ob_start();
      ?>
      <li>
        <a href="<?php echo $url; ?>">
          <figure class="rlmg">
            <?php echo $img; ?>
          </figure>
          <div class="rep"><p><?php echo $title; ?></p></div>
        </a>
      </li>
      <?php
      $output .= ob_get_contents();
      ob_end_clean();
    }
    $output = "<div class=\"related-posts type_a slide block-posts align$align\"><div class=\"js-sng-post-slider\" data-slick='{ \"slidesToShow\": $slidesToShow, \"dots\": $dots, \"arrows\": $arrows, \"autoplay\": $autoplay, \"autoplaySpeed\": $autoplay_speed, \"centerMode\": $centerMode, \"responsive\": [{\"breakpoint\":768,\"settings\":{\"slidesToShow\": $slidesToShowMobile}}]}'>$output</div></div>";
    return $output;
  }
  function get_posts_related($array_posts, $option) {
    $ad4 = get_theme_mod('ad_infeed4');
    $infeed = $option['showInfeed'];
    $ad_pos1 = get_theme_mod('ad_infeed_pos1', -1);
    $ad_pos2 = get_theme_mod('ad_infeed_pos2', -1);
    $ad_pos3 = get_theme_mod('ad_infeed_pos3', -1);
    $ad_enabled = get_theme_mod('enable_ad_infeed', false) && $infeed;
    $ad_pos_array = $ad_enabled ? array($ad_pos1, $ad_pos2, $ad_pos3) : array();
    $shown_count = 0;
    $output = "";

    foreach ($array_posts as $i => $post) {
      if ($ad4 && is_numeric(array_search($i + 1 + $shown_count, $ad_pos_array))) {
        $shown_count++;
        $output .= "<li>$ad4</li>";
      }
      list($url, $title, $img, $date) = sng_get_entry_link_data($post->ID, 'thumb-520', true);
      ob_start();
      ?>
      <li>
        <a href="<?php echo $url; ?>">
          <figure class="rlmg">
            <?php echo $img; ?>
          </figure>
          <div class="rep"><p><?php echo $title; ?></p></div>
        </a>
      </li>
      <?php
      $output .= ob_get_contents();
      ob_end_clean();
    }
    $output = "<div class=\"related-posts type_a slide block-posts\"><ul>$output</ul></div>";
    return $output;
  }
  function get_posts_side($array_posts, $option) {
    $shown_count = 0;
    $show_num = $option['showNum'];
    $show_views = $option['showViews'];
    $heading_title = $option['headingTitle'];
    $heading_icon = $option['headingIcon'];
    $heading_center = $option['headingCenter'];
    $heading_bg_color = $option['headingBgColor'];
    $heading_color = $option['headingColor'];
    $hide_heading = $option['hideHeading'];
    $show_date = $option['showDate'];
    $output = "";

    foreach ($array_posts as $i => $post) {
      list($url, $title, $img, $date) = sng_get_entry_link_data($post->ID, 'thumb-520', true);
      ob_start();
      ?>
      <li>
        <?php
          if ($show_num) {
            $num = $i + 1;
            echo '<span class="rank dfont accent-bc">' . $num . '</span>';
          }
        ?>
        <a href="<?php echo $url; ?>">
          <?php if (has_post_thumbnail($post->ID)): ?>
            <figure class="my-widget__img">
              <img width="160" height="160" src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumb-160'); ?>" alt="<?php echo $post->post_title; ?>" <?php sng_lazy_attr(); ?>>
            </figure>
          <?php elseif(get_option('show_default_thumb_on_widget_posts')) :?>
            <figure class="my-widget__img">
              <img width="160" height="160" src="<?php echo featured_image_src('thumb-160', $post->ID ) ?>" <?php sng_lazy_attr(); ?>>
            </figure>
          <?php endif;?>
          <div class="my-widget__text">
            <?php echo $title; ?>
            <?php if ($show_views) echo '<span class="dfont views">' . get_post_meta($post->ID, 'post_views_count', true) . ' views</span>'; ?>
            <?php if ($show_date) echo '<span class="dfont post-date">' . get_the_time( get_option( 'date_format' ), $post->ID ) . '</span>'; ?>
          </div>
        </a>
      </li>
      <?php
      $output .= ob_get_contents();
      ob_end_clean();
    }
    $additional_class = $show_num ? "show_num" : "";
    $title = "";
    if ($heading_title && !$hide_heading) {
      $center = $heading_center ? "sgb-post-side__title--center" : "";
      $style = $heading_color || $heading_bg_color ? "style=\"background-color: $heading_bg_color; color: $heading_color;\"" : "";
      $icon = $heading_icon ? "<i class=\"$heading_icon\"></i>" : "";
      $title = "<h4 class=\"sgb-post-side__title $center\" $style>${icon}${heading_title}</h4>";
    }
    $output = "<div class=\"widget my_popular_posts $additional_class\">$title<ul class=\"my-widget\">$output</ul></div>";
    return $output;
  }

  function get_block_posts($option) {
    $query = array();
    $number_of_items = $option['number_of_items'];
    $order = $option['order'];
    $order_by = $option['order_by'];
    $skip_items = $option['skip_items'];
    $include_children = $option['include_children'];
    $cats = $option['cats'];
    $tags = $option['tags'];
    $pickups = $option['pickups'];
    $manual_pickup = $option['manual_pickup'];
    $post_type = $option['post_type'];
    if (!$manual_pickup) {
      $query = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'numberposts' => $number_of_items,
        'order' => $order,
      );
      if ($order_by === 'popular') {
        $query = array_merge($query, array(
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
        ));
      } else {
        $query = array_merge($query, array(
          'orderby' => $order_by
        ));
      }
      if ($skip_items > 0) {
        $query = array_merge($query, array(
          'offset' => $skip_items
        ));
      }
      // 子カテゴリを含める（オプション）
      if (count($cats) > 0 && $include_children) {
        foreach ($cats as $parent_id) {
          $child_ids = get_term_children($parent_id, 'category');
          $cats = array_merge($cats, $child_ids);
        }
      }
      if (count($cats) > 0) {
        $query = array_merge($query, array(
          'category__in' => $cats,
        ));
      }
      if (count($tags) > 0) {
        $query = array_merge($query, array(
          'tag__in' => $tags,
        ));
      }
    } else {
      if (!$pickups) {
        return array();
      }
      $query = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'post__in' => $pickups,
        'numberposts' => count($pickups)
      );
    }
		$posts = get_posts($query);
    if ($manual_pickup) {
      // ここでピックアップ順にpostsをソート
      usort($posts, function ($a, $b) use ($pickups) {
        $index_a = array_search(strval($a->ID), $pickups);
        $index_b = array_search(strval($b->ID), $pickups);
        return $index_a >= $index_b ? 1 : -1;
      });
    }
    return $posts;
  }
}
