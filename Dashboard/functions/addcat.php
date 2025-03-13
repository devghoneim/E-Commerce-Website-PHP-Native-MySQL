
<?php
include("../Database/settingData.php");
    $sql="";
    if (isset($_GET["editcat"])) {
        

    $name = trim($_POST['cat']);
    $sql="UPDATE `category` SET `name`='$name' WHERE id =". $_GET["id"];




    }else{
    $name = trim($_POST['cat']);
    $sql="INSERT INTO `category`(`name`) VALUES ('$name')";
        }
    $con -> query($sql);
    header("location:../index.php?cat");