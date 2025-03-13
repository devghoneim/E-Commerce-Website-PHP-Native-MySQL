<?php
session_start();

include("../Database/settingData.php");
$delete="";
$previous_url = $_SERVER['HTTP_REFERER'];

if(isset($_GET["f"]) && $_GET["f"]=="brand")
{

    $delete = "DELETE FROM `brand` WHERE id=".$_GET["id"];


}
if(isset($_GET["f"]) && $_GET["f"]=="product"){
    $delete = "DELETE FROM `products` WHERE id=".$_GET["id"];
    $delete_image = "DELETE FROM `imgepro` WHERE productID=".$_GET["id"];
    $con -> query($delete_image);
    
}

if(isset($_GET["f"]) && $_GET["f"]=="brand"){
    $delete = "DELETE FROM `brands` WHERE id=".$_GET["id"];
    
}if(isset($_GET["f"]) && $_GET["f"]=="cat"){
    $delete = "DELETE FROM `category` WHERE id=".$_GET["id"];
    
}
if(isset($_GET["f"]) && $_GET["f"]=="pr"){
    $delete = "DELETE FROM `permission` WHERE id=".$_GET["id"];
   
}if(isset($_GET["f"]) && $_GET["f"]=="user"){
    if ($_SESSION["permission"] == 5 || $_SESSION["permission"] == 6) {
        $adminID = $_SESSION["userID"];
        $id = $_GET["id"];
        $delete = "INSERT INTO `accepts`(`adminID`, `status`, `whowillremove`) VALUES ('$adminID','preparing','$id')"   ;              

    }else {
        
        $delete = "DELETE FROM `users` WHERE id=".$_GET["id"] ;
        $update = "DELETE FROM `accepts` WHERE whowillremove=".$_GET["id"] ;
    }
}if (isset($_GET["notdelete"])) {
    $delete = "DELETE FROM `accepts` WHERE id=".$_GET["id"];
    
}

if (!empty($update)) {
    $con->query($update);
}
if (!empty($delete)) {
    $con->query($delete);
    header("Location: $previous_url");
    exit;
}