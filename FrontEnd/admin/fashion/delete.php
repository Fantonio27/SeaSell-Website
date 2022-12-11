<?php 
if ( isset($_GET["id"]) ) {

    $id = $_GET["id"];
    
    include"../../includes/functions/connection.php";
    
    $sql = "UPDATE fashion_product SET STATUS = 'DELETED'  WHERE PRODUCT_NO=$id";
    $conn->query($sql);
}

    header("location: fashionprodcut.php");
    exit;
?>