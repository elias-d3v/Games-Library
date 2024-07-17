<?php

namespace Controllers;

use Core\AbstractController;

use Managers\UserManager;
use Managers\GameManager;
use Managers\LibraryManager;

use Entities\User;
use Entities\Library;

use Services\AuthService;


class GameController extends AbstractController
{
    public function showGame()
    {
        $gameManager = new GameManager();
        $this->render('game.phtml', [
            'games' => $gameManager->findAll()
        ]);
    }


    // A VOIR AVEC MATTHIEU
    public function showLibrary()
    {
        
        $userManager = new UserManager();
        $idUser = $userManager->getUser($_SESSION['loggedUser']);
        $idUser = $idUser->getId();

        $gameManager = new GameManager();



        $this->render('library.phtml',[
            'games' => $gameManager->findAll(),
            'loggedUserGames' => $gameManager->showGameById($idUser)
        ]);
        

    }
    
    public function addGameToLibrary()
    {
        \Sevices\AuthService::loggedOnly();
        
        if (isset($_GET['gameid']) && !empty($_GET['gameid']))
        {
            $userManager = new UserManager();
            $idUser = $userManager->getUser($_SESSION['loggedUser']);

            $queryLibrary = [
                'userId' => $idUser->getId(),
                'gameId' => $_GET['gameid']
            ];

            $gameManager = new GameManager();
            $gameManager->addGame($queryLibrary);

            header('Location: index.php?route=library');
            exit();

        } else {
            header('Location: index.php?route=games');
            exit();
        }
        

    }


}