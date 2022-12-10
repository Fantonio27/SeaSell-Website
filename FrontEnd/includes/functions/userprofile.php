<?php   
    //FETCH ALL THE DATA FROM USER
    
    include "connection.php";

    $id = $session_id;
    //echo $id;
    //for users
    $sql = "SELECT * FROM user WHERE SESSION_KEY = '$id'";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $userid_u = $row['USER_ID'];
            $username_u= $row['USERNAME'];
            $password_u= $row['PASSWORD'];
            $firstname_u = $row['FIRSTNAME'];
            $lastname_u= $row['LASTNAME'];
            $bio_u= $row['BIO'];
            $region_u = $row['REGION'];
            $city_u = $row['CITY'];
            $email_u= $row['EMAIL_ADDRESS'];
            $mobile_u= $row['MOBILE_NUMBER'];
            $gender_u= $row['GENDER'];
            $birthday_u= $row['BIRTHDAY'];
            $profile_pic_u= $row['PROFILE_PIC'];
            $key_u= $row['SESSION_KEY'];
            $username1_u= $row['USERNAME'];
            $rate_u= $row['RATING'];
            $rate_u = round($rate_u,1);
            $rate_perc = $rate_u * 20;

        }
    }else{
        //echo "no session key";
    }


?>