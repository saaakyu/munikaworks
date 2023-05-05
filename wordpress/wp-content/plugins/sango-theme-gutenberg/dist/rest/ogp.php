<?php
/**
 * REST API
 */

use SangoBlocks\App;
use Embed\Embed;

App::get('rest')->register(array(
  'path' => 'ogp',
  'methods' => 'GET',
  'only_login' => true,
  'callback' => function($req) {
    $params = $req->get_params();
    $url = $params['url'];
    $info =  Embed::create($url);
    $providers = $info->getProviders();
    $opengraph = $providers['opengraph'];
    $meta = array(
      'title' => $info->title,
      'description' => $info->description,
      'imageUrl' => $info->image,
      'siteName' => $opengraph->getProviderName(),
      'imageNaturalWidth' => $opengraph->getWidth(),
      'imageNaturalHeight' => $opengraph->getHeight(),
		);
    return $meta;
  }
));
