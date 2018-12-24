<?php

//echo  dirname(__FILE__)."/wp-rbuilt.php";

define('WP_MEMORY_LIMIT', '5000M');
require_once( 'wp-rbuilt.php' );
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_HOME','http://localhost/razorbee/razorbee.com');
	define('WP_SITEURL','http://localhost/razorbee/razorbee.com');
	define('DB_NAME', 'razorbee.com');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');

/*
define('DB_NAME', 'moktarul_wp8');
define('DB_USER', 'moktarul_wp8');
define('DB_PASSWORD', 'O^ByAu(0jLZ]Gqi*1(&75.#0');
*/

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z0XYrCIoZK1gA9Ut5FoJUt9On8o6bOsKpjHaUdJWXKeZaQFUwdeQ0jPe2CoVETy8');
define('SECURE_AUTH_KEY',  'zzw5GNWZiYROKemIm8kEPcBQ2JZNsjtTPaUZ5tcWvBwvzB2JmTBOUJhgE2yMloEo');
define('LOGGED_IN_KEY',    'NgutRTNdRWxrspIvfmaCNw7sfobXuiMF4RV9weduNxGkzrfIzCYTEIdIl7xE7g4j');
define('NONCE_KEY',        'tJsswoO79xrsr1ldPVm0vIBEbpt2LY1aBsMFqDAx9gSq0erwHvJB7GAXtEKQ9cEV');
define('AUTH_SALT',        'F5PYB3OTn6bSAE8bVEcYmkOz4mPCb24irm5fBsYVAqzfMhxV4CpdRyFsdV9UQ2g6');
define('SECURE_AUTH_SALT', 'TjipPXmqQNgA6nq4HrGTv37RwvY4zSbLSGHc6NY7BnVnSUbp4opb57JAeivujdMm');
define('LOGGED_IN_SALT',   'VxZ8oZ9oOyFUGjtsBThPWkpS9qDcKw5ittSkwVWACJG2JXv7dnqOg6Q7VHSUYrvb');
define('NONCE_SALT',       'rTl5riva2uM53dK9l9FSPcotAD0GiFv13MVsRJGR690VigtM4kUNbIyz6MPkDsMb');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__DIR__).'/wp-content/uploads');
define( 'UPLOADS', 'wp-content/'.'uploads' );

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_AUTO_UPDATE_CORE', false );
define('WP_DEBUG', false);
ini_set('display_errors','Off');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
