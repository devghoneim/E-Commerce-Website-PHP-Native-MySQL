

<!-- Table -->
<?php
if (isset($_GET["brand"])) {
  ?>
  
  <div class="d-flex justify-content-end mr-3">
  <a href="?addbrand" class="btn btn-success ">Add Brand</a>
  </div>

<?php
 $select_brand = "select * from brand";
 $result_brand = $con->query($select_brand); 
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
     while ($row_brand = $result_brand -> fetch_assoc()) {
        ?>
 
 
             <tr>
             <th scope="row"><?= $row_brand['id'] ?></th>
             <td><?= $row_brand['name'] ?></td>
             <td>
             <a class="btn btn-warning" href="?editbr&id=<?=  $row_brand['id'] ?>">Edit</a>        
             
                 <!-- Button trigger modal -->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_brand['id']?>">
   Delete
 </button>
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?=$row_brand['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_brand['id']?>" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel<?=$row_brand['id']?>">You are sure?</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
          <?=$row_brand['name']?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_brand['id']?>&f=brand">Delete</a> 
         
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
<?php if(isset($_GET["addbrand"]))
 {
    ?>
    

 <form action="functions/addbrand.php" method="POST"  style="width:80%; margin:auto;">
 <label for="brand">Name brand:</label>
 <input class="form-control" type="text" name="brand" id="brand" required  >
 <br>
 <input class="form-control bg-success" type="submit" value="Add">
 </form>
 
 <?php

 }
?>

<!-- edit brand -->
<?php if(isset($_GET["editbr"]))
 {
   $select_brand_update = "select * from brand WHERE id=". $_GET["id"];
   $result_brand_update = $con -> query($select_brand_update);
   $row_brand_update = $result_brand_update -> fetch_assoc();
    ?>
    

 <form action="functions/addbrand.php?editbrand&id=<?=$row_brand_update["id"]?>" method="POST"  style="width:80%; margin:auto;">
 <label for="brand">Edit brand</label>
 <input value="<?=$row_brand_update["name"]?>" class="form-control" type="text" name="brand" id="brand" required  >
 <br>
 <input class="form-control bg-success" type="submit" value="Add">
 </form>
 
 <?php
}