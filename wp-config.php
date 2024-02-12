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
define( 'DB_NAME', 'biblioconnect' );

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
define( 'AUTH_KEY',         'khuGXzx2Aaz*k7P.ar.&Ym_(YWuZ6gAPx $H.?x!hW0Tb@>PR|N9)U[O=L&^,SqX' );
define( 'SECURE_AUTH_KEY',  '>>.D.%dA#8BVAPecWOKDhR]63xUW*N|-bzi8OkI4I= in-]NEtR1wK61;g15W,nN' );
define( 'LOGGED_IN_KEY',    'i$M4wK$22buh:G>htbB&51Z8 Xzt;&PgBG1Sm8MshsY/i}<-g!EcYsh2u6/4IhOn' );
define( 'NONCE_KEY',        '0-@2>H[JS3h/)6rC<Ix?va|`RbTb4|~n09|J-i2%^%q#M9C<q,hk|0TC5pz17]Bk' );
define( 'AUTH_SALT',        ' :=9TfuJ>[v4}03C7)ql}y2uuF5A=RY~/J1H8f!Sli;}Npe.9~4j9u;xgo4Nu0IJ' );
define( 'SECURE_AUTH_SALT', '`;!f?+LPnTb1%$|N@8ga>_u/YQfD^er+Z&q~Qe1KnYD5hDKcBv]{$CvTJTL$6fNz' );
define( 'LOGGED_IN_SALT',   '<zh<oT6,Kd1]iI<ly>`=OX*<W$@YFxBE.+YNC.}b&d8:Y{-zuQSom#lX?p*VrB5w' );
define( 'NONCE_SALT',       '+wuh0ioJZrv/,^_L1x`ox{,3Kp^3LEqUP(Kp.Aa/ucTr3<zp-w.-j,AysuOPcVfO' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
