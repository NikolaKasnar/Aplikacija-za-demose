<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class GalerijaController
{
    public function index()
    {
        $upload = '';
        $brisanje = '';
        require_once 'view/galerija/galerija_html.php';
    }

    public function obradi()
    {
        //provjera postoji li nešto u submit
        if(isset($_POST['submit']))
        {
            if($_FILES['image']['error'] === 0)
            {
                $image = $_FILES['image'];
                $nazivSlike = $_POST['nazivslike'];

                $imageFileType=strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                //navodimo koji su tipovi dozvoljeni
                $allowedTypes = array('jpg', 'jpeg', 'png');

                if(in_array($imageFileType, $allowedTypes))
                {   
                    //generiramo ime za sliku
                    $imageName = $nazivSlike . '.' . $imageFileType; 

                    //moramo provjeriti naziv slike
                    $files = glob("view/images/slike_galerija/*.{jpg,jpeg,png}", GLOB_BRACE);
                    foreach ($files as $file) {
                        if( $imageName === basename($file)){ 
                            $upload = 'Slika s tim nazivom već postoji, molimo Vas odaberite neki drugi!';
                            require_once 'view/galerija/galerija_html.php';
                            return;
                        }
                    }
                    //spremamo sliku o odgovarajući direktorij (u ovom slučaju view/images/slike_galerija)
                    move_uploaded_file($image['tmp_name'],dirname(__FILE__) . '/../view/images/slike_galerija/' . $imageName);
                    $upload = 'Uspješno ste prenjeli sliku!';
                    header('Location: index.php?rt=galerija/uspjesanPrijenos'); //ovo ce usmjeriti na posebno kreiranu funkciju uspjesanPrijenos->detaljno ispod
                    exit;
                }
                else
                {
                    $upload = 'Dozovljeni su formati .jpg, .jpeg i .png, provjerite Vaš format slike.';
                    require_once 'view/galerija/galerija_html.php';
                    return;
                }
            }
            $upload = 'Došlo je do greške prilikom uploada slike.';
            require_once 'view/galerija/galerija_html.php';
            return;
        }
    }

    //ova funkcija je kreirana tako da ako korisnik refresha stranicu i dalje ce mu pisati odgovarajuca poruka,
    //ali se slika nece ponovno prenijeti na stanicu sto bi uzrokovalo duplanje,...
    public function uspjesanPrijenos()
    {
        $upload = 'Uspješno ste prenijeli sliku!';
        require_once 'view/galerija/galerija_html.php';
        return;
    }

    //funkcija koja će provjeriti ima li slika unesenog naziva iz forme u galerija_html.php
    //ako da, uklonit ce je, ako ne ispisat ce odgovarajucu poruku
    public function obrisi()
    {
        if(isset($_POST['submit']))
        {
            $nazivSlike = $_POST['naziv_slike'];
            //putanja do slike
            $imagePath = dirname(__FILE__) . '/../view/images/slike_galerija/' . $nazivSlike;
        
            if(file_exists($imagePath))
            {
                if(unlink($imagePath)) //ovo omogucava brisanje unlink()
                {
                    $brisanje = 'Slika je uspješno uklonjena!';
                    require_once 'view/galerija/galerija_html.php';
                    return;
                }
                else
                {
                    $brisanje = 'Došlo je do greške prilikom brisanja slike!';
                    require_once 'view/galerija/galerija_html.php';
                    return;
                }
            }
            else
            {
                $brisanje = 'Slika tog naslova ne postoji, probajte ponovno (u naslov mora biti uključeno sve)';
                require_once 'view/galerija/galerija_html.php';
                return;
            }
        }
        require_once 'view/galerija/galerija_html.php';
        return;
    }
    

};