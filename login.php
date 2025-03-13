<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animated Login & Registration </title>
  <link rel="stylesheet" type="text/css" href="style.css">
 
</head>

<body >

  <div class="wrapper" >
    <div class="form-wrapper sign-in ">
      <form class="form " action="fun/loginandregister.php" method="post">
        <h2 style="color:black;">Login</h2>
        <div class="input-group">
          <input style="color:black;" type="text" required name="name" value="mohamed">
          <label style="color:black;" for="">Username</label>
        </div>
        <div class="input-group">
          <input style="color:black;" type="password" required name="password" value="123456789">
          <label style="color:black;" for="">Password</label>
        </div>
        <!-- <div class="remember">
          <label><input type="checkbox"> Remember me</label>
        </div> -->
        <button type="submit">Login</button>
        <div class="signUp-link">
          <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
        </div>
      </form>
    </div>

    <div class="form-wrapper sign-up">
      <form action="fun/loginandregister.php?r" method="post">
        <h2 style="color:black;">Sign Up</h2>
        <div class="input-group">
          <input style="color:black;" type="text" required name ="username">
          <label style="color:black;" for="">Username</label>
        </div>
        <div class="input-group">
          <input style="color:black;" type="email" required name ="email">
          <label style="color:black;" for="">Email</label>
        </div>
        <div class="input-group">
          <input style="color:black;" type="password" required name ="password">
          <label style="color:black;" for="">Password</label>
        </div>
        <button type="submit">Sign Up</button>
        <div class="signUp-link">
          <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
        </div>
      </form>
    </div>
  </div>
  
 <?php
 if (isset($_SESSION["errors"])) {
  
  ?>

  <h3 style="color:white; margin-left:20px;"> <?= $_SESSION["errors"]?></h3>

<?php
 unset($_SESSION["errors"]);
 }
?>

  <script src="script.js"></script>
</body>

</html>