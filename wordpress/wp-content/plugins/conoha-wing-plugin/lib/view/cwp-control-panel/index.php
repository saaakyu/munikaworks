<?php

$cwp_control_panel_model = new Cwp_Control_Panel();
$available_plugin = $cwp_control_panel_model->is_available_plugin();

if ( $available_plugin ) {
    $iframe_url = $cwp_control_panel_model->get_iframe_url_with_params();

    // load scripts
    wp_enqueue_style( 'cwp-settings-style', CWP_PLUGIN_URL . '/lib/view/assets/css/cwp-control-panel.css' );
    wp_enqueue_script( 'cwp-settings-script', CWP_PLUGIN_URL . '/lib/view/assets/js/frame.js' );
}

?>

<?php if ( $available_plugin ) : ?>
    <iframe id="cwp-settings" src="<?php echo $iframe_url; ?>"></iframe>
<?php else : ?>
    <p>プラグインは使える状態ではありません。</p>
<?php endif; ?>

