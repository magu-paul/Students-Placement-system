<?php

if(isset($_POST['submit'])){

    require 'database.php';

    $username = $_POST['index_number'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    if(empty($username) || empty($password) || empty($confirmPass)){
        header("Location:../register.php?erroe=emptyfields$username=".$username);
        exit();
    }elseif(!preg_match("/^[a-zA-z0-9]*/",$username)){
        header("Location: ../register.php?erroe=invalidusername&username=".$username);
        exit();
    }elseif($password !== $confirmPass){
        header("Location:../register.php?erroe=passwordsdonotmatch&username=".$username);
        exit();
    }else{
        
        $sql = "SELECT index_number FROM users WHERE index_number = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../register.php?sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if($rowCount > 0){
                header("Location: ../register.php?erroe=usernametaken");
        exit();
            }else{
                $sql = "INSERT INTO users (index_number, password) VALUES(?,?)";
                $stmt = mysqli_stmt_init($conn);
 
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../register.php?sqlerror");
                    exit();
                }else{

                   $hashedpass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $username,$hashedpass);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?success=registered");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}