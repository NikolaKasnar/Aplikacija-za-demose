<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class PostavkeController
{
    public function index()
    {
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function account()
    {
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function promjenasifre()
    {
        require_once __DIR__ . '/../view/postavke/promjenasifre_html.php';
    }

    public function darklight()
    {
        require_once __DIR__ . '/../view/postavke/dark-light_html.php';
    }

    public function registracija()
    {
        require_once __DIR__ . '/../view/postavke/registracija_html.php';
    }
};
