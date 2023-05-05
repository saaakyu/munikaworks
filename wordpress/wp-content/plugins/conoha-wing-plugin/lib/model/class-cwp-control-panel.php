<?php

/***
 * Business logic Class.
 */
class Cwp_Control_Panel
{
    private $db_name;
    private $db_user;
    private $s_id;
    private $d_id;
    private $token;

    public function __construct()
    {
        if ( defined( 'DB_NAME' ) ) {
            $this->db_name = DB_NAME;
        }
        if ( defined ( 'DB_USER' ) ) {
            $this->db_user = DB_USER;
        }
        if ( defined( 'CW_DASHBOARD_PLUGIN_SID' ) ) {
            $this->s_id = CW_DASHBOARD_PLUGIN_SID;
        }
        if ( defined( 'CW_DASHBOARD_PLUGIN_DID' ) ) {
            $this->d_id = CW_DASHBOARD_PLUGIN_DID;
        }

        $this->token = $this->get_token();
    }

    // =========================================================================
    // public
    // =========================================================================
    /**
     * Check if plugin is available
     * @return bool
     */
    public function is_available_plugin()
    {
        if ( is_null( $this->s_id ) || is_null( $this->d_id ) ) {
            return false;
        }
        return true;
    }

    /**
     * Generate iframeURL with parameters
     * @return string
     */
    public function get_iframe_url_with_params()
    {
        $data= array(
            'dbname' => $this->db_name,
            'dbuser' => $this->db_user,
            'sid' => $this->s_id,
            'did' => $this->d_id,
            'token' => $this->token
        );

        $parameter = http_build_query($data);

        return CWP_IFRAME_URL . '?' . $parameter;
    }

    /**
     * Generate iframeURL with parameters for WEXAL
     * @return string
     */
    public function get_wexal_iframe_url_with_params()
    {
        $data= array(
            'dbname' => $this->db_name,
            'dbuser' => $this->db_user,
            'sid' => $this->s_id,
            'did' => $this->d_id,
            'token' => $this->token
        );

        $parameter = http_build_query($data);

        return CWP_WEXAL_IFRAME_URL . '?' . $parameter;
    }

    // =========================================================================
    // private
    // =========================================================================
    /**
     * Get token
     * @return mixed
     */
    private function get_token()
    {
        $key = $this->get_wp_usermeta_data( 'cw_key' );
        $ukey = $this->get_wp_usermeta_data( 'cw_ukey' );

        if ( empty( $key ) ) {
            $key = $this->gen_random_str();
            $this->create_wp_usermeta_data( 'cw_key', $key );
        }
        if ( empty( $ukey ) ) {
            $ukey = $this->gen_random_str();
            $this->create_wp_usermeta_data( 'cw_ukey', $ukey );
        }
        $expiration_date = $this->gen_expiration_datetime();
        $raw = $ukey . CWP_TOKEN_DELIMITER . $expiration_date;

        return Cwp_Encryption::encrypt( $raw, $key );
    }

    /**
     * Generate expiration date
     * @return false|string
     */
    private function gen_expiration_datetime()
    {
        $dtz = date_default_timezone_get();
        date_default_timezone_set( CWP_TOKEN_TIMEZONE );

        $expiration_date = date( CWP_TOKEN_FORMAT, strtotime( CWP_TOKEN_LIMIT ) );

        date_default_timezone_set($dtz);

        return $expiration_date;
    }

    /**
     * Generate random string
     * @return string|null
     */
    private function gen_random_str()
    {
        $str = array_merge( range( 'a', 'z' ), range( '0', '9' ), range( 'A', 'Z' ) );
        $r_str = null;
        for ( $i = 0; $i < CWP_RANDOM_STR_LENGTH; $i++ ) {
            $r_str .= $str[ rand( 0, count( $str ) - 1) ];
        }
        return $r_str;
    }

    /**
     * Get data from wp_usermeta table
     * @param $key
     * @return string|null
     */
    private function get_wp_usermeta_data($key )
    {
        global $wpdb;
        return $wpdb->get_var( $wpdb->prepare( "SELECT meta_value FROM $wpdb->usermeta WHERE user_id = %d AND meta_key = %s;", 0, $key ) );
    }

    /**
     * Create data in wp_usermeta table
     * @param $key
     * @param $value
     */
    private function create_wp_usermeta_data($key, $value)
    {
        global $wpdb;
        $wp_prefix = $wpdb->prefix;
        $wpdb->insert($wp_prefix . 'usermeta', array('user_id' => 0, 'meta_key' => $key, 'meta_value' => $value ), array( '%d', '%s', '%s') );
    }

}