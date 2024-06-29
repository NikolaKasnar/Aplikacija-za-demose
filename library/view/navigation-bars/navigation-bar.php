<?php require_once __DIR__ . '/../_header.php'; ?>

    <div class="navbar">
        <div class="dropdown">
            <!-- Moramo ga poslat na upute za demose -->
            <a href="index.php?rt=upute/aktuarskidemosi">Upute</a>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Rezervacije
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Aktuarska</a>
                <a href="#">Doktorski</a>
                <a href="#">Praktikumi dežurstva</a>
                <a href="#">Snimanja</a>
            </div>
        </div>
        <a href="index.php?rt=galerija/index">Galerija</a>
        <a href="index.php?rt=users/index">Demosi</a>
        <a href="#izvjestaji">Izvještaji</a>
        <a href="index.php?rt=postavke/index">Postavke</a>
        <div class="right-tab">
            <a class="username"><?php
            if(isset($_POST['uname'])) echo $_POST['uname'];
            else echo $_COOKIE['username'];?>
            </a>
            <a class="logout" href="index.php?rt=login/logout">Log out</a>
        </div>
    </div>
</body>

</html>
