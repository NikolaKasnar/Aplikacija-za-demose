<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/user.class.php';

class UserService
{

    public function getuser($username)
    {
        $db = DB::getConnection();

        try
		{
			$st = $db->prepare( 'SELECT id,username,ime,prezime,email,godina,smjer,ovlasti FROM demosi where username=:username' );
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { require_once __DIR__ . '/../view/postavke/account_html.php'; echo 'Greska u bazi.';return; }

      $row = $st->fetch();

        $new = new User($row['id'],$row['username'],$row['ime'],
                $row['prezime'],$row['email'],$row['godina'],
                $row['smjer'],$row['ovlasti']);

        return $new;
    }


}
