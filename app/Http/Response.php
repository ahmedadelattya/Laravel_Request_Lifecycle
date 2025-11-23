<?php

namespace App\Http;

class Response
{
    public function __construct(public string $content, public int $status = 200, public array $headers = []) {}
    public function send()
    {
        http_response_code($this->status);
        echo $this->content;
    }
}
