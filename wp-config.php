<?php
/**
 * The base configuration for WordPress
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mkaryemedicaltechnologies' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 */
define('AUTH_KEY',         '/62i{/V,WqIdk3@;:M1hZEP`7c?t+BY]j?~Yd?XDSVOIEHk4=!t8iKKEf|c;X*!?');
define('SECURE_AUTH_KEY',  'IPkUiG{/M=k#Dl8Zo[[f[mf7=%^I[{$Am1R`)~n^-&DghxJi~UhLiy~ql)tGjXCW');
define('LOGGED_IN_KEY',    '7}|X!J)(FI9qrfCH`{Ov0KsPi0dR&b<gj k2xl:> |*+1os5(_{1>42|Xd*I$cEM');
define('NONCE_KEY',        '#1OQ-eJ&o@fJ+`sGxwrORv2l-H=2GG2cQMz]N7zW$hz1[Ar;>@HJdjP+7}UN_Q!G');
define('AUTH_SALT',        'e4??&2#Ud.}nas),9CTDW3(QUI24,>:HQFg-uY|!YfM 6~i/VV 4QODT;1|vW$J*');
define('SECURE_AUTH_SALT', 'G1AP@w!+wq-qdxA@|<B.w4$y#=@;y^f:^*/Dk$fC*d-f-* WY|~N1$p[wiv]8/T+');
define('LOGGED_IN_SALT',   '*`Sd.p Y.-$O/-v>**1rXS}5Fqe,YX:+;B2|TlfL-C $@A$[Ws|Y<sdDT1>M!qJ>');
define('NONCE_SALT',       'Sk7|3aFN;gdGUt>0^c@ly1S)-tuq8*$B2Hkx$g[E_ZwbGoz.5Ksl,JlJZr&ZAUxz');
/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );


// for connection req
define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
