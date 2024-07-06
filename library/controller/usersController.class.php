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
        $ad = new AdminPostavkeService();

        // Dohvaćamo broj sati za pojedinog korisnika
        $username  = $_POST['username'];
        
        // Dohvaćanje sati demosa za pojedini tjedan u json fileovima
        $tekuci_tjedan_aktuarski = $ad->getJsonSati(__DIR__ . '/../../server/aktuarski.json');
        $iduci_tjedan_aktuarski = $ad->getJsonSati(__DIR__ . '/../../server/aktuarski_iduci.json');
        $tekuci_tjedan_doktorski = $ad->getJsonSati(__DIR__ . '/../../server/doktorski.json');
        $iduci_tjedan_doktorski = $ad->getJsonSati(__DIR__ . '/../../server/doktorski_iduci.json');
        $tekuci_tjedan_praktikumi = $ad->getJsonSati(__DIR__ . '/../../server/praktikumi.json');
        $iduci_tjedan_praktikumi = $ad->getJsonSati(__DIR__ . '/../../server/praktikumi_iduci.json');
        $tekuci_tjedan_snimanja = $ad->getJsonSati(__DIR__ . '/../../server/snimanja.json');
        $iduci_tjedan_snimanja = $ad->getJsonSati(__DIR__ . '/../../server/snimanja_iduci.json');

        require_once __DIR__ . '/../view/demosi/broj-sati-demosa_html.php';
    }
};
