<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'loopmaatjes');

/** MySQL database username */
define('DB_USER', 'databasemaatje');

/** MySQL database password */
define('DB_PASSWORD', 'myMaatje4daDb');

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
define('AUTH_KEY',         '&@ GnPT^0 UzE$`PTQH^zhZ@&HsIEO`|1v>kehjML[Hnm!~uQMpiEmUYV^+>:uh=');
define('SECURE_AUTH_KEY',  'GUJ/,eGYI<@B|1rJ{(+ZwJT2[=ZVuDIbx:A%|8w=?|l;%m}18@c9ONqV]/ha:GH*');
define('LOGGED_IN_KEY',    '_(%R[16k7C6.C+8:^*:sLZ9])STp)hCADlfZqkPnm;x@|+QcrwHSvg8iNRZnyu+J');
define('NONCE_KEY',        'M#R25N=1)4+=D0{ rJw|>o##Gv^w0R;ng4+YG5OFJ-GeKtyVcH:*1##-w pYU@$r');
define('AUTH_SALT',        'w4.zV98pN*FeRw_vz>R_OHIiK&Zs)D(bcC!Xfg!t3R`O?B_rmi03Z{C`U`<[BL31');
define('SECURE_AUTH_SALT', ',+.} 4_B S|Rm/BqPXz(ak!dmQf1K=+=_)2f71MR+~*`<~+dl/TBXuI4BEgE{}P+');
define('LOGGED_IN_SALT',   'qE=XJ>BNf2Gq<dh<NZ#g<W3[^1JI<&xeQ}{# |]G*|EGS48p!Y$A]y2O@0vr3%+-');
define('NONCE_SALT',       '|n=b&Wd:uHvo!sp[S4f3~+TV=1aD#1WjCOI:{8q?T?hltA612R0`eTo$N?s5NQQH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

define( ‘FS_METHOD’, ‘direct’ );
define( ‘FS_CHMOD_DIR’, 0777 );
define( ‘FS_CHMOD_FILE’, 0777 );

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
