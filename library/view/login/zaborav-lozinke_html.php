<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-login.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>

    <form action="index.php?rt=zaboravlozinke/slanje" method="post">

        <div class="container">
            <label for="uname"><b>Vaš email:</b></label><br>
            <input type="text" placeholder="Unesite vaš email" name="email" required>
            <br>
            <button class="submitbtn" type="submit">Pošalji</button>
            <br>
        </div>

    </form>

</body>

</html>
