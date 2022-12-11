<?php 
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];
    
    include"../../includes/functions/connection.php";
    
    $sql = "DELETE FROM user WHERE USER_ID=$id";
    $conn->query($sql);
}

    header("location: adminusers.php");
    exit;
?>