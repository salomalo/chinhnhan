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
define('DB_NAME', 'chinhnhan_webdemo');

/** MySQL database username */
define('DB_USER', 'chinhnhan_webdemo');

/** MySQL database password */
define('DB_PASSWORD', '123123');

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
define('AUTH_KEY',         'H%nJAHrA)vtU.UEQ5e1IM;:pj5|KNH}j/g!?JQ1iw@n#kVorwmDDt:LWl#Lim0P3');
define('SECURE_AUTH_KEY',  '=g^QUDZ#5ohG1%YDwu^i$v)-bN.N&nGk$W>|R3a)YF&238@ksWN%U97(naE8W*=>');
define('LOGGED_IN_KEY',    '4daWA/Aqd:MlV ,I14#d$M6oU6TPon+.dBHq?>8>a:C6F07Qg8PMbn<dpmlHwa=r');
define('NONCE_KEY',        'Duc/4@a<PhX<2/E~*j@3VOQtC4UnfVm|Mo?)6!sgOdrvd[+$g:{^/Jd]p?P}R+e}');
define('AUTH_SALT',        '8~ip<3nReYa3sQ^]dF)w)5U%HjmY<usn#|b_s-[RW2ayhV }s6%WjfDU_3-13b[8');
define('SECURE_AUTH_SALT', '?ECm%*8EM~RB6:H<-tk~Mh`UUiZ7Eziy}`5*<F!S*ioAjL_;<`z1V&mIKQ&?jo|F');
define('LOGGED_IN_SALT',   '8};OdySvR~gz*3#>50U7-uu:2{3nHA2Ku,4`<~G5Yh;}6sBCnXl&XTq<uxq~0(Z5');
define('NONCE_SALT',       ')nnX4N@y}n6=S0$TMh,u]Ab%?I YnT`-Ek_vD7 _X5! 5BdUebJ?Iz5ZH{UfyVMu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cnc_';

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
