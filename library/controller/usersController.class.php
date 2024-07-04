<?php

require_once __DIR__ . '/../model/libraryservice.class.php';
require_once __DIR__ . '/../model/userservice.class.php';
require_once __DIR__ . '/../model/user.class.php';
require_once __DIR__ . '/../model/adminpostavkeservice.class.php';

class UsersController
{
    public function index()
    {
        // Dohavtimo sve demose i njihove informacije

        $us=new UserService();
        $users=$us->getusers();

        require_once __DIR__ . '/../view/demosi/opci-podaci_html.php';
    }

    public function brojsati()
    {
        // Dohvaćamo broj sati za pojedinog korisnika
        $as = new AdminPostavkeService();
        error_log('POST data: ' . print_r($_POST, true));
        if (isset($_POST['username'])) {
            $username  = $_POST['username'];

            $row = $as->getsati($username);
            $mjesecniSatiUsera = $row['mjesecni_sati'];

            require_once __DIR__ . '/../view/demosi/broj-sati-demosa_html.php';
        }
    }
};
