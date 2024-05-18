<?php

require_once __DIR__ . '/../model/libraryservice.class.php';
require_once __DIR__ . '/../model/zaboravlozinkeservice.class.php';

class ZaboravlozinkeController
{
    
    public function index()
    {
        require_once __DIR__ . '/../view/login/zaborav-lozinke_html.php';
    }

};
