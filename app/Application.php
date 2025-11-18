<?php

namespace App;

use App\Http\Kernel;
use App\Providers\ExampleServiceProvider;
use App\Providers\ExampleServiceProvider2;

class Application
{
    protected $bindings = []; // array to store the bindings (services) that can be resolved from the container
    protected $providers = []; // array to store the providers that will be registered


    public function __construct()
    {
        $this->registerBaseBindings();
        // phase 3 : register the providers
        $this->registerProviders(new ExampleServiceProvider($this));
        $this->registerProviders(new ExampleServiceProvider2($this));
    }
    protected function registerBaseBindings()
    {
        $this->bind("HttpKernel", function () {
            return new Kernel($this);
        });
    }
    public function registerProviders($provider)
    {
        $this->providers[] = $provider;
        $provider->register(); // phase 4 : register the services
    }
    public function bootProviders()
    {
        foreach ($this->providers as $provider) {
            $provider->boot(); // phase 5 : boot the services
        }
        
    }
    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }
    public function make($abstract)
    {
        if (isset($this->bindings[$abstract])) {
            return call_user_func($this->bindings[$abstract]);
        }
    }
}
