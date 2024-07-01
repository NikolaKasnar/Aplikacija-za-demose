<?php
#tu ide dohvacanje baza i sveg ostalog

require_once __DIR__ .'/../app/database/db.class.php';

class ObavijestiService
{

    public function dohvatiObavijesti()
    {
        try
        {
            $db = DB::getConnection();
            $st = $db->prepare('SELECT naslov, tijelo, datum_objave FROM obavijesti');
            $st->execute();
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}

        $arrofobavijesti = array();
		while( $row = $st->fetch(PDO::FETCH_ASSOC))
		{
			$arrofobavijesti[] = array('naslov' => $row['naslov'], 'tijelo' => $row['tijelo'], 'datum_objave' => $row['datum_objave']);
		}
		return $arrofobavijesti;
    }

    public function pohraniObavijest($naslov, $tijelo){
        //spajamo se na bazu
        try
        {
            $db=DB::getConnection();
            $st=$db->prepare('INSERT INTO obavijesti (naslov,tijelo) 
                            VALUES (:naslov, :tijelo)');
            $st->execute(array('naslov'=>$naslov,'tijelo'=>$tijelo));
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}
        return;
    }

};


?>