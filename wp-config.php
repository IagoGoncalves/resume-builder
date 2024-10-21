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
define( 'AUTH_KEY',          '6uCdFiu!}e7kbq9w4(G_x6z/~z?92wiu6ZzKWlZ|-A0[xE,Tr3fDbS&ARz{iA(b5' );
define( 'SECURE_AUTH_KEY',   'U0wD1v@spm_;09J,:^ehqUBXQrNY-=@hCG<t,NLdyMb,*=$hWUJMrTeP/A$0s7xq' );
define( 'LOGGED_IN_KEY',     '[h*+:q?}h9kfT.mES/8jWOh6-{vV.?;sDk&4BTLvnChb9m<wY?=;0//`=t_=jAxj' );
define( 'NONCE_KEY',         '^+oo2|^Od=2jwhW{v>|2m]YOhOkn:%(tYvz8iWUm*.9v/7>i`bkphyr>>{nVVEL@' );
define( 'AUTH_SALT',         '1p>i}{6</X,-?S[kvag6_$&eul@F@?*aS$jrx]umdQYW7H<XOEaPFlkF/zp=[#;y' );
define( 'SECURE_AUTH_SALT',  '7JAuFG&DyN<3u4s8gMV]}<A1Ip[CPsr$>OLo,s-RcWgB@]Oa|Z%q0~c*>mO,Q]G0' );
define( 'LOGGED_IN_SALT',    'y}L([>nld xY{~[][=6:0{jC4)l1xpJ,ubH(w#Q(rQZw>d~BRliO0fev]kQx_e9w' );
define( 'NONCE_SALT',        'ha}h8:^3EwsS/&k4lie;R_XS|/?WrDln0>5(NZO+zM2=.`|j.w&`Xk3y>NfECz.h' );
define( 'WP_CACHE_KEY_SALT', '<unfn7Mb^payxeZ<msT:%NQ!}&uhJ7^h|=$3!vnVS75FI|>(;%oJ^O]ZF/Dhf2[v' );
define('WP_UR_U', 'iago');

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
