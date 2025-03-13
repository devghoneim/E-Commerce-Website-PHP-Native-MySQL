<?php
include("../Database/settingData.php");
$ids = implode(",",$_POST["orderIDs"]);
$con-> query("DELETE FROM `orders` WHERE id in('$ids')");
echo $ids;