<?php
/*
Plugin Name: ConoHa WING 自動キャッシュクリア
Version: 1.0.0
Description: WordPressの記事を投稿した際に、ConoHa WINGサーバー上のコンテンツキャッシュを自動でクリアするプラグインです。
Author: GMO Internet Group, Inc.
Author URI: https://www.conoha.jp
*/

function cache_clear($post_ID){
        $homeurl = home_url();
        $url_parts = explode("/",$homeurl);
        $cwd = getcwd();
        $clear_url = "http://127.0.0.1:9080/clearcache?cwd=$cwd";
        $ch = curl_init($clear_url);
        $mh = curl_multi_init();
        curl_multi_add_handle($mh,$ch);
        $running = NULL;
        curl_multi_exec($mh,$running);
        curl_multi_close($mh);
}

add_action( 'new_to_publish', 'cache_clear' );
add_action( 'pending_to_publish', 'cache_clear' );
add_action( 'draft_to_publish', 'cache_clear' );
add_action( 'auto-draft_to_publish', 'cache_clear' );
add_action( 'future_to_publish', 'cache_clear' );
add_action( 'private_to_publish', 'cache_clear' );
