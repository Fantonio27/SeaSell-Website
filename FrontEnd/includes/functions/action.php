<?php
    function login(){   //LOGIN
        include "connection.php";

        if(isset($_POST['login'])){
            $Username = $_POST['username'];
            $Password = $_POST['password'];

            $sql = "SELECT USERNAME, PASSWORD, SESSION_KEY FROM user WHERE USERNAME = '$Username' AND PASSWORD = '$Password'";
            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $USER= $row["USERNAME"];
                    $PASS= $row["PASSWORD"];
                    //$KEY= $row["SESSION_KEY"];
                    $KEY = "VDSVVDSV";
    
                    if($USER == $Username && $PASS == $Password ){ 
                        $_SESSION['id'] = $row["SESSION_KEY"];  

                        echo'<script>
                            alert("Login Successful!"); 
                            window.location.href ="../index.php";
                            </script>';
                    } else{
                        echo'<script>
                            alert("Login Failed!"); </script>';
                    }            
                }
            }
    
            else{
                echo'<script>
                alert("Login Failed! Invalid username or password"); </script>';
            }
                        
            $conn->close();
        }
    }

    function register(){    //REGISTER
        include "connection.php";

        if(isset($_POST['register'])){
            $USERNAME = $_POST['username'];
            $USERNAME = $USERNAME;
            $PASSWORD = $_POST['password'];
            $REGION = $_POST['region'];
            $CITY = $_POST['city'];
            $EMAIL = $_POST['email'];
            $MOBILE = $_POST['mobile'];
            $SESSION = $_POST['key'];
            $FIRSTNAME = $_POST['account'];
            $LASTNAME = $_POST['no'];
            $PIC = "user.png";
            $DATE = $_POST['text-time'];

            $sql = "INSERT INTO user ". "(USERNAME, PASSWORD, REGION, CITY, EMAIL_ADDRESS, MOBILE_NUMBER, SESSION_KEY, FIRSTNAME, LASTNAME, PROFILE_PIC, JOINED_DATE) ". 
            "VALUES('$USERNAME','$PASSWORD','$REGION','$CITY','$EMAIL','$MOBILE','$SESSION','$FIRSTNAME','$LASTNAME', '$PIC', '$DATE')";
        
            if ($conn->query($sql) === TRUE) { 

                $sql = "SELECT SESSION_KEY FROM user WHERE USERNAME = '$USERNAME' AND PASSWORD = '$PASSWORD'";
                $result = mysqli_query($conn,$sql);
    
                while($row = $result->fetch_assoc()) {
                    $_SESSION['id'] = $row["SESSION_KEY"];  
                }
    
                echo'<script>
                alert("Register Successful!"); 
                window.location.href ="../index.php";
                </script>';
    
            } else {
                echo "<font style='font-size:16px; color:#bc4749; margin-top:20px'>Error Inserting Data: ". $conn->error. "</font>";}
        }    
    }

    function displayproduct($a){    //INDEX FORM DISPLAY PRODUCT
        include "connection.php";

        if($a == 1){
            $o = "ORDER BY RAND() LIMIT 10";
        }else if ($a == 2){
            $o = "ORDER BY DATE DESC";
        }else if ($a == 3){
            $o = "ORDER BY PRODUCT_PRICE DESC";
        }else if ($a == 4){
            $o = "ORDER BY PRODUCT_PRICE";
        }else{
            $o = "ORDER BY RAND() LIMIT 10";
        }
        

        $sql = " (SELECT 
        PRODUCT_NAME, PRODUCT_PRICE, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.PROD_ID, bike_product.DATE
        FROM bike_product
        JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
        JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
        WHERE product_img.IMG_INDEX = 0 AND bike_product.STATUS = 'LISTED' 
        )
        UNION
        (
        SELECT 
            PRODUCT_NAME, PRODUCT_PRICE,fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.PROD_ID, fashion_product.DATE
        FROM fashion_product
        JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
        JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
        WHERE fashion_imgs.IMG_INDEX = 0 AND fashion_product.STATUS = 'LISTED' 
        )". $o . ";";

        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $prod_id = $row["PROD_ID"];  
                $prod_img = $row["IMG_NAME"];
                $prod_prc = $row["PRODUCT_PRICE"];
                $prod_name= $row["PRODUCT_NAME"];
                $profile= $row["PROFILE_PIC"];
                $username = $row["USERNAME"];
                $i++;
                
                echo " <div class='box-product'>
                <img src='includes/images/client-product/$prod_img' class='img-product'>
                <div class='title-product'>PHP $prod_prc
                <p class='text-product'>$prod_name</p></div>
                <div>
                    <img src='includes/images/Profile-pic/$profile' class='user-icon-product'>
                    <div class='username-product'>@$username</div>
                    <a href=product.php?id=$prod_id class='view_btn'>View</a>
                </div>
            </div>
            ";
            //<input type='submit' name='view' class='view_btn' value='View'>
            //nextpage($prod_no);
            }
        }
    }

    function addsaves(){    //USERPROFLE SAVE CHANGES
        include"connection.php";
        //include"fetch.php";

        if(isset($_POST['save'])){
            $lowerf=strtolower($_POST['firstname_up']);
            $lowerl=strtolower($_POST['lastname_up']);
    
            $firstname = ucwords($lowerf);
            $lastname = ucwords($lowerl); 

            $profile = $_POST['profile_up'];
            $username = $_POST['username_up'];
            $bio = $_POST['bio_up'];
            $region = $_POST['region_up'];
            $city = $_POST['city_up'];
            $email = $_POST['email_up'];
            $mobile = $_POST['mobile_up'];
            $gender = $_POST['gender_up'];
            $birthday = $_POST['birthday_up'];
            $ex = pathinfo($profile, PATHINFO_EXTENSION);
            $profile_name = $username . "." . $ex;
            $session_key = $_POST['id'];
            //echo"<script>alert($profile_name)</script>";
            /*echo  $profile;
            echo  $username;
            echo  $firstname;
            echo  $lastname;
            echo  $bio;
            echo  $region;
            echo  $city;
            echo  $email;
            echo  $mobile;
            echo  $gender;
            echo  $birthday;
            */
            $sql = "UPDATE user SET USERNAME='$username', FIRSTNAME='$firstname', LASTNAME='$lastname', BIO='$bio', REGION='$region', 
            CITY='$city',EMAIL_ADDRESS='$email', MOBILE_NUMBER='$mobile', GENDER='$gender', BIRTHDAY='$birthday' , PROFILE_PIC='$profile_name'
            WHERE SESSION_KEY = '$session_key'";
            
            if ($conn->query($sql) === TRUE) { 
                if($profile != "user.png"){
                    $uploads_dir = 'includes/images/Profile-pic';
                    foreach ($_FILES["file"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["file"]["tmp_name"][$key];
    
                        $name = basename($_FILES["file"]["name"][$key]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    
                        rename("includes/images/Profile-pic/$name", "includes/images/Profile-pic/$profile_name");
                        }
                    }
                }else{
                    $sql = "UPDATE user SET PROFILE_PIC = 'user.png' WHERE SESSION_KEY = '$session_key'";
                    $result = $conn->query($sql);
                }
            }else{
                
            }
            echo"<script>alert('Save Changes');window.location.href='userform.php';</script>";
        }
    }

    function valid(){      //VALIDATION FOR USERNAME 
        include"connection.php";
        include"fetch.php";

        $sql = "SELECT USERNAME FROM user WHERE USERNAME != '$username'";
        $result = mysqli_query($conn,$sql);
        while($row = $result->fetch_assoc()) {
            $VALID_USERNAME = $row['USERNAME'];
            //echo "<p id='v'>$VALID_USERNAME</p>";
            echo "<option value='$VALID_USERNAME'>";
        }
    }

    function valid_email(){     //VALIDATION FOR EMAIL 
        include"connection.php";
        include"fetch.php";

        $sql = "SELECT EMAIL_ADDRESS FROM user WHERE EMAIL_ADDRESS != '$email'";
        $result = mysqli_query($conn,$sql);
        while($row = $result->fetch_assoc()) {
            $VALID_EMAIL = $row['EMAIL_ADDRESS'];
            //echo "<p id='v'>$VALID_USERNAME</p>";
            echo "<option value='$VALID_EMAIL'>";
        }
    }

    function logout(){   //LOG OUT

        if(isset($_POST['log_out'])){
            $_SESSION['id'] = "";

            include"fetch.php";
            echo"<script>window.location.href='index.php'</script>";
        }
    }

    function displaybike($a){   //BIKE FORM DISPLAY PRODUCT 
        include "connection.php";
        $sql = "SELECT bike_product.PROD_ID, bike_product.PRODUCT_PRICE, bike_product.PRODUCT_NAME, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.DATE
        FROM bike_product
        JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
        JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
        WHERE product_img.IMG_INDEX = 0 AND bike_product.STATUS = 'LISTED'";

        if($a == 1){
            $sql = $sql . "ORDER BY RAND() LIMIT 10;";

        }else if ($a == 2){
            $sql = $sql . "ORDER BY DATE DESC;";

        } else if ($a == 3){
            $sql = $sql . "ORDER BY PRODUCT_PRICE DESC";

        }else if ($a == 4){
            $sql = $sql . "ORDER BY PRODUCT_PRICE";
        }  

        $result = mysqli_query($conn,$sql);
    
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $prod_no = $row["PROD_ID"];  
                $prod_img = $row["IMG_NAME"];
                $prod_prc = $row["PRODUCT_PRICE"];
                $prod_name= $row["PRODUCT_NAME"];
                $profile= $row["PROFILE_PIC"];
                $username = $row["USERNAME"];
                $i++;
                
                echo " <div class='box-product'> 
                    <input type='text' value='$i' hidden>
                    <img src='includes/images/client-product/$prod_img' class='img-product'>
                    <div class='title-product'>Php $prod_prc
                    <p class='text-product'>$prod_name</p></div>
                    <div>
                        <img src='includes/images/Profile-pic/$profile' class='user-icon-product'>
                        <div class='username-product'>@$username</div>
                        <a href=product.php?id=$prod_no class='view_btn'>View</a> 
                    </div>
                </div>";
            }
        }
    }

    function displayfashion($a){   //FASHION FORM DISPLAY PRODUCT
        include "connection.php";
        $sql = "SELECT fashion_product.PROD_ID, fashion_product.PRODUCT_PRICE, fashion_product.PRODUCT_NAME, fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.DATE
        FROM fashion_product
        JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
        JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
        WHERE fashion_imgs.IMG_INDEX = 0 AND fashion_product.STATUS = 'LISTED'";

        if($a == 1){
            $sql = $sql . "ORDER BY RAND() LIMIT 10;";

        }else if ($a == 2){
            $sql = $sql . "ORDER BY DATE DESC;";

        } else if ($a == 3){
            $sql = $sql . "ORDER BY PRODUCT_PRICE DESC";

        }else if ($a == 4){
            $sql = $sql . "ORDER BY PRODUCT_PRICE";
        }  

        $result = mysqli_query($conn,$sql);
    
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $prod_no = $row["PROD_ID"];  
                $prod_img = $row["IMG_NAME"];
                $prod_prc = $row["PRODUCT_PRICE"];
                $prod_name= $row["PRODUCT_NAME"];
                $profile= $row["PROFILE_PIC"];
                $username = $row["USERNAME"];
                $i++;
                
                echo " <div class='box-product'> 
                <input type='text' value='$i' hidden>
                <img src='includes/images/client-product/$prod_img' class='img-product'>
                <div class='title-product'>Php $prod_prc
                <p class='text-product'>$prod_name</p></div>
                <div>
                    <img src='includes/images/Profile-pic/$profile' class='user-icon-product'>
                    <div class='username-product'>@$username</div>
                    <a href=product.php?id=$prod_no class='view_btn'>View</a> 
                </div>
                </div>";
            }
        }
    }

    function addimages($a){     //USERPROFILE UPDATE PROFILE PIC
        include "connection.php";

        $prod_no = $_GET['id'];

        if($a == "Fashion"){
            $sql = "SELECT * 
            FROM `fashion_imgs` 
            WHERE PROD_ID = '$prod_no' AND IMG_INDEX > 0;";
        }else{
            $sql = "SELECT * 
            FROM `product_img` 
            WHERE PROD_ID = '$prod_no' AND IMG_INDEX > 0;";
        }
        
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $img_index = $row['IMG_INDEX'];
                $img_name = $row['IMG_NAME'];
                $prod_id = $row['PROD_ID'];

                echo "  <div class='carousel-item'>
                            <img src='includes/images/client-product/$img_name' class='image'>
                        </div>";
            }
        }else{
            
        }        
    }

    function countimg(){    //COUNT IMAGE
        include "connection.php";

        $prod_no = $_GET['id'];

            $sql = "SELECT COUNT(IMG_INDEX) as indextotal FROM fashion_imgs WHERE PROD_ID = '$prod_no';";
            $result = mysqli_query($conn,$sql);
            $indextotal=mysqli_fetch_assoc($result);
    }

    function fetch_email(){     //FETCH EMAIL

        include "connection.php";

        if(isset($_POST['enter'])){

            $email = $_POST['email'];
            $sql = "SELECT * FROM user WHERE EMAIL_ADDRESS = '$email'";
            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                echo"<script>alert('Proceed to Reset Password Form');
                window.location.href='resetpass.php'</script>";
                $_SESSION['email'] = $email ;  
            }else{
                echo"<script>alert('Email doesnt exist!')</script>";
            }
    
        }
    }

    function update_password(){   //UPDATE PASSWORD IN FORGETPASS FORM
        
        include "connection.php";

        if(isset($_POST['reset'])){

            $email_add = $_SESSION['email'];;
            $newpass = $_POST['password'];
            $confpass = $_POST['confpass'];
            if($newpass == $confpass){
                $sql = "UPDATE user SET PASSWORD = '$newpass' WHERE EMAIL_ADDRESS = '$email_add'";
                echo $sql;
                if ($conn->query($sql) === TRUE) { 
                    echo"<script>alert('Success! Your password has been changed!');
                    window.location.href='login.php'</script>";
                }else{
                    echo"<script>alert('Error')</script>";
                }
            }else{
                echo"<script>alert('Passwords do NOT match!')</script>";
            }
        }
    }

    function update_password1(){    //UPDATE PASSWORD IN USERPROFILE
        
        include "connection.php";

        if(isset($_POST['reset'])){

            $email_add = $_POST['mail'];
            $newpass = $_POST['password'];
            $confpass = $_POST['confpass'];
            
            $sql = "UPDATE user SET PASSWORD = '$newpass' WHERE EMAIL_ADDRESS = '$email_add'";

            if ($conn->query($sql) === TRUE) { 
                echo"<script>alert('Success! Your password has been changed!');
                window.location.href='userform.php';</script>";
            }else{
                echo"<script>alert('Error')</script>";
            }
        }
    }

    function seller_id(){   //RIDIRECT TO MESSAGEFORM OR GO TO USERPROFILE
        include "connection.php";

        if(isset($_POST['view'])){
            echo"<script>window.location.href='userform.php';</script>";
            $_SESSION['seller_id'] = $_POST['seller_id'];
        }

        if(isset($_POST['chat'])){  
            echo"<script>window.location.href='messageform.php';</script>";
            $_SESSION['seller_id'] = $_POST['seller_id'];
            $_SESSION['prodno'] = $_POST['id'];
        }
    }

    function update_status($a, $b){     //UPDATE STATUS IN PRODUCT
        include "connection.php";
        
        if($a == "Bike"){
            $table = "bike_product";
        }else if ($a == "Fashion"){
            $table = "fashion_product";
        }
        $stat ="";
        if(isset($_POST['res'])){
            $stat = "RESERVED";
            $rev = "ACTIVE";

        }else if(isset($_POST['unres'])){
            $stat = "LISTED";
            $rev = "ACTIVE";
        }
        if(isset($_POST['sold'])){
            $stat = "SOLD";
            $rev = "ACTIVE";
        }
        if(isset($_POST['dlt'])){
            $stat = "DELISTED";
            $rev = "DELETE";
        }

        if($stat != ""){
            $sql = "UPDATE $table SET STATUS = '$stat' WHERE PROD_ID = '$b'";
            if ($conn->query($sql) === TRUE) { 
                $sql = "UPDATE review SET STATUS = '$rev' WHERE PROD_ID = '$b'";
                if ($conn->query($sql) === TRUE) { 
                    echo"<script>alert('Update Successful');
                    window.location.href='userform.php';</script>";
                }
            }
        }
    }

    function display(){

        include"display_search.php";
        include"connection.php";

        $sql = "";
        if($name != ""){
            $sql .= " AND PRODUCT_NAME = '" . $name . "'";
        }
    
        if($type != ""){
            $sql .= " AND PRODUCT_TYPE = '" . $type . "'";
        }
    
        if($condition != ""){
            $sql .= " AND PRODUCT_CONDITION = '" . $condition . "'";
        }
        
        if($price != ""){
            if($price == 1){
                $sql .= " AND PRODUCT_PRICE > '" . $price . "'";
            }else if ($price == 0){
                $sql .= " AND PRODUCT_PRICE = '" . $price . "'";
            }
        }
    
        if($deal != ""){
            $sql .= " AND PRODUCT_DEALMETHOD = '" . $deal . "'";
        }
        
        filter_product($sql,$cat,$name);
    }
        

    function filter_product($a, $b,$c){    //FILTER IN SEARCHFORM
        include "connection.php";

        if($b == "Bike"){
            $sql = "SELECT bike_product.PROD_ID, bike_product.PRODUCT_PRICE, bike_product.PRODUCT_NAME, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.DATE
            FROM bike_product
            JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
            JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
            WHERE product_img.IMG_INDEX = 0 AND bike_product.STATUS = 'LISTED'";
    
            $sql = $sql . "$a ORDER BY DATE DESC;";
            //echo $sql;
        }
        else if($b == "Fashion"){
            $sql = "SELECT fashion_product.PROD_ID, fashion_product.PRODUCT_PRICE, fashion_product.PRODUCT_NAME, fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.DATE
            FROM fashion_product
            JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
            JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
            WHERE fashion_imgs.IMG_INDEX = 0 AND fashion_product.STATUS = 'LISTED'";
    
            $sql = $sql . "$a ORDER BY DATE DESC;";
            //echo $sql;
        }else if ($b == "Category"){

            $sql = " (SELECT 
            PRODUCT_NAME, PRODUCT_PRICE, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.PROD_ID, bike_product.DATE
            FROM bike_product
            JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
            JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
            WHERE product_img.IMG_INDEX = 0 AND bike_product.STATUS = 'LISTED'". $a ."
            )
            UNION
            (
            SELECT 
                PRODUCT_NAME, PRODUCT_PRICE,fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.PROD_ID, fashion_product.DATE
            FROM fashion_product
            JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
            JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
            WHERE fashion_imgs.IMG_INDEX = 0  AND fashion_product.STATUS = 'LISTED'". $a ."
            ) ORDER BY DATE DESC;";
        }else{

            $sql = " (SELECT 
            PRODUCT_NAME, PRODUCT_PRICE, product_img.IMG_NAME, user.USERNAME,user.PROFILE_PIC, bike_product.PROD_ID, bike_product.DATE
            FROM bike_product
            JOIN product_img ON bike_product.PROD_ID=product_img.PROD_ID
            JOIN user ON bike_product.SELLER_ID=user.SESSION_KEY
            WHERE product_img.IMG_INDEX = 0 AND bike_product.STATUS = 'LISTED' AND bike_product.PRODUCT_NAME = '". $c ."'
            )
            UNION
            (
            SELECT 
                PRODUCT_NAME, PRODUCT_PRICE,fashion_imgs.IMG_NAME, user.USERNAME,user.PROFILE_PIC, fashion_product.PROD_ID, fashion_product.DATE
            FROM fashion_product
            JOIN fashion_imgs ON fashion_product.PROD_ID=fashion_imgs.PROD_ID
            JOIN user ON fashion_product.SELLER_ID=user.SESSION_KEY
            WHERE fashion_imgs.IMG_INDEX = 0  AND fashion_product.STATUS = 'LISTED' AND fashion_product.PRODUCT_NAME = '". $c ."'
            ) ORDER BY DATE DESC;";

            //echo$sql;
        }

        $result = mysqli_query($conn,$sql);
        $i = 0;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $prod_no = $row["PROD_ID"];  
                $prod_img = $row["IMG_NAME"];
                $prod_prc = $row["PRODUCT_PRICE"];
                $prod_name= $row["PRODUCT_NAME"];
                $profile= $row["PROFILE_PIC"];
                $username = $row["USERNAME"];
                $i++;
                
                echo " <div class='box-product'> 
                    <input type='text' value='$i' hidden>
                    <img src='includes/images/client-product/$prod_img' class='img-product'>
                    <div class='title-product'>Php $prod_prc
                    <p class='text-product'>$prod_name</p></div>
                    <div>
                        <img src='includes/images/Profile-pic/$profile' class='user-icon-product'>
                        <div class='username-product'>@$username</div>
                        <a href=product.php?id=$prod_no class='view_btn'>View</a> 
                    </div>
                </div>";
            }

        }else{
            echo" <div class='message' style='margin-top:90px'>
                    <img src='includes/images/header-background/undraw_the_search_s0xf.svg' class='img_message'>
                    <p class='message_txt'>Your search did not match any listings.</p>
                    <p class='message_txt1'>Try another search, check if the spelling is correct or try more general keywords</p>
                </div>";
        }
    }

    function review(){      //INSERT REVIEWS
        include "connection.php";

        if(isset($_POST['submit'])){
            $RATE = $_POST['rate'];
            $MESSAGE = $_POST['review'];
            $SELLER_ID = $_POST['seller'];
            $BUYER_ID = $_POST['buyer'];
            $PROD_ID = $_POST['prod'];
            $STATUS = "ACTIVE";   
            $sql = "INSERT INTO review ". "(RATE, MESSAGE, SELLER_ID, BUYER_ID, PROD_ID, STATUS) ". 
            "VALUES('$RATE','$MESSAGE','$SELLER_ID','$BUYER_ID','$PROD_ID','$STATUS')";
        
            if ($conn->query($sql) === TRUE) { 
                $sql = "SELECT * FROM user WHERE SESSION_KEY = '$SELLER_ID'";
                $result = mysqli_query($conn,$sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $RATING = $row['RATING'];
                    }
                    if($RATING == ""){
                        $RATING = 0;
                    }
                    $newrate = ($RATING + $RATE)/2;
                    $newrate = round($newrate, 2);

                    $sql = "UPDATE user SET RATING = '$newrate' WHERE SESSION_KEY = '$SELLER_ID'";
                    if ($conn->query($sql) === TRUE) { 
                        echo"<script>alert('Successfull Review')</script>";
                    }  
                }
            }
        }
    }

    function display_review($a, $b, $c){     //DISPLAY REVIEW IN EACH PRODUCT
        include "connection.php";

        if($b == 1){
            $sql = "SELECT *
            FROM review
            JOIN user ON review.BUYER_ID=user.SESSION_KEY
            WHERE review.PROD_ID = '$a' AND review.STATUS = 'ACTIVE'";
            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    $rate = $row["RATE"];
                    $seller = $row["SELLER_ID"];
                    $review= $row["MESSAGE"];
                    $profile= $row["PROFILE_PIC"];
                    $username = $row["USERNAME"];

                    $rate = $rate * 20;

                    echo " <div class='review-box'>
                    <img src='includes/images/Profile-pic/$profile' class='user-avatar'>
                    <div class='user-name'>$username<br>
                        <svg viewBox='0 0 1000 200' class='rating1'>
                        <defs> 
                            <polygon id='star1' points='100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 '/>
                    
                            <clipPath id='stars1'>
                                <use xlink:href='#star1'/>
                                <use xlink:href='#star1' x='22%'/>
                                <use xlink:href='#star1' x='42%'/>
                                <use xlink:href='#star1' x='62%'/>
                                <use xlink:href='#star1' x='82%'/>
                            </clipPath>  

                        </defs>
                        <rect class='rating__background1' clip-path='url(#stars1)'></rect>
                        <!--width yung pang adjust ng rating-->
                        <rect width='$rate%' class='rating__value1' clip-path='url(#stars1)'></rect>
                        </svg><br>
                    </div>
                    <div style='width: 55px; height:40px; float: left;'></div>
                    <div class='user-txt'>
                        $review
                    </div>
                </div>";
                }
            }else{
                echo" <div class='message' style='margin-top:50px'>
                        <img src='includes/images/header-background/undraw_reviews_lp8w.svg' class='img_message'>
                        <p class='message_txt'>@$c has no reviews yet.</p>
                        <p class='message_txt1'>Reviews are given when a buyer or seller completes a deal. Chat with @$c to find out more!</p>
                    </div>";
            }

        }else if($b == 2){
            $sql = "SELECT review.RATE, review.MESSAGE, user.PROFILE_PIC, user.USERNAME, IF(fashion_product.PROD_ID = review.PROD_ID,fashion_product.PROD_ID,bike_product.PROD_ID ) AS PROD_ID,
            IF(fashion_product.PROD_ID = review.PROD_ID,fashion_product.PRODUCT_NAME,bike_product.PRODUCT_NAME ) AS PRODUCT_NAME ,IF(fashion_product.PROD_ID = review.PROD_ID,fashion_product.PRODUCT_PRICE,bike_product.PRODUCT_PRICE ) AS PRODUCT_PRICE,
            IF(fashion_product.PROD_ID = fashion_imgs.PROD_ID,fashion_imgs.IMG_NAME,product_img.IMG_NAME ) AS IMG_NAME
            FROM review
            LEFT JOIN user ON review.BUYER_ID=user.SESSION_KEY
            LEFT JOIN fashion_product ON (review.PROD_ID = fashion_product.PROD_ID)
            LEFT JOIN bike_product ON (review.PROD_ID = bike_product.PROD_ID)
            LEFT JOIN fashion_imgs ON (fashion_imgs.PROD_ID = fashion_product.PROD_ID)
            LEFT JOIN product_img ON (product_img.PROD_ID = bike_product.PROD_ID)
            WHERE review.SELLER_ID = '$a' AND review.STATUS = 'ACTIVE'";
            $result = mysqli_query($conn,$sql); //v1ig9s2m0p

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    $rate = $row["RATE"];
                    $review= $row["MESSAGE"];
                    $profile= $row["PROFILE_PIC"];
                    $username = $row["USERNAME"];
                    $prodid = $row["PROD_ID"];
                    $rate = $rate * 20;
                    $img = $row["IMG_NAME"];
                    $prodname= $row["PRODUCT_NAME"];
                    $price= $row["PRODUCT_PRICE"];

                    echo " <div class='review-box'>
                                <img src='includes/images/Profile-pic/$profile' class='user-avatar'>
                                <div class='user-name'>$username<br>
                                    <svg viewBox='0 0 1000 200' class='rating1'>
                                        <defs> 
                                            <polygon id='star1' points='100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 '/>
                                    
                                            <clipPath id='stars1'>
                                                <use xlink:href='#star1'/>
                                                <use xlink:href='#star1' x='22%'/>
                                                <use xlink:href='#star1' x='42%'/>
                                                <use xlink:href='#star1' x='62%'/>
                                                <use xlink:href='#star1' x='82%'/>
                                            </clipPath>  

                                        </defs>
                                        <rect class='rating__background1' clip-path='url(#stars1)'></rect>
                                        <!--width yung pang adjust ng rating-->
                                        <rect width='$rate%' class='rating__value1' clip-path='url(#stars1)'></rect>
                                    </svg><br>
                                </div>
                                <div style='width: 60px; height:50px; float: left;'></div>
                                <div class='user-txt-review'>$review</div>
                                <div class='product-review-box'>
                                    <img src='includes/images/client-product/$img' class='product-img-review'>
                                    <div class='p'><p>$prodname </p>
                                    <p>Php $price</p>
                                    </div>
                                </div>
                            </div>";
                }
            }else
            {
                echo" <div class='message' style='margin-top:80px'>
                <img src='includes/images/header-background/undraw_reviews_lp8w.svg' class='img_message'>
                <p class='message_txt'>@$c has no reviews yet.</p>
                <p class='message_txt1'>Reviews are given when a buyer or seller completes a deal. Chat with @$c to find out more!</p>
            </div>";
            }
        }
    }
?>