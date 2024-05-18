<?php

require_once __DIR__ . '/../model/libraryservice.class.php';
require_once __DIR__ . '/../model/userservice.class.php';

class PostavkeController
{
    public function index()
    {
        $st=new UserService();

        $user=$st->getuser();
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function updateaccount()
    {
        $st=new UserService();

        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function promjenasifre()
    {
        require_once __DIR__ . '/../view/postavke/promjenasifre_html.php';
    }

    public function darklight()
    {
        if(isset($_COOKIE['mode'])){
          if($_COOKIE['mode']==='0') {
            setcookie('mode',1,time()+(10*365*24*60*60));
            $darkmode=0;
          }
          else {
            setcookie('mode',0,time()+(10*365*24*60*60));
            $darkmode=1;
          }
        }
        else {
          setcookie('mode',0,time()+(10*365*24*60*60));
          $darkmode=1;
        }

        $st=new UserService();
        $user=$st->getuser();
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function registracija()
    {
        require_once __DIR__ . '/../view/postavke/registracija_html.php';
    }
};
