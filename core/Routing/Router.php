<?php

namespace Core\Routing;

use Controllers\MainController;

class Router
{
    private array $routes;
    
    public function addRoute( string $name, string $handler )
    {
        $this->routes[$name] = $handler;
    }
    
    public function route()
    {
        if( array_key_exists( 'route' , $_GET) )
        {
            if( array_key_exists( $_GET['route'] , $this->routes ) )
            {
                $routeHandler = $this->routes[ $_GET['route'] ]; // 'ChatController::showChat'
                
                $xplodedHandler = explode( '::', $routeHandler );
                
                $controller = 'Controllers\\'.$xplodedHandler[0];
                $method     = $xplodedHandler[1];
                
                $controllerInstance = new $controller();
                $controllerInstance->$method();
            }
            else
            {
                $controllerInstance = new MainController();
                $controllerInstance->pageNotFound();
            }
        }
        else
        {
           // 404
        }
    }
}