<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Http\Response;

class HomeController
{
    public function index(Request $request)
    {
        // print_r($request->uri());
        echo "Hello from HomeController@index {$request->data} <br>";
        return new Response("Response from HomeController@index {$request->data} <br>");
    }
}
