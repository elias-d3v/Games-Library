<?php

$router->addRoute( 'notFound', 'MainController::pageNotFound' );


// PAGE DE CONNEXION //

$router->addRoute( 'auth', 'AuthController::showAuth' );
$router->addRoute( 'login' , 'AuthController::showLogin');
$router->addRoute( 'checkLogin' , 'AuthController::checkUser');

$router->addRoute( 'register' , 'AuthController::showRegister');
$router->addRoute( 'addUser' , 'AuthController::addUser');
$router->addRoute( 'logOut' , 'AuthController::logOut');


// PAGE D'ACCUEIL //

$router->addRoute( 'home' , 'MainController::showHome');

// PAGE GAME //

$router->addRoute( 'games' , 'GameController::showGame');
$router->addRoute( 'addGame' , 'GameController::addGameToLibrary');


// PAGE LIBRARY //

$router->addRoute( 'library' , 'GameController::showLibrary');

// PANEL ADMIN //

$router->addRoute( 'admin' , 'AdminController::showPanel');




