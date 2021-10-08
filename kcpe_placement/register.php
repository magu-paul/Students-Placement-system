<?php
require_once 'includes/header.php';
    ?>
    <div>
    <h1>Activate Account</h1>
    <p>Already active? <a href="login.php">Login </a></a></p>
    <form action="includes/register_inc.php" method="post">
        <input type="text" name="index_number" placeholder="Index number">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="confirmPassword" placeholder="confirm password">
        <button type="submit" name="submit">ACTIVATE</button>
    </form>
</div>
    <?php
require_once 'includes/footer.php';
    ?>