<?php

namespace App;

use App\Http\Request;
use App\Http\Response;

class Router
{
    protected $routes = [];
    public function __construct()
    {
        $this->routes = [
            "GET" => ["/" => ['uses' => "HomeController@index"]], // array to store the GET routes
            "POST" => [], // array to store the POST routes
            "PUT" => [], // array to store the PUT routes
            "DELETE" => [], // array to store the DELETE routes
        ];
    }
    public function dispatch(Request $request)
    {
        $method = $request->method();
        $path = $request->uri();
        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path]['uses'];
            list($controller, $method) = explode('@', $action);
            $controller = "App\Http\Controllers\\{$controller}";
            return (new $controller())->{$method}($request); // phase 7 : dispatch the request to the controller
        }
        return new Response("404 Not Found", 404);
    }
}
