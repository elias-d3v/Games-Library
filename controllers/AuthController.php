<?php

namespace Controllers;

use Core\AbstractController;
use Managers\UserManager;
use Services\AuthService;


class AuthController extends AbstractController{

    public function showAuth()
    {
        AuthService::showLog();

        $this->render('auth.phtml');
    }

    public function showRegister()
    {
        AuthService::showLog();

        $this->render('register.phtml');
    }

    public function showLogin()
    {
        AuthService::showLog();

        $this->render('login.phtml');
    }

    public function logOut()
    {
        session_start();
        session_destroy();

        header('Location: index.php?route=auth');
        exit();
    }

    

    public function checkUser()
    {
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password']))
        {
            $userManager = new UserManager();
            $user = $userManager->getUser($_POST['username']);


            if($user)
            {
                $username = $user->getUsername();
                $password = $user->getPassword();


                if(password_verify($_POST['password'], $password))
                {
                    $_SESSION['loggedUser'] = $username;
                    header('Location:index.php?route=home');
                    exit();
                } else {

                    $_SESSION['error'] = "Le nom de passe est incorrect";
                    header('Location:index.php?route=login');
                    exit();
                }

            } else {

                $_SESSION['error'] = "Le nom d'utiliseur est introuvable";
                header('Location:index.php?route=login');
                exit();
            }

            

        } else {

            $_SESSION['error'] = "Au moins un des champs est vide";
            header('Location:index.php?route=login');
            exit();
        }
        

    } 

    public function addUser()
    {
            // Vérifie si tous les champs sont rempli
        if (isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['password1']) && !empty($_POST['password1']))
        {
             // Commençant par une lettre suivie de 7 à 14 caractères alphanumériques (sans underscores ni caractères spéciaux).
             $regexUsername = '/^[a-z][^\W_]{4,14}$/i';

             // Ce regex valide un mot de passe de 5 à 20 caractères contenant au moins une lettre minuscule et un chiffre, sans caractères : & . ~ ou espaces.
             $regexPassword = '/^(?=[^a-z]*[a-z])(?=\D*\d)[^:&.~\s]{5,20}$/';
 
             if(preg_match($regexUsername, $_POST['username']) && preg_match($regexPassword,$_POST['password']))
             {
                // Instance pour recup les infos sur la DB
                $userManager = new UserManager();
                $user = $userManager->getUser($_POST['username']);

                    // Vérification si le user n'existe pas
                if(!$user){

                    // Vérifie si les deux MDP ne sont pas identiques
                    if($_POST['password'] !== $_POST['password1'])
                    {
                        $_SESSION['error'] = "Les deux mots de passe ne sont pas identiques.";
                        header('Location:index.php?route=register');
                        exit();

                        // VERIFIE LE MDP EN BASE DE DONNEE
                    } else {

                        $newUser = [
                            'username' => $_POST['username'],
                            'password' => $_POST['password']
                        ];

                        $user->createUser($newUser);

                        $_SESSION['loggedUser'] = $_POST['username'];

                        header('Location: index.php?route=login');
                        exit();
                    }

                    // Si le username n'est pas dispo alors error 
                } else {

                    $_SESSION['statusUsername'] = "Le nom d'utilisateur choisi n'est pas disponible.";
                    header('Location: index.php?route=register');
                    exit();
                }
                
                // MESSAGE D'ERREUR REGEX USERNAME 
             } else if (!preg_match($regexUsername, $_POST['username'])){
                 $_SESSION['statusUsername'] = "Votre nom d'utilisateur ne respecte pas le bon format.";
                 header('Location: index.php?route=register');
                 exit();

                // MESSAGE D'ERREUR REGEX MDP 
             } else {
                 $_SESSION['statusPassword'] = "Votre mot de passe ne respecte pas le bon format.";
                 header('Location: index.php?route=register');
                 exit();
             }
            

                // MESSAGE D'ERREUR CHAMP VIDE
        } else
        {
            $_SESSION['error'] = "Au moins un des champs est vide.";
            header('Location:index.php?route=register');
            exit();
        }
    }
    
}