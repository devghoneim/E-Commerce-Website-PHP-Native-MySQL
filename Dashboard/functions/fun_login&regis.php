<?php

SESSION_start();
include("../Database/settingData.php");




// register
if (isset($_GET["register"])) {
    $fName = trim($_POST["FirstName"]);
$lName = trim($_POST["LastName"]);
$Email = trim($_POST["Email"]);
$Password = trim($_POST["Password"]);
$rePassword = trim($_POST["rePassword"]);
$pr = $_POST["permission"];
$Error=[];

// Validate Password

if (strlen($Password) < 8) {
    $errors[] = "Password must be at least 8 characters.";
} elseif ($Password !== $rePassword) {
    $errors[] = "Passwords do not match.";
}

if (empty($errors)) {
    $hashPassword = md5($Password);
    $insert = "INSERT INTO users(`firstname`, `lastname`,`email`,`password`,`permission` ,`status`) VALUES ('$fName','$lName','$Email','$hashPassword','$pr' , '0')";
    $con-> query($insert);
    
     header("location:../login.php");
    exit();
}

$_SESSION["errors"] = $errors;
header("location:../register.php");
exit(); 
}


// ///////////////////////////////////////////////////////////////////////////// 




//login
if (!isset($_GET["register"])) {
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$hashPassword = md5($Password);
$result = $con -> query("select * from users WHERE email = '$Email' AND password = '$hashPassword'");
$num = $result -> num_rows;

if ($num == 1 ) {
    $row = $result -> fetch_assoc();
    $userName = $row["firstname"].$row["lastname"];
    $_SESSION["username"] = $userName;
    $_SESSION["permission"] = $row["permission"];
    $_SESSION["userID"] = $row["id"];
    header("location:../index.php");
}else
{
    
    header("location:../login.php?error");

}

}
