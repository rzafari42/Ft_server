<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_database' );
/** MySQL database username */
define( 'DB_USER', 'rzafari' );
/** MySQL database password */
define('DB_PASSWORD', '1234');
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Do not change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5qNXarJXH#sf5QX4}8t{J{3a]WCN&zjA^2%&XE[?HoLJ6#B),>,?S(:(:u{):lAX');
define('SECURE_AUTH_KEY',  '>vb&zh,7BSD/_DPT 9o@gUc1|k7-L8r!rP8D-7.LWCK>y;R-K-hu*]VLOXjuGWKz');
define('LOGGED_IN_KEY',    ')@g#K6ITdI!NO.*kKg[dXBU>~{M,*n`k+l*Rl`Peu-|n:s}1`aDS_Ldupxmv<$hS');
define('NONCE_KEY',        '-V.iW.`jS$xL]bkWq_*k8+H&-SjUsli^7dQ6W1hr_-l33auK?x,Hs+,uTdB1k-kg');
define('AUTH_SALT',        ';nS{_ba|l)IK_7X[:@z$ 5Og@%+6z!EN:cMK]Y~oZQ|D3One.=`Vhynn8*GQ2auF');
define('SECURE_AUTH_SALT', '$/OxV_K4sA@}r@GoS^qAw|(A{g=~ N#sj+oOo#r:l]rcE|yFf1+_91!0Q{Li5ois');
define('LOGGED_IN_SALT',   'ek%Mh5F6}@+[:h}-FG,Z|:iZzNP;e2%b#B&A!1={vLcxf2=Pz>7ss]p+AlUD(`W$');
define('NONCE_SALT',       'J#g=HSLwxl4x@C(K_UtBF{0$<kur$V^+6eaVgE-]ST9N-c+|>shbaMB|o2f;8ZZw');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
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
define( 'WP_DEBUG', false );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );