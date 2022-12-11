<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seasell - Admin Login</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
    <!--font links-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    <?php 
        include"css/adminlogin.css";
    ?> 
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-4"></div>
            <div class="col-xxl-4">
                <div class="box" id="box">
                <img src="includes/images/logo/logo-color.png" class="logo">
                <div class="title">Admin Login</div>
                <form>
                    <input type="text" class="usertxt" placeholder="Username" id="username" required>
                    <input type="password" class="passtxt" placeholder="Password" id="password" required>
                    <div class="login-btn" id="login" onclick="enter_admin()" style="cursor:pointer; margin-left:25px">LOGIN</div><br>
                    <a href="index.php" class="p2">BACK</a>
                </form>
                </div>
            </div>
            <div class="col-xxl-4 "></div>
        </div>
    </div>
</body>
</html>

<script>
    function enter_admin(){
        var usertxt = document.getElementById("username");
        var passtxt = document.getElementById("password");

        if (usertxt.value == "Admin01" && passtxt.value == "password"){
            window.location.href="admin/index.php";
        }else{
            alert("Wrong username or password");
        }
    }
</script>