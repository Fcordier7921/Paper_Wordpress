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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         'taL[u0qBhEsqo2is@9$,wQc;1sSy<uZ2l~Qd_u2Q.;Uxy _^jeC};y-~b(?qa)hx' );
define( 'SECURE_AUTH_KEY',  '8NJO:BTaUwd?a01]~7_W~v>OQ!)=RJ5}72M_4~O&5^nyIp$S,%e[Ijq<CbJf`Y,=' );
define( 'LOGGED_IN_KEY',    '!!(.p3 ,Pc[{7MdmL9Zj2oM<8f`@>*^q6Mg0ouY@MfgG|DQnew{=7je]|1r04 47' );
define( 'NONCE_KEY',        'o&F[U#CxhM_|AaQsAj}%@mXd>[C7LSt{tTRRtNrM+i62kBZw1s~IRE8a&q;,-vnN' );
define( 'AUTH_SALT',        'tMof{9yAQ%{_I039i2##t<NK4FdKwkK2,NG6%hd7mCY2U8$h$JIz]qlUC)U2OESN' );
define( 'SECURE_AUTH_SALT', '~B%s8AY66lm{x[5{2`0bql1|Y<x~(<*NgJe8mjM(z8/q9m3)ybpw9+)-mthp5l>A' );
define( 'LOGGED_IN_SALT',   '1*ssg%Rd7k]B,[ccs4I&ihX?GT8Sry5[/=7[rLo90Ls*Z$10rpRgcsgCBH@?D]v^' );
define( 'NONCE_SALT',       'HwBus@[B6zYcUy0Z<RU6AG3mL!Kw)o br@%(a/LlNG/vP>n)BuD>O=Or/JV!Ln>u' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'apttwp_';

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
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
