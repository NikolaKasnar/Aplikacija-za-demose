<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-login.php';?>

<?php require_once __DIR__ . '/../_header.php'; ?>

    <div id="main-prof">
        <h2>Rezervacija termina za snimanje</h2>
        <p>Ako ste profesor i želite rezervirati demosa za snimanje, molim vas da ispunite ovu anketu.</p>
        <?php if(isset($poruka)) echo $poruka . '<br>' . '<br>';?>
        <form action="index.php?rt=postavke/updatereg" method="post">
            Ime:<br>
            <input type="text" name="ime" required />
            <br>
            Prezime:<br>
            <input type="text" name="prezime" required />
            <br>
            email(@pmf.hr):<br>
            <input type="text" name="email1" required />
            <br>
            email(neslužbeni):<br>
            <input type="text" name="email2" />
            <br>
            U kojoj prostoriji je potrebno snimanje:<br>
            (U slučaju da vam nije bitno, ostavite prazno)<br>
            <input type="text" name="prostorija" />
            <br>
            Otprilike koliko ljudi bi bilo u učionici:<br>
            <input type="text" name="ljudi1" required/>
            <br>
            Otprilike koliko ljudi bi bilo online:<br>
            <input type="text" name="ljudi2" required/>
            <br>
            <button type="submit">
                Pošalji zahtjev
            </button>
        </form>
    </div>


</body>

</html>
