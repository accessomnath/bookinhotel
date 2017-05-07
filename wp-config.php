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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'forc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'DV]mwz[m7q>Yia[V0#?;dOR],vI;D~>CJR]P:,ti1TG*2:0={+,L}]yx.y?W*~R;');
define('SECURE_AUTH_KEY',  '!$C1VhoJ0PZIbZt^`Yzt[BlnaC|-Y{$M6+]v8*T`m.7@2>Hoq1x~vqBX>|&Dngwi');
define('LOGGED_IN_KEY',    ':x4a-o/}3s)r?qNA8p!ZT%fRx?uWuyS;pMpuK:#[[vc%U;#~[=[aj?wjMa.j;HUS');
define('NONCE_KEY',        '?s6Rx`SRet[3R}U:#K*VgwosBir!skjm</E8dfFckbC_8]e<9L{15;AMWj0PQ?![');
define('AUTH_SALT',        'pI-C?p.l,s4w[lp&BxA<a`KhkN!V`opcx?}X|`4L([+QObdh=jq$DA]?fVgOGSg9');
define('SECURE_AUTH_SALT', ']HM@Jy/%.b?Pp!hLvo>T3G<E=P2s8bzA9X;d4!v!i+S[C[EOl7EP|IQY>lkomxeu');
define('LOGGED_IN_SALT',   'QL8fcY1EvP6owkbIeA32_wh7UH=-GezS/]3G+}YHnV*/y>]45~`[2 2?s!B5yw&2');
define('NONCE_SALT',       '0Z+y7XFGZJFO*[l];oJ>4mW&J_rVQpE6gtOVa_}a0W$&IxaZV5!Bqm,.Bn?vQ?63');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wffp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
