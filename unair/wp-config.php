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
define( 'DB_NAME', 'airj1347_wp_xonol' );

/** Database username */
define( 'DB_USER', 'airj1347_wp_cmlbk' );

/** Database password */
define( 'DB_PASSWORD', '$44A@u4aKf?wX0&z' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', '%iJF82O1v-XS7BH1f0-W20VYfB6tbvv+9OK)!i)j3i~X9NEMAPwUnw)C/+UHI[37');
define('SECURE_AUTH_KEY', '-4%g6t|1(GqQ/&akP1]~5ulI(vg%c%3a_E85!(his3ed+)(7@+M717LuN2ZB!w#G');
define('LOGGED_IN_KEY', '9XJ3G9Ix-&l[d6ze1Yz4-28!o8ROi3E]C0YG05&EgnRge)&wKOA9|hGs~![G]1G8');
define('NONCE_KEY', 'KfE9H87NEVc0+K-s@nqJVB~BhliiKit9/33[-Q0jj!H:+_12s:z-QP6MGCAYlrkc');
define('AUTH_SALT', '(*2Oe1S9mtg5l3#Ka-#r2K@*_7SS1O;*&lc%~Yfy%1xx4_|OAWt7clRA(0y2dg&/');
define('SECURE_AUTH_SALT', 'f&V+eIcC:7/38T&787&i([f55N3U85Zv4[5m1GJ)HLt0RL60F&T@4esg9:K*9Wqo');
define('LOGGED_IN_SALT', 'F0)qJ~k_D-76L8hd;0LTD#~J#Gi~46N9uX;Xi0EHfisfeCI61N8icx[x2xE55B|a');
define('NONCE_SALT', '8Ug2I5%n6(6|5K+s@#I46-/l0i]r44ku3%J40iF8E9|d73n*I+!Nw2v&iU/8i-(p');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'GkD1yGNN_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
