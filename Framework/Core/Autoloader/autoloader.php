<?php
spl_autoload_register(function ($class) {
    $file =  "../" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        echo $file;
        require_once($file);
    }
});