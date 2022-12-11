<?php
    session_start();
    //$session_id = $_SESSION['id'];
    include"php/navbar.php";
    include"includes/functions/fetch.php";
    include"includes/functions/upload.php";
    include"includes/functions/action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaSell - Sell an item</title>
    <link rel="icon" type="image/x-icon" href="includes/images/Logo/icon-logo.png">
    <link rel="stylesheet" href="includes/css-bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="includes/js/bootstrap.bundle.js"></script>
</head>
<style>
    <?php 
        include"css/navbar&footer.css";
        include"css/editlist.css";
    ?> 
</style>

<body id="body" onload="load_func()">
    <div class="contain-fluid"> 
    <div class="row p">
        <div class="col-xxl-2"></div>
        <div class="col-xxl-8">
            <div class="container-box">
                <form action="<?php $_PHP_SELF?>" method="POST" >
                    <div class="con-top">
                        <button type="button" class=" res_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" onclick="change_reserve()">
                        <span id="reserved" >Mark as <?=$product_status?></span>
                        </button>
                        <button type="button" class=" sold_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                        Mark as Sold
                        </button>
                        <button type="button" class="btn btn-danger dlt_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                        Delete
                        </button>
                    </div>
                    <!--1st Modal -->
                    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mark your listing as <?=$product_status?>?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="p1">When reserved, this item will not be visible in the marketplace and you will not receive any offers.</p>
                                    <p id="p2">When unreserved, your item will be visible in the marketplace. Good luck!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit"  class="btn btn-primary" value="Mark as Reserved" name="res" id="res">
                                    <input type="submit"  class="btn btn-primary" value="Mark as Unreserved" name="unres" id="unres">
                                </div>
                            </div>
                        </div>
                    </div>

                <!--2nd Modal -->
                    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Mark your listing as Sold?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    You can’t undo this action. Buyers can no longer chat with you or make offers for this listing.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Mark as Sold" name="sold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--3rd Modal -->
                    <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" >
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete this listing?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">                          
                                    You cannot undo this action.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Delete" name="dlt">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        update_status($cat, $prod_id);
                    ?>
                </form>
                <div class="container-top">
                    <select name="category" class="combo-box form-control" id="category" disabled>
                    <option disabled selected>Select a Category</option>
                    <option>Bike</option>
                    <option >Fashion</option>
                    </select>
                </div>
                <input type="text" id="cat" value="<?= $cat?>" hidden>
                <input id="sell" value="" hidden>
                
                <div class="container-fashion" id="con-1"  style="display:none">
                    <div class="group">
                        <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">
                            <!--For Seller-->
                            <input type="text" id="id" value="<?php echo $key?>" name="id_f" hidden>
                            <!--For picture id-->
                            <input type="text" id="picid" value="<?php echo $picture_id?>" name="picid_fashion" hidden>
                            <!--For product no-->
                            <input type="text" id="prodno" value="<?php echo $prod_id?>" name="prodid_fashion" hidden>

                            <input type="text" required="" name="prod_name_fashion" class="txtbox" maxlength="50" id="productname_fashion" value="<?=$product_name?>" oninput="validation2('1');">
                            <label class="user-txt">Product Name</label><br>
                            <span id="req1_fashion">Product Name is required</span>

                            <p class="title-item">About the Item</p>

                            <p class="txt-per-item">Condition<span class="red"> *</span></p>

                            <div class="box-condition2 con-10" onclick="changecon1('con-10')">Brand new</div>
                            
                            <div class="box-condition2 con-11" onclick="changecon1('con-11')">Like new</div>

                            <div class="box-condition2 con-12" onclick="changecon1('con-12')">Lightly used</div>

                            <div class="box-condition2 con-13" onclick="changecon1('con-13')">Well used</div>

                            <div class="box-condition2 con-14" onclick="changecon1('con-14')">Heavily used</div>

                            <br><br><span id="req2_fashion">Please fill this in.</span>
                            <input type="text" id="con_txt_fashion" name="condition_txt_fashion" value="<?=$product_con?>" hidden>

                            <br><p class="txt-per-item">Price<span class="red"> *</span></p> 
                            <div class="box-condition2 con-15" onclick="changepric1('con-15', '1');//validation2('3')" >For Sale</div>
                            <div class="box-condition2 con-16" onclick="changepric1('con-16', '0');validation2('3')">For Free</div> <br><br>

                            <div class="input-group price-box mb-3" id="pricebox_fashion">
                                <span class="input-group-text" id="basic-addon1">PHP</span>
                                <input type="text" class="form-control" placeholder="Price of your listing" onkeypress="return onlyNumberKey(event)";
                                oninput="validation2('3')" id ="prcinput_fashion" name="price_fashion" maxlength="8" value="<?=$product_prc?>">
                                <input type="text" value="<?=$product_prc?>" id="value_prc1" hidden>
                            </div>
                            <span id="req3_fashion">Please fill this in.</span>

                            <p class="txt-per-item">Description</p> 
                            <textarea style="height: 150px;margin-bottom:5px;" id="desc_f" name="desc_fashion" oninput="validation2('4')"class="form-control combo-type" 
                            placeholder="Describe what you are selling and include any details a buyer might be interested in." 
                            maxlength="255"><?=$product_desc?></textarea>
                            <div id="v5"><p id="v5_6">0/255</p></div>
                            
                            <p class="txt-per-item">Type<span class="red"> *</span></p> 
                            <select name="type_fashion" class="combo-type form-control" id="type_fashion" onclick="validation2('5')" onchange= "size_change()">
                                <option disabled selected value="">Select a Type</option>
                                <option >Bottom</option>
                                <option >Footwear</option>
                                <option >Jacket, Coat and Outwear</option>
                                <option >Tops</option>            
                            </select>
                            <input type="text" value="<?=$product_type?>" id="type_txt1" hidden>
                            <span id="req4_fashion">Please Select a type</span>

                            <p class="txt-per-item">Gender<span class="red"> *</span></p> 
                            <select name="gender_fashion" class="combo-type form-control" id="gender_fashion" onclick="validation2('6')" onchange= "size_change()" >
                                <option disabled selected value="">Select a Gender</option>
                                <option >Female</option>
                                <option >Male</option>    
                            </select>
                            <input type="text" value="<?=$product_gender?>" id="gender_txt1" hidden>
                            <span id="req5_fashion">This field is required</span>

                            <p class="txt-per-item">Size<span class="red"> *</span></p> 
                            <select class="combo-type form-control" id="size_fashion" onchange= "input_size()">
                                <option disabled selected>Select a Size</option>
                            </select> 
                            <input type="text" name="size_fashion" class="form-control combo-type" placeholder="Input the size" id="size_txt_fashion" 
                            oninput="validation2('7')" value="<?=$product_size?>" style="display:none">
                            <span id="req6_fashion">This field is required</span>

                            <p class="title-item">Optional Details</p>
                            <p class="smtxt-per-item">With these details, buyers can find your listing more easily and ask fewer questions.</p> 
                            <input type="checkbox"  class="form-check-input deal-check" id="qty_fashion" onclick="qtychange1()">
                            <p class="smtxt-per-item">I have more than one of the same item</p> 
                            <input type="text" id="qty_txt_fashion" name="qty_fashion" value="<?=$product_qty?>" hidden>

                            <p class="title-item">Deal Method<span class="red"> *</span></p>

                            <input type="checkbox"  class="form-check-input deal-check" id="meet_fashion" onchange="addlocation1();validation2('8')">
                            <p class="smtxt-per-item">Meet-up</p> 

                            <div id="location-txt_fashion" class="dis">
                                <textarea style="height: 100px;" id="location_fashion" class="form-control combo-type"  name = "meet_fashion"
                                placeholder="Add Location" oninput="validation2('8')"><?=$product_meet?></textarea>
                                <span id="req7_fashion">Please choose a deal method</span>
                                <input type="text" value="<?=$product_meet?>" id="meet_txt1" hidden>
                            </div>

                            <input type="checkbox"  class="form-check-input deal-check" id="mail_fashion" onchange="addmail1();validation2('8')">
                            <p class="smtxt-per-item">Mailing & Delivery</p>

                            <div id="email-box_fashion" class="dis">
                                <textarea style="height: 100px;" id="mail-txtarea_fashion" class="form-control combo-type"  name = "mail_fashion"
                                placeholder="Are there additional mailing or dellivery fees and options?" oninput="validation2('8')"><?=$product_mail?></textarea>
                                <span id="req8_fashion">Please choose a deal method</span>
                                <input type="text" value="<?=$product_mail?>" id="mail_txt1" hidden>
                            </div>

                            <input type="text" id="deal1_fashion" name="deal1_fashion" hidden>
                            <input type="text" id="deal2_fashion" name="deal2_fashion" hidden>
                            <p class="title-item">Picture of the product<span class="red"> *</span></p>
                            <?php 
                                fashion_update();
                            ?>
                            <div id="fashion_form" >
                                <input type='file' name='file_f[]' id='file_fashion' onchange="validation2('9')" multiple><br>
                                <span id="req9_fashion">Must be 10 and below only</span>
                                <input type='submit' name='submit_fashion' class="form-control listing-btn" value="Update" id="list_btn_fashion" >
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container-bike" id="con-2" style="display:none">
                    <div class="group">
                        <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">
                        <!--For seller-->
                        <input type="text" id="id" value="<?php echo $key?>" name="id" hidden>
                        <!--For picture id-->
                        <input type="text" id="picid" value="<?php echo $picture_id?>" name="picid" hidden>
                        <!--For product id-->
                        <input type="text" id="prodno" value="<?php echo $prod_id?>" name="prodid" hidden>

                        

                        <input type="text" required="" name="prod_name" class="txtbox" maxlength="50" id="productname_bike" value="<?=$product_name?>" oninput="validation1('1');">
                        <label class="user-txt">Product Name</label><br>
                        <span id="req1_bike">Product Name is required</span>

                        <p class="title-item">About the Item</p>
                    
                            <p class="txt-per-item">Condition<span class="red">*</span></p> 

                            <div class="box-condition1 con-6" onclick="changecon('con-6')">Brand new</div>
                        
                            <div class="box-condition1 con-7" onclick="changecon('con-7')">Like new</div>

                            <div class="box-condition1 con-3" onclick="changecon('con-3')">Lightly used</div>

                            <div class="box-condition1 con-4" onclick="changecon('con-4')">Well used</div>

                            <div class="box-condition1 con-5" onclick="changecon('con-5')">Heavily used</div>

                            <br><br><span id="req2_bike">Please fill this in.</span>
                            <input type="text" id="con_txt_bike" name="condition_txt" value="<?=$product_con?>" hidden> 

                            <br><p class="txt-per-item">Price<span class="red"> *</span></p> 
                            <div class="box-condition1 con-8" onclick="changepric('con-8', '1');//validation1('3')" >For Sale</div>
                            <div class="box-condition1 con-9" onclick="changepric('con-9', '0');validation1('3')">For Free</div>
            
                        <br><br>

                        <div class="input-group price-box mb-3" id="pricebox_bike">
                            <span class="input-group-text" id="basic-addon1">PHP</span>
                            <input type="text" class="form-control" placeholder="Price of your listing" onkeypress="return onlyNumberKey(event)";
                            oninput="validation1('3')" id ="prcinput_bike" value="<?=$product_prc?>" name="price" maxlength="8">
                            <input type="text" value="<?=$product_prc?>" id="value_prc" hidden>
                        </div>
                        <span id="req3_bike">Please fill this in.</span>
                        
                        <p class="txt-per-item">Description</p> 
                        <textarea style="height: 150px;" name="desc" id="desc_b" maxlength="255" oninput="validation1('7')" class="form-control combo-type" placeholder="Describe what you are selling and include any details a buyer might be interested in."><?=$product_desc?></textarea>
                        <div id="v5"><p id="v5_5">0/255</p></div>

                        <p class="txt-per-item">Type<span class="red"> *</span></p> 
                        <select name="type" class="combo-type form-control" id="type_bike" onclick="validation1('4')">
                            <option disabled selected>Select a Type</option>
                            <option >Mountain Bike</option>
                            <option >Road Bikes</option>
                            <option >Foldable Bikes</option>
                            <option >E-Bikes</option>
                            <option >Parts & Accessories</option>
                            <option >Children Bikes</option>
                            <option >Other Bicycles</option>
                        </select>
                        <input type="text" value="<?=$product_type?>" id="type_txt" hidden>
                        <!--<span id="req4_bike">Type field is required</span>-->

                        <p class="title-item">Optional Details</p>
                        <p class="smtxt-per-item">With these details, buyers can find your listing more easily and ask fewer questions.</p> 
                        <input type="checkbox"  class="form-check-input deal-check" id="qty_bike" onclick="qtychange()">
                        <p class="smtxt-per-item">I have more than one of the same item</p> 
                        <input type="text" id="qty_txt_bike" value="<?=$product_qty?>" name="qty" hidden>

                        <p class="title-item">Deal Method<span class="red"> *</span></p>

                        <input type="checkbox"  class="form-check-input deal-check" id="meet_bike" onchange="addlocation()" onclick="validation1('5')">
                        <p class="smtxt-per-item">Meet-up</p> 

                        <div id="location-txt_bike" class="dis">
                            <textarea style="height: 100px;" id="location_bike" class="form-control combo-type"  name = "meet"
                            placeholder="Add Location" oninput="validation1('5')"><?=$product_meet?></textarea>
                            <span id="req5_bike">Please choose a deal method</span>
                            <input type="text" value="<?=$product_meet?>" id="meet_txt" hidden>
                        </div>

                        <input type="checkbox"  class="form-check-input deal-check" id="mail_bike" onchange="addmail()" onclick="validation1('5')">
                        <p class="smtxt-per-item">Mailing & Delivery</p>

                        <div id="email-box_bike" style="display:none">
                            <textarea style="height: 100px;" id="mail-txtarea_bike" class="form-control combo-type"  name = "mail"
                            placeholder="Are there additional mailing or dellivery fees and options?" oninput="validation1('5')"><?=$product_mail?></textarea>
                            <span id="req6_bike">Please choose a deal method</span>
                            <input type="text" value="<?=$product_mail?>" id="mail_txt" hidden>
                        </div>

                        <input type="text" id="deal1_bike" name="deal1" class="dis">
                        <input type="text" id="deal2_bike" name="deal2" class="dis">
                        <p class="title-item">Picture of the product<span class="red"> *</span></p>
                        <?php 
                            bike_update();
                        ?>
                        <div id="bike_form">
                            <input type='file' name='file[]' id='file_bike' onchange="validation1('6')" multiple><br>
                            <span id="req7_bike">Must be 10 and below only</span>
                            <input type='submit' name='submit' class="form-control listing-btn" value="Update" id="list_btn_bike">
                        </div>
                        <!--<input type="submit" class="form-control listing-btn" value="List now" id="list_btn" disabled>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-2"></div>
    </div>
</body>
</html>

<script>
    <?php
        include"js/navbar.js";
        include"js/editlist.js";
    ?>
</script>