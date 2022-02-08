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
define( 'DB_NAME', 'cosmic_database' );

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
define( 'AUTH_KEY',         'X5n!VM+D]sM DysVI(|L}O]TkACcD^Rd+L_8{rM3T/#4a,:B5^n>f<E.sgSq]%{?' );
define( 'SECURE_AUTH_KEY',  'PE~gc[}mgunZ`m*t}_}P<deT-)$UR^09=2P%nT*a=#@6|Dane*ip[jbFN ~uRWar' );
define( 'LOGGED_IN_KEY',    'r5(2bE`h6#Ih_7P+mD3FzgYp]g@M?$Nxy6Nd-m`r[*am3<Uh;l22w{K;;(6c6 O.' );
define( 'NONCE_KEY',        'Z5|$Pdtn@jW@_)5e)^0:k/`Pd[Sct.bfE4Czu_n1T^{7GFk!V-W 8BLf}`mKDsSD' );
define( 'AUTH_SALT',        'U`P{W1_`BbO/s+3s=;dAqYr(zo8_wdg~&gU<eYoPl-X2eU;yU29BGsr UTSlE+)`' );
define( 'SECURE_AUTH_SALT', 'Jq1U/o=zc$.B6 &y^AlPU89sn: ^cgZOaQ;js=hT}p~D{ r>LS9DGO#rK<f!>POh' );
define( 'LOGGED_IN_SALT',   'Cc{8#qQN)iC<C*_e%?joGo2m+53P5#mXPH!&rim~AFB>||D{_W(~o}]=o@PW/nDu' );
define( 'NONCE_SALT',       'L|q%*8Vcp9@$7 Vy5dxV1}6fLj-ILT(WvkLyb++Kx20dokb,G)TX/=lLtuot.8:i' );

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
