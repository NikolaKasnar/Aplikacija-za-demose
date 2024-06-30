<?php 
if (isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0') {
    require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
} else {
    require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
}
?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-upute-demosi.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <?php 
        $file_path = __DIR__ . '/../../display_upute/doktorski_text.php';
        //$php_content = file_get_contents($file_path);
        include $file_path;
        //echo '<div style="margin-right:25%;">' . htmlspecialchars($php_content) . '</div>';
        
        /* TODO nekad u buducnosti dodati razlicite textboxove
        $directory = __DIR__ . '/../../display_upute/';
        foreach (glob($directory . 'doktorski_text_*.php') as $file) {
            //echo "test";
            $text_content = file_get_contents($file);
            echo '<div style="margin-right:25%;">' . htmlspecialchars($text_content) . '</div>';
        }
        */
    ?>
</div>
</body>

</html>
