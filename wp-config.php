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
define( 'DB_NAME', 'makeb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'DISj/z{2>[?QUi],T*p[`KG1{7Gq~? 5f)HBvxas[oF(U(y)+#{]tA:N nXoU/-[' );
define( 'SECURE_AUTH_KEY',  '+8RiAF(5H>&^BFqNc{@=C1C<Z w7(+W:iAiv}M_4xwc#b(kxn?GR=PE^AIqf=i8y' );
define( 'LOGGED_IN_KEY',    'Ab]op5RB#3;Z]:tJfSW](p/~->4(wB :DoREm/~5(7d6uWbz78><w$E7N~MqnaD8' );
define( 'NONCE_KEY',        'U{FeL4Rn>)tj<$?1>KeX4fviiBJ&|N*]AcRSg4o1vItx{#tQ)W9I$JTk5={CJv>$' );
define( 'AUTH_SALT',        'j-S7G]mbJ}Cd}js?HHJ!Pwcu=s|a{l$gZo(gioG40>`OsHb&~%vo%5hI_kn[uWt;' );
define( 'SECURE_AUTH_SALT', '!u}XnZ>sE0RpKqkip&92eTOerfgzbdu/$17JjS3xViQ79:b;LoQVcS}*={;~MR1+' );
define( 'LOGGED_IN_SALT',   '?l_H8+5[~@KM#M5;pj>I$6K$&&VZ#9p4TeVXl=$h{!E`bZ2V]@MlI;t3ATp}2XSW' );
define( 'NONCE_SALT',       's:^+w]t1&TR}gt]IsqB`]p3!3zu^q@tIqow!~e0;}+=Ad#w5b6(bX.GfyejX}n-(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
