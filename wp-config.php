<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// sane default for wp-cli etc
if ( ! isset( $_SERVER['HTTP_HOST'] ) ) {
	$_SERVER['HTTP_HOST'] = '';
}

/**
 * Don't edit this file directly, instead, create a local-config.php file and add your database
 * settings and defines in there. This file contains the production settings
 */
if ( file_exists( dirname( __FILE__ ) . '/config/wp/local.php' ) ) {

	include( dirname( __FILE__ ) . '/config/wp/local.php' );
	defined( 'WP_DEBUG' ) or define( 'WP_DEBUG', true );
	defined( 'SAVEQUERIES' ) or define( 'SAVEQUERIES', true );

} elseif ( file_exists( dirname( __FILE__ ) . '/config/wp/staging.php' ) ) {

	include( dirname( __FILE__ ) . '/config/wp/staging.php' );
	defined( 'WP_DEBUG' ) or define( 'WP_DEBUG', true );
	defined( 'SAVEQUERIES' ) or define( 'SAVEQUERIES', true );

} elseif ( file_exists( dirname( __FILE__ ) . '/config/wp/production.php' ) ) {

	include( dirname( __FILE__ ) . '/config/wp/production.php' );
}

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o6sbl#~9|7zCM2F<<J7Fe#s|-jm%e7de^Wz97oI,j8&K}PX<oB+<i4>g-(cWsEuz');
define('SECURE_AUTH_KEY',  '*yG)-._mlp<U(CCH-Dre%0|bjJD/V=>pm?rUq5SVq1zwzJ4brr5-%V=1L9SXaJf/');
define('LOGGED_IN_KEY',    '$|pWB[A0-b{?R!Y(T:qrA805T=+s-poq>D_H[[_8_;lE+DZ|8iWCINh}PPVutj[|');
define('NONCE_KEY',        'JF}GJB^!bO 6jPv-O7IZ}-8 Qdg [: ndS2b(t(.rD:WE3agU]Jn^nTnKi-UtrW4');
define('AUTH_SALT',        'h<yDKOT2Y@=V/EH[F$=3^jM!dX|<^-yJ@O0f)E4$xd3JA-@:! 6C]0P2`Tm-m0ho');
define('SECURE_AUTH_SALT', '?0>T1[P-&K$9LH]rqs@!P9_=j)t6&fu!x:wEN:QG8huU:}@/m-X<9IT|-}9~ANGB');
define('LOGGED_IN_SALT',   'qIsA3h^>bwEB*Rbza&X;h0UA<~D| )Hjrn~# Sq5+aeG:+zn}77|f}B^9=4T5fs^');
define('NONCE_SALT',       '(qG]T3LZk(,2;Rm4Pi|Xi}xG60bm3{0?|R@Zkb`Dp:}S]e~hOq_KzKTe@~-w=&|j');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define( 'WPLANG', '' );

/** Database Charset to use in creating database tables. */
if ( ! defined( 'DB_CHARSET' ) ) {
	define( 'DB_CHARSET', 'utf8mb4' );
}
/** The Database Collate type. Don't change this if in doubt. */
if ( ! defined( 'DB_COLLATE' ) ) {
	define( 'DB_COLLATE', 'utf8mb4_general_ci' );
}
// Define Site URL: WordPress in a subdirectory.
defined( 'WP_SITEURL' )      or define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );

// Define Home URL
defined( 'WP_HOME' )         or define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );

// Define path & url for Content
defined( 'WP_CONTENT_DIR' )  or define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
defined( 'WP_CONTENT_URL' )  or define( 'WP_CONTENT_URL', WP_HOME . '/content' );

// Prevent editing of files through the admin.
// Enable installing and upgrading plugins for dev sites.
define( 'DISALLOW_FILE_EDIT', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/core/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
