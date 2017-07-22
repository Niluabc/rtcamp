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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'MI`3z+b+@8eCVm]M#;sP4X<v]${p|RjQQ;q,`jw(;0~5b>gQel/hZKF?(T,(mWNn');
define('SECURE_AUTH_KEY',  'd.]`m=rkM{%.38(Pntm38,#3D!.3tzZ21#,nFl:&pD6,`[*NW2,CR4:@j{Sb|7R5');
define('LOGGED_IN_KEY',    'gpcgEuR8 0&V?)<(,[RjCQJO~ej:.!KM~1=q4iy~UH5UndgXyj@OiPMg@9JLoh_2');
define('NONCE_KEY',        'I._ZV(hzGJibBWpDO$jSm?o8$2L[1Y 8ab[k~BH691T?wUbwx<AEDCu: -u[{/f}');
define('AUTH_SALT',        'aU.$59/-NXdGTb8[^R!.pOUx-S]w;fXYuDRFzJJj(vyPhtu0zJ~KleS4d[T}gwYt');
define('SECURE_AUTH_SALT', '8@kQ-Kq?wks>0CJ_EC*ey%^0#ja9ijrMo:_KD{|/Vk(k5.3RHa]R#37Md}./~+s<');
define('LOGGED_IN_SALT',   '^8`T-s`!dVptvR{)ejR,?C1)th4Ro6|Q8!s%7lMtL7?O:6J,#mV&=sJtK`z,|R`p');
define('NONCE_SALT',       'h>@EuF?fZ{6! -;FqeZXjkhj|4GCnMjL*VkI4ehRsLk7vN&;$cLMqv`$^7N0EPxT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

define('FS_METHOD','direct');
