<?php
/**
 * REST API
 */

use SangoBlocks\App;

App::get('rest')->register(array(
  'path' => 'cb/click',
  'methods' => 'POST',
  'callback' => function ($req) {
    $body = $req->get_body();
    $params = json_decode($body, true);
    $post_id = $params['postId'];
    $meta = array(
      'url' => $params['url'],
      'label' => $params['label']
    );
    return App::get('content-block')->count_click($post_id, $meta);
  }
));

App::get('rest')->register(array(
  'path' => 'cb/pv',
  'methods' => 'POST',
  'callback' => function ($req) {
    $body = $req->get_body();
    $params = json_decode($body, true);
    $post_id = $params['postId'];
    return App::get('content-block')->count_pv($post_id);
  }
));

App::get('rest')->register(array(
  'path' => 'cb/block',
  'methods' => 'POST',
  'callback' => function ($req) {
    $body = $req->get_body();
    $params = json_decode($body, true);
    $id = $params['id'];
    App::get('content-block')->set_lazy_mode(true);
    $html = App::get('content-block')->get_content_block($id);
    $css = App::get('css')->get_style();
    return array(
      'html' => $html,
      'css' => $css
    );
  }
));

App::get('rest')->register(array(
  'path' => 'cb/meta',
  'methods' => 'GET',
  'only_login' => true,
  'callback' => function ($req) {
    $params = $req->get_params();
    $id = $params['id'];
    $meta = App::get('content-block')->get_meta($id);
    return $meta;
  }
));
