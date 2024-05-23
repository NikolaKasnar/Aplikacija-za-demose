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
        require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
    }
    
    public function updatereg()
    {
      $noviuser=new User(0,0,0,0,0,0,0,0);

      if(isset($_POST["username"])){
        if(preg_match('/^[a-zA-Z]{1,20}$/', $_POST["username"])){
          $noviuser->__set('username',$_POST["username"]);
        }
        else{
          $poruka="Username se smije sastojati samo od slova!";
          require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
          return;
        }
      }

      if(isset($_POST["ime"])){
        if(preg_match('/^[a-zA-ZčćšđžČĆŠĐŽ-]{2,20}$/',$_POST['ime'])){
          $noviuser->__set('ime',$_POST["ime"]);
        }
        else{
          $poruka="Ime (2-20 znakova) se smije sastojati samo od slova i crtice!";
          require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
          return;
        }
      }


      if(isset($_POST["prezime"])){
        if(preg_match('/^[a-zA-ZčćšđžČĆŠĐŽ-]{2,20}$/',$_POST['prezime'])){
          $noviuser->__set('prezime',$_POST["prezime"]);
        }
        else{
          $poruka="Prezime (2-20 znakova) se smije sastojati samo od slova i crtice!";
          require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
          return;
        }
      }

      if($_POST['password']!==$_POST['password2']){
        $poruka="Unesite istu novu šifru oba puta!";
        require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
        return;
      }
      $password=password_hash($_POST['password'], PASSWORD_DEFAULT );

      if(isset($_POST["email"])){
        if(preg_match('/^[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,}$/',$_POST['email'])){
          $noviuser->__set('email',$_POST["email"]);
        }
        else{
          $poruka="Email nije ispravno unesen!";
          return;
        }
      }
      else $noviuser->__set('email',"");

      if(isset($_POST["godina"])){
        $noviuser->__set('godina',$_POST["godina"]);
      }

      if(isset($_POST["smjer"]))
        $noviuser->__set('smjer',$_POST["smjer"]);
      else $noviuser->__set('smjer',"");

      $kod=bin2hex(random_bytes(10));

      $st=new UserService();
      $st->makeuser($noviuser,$password, $kod);

      $poruka="Promjene uspješno spremljene.";
      require_once __DIR__ . '/../view/admin-postavke/registracija_html.php';
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
