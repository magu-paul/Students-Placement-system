
    <?php
require_once 'includes/header.php';
    ?>
    <?php
    if(isset($_SESSION['sessionId'])){
        echo "You are logged in!";
        
    }else{
        require_once 'welcome.php';
    }
    ?>
    <?php
require_once 'includes/footer.php';
    ?>
