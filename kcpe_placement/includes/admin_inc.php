<?php

if(isset($_POST['submit'])){

    require 'database.php';

    $index_number = $_POST['index_number'];
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    $gender = $_POST['gender'];
    $secondary = $_POST['secondary'];

    if(empty($index_number) || empty($name) || empty($marks) || empty($gender) || empty($secondary)){
        header("Location:../register.php?error=emptyfields$username=".$name);
        exit();
    }elseif(!preg_match("/^[a-zA-z0-9]*/",$name)){
        header("Location: ../register.php?error=invalidusername&username=".$name);
        exit();
    }elseif(!preg_match("/^[a-zA-z0-9]*/",$index_number)){
        header("Location: ../register.php?error=invaliduserindex_number&username=".$name);
        exit();
    }elseif(!preg_match("/^[0-500]*/",$marks)){
        header("Location: ../register.php?error=invalidmarks&username=".$name);
        exit();
    }elseif(!preg_match("/^[fmMF]*/",$gender)){
        header("Location: ../register.php?error=invalidgendere&username=".$name);
        exit();
    }elseif(!preg_match("/^[a-zA-Z]*/",$secondary)){
        header("Location: ../register.php?error=invalidSecondarySchool&username=".$name);
        exit();
    }
    else{
        
        $sql = "SELECT index_number FROM student WHERE index_number = ?";
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
                header("Location: ../adminRegister.php?error=indexNumberTaken");
        exit();
            }else{
                $sql = "INSERT INTO student (index_number,name,marks,gender,secondary_school ) VALUES(?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
 
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../adminRegister.php?sqlerror");
                    exit();
                }else{

                    mysqli_stmt_bind_param($stmt, "ssiss", $index_number,$name,$marks,$gender,$secondary);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?success=registered");
                    alert('student registered successfully');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}