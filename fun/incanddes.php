<?php
SESSION_start();
include("conn.php");
$userid = $_SESSION["userid"];
$id = $_GET['id'];
$action = $_GET['action'];
$sql_cart = "SELECT * FROM cart WHERE id = '$id' AND userID = '$userid'";
$result_cart = $con -> query($sql_cart);
$row_cart = $result_cart -> fetch_assoc();
$id_products = $row_cart['productID'];

$sql_products = "SELECT * FROM products WHERE id = '$id_products'";
$result_products= $con -> query($sql_products);
$row_products= $result_products -> fetch_assoc();
$result_count_pro = $con -> query("SELECT count FROM products WHERE id = '$id_products'");
$row_count_pro = $result_count_pro->fetch_assoc();
 $count_pro = $row_count_pro['count'];
@$old_count = $row_cart['count']; 

if($count_pro > $old_count){



 if($action==="plus" ){
    
    @$new_count = $old_count + 1 ;
    $old_price = $row_products['price']; 
    $new_price = $old_price * $new_count;
    $update_cart = "UPDATE `cart` SET `total`='$new_price',`count`='$new_count' WHERE id = '$id' AND userID = '$userid'";
    

    
    
}
}
if($action === "neg" && $old_count > 1){
    @$new_count = $old_count -1;
    $old_price = $row_products['price'];
    $new_price = $old_price * $new_count;
    $update_cart = "UPDATE `cart` SET `total`='$new_price',`count`='$new_count' WHERE id = '$id' AND userID = '$userid'";
    

}


if (!empty($update_cart)) {
    
    $con -> query($update_cart);
}
header("location:../cart.php");
