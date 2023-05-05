<?php

use SangoBlocks\App;

register_block_type('sgb/posts', array(
	'editor_script' => 'sgb',
	'attributes' => array(
		'layoutName' => array(
			'type' => 'string',
			'default' => 'card'
		),
		'numberOfItems' => array(
			'type'    => 'number',
			'default' => 6,
		),
    'skipItems' => array(
      'type' => 'number',
      'default' => 0,
    ),
		'orderBy' => array(
			'type'    => 'string',
			'default' => 'date',
		),
		'order' => array(
			'type'    => 'string',
			'default' => 'DESC',
		),
		'showSideDate' => array(
			'type' => 'boolean',
			'default' => false,
		),
		'countSpan' => array(
			'type'    => 'number',
			'default' => 7,
		),
		'categories' => array(
			'type'     => 'array',
			'default'  => array(),
			'items' => array(
				'type' => 'number'
			)
		),
		'includeChildren' => array(
			'type'     => 'boolean',
			'default'  => false,
		),
		'tags' => array(
			'type' => 'array',
			'default' => array(),
			'items' => array(
				'type' => 'number'
			)
    ),
    'css' => array(
      'type' => 'string',
      'default' => '',
    ),
    'js' => array(
      'type' => 'string',
      'default' => '',
    ),
    'scopedCSS' => array(
      'type' => 'string',
      'default' => '',
    ),
    'customControls' => array(
      'type' => 'array',
      'default' => [],
    ),
    'blockId' => array(
      'type' => 'string',
      'default' => '',
    ),
    'showInfeed' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'manualPickup' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'pickups' => array(
      'type' => 'array',
      'default' => array()
    ),
    'slidesToShow' => array(
      'type' => 'number',
      'default' => 3,
    ),
    'slidesToShowMobile' => array(
      'type' => 'number',
      'default' => 3,
    ),
    'dots' => array(
      'type' => 'boolean',
      'default' => true,
    ),
    'arrows' => array(
      'type' => 'boolean',
      'default' => true,
    ),
    'align' => array(
      'type' => 'string',
      'default' => 'wide',
    ),
    'centerMode' => array(
      'type' => 'boolean',
      'default' => true,
    ),
    'autoplay' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'autoplaySpeed' => array(
      'type' => 'number',
      'default' => 3,
    ),
    'postType' => array(
      'type' => 'string',
      'default' => 'post'
    ),
    'showNum' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'showViews' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'headingTitle' => array(
      'type' => 'string',
      'default' => '',
    ),
    'headingIcon' => array(
      'type' => 'string',
      'default' => '',
    ),
    'headingBgColor' => array(
      'type' => 'string',
      'default' => '',
    ),
    'headingColor' => array(
      'type' => 'string',
      'default' => '',
    ),
    'hideHeading' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'headingCenter' => array(
      'type' => 'boolean',
      'default' => false,
    ),
    'spaceBottom' => array(
      'type' => 'number',
      'default' => 0
    ),
    'mobileSpaceBottom' => array(
      'type' => 'number',
      'default' => 0
    ),
    'spaceBottomType' => array(
      'type' => 'string',
      'default' => 'em'
    ),
	),
	'render_callback' => function ($attributes) {
		$style_name = $attributes['layoutName'];
		$number_of_items = $attributes['numberOfItems'];
    $skip_items = $attributes['skipItems'];
		$order = $attributes['order'];
		$order_by = $attributes['orderBy'];
		$show_side_date = $attributes['showSideDate'];
    $show_num = $attributes['showNum'];
    $show_views = $attributes['showViews'];
		$cats = $attributes['categories'];
		$include_children = $attributes['includeChildren'];
    $show_infeed = $attributes['showInfeed'];
		$tags = $attributes['tags'];
    $manual_pickup = $attributes['manualPickup'];
    $pickups = $attributes['pickups'];
    $slides_to_show = $attributes['slidesToShow'];
    $slides_to_show_mobile = $attributes['slidesToShowMobile'];
    $center_mode = $attributes['centerMode'];
    $align = $attributes['align'];
    $dots = $attributes['dots'];
    $arrows = $attributes['arrows'];
    $autoplay = $attributes['autoplay'];
    $autoplay_speed = $attributes['autoplaySpeed'];
    $post_type = $attributes['postType'];
    $heading_title = $attributes['headingTitle'];
    $heading_icon = $attributes['headingIcon'];
    $heading_center = $attributes['headingCenter'];
    $heading_bg_color = $attributes['headingBgColor'];
    $heading_color = $attributes['headingColor'];
    $hide_heading = $attributes['hideHeading'];
    $post = App::get('posts');
    $posts = $post->get_block_posts(array(
      'skip_items' => $skip_items,
      'order' => $order,
      'order_by' => $order_by,
      'cats' => $cats,
      'tags' => $tags,
      'include_children' => $include_children,
      'manual_pickup' => $manual_pickup,
      'pickups' => $pickups,
      'number_of_items' => $number_of_items,
      'post_type' => !$post_type ? array('post', 'page') : $post_type,
    ));
		if (count($posts) === 0) {
			return '';
		}
    if ($style_name === "slider") {
        $result = App::get('posts')->get_posts_slider(
          $posts,
          array(
            'slidesToShow' => $slides_to_show,
            'slidesToShowMobile' => $slides_to_show_mobile,
            'showInfeed' => $show_infeed,
            'dots' => $dots,
            'arrows' => $arrows,
            'align' => $align,
            'centerMode' => $center_mode,
            'autoplay' => $autoplay,
            'autoplaySpeed' => $autoplay_speed
          )
        );
    } else if ($style_name === "related") {
      $result = App::get('posts')->get_posts_related($posts, array(
        'showInfeed' => $show_infeed,
      ));
    } else if ($style_name === "side") {
      $result = App::get('posts')->get_posts_side($posts, array(
        'showNum' => $show_num,
        'showViews' => $show_views,
        'showDate' => $show_side_date,
        'headingTitle' => $heading_title,
        'headingIcon' => $heading_icon,
        'headingCenter' => $heading_center,
        'headingBgColor' => $heading_bg_color,
        'headingColor' => $heading_color,
        'hideHeading' => $hide_heading,
      ));
    } else {
      $result = sng_get_cat_tag_post_output($posts, $style_name, true, $show_infeed);
    }
		return $result;
	}
));

function sng_posts_slider_render( $block_content, $block ) {
  if ( isset($block['blockName']) && $block['blockName'] === 'sgb/posts' && isset($block['attrs']['layoutName']) && $block['attrs']['layoutName'] === 'slider') {
    wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css');
    wp_enqueue_style('slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script(
      'sng-slick', // Handle.
      'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'
    );
  }
  return $block_content;
}

add_filter( 'render_block', 'sng_posts_slider_render', 10, 2 );

