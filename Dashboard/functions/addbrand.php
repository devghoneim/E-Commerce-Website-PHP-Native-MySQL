
<?php
include("../Database/settingData.php");
    $sql="";
    if (isset($_GET["editbrand"])){
        
        
        $name = trim($_POST['brand']);
        $sql="UPDATE `brand` SET `name`='$name' WHERE id =".  $_GET["id"];



    }else{
        $name = trim($_POST['brand']);
        $sql="INSERT INTO `brand`(`name`) VALUES ('$name')";
    }
    $con -> query($sql);
        header("location:../index.php?brand");