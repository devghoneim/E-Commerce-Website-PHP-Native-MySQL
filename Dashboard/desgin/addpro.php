

<!-- Table of Products -->
<?php
if (isset($_GET["addpro"])) {
  ?>
  
  <h3 class="text-center">Add Product </h3>
<div class="container ">
<form method="POST" action="functions/addpro.php" enctype="multipart/form-data">
    
<div class="form-group">
    <input  required class="form-control" type="text" placeholder="Name" name="name">
</div>
<div class="form-group">
    <input required class="form-control" type="number" placeholder="price" name="price">
</div>
<div class="form-group">
    <input required class="form-control"  type="number" placeholder="count" name="count">
</div>
<div class="form-group">
    <input required class="form-control" type="text" placeholder="description" name="des">
</div>

<div class="form-group">
    <label for="">Brand</label>
    <?php
    $sql_brand = "SELECT * FROM brand";
    $result_brand = $con -> query($sql_brand);
    ?>
   <select  name="brand" class="form-control" >
    <option value="" disabled selected>choose</option>
    <?php
    while($row_brand = $result_brand ->fetch_assoc()){
        ?>
        <option value="<?= $row_brand['id']?>"><?= $row_brand['name']?></option>
<?php
    }
    ?>
   </select>
</div>

<div class="form-group">
    <label for="cat">Category</label>
    <?php
    $sql_cat = "SELECT * FROM category";
    $result_cat = $con -> query($sql_cat);
    ?>
   <select  name="cat" class="form-control" required >
   <option value="" disabled selected>choose</option>

    <?php
    while($row_cat = $result_cat ->fetch_assoc()){
        ?>
        <option value="<?= $row_cat['id']?>"><?= $row_cat['name']?></option>
<?php
    }
    ?>
   </select>
</div>

<div class="form-group">
    <label for="cat">Gender</label>
    <?php
    $sql_gender = "SELECT * FROM gender";
    $result_gender = $con -> query($sql_gender);
    ?>
   <select  name="gender" class="form-control"  >
   <option value="" disabled selected>choose</option>

    <?php
    while($row_gender = $result_gender ->fetch_assoc()){
        ?>
        <option value="<?= $row_gender['id']?>"><?= $row_gender['name']?></option>
<?php
    }
    ?>
   </select>
</div>


<div class="form-group">
    <div class="row d-flex">
        <!-- <div class="col-6">
            <label for="onePic">For one Picture</label>
            <input class="form-control " id="onePic" type="file" name="image" required >
    </div> -->
    <div class="col-6">
        <label for="multiPic">For multi Picture</label>
    <input type="file" name="product_images[]" id="multiPic" multiple>
    </div>
    </div>
</div>
<div class="d-flex justify-content-center ">
    <input class="btn btn-primary " type="submit"  value="Add product">
</div>

</form>
</div>  


<?php
}

?>
<!-- Edite Table of Products -->

<?php
if (isset($_GET["editpro"])) {
    $edit_pro="select *from products WHERE id=".$_GET["editpro"];
    $result_pro=$con->query($edit_pro);
    $row_pro=$result_pro->fetch_assoc();
 ?>


<h3 class="text-center">Edit Product</h3>
<div class="container ">
<form method="POST" action="functions/addpro.php?editpro=<?=$_GET["editpro"]?>" enctype="multipart/form-data">
    
<div class="form-group">
    <input value="<?=$row_pro["name"]?>"  class="form-control" type="text" placeholder="Name" name="name">
</div>
<div class="form-group">
    <input value="<?=$row_pro["price"]?>"  class="form-control" type="number" placeholder="price" name="price">
</div>
<div class="form-group">
    <input value="<?=$row_pro["count"]?>" class="form-control"  type="number" placeholder="count" name="count">
</div>
<div class="form-group">
    <input value="<?=$row_pro["description"]?>" class="form-control" type="text" placeholder="description" name="des">
</div>

<div class="form-group">
    <?php
    $sql_brand = "SELECT * FROM brand";
    $result_brand = $con -> query($sql_brand);
    ?>
   <select  name="brand" class="form-control" >
    <?php
    while($row_brand = $result_brand ->fetch_assoc()){
        ?>
        <option <?php
        if ($_GET["editpro"]==$row_brand["id"]) {
            echo "selected";
        }
        ?> value="<?= $row_brand['id']?>"><?= $row_brand['name']?></option>
<?php
    }
    ?>
   </select>
</div>

<div class="form-group">
    <?php
    $sql_cat = "SELECT * FROM category";
    $result_cat = $con -> query($sql_cat);
    ?>
   <select  name="cat" class="form-control"  >
   

    <?php
    while($row_cat = $result_cat ->fetch_assoc()){
        ?>
        <option <?php
         if ($_GET["editpro"]==$row_cat["id"]) {
            echo "selected";
        }
        ?>
        value="<?= $row_cat['id']?>"><?= $row_cat['name']?></option>
<?php
    }
    ?>
   </select>
</div>


<div class="form-group">
    <div class="row ">
        <div class="col-12  ">
    <input  class="form-control" type="file" name="image"  >
    <img style="width:130px;height:130px;" src="img/<?=$row_pro["image"]?>" alt="Pic of Product" >
    </div>
    
    </div>
</div>
<div class="d-flex justify-content-center ">
    <input class="btn btn-primary " type="submit"  value="Add product">
</div>

</form>
</div>  



<?php
}
?>