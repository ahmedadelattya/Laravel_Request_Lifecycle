<?php

namespace App\Http;

use App\Application;

class Kernel
{
    // the concrete implementation of the HttpKernel
    public function __construct(protected Application $app) {}
    public function handle()
    {
        $this->app->bootProviders();
    }
}
