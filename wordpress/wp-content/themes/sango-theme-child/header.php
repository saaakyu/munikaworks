<?php

use SANGO\App;

$should_show_header = App::get('layout')->should_render_header();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta name="msapplication-TileColor" content="<?php echo get_theme_mod( 'main_color', '#1C81E6');?>">

  <!--20230510_充電バーに色を入れないここから-->
  <!-- <meta /name="theme-color" content="<?php //echo get_theme_mod( 'main_color', '#1C81E6');?>"> -->
    <!--充電バーに色を入れないここまで-->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php wp_head(); // 削除禁止 ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="container"> 
  <?php if ($should_show_header) { 
    App::get('layout')->render_header();
  }
