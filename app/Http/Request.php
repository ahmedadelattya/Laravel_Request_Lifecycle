<?php

namespace App\Http;

class Request
{
    public $data;
    public function __construct()
    {
        $this->data = $_GET['param'] ?? '';
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
    public function uri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
