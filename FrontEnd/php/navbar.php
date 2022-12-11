
<?php
  include"includes/functions/fetch.php";
  //userprofile($session_id);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="../includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../includes/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/index.css">-->
</head>
<body>
    <form action="<?php $_PHP_SELF?>" method="POST">
    <input type="text" value="<?php echo $id?>" id="id" hidden>
      <div class="container-fluid">
        <div class="row s">
          <div class="col-xxl-1"></div>
          <div class="col-xxl-10 col-lg-12">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <div>
                  <img src="includes/images/Logo/logo3wcolor1.png" class="logo">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 center-div">
                    <li class="nav-item ">
                      <a class="nav-link hover" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link hover" href="Bikeform.php">Bike</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link hover" href="Fashionform.php">Fashion</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link remove hover" href="Errorpage.php">All Categories</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav">
                    <li class="nav-item rem" id = "1" style="display:none">
                      <img src="includes/images/Profile-pic/<?php echo $profile_pic?>"class="user-profile">
                    </li>
                    <li class="nav-item"  id = "2" style="display:none">
                      <input class="nav-link account" type="submit" value="<?php echo $firstname?>" name="user_enter">
                      <?php
                      if(isset($_POST['user_enter'])){
                        $_SESSION['seller_id'] = "";
                        echo"<script>window.location.href='userform.php'</script>";
                      }
                      ?>
                    </li>
                    <li class="nav-item"  id = "3" >
                      <a class="nav-link hover" href="php/register.php">Register</a>
                    </li>
                    <li class="nav-item"  id = "4">
                      <a class="nav-link hover" href="php/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a onclick="haha()" id="a" class="nav-link sell-btn" href="listing.php">Sell</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-xxl-1"></div>
        </div>
      </div>  
    </form>
</body>
</html>

<script>
  <?php
    //include"../js/navbar.js";
  ?>
</script>