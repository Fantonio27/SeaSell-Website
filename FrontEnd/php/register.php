<?php
  //include "../includes/db/connection.php";

  session_start();
  
  include "../includes/functions/action.php";
  register();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seasell - Register</title>
  <link rel="icon" type="image/x-icon" href="../includes/images/Logo/icon-logo.png">
  <link rel="stylesheet" href="../includes/css-bootstrap/bootstrap.min.css">
  <script type="text/javascript" src="../includes/js/bootstrap.bundle.js"></script>
  <!--<link rel="stylesheet" href="css/register.css">-->
</head>
<style>
  <?php
    include"../css/register.css";
  ?>
</style>
<body onload="onload()">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xxl-2 col-xl-1"></div>
      <div class="col-xxl-8 col-xl-10">
        <div class="container-box">
          <div class="row">
            <div class="col-xxl-6 col-lg-6 col-md-12">
              <div class="box">
                <img src="../includes/images/Logo/logo3wcolor1.png" class="logo">
                <h1 class="title-txt">Create new account.</h1>
                <p class="p1">Have already an account?<a href="login.php" class="p2"> Login</a></p>

                <form action="<?php $_PHP_SELF?>" method="POST">
                  <input type="text" id="text-time1" name="text-time" value="" hidden>

                  <label class="p3" style="margin-top: 25px;">Username</label><br>
                  <input type="text" class="register-txtbox" id="username" placeholder="Enter Username"
                  oninput='validation("username")' maxlength="40" name="username">
                  <label id="req1">ddddd</label><br>
                  
                  <div class="pass-icon" id = "pass-icon" onclick="showpass()"></div>
                  <input type="checkbox" id = "checkbox" hidden>

                  <label class="p3">Password</label><br>
                  <input type="password" class="register-txtbox" id="password" placeholder="Enter Password"
                  oninput="validation('password')" maxlength="60" name="password">
                  <label id="req2">ddddd</label><br>

                  <label class="p3">Region</label><br>
                  <select id="region" class="register-txtbox" id="region" onclick="validation('region')" name="region">
                    <option value="" disabled selected>Select Region</option>
                    <option value="Metro Manila">Metro Manila (NCR)</option>
                  </select>
                  <label id="req3">ddddd</label><br>

                  <label class="p3">City</label><br>
                  <select id="city" class="register-txtbox" id = "city" disabled onclick="validation('city')" name="city">
                    <option value="" disabled selected>Select City</option>
                    <option value="Caloocan City">Caloocan City</option>
                    <option value="Las Pinas">Las Pinas</option>
                    <option value="Makati City">Makati City</option>
                    <option value="Malabon City">Malabon City</option>
                    <option value="Mandaluyong City">Mandaluyong City</option>
                    <option value="Manila">Manila</option>
                    <option value="Marikina City">Marikina City</option>
                    <option value="Muntinlupa City">Muntinlupa City</option>
                    <option value="Navotas City">Navotas City</option>
                    <option value="Paranaque City">Paranaque City</option>
                    <option value="Pasay City">Pasay City</option>
                    <option value="Pasig City">Pasig City</option>
                    <option value="Pateros City">Pateros City</option>
                    <option value="Quezon City">Quezon City</option>
                    <option value="San Juan City">San Juan City</option>
                    <option value="Taguig">Taguig</option>
                    <option value="Valenzuela">Valenzuela</option>
                  </select>
                  <label id="req4">ddddd</label><br>

                  <label class="p3">Email Address</label><br>
                  <input type="text" class="register-txtbox" id="email" placeholder="Enter Email Address"
                  oninput="validation('email')" maxlength="40" name="email">
                  <label id="req5">ddddd</label><br>

                  <label class="p3">Mobile Number</label><br>
                  <input type="text" class="register-txtbox" id="mobile_no" placeholder="Enter Mobile Number" 
                  onkeypress="return onlyNumberKey(event)" maxlength="12" oninput="validation('mobile')" name="mobile">
                  <label id="req6">ddddd</label><br>

                  <input type="text" id="randomid" style="display:none" name="key"></input>
                  <input type="text" id="account" style="display:none" name="account" value="Account"></input>
                  <input type="text" id="no" style="display:none" name="no"></input>

                  <input type="submit" class="register-btn" value="Register" id="register" name="register" disabled>
                  <datalist id="list">
                      <?php 
                        valid();
                      ?>   
                  </datalist>

                  <datalist id="list1">
                      <?php 
                        valid_email();
                      ?>   
                    </datalist>
                
                </form>
              </div>
            </div>
            <div class="col-xxl-6 col-lg-6">
              <a href="../index.php"><img src="../includes/images/icon/x.svg" class="exit_btn"></a>
              <div class="box2">
                <div class="text-pic">Lets Get Started</div>
                <div class="text-pic-1">Favorite brands and hottest trends.</div>
                <div class="pic-icon"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-2 col-xl-1"></div>
    </div>
  </div>
</div>
</body>
</html>

<script>
  <?php
    include"../js/register.js";
  ?>
</script>


