<?php require_once __DIR__ . '/../navigation-bars/navigation-bar.php'; ?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-postavke.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>


    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
      <h2>Promjena šifre</h2>
      <?php if(isset($poruka)) echo $poruka . '<br><br>';?>
      <form action="index.php?rt=postavke/updatesifra" method="post">
          Stara šifra:<br>
          <input type="password" name="oldpass" />
          <br>
          Nova šifra:<br>
          <input type="password" name="newpass" />
          <br>
          Ponovno unesite novu šifru:<br>
          <input type="password" name="newpass2" />
          <br>
          <button type="submit">
              Spremi promjene
          </button>
    </div>
</body>

</html>
