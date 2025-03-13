<?php
include("../Database/settingData.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    
<!-- Invoice 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
        <div class="row gy-3 mb-3">
          <div class="col-6">
            <h2 class="text-uppercase text-endx m-0">Invoice</h2>
          </div>
          <div class="col-6">
            <a class="d-block text-end" href="#!">
              <!-- <img src="../../images/home/logo.png" class="img-fluid" alt="BootstrapBrain Logo" width="135" height="44"> -->
            </a>
          </div>
          <div class="col-12">
            <h4>From</h4>
            <address>
              <strong>Boutique</strong><br>
              875 N Coast Hwybr<br>
              Laguna Beach, California, 92651<br>
              United States<br>
              Phone: (949) 494-7695<br>
              Email: Boutique@domain.com
            </address>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-sm-6 col-md-8">
            <h4>Bill To</h4>
            <address>
                <?php 
                    $re_cust = $con -> query("select * from customers where id =" . $_GET["id"]); 
                    $row_cust = $re_cust -> fetch_assoc();
                ?>
              <strong><?=$row_cust["name"]?></strong><br>
                               <?=$row_cust["address"]?>  
                               <br>  
                               <?=$row_cust["city"]?>          
              <br>
              
              <?php  
              $re_country = $con -> query("select * from country where id =" . $row_cust["country"]);
              $row_counrty = $re_country -> fetch_assoc();
              echo $row_counrty["name"];
              ?>
              <br>
              Phone: (+20) <?=$row_cust["phone"]?><br>
              Email: <?=$row_cust["email"]?>
            </address>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <h4 class="row">
              <span class="col-6">Invoice #</span>
              <span class="col-6 text-sm-end">INT-001</span>
            </h4>
            <div class="row">
              <span class="col-6">Account</span>
              <span class="col-6 text-sm-end"><?=$row_cust["id"]?></span>
              <span class="col-6">Order ID</span>
              <span class="col-6 text-sm-end">#</span>
              <span class="col-6">Invoice Date</span>
              <span class="col-6 text-sm-end">12/10/2025</span>
              <span class="col-6">Due Date</span>
              <span class="col-6 text-sm-end">18/12/2025</span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="text-uppercase">Qty</th>
                    <th scope="col" class="text-uppercase">Product</th>
                    <th scope="col" class="text-uppercase text-end">Unit Price</th>
                    <th scope="col" class="text-uppercase text-end">Amount</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                 
                 
                 <?php
                            $userid = $_GET["id"];
                            $re_order = $con -> query("select * from cart where userID = $userid AND `status` = 'orderd' " );
                            while ($row_order = $re_order -> fetch_assoc()) {
                                ?>
                                                                 <tr>
                    <th scope="row"><?=$row_order["count"]?></th>
                    <td><?=$row_order["name"]?></td>
                    <td class="text-end"><?=$row_order["price"]?></td>
                    <td class="text-end"><?=$row_order["total"]?></td>
                  </tr>
     

<?php
                            }

                        ?>

                  <tr>
                    <td colspan="3" class="text-end">Subtotal</td>
                    <?php
                    $re_total = $con->query("SELECT SUM(total) AS thetotal FROM cart WHERE userID = $userid AND `status` = 'orderd'");
                    $row_total= $re_total -> fetch_assoc();
                    ?>
                    <td class="text-end"><?=$row_total["thetotal"]?></td>
                  </tr>
                  <tr>
                    <?php $total_vat = $row_total["thetotal"];?>
                    <td colspan="3" class="text-end">VAT (5%)</td>
                    <td class="text-end"><?= ( $total_vat =($total_vat * 5)/100) ?></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-end">Shipping</td>
                    <td class="text-end">15</td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="3" class="text-uppercase text-end">Total</th>
                    <td class="text-end"><?=$total_vat + 15 + $row_total["thetotal"] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-end">
            <!-- <button type="submit" class="btn btn-primary mb-3">Print Invoice</button> -->
      
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>