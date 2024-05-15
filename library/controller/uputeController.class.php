<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class UputeController
{
    public function index()
    {
        require_once __DIR__ . '/../view/login/login_html.php';
    }

    public function aktuarski()
    {
        require_once __DIR__ . '/../view/upute/aktuarski_html.php';
    }

    public function doktorski()
    {
        require_once __DIR__ . '/../view/upute/doktorski_html.php';
    }

    public function praktikumi()
    {
        require_once __DIR__ . '/../view/upute/praktikumi_html.php';
    }

    public function printanje()
    {
        require_once __DIR__ . '/../view/upute/printanje_html.php';
    }
};
