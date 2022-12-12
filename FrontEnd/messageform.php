<?php
    session_start();
    $session_id = $_SESSION['id'];
    $seller = $_SESSION['seller_id'];
    $prod= $_SESSION['prodno'];
    $_GET['id'] = 0;
    $prodnum = "";
    include"php/navbar.php";
    include"includes/functions/action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - Message</title>
    
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php
        include"css/navbar&footer.css";
        include"css/messageform.css";  
    ?>
</style>
<body >
    <div class="container-fluid">
        <form action="<?php $_PHP_SELF?>" method="POST">
            <input id="sell" value="" hidden>
            <input type="text" value="<?= $session_id?>" name="buyer" > <!--USER/BUYER/SELLER-->
            <input type="text" value="<?=$seller?>" name="seller" ><!--EXAMPLE SELLER ID-->
            <input type="text" value="<?=$prod?>" name="prod" ><!--EXAMPLE PROD_ID-->

            <input type="text" name="time" id="time" hidden>
            <input type="text" name="date" id="date" hidden>

            <button type="button" class=" res_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                Leave a Review
            </button>
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">How was your experience?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Rate the Seller</p>

                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5"/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" required/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div><br><br>

                                    <p>Write a review</p>
                                    <textarea style="height:100px; font-size:14px;margin-top:10px" placeholder="Share more about the purchase and your intentions with this seller" 
                                    id="text" class="form-control" oninput="number_input()" name="review" required></textarea>
                                    <p class="number" id="number">0/200</p>
                                    <script>
                                        <?php
                                            include"js/message.js";
                                        ?>
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit"  class="btn btn_review" value="Submit Review" name="submit">
                                    <?php
                                        review();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="container-box">
                        <div class="row padd">
                            <div class="col-xxl-4">
                                <div class="inbox-box">
                                    <input type = "text" class="form-control search" placeholder="Search">
                                    <input type = "submit" class="form-control search_btn" value="Search">
                                    <p class="title">Inbox</p>
                                    <div class="user-box">
                                        <?php
                                            //displayinbox($session_id);
                                        ?>                             
                                        <?php
                                            /*
                                            include "includes/functions/connection.php";
                                            
                                            if(isset($_POST['enter'])){
                                                $prodnum = $_POST['prodnum'];
                                                $username = "vsdvsdv";
                                                //echo $prodnum;
                                                $sql = "SELECT * FROM inbox WHERE PROD_ID = '$prodnum'";
                                                $result = mysqli_query($conn,$sql);
                                                while($row = $result->fetch_assoc()) {
                                                    $MESSAGE_ID = $row['MESSAGE_ID'];
                                                    $SELLER_ID = $row['SELLER_ID'];
                                                    $BUYER_ID = $row['BUYER_ID'];
                                                    $PROD_ID = $row['PROD_ID'];
                                                }
                                        
                                                $sql = "SELECT * FROM user WHERE  SESSION_KEY = '$SELLER_ID'";
                                                $result = mysqli_query($conn,$sql);
                                                while($row = $result->fetch_assoc()) {
                                                    $username = $row['USERNAME'];
                                                    $profile = $row['PROFILE_PIC'];
                                                }
                                            }*/
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-8">
                                <div class="message-box">
                                    <div class="user-profile-inbox">
                                        <?php
                                            //display_in_message($prodnum, '1', $session_id);
                                        ?>
                                    </div>
                                    <div class="prod-box">
                                        <?php
                                            //display_in_message($prodnum, '2', $session_id);
                                        ?>
                                    </div>
                                    <div class="messages-box">
                                        <?php
                                            //display_message($prod);
                                        ?>
                                    </div>
                                    <div class="input-message">
                                        <input type="text" class="form-control input" placeholder="Type here" name="message" oninput="gettime()">
                                        <input type="submit" value="Send" class="form-control send" name="send">
                                        <?php
                                            //message();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </form>
    </div>
</body>
</html>

<script>
    <?php
        include"js/message.js";
        include"js/navbar.js";
        
    ?>
</script>