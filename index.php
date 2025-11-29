<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define("BASE_URL", "/Teampoint/");
session_start();

require_once 'DV_Controllers.php';

$router = new Router($_GET['url'] ?? 'Index/index');
$router->dispatch();
?>