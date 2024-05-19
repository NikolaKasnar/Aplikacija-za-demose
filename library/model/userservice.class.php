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

    public function setuser($noviuser)
    {
        $db = DB::getConnection();

        try
		{
      $stariuser=$_COOKIE['username'];
			$st = $db->prepare( 'UPDATE demosi set prezime=:prezime, ime=:ime, smjer=:smjer where username=:cookie' );
			$st->execute( array('prezime' => $noviuser->__get('prezime'), 'ime' => $noviuser->__get('ime'),
        'smjer' => $noviuser->__get('smjer'), 'cookie' => $stariuser));
      $st2 = $db->prepare( 'UPDATE demosi set username=:username, email=:email, godina=:godina where username=:cookie');
      $st2->execute(array('username' => $noviuser->__get('username'), 'email' => $noviuser->__get('email'), 'godina' => $noviuser->__get('godina'), 'cookie' => $stariuser));
		}
		catch( PDOException $e ) {
      echo 'Greska u bazi.';
      require_once __DIR__ . '/../view/postavke/account_html.php'; return;
    }

      return $noviuser->__get('username');
    }

    public function setpassword($username,$password)
    {
        $db = DB::getConnection();

        try
		{
      $st = $db->prepare( 'UPDATE demosi set password_hash=:password where username=:username' );
			$st->execute( array('password' => $password, 'username' => $username));
    }
		catch( PDOException $e ) {
      echo 'Greska u bazi.';
      require_once __DIR__ . '/../view/postavke/promjenasifre_html.php'; return;
    }

    return 1;
    }
}
