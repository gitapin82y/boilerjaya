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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u1573484_d_99823' );

/** Database username */
define( 'DB_USER', 'u1573484_d_99823' );

/** Database password */
define( 'DB_PASSWORD', 'wpxl1t6h9lmz' );

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
define( 'AUTH_KEY',         'rzzrkhdsif2n8guo7ybgpsat1xpnlrkbrby0xj44u2txldeaklrnzt9d8mwm6sz9' );
define( 'SECURE_AUTH_KEY',  '53m3dteszugkcanuf2mpvuer149yk2vjidamzlnnjqbpxs62ppiaxdrazip9sdaq' );
define( 'LOGGED_IN_KEY',    'cpib71ghmlycsjhaanhtrgpn87xiwzuqwpqqakxqqrdtdrfm1nqe91xq9b4f6hnp' );
define( 'NONCE_KEY',        'rhqshz0k2fxk9a8sftjdnxe1syqxg7wue6weij5qc0ls8nqilzvl79pmwm0jhwd3' );
define( 'AUTH_SALT',        'trvy3ofce7rwwshtwrzniur0bftnw41fx7yk2kbgi7x7p4l2ual2nqpqa4oqrdza' );
define( 'SECURE_AUTH_SALT', 'kwj2bxtyx2s8rzafzgclreq6zaymzxnu0rrbdhscmholtexv1whpvjz2bcaehk17' );
define( 'LOGGED_IN_SALT',   'ud3gnbiw44b4ebsshswqie9n4t8zmt0vvalzi1vi4nhlmwikqlrwpkbowywoeffh' );
define( 'NONCE_SALT',       '9rxdex3do3djupwrrh6ibx2iwk8z15ww84lqygu3stysudcnmgzraraibjqrartb' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
