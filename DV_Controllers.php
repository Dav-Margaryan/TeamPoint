<?php
    spl_autoload_register('MyAutoLoader');
    function MyAutoLoader($className): void
    {
        $exit = $fileName = $directory = '';
        $path = "C:/xampp/htdocs/Teampoint";
        $folders = scandir($path);
        $className = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        while ($directory == '') {
            for ($i = 0; $i < count($folders); $i++) {
                $fileName = $exit . $folders[$i] . DIRECTORY_SEPARATOR . $className;
                $directory = (file_exists($fileName)) ? $fileName : $directory;
            }

            if (empty($directory)) {
                $exit .= '../';
            } else {
                require_once($directory);
                break;
            }
        }
    }
