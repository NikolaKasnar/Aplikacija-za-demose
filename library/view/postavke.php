<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postavke</title>
    <link rel="stylesheet" href="postavke.css" />
    <link rel="stylesheet" href="navigation-bar-postavke.css" />
</head>

<body>
    <?php include 'navigation-bar.php' ?>
    <ul>
        <li><a href="#account">Account</a></li>
        <li><a href="#promjena-sifre">Promjena šifre</a></li>
        <li><a href="#dark-light-mode">Dark/light mode</a></li>
    </ul>

    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Fixed Full-height Side Nav</h2>
        <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3>
        <p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
        <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
        <p>Some text..</p>
        <p>Some text..</p>
        <p>Some text..</p>
        <p>Some text..</p>
        <p>Some text..</p>
        <p>Some text..</p>
        <p>Some text..</p>
    </div>
</body>

</html>