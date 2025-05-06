<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'airj1347_wordpressv3' );

/** Database username */
define( 'DB_USER', 'airj1347_wordpressv3' );

/** Database password */
define( 'DB_PASSWORD', 'airj1347_wordpressv3' );

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
define( 'AUTH_KEY',         'Mer@~%cNDQupq6s=M,7<Ha91&?Qj(d~eC8[XeF)+cZ(_FS}l+dF4MZ50h<9+=);q' );
define( 'SECURE_AUTH_KEY',  '?IzE9)M?IR_)2I4o$_uGB8!XU=V/DX5g,%(Xomm=l|]c7YLn{n/n x#x+ac?0D+J' );
define( 'LOGGED_IN_KEY',    '(7*&5,F(fuWy@eYW%JEj .+T=Srv^z|1UK/8Pz/xYi(&|,< Kk}`L9Pg!0F?d-#)' );
define( 'NONCE_KEY',        '-kU,yz(nr?`C2,E|vf]D{#S]X?MU48#hW5dj`Dlkk=u8B*jT1~2@E)>zE XK# aW' );
define( 'AUTH_SALT',        'd5~bU.b*.6?H^{X{NPE)-#n0Cj{-y}e*8a,HS.L2,{#ooN b!bY31Q5>=dpUd8af' );
define( 'SECURE_AUTH_SALT', 'J3NWd@*JLwgLw_!<`&Fyr5+euv{[pqYZ#M]UBk{gfg{qBbPp|KHe3.tiMKb>arsZ' );
define( 'LOGGED_IN_SALT',   '0%9aM<~_2eq4`!V@u WRF(jF_FT3U|:Dr,{m?mHn)ZqmU[hznF@CO<=(QB7=(YL^' );
define( 'NONCE_SALT',       '-_V<?G5XkEj]3sZ6&0Y6c!t/?gD}HvglB6?P4jZV,d^V)3frOUs$ChPbK&|Ve{n+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
