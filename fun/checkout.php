<?php
session_start();
include("conn.php");
$userid=$_SESSION["userid"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$country = $_POST["country"];
$address = $_POST["address1"] . $_POST["address2"];
$city = $_POST["city"];
$re_cart = $con -> query("select * from cart where userid = '$userid'");
while ($row_cart = $re_cart ->fetch_assoc()) {
    $productID = $row_cart["productID"];
    $img = $row_cart["imgID"];
    $count = $row_cart["count"];
    $total = $row_cart["total"];
    // insert to orders - table
    $con->query("INSERT INTO `orders`(`userID`, `productID`, `img`, `date`, `count`, `total`) VALUES ('$userid','$productID','$img',NOW() ,'$count','$total')");
    // delete count in products - table
    $re_pro = $con -> query("select * from products where id =" . $row_cart["productID"]);
    $row_pro = $re_pro->fetch_assoc();
    $count_pro = $row_pro["count"];
    $count_cart = $row_cart["count"];
    $newCount = $count_pro - $count_cart;
    $con->query("UPDATE `products` SET `count`='$newCount' WHERE id = " . $row_cart["productID"]);

}
// update customer - table
$con -> query("UPDATE `customers` SET `firstname`='$fname',`lastname`='$lname',`phone`='$phone',`address`='$address',`country`='$country',`city`='$city' WHERE id = $userid");
// update cart - table
$con -> query("UPDATE `cart` SET `status`='orderd' WHERE userid = $userid");

header("location:../cart.php?success");
