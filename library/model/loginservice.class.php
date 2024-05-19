<?php

require_once __DIR__ . '/../app/database/db.class.php';

class loginService
{

  public function userprovjera($username)
  {

      $db = DB::getConnection();

      try
  {
    $st = $db->prepare( 'SELECT password_hash FROM demosi WHERE username=:username' );
    $st->execute( array( 'username' => $username ) );
  }
  catch( PDOException $e ) { require_once __DIR__ . '/../view/login/login_html.php'; echo 'Greska u bazi.';return; }

      $row = $st->fetch();

      if( $row === false )
  {
    // Taj user ne postoji, upit u bazu nije vratio ništa.
    require_once __DIR__ . '/../view/login/login_html.php';
    echo 'Ne postoji korisnik s tim imenom.';
    return;
  }
      else
  {
    require_once __DIR__ . '../../controller/usersController.class.php';
    $od=new UsersController();
        $od->index();
        return 1;
  }

  }

    public function provjeraUBazi($username, $password)
    {

        $db = DB::getConnection();

        try
		{
			$st = $db->prepare( 'SELECT password_hash FROM demosi WHERE username=:username' );
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { require_once __DIR__ . '/../view/login/login_html.php'; echo 'Greska u bazi.';return; }

        $row = $st->fetch();

        if( $row === false )
		{
			// Taj user ne postoji, upit u bazu nije vratio ništa.
			require_once __DIR__ . '/../view/login/login_html.php';
			echo 'Ne postoji korisnik s tim imenom.';
			return 0;
		}
        else
		{


			// Postoji user. Dohvati hash njegovog passworda.
			$hash = $row[ 'password_hash'];


			// Da li je password dobar?
			if( password_verify( $password, $hash ))
			{
        //ako je korisnik ulogiran od prije
        //znaci da je ovo provjera pri mijenjanju sifre
        if(isset($_COOKIE['username'])){
          return 1;
        }

				// Dobar password. Ulogiraj ga i posalji na pocetni ekran.
        setcookie('username',$username,time()+(10*365*24*60*60));
				require_once __DIR__ . '../../controller/usersController.class.php';
				$od=new UsersController();
	        	$od->index();
				return 1;
			}
			else
			{
        //ako je korisnik ulogiran od prije
        //znaci da je ovo provjera pri mijenjanju sifre
        if(isset($_COOKIE['username'])){
          echo "blergh";
          return 0;
        }

				// Nije dobar password. Crtaj opet login formu s pripadnom porukom.
				require_once __DIR__ . '/../view/login/login_html.php';
				echo 'Postoji user, ali password nije dobar.';
				return 0;
			}
		}

    }

}
?>
