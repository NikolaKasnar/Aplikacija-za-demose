<?php require_once __DIR__ . '/../_header.php'; ?>

    <form action="<?php echo 'index.php?rt=login/promijenilozinku&sequence=' . $registrationSequence; ?>" method="post">

        <div class="container">
            <label for="psw1"><b>Lozinka</b></label><br>
            <input type="password" placeholder="Unesite lozinku" name="psw1" required>
            <br>
            <label for="psw2"><b>Molim vas ponovite lozinku</b></label><br>
            <input type="password" placeholder="Unesite lozinku" name="psw2" required>
            <br>
            <button class="submitbtn" type="submit">Promijeni lozinku</button>
        </div>

    </form>

</body>

</html>
