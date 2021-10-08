<?php
require_once 'includes/header.php';
    ?>
    <div>
    <h1>Login</h1>
    <p>No account <a href="register.php">Register account</a></a></p>
    <form action="includes/login_inc.php" method="post">
        <input type="text" name="index_number" placeholder="Index number">
        <input type="text" name="password" placeholder="password">
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>
    <?php
require_once 'includes/footer.php';
    ?>