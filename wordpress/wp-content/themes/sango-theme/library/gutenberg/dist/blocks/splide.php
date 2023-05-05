<?php

use SangoBlocks\App;

function sng_splide_slider_render( $block_content, $block ) {
  if (is_admin()) {
    return;
  }
  wp_enqueue_style('splide-style', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css');
  wp_enqueue_script(
    'sng-splide', // Handle.
    'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js'
  );
  $dots = isset($block['attrs']['dots']) ? var_export($block['attrs']['dots'], true) : 'true';
  $infinite = isset($block['attrs']['infinite']) ? var_export($block['attrs']['infinite'], true) : 'true';
  $slidesToShow = isset($block['attrs']['slidesToShow']) ? $block['attrs']['slidesToShow'] : 1;
  $slidesToScroll = isset($block['attrs']['slidesToScroll']) ? $block['attrs']['slidesToScroll'] : 1;
  $slidesToShowMobile = isset($block['attrs']['slidesToShowMobile']) ? $block['attrs']['slidesToShowMobile'] : 1;
  $slidesToScrollMobile = isset($block['attrs']['slidesToScrollMobile']) ? $block['attrs']['slidesToScrollMobile'] : 1;
  $autoplay = isset($block['attrs']['autoplay']) ? var_export($block['attrs']['autoplay'], true) : 'false';
  $arrows = isset($block['attrs']['arrows']) ? var_export($block['attrs']['arrows'], true) : 'true';
  $autoplaySpeed = isset($block['attrs']['autoplaySpeed']) ? $block['attrs']['autoplaySpeed'] * 1000 : 3000;
  $centerMode = isset($block['attrs']['centerMode']) ? $block['attrs']['centerMode'] : '';
  $padding = $centerMode ? "padding: '3rem', gap: '1rem'," : '';

  $type = $infinite ? 'loop' : 'slide';
  $id = wp_unique_id("sgb-splide-id");

  $js = <<< EOM
  sng.domReady(() => {
    const splide = new Splide("#$id .js-sng-splide", {
      $padding
      type: '$type',
      autoplay: $autoplay,
      arrows: $arrows,
      pagination: $dots,
      perPage: $slidesToShow,
      perMove: $slidesToScroll,
      interval: $autoplaySpeed,
      breakpoints: {
        768: {
          perPage: $slidesToShowMobile,
          perMove: $slidesToScrollMobile,
        }
      }
    })
    splide.mount();
  });
EOM;

  App::get('js')->register($id, $js, false);
  $block_content = "<div id=\"$id\">$block_content</div>";
  return $block_content;
}

add_filter( 'render_block_sgb/splide', 'sng_splide_slider_render', 10, 2 );
