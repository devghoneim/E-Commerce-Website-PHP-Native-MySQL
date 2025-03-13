<?php

include("conn.php");

$con->query("DELETE FROM `cart` WHERE id = " . $_GET["id"] );

header("location:../cart.php");