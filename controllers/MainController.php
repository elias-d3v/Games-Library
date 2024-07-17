<?php

namespace Controllers;

use Core\AbstractController;
use Services\AuthService;
use Managers\UserManager;

class MainController extends AbstractController
{

    public function showHome()
    {
        AuthService::loggedOnly();

        $userMananger = new UserManager();
        $user = $userMananger->getUser($_SESSION['loggedUser']);

        $this->render('home.phtml', [
            "user" => $user
        ]);
    }

    

    public function pageNotFound()
    {

        // Redirection en fonction de la session
        AuthService::notFound();


        $this->render('notFound.phtml');

    }
    
}