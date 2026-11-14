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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/westmar3/public_html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'westmar3_wp576' );

/** Database username */
define( 'DB_USER', 'westmar3_wp576' );

/** Database password */
define( 'DB_PASSWORD', '-6Z9.p262S' );

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
define( 'AUTH_KEY',         '1z560okoovmss5fadjmh2ejckyhr5mht8w7llp3itkrg6dwvv7v2f6ba8cfwmoas' );
define( 'SECURE_AUTH_KEY',  'ztrtvrmf7c5eemovsiyd8pflcn2xbluohpounwxca8td7y1tnxnp2tv6bp40vgde' );
define( 'LOGGED_IN_KEY',    'dyq9wyko05lvgzxenasmut9pa1gr0ic6loqeeq54am9vxyco8hdgv7hwug1b5n9j' );
define( 'NONCE_KEY',        'z0y39eltxxrhb7yyabw6aad5feyuzkysdgnd68qfw0ajdzcd1jljbcy2wv5ec0he' );
define( 'AUTH_SALT',        'cxff5jmpieja84ob5ai8kcjkohyw7mpf2nfuwvey4mrut2ons3qwg8w3yrrr5tle' );
define( 'SECURE_AUTH_SALT', 'amwqg4gyq8bu45eex7phncnko4hurkyp3kmdpba38qkdzvuplkevsxhc0vjeurph' );
define( 'LOGGED_IN_SALT',   '40xuj2htijuyz7xaxwj8610z8y2akfxpe258cellu9alvv1vawuitirn6tbdbhku' );
define( 'NONCE_SALT',       'aef3aigd6zbr1qzs9nxu1qbi7xib1cnvq2ebblfur7wxgrewspbkwwjwu0v1esx8' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp9r_';

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
//Disable File Edits
define('DISALLOW_FILE_EDIT', true);