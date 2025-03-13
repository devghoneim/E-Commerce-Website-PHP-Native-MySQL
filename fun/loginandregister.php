<?php
session_start();
include("conn.php");






if (isset($_GET["r"])) {


    

    $name = trim($_POST["username"]);
    $Email = trim($_POST["email"]);
    $Password = trim($_POST["password"]);
    $errors;
    
    // Validate Password
    
    if (strlen($Password) < 8) {
        $errors = "Password must be at least 8 characters.";
    }
    $result_cus = $con -> query("select * from customers WHERE name = '$name'");
    $num = $result_cus -> num_rows;
    if ($num > 0) {
        $errors = "user name is exists.";
    }    
    if (empty($errors)) {
        $hashPassword = md5($Password);
        $insert = "INSERT INTO `customers`( `name`, `email`, `password`) VALUES ('$name','$Email','$hashPassword')";
        $con-> query($insert);
        
         header("location:../login.php");
        exit();
    }
    
    $_SESSION["errors"] = $errors;
    header("location:../login.php");
    exit(); 
}




    /////// Login ///////

    $name = trim($_POST["name"]);
    $Password = trim($_POST["password"]);
    $hashPassword = md5($Password);

    $result_cus = $con -> query("select * from customers WHERE name = '$name' AND password = '$hashPassword'");
    $num  = $result_cus -> num_rows;  

    if ($num > 0) {
        $row = $result_cus -> fetch_assoc();
        $_SESSION["username"] = $row["name"];
        $_SESSION["userid"] = $row["id"];
         header("location:../index.php");
         exit();

    }else {
        $errors ="Username And Password is faild";
    }


    $_SESSION["errors"] = $errors;
    header("location:../login.php");
    exit(); 
