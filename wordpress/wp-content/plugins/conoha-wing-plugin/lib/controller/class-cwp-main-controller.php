<?php

/**
 * Main Controller Class
 */
class Cwp_Plugin_Main_Controller
{

    public function __construct()
    {
        $this->activate_actions();
    }

    /**
     * Actions to activate
     */
    private function activate_actions()
    {
        add_action( 'plugins_loaded', array( $this, 'cwp_plugin_loaded' ) );
    }

    /**
     * Plugin loaded event
     */
    public function cwp_plugin_loaded()
    {
        add_action( 'admin_menu', array( $this, 'add_menu' ) );
    }

    /**
     * Add admin menu
     */
    public function add_menu()
    {
        add_menu_page(
            CWP_PAGE_TITLE,
            CWP_MENU_TITLE,
            'administrator',
            CWP_MENU_SLUG,
            array( $this, 'read_cwp_control_panel_page' )
        );

        add_submenu_page(
            CWP_MENU_SLUG,
            CWP_PAGE_TITLE,
            CWP_SUB_MENU_TITLE,
            'administrator',
            CWP_MENU_SLUG,
            array( $this, 'read_cwp_control_panel_page' )
        );

        add_submenu_page(
            CWP_MENU_SLUG,
            CWP_PAGE_TITLE,
            CWP_SUB_MENU_TITLE_WEXAL,
            'administrator',
            CWP_WEXAL_MENU_SLUG,
            array( $this, 'read_cwp_wexal_setting_page' )
        );

        global $submenu;
        $submenu[CWP_MENU_SLUG][] = array(
            CWP_CONTROL_PANEL_URL_TITLE,
            'administrator',
            'javascript:void(window.open("' . CWP_CONTROL_PANEL_URL . '"));',
            CWP_CONTROL_PANEL_URL_TITLE,
        );
    }

    /**
     * Load dashboard plugin page
     */
    public function read_cwp_control_panel_page()
    {
        require_once CWP_PLUGIN_PATH . '/lib/view/cwp-control-panel/index.php';
    }

    /**
     * Load dashboard plugin page for WEXAL
     */
    public function read_cwp_wexal_setting_page()
    {
        require_once CWP_PLUGIN_PATH . '/lib/view/cwp-wexal-setting/index.php';
    }

}
