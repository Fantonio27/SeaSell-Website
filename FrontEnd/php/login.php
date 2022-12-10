<?php
  //include "../includes/db/connection.php";
  session_start();
  include "../includes/functions/action.php";
  login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seasell - Login</title>
  <link rel="icon" type="image/x-icon" href="../includes/images/Logo/icon-logo.png">
  <link rel="stylesheet" href="../includes/css-bootstrap/bootstrap.min.css">
  <script type="text/javascript" src="../includes/js/bootstrap.bundle.js"></script>
  <!--<link rel="stylesheet" href="/FrontEnd/css/login.css">-->
  
</head>
<style>
  <?php
    include"../css/login.css";
  ?>
</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xxl-2 col-xl-1"></div>
      <div class="col-xxl-8 col-xl-10 col-md-12">
        <div class="container-box">
          <div class="row">
            <div class="col-xxl-6 col-xl-6 c4 c">   
              <div class="text-pic">Welcome to SeaSell</div>  
              <div class="text-pic-1">Experience the difference. Shopping the way you like it! </div>  
              <div class="pic-login"></div>
            </div>
            <div class="col-xxl-6 col-xl-6 c">
              <a href="../index.php"><img src="../includes/images/icon/x.svg" class="exit_btn"></a>
              <div class="box">
                <img src="../includes/images/Logo/logo-color.png" class="logo">
                <h3 class="user-txt-title">Sign in to SeaSell</h3>
                <form action="<?php $_PHP_SELF?>" method="POST">
                  <!--USERNAME-->
                  <div class="user-text">&nbspUsername
                  <input type="text" id="username" class="user-txtbox" placeholder="Enter username"  
                  oninput="valid('username')" maxlength="30" name="username"></div>
                  <label id="req1">Username is a required field</label>
                  <!--PASSWORD-->
                  <div class="user-text">&nbspPassword
                  <input type="password" id="password" class="user-txtbox" placeholder="Enter password"  
                  oninput='valid("password")' maxlength="20" name="password"></div>
                  <label id="req2" style="margin-bottom:5px">Password is a required field</label><br>

                  <input type="checkbox" id="check" onclick="showpass()" class="form-check-input checkbox"> Show Password
                  <a href="forgetpass.php" class="forget-text">Forget Password?</a>

                  <input type="submit" class="login-btn" value="Sign In" id="login" name="login" disabled>
                  <p class="p1">Dont have an account?<a href="register.php" class="p2"> Sign Up</a></p>
                </form>   
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-2 col-xl-1"></div>
    </div>
  </div>
</body>
</html>

<script>
  <?php
    include"../js/login.js";
  ?>
</script>