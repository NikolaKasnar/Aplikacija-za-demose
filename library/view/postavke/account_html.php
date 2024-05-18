<?php require_once __DIR__ . '/../navigation-bars/navigation-bar.php'; ?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-postavke.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>



    <div  style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Postavke računa</h2>
        <form action="index.php?rt=postavke/updateaccount" method="post">
            Username:<br>
            <input type="text" placeholder="<?php echo $user->__get('username'); ?>"/>
            <br>
            Ime:<br>
            <input type="text" placeholder="<?php echo $user->__get('ime'); ?>"/>
            <br>
            Prezime:<br>
            <input type="text" placeholder="<?php echo $user->__get('prezime'); ?>"/>
            <br>
            Email:<br>
            <input type="email" placeholder="<?php echo $user->__get('email'); ?>"/>
            <br>
            Godina:<br>
            <select name="godina" required>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
            </select>
            <br>
            Smjer:<br>
            <input type="text" placeholder="<?php echo $user->__get('smjer'); ?>"/>
            <br>
            <button type="submit">
                Spremi promjene
            </button>
        </form>
    </div>
</body>

</html>
