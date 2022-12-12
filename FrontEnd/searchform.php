<?php
    session_start();
    $session_id = $_SESSION['id'];
    $_SESSION['seller_id'] = "";
    $_GET['id'] = 0;

    include"includes/functions/display_search.php";
    include"includes/functions/action.php";
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
                        <input id="sell" value="" hidden>

                        <input type="text" class="form-control" placeholder="Search for an item" name="product_name" id="name" 
                        oninput = "value_select()" >
                        <input type="text" class= "cl"  id = "cat_txt" name="prod_name" hidden>
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
                                    <option value="" selected>Type</option>
                                </select>
                                <input type="text"  class= "cl" id = "type_txt" name="type_txt" hidden>
                            </div>

                            <div>
                                <select  name="condition" id="condition" class="form-select neg" onchange="value_select()">
                                    <option value= "" selected >Condition</option>
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
                                    <option  value= "" selected>Price</option>
                                    <option  value= "1">For Sale</option>
                                    <option  value= "0">For Free</option>
                                </select>
                                <input type="text"  class= "cl" id = "price_txt" name="price_txt" hidden>
                            </div>

                            <div>
                                <select  name="deal" name="type"id="deal" class="form-select neg" onchange="value_select()">
                                    <option value= ""selected>Deal Option</option>
                                    <option value= "Meet-up">Meet-up</option>
                                    <option value= " Mailing & Delivery">Mailing & Delivery</option>
                                </select>
                                <input type="text"  class= "cl" id = "deal_txt" name="deal_txt" hidden>
                            </div>

                            <div onclick="backtozero()"><p class="buttn Clear">Clear</p></div>

                            <div><input type="submit" class="buttn apply" value="Search" name="Search"></div>
                            
                        </div>

                        <div class="container_product_box">
                            <div class="product_box">
                                <?php
                                    if(isset($_POST['Search'])){

                                        $_SESSION['cat'] = $_POST['cat'];
                                        $_SESSION['name'] = $_POST['product_name'];
                                        $_SESSION['type'] = $_POST['type_txt'];
                                        $_SESSION['condition'] = $_POST['condition'];
                                        $_SESSION['price'] = $_POST['price'];
                                        $_SESSION['deal'] = $_POST['deal'];
                                    }
                                    
                                    display();
                                
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
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
        include"js/search.js";
        include"js/navbar.js";
    ?>
</script>