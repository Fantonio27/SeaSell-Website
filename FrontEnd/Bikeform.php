
<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_SESSION['seller_id'] = "";
    $_GET['id'] = 0;
    include"php/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - Bike for Sale</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php 
        include"css/Bikeform.css";
        include"css/navbar&footer.css";
    ?> 
</style>
<body>
    <div class="container-fluid">
        <form action="<?php $_PHP_SELF?>" method="POST">
            <input id="sell" value="" hidden>
            <div class="row c2"></div>
            <div class="row">
                <div class="col-xxl-1"></div>
                <div class="col-xxl-10">
                    <div class="container-header">
                        <div class="container-box">
                            Bike for Sale in the Philippines
                            <div class="title">Explore More About Bikes</div>  
                            <p class="smtext">Bicycles have grown in importance in 
                                recent years. They are necessary now, although they 
                                have long given us several benefits. Because of the 
                                rapid growth of pollution around the world, they provide 
                                a cleaner mode of transportation. Seasell provides consumers with a wide range 
                                of bicycle components, gears, and accessories. With the 
                                support of vendors selling a variety of bike-related things.</p>
                        </div>

                        <div class="container-sort">
                            <div class="title2">Search Filter
                                <hr>
                            </div> 
                            <div class="container-box1">
                                <div class="container-smbox">Search<br>
                                    <input type="text" class="text-box" placeholder="Search" name="name_txt">
                                    <input type="text" id="name_txt" hidden>
                                </div>
        
                                <div class="container-smbox">Type<br>
                                    <select name="type" id="type" class="text-box cursor">
                                        <option value="">Any</option>
                                        <option value="">Mountain Bike</option>
                                        <option value="">Road Bikes</option>
                                        <option value="">Foldable Bikes</option>
                                        <option value="">E-Bikes</option>
                                        <option value="">Parts & Accessories</option>
                                        <option value="">Children Bikes</option>
                                        <option value="">Other Bicycles</option>
                                    </select>
                                </div>
        
                                <div class="container-smbox">Condition<br>
                                    <select name="condition" id="condition" class="text-box cursor" style="padding-right: 30px;">
                                        <option value="">Any</option>
                                        <option value="">Brand new</option>
                                        <option value="">Like new</option>
                                        <option value="">Lightly used</option>
                                        <option value="">Well used</option>
                                        <option value="">Heavily used</option>
                                    </select>
                                </div>
                            

                                <div class="container-smbox">Price<br>
                                    <select name="price" id="price" class="text-box cursor">
                                        <option value="">Any</option>
                                        <option value="">For Sale</option>
                                        <option value="">For Free</option>
                                    </select>
                                </div>
        
                                <div class="container-smbox">Deal Option<br>
                                    <select name="deal" id="deal" class="text-box cursor">
                                        <option value="">Any</option>
                                        <option value="">Meet-up</option>
                                        <option value="">Mailing & Delivery</option>
                                    </select>
                                </div>

                                <div class="container-smbox"> <br>
                                    <input class="search-box" type="submit" value="Search" name="search">
                                    <?php
                                        if(isset($_POST['search'])){
                                            $_SESSION['name'] = $_POST['name_txt'];
                                            $_SESSION['type'] =$_POST['type'];
                                            $_SESSION['condition'] =$_POST['condition'];
                                            $_SESSION['price'] = $_POST['price'];
                                            $_SESSION['deal'] = $_POST['deal'];
                                            $_SESSION['cat'] = "Bike";

                                            echo"<script>window.location.href='searchform.php'</script>";
                                        }
                                    ?>
                                    </button>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-1"></div>
            </div>

            <div class="row c7"></div>

            <div class="row">
                <div class="col-xxl-2"></div>
                <div class="col-xxl-8">
                    <div class="container-body">
                        <div class="sort-box">
                            <input type="submit" class="sort" id="a3" onclick="textchange('a3')" value="Relevant" name="relevant">
                            <input type="submit" class="sort" id="b" onclick="textchange('b')" value="Latest" name="latest">
                            <input type="submit" class="sort" id="c" onclick="textchange('c')" value="High to Low" name="High">
                            <input type="submit" class="sort" id="d" onclick="textchange('d')" value="Low to High" name="Low">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2"></div>
            </div>

            <div class="row">
                <div class="col-xxl-1"></div>
                <div class="col-xxl-10">
                    <div class="container-productbox">
                        <?php
                            include"includes/functions/action.php";
                            
                            if(isset($_POST['relevant'])){
                                displaybike('1');
                            }else
                            if(isset($_POST['latest'])){
                                displaybike('2');
                            }else
                            if (isset($_POST['High'])){
                                displaybike('3');
                            }else
                            if(isset($_POST['Low'])){
                                displaybike('4');
                            }

                            else{
                                displaybike('1');
                            }

                        ?>
                    </div>
                </div>
                <div class="col-xxl-1"></div>
            </div>

            <div class="row c3"></div>

            <div class="row">
                <?php
                    include"php/footer.php";
                ?>
            </div> 
        </form>
    </div>
</body>
</html>

<script>
    <?php
        include"js/bikeform.js";
        include"js/navbar.js";
    ?>
</script>