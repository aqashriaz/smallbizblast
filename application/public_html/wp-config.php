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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eliniyzx_wp110');

/** MySQL database username */
define('DB_USER', 'eliniyzx_wp110');

/** MySQL database password */
define('DB_PASSWORD', 'FpSs180l!]');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '52kk1ncuoyf0zwju1tvqofpfqy1se2y04hz6bpaxipfpnmfsidsfiie9op35laux');
define('SECURE_AUTH_KEY',  'pdeq4vhvvssqyrmw2rmekvshs38fpoxicbyrwixpuuka4dvlrdbunaai3wihupsb');
define('LOGGED_IN_KEY',    'eqrpvgcbhbpirbd5mnuwejowtms4tocdh2gen2qds8waunepnnobzmne6f1i8isk');
define('NONCE_KEY',        'wrti5bynipklqlplof46m3cjkfwauzapjuwavpnfvrfz4pgks3futmdwcdibaoqz');
define('AUTH_SALT',        'dmyrjp7rxkod543kdxqdjlidjhwigcs0kv3un5ca3cd9ezpkfn4294mxlombx0bt');
define('SECURE_AUTH_SALT', 'fougsujxks2zy8154bei2pyqifgpappocxipohjioovtws8xeuhfqu3z3p928zrf');
define('LOGGED_IN_SALT',   'mwhtpkwgmm2immprjplxgvubmbvoaclal2oqzn8yqhxvsy7oiyf35w6pvzickswa');
define('NONCE_SALT',       '47jkoetooqty36lghmsdfcw3okkjqws1q5fd4nc7bgmy2ixcvr4yjsxign9elbmp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpwc_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
