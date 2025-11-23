<?php
//show errors for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/../vendor/autoload.php'; // phase_1 : autoload the dependencies (load the autoloader)

use App\Application;
use App\Http\Request;

$app = new Application(); // phase_2 : create the instance of the application (service container)

// fetch the necessary services from the service container
// the abstract implementation of the HttpKernel (HttpKernel interface)
$kernel = $app->make("HttpKernel");  // serves as a service locator for the application (central location  which all requests flow through)
// lets use our service container to get the services from the service container
// $exampleService = $app->make("example.service");
// echo $exampleService->sayHello() . "<br>";
// $exampleService2 = $app->make("example.service2");
// echo $exampleService2->sayHello() . "<br>";
$request = new Request();
// echo $request->method() . "<br>";
// echo $request->uri() . "<br>";
$response = $kernel->handle($request); // phase_6 : handle the request (middleware pipeline) 
$response->send();
