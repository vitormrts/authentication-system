<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/core/Core.php';
require_once 'src/controller/LoginController.php';
require_once 'vendor/autoload.php';
require_once 'src/model/User.php';
require_once 'lib/database/Connection.php';

$core = new Core;
echo $core->start($_GET);


?>

