<?php

class App_Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $host = HOST;
        $db   = DB_NAME;
        $user = USER;
        $pass = PASS;
        $port = PORT;
        $charset = CHARSET;

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new App_Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
