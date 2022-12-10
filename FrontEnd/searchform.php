<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_SESSION['seller_id'] = "";
    $_GET['id'] = 0;
    //$search = $_SESSION['search_txt'];

    $cat = $_SESSION['cat'];
    $name = $_SESSION['name'];
    $type = $_SESSION['type'];
    $condition = $_SESSION['condition'];
    $price = $_SESSION['price'];
    $deal = $_SESSION['deal'];

    /*echo $name = "SLX - Rear Derailleur - SHIMANO SHADOW RD+ - 1x12";
    echo $type;
    echo $deal;
    echo $condition;
    echo $price;
    echo $cat;*/
    include"php/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - Search Form</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php     
        include"css/navbar&footer.css";
        include"css/searchform.css";
    ?> 
</style>
<body onload="load()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="container-box">
                    <form action="<?php $_PHP_SELF?>" method="POST">
                        <!--Holder-->

                        <input type="text" name= "forname" id="forname" value="<?=$name?>" >
                        <input type="text" id="fortype" value="<?=$type?>" >
                        <input type="text" id="forcondition" value="<?=$condition?>" >
                        <input type="text" id="forprice" value="<?=$price?>" >
                        <input type="text" id="fordeal"value="<?=$deal?>" >
                        <input type="text" id="forcat"value="<?=$cat?>" >

                        <input type="text" class="form-control" placeholder="Search for an item" name="product_name" id="name" value="<?=$name?>"
                        oninput = "value_select()" >
                        <input type="text" class= "cl" id = "cat_txt" name="prod_name" hidden>
                        <div class="filter-box">
                            <div style="width:170px">
                                <select name="cat" id="cat" class="form-select neg" onchange="change_value()">
                                    <option value= "Category" selected >Category</option>
                                    <option value= "Bike">Bike</option>
                                    <option value= "Fashion">Fashion</option>
                                </select>
                            </div>

                            <div>
                                <select name="type" id="type" class="form-select neg" onchange="value_select()">
                                    <option value=" " selected>Type</option>
                                </select>
                                <input type="text"  class= "cl" id = "type_txt" name="type_txt" hidden>
                            </div>

                            <div>
                                <select  name="condition" id="condition" class="form-select neg" onchange="value_select()">
                                    <option value= " " selected >Condition</option>
                                    <option value="Brand new">Brand new</option>
                                    <option value="Like new">Like new</option>
                                    <option value="Lightly used">Lightly used</option>
                                    <option value="Well used">Well used</option>
                                    <option value="Heavily used">Heavily used</option>
                                </select>
                                <input type="text"  class= "cl" id = "condition_txt" name="condition_txt"hidden> 
                            </div>

                            <div>
                                <select name="price" id="price" class="form-select neg" onchange="value_select()">
                                    <option  value= " " selected>Price</option>
                                    <option  value= "1">For Sale</option>
                                    <option  value= "0">For Free</option>
                                </select>
                                <input type="text"  class= "cl" id = "price_txt" name="price_txt" hidden>
                            </div>

                            <div>
                                <select  name="deal" name="type"id="deal" class="form-select neg" onchange="value_select()">
                                    <option value= " "selected>Deal Option</option>
                                    <option value= "Meet-up">Meet-up</option>
                                    <option value= " Mailing & Delivery">Mailing & Delivery</option>
                                </select>
                                <input type="text"  class= "cl" id = "deal_txt" name="deal_txt" hidden>
                            </div>

                            <div onclick="backtozero()"><p class="buttn Clear">Clear</p></div>

                            <div><input type="submit" class="buttn apply" value="Search" name="Search"></div>
                            
                        </div>

                        <div class="product_box">
                        <?php
                            include"includes/functions/action.php";

                            if(isset($_POST['Search'])){
                                $sql = $_POST['type_txt'] . " AND " .$_POST['condition_txt'] . " AND " . $_POST['prod_name']. " AND " . 
                                $_POST['price_txt']. " AND " . $_POST['deal_txt'];

                                if($_POST['cat'] == "Bike"){
    
                                    filter_product($sql, '1');

                                }else if($_POST['cat'] == "Fashion"){
    
                                    filter_product($sql, '2');

                                }else if($_POST['cat'] == "Category"){

                                    filter_product($sql, '3');
                                }
                                /*$_SESSION['cat'] = "Bike";
                                $_SESSION['type'] = $_POST['type'];
                                $_SESSION['condition'] = $_POST['condition'];
                                $_SESSION['prod_name'] = $_POST['product_name'];
                                $_SESSION['price'] = $_POST['price'];
                                $_SESSION['deal'] = $_POST['deal'];*/

                            }
                            //echo"<script>window.location.href='searchform.php'</script>";

                            //filter_product($sql, '3');

                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>

<script>
    <?php
        include"js/search.js";
        include"js/navbar.js";
    ?>
</script>