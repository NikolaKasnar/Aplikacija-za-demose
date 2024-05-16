<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-login.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/library/css/login_html.css" />
</head>

<body>
    <form action="action_page.php" method="post">
        <div class="imgcontainer">
            <img src="/view/images/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Korisničko ime</b></label><br>
            <input type="text" placeholder="Unesite korisničko ime" name="uname" required>
            <br>
            <label for="psw"><b>Lozinka</b></label><br>
            <input type="password" placeholder="Unesite lozinku" name="psw" required>
            <br>
            <button class="submitbtn" type="submit">Login</button>
            <br>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Zapamti me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <!--<button type="button" class="cancelbtn">Odustani</button>-->
            <span class="psw">Zaboravili ste <a href="#">lozinku?</a></span>
        </div>
    </form>

</body>

</html>