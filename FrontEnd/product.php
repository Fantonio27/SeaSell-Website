<?php
    session_start();
    include"php/navbar.php";
    $_SESSION['seller_id'] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - <?php echo $product_name?></title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php 
      include"css/navbar&footer.css";
      include"css/product.css";  
    ?> 
</style>
<body onload="changeprod()">
  <form action="<?php $_PHP_SELF?>" method="POST">
    <div class="container-fluid">
      <input type="text" id="id" value="<?php echo $prod_no?>" name="id" hidden>
      <input type="text" id="cat" value="<?php echo $cat?>" hidden>
      <p id="count" hidden><?=$indexcount?></p>
      <div class="row c2"></div>
      <div class="row">
          <div class="col-xxl-2 col-xl-1"></div>
          <div class="col-xxl-8 col-xl-10" >
            <div class="container-box">
              <div class="row">
                <div class="col-xxl-6 col-xl-6 col-md-6">
                  <div class="container-image">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="false" data-bs-interval="false" data-pause="hover">
                    <div class="carousel-inner">
                      <div class='carousel-item active'>
                          <img src='includes/images/client-product/<?=$img_name?>' class='image'>
                      </div>
                      <?php 
                        include"includes/functions/action.php";
                        addimages($cat);
                        countimg();
                      ?>
                    </div>
                    <button id = "1btn" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button id = "2btn" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  </div>
                </div>
              
                <div class="col-xxl-6 col-xl-6 col-md-6">
                  <div class="container-txt">
                    <div class="smtitle"><?=$cat?> > <?= $product_type?></div>
                    <div class="title"><?= $product_name?>
                      <p class="txt-price">Php <?=$product_prc?></p>

                      <!--Type-->
                      <div class="txt-con">Type
                        <p class="txt-con1"><?= $product_type?></p>
                      </div>

                      <!--Posted date-->
                      <div class="txt-con">Posted
                        <p class="txt-con1"><?=$DATE?></p>
                      </div>
                      
                      <!--Condition-->
                      <div class="txt-con">Condition 
                        <p class="txt-con1"><?= $product_con?></p>
                      </div>

                      <!--Deal Method-->
                      <div class="txt-con">Deal Method
                        <p class="txt-con1" id="deal"><?= $product_deal?></p>
                      </div>

                      <!--product_gender-->
                      <div class="txt-con" id="gender">Gender
                        <p class="txt-con1"><?= $product_gender?></p>
                      </div>

                      <!--size-->
                      <div class="txt-con" id="size">Size
                        <p class="txt-con1" ><?= $product_size?></p>
                      </div>

                      <!--Address-->
                      <div class="txt-con" id="mail">Mailing<br>
                        <p class="txt-con1"><?= $product_mail?></p>
                      </div>  
                      
                      <!--Meet up-->
                      <div class="txt-con"  id="meet">Meet-up
                        <p class="txt-con1"><?= $product_meet?></p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-xxl-2 col-xxl-1"></div>
      </div>

      <div class="row c3"></div>

      <div class="row">
        <div class="col-xxl-2 col-xl-1"></div>
        <div class="col-xxl-3 col-xl-4 col-md-5">
          <div class="container-box-1">
            <div class="text-box">
              <p id="text1" onclick="page_next('0')">Description</p>
            </div>
            <div class="text-box">
              <p id="text2" onclick="page_next('1')">Seller Info</p>
            </div>

            <div class="display-box">
                <div class="description-box" id="box1">
                <textarea style="height: 100px;" name="desc" class="text-area" placeholder="No desription" disabled><?php echo $product_desc?></textarea>
                </div>
                <div class="Seller-box" id="box2">
                    <div class="user-icon">
                      <img src="includes/images/Profile-pic/<?=$seller_pic?>" class="user-icon" >
                    </div>
                    <div class="info-name"><?=$seller_fname .' '. $seller_lname?>
                        <p class="info-username">@<?=$seller_user?></p>
                        <input type="text" id="sell" value="<?=$seller_id?>" hidden>

                        <svg viewBox="0 0 1000 200" class='rating'>
                          <defs> 
                            <polygon id="star" points="100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 "/>
                            
                            <clipPath id="stars">
                              <use xlink:href="#star"/>
                              <use xlink:href="#star" x="21%"/>
                              <use xlink:href="#star" x="41%"/>
                              <use xlink:href="#star" x="61%"/>
                              <use xlink:href="#star" x="81%"/>
                            </clipPath>  

                          </defs>
                          <rect class='rating__background' clip-path="url(#stars)"></rect>
                          <!--width yung pang adjust ng rating-->
                          <rect width="<?=$rate_perc?>%" class='rating__value' clip-path="url(#stars)"></rect>
                        </svg><br>

                        <p class="review-text"><?=$rate_round_txt?></p>
                        <input type="text" value="<?=$seller_id?>" name="seller_id" hidden>
                        <input type="submit" class="follow_btn" value="View Profile" id="view" name="view">
                        <input type="submit" class="chat_btn" value="Chat" name="chat" id="chat1">
                      
                        <?php
                          seller_id();
                        ?>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-xxl-5 col-xl-6 col-md-7">
          <div class="container-review">
              <div class="title-review">Reviews for @<?=$seller_user?></div>
              <div class="container-review-box">
                <?php
                  display_review($prod_no,'1',$seller_user); 
                ?>
              </div>
          </div>   
        </div>
        
        <div class="col-xxl-2 col-xl-1"></div>
      </div>

      <div class="row c7"></div>  
      
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
        include"js/product.js";
        include"js/navbar.js";
    ?>
</script>