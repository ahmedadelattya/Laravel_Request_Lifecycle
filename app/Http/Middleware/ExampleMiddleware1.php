<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware1
{
    public function handle($request, Closure $next)
    {
        // request phase we can modify the request (runs before the request is dispatched to the router (BEFORE CONTROLLER))
        echo "(BEFORE CONTROLLER) - Middleware 1   validate order<br>";
        $request->data = strip_tags($request->data); // sanitize the data
        $response = $next($request); // calls the next middleware or the controller
        // response phase we can modify the response (runs after the request is dispatched to the router (AFTER CONTROLLER))
        echo "(AFTER CONTROLLER) - Middleware 1 if validation is succesful and created order then Sends confirmation email (last step) <br>";
        $response->content .= "Modified by Middleware 1<br>";
        return $response;
    }
}
