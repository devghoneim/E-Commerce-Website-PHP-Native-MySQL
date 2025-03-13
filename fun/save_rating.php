<?php
include("conn.php");

$stars=$_POST["rating"];
$txt=$_POST["text"];
$pro=$_GET["pro"];
$userID=$_GET["user"];

$result = $con -> query("SELECT * FROM `reviews` WHERE `proID`='$pro' AND `userID` = '$userID'");
$num = $result -> num_rows;
if ($num > 0) {
header("location:../detail.php?id=$pro");
    exit();
}

$con->query("INSERT INTO `reviews`(`proID`, `userID`,`stars`, `txt`) VALUES ('$pro','$userID','$stars','$txt')");


header("location:../detail.php?id=$pro");