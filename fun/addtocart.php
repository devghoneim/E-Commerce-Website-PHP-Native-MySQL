<?php
session_start();

$user = $_SESSION["userid"];
$pro = $_GET["id"];
if($pro === ""){
   header("location:../index.php");
}else{
   include("conn.php");

$sql_cart = "SELECT * FROM cart WHERE productID = '$pro' AND userID = '$user'";
$result_cart = $con -> query($sql_cart);
$row_cart = $result_cart -> fetch_assoc();
$num = $result_cart -> num_rows;

$sql = "SELECT * FROM products WHERE id = '$pro'";
$result =  $con -> query($sql);
$row = $result -> fetch_assoc();
$name_pro = $row['name'];
$price_pro = $row['price'];
$count_pro = 1;
$brand_pro = $row['brand'];
$cat_pro = $row['cat'];
$sql_imgepro = "SELECT * FROM imgepro WHERE productID = '$pro' LIMIT 1 ";
$result_imgepro = $con -> query($sql_imgepro);
$row_imgepro = $result_imgepro -> fetch_assoc();
$image_pro = $row_imgepro['name'];

if($num > 0){

    @$old_count = $row_cart['count']; 
    @$new_count = $old_count + 1 ;
    $old_price = $row_cart['price'];
    $new_price = $old_price * $new_count;

   $insert =  "UPDATE `cart` SET `price`='$new_price',`count`='$new_count' WHERE productID = '$pro' AND userID = '$user'";







}
else{
 
   $insert = "INSERT INTO `cart`(`productID`, `userID`, `name`, `count`, `price`, `total`, `imgID`) VALUES ('$pro','$user','$name_pro','$count_pro','$price_pro','$price_pro','$image_pro')";

}


$con -> query($insert);
$previous_url = $_SERVER['HTTP_REFERER'];

header("location:$previous_url");

}