<?php 
    if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>
<?php require_once __DIR__ . '/../_header.php'; ?>


<h1>Dobrodošli u galeriju &#128513</h1>


<!-- slijedi kod za prikaz uploadanih slika -->
<?php
$files = glob("view/images/slike_galerija/*.{jpg,jpeg,png}", GLOB_BRACE);
echo '<div class="gallery-container">';
foreach ($files as $image) {
    echo '<div class="gallery">';
    echo '<img src="' . $image . '" alt="Random image" />';
    echo '<div class="capiton">' . basename($image) . '</div>';
    echo '</div>';
}
echo '</div>';
?>

<br>
<hr>

<h3><strong>Info: </strong>Ako želite da i Vaša slika bude zabilježena u galeriji molimo javite se voditelju stranice</h3>

<br>
</body>
</html>