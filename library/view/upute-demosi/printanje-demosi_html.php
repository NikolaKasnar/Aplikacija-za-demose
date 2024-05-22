<?php 
    if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-upute-demosi.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>

    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <?php require_once __DIR__ . '/../../display_upute/printanje_text.php' ?>
    </div>
</body>

</html>
