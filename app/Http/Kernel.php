<?php

namespace App\Http;

use App\Application;
use App\Router;

class Kernel
{
    // the concrete implementation of the HttpKernel
    public function __construct(protected Application $app) {}
    public function handle(Request $request)
    {
        $this->app->bootProviders();
        return (new Router())->dispatch($request); // phase 6 : dispatch the request to the router
    }
}
