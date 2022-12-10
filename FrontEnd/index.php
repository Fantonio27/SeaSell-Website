<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_SESSION['seller_id'] = "";
    $_GET['id'] = 0;

    include"php/navbar.php";
    include"includes/functions/action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php 
        include"css/index.css";
        include"css/navbar&footer.css";
    ?> 
</style>
<body>
    <form action="<?php $_PHP_SELF?>" method="POST">
        <div class="container-fluid">
            <!--For Header-->
            <input type="text" id="id" value="<?php echo $session_id?>" name="id" style="display:none">
            <div class="row"> 
                <div class="col-xxl-1"></div>
                <div class="col-xxl-10">
                    <div class="header">
                        <div class="row">
                            <div class="col-xxl-6">
                                <div class="header-box">
                                    <h1 class="text-header-1">An exciting place for the whole family to shop.</h1>
                                    <p class="text-header-2">Find what you’re looking for and more at our shop! Shop with us for all your needs </p>
                                    <input type="text" class="search-text" placeholder="Search for an Item" name="search_txt">
                                    <input type="submit" name="search" class="search-btn" value="Search">
                                    <?php
                                        if(isset($_POST['search'])){
                                            $_SESSION['search_txt'] = $_POST['search_txt'];
                                            echo"<script>window.location.href='searchform.php'</script>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="header-img"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-1"></div>
            </div>

            <!--For Body-->
            <div class="row">
                <div class="col-xxl-1"></div>
                <div class="col-xxl-10">
                    <div class="container-body-box">
                        <h3 class="body-text1">What would you like to find?</h3>
                        <div class="box-category">
                            <div class="box-cat-1" onclick="nextpage('Bikeform.php')">
                                <img src="includes/images/icon/bicycle.png" class="icon-cat">
                                <p class="text-cal">Bike</p>
                            </div>
                            <div class="box-cat-1" onclick="nextpage('Bikeform.php')">
                                <img src="includes/images/icon/car.png" class="icon-cat">
                                <p class="text-cal">Fashion</p>
                            </div>
                            <div class="box-cat-1" onclick="nextpage('Errorpage.php')">
                                <img src="includes/images/icon/home.png" class="icon-cat">
                                <p class="text-cal">Property</p>
                            </div>
                            <div class="box-cat-1" onclick="nextpage('Errorpage.php')">
                                <img src="includes/images/icon/shirt.png" class="icon-cat">
                                <p class="text-cal">Fashion</p>
                            </div>
                            <div class="box-cat-1" onclick="nextpage('Errorpage.php')">
                                <img src="includes/images/icon/smartphones.png" class="icon-cat">
                                <p class="text-cal">Cellphone</p>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-xxl-1"></div>
            </div>

            <div class="row">
                <div class="col-xxl-1"></div>
                <div class="col-xxl-10">
                    <div class="container-body-box">
                        <h3 class="body-text1">Recommended for you</h3>
                        <div class="sort-box">
                            <input type="submit" class="sort-item" name="relevant" value="Relevant">
                            <input type="submit" class="sort-item" name="latest" value="Latest">
                            <input type="submit" class="sort-item" name="High" value="Price High">
                            <input type="submit" class="sort-item" name="Low" value="Price Low">
                        </div>
                        <div class="box-category">
                            <?php
                                
                                if(isset($_POST['relevant'])){
                                    displayproduct('1');
                                }else
                                if(isset($_POST['latest'])){
                                    displayproduct('2');
                                }else
                                if (isset($_POST['High'])){
                                    displayproduct('3');
                                }else
                                if(isset($_POST['Low'])){
                                    displayproduct('4');
                                }
    
                                else{
                                    displayproduct('1');
                                }
                            ?>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="row">
                <?php
                    include"php/footer.php";
                ?>
            </div> 
        </div>
    </form>
</body>
</html>

<script>
    <?php
        include"js/index.js";
        include"js/navbar.js";
    ?>
</script>



