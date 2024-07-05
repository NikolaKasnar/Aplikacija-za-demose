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
        $tekuci_tjedan_aktuarski = array();
        $dir = __DIR__ . '/../../server/aktuarski.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($tekuci_tjedan_aktuarski[$str])) {
                            $tekuci_tjedan_aktuarski[$str]++;
                        } else {
                            $tekuci_tjedan_aktuarski[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za aktuarski dio tablice aktuarski.json
        $iduci_tjedan_aktuarski = array();
        $dir = __DIR__ . '/../../server/aktuarski_iduci.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($iduci_tjedan_aktuarski[$str])) {
                            $iduci_tjedan_aktuarski[$str]++;
                        } else {
                            $iduci_tjedan_aktuarski[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za doktorski dio tablice doktorski.json
        $tekuci_tjedan_doktorski = array();
        $dir = __DIR__ . '/../../server/doktorski.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($tekuci_tjedan_doktorski[$str])) {
                            $tekuci_tjedan_doktorski[$str]++;
                        } else {
                            $tekuci_tjedan_doktorski[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za doktorski dio tablice doktorski.json
        $iduci_tjedan_doktorski = array();
        $dir = __DIR__ . '/../../server/doktorski_iduci.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($iduci_tjedan_doktorski[$str])) {
                            $iduci_tjedan_doktorski[$str]++;
                        } else {
                            $iduci_tjedan_doktorski[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za praktikumi dio tablice praktikumi.json
        $tekuci_tjedan_praktikumi = array();
        $dir = __DIR__ . '/../../server/praktikumi.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($tekuci_tjedan_praktikumi[$str])) {
                            $tekuci_tjedan_praktikumi[$str]++;
                        } else {
                            $tekuci_tjedan_praktikumi[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za praktikumi dio tablice praktikumi.json
        $iduci_tjedan_praktikumi = array();
        $dir = __DIR__ . '/../../server/praktikumi_iduci.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($iduci_tjedan_praktikumi[$str])) {
                            $iduci_tjedan_praktikumi[$str]++;
                        } else {
                            $iduci_tjedan_praktikumi[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za snimanja dio tablice snimanja.json
        $tekuci_tjedan_snimanja = array();
        $dir = __DIR__ . '/../../server/snimanja.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($tekuci_tjedan_snimanja[$str])) {
                            $tekuci_tjedan_snimanja[$str]++;
                        } else {
                            $tekuci_tjedan_snimanja[$str] = 1;
                        }
                    }
                }
            }
        }

        // Dohvaćanje koda za snimanja dio tablice snimanja.json
        $iduci_tjedan_snimanja = array();
        $dir = __DIR__ . '/../../server/snimanja_iduci.json';
        if (file_exists($dir)) {
            $var = file_get_contents($dir);
            $var = json_decode($var);
            foreach ($var as $tab) {
                foreach ($tab as $str) {
                    if ($str != "") {
                        if (isset($iduci_tjedan_snimanja[$str])) {
                            $iduci_tjedan_snimanja[$str]++;
                        } else {
                            $iduci_tjedan_snimanja[$str] = 1;
                        }
                    }
                }
            }
        }

        require_once __DIR__ . '/../view/demosi/broj-sati-demosa_html.php';
    }
};
