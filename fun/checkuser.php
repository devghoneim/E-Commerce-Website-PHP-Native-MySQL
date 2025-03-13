<?php
session_start();

$id =$_GET['id'];

if(isset($_SESSION['userid'])){
    $user = $_SESSION['userid'];
header("location:addtocart.php?id=$id");

}else{
    header("location:../login.php");
}