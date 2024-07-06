<?php
    if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-admin-postavke.php'; ?>

<?php require_once __DIR__ . '/../_header.php';

//css za ovo je u novidemos_html.css
?>

<div style="margin-left: 26%; padding: 5px;">

    <h2>Popis demosa sa njihovim satima rada</h2>

    <?php if (isset($poruka)) echo $poruka . '<br>'; ?>

    <table id="popissati">
    <th>ID</th><th>Username</th><th>Ime</th>
    <th>Prezime</th><th>E-mail</th><th>Godina</th><th>Smjer</th>
    <th>Ovlasti</th><th>Mjesečni sati</th>
    <?php
    $i=0;
    foreach($users as $a) {
      echo '<tr><td>'. $a->__get('id') . '</td><td>'. $a->__get('username') . '</td><td>'. $a->__get('ime')  .
            '</td><td>'. $a->__get('prezime') . '</td><td>'. $a->__get('email') . '</td>' .
            '<td>'. $a->__get('godina') . '</td><td>'. $a->__get('smjer') . '</td><td>' . $a->__get('ovlasti') .
            '</td><td>' . $mjes[$i][0] . '</td></tr>';
      $i++;
    }
    ?>

    </table>
    <div style="float: left">
    <h2>Odrađeni sati za ovaj tjedan:</h2>
    <table id="popissati">
    <th>Username</th><th>Aktuarski</th><th>Doktorski</th>
    <th>Praktikumi</th><th>Snimanja</th>
    <?php
      foreach($users as $b){
        $user=$b->__get('username');
        $br=0;
        for($i=0;$i<4;$i++){
          if (array_key_exists($user,$tjedni[$i])) $br=1;
        }
        if($br==1){
          echo '<tr><td>'. $user . '</td>';
          for($i=0;$i<4;$i++){
            if (array_key_exists($b->__get('username'),$tjedni[$i]))
              echo '<td>' . $tjedni[$i][$user] . ' sati</td>';
            else echo "<td>0 sati</td>";
          }
          echo "</tr>";
        }
      }
     ?>
   </table>
   <div style="float: left">
     <form id="satiforma" method="post" action="index.php?rt=adminpostavke/pribrojisate">
       <button name="pribroji" value="">Pribroji mjesečnim satima</button>
     </form>
     <form id="satiforma" method="post" action="index.php?rt=adminpostavke/resetsate">
       <button name="reset" value="">Resetiraj mjesečne sate</button>
     </form>

     <form id="satiforma" method="post" action="index.php?rt=adminpostavke/printsate">
    <button name="print" value="">PDF ispis mjesečnih sati</button>
    </form>
    </div>
  </div>
</div>

</body>
</html>
