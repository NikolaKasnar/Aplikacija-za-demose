<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class UsersController
{
    public function index()
    {
        require_once __DIR__ . '/../view/users_index.php';
    }

};
