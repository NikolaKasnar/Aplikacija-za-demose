<?php

require_once __DIR__ . '/../model/libraryservice.class.php';
require_once __DIR__ . '/../model/loginservice.class.php';
require_once __DIR__ . '/../model/zaboravlozinkeservice.class.php';

class LoginController
{
    public function index()
    {
        require_once __DIR__ . '/../view/login/login_html.php';
    }

    public function postanidemos()
    {
        require_once __DIR__ . '/../view/login/postanidemos_html.php';
    }

    public function opisposla()
    {
        require_once __DIR__ . '/../view/login/opisposla_html.php';
    }

    public function rezervacije()
    {
        require_once __DIR__ . '/../view/login/rezervacije_html.php';
    }

    // Funkcije za promjenu zaboravljene lozinke
    public function zaborav()
    {
        require_once __DIR__ . '/../view/login/zaborav-lozinke_html.php';
    }

    public function slanjemaila()
    {
        $email = $_POST['email'];

        $zs = new zaboravlozinkeService;

        $zs->provjeraValjanosti($email);
    }

    public function potvrdikod() {
        $registrationSequence = $_GET['sequence'];

        $zs = new zaboravlozinkeService;
        $result = $zs->potvrdiPromjenu($registrationSequence);

        if ($result) {
            require_once __DIR__ . '/../view/promjena-lozinke_html.php';
        } else {
            echo "Ovaj kod nije točan.";
        }
    }

    public function promijenilozinku() {
        if($_POST['psw1'] === $_POST['psw2']){

            $password_hash = password_hash($_POST['psw1'], PASSWORD_DEFAULT);

            $zs = new zaboravlozinkeService;

            $zs->napraviPromjenuLozinke($password_hash);
        }
        else{
            require_once __DIR__ . '/../view/promjena-lozinke_html.php';
            echo "Ove dvijue lozinke nisu iste!";
        }
    }

    public function provjera()
    {

    //ako je korisnik vec zapamcen od prije
    if(isset($_COOKIE['username'])){
      $username = $_COOKIE['username'];
      $ls = new LoginService;

      $ls->userprovjera($username);
      return;
    }

        // Provjeri sastoji li se ime samo od slova; ako ne, crtaj login formu.
		if( !isset( $_POST["uname"] ) || preg_match( '/[a-zA-Z]{1, 20}/', $_POST["uname"] ) ){
			require_once __DIR__ . '/../view/login/login_html.php';
			return;
		}

        // Možda se ne šalje password; u njemu smije biti bilo što.
		if( !isset( $_POST["psw"] ) )
            require_once __DIR__ . '/../view/login/login_html.php';

        // Sve je OK, provjeri jel ga ima u bazi.

        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $ls = new LoginService;

        $ls->provjeraUBazi($username, $password);

    }

    public function logout()
    {
        setcookie('username','',time()-50);
        require_once __DIR__ . '/../view/login/login_html.php';
    }
};
