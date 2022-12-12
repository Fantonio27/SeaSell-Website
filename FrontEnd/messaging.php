<?php
session_start();
$session_id = $_SESSION['id'];


  include "includes/functions/fetch.php";
  //userprofile($session_id);
  

?>

<!DOCTYPE html>

<head>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar&footer.css">
    <link rel="stylesheet" href="css/messaging.css">


    <script type="text/javascript" src="js/js.cookie.js" defer></script>
    <script type="text/javascript" src="js/jquery-3.6.1.js" defer></script>
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js" defer></script>
    <script type="text/javascript" src="js/index.js" defer></script>
    <script type="text/javascript" src="js/navbar.js" defer></script>
    <script type="text/javascript" defer>
        var sessid = <?php echo "'" . $session_id . "'"?>
    </script>
    <script type="text/javascript" src="js/messaging.js" defer></script> <!-- IMPORTANT -->
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

    <div id="messenger-body">
        <div id="messenger-sidebar">
            <div id="messenger-sidebar-header">Messages</div>
            <div id="messenger-sidebar-inbox">
                <div class="inbox_item" id="active_inbox">
                    <picture>
                        <source>
                        <img src="profilepic.jpg" alt="profilepic">
                    </picture>
                    <div>
                        <h3>Item Name</h1>
                        <h5>From User</h5>
                        <h6>Last Message</h6>
                        <h6>Last Date</h6>
                    </div>
                </div>
                <div class="inbox_item">
                    <picture>
                        <source>
                        <img src="profilepic.jpg" alt="profilepic">
                    </picture>
                    <div>
                        <h3>Item Name</h1>
                        <h5>For User</h5>
                        <h6>Last Message</h6>
                        <h6>Last Date</h6>
                    </div>
                </div>
            </div>
        </div>
        <div id="messenger-main">
            <div id="messenger-offer-block">
                <picture id="messenger-item-preview">
                    <source>
                    <img src="fallback.jpg" alt="No Product Yet">
                </picture>
                <div id="messenger-item-summary">
                    <h4>Item Name</h4>
                    <h5>Original Price</h5>
                </div>
                <div id="messenger-offer-controls">
                    <button id="doOffer">Create Counter/Offer</button>
                    <button id="noOffer">Cancel/Decline Offer</button>
                    <button id="okOffer">Lock-in Offer</button>
                </div>
            </div>
            <div id="messenger-history">

            </div>
            <div id="messenger-input">
                <input id="message-input-txtbox" disabled>
                <button id="message-input-subbtn" disabled></button>
            </div>
        </div>
    </div>


</body>