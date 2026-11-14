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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ']|n:@Dr7OhAfEcR{+:jUi]O0,[$2?nBvI!(FMQu=h:Aet|S/,?|0`j+XT:M2q0zJ' );
define( 'SECURE_AUTH_KEY',   '^_$]R{N7uRI=QaM47.zeQ9i-puu9~2p;1+]8=>H<iu,CZ)(l%YWK$&xdwX.JL-jK' );
define( 'LOGGED_IN_KEY',     'VbKO>d>Js&~1OuQ=zR8 [1dL2Z +81~PkBmg4U)9?:K3rsJ@CR$0I] (#,8q0ZPQ' );
define( 'NONCE_KEY',         ';^ycEGV#1<hydMZSn%LtRf8:{|=?=<~ni^>(QJ.65H!Hu^o:vRs|~NAAHz!zImH6' );
define( 'AUTH_SALT',         'e9*JQFLmPvH =76!yLIB8K-FF@m8jc41XV,9tQO#X})%!GI{SiX]`*28xC g~HFw' );
define( 'SECURE_AUTH_SALT',  'Rk6@0K[#wOqfk3I6I0IwP+P7{M;`{c$q6V%K#+:1ToWL9;V7d&(`o-k-3mVQ_xm6' );
define( 'LOGGED_IN_SALT',    '.pOfRW#!9-)|PRE 3.0-j#]Lq{d%gj/b`;?8xF<$t!*g>A%py| *2[zp-->^zK80' );
define( 'NONCE_SALT',        'PKBf=e%|qxq!o&#/BI$V;<lyZ[BDo)ZQLt}l9|dCpzQyRW4#&[M7 5{Q4,p}f<!L' );
define( 'WP_CACHE_KEY_SALT', 'y?j,jgiWzQH`YkU&wF#Dane.Y@=)d}MWjcy&URD9WEpoL0>ptO(MnN:1I{h.e1fk' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
