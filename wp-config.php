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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'architecture');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'H Fy9=eKhgz76X70RNgU<:>fvSeB-ZIO8nk/X;5lUSha}c Z_CTxJoG^7C=dYF9_');
define('SECURE_AUTH_KEY',  '*Bs,w+bX2:WsrG1a)rE`O;A~WPiipH,l+PaDTMw@[1L2haU_@3($*fc*&J,$ULg<');
define('LOGGED_IN_KEY',    'V*P#Nn$~Xy)O=[-(99EhivU?7q)TSYv^NmOBUG^iPbRj<Lu^+gVd4(Q]Owga,K<5');
define('NONCE_KEY',        '/3>Q:a8K{zTFg6.BokN&PgAGQI3/FD/z!s{.:KQRra}aBw9^[7?EF31lU`g`mV,a');
define('AUTH_SALT',        '^MYs]r4$.LY%hKjIGPR}[6_;#Y{vZA4~to7~B/2l-0F#C]Z(vyMM{80:oz:v4ARP');
define('SECURE_AUTH_SALT', '{Zuw]:!`eR7x9<7 $+%3(vmR<apO)&rR:.wqcH.,:R([Lqu5?r7ZhTV{, Xk!oLM');
define('LOGGED_IN_SALT',   'eG=>3z309Idd(Y%L51Q8!iwD+zSmRID%MI~K:o?6cC>1WSobt%/^B3b!.QjFxL?p');
define('NONCE_SALT',       ',/]3i:qUoUDNk k9Y7L_60BJ:rD-`Hif3gLJrA&_RoUAUfnZr&wY+<m4WRydvu#s');

/**#@-*/

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
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
