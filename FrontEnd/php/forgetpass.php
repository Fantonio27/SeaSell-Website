<?php 
  session_start();
  include"../includes/functions/action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seasell - Forget Password</title>
  <link rel="icon" type="image/x-icon" href="../includes/images/Logo/icon-logo.png">
  <link rel="stylesheet" href="../includes/css-bootstrap/bootstrap.min.css">
  <script type="text/javascript" src="../includes/js/bootstrap.bundle.js"></script>
</head>
<style>
  <?php
    include"../css/forgetpass.css";
  ?>
</style>
<body>
  <div class="container-fluid">
    <div class="row r"></div>
    <div class="row">
      <div class="col-xxl-4"></div>
      <div class="col-xxl-4">
        <div class="box" id="box">
          <center><img src="../includes/images/Logo/logo-color.png" class="logo"></center>
          <p class="title">Forget Password</p>
          <p class="smtitle">Enter the email address associated with your account and we'll send you a code to reset your password.</p>
          <form action="<?php $_PHP_SELF?>" method="POST">
            <div class="contain-item"> <!--email-->
                <input type="email" class="form-control txtbox" placeholder="Email Address" id="email" name="email"
                minlength="9" maxlength="30"  pattern="[a-zA-Z-z0-9.]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$"
                title="Enter a valid email" required>
            </div>

            <?php
                fetch_email();
            ?>
            
            <input type="submit" class="login-btn" value="CONTINUE" name="enter"><br>
            <a href="login.php" class="p2">Back to Login</a></p>
          </form>
        </div>
      </div>
      <div class="col-xxl-4 "></div>
    </div>
  </div>
</body>
</html>