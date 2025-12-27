<?php
//base url
define("BASE_URL", "/TeamPoint/");

// DataBase configs
define('HOST','localhost');
define('DB_NAME','teampoint');
define('USER','root');
define('PORT',3307);
define('PASS','');
define('CHARSET','utf8mb4');

// Email configs
define("EMAIL_HOST",'smtp.gmail.com');
define("EMAIL_USER",'app.teampoint@gmail.com');
define("EMAIL_HASH",'fedi rjbh hdvh uqqh');

// Email configs Brevo
 define('BREVO_API_KEY',getenv('BREVO_API_KEY'));