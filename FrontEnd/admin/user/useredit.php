<?php
include"../../includes/functions/connection.php";

$id = "";
$username = "";
$email = "";
$password = "";

$errorMesssage = "";
$successMessage = "";


if ( $_SERVER['REQUEST_METHOD'] == 'GET'){
    
    if ( !isset($_GET["id"]) ){
        header("location: adminusers.php");
        exit;
    }
    
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM user WHERE USER_ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ( !$row){
        header("location: adminusers.php");
        exit;
    }
    $username = $row["USERNAME"];
    $email = $row["EMAIL_ADDRESS"];
    $password = $row["PASSWORD"];
}

    else{
    $id = $_POST["id"];
    $username = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
        
    do{
        if ( empty($id) || empty($username) || empty($email) || empty($password) ) {
            $errorMessage = "All the field are required";
            break;
        }
        
        $sql = "UPDATE user " . 
            "SET USERNAME = '$username', EMAIL_ADDRESS = '$email', PASSWORD = '$password' " . 
            "WHERE USER_ID = $id";
        
        $result = $conn->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid Query: " . $conn->error;
            break;
        }
        
        $successMessage = "Client Updated Correctly";
        
        header("location: adminusers.php");
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
               <label class="col-sm-3 col-form-label">Username</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="user" value="<?php echo $username; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Email</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
               </div>    
           </div>
           <div class="row mb-3">
               <label class="col-sm-3 col-form-label">Password</label>
               <div class="sol-sm-6">
                   <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
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
                   <a class="btn btn-outline-primary" href="adminusers.php" role="button">Cancel</a>
               </div>
           </div>
       </form>
       
   </div>
    
</body>
</html>