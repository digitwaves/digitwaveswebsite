<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u503010887_ooqCR' );

/** Database username */
define( 'DB_USER', 'u503010887_kXpRZ' );

/** Database password */
define( 'DB_PASSWORD', 'Jft6AUGk8U' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '}xDujDs/WdDI5N@(PfO1UR_~<qG!<oG~frG$~)MpaT[zTcb|5Wfr`:Hkst9.LI_E' );
define( 'SECURE_AUTH_KEY',   'c<g)k{o!1KK_5b.hLh^-NoB779{~|QP-RqCxhY!I ?T7JufrCwneY=s.Z Ee)-[ ' );
define( 'LOGGED_IN_KEY',     '/N?@T.`XA#wN.U6-x>:-qb97Gy@=G[b#g<Q@} m*PD}q.V3D:nbZz<[^)yguS0g3' );
define( 'NONCE_KEY',         '{UVq:PXUZRv_$^|k/<fkFa4ijm^]Qdzm?xvYcEWgno!*sKRxR89dhC`bLu.Lzk`V' );
define( 'AUTH_SALT',         'nw(xEU#8BWAJBGMA0s{fp4JjK-Pd}ry3n6<yqRqrbRvH-<$W<[A$e{%Y(`2`c$OV' );
define( 'SECURE_AUTH_SALT',  ')/0&E5*1r^7D;ig l2bR;CVrzy^$!OGpUX2rUC]Wwz.J5^*~(*BiDTrmodOA%K X' );
define( 'LOGGED_IN_SALT',    'Ntttn?%:4#-JV}*LTO0iFgP%JeSdVu#zuf8?+.H?Si>gU*/q*lnSFn >AlCF3{wW' );
define( 'NONCE_SALT',        'O8,O([,FmBQuuE`GS;>~H/ZNsa9@S6xHXvuZ9;-$ZRD-w.O>P~Hk!O|QK`F0}lK=' );
define( 'WP_CACHE_KEY_SALT', ']Iu1B>A>.,t]0WeF[S.vGB}&b1E+Odkjiz9MK.lB[`Q=cc|JEyE;`s)~UYoD=hu-' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '370c850a14cac1c2e4fb4a5d191e7923' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
