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

    // Required for batcache use
    define('WP_CACHE', true);

    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'wordpress_db');

    if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
        /** Live environment Cloud SQL login and SITE_URL info */
        /** Note that from App Engine, the password is not required, so leave it blank here */
        define('DB_HOST', ':/cloudsql/anvie-corporate:asia-east1:anvie-corporate-instance');
        define('DB_USER', 'wp_user');
        define('DB_PASSWORD', 'chrq8452');
    } else {
        /** Local environment MySQL login info */
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'password');
    }

    // Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
    {
        $protocol_to_use = 'https://';
    } else {
        $protocol_to_use = 'http://';
    }
    define( 'WP_SITEURL', $protocol_to_use . $_SERVER['HTTP_HOST']);
    define( 'WP_HOME', $protocol_to_use . $_SERVER['HTTP_HOST']);

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
    define('AUTH_KEY',         'z2BnMc<^zpH-E0(y*XVp,4;R/h^qB:Ag`7?Tpy%GJC:_z-fVNI_V+wN$m8ReO8Ui');
    define('SECURE_AUTH_KEY',  '15x!9wm!U_o()iUcX[Dq9I<Dz[_n6.Pa<Qz.A4weVWK$G`v^rQDS7NZ?897tm3]`');
    define('LOGGED_IN_KEY',    '>=Z3r8-8/4MBF)b54=6GSiMq@wmpN3Q- T6YZN&;*0|02.+= fDqAkif o]PFfS3');
    define('NONCE_KEY',        '@k0PYD|=h4Ik!VtPaRIiQ7FX0gl a-LZ$=0-j4/JfuX|05;/,4LDXcqW0-ATUvIF');
    define('AUTH_SALT',        'p^,_%{I9xNn:E=]u=c5+$$l./?ex1,~Ur~UeO+(4zhkV/Z14EE t-Nd%~$~eHQ~)');
    define('SECURE_AUTH_SALT', '+qLFbZT-)2w|K/h0EFoB_b)@h/xis NQjj>g$`Piab|NA^9{in`Op!%FJLPoToMj');
    define('LOGGED_IN_SALT',   '6uf`p4znuv~i^0XeHnLj1-&?5?[VwD? P2i-Rmi<hAN5j5:=N%}cL_=}WLL(O6tX');
    define('NONCE_SALT',       '!3_V~La1 dtI]0k)DL%[C@yq0Y~]wD;ea&aJJ.S?>G~P6#i~R1`9j3@|pf}C?^XH');

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
    define('WPLANG', '');

    /**
     * For developers: WordPress debugging mode.
     *
     * Change this to true to enable the display of notices during development.
     * It is strongly recommended that plugin and theme developers use WP_DEBUG
     * in their development environments.
     */
    define('WP_DEBUG', false);
    
    /**
     * Disable default wp-cron in favor of a real cron job
     */
    define('DISABLE_WP_CRON', true);
    
    // configures batcache
    $batcache = [
      'seconds'=>0,
      'max_age'=>30*60, // 30 minutes
      'debug'=>false
    ];
    /* That's all, stop editing! Happy blogging. */

    /** Absolute path to the WordPress directory. */
    if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/wordpress/');

    /** Sets up WordPress vars and included files. */
    require_once(ABSPATH . 'wp-settings.php');


