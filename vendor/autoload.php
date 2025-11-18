<?php
// simple autoloader function for simulation
spl_autoload_register(function ($class) {
    //convert the namespace to file path 
    $file = __DIR__ . '/../' . str_replace(['App\\', '\\'], ['app/', '/'], $class) . '.php';
    // check if the file exists
    if (file_exists($file)) {
        // require the file
        require $file;
    }
});
