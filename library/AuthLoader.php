<?php
spl_autoload_register(function ($class) {

    $baseDirs = [
        __DIR__ . '/',
        __DIR__ . '/../models/',
        __DIR__ . '/../modules/',
    ];


    $class = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $class;
        if (is_file($file)) {
            require_once $file;
            break;
        }
    }
});
