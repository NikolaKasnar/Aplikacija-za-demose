<?php

if (isset($_POST['row']) && isset($_POST['day']) && isset($_POST['value'])) {
    $row = $_POST['row'];
    $day = $_POST['day'];
    $value = $_POST['value'];

    $tableData = [];

    // Čitanje iz table data
    if (file_exists('table_data.json')) {
        $tableData = json_decode(file_get_contents('table_data.json'), true);
    }

    // Ažuriranje podataka
    if (isset($tableData[$row])) {
        $tableData[$row][$day + 1] = $value; // +1 za preskakanje prvog stupca (zapis vremena)
    }

    // Spremanje podataka 
    file_put_contents('table_data.json', json_encode($tableData));

}

?>