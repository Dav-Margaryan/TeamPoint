<?php
//base url
define("BASE_URL", "/");

// DataBase configs
define('HOST',getenv('DB_HOST'));
define('DB_NAME',getenv('DB_NAME'));
define('USER',getenv('DB_USER'));
define('PORT',10903);
define('PASS',getenv('DB_PASS'));
define('CHARSET','utf8mb4');

// Email configs
define("EMAIL_HOST",getenv('SMTP_HOST'));
define("EMAIL_USER",getenv('SMTP_USER'));
define("EMAIL_HASH",getenv('SMTP_PASS'));

define('BREVO_API_KEY',getenv('BREVO_API_KEY'));