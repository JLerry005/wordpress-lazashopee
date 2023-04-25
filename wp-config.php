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
define( 'DB_NAME', 'LazaShopee' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'c14fEeIOcvvJ7HN6ZNOfYRyeEPx2nPbpICqxDKO9X086gse0Yk8zFgGYz796NP7R' );
define( 'SECURE_AUTH_KEY',  '3eSwdsApDW2gQdnmr8HOwkEydVRMNMrAc7HA4PpNOqOa2kwurmRsdmfdegRHCfpC' );
define( 'LOGGED_IN_KEY',    'cvB4EoLReAIeL8Az3TfMitxuWNOQaYkkMRbhw8L4wKUYHEmueoebsfkFTwLr4lf5' );
define( 'NONCE_KEY',        'xKn2td1zabLMjlbwj78YXSXzFtrogodqQxT5l3i3fe9dSztcDvuKaiwf2noVCMoi' );
define( 'AUTH_SALT',        '49Rkhgtll4LiIFXARmL1lDjWeQXQDOr0XCCr0EMDZuXj0jWvJSZGqaaCno7lBQtF' );
define( 'SECURE_AUTH_SALT', 'rKUCgrxZ3iMuF7g81ZToPRaht3mvHVmaEj3f3zFBOLmo6tXa63EVdc7TBvaUO9nD' );
define( 'LOGGED_IN_SALT',   'JSWG4F62zzCUkTSNOpmFStf3cOpqoqg27xRwJGYdBXcLLlltDDnKh9X77kn6Xg8I' );
define( 'NONCE_SALT',       '8vYY3P0GfPC8ilckY3u4nI6mr1N5swb3NehlCBRbqdCQHvm9YM2Z50TnksrEaz1F' );

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

