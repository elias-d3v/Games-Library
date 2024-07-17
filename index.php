<?php

require_once './config/config.php';
require_once './core/functions/coreFunctions.php';

spl_autoload_register( function( $class ) {

    $classFilePath = './' . lcfirst( str_replace( "\\", "/", $class ) ) . '.php';
    
    if( file_exists( $classFilePath ) )
    {
        require_once $classFilePath;
    }
    
});

session_start();

$router = new Core\Routing\Router();

require_once './config/routes.php';

$router->route();