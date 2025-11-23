<?php

namespace App\Http\Middleware;

use App\Http\Response;
use Closure;

class ExampleMiddleware2
{
    public function handle($request, Closure $next)
    {
        // request phase we can modify the request (runs before the request is dispatched to the router (BEFORE CONTROLLER))
        echo "(BEFORE CONTROLLER) - Middleware 2 Authorizes the payment (e.g., checks credit card validity)<br>";
        // return new Response("middleware 2 stopped the request <br>", 403);
        $response = $next($request); // calls the next middleware or the controller
        // response phase we can modify the response (runs after the request is dispatched to the router (AFTER CONTROLLER))
        echo "(AFTER CONTROLLER) - Middleware 2 Finalizes transaction (Your card has been charged $100. message)<br>";
        $response->content .= "Modified by Middleware 2 <br>";
        return $response;
    }
}
