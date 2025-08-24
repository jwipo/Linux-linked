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
define( 'DB_NAME', 'wpdb' );

/** Database username */
define( 'DB_USER', 'wpdbadmin' );

/** Database password */
define( 'DB_PASSWORD', 'admin001' );

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
define( 'AUTH_KEY',         '^7(c>x0zi{a1PzF9dA9/fGYKfof5sD7 Tx#K@$9%b+[?g4|MG{~md99-t+LJA:AH' );
define( 'SECURE_AUTH_KEY',  'KdN?$y:SRdn%RKv!MB)>Z{Ci,EK(K&J76S3%x0Vg#6Tc-Han;:pnJQqef!}>,5#~' );
define( 'LOGGED_IN_KEY',    'a!O m|g(`&*gh(c3SXB`V$K9Jb17p2;Fb>T_~P+-=(Gh$F/r(j]bYD{u(OD:o,ta' );
define( 'NONCE_KEY',        '8m[VNpz&qBgRfQ)<9>/4WxVd]L<:q3 ,7<+0|<33!1S0VoWlS`,*CdL:M3d?n5:o' );
define( 'AUTH_SALT',        '/UH)7G)CYGv~[~t;tR5mcSb-,NJ#zrEd8;9Z{#>$1q^Nd|U#dEx)jmxJ@ LPE1JK' );
define( 'SECURE_AUTH_SALT', 'i5.MV<9d|8?p%U+CGSBnz&q/Uk|e5z6ZRE]jaziqL!mS9VM<4[F,4E=Hyk0Y9{IF' );
define( 'LOGGED_IN_SALT',   'OiD}#~>)!ZlfIR|J84 Lfzv!}dX}(9Rsm|&(#dPvp{gpxJ&zg%qELD5;0)xGuwFH' );
define( 'NONCE_SALT',       'wDJ^`QOLLozjVIly= R<Um&pJ h4Dk3}amGvm V:TnzyU9QeVo))F{@YN%:MTJ1)' );

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
