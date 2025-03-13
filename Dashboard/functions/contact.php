<?php

include("../Database/settingData.php");
$id = $_GET["id"];
$con -> query("UPDATE `contact` SET `status`='1' WHERE id = '$id'");
header("location:../index.php?contact");