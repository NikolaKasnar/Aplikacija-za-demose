<?php

require_once __DIR__ .'/../app/database/db.class.php';

class PostaniService
{
    //funkcija za insert u bazu postani_info
    public function ubaciPostaniInfo($ime,$prezime,$br_mob,$mail_faks,$mail_priv,$nepolozeni,$god_studija,$smjer,$saznali,$napomena)
    {
        //spajamo se na bazu
        try
        {
            $db=DB::getConnection();
            $st=$db->prepare('INSERT INTO postani_info (ime,prezime,br_mob,mail_faks,mail_priv,nepolozeni,god_studija,smjer,saznali,napomena) 
                            VALUES (:ime, :prezime, :br_mob, :mail_faks, :mail_priv, :nepolozeni, :god_studija, :smjer, :saznali, :napomena)');
            $st->execute(array('ime'=> $ime, 'prezime'=> $prezime, 'br_mob'=> $br_mob, 'mail_faks'=> $mail_faks, 'mail_priv'=> $mail_priv, 
                                'nepolozeni'=> $nepolozeni, 'god_studija'=> $god_studija, 'smjer'=> $smjer, 'saznali'=> $saznali, 'napomena'=>$napomena));
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}
        return;
    }


    //funckija za insert u bazu postani_termini
    public function ubaciPostaniTermin($ime, $prezime, $dan, $termin)
    {
        //spajamo se na bazu
        try
        {
            $db=DB::getConnection();
            $st=$db->prepare('INSERT INTO postani_termini (ime,prezime,dan,termin) 
                            VALUES (:ime, :prezime, :dan, :termin)');
            $st->execute(array('ime'=>$ime,'prezime'=>$prezime,'dan'=>$dan, 'termin'=>$termin));
        }
        catch(PDOException $e) {exit('PDO error ' . $e->getMessage());}
        return;
    }

}

?>