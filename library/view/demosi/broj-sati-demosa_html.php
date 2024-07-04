<?php
if (isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0') {
    require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
} else {
    require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
}
?>

<?php require_once __DIR__ . '/../_header.php'; ?>

<?php echo $username ?> - sati po mjesecima ovog mjeseca
<br>
<div id="tablice">
    <table id="mjesecnitrenutnipopissati">
        <tr>
            <th>Aktuarska</th>
            <th>Doktorski</th>
            <th>Praktikumi</th>
            <th>Snimanja</th>
            <th>Trenutni mjesec</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td> <?php echo $mjesecniSatiUsera; ?></td>
        </tr>
    </table>

    <br>

    <table id="mjesecniprošlipopissati">
        <tr>
            <th>Aktuarska</th>
            <th>Doktorski</th>
            <th>Praktikumi</th>
            <th>Snimanja</th>
            <th>Prošli mjesec</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td> <?php echo $mjesecniSatiUsera; ?></td>
        </tr>
    </table>
</div>