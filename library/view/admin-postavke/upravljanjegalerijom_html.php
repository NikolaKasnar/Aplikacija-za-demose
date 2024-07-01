<?php
    if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-admin-postavke.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>



<div style="margin-left:25%;padding:1px 16px;height:1000px;">

<h2>Ovdje možete upravljati slikama iz podstranice Galerija</h2>

<br>

<form action="index.php?rt=adminPostavke/obradiUpload" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
    <?php echo '<br>' . 'Unesite naziv slike (bez ekstenzije):'; ?>
    <input type="text" name="nazivslike" required> 
    <button type="submit" name="submit">Prenesi</button>

<!-- ovo je zbog toga da ne dobimo warning kako poruka nije definirana -->
    <?php
        if (!isset($upload)) {
            $upload = '';
        }
        if ($upload !== '') {
            echo '<p>' . $upload . '</p>';
        }
    ?>
</form>

<br><br>

<form action="index.php?rt=adminpostavke/obradiDelete" method="post">
    <?php echo '<br>' . 'Unesite naslov slike (s ekstenzijom) koju želite ukloniti sa stranice: '; ?>
    <input type="text" name="naziv_slike" required> 
    <button type="submit" name="submit">Obriši</button>
    <br>
    (Pogledati na podstranicu Galerija za naslov)

    <?php
        if (!isset($brisanje)) {
            $brisanje = '';
        }
        if ($brisanje !== '') {
            echo '<p>' . $brisanje . '</p>';
        }
    ?>

</form>

</div>

</body>
</html>