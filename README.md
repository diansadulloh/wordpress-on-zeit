# WordPress on ZEIT Now

## Setting Up Your MySQL Database for WordPress on ZEIT Now
> Create a MySQL Database on your MySQL Remote server

> Create a New User for Your MySQL Database

> Grab The Hostname of Your MySQL Deployment

> Downloading Your ca.pem File

## Setting Up WordPress 5 on ZEIT Now
Install Now. `npm i -g now` if short on time.   Set up a database in a cloud SQL hosting provider like ScaleGrid. Make sure you pick a location that matches a Now deployment region.   Create a `wp-config.php` file and a `now.json` file.   Your `now.json` file will set up the `@now/wordpress` builder and a few routes:

`now.json`
```
{
    "version": 2,
    "builds": [
      { "src": "wp-config.php", "use": "@now/wordpress" }
    ],
    "routes": [
      { "src": "/wp-admin/?", "dest": "index.php" },
      { "src": ".*\\.php$", "dest": "index.php" }
    ],
    "env": {
      "DB_NAME": "@wordpress_db_name",
      "DB_USER": "@wordpress_db_user",
      "DB_PASSWORD": "@wordpress_db_password",
      "DB_HOST": "@wordpress_db_host",
      "WPSALT1": "@wpsalt1",
      "WPSALT2": "@wpsalt2",
      "WPSALT3": "@wpsalt3",
      "WPSALT4": "@wpsalt4",
      "WPSALT5": "@wpsalt5",
      "WPSALT6": "@wpsalt6",
      "WPSALT7": "@wpsalt7",
      "WPSALT8": "@wpsalt8"
    }
  }
  ```

  `wp-config.php`

  ```
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
define('DB_NAME', $_ENV['DB_NAME']);

/** MySQL database username */
define('DB_USER', $_ENV['DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_ENV['DB_HOST']);

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
define('AUTH_KEY',         $_ENV['WPSALT1']);
define('SECURE_AUTH_KEY',  $_ENV['WPSALT2']);
define('LOGGED_IN_KEY',    $_ENV['WPSALT3']);
define('NONCE_KEY',        $_ENV['WPSALT4']);
define('AUTH_SALT',        $_ENV['WPSALT5']);
define('SECURE_AUTH_SALT', $_ENV['WPSALT6']);
define('LOGGED_IN_SALT',   $_ENV['WPSALT7']);
define('NONCE_SALT',       $_ENV['WPSALT8']);

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
define('WP_DEBUG', false);

define( 'WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] );
define( 'WP_HOME', 'https://' . $_SERVER['HTTP_HOST'] );
define( 'WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

define( 'MYSQL_SSL_CA', ABSPATH . 'ca.pem' );
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
```

  ## create now secret
  ```
  now secret add wordpress_db_name VALUE
  ...
  ```

Finally we created a ca.pem file downloaded from ScaleGrid. This is necessary only when using MySQL over TLS.   That’s it! Then run now to deploy or git push if you configured Now + GitHub. 