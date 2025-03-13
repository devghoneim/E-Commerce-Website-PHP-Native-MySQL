<h3 style="text-align:center; margin-bottom:30px;">Orders</h3>

<?php
// استرجاع جميع المستخدمين الذين لديهم طلبات
$result_users = $con->query("SELECT DISTINCT userID FROM orders order by `date`");

while ($row_user = $result_users->fetch_assoc()) {
    $userID = $row_user["userID"];

    // عرض عنوان المستخدم
    echo "<h4 style='text-align:center; margin-top:30px; margin-bottom:15px;'>Orders for User: $userID</h4>";
    ?>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">UserID</th>
                <th scope="col">ProductID</th>
                <th scope="col">Count</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Controls</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $result_orders = $con->query("SELECT * FROM orders WHERE userID = $userID");
            while ($row = $result_orders->fetch_assoc()) {
                ?>
                <tr>
                <td>
    <input type="checkbox" class="chk" name="orderIDs[]" value="<?= $row['id'] ?>">
</td>

                    <th scope="row"><?= $row["id"] ?></th>
                    <td><img style="width:150px;height:150px;" src="img/<?= $row["img"] ?>"></td>
                    <td><?= $row["userID"] ?></td>
                    <td><?= $row["productID"] ?></td>
                    <td><?= $row["count"] ?></td>
                    <td><?= $row["total"] ?></td>
                    <td><?= $row["date"] ?></td>
                    <td>
                        <a href="functions/shipping.php?id=<?=$userID?>" class="btn btn-sm btn-info<?php if($row["status"] == "shipping"){echo "disabled";}?>">Shipping</a>
                        <a href="functions/invoic.php?id=<?=$userID?>" class="btn btn-sm btn-success">Print</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
<div class="row  ">
    <div class="col d-flex justify-content-center">

        <button id="updateStatus" class="btn btn-primary my-5 w-40">Delete </button>
    </div>
</div>

<script src="jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function(){
    $("#updateStatus").click(function(){
      let selectedOrders = []; 
      
      $(".chk:checked").each(function(){
        selectedOrders.push($(this).val()); 
        $(this).closest("tr").remove();
      });

      if (selectedOrders.length > 0) {
        $.ajax({
          url: "functions/process_checkbox.php", 
          type: "POST",
          data: { orderIDs: selectedOrders }, 
          success: function(response){
            alert("Updated " + response);
            
          }
        });
      } else {
        alert("يرجى تحديد طلب واحد على الأقل!");
      }
    });
  });
</script>


