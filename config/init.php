<?php 

// Start session 

session_start();



// Config File

require_once 'config.php';

// Include helpers

require_once  BASEURL . '/helpers/system_helper.php';

// Autoloader

spl_autoload_register('myAutoLoaderPerson');

    function myAutoLoaderPerson($className) {
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        if (strpos($url, "includes") !== false) {
           $path = '../classes/';
        } else {
            $path = BASEURL . '/classes/';
        }
        $extension = '.class.php';
        $fullPath = $path . $className . $extension;

        

        require $fullPath;
    }