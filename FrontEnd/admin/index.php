<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminpanel.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
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
                    <a href="index.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="fashion/fashionproduct.php">
                        <span class="icon icon-2"><i class="ri-product-hunt-line"></i></span>
                        <span class="sidebar--item">Fashion</span>
                    </a>
                </li>
                <li>
                    <a href="bike/productbike.php">
                        <span class="icon icon-2"><i class="ri-product-hunt-line"></i></span>
                        <span class="sidebar--item">Bike</span>
                    </a>
                </li>
                <li>
                    <a href="listing/listed.php">
                        <span class="icon icon-2"><i class="ri-file-list-line"></i></span>
                        <span class="sidebar--item">Pending Listing</span>
                    </a>
                </li>
                <li>
                    <a href="review/review.php">
                        <span class="icon icon-2"><i class="ri-file-list-line"></i></span>
                        <span class="sidebar--item">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="user\adminusers.php">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Overview</h2>
                    <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total User</h5>
                                <h1>0</h1>
                            </div>
                            <i class="ri-user-2-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>0%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>0</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>0</span>
                        </div>
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Product</h5>
                                <h1>0</h1>
                            </div>
                            <i class="ri-product-hunt-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>0%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>0</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>0</span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </section>
    <script src="main.js"></script>
</body>
</html>