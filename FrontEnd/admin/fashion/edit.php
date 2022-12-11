<?php
include"../../includes/functions/connection.php";
    

$id = "";
$name = "";
$price = "";
$condition = "";
$desc = "";
$type = "";
$status = "";

$errorMesssage = "";
$successMessage = "";


if ( $_SERVER['REQUEST_METHOD'] == 'GET'){
    
    if ( !isset($_GET["id"]) ){
        header("location: \admin\fashion\fashionproduct.php");
        exit;
    }
    
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM fashion_product WHERE PRODUCT_NO = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ( !$row){
        header("location: \admin\fashion\fashionproduct.php");
        exit;
    }
    $name = $row["PRODUCT_NAME"];
    $price = $row["PRODUCT_PRICE"];
    $condition = $row["PRODUCT_CONDITION"];
    $desc = $row["PRODUCT_DESCRIPTION"];
    $type = $row["PRODUCT_TYPE"];
    $status = $row["STATUS"];
}

    else{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $condition = $_POST["condition"];
    $desc = $_POST["desc"];
    $type = $_POST["type"];
    $status = $_POST["status"];
        
        
    do{
        if ( empty($id) || empty($name) || empty($price) || empty($condition) || empty($desc) || empty($type) || empty($status) ) {
            $errorMessage = "All the field are required";
            break;
        }
        
        $sql = "UPDATE fashion_product " . 
            "SET PRODUCT_NAME = '$name', PRODUCT_PRICE = '$price', PRODUCT_CONDITION = '$condition', PRODUCT_DESCRIPTION = '$desc', PRODUCT_TYPE = '$type', STATUS = '$status' " . 
            "WHERE PRODUCT_NO = $id";
        
        $result = $conn->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid Query: " . $conn->error;
            break;
        }
        
        $successMessage = "Client Updated Correctly";
        
        header("location: \admin\fashion\fashionproduct.php");
        exit;
        
    } while(false);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <div class="container my-5">
       <h2>Edit Form</h2>
       <?php
       if ( !empty($errorMessage) ){
           echo"
           <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button class='btn-close data-bs-dismiss='alert' aria-label='close'></button>
            </div>
           ";
       }
       ?>
       <form method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Product name</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Product price</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Condition</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="condition" value="<?php echo $condition; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Description</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="desc" value="<?php echo $desc; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Type</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="type" value="<?php echo $type; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Status</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
               </div>    
           </div>
           <?php
           if ( !empty($successMessage) ) {
               echo "
               <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button class='btn-close data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
               </div>
               
               ";
           }
           ?>
           <div class="row mb-3">
               <div class="offset-sm-3 col-sm-3 d-grid">
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>
               <div class="col-sm-3 d-grid">
                   <a class="btn btn-outline-primary" href="\admin\fashion\fashionproduct.php" role="button">Cancel</a>
               </div>
           </div>
       </form>
       
   </div>
    
</body>
</html>