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
        $username  = $_POST['username'];

        // Dohvaćanje koda za aktuarski dio tablice aktuarski.json
        $tekuci_tjedan = array();
        $dir = __DIR__ . '/../../server/aktuarski.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($tekuci_tjedan[$str])) {
                            $tekuci_tjedan[$str]++;
                        } else {
                            $tekuci_tjedan[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za aktuarski dio tablice aktuarski.json
        $iduci_tjedan = array();
        $dir = __DIR__ . '/../../server/aktuarski_iduci.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($iduci_tjedan[$str])) {
                            $iduci_tjedan[$str]++;
                        } else {
                            $iduci_tjedan[$str] = 1;
                        }
                    }
                }
            }
        }

        require_once __DIR__ . '/../view/demosi/broj-sati-demosa_html.php';
    }
};
