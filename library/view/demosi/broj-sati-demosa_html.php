<?php
if (isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0') {
    require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
} else {
    require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
}
?>

<?php require_once __DIR__ . '/../_header.php'; ?>

<?php echo $username ?> - sati tekući tjedan
<br>
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
                foreach ($tekuci_tjedan as $key => $b)
                    if ($key === $username)
                        echo $b;
                ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <br>
    <?php echo $username ?> - sati idući tjedan
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
                foreach ($iduci_tjedan as $key => $b)
                    if ($key === $username)
                        echo $b;
                ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>