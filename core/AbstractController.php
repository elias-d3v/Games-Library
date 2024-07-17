<?php

namespace Core;

abstract class AbstractController
{
    protected function render( $view, $data = [] )
    {
        foreach( $data as $key => $value )
        {
            if( gettype($value) === 'string' )
            {
                $data[$key] = htmlspecialchars($value);
            }
        }
        extract( $data );
        
        include_once './views/layout.phtml';
    }
    
    protected function redirectTo( $routeName, $data = [] )
    {
        $queryString = '';
        if( count( $data ) > 0 )
        {
            foreach( $data as $key => $value )
            {
                $queryString .= "&$key=$value";
            }
        }
        
        header( 'Location: index.php?route='. $routeName . $queryString );
        exit();
    }
}