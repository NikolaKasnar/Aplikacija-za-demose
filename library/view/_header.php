<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacija za demose</title>

    <link rel="stylesheet" href="./css/login_html.css" />
    <link rel="stylesheet" href="./css/postanidemos_html.css" />
    <link rel="stylesheet" href="./css/registracija_html.css" />
    <link rel="stylesheet" href="./css/navigation-bar.css" />
    <link rel="stylesheet" href="./css/navigation-bar-login.css" />
    <link rel="stylesheet" href="./css/navigation-bar-postavke.css" />
    <?php
      if(isset($darkmode) && $darkmode===0) ;
      else if((isset($_COOKIE['mode']) && $_COOKIE['mode']==='0') || 
          (isset($darkmode) && $darkmode===1)){
          echo '<link rel="stylesheet" href="./css/darkmode.css" />';}
    ?>
  </head>

<body>
