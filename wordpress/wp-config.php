<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '04ycf_munika_admin' );

/** Database username */
define( 'DB_USER', '04ycf_munika_admin' );

/** Database password */
define( 'DB_PASSWORD', 'yuri_0869' );

/** Database hostname */
define( 'DB_HOST', 'mysql79.conoha.ne.jp' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '<!hF[~5z#r$v+-#1`fvSHN;)Sh=5FB4vsn%VFLGIHdet,2Y;?UK+=Ug, NIv[wJ=' );
define( 'SECURE_AUTH_KEY',   'u0ViWfkm)?VqkLg:9EAhQTr;jvrgp[i9t:8PVI@1n05+*vr+sHFdpmsC7<~nP>On' );
define( 'LOGGED_IN_KEY',     'FU*#p`W!^TK*q7kI(0aO<fQ_XW<h[_8t<?[j4L8<f= pb.8kXg*#jw5DfM~wKltE' );
define( 'NONCE_KEY',         'tSoVdy32cU_gtP;dl8%q@=ARBKk_)JAII&kjAfW}3=PaRs}1,YlK* QD@^HU|yx%' );
define( 'AUTH_SALT',         'N{MMXD||ILT_Ws Z!XK@p_`n*};fn!{/L/T-ynF-/0QK,A]bSM+2,aZZ9fOi!oz}' );
define( 'SECURE_AUTH_SALT',  'EI%*jU w4~Jc/J:<4UTSZ`GL# &X1;@=w7qFhqF:/xIY:,&/#?7;Wvo1AtDxr[zu' );
define( 'LOGGED_IN_SALT',    'Svxq9W94(0:pr$8D)-/6R YB-T[oyzsV7NJ+zc(}Y}nyc-%$S3(;7ChY}p6Ag]u1' );
define( 'NONCE_SALT',        '&0`FQ<g;~gQ(/5t;&aHr}K%w%oFmA65;c2*nDv&l7Uq]?O=![(glH|IRF[uXfOy0' );
define( 'WP_CACHE_KEY_SALT', '$/YpfZc0E1#dk7C)i8//k+T.@acZsA9~$pdr` A2tb4[)21%eBF`@(DA]MEhkXSZ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_LOGIN', true);
    define('FORCE_SSL_ADMIN', true);
}


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'CW_DASHBOARD_PLUGIN_SID', '1QdrhNKcDQVlfxx32XkYfcTp_W7PciTsNS3K0FRajbU-_0Q4v4Mvrhzskc8c0Ms6FVedVsqGKTJB-4J7ShrNy-VpIsQmz8cOURH5PViBDg4.' );
define( 'CW_DASHBOARD_PLUGIN_DID', 'Bjdy5XfxRLAsdc7Gp0_LBZq3rEEM_p6GZFaGrvKkI5CkD3FbOEkzqLbvSZSfPJxLdPvsTj0jznzvNFS4-RXS6s1dB3YujLlf6TAFJ-r-t3A.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/** 設定＞一般設定ワードプレスアドレスのURLをグレーアウト */
define( 'WP_SITEURL', 'https://munika-works.com/wordpress' );
