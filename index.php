<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'app/config/db_config.php';
require_once 'app/core/Core.php';
require_once 'vendor/autoload.php';
require_once 'app/config/db_connection.php';
require_once 'app/helpers/Helper.php';
require_once 'app/controller/UserController.php';
require_once 'app/controller/DashboardController.php';
require_once 'app/model/User.php';


$core = new Core();
echo $core->start($_GET);
?>

