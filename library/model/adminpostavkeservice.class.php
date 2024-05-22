<?php

require_once __DIR__ . '/../app/database/db.class.php';

class AdminPostavkeService
{
    public function dohvatiInfo()
    {
        try
        {
            $db=DB::getConnection();
            $st=$db->prepare('SELECT ime,prezime,br_mob,mail_faks,mail_priv,nepolozeni,god_studija,smjer,saznali,napomena FROM postani_info');
            $st->execute();
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}
        
        $arrofinfo = array();
		while( $row = $st->fetch() )
		{
			$arrofinfo[] = new Info( $row['ime'], $row['prezime'], $row['br_mob'], $row['mail_faks'], $row['mail_priv'], $row['nepolozeni'],
                                $row['god_studija'], $row['smjer'], $row['saznali'], $row['napomena']);
		}
		return $arrofinfo;
	}

    public function dohvatiTermin($mail_faks)
    {
        try
        {
            $db=DB::getConnection();
            $st=$db->prepare('SELECT ime,prezime,mail_faks, dan, termin FROM postani_termini WHERE mail_faks=:mail_faks');
            $st->execute([':mail_faks' => $mail_faks]);
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}
        
        $arroftermin = array();
		while( $row = $st->fetch(PDO::FETCH_ASSOC) )
		{
			$arroftermin[] = array('ime' => $row['ime'], 'prezime' => $row['prezime'], 'mail_faks' => $row['mail_faks'], 
                            'dan' => $row['dan'], 'termin' => $row['termin']);
		}
		return $arroftermin;
	}

};

?>