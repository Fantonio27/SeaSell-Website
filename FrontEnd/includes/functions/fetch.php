<?php
    
    include "connection.php";
    
    $id = $_SESSION['id'];
    //echo $id;
    //for users
    $sql = "SELECT * FROM user WHERE SESSION_KEY = '$id'";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        //$userid = $row['USER_ID'];
        $username= $row['USERNAME'];
        //$password= $row['PASSWORD'];
        $firstname = $row['FIRSTNAME'];
        //$lastname= $row['LASTNAME'];
        //$bio= $row['BIO'];
        //$region = $row['REGION'];
        //$city = $row['CITY'];
        $email= $row['EMAIL_ADDRESS'];
        //$mobile= $row['MOBILE_NUMBER'];
        //$gender= $row['GENDER'];
        //$birthday= $row['BIRTHDAY'];
        $profile_pic= $row['PROFILE_PIC'];
        $key= $row['SESSION_KEY'];
        //$username1= $row['USERNAME'];
        }
    }else{
        $key= "";
    }
    
    //for the product no
    $sql = "SELECT COUNT(PRODUCT_NO) as total FROM bike_product";
    $result = mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($result);

    $prod_number =  $data['total'] + 1;

     //for the product no of fashion
    $sql = "SELECT COUNT(PRODUCT_NO) as total FROM fashion_product";
    $result = mysqli_query($conn,$sql);
    $data2=mysqli_fetch_assoc($result);

    $prod_number_fashion =  $data2['total'] + 1;

    //for no of user
    $sql = "SELECT COUNT(USERNAME) as total1 FROM user";
    $result = mysqli_query($conn,$sql);
    $data1=mysqli_fetch_assoc($result);

    $usercount =  $data1['total1'];

    //fetch ALL data from user and product
    $prod_no = $_GET['id'];

    if($prod_no == 0){
        $first_l = 0;
    }else{
        $first_l = $prod_no[0];
    }

    if($first_l == "b"){
        $sql = "SELECT * 
        FROM `bike_product` 
        JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
        JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
        WHERE product_img.IMG_INDEX = 0 AND bike_product.PROD_ID = '$prod_no';";
        $result = mysqli_query($conn,$sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    
            $product_name= $row['PRODUCT_NAME'];
            $product_prc= $row['PRODUCT_PRICE'];
            $product_con = $row['PRODUCT_CONDITION'];
            $product_desc= $row['PRODUCT_DESCRIPTION'];
            $product_type= $row['PRODUCT_TYPE'];
            $DATE = $row['DATE'];
            $product_status = $row['STATUS'];

            $product_deal = $row['PRODUCT_DEALMETHOD'];
            $product_meet= $row['MEET_UP'];
            $product_mail = $row['MAILING'];
            $product_qty = $row['PRODUCT_QTY'];
            $picture_id= $row['PICTURE_ID'];
            $prod_id= $row['PROD_ID'];
            $img_name= $row['IMG_NAME'];
            $seller_id= $row['SELLER_ID'];
            $seller_fname= $row['FIRSTNAME'];
            $seller_lname= $row['LASTNAME'];
            $seller_user= $row['USERNAME'];
            $seller_pic= $row['PROFILE_PIC'];
            $rates = $row['RATING'];

            if($product_status == "LISTED"){
                $product_status = "Reserved";
            }else if ($product_status == "RESERVED"){
                $product_status = "Unreserved";
            }

            if($rates != ""){
                $rate_round = round($rates,1) ;
                $rate_round_txt = round($rates,1) . " rates";
                $rate_perc =  $rate_round * 20;
            }else{
                $rate_round = "No ratings yet";
                $rate_perc =  0 * 20;
            }
            
            $cat = "Bike"; 
            $_SESSION['prodno'] = $prod_no;
            }
        }else{
            //echo "no session key";
        }

        $sql = "SELECT COUNT(IMG_INDEX) as indextotal FROM product_img WHERE PROD_ID = '$prod_no';";
        $result = mysqli_query($conn,$sql);
        $total=mysqli_fetch_assoc($result);
    
        $indexcount =  $total['indextotal'];

    }else if ($first_l == "f"){
        $sql = "SELECT * 
        FROM `fashion_product` 
        JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
        JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
        WHERE fashion_imgs.IMG_INDEX = 0 AND fashion_product.PROD_ID = '$prod_no';";
        $result = mysqli_query($conn,$sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    
                $product_name= $row['PRODUCT_NAME'];
                $product_prc= $row['PRODUCT_PRICE'];
                $product_con = $row['PRODUCT_CONDITION'];
                $product_desc= $row['PRODUCT_DESCRIPTION'];
                $product_type= $row['PRODUCT_TYPE'];
                $product_gender= $row['PRODUCT_GENDER'];
                $DATE = $row['DATE'];
                $product_size= $row['PRODUCT_SIZE'];
                $product_status = $row['STATUS'];
                $product_deal = $row['PRODUCT_DEALMETHOD'];
                $product_meet= $row['MEET_UP'];
                $product_mail = $row['MAILING'];
                $product_qty = $row['PRODUCT_QTY'];

                $picture_id= $row['PICTURE_ID'];
                $prod_id= $row['PROD_ID'];
                $img_name= $row['IMG_NAME'];
                $seller_id= $row['SELLER_ID'];
                $seller_fname= $row['FIRSTNAME'];
                $seller_lname= $row['LASTNAME'];
                $seller_user= $row['USERNAME'];
                $seller_pic= $row['PROFILE_PIC'];
                $cat = "Fashion"; 
                $rates = $row['RATING'];

                if($product_status == "LISTED"){
                    $product_status = "Reserved";
                }else if ($product_status == "RESERVED"){
                    $product_status = "Unreserved";
                }
                if($rates != ""){
                    $rate_round = round($rates,1) ;
                    $rate_round_txt = round($rates,1) . " rates";
                    $rate_perc =  $rate_round * 20;
                }else{
                    $rate_round = "No ratings yet";
                    $rate_perc =  0 * 20;
                }
            }
        }else{
            //echo "no session key";
        }
        $sql = "SELECT COUNT(IMG_INDEX) as indextotal FROM fashion_imgs WHERE PROD_ID = '$prod_no';";
        $result = mysqli_query($conn,$sql);
        $total=mysqli_fetch_assoc($result);
    
        $indexcount =  $total['indextotal'];
    }
?>