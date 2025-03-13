<?php
include("../Database/settingData.php");
$con->query("UPDATE `orders` SET `status`='shipping' WHERE userID = ". $_GET["id"]);
header("location:../index.php?orders");