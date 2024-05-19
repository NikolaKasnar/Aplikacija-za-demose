<?php require_once __DIR__ . '/../navigation-bars/navigation-bar.php'; ?>
<?php require_once __DIR__ . '/../_header.php'; ?>


<h1>Dobrodošli u galeriju!</h1>

<h3> Ovdje možete obilježiti neki svoj zajednički trenutak u vizualnom obliku: </h3>

<form action="index.php?rt=galerija/obradi" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
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

<h3> Pogledajmo slike &#128513</h3>

<!-- slijedi kod za prikaz uploadanih slika -->
<?php
$files = glob("view/images/slike_galerija/*.{jpg,jpeg,png}", GLOB_BRACE);
foreach ($files as $image) {
    //prikaz imena slike
    //echo basename($image) . "<br />";
    echo '<img src="' . $image . '" alt="Random image" />' . "<br /><br />";
}
?>

</body>
</html>