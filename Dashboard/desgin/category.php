<!-- Table -->
<?php

if (isset($_GET["cat"])) {
  ?>
<div class="d-flex justify-content-end mr-3">
<a href="?addcat" class="btn btn-success ">Add Category</a>
</div>

<?php
$select_cat = "select * from category";
$result_cat = $con->query($select_cat); 
?>
<div class="table-responsive mt-3">
<table class=" table text-center">
  <thead >
    <tr >
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">controls</th>
    </tr>
  </thead>
  <tbody>

  <?php
    while ($row_cat = $result_cat -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row_cat['id'] ?></th>
            <td><?= $row_cat['name'] ?></td>
            <td>
            <a class="btn btn-warning" href="?editcat&id=<?=  $row_cat['id'] ?>">Edit</a>        
            
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_cat['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_cat['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_cat['id']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?=$row_cat['id']?>">You are sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?=$row_cat['name']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_cat['id']?>&f=cat">Delete</a> 
        
      </div>
    </div>
  </div>
</div>


 
        </td>
            </tr>




<?php
    }

?>

  </tbody>
</table>
</div>


<?php
}
?>






<!-- add -->
 <?php
 if(isset($_GET["addcat"]))
 {
    ?>
    

<form action="functions/addcat.php" method="POST"  style="width:80%; margin:auto;">
<label for="country">Name category:</label>
<input class="form-control" type="text" name="cat"  required  >
<br>
<input class="form-control bg-success" type="submit" value="Add">
</form>

<?php
 }

?>


<!-- Edit Category -->
<?php

if(isset($_GET["editcat"])){


  $select_cat_update = "select * from category WHERE id=". $_GET["id"];
  $result_cat_update = $con -> query($select_cat_update);
  $row_cat_update = $result_cat_update -> fetch_assoc();
    ?>
    

<form action="functions/addcat.php?editcat&id=<?=$row_cat_update["id"]?>" method="POST"  style="width:80%; margin:auto;">
<label for="cat">Edit category:</label>
<input value ="<?=$row_cat_update["name"]?>" class="form-control" type="text" name="cat" id="cat"  required  >
<br>
<input class="form-control bg-success" type="submit" value="Add">
</form>

<?php
 }