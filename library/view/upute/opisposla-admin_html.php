<?php require_once __DIR__ . '/../navigation-bars/navigation-bar.php'; ?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-upute.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit PHP File</title>
</head>

<body>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Opis posla</h2>
        <?php if (!empty($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post" action="index.php?rt=upute/opisposla">
            <label for="edited_content">Opis posla:</label><br>
            <textarea id="edited_content" name="edited_content" rows="10" cols="50"><?php echo htmlspecialchars($php_content); ?></textarea><br>
            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>