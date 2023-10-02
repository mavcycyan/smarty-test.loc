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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'smarty' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '{A)7`Yowv]G.~e0a2FC^xqa97f_nP1kLW,T+4d<X(Sp}!VL~w*wIGU>9ZhK%9{Ir' );
define( 'SECURE_AUTH_KEY',  'u`fZ%f}@/l^^HA_S-`G&VnSR3{`_Kx&0Ir2l%fi7,[c54:W/;d=dwlG:L$?S%l(2' );
define( 'LOGGED_IN_KEY',    '8evGcu.I;9Ecu3$`=@2<4-lBu{mW#3Y<k1bGd$V4;6P0WV96.>jPo7;n;s+Zkxpl' );
define( 'NONCE_KEY',        '[WL5oZL#+N=qSm|)HUDH,0e3Tj!HORvQtb5=<}m-]M,G GzM^e$f+qG<FTUD?Lm)' );
define( 'AUTH_SALT',        '(zS`9{jG|0=2WvY{g]J[xaj Y0YcX9nh.fQ <mjBGM$1!}PQ,&JFWm1wX4x@`e]q' );
define( 'SECURE_AUTH_SALT', 'BnDc]H3ZxglI|0s^nS:5x=`<^0c]o]wp+Q[%w}fOQr#Zzy+(-uRs~@oW# &6w56u' );
define( 'LOGGED_IN_SALT',   'bp8GPx1dNomwI1}l|fb)x;=:5^=WQ52O(!spN,juTd,%kE@Ya@<*0+trRoM$s82&' );
define( 'NONCE_SALT',       '$W5[vIuVn3xKpxD>u+Uz|:Fch)^#Sf`J=Q$q}!?-nv*uT|-.me]rgYS40&KA<t;|' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
