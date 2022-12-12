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
    <title>SeaSell - Error</title>
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
                <div class="container-box">
                    <input id="sell" value="" hidden>
                    <img src="includes/images/header-background/undraw_page_not_found_re_e9o6.svg">
                    <h1>PAGE NOT FOUND</h1>
                    <p>The page you are looking for was moved, removed, renamed, or might never existed.</p>
                </img>
            </div>
            <div class="col-2">
                <input type="submit" class="follow_btn" value="View Profile" id="view" name="view" hidden>
                <input type="submit" class="chat_btn" value="Chat" name="chat" id="chat1" hidden>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    <?php
        include"js/navbar.js";
    ?>
</script>