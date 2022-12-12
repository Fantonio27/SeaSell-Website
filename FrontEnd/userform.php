<?php
    session_start();
    //$session_id = $_SESSION['id'];
    $sell_id = $_SESSION['seller_id'];
    $_GET['id'] = 0;

    include"includes/functions/action.php";
    include"php/navbar.php";

    if($sell_id == ""){
      $session_id = $_SESSION['id'];
    }else{
      $session_id = $_SESSION['seller_id'];
    }
    include"includes/functions/userprofile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - <?php echo $username_u?> items for sale on SeaSell</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
  <?php     
        include"css/navbar&footer.css";
        include"css/userform.css";
    ?> 
</style>
<body onload="onload_func()">
  <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data" >
    <input type="text" id="user_id" value="<?=$key?>" name="id" hidden>
    <input type="text" value="<?=$sell_id?>" id="seller" hidden>

    <input id="sell" value="" hidden>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-2"></div>
            <div class="col-xxl-2">
              <div class="container-smbox">
                <img src="includes/images/Profile-pic/<?php echo $profile_pic_u?>" class="user-icon">
                <p class="user-txt"><?php echo $firstname_u ." ".$lastname_u?></p>
                <p class="username-txt">@<?php echo $username_u?></p>
                <hr>
                <p class="sm-txt">RATING (<?=$rate_u?>)</p>
      
                <svg viewBox="0 0 1000 200" class='rating right'>
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
                </svg>
                <br>
                <p class="sm-txt">ADDRESS</p>
                <p class="sm-txt1"><?php echo $city_u?></p>
                <p class="sm-txt">Bio</p>
                <p class="sm-txt1"><?php echo $bio_u?></p>
              </div>
            </div>

            <div class="col-xxl-6">
                <div class="container-box">
                  <div class="category-box">
                    <p class="cat-1-txt" id="a1" onclick="nexttab('tab1','a1')" style="color:#008fee;">Listings</p>
                    <p class="cat-1-txt" id="a2" onclick="nexttab('tab2','a2')">Reviews</p>
                    <input class="cat-3-txt" name="log_out" type="submit" value="Log out" id="logout">
                    <p class="cat-1-txt" id="a3" onclick="nexttab('tab3','a3')">Profile</p>
                    <p class="cat-1-txt" id="a4" onclick="nexttab('tab4','a4')" style="float:none">Change Password</p>
                  </div>

                  <!--tab1 listing-->
                  <div class="listing tab" id="tab1">
                      <p class="title-txt-listing" id="i">Listings</p>
                      <div class="container-productbox">
                        <?php
                            include "includes/functions/connection.php";

                            if($sell_id == ""){
                              $bike = "AND (bike_product.STATUS = 'LISTED' OR bike_product.STATUS = 'RESERVED') ";
                              $fashion = "AND (fashion_product.STATUS = 'LISTED' OR fashion_product.STATUS = 'RESERVED') ";
                            }
                            else if($sell_id != $key || $key == ""){
                              $bike = "AND bike_product.STATUS = 'LISTED' ";
                              $fashion = "AND fashion_product.STATUS = 'LISTED' ";
                            }else{
                              $bike = "";
                              $fashion = "";
                            }

                            $sql = " (SELECT 
                            PRODUCT_NAME, PRODUCT_PRICE, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.PROD_ID, bike_product.STATUS
                            FROM bike_product
                            JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
                            JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
                            WHERE bike_product.SELLER_ID = '$session_id' AND product_img.IMG_INDEX = 0 ". $bike ."
                            )
                            UNION
                            (
                            SELECT 
                                PRODUCT_NAME, PRODUCT_PRICE,fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.PROD_ID, fashion_product.STATUS
                            FROM fashion_product
                            JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
                            JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
                            WHERE fashion_product.SELLER_ID = '$session_id' AND fashion_imgs.IMG_INDEX = 0 " . $fashion ."
                            );";
                          
                            $result = mysqli_query($conn,$sql);

                            $i = 0;

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $prod_img = $row["IMG_NAME"];
                                    $prod_name = $row["PRODUCT_NAME"];
                                    $prod_prc = $row["PRODUCT_PRICE"];
                                    $prod_id= $row["PROD_ID"];
                                    $product_status = $row['STATUS'];
                                    $i++;

                                    echo"<div class='product-box'>
                                          <div>
                                            <img src='includes/images/client-product/$prod_img' class='product-img'>
                                            <div class='status_box'>$product_status</div>
                                          </div>
                                          <p class='product-name-txt'>$prod_name</p> 
                                          <p class='product-price-txt'>Php $prod_prc</p>
                                          <a href=product.php?id=$prod_id><div class='edit_btn_product'>View</div></a>
                                          <a id='edit' href=Editlisting.php?id=$prod_id><div class='edit_btn_product ed'>Edit</div></a>
                                        </div>";
                                }
                            }else{
                              echo" <div class='message'>
                                      <img src='includes/images/header-background/undraw_empty_cart_co35.svg' class='img_message'>
                                      <p class='message_txt'>@$username_u doesn't have any listings yet</p>
                                    </div>";
                            }  
                        ?>
                        <input type="text" value="<?php echo $i?>" id="countlist" class="dis">
                      </div>
                  </div>

                  <!--tab2 Review-->
                  <div class="review tab"  id="tab2" style="display:none">
                    <div class="title-review" style="font-weight:300">Reviews for @<?=$username_u?></div>
                    <div class="container-review">
                      <?php
                        if($sell_id == ""){
                          display_review($key,'2',$username_u);
                        }else{
                          display_review($sell_id,'2',$username_u);
                        }
                        
                      ?>  
                    </div>
                  </div>

                  <!--tab3 Profile-->
                  <div class="userprofile tab"  id="tab3" style="display:none">
                    <p class="edit_btn" id="edit" onclick="en()">Edit profile</p>
                    <input type="checkbox" id="edit_check" class="dis" checked>
                    <p class="title-txt-userinfo">Account</p>

                    <div class="smtitle-txt-profile" id="en1" style="display:none">Profile Photo<br>
                      <img src="includes/images/Profile-pic/<?php echo $profile_pic_u?>" class="user-pic-profile">
                      <div>Clear frontal face photos are an important way for buyers and sellers to learn about each other.<br>
                        <input type="file" value="Upload a photo" name='file[]' id='file' class="input">   
                        <input type="text" name="profile_up" id="profile-txt" value="<?php echo $profile_pic_u?>" hidden>                
                      </div>
                    </div><br>

                    <div class="smtitle-txt-userinfo">Public profile

                      <p style="margin-top:10px">Username<span class="rq"> *</span></p>
                      <input type="text" class="en" value = "<?php echo $username1_u?>" name="username_up" id="user1" 
                      oninput="validation1('1')"  onkeypress="return handleEnter(this, event)" disabled>
                      <p id="v1">Validation</p>

                      <p>First name</p>
                      <input type="text" class="en" value = "<?php echo $firstname_u?>" name="firstname_up" id="fname"
                      onkeypress="return handleEnter(this, event)" oninput="validation1('2')" placeholder="Enter your Firstname" disabled>
                      <p id="v2">Validation</p>

                      <p>Last name</p>
                      <input type="text" class="en" value = "<?php echo $lastname_u?>" name="lastname_up" id="lname"
                      onkeypress="return handleEnter(this, event)" oninput="validation1('3')" placeholder="Enter your Lastname" disabled> 
                      <p id="v3">Validation</p>

                      <p>Bio</p>
                      <textarea id="bio" class="en txtarea"  name = "bio_up"
                        placeholder="Tell us about yourself" oninput="validation1('4')" maxlength="255";
                        onkeypress="return handleEnter(this, event)" disabled><?php echo $bio_u?></textarea><br>
                      <div id="v4"><p id="v5_5">0/255</p></div>

                    </div>

                    <div class="smtitle-txt-userinfo">Location
                      <p style="margin-top:10px">Region<span class="rq"> *</span></p>
                      <input type="text" id="reg" class="dis" value="<?= $region_u?>">
                      <select id="region" class="en" id="region" name="region_up" onclick="validation1('5')" disabled value="<?= $region?>">
                        <option value="" disabled selected>Select Region</option>
                        <option value="Metro Manila">Metro Manila (NCR)</option>
                      </select>
                      <p id="v5">Validation</p>

                      <p>City<span class="rq"> *</span></p>
                      <input type="text" id="cit" class="dis" value="<?= $city_u?>">
                      <select id="city" class="en" id = "city" disabled onclick="validation1('6')" name="city_up" disabled>
                        <option value="" disabled selected>Select City</option>
                        <option value="Caloocan City">Caloocan City</option>
                        <option value="Las Pinas">Las Pinas</option>
                        <option value="Makati City">Makati City</option>
                        <option value="Malabon City">Malabon City</option>
                        <option value="Mandaluyong City">Mandaluyong City</option>
                        <option value="Manila">Manila</option>
                        <option value="Marikina City">Marikina City</option>
                        <option value="Muntinlupa City">Muntinlupa City</option>
                        <option value="Navotas City">Navotas City</option>
                        <option value="Paranaque City">Paranaque City</option>
                        <option value="Pasay City">Pasay City</option>
                        <option value="Pasig City">Pasig City</option>
                        <option value="Pateros City">Pateros City</option>
                        <option value="Quezon City">Quezon City</option>
                        <option value="San Juan City">San Juan City</option>
                        <option value="Taguig">Taguig</option>
                        <option value="Valenzuela">Valenzuela</option>
                      </select>
                      <p id="v6">Validation</p>
                    </div>

                    <div class="smtitle-txt-userinfo">Private Information
                      <p style="margin-top:10px">Email<span class="rq"> *</span></p>
                      <input type="text" class="en" value = "<?php echo $email_u?>" name="email_up" id="email"
                      onkeypress="return handleEnter(this, event)" oninput="validation1('7')" disabled>
                      <p id="v7">Validation</p>

                      <p>Mobile Number<span class="rq"> *</span></p>
                      <input type="text" class="en" value = "<?php echo $mobile_u?>" name="mobile_up" id="mobile" maxlength="11"
                      onkeypress="return onlyNumberKey(event);return handleEnter(this, event)" oninput="validation1('8')" disabled>
                      <p id="v8">Validation</p>

                      <p>Gender</p>
                      <input type="text" id="gen" class="dis" value="<?= $gender_u?>">
                      <select name="gender_up" id="gender" class="en" disabled>
                        <option value=" " disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                      </select>
                      <p id="v9">Validation</p>

                      <p>Birthday</p>
                      <input type="date" id="bday" class="en" name="birthday_up" value="<?php echo $birthday_u?>" 
                      max="2009-12-31" min="1979-12-31" disabled>
                      <p id="v10">Validation</p>
                    </div>

                    <input type="submit" class="save_btn en" id="save_btn" name="save" value="Save Changes " 
                    style="display:none" disabled>
                    <?php 
                      addsaves();
                      logout();
                    ?>

                    <datalist id="list">
                      <?php 
                        valid();
                      ?>   
                    </datalist> 

                    <datalist id="list1">
                      <?php 
                        valid_email();
                      ?>   
                    </datalist>
                  </div>

                    <!--tab4 Change Password-->
                  <div class="tab"  id="tab4" style="display:none">
                    <p class="title-txt-userinfo">Change Password</p>
                    <div class="smtitle-txt-userinfo">
                      <input type="text" class="en" value="<?=$email_u?>" name="mail" hidden>
                      <p style="margin-top:10px">New Password</p>
                      <input type="password" class="en" id="pass" name="password" oninput="validation_pass('1')">
                      <p id="v11">Password must be 8-20 characters long</p>

                      <p style="margin-top:10px">Confirm Password</p>
                      <input type="password" class="en" id="confpass"name="confpass" oninput="validation_pass('2')">
                      <p id="v12">Password did not match</p>
                    </div>  
                    <?php 
                        $email_address = $email_u;
                        update_password1();
                    ?>   
                    <input type="submit" class="save_btn en" value="Save Changes" name="reset" id ="pass_change" disabled>
                  </div>
                </div>
            </div>
            <div class="col-xxl-2">
                <input type="submit" class="follow_btn" value="View Profile" id="view" name="view" hidden>
                <input type="submit" class="chat_btn" value="Chat" name="chat" id="chat1" hidden>
            </div>
        </div>
    </div>
  </form>  
</body>
</html>


<script>
  <?php
    include"js/userform.js";
    include"js/navbar.js";
?>
</script>


