<?php

require_once __DIR__ . '/../model/postaniservice.class.php';
class PostaniDemosController
{
    public function index()
    {
        $poruka='';
        require_once __DIR__ . '/../view/login/postanidemos_html.php';
    }

    //funkcija koja obradjuje podatke poslane putem POST-a, provjere i poziva funkcije ako je sve dobro
    //za unos u samu bazu podataka kako bi admin imao uvid
    public function obradi()
    {
        $poruka='';
        $ps = new PostaniService;
        //PLAN: provjera polja za termine - treba minimalno 6, provjera reg. izraza za ime,prezime,broj mobitela,...
        
        if((!isset($_POST['ponedjeljak']) && empty($_POST['ponedjeljak'])) && (!isset($_POST['utorak']) && empty($_POST['utorak']))
        && (!isset($_POST['srijeda']) && empty($_POST['srijeda'])) && (!isset($_POST['cetvrtak']) && empty($_POST['cetvrtak']))
        && (!isset($_POST['petak']) && empty($_POST['petak']))){
            //svi checkboxovi su prazni
            $poruka = 'Označite termine!';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        }

        //iduca provjera je imamo li minimalno oznaceno 6 termina, trebamo brojac
        $brojac_termina = 0;

        $selectedPon = [];
        $selectedUto = [];
        $selectedSri = [];
        $selectedCet = [];
        $selectedPet = [];

        //spremimo dobiveno u polja
        if (isset($_POST['ponedjeljak'])) 
            $selectedPon = $_POST['ponedjeljak'];
        if (isset($_POST['utorak'])) 
            $selectedUto = $_POST['utorak'];
        if (isset($_POST['srijeda'])) 
            $selectedSri = $_POST['srijeda'];
        if (isset($_POST['cetvrtak'])) 
            $selectedCet = $_POST['cetvrtak'];
        if (isset($_POST['petak'])) 
            $selectedPet = $_POST['petak'];

        //provjeravamo imamo li minimalno 6 termina
        foreach($selectedPon as $pon)
            $brojac_termina++;
        foreach($selectedUto as $uto)
            $brojac_termina++;
        foreach($selectedSri as $sri)
            $brojac_termina++;
        foreach($selectedCet as $cet)
            $brojac_termina++;
        foreach($selectedPet as $pet)
            $brojac_termina++;

        if($brojac_termina < 6)
        {
            $poruka = 'Trebate oznaciti minimalno 6 termina!';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        }

        //provjeravamo ime,prezime,...

        if(empty($_POST['firstname'])|| !preg_match('/^[a-zA-ZčćšđžČĆŠĐŽ-]{2,20}$/',$_POST['firstname'])){
            $poruka='Za unos imena koristite slova i eventualno "-" !';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        } 

        if(empty($_POST['lastname'])|| !preg_match('/^[a-zA-ZčćšđžČĆŠĐŽ-]{2,20}$/',$_POST['lastname'])){
            $poruka='Za unos prezimena koristite slova i evenutalno "-" !';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        } 

        if(empty($_POST['brojmobitela'])|| !preg_match('/^\d{3} \d{4} \d{3}$/',$_POST['brojmobitela'])){
            $poruka='Unesite broj mobitela u prikazanoj (odgovarajućem) obliku npr. 097 1237 813.';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        }

        if(empty($_POST['mailfaksa'])|| !preg_match('/^[a-z]+\.math@pmf\.hr$/',$_POST['mailfaksa'])){
            $poruka='Vaš mail (od fakulteta) ne zadovoljava oblik!';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        }

        if(empty($_POST['mailosobni'])|| !preg_match('/^[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,}$/',$_POST['mailosobni'])){
            $poruka='Vaš mail (osobni) ne zadovoljava oblik!';
            require_once __DIR__ . '/../view/login/postanidemos_html.php';
            return;
        }
        //kodom iznad provjerili smo ime, prezime, broj mobitela, mail od fakulteta, osobni mail

        $ime=$_POST['firstname'];
        $prezime=$_POST['lastname'];
        $brojmobitela=$_POST['brojmobitela'];
        $mailfaksa=$_POST['mailfaksa'];
        $mailosobni=$_POST['mailosobni'];
        $nepolozeno=$_POST['polozeno'];
        $godina=$_POST['godina'];
        $smjer=$_POST['smjer'];
        $poziv='';
        $napomene='';

        if($_POST['poziv'] === 'Ostalo')
        {
            if(empty($_POST['poziv-ostalo']))
                $poziv = 'Student nije ništa napisao';
            else
                $poziv = $_POST['poziv-ostalo'];
        }
        else
        {
            $poziv = $_POST['poziv'];
        }

        if(empty($_POST['napomene']))
        {
            $napomene = 'Nema napomena';
        }
        else
            $napomene=$_POST['napomene'];
    
        //ako je kod došao do ovog dijela sve je OK, mozemo ubaciti u bazu :)
        $ps->ubaciPostaniInfo($ime,$prezime,$brojmobitela,$mailfaksa,$mailosobni,$nepolozeno,$godina,$smjer,$poziv,$napomene);
        
        $ponedjeljak='ponedjeljak'; $utorak='utorak'; $srijeda='srijeda'; $cetvrtak='četvrtak'; $petak='petak';
        
        //$ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$...,$...);
        foreach($selectedPon as $pon)
            $ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$ponedjeljak,$pon);
        foreach($selectedUto as $uto)
            $ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$utorak,$uto);
        foreach($selectedSri as $sri)
            $ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$srijeda,$sri);
        foreach($selectedCet as $cet)
            $ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$cetvrtak,$cet);
        foreach($selectedPet as $pet)
            $ps->ubaciPostaniTermin($ime,$prezime,$mailfaksa,$petak,$pet);
        
        $poruka = 'Uspješno ste ispunili formular!';
        require_once __DIR__ . '/../view/login/postanidemos_html.php';
        }
};

?>