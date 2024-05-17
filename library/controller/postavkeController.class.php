<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class PostavkeController
{
    public function index()
    {
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function account()
    {
        require_once __DIR__ . '/../view/postavke/account_html.php';
    }

    public function promjenasifre()
    {
        require_once __DIR__ . '/../view/postavke/promjenasifre_html.php';
    }

    public function darklight()
    {
        $darkmode=0;
        if(isset($_COOKIE['mode'])){
          if($_COOKIE['mode']==='0') {
            setcookie('mode',1,time()+(10*365*24*60*60));
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
        require_once __DIR__ . '/../view/postavke/dark-light_html.php';
    }

    public function registracija()
    {
        require_once __DIR__ . '/../view/postavke/registracija_html.php';
    }
};
