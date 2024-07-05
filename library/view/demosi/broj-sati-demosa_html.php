<?php
if (isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0') {
    require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
} else {
    require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
}
?>

<?php require_once __DIR__ . '/../_header.php'; ?>

<h2>Evidencija broja sati</h2>

<h3><?php echo $username ?> - sati tekući tjedan</h3>
<div id="tablice">
    <table id="mjesecnitrenutnipopissati">
        <tr>
            <th>Aktuarska</th>
            <th>Doktorski</th>
            <th>Praktikumi</th>
            <th>Snimanja</th>
            <th>Ukupno</th>
        </tr>
        <tr>
            <td>
                <?php
                $suma_tekuci = 0;
                foreach ($tekuci_tjedan_aktuarski as $key => $b)
                    if ($key === $username){
                        echo $b;
                        $suma_tekuci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($tekuci_tjedan_doktorski as $key => $b)
                    if ($key === $username){
                        echo $b;
                        $suma_tekuci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($tekuci_tjedan_praktikumi as $key => $b)
                    if ($key === $username) {
                        echo $b;
                        $suma_tekuci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($tekuci_tjedan_snimanja as $key => $b)
                    if ($key === $username) {
                        echo $b;
                        $suma_tekuci += $b;
                    }
                ?>
            </td>
            <td>
                <?php echo $suma_tekuci; ?>
            </td>
        </tr>
    </table>

    <br>
    <h3><?php echo $username ?> - sati idući tjedan</h3>
    <table id="mjesecniprošlipopissati">
        <tr>
            <th>Aktuarska</th>
            <th>Doktorski</th>
            <th>Praktikumi</th>
            <th>Snimanja</th>
            <th>Ukupno</th>
        </tr>
        <tr>
            <td>
                <?php
                $suma_iduci = 0;
                foreach ($iduci_tjedan_aktuarski as $key => $b)
                    if ($key === $username)
                    {
                        echo $b;
                        $suma_iduci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($iduci_tjedan_doktorski as $key => $b)
                    if ($key === $username) {
                        echo $b;
                        $suma_iduci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($iduci_tjedan_praktikumi as $key => $b)
                    if ($key === $username) {
                        echo $b;
                        $suma_iduci += $b;
                    }
                ?>
            </td>
            <td>
                <?php
                foreach ($iduci_tjedan_snimanja as $key => $b)
                    if ($key === $username) {
                        echo $b;
                        $suma_iduci += $b;
                    }
                ?>
            </td>
            <td>
                <?php echo $suma_iduci; ?>
            </td>
        </tr>
    </table>
</div>