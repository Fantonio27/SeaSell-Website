<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_GET['id'] = 0;
    include"php/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
    <title>SeaSell - Pending List</title>
</head>
<style>
    <?php
        include"css/navbar&footer.css";
        include"css/style.css";
    ?>
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="container-box1">
                    <input id="sell" value="" hidden>
                    <img src="includes/images/header-background/undraw_to_do_re_jaef.svg">
                    <h1>PENDING LIST</h1>
                    <p>Thank you for choosing Seasell as your online shopping platform! 
                        Please wait till your item listed on Seasell. Our Seasell administrator 
                        is currently reviewing your listing; thank you very much.</p>
                    <a href="index.php"><div>Done</div></a>
                </img>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>
<script>
    <?php
        include"js/navbar.js";
    ?>
</script>