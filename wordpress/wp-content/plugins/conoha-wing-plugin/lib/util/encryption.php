<?php

/***
 * Encryption / Decryption class
 */
class Cwp_Encryption
{
    // =========================================================================
    // public
    // =========================================================================
    /**
     * Encryption
     * @param null $raw
     * @param null $key
     * @return mixed
     */
    public static function encrypt($raw = null, $key = null )
    {
        $iv = openssl_random_pseudo_bytes( CWP_ENCRYPTION_BLOCK_SIZE );
        $data = openssl_encrypt( $raw, CWP_OPENSSL_CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv );
        return self::base64_url_safe_encode( $iv . $data );
    }

    /**
     * Decryption
     * @param null $raw
     * @param null $key
     * @return string
     */
    public static function decrypt($raw = null, $key = null )
    {
        $enc = self::base64_url_safe_decode( $raw );

        $iv = substr( $enc, 0, CWP_ENCRYPTION_BLOCK_SIZE );
        $raw = substr( $enc, CWP_ENCRYPTION_BLOCK_SIZE );

        return openssl_decrypt( $raw, CWP_OPENSSL_CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv );
    }

    // =========================================================================
    // private
    // =========================================================================
    /**
     * Url safe base64 encoding
     * @param $val
     * @return mixed
     */
    private static function base64_url_safe_encode($val )
    {
        $val = base64_encode( $val );
        return str_replace( array( '+', '/', '=' ), array( '_', '-', '.' ), $val );
    }

    /**
     * Url safe base64 decoding
     * @param $val
     * @return bool|string
     */
    private static function base64_url_safe_decode($val )
    {
        $val = str_replace( array( '_', '-', '.' ), array( '+', '/', '=' ), $val );
        return base64_decode( $val );
    }
}