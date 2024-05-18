<?php

require_once __DIR__ . '/../app/database/db.class.php';

class zaboravlozinkeService
{

    public function provjeraValjanosti($email)
    {

        // Prvo provjerimo nalazi li se mail u bazi
        $db = DB::getConnection();

        try
        {
            $st = $db->prepare( 'SELECT email FROM demosi WHERE email=:email' );
            $st->execute( array( 'email' => $email ) );
        }
        catch( PDOException $e ) 
        { 
            require_once __DIR__ . '/../view/login/zaborav-lozinke_html.php'; 
            echo 'Greska u bazi.';
            return 0; 
        }

        $row = $st->fetch();

        if( $row === false )
        {
            // Taj mail ne postoji, upit u bazu nije vratio ništa.
            require_once __DIR__ . '/../view/login/zaborav-lozinke_html.php';
            echo 'Ne postoji takav mail u bazi.';
            return 0;
        }

        // Buduci da postoji dohvatimo njegov username
        try
        {
            $st = $db->prepare( 'SELECT username FROM demosi WHERE email=:email' );
            $st->execute( array( 'email' => $email ) );
        }
        catch( PDOException $e ) 
        { 
            require_once __DIR__ . '/../view/login/zaborav-lozinke_html.php'; 
            echo 'Greska u bazi.';
            return 0; 
        }

        $row = $st->fetch();

        // Generiram neki niz brojeva koji ce mi koristiti za potvrdu
        $registration_sequence = bin2hex(random_bytes(10));
       
        $this->posaljiMailZaReset($email, $row['username'], $registration_sequence);

        return true;

    }

    private function posaljiMailZaReset($email, $username, $registrationSequence) {
        $subject = "Zaboravljena lozinka";
        $message = 'Poštovanje !' . "\n" . "\n" . 'Vaš username za stranicu demosa je " ' . $username . '". Ako želite promijeniti vašu lozinku, molim vas da stisnete na sljedeći link:';
        $message .= 'http://' . $_SERVER['SERVER_NAME'] . htmlentities( dirname( $_SERVER['PHP_SELF'] ) ) . '/index.php?rt=register/confirm&sequence=' . $registrationSequence . "\n";
        $message .= "\n" . "\n" . 'U slučaju da ne želite, ignorirajte ovaj mail.';
		$headers  = 'From: rp2@studenti.math.hr' . "\r\n" .
		            'Reply-To: rp2@studenti.math.hr' . "\r\n" .
		            'X-Mailer: PHP/' . phpversion();
        $isOK=mail($email, $subject, $message, $headers);

        if( !$isOK )
			exit( 'Greška: ne mogu poslati mail. (Pokrenite na rp2 serveru.)' );
    }

    public function potvrdipromjenu($registrationSequence) {

        $db = DB::getConnection();

        try {
            $st = $db->prepare('SELECT id FROM dz2_users WHERE registration_sequence = :registration_sequence');
            $st->execute(['registration_sequence' => $registrationSequence]);
            $user = $st->fetch();

            if (!is_null($user)) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return 0;
        }
    }



}
?>
