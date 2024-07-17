<?php

namespace Services;

use Managers\UserManager;

class AuthService {

    public static function loggedOnly(){

        if(!isset($_SESSION['loggedUser']))
        {
            header('Location: index.php?route=auth');
            exit();
        }
    }

    public static function notFound(){

        header('Location: index.php?route=home');
        exit();
    
    }
    
    public static function showLog()
    {
        if(isset($_SESSION['loggedUser']))
        {
            header('Location: index.php?route=home');
            exit();
        }
    }

    public static function getLogUser()
    {
        $userManager = new UserManager();

        return isset($_SESSION['loggedUser']) && $userManager->getUser($_SESSION['loggedUser']) ? $userManager->getUser($_SESSION['loggedUser']) : null;
    }
}

