<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'pinkwp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ys=pRA @LMVY&Zl%3L*unEiH)j>RdU^kyF%b=[2D0P;&{ciUUG3$b`V^7Jgen+%J' );
define( 'SECURE_AUTH_KEY',  '51S~VKG[:P_mj(T%WD}gw_p8sma%oPZZXQ*!=%LTRSiv]|~,hMnDX;dPDL>t@~&T' );
define( 'LOGGED_IN_KEY',    'EjvSAb|+rIS i+_hQLx-CLix2Zy(y3cK%MNJ4tNM*3Q}10 Yqy=<^ZA)@GR8e]J!' );
define( 'NONCE_KEY',        ';sdC94NJ TT/L!se&M3Ai&.eE]W8XT(% |_m!SZ_ZvcDr8YW*Z|}}Rfk@+vLqaT4' );
define( 'AUTH_SALT',        'G$p4L/_x|/&cV:f.DiKXqVhAmW7?_P<XY]X:rG)6-}U@okTklu}bH-R]d&k*QO!z' );
define( 'SECURE_AUTH_SALT', 'vLB6h`^P;s:Pn_c@0J-YJr=<,4+DE_[WukU3C4NGh30,r*q[&S1PjY86#!{ ;*mS' );
define( 'LOGGED_IN_SALT',   'hbW4FK%9[ie`lUMe>&=nNCwH@e&.x3]O1-D-Cuys#y/(bmrE/}0=qDO[bdQ{Pi_T' );
define( 'NONCE_SALT',       'm&;^>y#Pdh9olWNjwF2gk+.p~%_{Qy`SE0)|JT/CV_Hb0^X5HV=Z/QJyIp<P/)3^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pink';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
