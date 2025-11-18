<?php

namespace App\Http;

class Kernel
{
    // the concrete implementation of the HttpKernel
    public function __construct()
    {
        echo "im HttpKernel";
    }
}
