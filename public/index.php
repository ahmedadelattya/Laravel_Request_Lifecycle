<?php
//show errors for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/../vendor/autoload.php'; // phase 1 : autoload the dependencies (load the autoloader)

use App\Application;


$app = new Application(); // phase 2 : create the instance of the application (service container)

// fetch the necessary services from the service container
// the abstract implementation of the HttpKernel (HttpKernel interface)
$kernel = $app->make("HttpKernel");  // serves as a service locator for the application (central location  which all requests flow through)
