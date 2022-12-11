<?php 
   include"../../includes/functions/connection.php";

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];
    
    $id = $_GET["id"];
    $f = $id[0];

    if($f == "f"){
       $sql = "UPDATE fashion_product SET STATUS = 'DELISTED'  WHERE PROD_ID='$id'";
    $conn->query($sql); 
        
    }else if($f == "b"){
        $sql = "UPDATE bike_product SET STATUS = 'DELISTED'  WHERE PROD_ID='$id'";
    $conn->query($sql);
    }
}
    header("location: listed.php");
    exit;
?>