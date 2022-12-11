<?php 
include"../../includes/functions/connection.php";

if (isset($_GET["id"]) ) {
    
    $id = $_GET["id"];
    
    $sql = "UPDATE review SET STATUS = 'DELETE'  WHERE REVIEW_ID='$id'";
    $conn->query($sql); 
}
    header("location: review.php");
    exit;
?>