<?php
  session_start();
  include "../includes/functions/action.php";
  $email = $_SESSION['email'];
  update_password();
  //echo $email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seasell - Reset Password</title>
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
          <p class="title">Reset Password</p>
          <p class="smtitle">Enter your new password</p>
          <form action="<?php $_PHP_SELF?>" method="POST">
            <div class="contain-item"> <!--email-->
                <input type="password" class="form-control txtbox" placeholder="New Password" name="password"
                minlength = "8" maxlength="20"
                required>
                <input type="password" class="form-control txtbox" placeholder="Confirm Password" name="confpass"
                required>
            </div>
            <input type="submit" class="login-btn" value="RESET PASSWORD" name="reset"><br>
          </form>
        </div>
      </div>
      <div class="col-xxl-4 "></div>
    </div>
  </div>
</body>
</html>
