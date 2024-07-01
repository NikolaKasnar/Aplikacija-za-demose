<?php

require_once __DIR__ . '/../model/obavijestiservice.class.php';
class ObavijestiController
{
    public function index()
    {
        if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
            //ovisno o tome je li admin po ovlastima (0)

            $st=new ObavijestiService();
            $notifications=$st->dohvatiObavijesti();

            require_once __DIR__ . '/../view/obavijesti/obavijesti-admin_html.php';
        }
        else{
            //ili demonstrator (1)

            $st=new ObavijestiService();
            $notifications=$st->dohvatiObavijesti();

            require_once __DIR__ . '/../view/obavijesti/obavijesti-demos_html.php';
        }
    }

    public function obradiObavijest(){
        $st=new ObavijestiService();
        $notifications=$st->dohvatiObavijesti();
        if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '1'){
            //demonstrator (1)
            require_once __DIR__ . '/../view/obavijesti/obavijesti-demos_html.php';
        }
        else{
            //admin po ovlastima (0)
            //dalje sad provjeravamo unos nove obavijesti
            if(isset($_POST['btn'])){
                //moramo obraditi primljene podatke i ubaciti u tablicu!
                //u $_POST['naslov_poruke'] i $_POST['tijelo_poruke'] nalazi se ono što trebamo za ubačaj u tablicu
                $os = new ObavijestiService();
                $os->pohraniObavijest($_POST['naslov_poruke'], $_POST['tijelo_poruke']);
                require_once __DIR__ . '/../view/obavijesti/obavijesti-admin_html.php';
            }
            else{
                //u slucaju da je pristupljeno direktno putem linka! bez pritiska gumba i ispunjene forme
                //ne radi ništa i samo ga preusmjeri ponovno na istu stranicu
                require_once __DIR__ . '/../view/obavijesti/obavijesti-admin_html.php';
            }
        }
    }

};

?>