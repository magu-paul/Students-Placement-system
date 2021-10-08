<?php
require_once 'includes/adminHeader.php'
?>

 

    <div>
    <h1>Register new student</h1>
    
    <form action="includes/admin_inc.php" method="post">
        <input type="text" name="index_number" placeholder="Index number">
        <input type="text" name="name" placeholder="Full Name">
        <input type="number" name="marks" placeholder="Marks">
        <input type="text" name="gender" placeholder="Gender">
        <input type="text" name="secondary" placeholder="Secondary School">
        <button type="submit" name="submit">CREATE USER</button>
    </form>
</div>
    <?php
require_once 'includes/footer.php';
    ?>