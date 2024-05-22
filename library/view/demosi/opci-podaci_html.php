<?php 
    if($_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>

<?php require_once __DIR__ . '/../_header.php'; ?>

    <h1>Ovdje će se nalaziti opći podaci o demosu.</h1>
</body>
</html>
