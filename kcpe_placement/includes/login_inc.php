<?php

if(isset($_POST['submit'])){
    require 'database.php';

    $username = $_POST['index_number'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location: ../index.php?erroe=emptyfields");
    exit();
    }else{
        $sql = "SELECT * FROM users WHERE index_number = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?erroe=sqlerror");
             exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $passcheck = password_verify($password, $row['password']);
                if($passcheck == false){
                    header("Location: ../index.php?erroe=wrongpassword");
                    exit();
                }elseif($passcheck == true){
                    
                    $sql1 = "SELECT name FROM student WHERE index_number = $username";
                    $sql2 = "SELECT secondary_school FROM student WHERE index_number = $username";
                    $secSchool = strval(mysqli_query($conn,$sql2));
                    $name = strval(mysqli_query($conn,$sql1);
                    echo strval($secSchool);
                    header("Location: ../index.php?erroe=seccess=loggedin");
                    exit();
                }else{
                    header("Location: ../index.php?erroe=wrongpassword");
                    exit();
                }
            }else{
                header("Location: ../index.php?erroe=nouser");
                exit();
            }
        }
    }


}else{
    header("Location: ../index.php?erroe=accessforbidden");
    exit();
}