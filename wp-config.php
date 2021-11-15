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
define( 'DB_NAME', 'krishnablog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'kjj.`le&E,UN! OJ5u|=EzyZW{4kw6w=cU:qv7=Ma~OT4HQrX8P>d-O&Qu1BNW08' );
define( 'SECURE_AUTH_KEY',  'kLc(|nOT7z1vUOAHXY$6r<>(MGUiXE`yQ$r<;[aj+_ow?7[o=AS$vP#mKF]DnSj>' );
define( 'LOGGED_IN_KEY',    'm.Y :BdVOD{0a}lmBRyEcd~0Ak.nI:KFH*>+).drX1uOE&hW=1KJGX|:16~skacG' );
define( 'NONCE_KEY',        'w6+T7#C~GM6 DB1RR`~{K=pqnmr;+@U9am5aT/Owib&&9m-i@oL2kkeGxy1w%^Vz' );
define( 'AUTH_SALT',        '%#xoIf>!gDL=6nlQjyC+f~`w,S[vOwG`bz)ve-Z(|&=lr~8<.(Jg4ajTB+F6L%.=' );
define( 'SECURE_AUTH_SALT', 'YB9_&2|uX7E<Qn%]).1L[G{9-FPxqvmnR=JV:ZC wYjenU8KQau=@`T+VV<?CQMN' );
define( 'LOGGED_IN_SALT',   'y#Iw_`@sni3)DCK1B9Ugsd*e1~I!S={}hDi!mRK#!6),)PfV0CNWKGb6fIBg/:Ui' );
define( 'NONCE_SALT',       'a``0&<a,ND4]`hH7KiqN+0YTQ<~NWa+;S<&<.q:}Rm;LP:r_H}Zr LdNYe A6eTf' );

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
