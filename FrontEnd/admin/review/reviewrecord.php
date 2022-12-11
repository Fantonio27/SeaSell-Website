<!DOCTYPE html>
<html lang="en">

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../adminpanel.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title> Fashion Product</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Sea<span>sell</span></h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
        <ul class="sidebar--items">
                <li>
                    <a href="../index.php">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../fashion/fashionproduct.php" id="active">
                        <span class="icon icon-2"><i class="ri-product-hunt-line"></i></span>
                        <span class="sidebar--item">Fashion</span>
                    </a>
                </li>
                <li>
                    <a href="../bike/productbike.php" id="active">
                        <span class="icon icon-2"><i class="ri-product-hunt-line"></i></span>
                        <span class="sidebar--item">Bike</span>
                    </a>
                </li>
                <li>
                    <a href="../listing/listed.php">
                        <span class="icon icon-2"><i class="ri-file-list-line"></i></span>
                        <span class="sidebar--item">Pending Listing</span>
                    </a>
                </li>
                <li>
                    <a href="../review/review.php">
                        <span class="icon icon-2"><i class="ri-file-list-line"></i></span>
                        <span class="sidebar--item">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="../user/adminusers.php">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Users</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items"  >
                <li >
                    <a href="review.php" id="active--link">
                        <span class="icon-8" ></span>
                        <span class="sidebar--item" >View Record</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="filter">
 </div>
 <table>
 <thead>
 <tr>
 <th>ID</th>
 <th>BUYER ID</th>
 <th>SELLER ID</th>
 <th>RATE</th>
 <th>MESSAGE</th>
 <th>PRODUCT ID</th>
 <th>STATUS</th>
 </tr>
</thead>
<tbody>
   <?php 
    include"../../includes/functions/connection.php";
    
    $sql = "(SELECT REVIEW_ID, RATE, BUYER_ID, MESSAGE, REVIEW_ID,SELLER_ID,PROD_ID,STATUS FROM review WHERE STATUS = 'ACTIVE')"; 
    $result = $conn->query($sql);
    
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td>$row[REVIEW_ID]</td>
        <td>$row[BUYER_ID]</td>
        <td>$row[SELLER_ID]</td>
        <td>$row[RATE]</td>
        <td>$row[MESSAGE]</td>
        <td>$row[PROD_ID]</td>
        <td>$row[STATUS]</td>
        </tr>
        ";
    }
    ?>
    
</tbody>
 </table> 
         
        </div>
        
    </section>
    <script src="../main.js"></script>
</body>
</html>