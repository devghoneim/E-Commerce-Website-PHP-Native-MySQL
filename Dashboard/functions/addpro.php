<?php
include("../Database/settingData.php");
SESSION_start();


$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$des = $_POST['des'];
@$brand = $_POST['brand'];
$cat = $_POST['cat'];
@$gender= $_POST["gender"];
$user_id= $_SESSION["userID"];



// New Version

$con ->query("INSERT INTO `products`(`name`, `brand`, `cat`, `count`, `price`, `description` , `vendorID` ,`gender`) VALUES ('$name','$brand','$cat','$count','$price','$des' , '$user_id','$gender')");


// Get Last Product Id

$sql_last_product = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
$result_last_product = $con->query($sql_last_product);
    $last_product = $result_last_product->fetch_assoc();
    $product_id = $last_product['id']; 




    if (isset($_FILES['product_images'])){
        $files = $_FILES['product_images'];
        $totalFiles = count($files['name']);
        $allowedExts = ["jpg", "jpeg", "png"]; 
        

     
        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = $files['name'][$i];
            $fileTmp = $files['tmp_name'][$i];
            $fileSize = $files['size'][$i];
            $fileError = $files['error'][$i];
            
            $img_exp= explode(".",$fileName);
            $img_ext = end($img_exp);
           
            if ($fileError === 0) {

                if (in_array($img_ext, $allowedExts)) {
                    if ($fileSize <= 2 * 1024 * 1024) {
                        $newFileName = time() . rand(1,100) . $fileName;
                        

                        if (move_uploaded_file($fileTmp, "../img/$newFileName")) {
                            $con -> query("INSERT INTO `imgepro`(`name`, `productID`) VALUES ('$newFileName','$product_id')");
                            header("location:../index.php?products");


                        } else {
                            echo "Error uploading $fileName.<br>";
                        }
                    } else {
                        echo "File $fileName is too large. Maximum size is 2MB.<br>";
                    }
                } else {
                    echo "File $fileName has an invalid extension. Only JPG and PNG are allowed.<br>";
                }
            } else {
                echo "Error with file $fileName.<br>";
            }
        }
    }
    



// if (!isset($_GET["editpro"])) {
//     if (!empty($_FILES)) {
      

        
// $img_name = $_FILES['image']['name'];
// $img_tmp = $_FILES['image']['tmp_name'];
// $img_size = $_FILES['image']['size'];



// $img_exp= explode(".",$img_name);
// $img_ext = end($img_exp);

// $allow_ext = ["jpg","jpeg","gif","bmb","png"];

// if (!in_array($img_ext  , $allow_ext)) {
//     echo $_FILES["image"]["name"];
//     echo "image type error";
//     exit();
// }
// if ($img_size > 3000000) {
//         echo "file is big";
//         exit();
// }
// $new_img_name = time().rand(1,100000) . $img_name;
// move_uploaded_file($img_tmp,"../img/$new_img_name");

        
//     }
// }else {
//        $result_img_name =$con->query("select image from products WHERE id=". $_GET["editpro"]);
//          $img_name_update = $result_img_name->fetch_assoc();
//          $img_name =$img_name_update["image"];
//         $new_img_name = $img_name;
// }






// if (isset($_GET["editpro"])) {
    
//     $query ="UPDATE `products` SET `name`='$name',`brand`='$brand',`cat`='$cat',`count`='$count',`price`='$price',`image`='$new_img_name',`description`='$des' WHERE id=". $_GET["editpro"] ;
// }else {
    
//     $query ="INSERT INTO `products`( `name`, `brand`, `cat`, `count`, `price`, `image`, `description`) VALUES ('$name','$brand','$cat','$count','$price','$new_img_name','$des')" ;
// }

// $con -> query($query);

// header("location:../index.php?products");
