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
define('DB_NAME', 'aeontowers');

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
define('AUTH_KEY',         '(H6Xzug~U[c*UR0*0e[@dRkKJit$xqsu2%~=ZPF~[.bu[vr *r3yt-DZl)zS}>e*');
define('SECURE_AUTH_KEY',  '3mm[!tzuVJNm>)sH+!d~/S Y82oDuq}X3wf^KtP=gJS2Lb$HAX(wt#!ENj-D?F-_');
define('LOGGED_IN_KEY',    'czHs@TD9Uut1aXfXB=U]&RcC-o=R;T}*mQ]p>cK34!CqaN1!` 9Zp5jvW>{T[ef7');
define('NONCE_KEY',        'Ae1a{#,rhMx9R>a!s2iOG61*M+CxuUZT`x74[8pc8AK<.<<@ZOCXyVAz=2R4w/Uu');
define('AUTH_SALT',        '*da-Q@GHTUm1$`M<2^SE&tQAD^zW!Xy|Z1P{Re6@XI%/Cjup1w*g=gUkCS%M8_?^');
define('SECURE_AUTH_SALT', '{ R@l(>btY :ay|M:1HaA$Mt5fV#RF:-s#lQ$!F<nLTky^pEUA>M;}a%!&OI[UtD');
define('LOGGED_IN_SALT',   't&sB1/B,T1=%bjA3y?ddK2~cYH6:l8+zvwX8Q-&SY8-ews Q@Ub=T(6eqv%7Qf/,');
define('NONCE_SALT',       '5<2v^ljJ)1Z:D,s;QMpmMk^mBt}ZiWQ0Hy^Oj)iY|hJ>Tl~VG>B8dVLYR8e{p:;p');

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
