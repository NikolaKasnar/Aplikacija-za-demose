<?php

require_once __DIR__ . '/../model/loginservice.class.php';
require_once __DIR__ . '/../model/libraryservice.class.php';
require_once __DIR__ . '/../model/userservice.class.php';
require_once __DIR__ . '/../model/user.class.php';
require_once __DIR__ . '/../model/adminpostavkeservice.class.php';
require_once __DIR__ . '/../model/info.class.php';

class AdminpostavkeController
{
    public function index()
    {
        $st=new UserService();

        $user=$st->getuser($_COOKIE['username']);
        require_once __DIR__ . '/../view/admin-postavke/postavke_html.php';
    }

    //prikazuje podatke o studentima koji su ispunili formu postani demos
    public function noviDemos()
    {
        $broj_novih = 0;
        $st=new UserService();
        $user=$st->getuser($_COOKIE['username']);

        $ap = new AdminPostavkeService();
        $infoList = $ap->dohvatiInfo();
        $terminList = [];
        foreach($infoList as $info){
            $terminList[$broj_novih] = $ap->dohvatiTermin($info->mail_faks);
            $broj_novih++;
        }
        require_once __DIR__ . '/../view/admin-postavke/novidemos_html.php';
    }

    public function micanjeDemosa()
    {
        $st=new UserService();
        $user=$st->getuser($_COOKIE['username']);

        $ap = new AdminPostavkeService();
        $demosList = $ap->dohvatiDemonstratore();

        require_once __DIR__ . '/../view/admin-postavke/micanjedemosa_html.php';
    }

    public function obrisiDemosa()
    {
        $st=new UserService();
        $user=$st->getuser($_COOKIE['username']);

        if(!isset($_POST['obrisi']))
        {
            header('Location: index.php?rt=adminpostavke/micanjeDemosa');
            exit;
        }
        else
        {
            $ap = new AdminPostavkeService();
            $email = $_POST['obrisi'];
            $ap->obrisiDemonstratora($email);
            $demosList = $ap->dohvatiDemonstratore();
            require_once __DIR__ . '/../view/admin-postavke/micanjedemosa_html.php';
        }
    }

};
