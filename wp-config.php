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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'travel_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'h/[4(b`6..1h|dL;cXNz3]JwPIE!,]WEK0]~3[<pLQ1}K,y/]yPC8Gj!Z+hCr*uJ' );
define( 'SECURE_AUTH_KEY',  '~UgQfHU0Kk,Baf*5urEv5q`~?yYFY(+UO$H*50|e0~ M{1ji9>QYYqk>M4:kWDrQ' );
define( 'LOGGED_IN_KEY',    '/pMewqrQzNa,#G_j-x/^fU~tFxS}@QP5]F]_Z}Zx-:OLlzI!f 0Ho+Xifx1;:uDz' );
define( 'NONCE_KEY',        'T)$<}y*r.P0,ogb_<K_RA%[p{qGCaH4rr.1$E@YR~#g8w$$X,YYrb?/_#^Cce4}]' );
define( 'AUTH_SALT',        '6!FFYDIl)c`h{IW%#Z0/vJH<Ys^>6{h1`~, l`#fAT52{zW4ig</Ji*n0Ze-VBsX' );
define( 'SECURE_AUTH_SALT', 'q|y/Nwfr vL<qg2hVWTAIF[euX6;_%ORD|xz~Hw,LX&gZy}`{;9/cW+t|G*cRAPC' );
define( 'LOGGED_IN_SALT',   '2-:H>~^|y7jps%-Gmg}m|).f1+i2]5_4p;X(+A.j@*|tz2tQc]qEqWPxg]j@$CPZ' );
define( 'NONCE_SALT',       '^prW>Nw%TLAY`fmH7hXKD<H}l<,!cl4!+Uc]i/Xf8GC[5&.4<i-*zF}&;T#+wfyp' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
