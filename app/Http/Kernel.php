<?php

namespace App\Http;

use App\Application;
use App\Http\Middleware\ExampleMiddleware1;
use App\Http\Middleware\ExampleMiddleware2;
use App\Router;

class Kernel
{
    protected $middleware = [
        ExampleMiddleware1::class,
        ExampleMiddleware2::class,
    ];
    // the concrete implementation of the HttpKernel
    public function __construct(protected Application $app) {}
    public function handle(Request $request)
    {
        $this->app->bootProviders();
        // $myFunction = function ($acc, $item) {
        // return $acc + $item;
        // };
        // $ar = [10, 15, 20];
        // print_r(array_reduce($ar, $myFunction, 5));

        // $result = array_reduce([1, 2, 3], function ($acc, $item) {
        //     return function () use ($acc, $item) {
        //         return $acc() + $item;
        //     };
        // }, function () {
        //     return 0;
        // });
        // echo($result());
        $pipeline = array_reduce(
            array_reverse($this->middleware), // Reverse order for correct execution
            fn($next, $middleware) => fn($request) => (new $middleware)->handle($request, $next),
            fn($request) => (new Router())->dispatch($request) // Final destination: Controller 
        );
        return $pipeline($request); 
    }
}
