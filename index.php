<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define("BASE_URL", "/Teampoint/");
session_start();
echo file_exists(__DIR__ ."DV_Controllers.php") . __DIR__ ."DV_Controllers.php ka";
require_once __DIR__ . "DV_Controllers.php";

$router = new Router($_GET['url'] ?? 'Index/index');
$router->dispatch();
?>