<?php
if (isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0') {
    require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
} else {
    require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
}
?>
<?php require_once __DIR__ . '/../_header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Bok, ovdje je aktuarski!
</body>

</html>