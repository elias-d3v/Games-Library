<?php

namespace Managers;


use Core\AbstractManager;
use Entities\Library;



class LibraryManager extends AbstractManager
{

    public function __construct()
    {
        $this->model = Library::class;
    }


    
}