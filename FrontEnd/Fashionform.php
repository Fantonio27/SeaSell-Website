
<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_SESSION['seller_id'] = "";
    $_SESSION['name'] = "";
    $_SESSION['type'] = "";
    $_SESSION['condition'] ="";
    $_SESSION['price'] = "";
    $_SESSION['deal'] = "";
    $_SESSION['cat'] = "";
    $_GET['id'] = 0;
    include"php/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - Fashion for Sale</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php 
        include"css/fashionform.css";
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
                            Any types of Fashion in the Philippines
                            <div class="title">Explore More About Fashions</div>  
                            <p class="smtext">Everything fashionable
                                is available and glorified by the media and fashion business. 
                                It is also a cultural and societal phenomenon motivated by a
                                need for novelty.  The Seasell Fashion 
                                category allows customers to look at what outfit for the day or night 
                                they were looking for, and it will enable our sellers to earn extra 
                                money for the selling item.</p>
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
                                        <option value="Bottom">Bottom</option>
                                        <option value="Footwear">Footwear</option>
                                        <option value="Jacket, Coat and Outwear">Jacket, Coat and Outwear</option>
                                        <option value="Tops">Tops</option>
                                    </select>
                                    <input type="text" id="type_txt" hidden>
                                </div>
        
                                <div class="container-smbox">Condition<br>
                                    <select name="condition" id="condition" class="text-box cursor" style="padding-right: 30px;">
                                        <option value="">Any</option>
                                        <option value="Brand new">Brand new</option>
                                        <option value="Like new">Like new</option>
                                        <option value="Lightly used">Lightly used</option>
                                        <option value="Well used">Well used</option>
                                        <option value="Heavily used">Heavily used</option>
                                    </select>
                                    <input type="text" id="condition_txt" hidden>
                                </div>

                                <div class="container-smbox">Price<br>
                                    <select name="price" id="price" class="text-box cursor">
                                        <option value="">Any</option>
                                        <option value="1">For Sale</option>
                                        <option value="0">For Free</option>
                                    </select>
                                    <input type="text" id="price_txt" hidden>
                                </div>
        
                                <div class="container-smbox">Deal Option<br>
                                    <select name="deal" id="deal" class="text-box cursor">
                                        <option value=" ">Any</option>
                                        <option value="Meet-up">Meet-up</option>
                                        <option value=" Mailing & Delivery">Mailing & Delivery</option>
                                    </select>
                                    <input type="text" id="deal_txt" hidden>
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
                                            $_SESSION['cat'] = "Fashion";

                                            echo"<script>window.location.href='searchform.php'</script>";
                                        }
                                    ?>
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
                                displayfashion('1');
                            }else
                            if(isset($_POST['latest'])){
                                displayfashion('2');
                            }else
                            if (isset($_POST['High'])){
                                displayfashion('3');
                            }else
                            if(isset($_POST['Low'])){
                                displayfashion('4');
                            }

                            else{
                                displayfashion('1');
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