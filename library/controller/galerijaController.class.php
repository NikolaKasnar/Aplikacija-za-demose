<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class GalerijaController
{
    public function index()
    {
        $upload = '';
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

                $imageFileType=strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                //navodimo koji su tipovi dozvoljeni
                $allowedTypes = array('jpg', 'jpeg', 'png');

                if(in_array($imageFileType, $allowedTypes))
                {   
                    //generiramo ime za sliku
                    $imageName = uniqid() . '.' . $imageFileType; 
                    
                    //spremamo sliku o odgovarajući direktorij (u ovom slučaju tamo view)
                    move_uploaded_file($image['tmp_name'],dirname(__FILE__) . '/../view/galerija/' . $imageName);
                    $upload = 'Uspješno ste prenjeli sliku!';
                    require_once 'view/galerija/galerija_html.php';
                    return;
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

};