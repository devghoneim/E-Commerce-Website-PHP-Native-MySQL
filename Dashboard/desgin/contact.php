<?php


 $select_contact = "select * , Case when status = 0 then 'Unread'  when status = 1 then 'read' else 'Unknown' end as x  from contact   ";
 $result_contact = $con->query($select_contact); 
 ?>

 <div class="table-responsive mt-3">
 <table class=" table text-center">
   <thead >
     <tr >
       <th scope="col">id</th>
       <th scope="col">name</th>
       <th scope="col">Email</th>
       <th scope="col">Phone</th>
       <th scope="col">Status</th>
       <th scope="col">Show</th>
     </tr>
   </thead>
   <tbody>
 
   <?php
     while ($row_contact = $result_contact -> fetch_assoc()) {
        ?>
 
 
             <tr>
             <th scope="row"><?= $row_contact['id'] ?></th>
             <td><?= $row_contact['name'] ?></td>
             <td><?= $row_contact['email'] ?></td>
             <td><?= $row_contact['phone'] ?></td>
             <td class="status" data-id="<?=$row_contact['id']?>"><?= $row_contact['x'] ?></td>
             <td>
             
                 <!-- Button trigger modal -->
 <button type="button" class="btn btn-<?php if($row_contact["status"] == 0){echo "danger";}else{echo "success";} ?>" data-toggle="modal" data-target="#exampleModal<?=$row_contact['id']?>">
   Show
 </button>
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModal<?=$row_contact['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row_contact['id']?>" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel<?=$row_contact['id']?>">Message</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
          <?=$row_contact['text']?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <!-- a href -->
         <button data-id="<?= $row_contact['id'] ?>" class="btn btn-info show">Ok !</button> 
         
       </div>
     </div>
   </div>
 </div>
 
 <!--  functions/contact.php?id= $row_contact['id'] -->
 
  
         </td>
             </tr>
 
 
 
 
 <?php
     }
 
 ?>
 
   </tbody>
 </table>
 </div>
 <script src="jquery-3.7.1.min.js"></script>

 <script>
 
 $(".show").click(function() {
  let id = $(this).data("id");
  $.ajax({
    url: "functions/contact.php",
    type: "POST",
    data: { id: id },
    success: function(response) {
      console.log($(this).parent());
    },
    error: function(error) {
      console.error("Error:", error);
    }
  });
});

  </script>

