<?php



$select_contact = "select imgepro.name as img, products.name , users.firstname,  avg(reviews.stars) as rev  from reviews inner join products on products.id = reviews.proID inner join users on users.id = products.vendorID inner join imgepro on imgepro.productID = products.id group by reviews.proID order by rev desc";
$result_contact = $con->query($select_contact); 
?>

<div class="table-responsive mt-3">
<table class=" table text-center">
  <thead >
    <tr >
    <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Vendor</th>
      <th scope="col">Average</th>
      
    </tr>
  </thead>
  <tbody>

  <?php
    while ($row_contact = $result_contact -> fetch_assoc()) {
       ?>


            <tr>
            <td><img style="width:150px;height:150px;" src="img/<?= $row_contact['img']?>" ></td>

            <td><?= $row_contact['name'] ?></td>
            <td><?= $row_contact['firstname'] ?></td>
            <td><?= $row_contact['rev'] ?></td>
    
            </tr>




<?php
    }

?>

  </tbody>
</table>
</div>

