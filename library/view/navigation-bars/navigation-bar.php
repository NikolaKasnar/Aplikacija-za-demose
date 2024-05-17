<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/navigation-bar.css" />
</head>

<body>
    <div class="navbar">
        <div class="dropdown">
            <a href="index.php?rt=upute/aktuarski">Upute</a>
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
        <a href="#galerija">Galerija</a>
        <a href="index.php?rt=users/index">Demosi</a>
        <a href="#izvjestaji">Izvještaji</a>
        <a href="index.php?rt=postavke/index">Postavke</a>
        <div class="right-tab">
            <a class="username">username</a>
            <a class="logout" href="index.php?rt=login/logout">Log out</a>
        </div>
    </div>
</body>

</html>