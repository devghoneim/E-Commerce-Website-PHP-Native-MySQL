<?php

include("conn.php");


$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$text = $_POST["text"];

$con->query("INSERT INTO `contact`( `name`, `email`, `phone`, `text`) VALUES ('$name','$email','$phone','$text')");

header("location:../index.php");
