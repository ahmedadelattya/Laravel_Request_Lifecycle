<?php

namespace App;

use App\Http\Kernel;

class Application
{
    protected $bindings = []; // array to store the bindings (services) that can be resolved from the container


    public function __construct()
    {
        $this->registerBaseBindings();
    }
    protected function registerBaseBindings()
    {
        $this->bind("HttpKernel", function () {
            return new Kernel($this);  
        });
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
