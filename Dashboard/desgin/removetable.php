





<!-- Table -->
<?php

if (isset($_GET["t"])) {
    ?>

<?php
$select_pr = "select * from accepts";
$result_pr = $con->query($select_pr); 
$nums = $result_pr -> num_rows;
if ($nums > 0) {
  ?>

<div class="table-responsive mt-3">
<table class=" table text-center">
  <thead >
    <tr >
      <th scope="col">ID</th>
      <th scope="col">Admin ID</th>
      <th scope="col">Who Will Delete</th>
      <th scope="col">Status</th>
      <th scope="col">controls</th>
    </tr>
  </thead>
  <tbody>

  <?php
    while ($row_pr = $result_pr -> fetch_assoc()) {
       ?>


            <tr>
            <th scope="row"><?= $row_pr['id'] ?></th>
            <td><?php 
                      $result_name_admin=$con->query("select * from users WHERE id = " . $row_pr['adminID']);
                       $row_admin_name= $result_name_admin -> fetch_assoc();
                       echo $row_admin_name["firstname"] ." " .  $row_admin_name["lastname"];      ;    
                              ?></td>
            <td><?php  $result_name_who=$con->query("select * from users WHERE id = " . $row_pr['whowillremove']);
                       $row_admin_who= $result_name_who -> fetch_assoc();
                       echo $row_admin_who["firstname"] ." " .  $row_admin_who["lastname"];  ?></td>

            <td><?= $row_pr['status'] ?></td>
            


     <td>
            <a class="btn btn-warning" href="functions/remove.php?notdelete&id=<?=  $row_pr['id'] ?>">Not Delete</a>        
            
                <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_pr['whowillremove']?>">
          Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?=$row_pr['whowillremove']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_pr['whowillremove']?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel<?=$row_pr['whowillremove']?>">You are sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <?=$row_admin_who["firstname"] ." " .  $row_admin_who["lastname"]?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_pr['whowillremove']?>&f=user">Delete</a> 

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
}else {
  ?>
<div class="alert alert-success text-center" role="alert">
  <a href="?users" class="alert-link">No Users</a>.
</div>
  <?php
}
?>


<?php
}
?>

