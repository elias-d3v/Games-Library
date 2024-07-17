<?php

namespace Controllers;

use Core\AbstractController;

use Services\AuthService;


class AdminController extends AbstractController
{
    public function showPanel()
    {
        $this->render('admin.phtml');
    }

    
}