<?php
//show errors for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/../vendor/autoload.php'; // phase 1 : autoload the dependencies (load the autoloader)

use App\Application;


$app = new Application(); // phase 2 : create the instance of the application (service container)
