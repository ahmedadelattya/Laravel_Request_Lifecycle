<?php

namespace App\Providers;

use App\Application;

class ExampleServiceProvider
{
    protected $app;
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    public function register()
    {
        $this->app->bind("example.service", function () {
            return new class {
                public function sayHello()
                {
                    return "Hello from ExampleServiceProvider!";
                }
            };
        });
    }
    public function boot()
    {
        // echo "im boot from ExampleServiceProvider";
        //here you can add the code that you want to run after the service is registered
        //for example, you can add the code that you want to run after the service is registered
        // for example , you can extend the functionality of the service by adding a new method or a new property
    }
}
