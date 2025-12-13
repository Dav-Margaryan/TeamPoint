<?php
//    spl_autoload_register('MyAutoLoader');
//    function MyAutoLoader($className): void
//    {
//        $exit = $fileName = $directory = '';
//        $path = "C:/xampp/htdocs/Teampoint";
//        $path = __DIR__;
//        $folders = scandir($path);
//        $className = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
//        while ($directory == '') {
//            for ($i = 0; $i < count($folders); $i++) {
//                $fileName = $exit . $folders[$i] . DIRECTORY_SEPARATOR . $className;
//                $directory = (file_exists($fileName)) ? $fileName : $directory;
//            }
//
//            if (empty($directory)) {
//                $exit .= '../';
//            } else {
//                require_once($directory);
//                break;
//            }
//        }
//    }


spl_autoload_register(function ($class) {

    $baseDirs = [
        __DIR__ . '/Library/',
        __DIR__ . '/models/',
        __DIR__ . '/modules/',
    ];

    $class = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $class;
        if (is_file($file)) {
            require_once $file;
        }
    }
});
