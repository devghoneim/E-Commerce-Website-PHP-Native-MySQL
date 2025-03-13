
<?php
include("../Database/settingData.php");
    $sql="";
    if (isset($_GET["editpr"])) {
        
 
    $name = trim($_POST['pr']);
    $sql="UPDATE `permission` SET `name`='$name' WHERE id =". $_GET["id"];




    }else{
    $name = trim($_POST['pr']);
    $sql="INSERT INTO `permission`(`name`) VALUES ('$name')";
        }
    $con -> query($sql);
    header("location:../index.php?pr");