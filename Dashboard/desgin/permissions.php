<?php
session_start();



?>




<div class="d-flex justify-content-end mr-3">
<a href="?addpr" class="btn btn-success ">Add Permission</a>
</div>
<!-- Table -->
<?php

if (isset($_GET["pr"])) {
    ?>

<?php
$select_pr = "select * from permission";
$result_pr = $con->query($select_pr); 
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
    while ($row_pr = $result_pr -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row_pr['id'] ?></th>
            <td><?= $row_pr['name'] ?></td>


     <td>

      
            <a class="btn btn-warning" href="?editpr&id=<?=  $row_pr['id'] ?>">Edit</a>        
            
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_pr['id']?>">
          Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?=$row_pr['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_pr['id']?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel<?=$row_pr['id']?>">You are sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <?=$row_pr['name']?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_pr['id']?>&f=pr">Delete</a> 

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
<!-- Add Permission -->
 <?php
 if(isset($_GET["addpr"]))
 {
    ?>
    

<form action="functions/addpr.php" method="POST"  style="width:80%; margin:auto;">
<label for="pr">Name Permission:</label>
<input class="form-control" type="text" name="pr"  required  >
<br>
<input class="form-control bg-success" type="submit" value="Add">
</form>

<?php
 }
 ?>





<!-- Edit -->
<?php
 if(isset($_GET["editpr"])){
  $select_pr_update = "select * from permission WHERE id =" . $_GET["id"];
  $result_pr_update = $con -> query($select_pr_update);
  $row_pr_update= $result_pr_update -> fetch_assoc();
    ?>
    

<form action="functions/addpr.php?editpr&id=<?=$row_pr_update["id"]?>" method="POST"  style="width:80%; margin:auto;">
<label for="pr">Name Permission:</label>
<input value="<?=$row_pr_update["name"]?>" class="form-control" type="text" name="pr"  required  >
<br>
<input class="form-control bg-success" type="submit" value="Add">
</form>

<?php
 }
 ?>
