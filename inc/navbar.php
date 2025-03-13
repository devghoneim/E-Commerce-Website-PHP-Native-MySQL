<?php
session_start();
include("fun/conn.php");

?>

<header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if ($status == "home") {
                    echo "active";
                  }?> mx-3" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if ($status == "shop") {
                    echo "active";
                  }?>" href="shop.php?pag=1">Shop</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="detail.html">Product detail</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li> -->
              </ul>
              <ul class="navbar-nav ml-auto">     
                          
                <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">
                 (
                 <?php 
                  if (isset($_SESSION["userid"])) {
                      $userid = $_SESSION["userid"];
                      $re = $con -> query("select * from cart where userID = $userid AND `status` IS NULL");
                      $row = $re -> fetch_assoc();
                      $num = $re -> num_rows;
                      if ($num > 0 ) {
                        echo $num;
                      } else {
                        echo 0;
                      }
                      
                    
                   

                  }?>
                  )</small></a></li>
                <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li>
                <?php
                    if (isset($_SESSION["username"])) {
                        ?>
                <li class="nav-item"><a class="nav-link" href="fun/logout.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logout</a></li>
                        <?php
                    }else {
                        ?>
                        
                        <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>

                        <?php
                    }
                ?>
                        <li class="nav-item"><a class="nav-link" href="contact-form-with-svg-animation/dist/index.php"> <i class="fas fa-email mr-1 text-gray"></i>Contact Us</a></li>

              </ul>
            </div>
          </nav>
        </div>
      </header>