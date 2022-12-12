<?php
	function bike_upload(){		//LISTING UPLOAD FOR BIKE PRODUCTS
		include"connection.php";

		if (isset($_POST['submit'])){

			$PRODID = $_POST['prodid'];
			$PROD_NAME = $_POST['prod_name'];
			$CONDITION = $_POST['condition_txt'];
			$DESC = $_POST['desc'];
			$TYPE = $_POST['type'];
			$QTY_ITEM = $_POST['qty'];
			$DEAL = $_POST['deal1'] .' '. $_POST['deal2'];
			$MEET = $_POST['meet'];
			$MAIL = $_POST['mail'];
			$SELLER = $_POST['id'];
			$PICTUREID = $_POST['picid'];
			$PRICE = $_POST['price'];
			$STATUS = "PENDING";
			$DATE = $_POST['text-time_b'];
			/*
			echo $PROD_NAME;
			echo $CONDITION;
			echo $PRICE;
			echo $DESC;
			echo $TYPE;
			echo $STATUS;
			echo $DEAL;
			echo $MEET;
			echo $MAIL;
			echo $SELLER;
			echo $PICTUREID;
			*/
			$sql = "INSERT INTO bike_product ". "(PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_CONDITION, PRODUCT_DESCRIPTION, PRODUCT_TYPE, PRODUCT_QTY, PRODUCT_DEALMETHOD, MEET_UP, MAILING, PICTURE_ID, SELLER_ID, PROD_ID,STATUS, DATE) ". 
			"VALUES('$PROD_NAME','$PRICE','$CONDITION','$DESC','$TYPE','$QTY_ITEM','$DEAL','$MEET','$MAIL', '$PICTUREID', '$SELLER', '$PRODID','$STATUS', '$DATE')";

			if ($conn->query($sql) === TRUE) { 
				
				$fileCount = count($_FILES['file']['name']);
				for ($i=0; $i<$fileCount; $i++){
					$fileName = $_FILES['file']['name'][$i];
					$ex = pathinfo($fileName, PATHINFO_EXTENSION);
					$pic_name = $PROD_NAME."_". $i.".".$ex;
					$sql = "INSERT INTO product_img (IMG_INDEX,IMG_NAME,PICTURE_ID,PROD_ID) VALUES ('$i','$pic_name','$PICTUREID','$PRODID')";
				
					if($conn->query($sql) === TRUE){
						//echo "File Uploaded Successfully";
					}else{
						echo "Error";
					}
					move_uploaded_file($_FILES['file']['tmp_name'][$i], 'includes/images/client-product/'.$fileName);
					rename("includes/images/client-product/$fileName", "includes/images/client-product/$pic_name");
					echo'<script>
						window.location.href ="pendingform.php";
						alert("Listing Successful!"); 	
						</script>';
				}
			}else{
				echo"<script>alert('Error')</script>";
			}
		}
	}

	function fashion_upload(){	//LISTING UPLOAD FOR FASHION PRODUCTS
		include"connection.php";

		if (isset($_POST['submit_fashion'])){

			$PRODID_F = $_POST['prodid_fashion'];
			$PROD_NAME_F = $_POST['prod_name_fashion'];
			$CONDITION_F = $_POST['condition_txt_fashion'];
			$PRICE_F = $_POST['price_fashion'];
			$DESC_F = $_POST['desc_fashion'];
			$TYPE_F = $_POST['type_fashion'];
			$GENDER_F = $_POST['gender_fashion'];
			$SIZE_F = $_POST['size_fashion'];
			$QTY_ITEM_F = $_POST['qty_fashion'];
			$DEAL_F = $_POST['deal1_fashion'] .' '. $_POST['deal2_fashion'];
			$MEET_F = $_POST['meet_fashion'];
			$MAIL_F = $_POST['mail_fashion'];
			$SELLER_F = $_POST['id_f'];
			$PICTUREID_F = $_POST['picid_fashion'];		
			$STATUS_F = "PENDING";
			$DATE_F = $_POST['text-time'];
			
			/*echo $SELLER_F;
			echo $PRODID_F;
			echo $PROD_NAME_F;
			echo $CONDITION_F;
			echo $PRICE_F;
			echo $DESC_F;
			echo $TYPE_F;
			echo $GENDER_F;
			echo $SIZE_F;
			echo $STATUS_F;
			echo $DEAL_F;
			echo $MEET_F;
			echo $MAIL_F;		
			echo $PICTUREID_F;
			*/
			$sql = "INSERT INTO fashion_product ". "(PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_CONDITION, PRODUCT_DESCRIPTION, PRODUCT_TYPE,PRODUCT_GENDER,PRODUCT_SIZE, PRODUCT_QTY, PRODUCT_DEALMETHOD, MEET_UP, MAILING, PICTURE_ID, SELLER_ID, PROD_ID, STATUS, DATE) ". 
			"VALUES('$PROD_NAME_F','$PRICE_F','$CONDITION_F','$DESC_F','$TYPE_F','$GENDER_F','$SIZE_F','$QTY_ITEM_F','$DEAL_F','$MEET_F','$MAIL_F', '$PICTUREID_F', '$SELLER_F', '$PRODID_F','$STATUS_F', $DATE_F)";
			
			if ($conn->query($sql) === TRUE) { 
				
				$fileCount = count($_FILES['file_f']['name']);
				for ($i=0; $i<$fileCount; $i++){
					$fileName = $_FILES['file_f']['name'][$i];
					$ex = pathinfo($fileName, PATHINFO_EXTENSION);
					$pic_name = $PROD_NAME_F."_". $i.".".$ex;
					$sql = "INSERT INTO fashion_imgs (IMG_INDEX,IMG_NAME,PICTURE_ID,PROD_ID) VALUES ('$i','$pic_name','$PICTUREID_F','$PRODID_F')";
				
					if($conn->query($sql) === TRUE){
						//echo "File Uploaded Successfully";
					}else{
						echo "Error";
					}

					move_uploaded_file($_FILES['file_f']['tmp_name'][$i], 'includes/images/client-product/'.$fileName);
					rename("includes/images/client-product/$fileName", "includes/images/client-product/$pic_name");
					echo'<script>
						window.location.href ="pendingform.php";
						alert("Listing Successful!"); 		
						</script>';
				}
			}else{
				echo"<script>alert('Error')</script>";
			}
		}
	}

	function bike_update(){		//LISTING UPDATE FOR BIKE PRODUCTS
		include"connection.php";

		if (isset($_POST['submit'])){

			$PRODID = $_POST['prodid'];
			$PROD_NAME = $_POST['prod_name'];
			$CONDITION = $_POST['condition_txt'];
			$DESC = $_POST['desc'];
			$TYPE = $_POST['type'];
			$QTY_ITEM = $_POST['qty'];
			$DEAL = $_POST['deal1'] .' '. $_POST['deal2'];
			$MEET = $_POST['meet'];
			$MAIL = $_POST['mail'];
			$SELLER = $_POST['id'];
			$PICTUREID = $_POST['picid'];
			$PRICE = $_POST['price'];
			
			/*echo $PROD_NAME;
			echo $CONDITION;
			echo $PRICE;
			echo $DESC;
			echo $TYPE;
			echo $QTY_ITEM;
			echo $DEAL;
			echo $MEET;
			echo $MAIL;
			echo $SELLER;
			echo $PICTUREID;
			echo $PRODID;*/
			
			$sql = "UPDATE bike_product SET PRODUCT_NAME='$PROD_NAME', PRODUCT_PRICE='$PRICE', PRODUCT_CONDITION='$CONDITION', PRODUCT_DESCRIPTION='$DESC', PRODUCT_TYPE='$TYPE', 
            PRODUCT_QTY='$QTY_ITEM',PRODUCT_DEALMETHOD='$DEAL', MEET_UP='$MEET', MAILING='$MAIL', PICTURE_ID='$PICTUREID' , PROD_ID='$PRODID', SELLER_ID = '$SELLER'
            WHERE PROD_ID = '$PRODID'";

			if ($conn->query($sql) === TRUE) { 

				$fileName = $_FILES['file']['name'][0];

				if($fileName == ""){
					echo"<script>alert('Update Successful');
					window.location.href='product.php?id=$PRODID';
					</script>";
						
				}else{
					$sql = "DELETE FROM product_img WHERE PROD_ID = '$PRODID'";
					$result = mysqli_query($conn,$sql);	

					if ($conn->query($sql) === TRUE) { 
						$fileCount = count($_FILES['file']['name']);
						for ($i=0; $i<$fileCount; $i++){
							$fileName = $_FILES['file']['name'][$i];

							$ex = pathinfo($fileName, PATHINFO_EXTENSION);
							$pic_name = $PROD_NAME."_". $i.".".$ex;
							$sql = "INSERT INTO product_img (IMG_INDEX,IMG_NAME,PICTURE_ID,PROD_ID) VALUES ('$i','$pic_name','$PICTUREID','$PRODID')";
									
							if($conn->query($sql) === TRUE){
								move_uploaded_file($_FILES['file']['tmp_name'][$i], 'includes/images/client-product/'.$fileName);
								rename("includes/images/client-product/$fileName", "includes/images/client-product/$pic_name");
											
								echo"<script>alert('Update Successful');
								window.location.href='product.php?id=$PRODID';
								</script>";
							}
						}	
					}
				}	
			}	
		}
	}
		
	function fashion_update(){	//LISTING UPDATE FOR FASHION PRODUCTS
		include"connection.php";

		if (isset($_POST['submit_fashion'])){

			$PRODID_F = $_POST['prodid_fashion'];
			$PROD_NAME_F = $_POST['prod_name_fashion'];
			$CONDITION_F = $_POST['condition_txt_fashion'];
			$PRICE_F = $_POST['price_fashion'];
			$DESC_F = $_POST['desc_fashion'];
			$TYPE_F = $_POST['type_fashion'];
			$GENDER_F = $_POST['gender_fashion'];
			$SIZE_F = $_POST['size_fashion'];
			$QTY_ITEM_F = $_POST['qty_fashion'];
			$DEAL_F = $_POST['deal1_fashion'] .' '. $_POST['deal2_fashion'];
			$MEET_F = $_POST['meet_fashion'];
			$MAIL_F = $_POST['mail_fashion'];
			$SELLER_F = $_POST['id_f'];
			$PICTUREID_F = $_POST['picid_fashion'];		
			
			/*echo $SELLER_F;
			echo $PRODID_F;
			echo $PROD_NAME_F;
			echo $CONDITION_F;
			echo $PRICE_F;
			echo $DESC_F;
			echo $TYPE_F;
			echo $GENDER_F;
			echo $SIZE_F;
			echo $QTY_ITEM_F;
			echo $DEAL_F;
			echo $MEET_F;
			echo $MAIL_F;		
			echo $PICTUREID_F;*/
			
			$sql = "UPDATE fashion_product SET PRODUCT_NAME='$PROD_NAME_F', PRODUCT_PRICE='$PRICE_F', PRODUCT_CONDITION='$CONDITION_F', PRODUCT_DESCRIPTION='$DESC_F', PRODUCT_TYPE='$TYPE_F', 
            PRODUCT_GENDER = '$GENDER_F' , PRODUCT_SIZE = '$SIZE_F',PRODUCT_QTY='$QTY_ITEM_F',PRODUCT_DEALMETHOD='$DEAL_F', MEET_UP='$MEET_F', MAILING='$MAIL_F', PICTURE_ID='$PICTUREID_F' , PROD_ID='$PRODID_F', SELLER_ID = '$SELLER_F'
            WHERE PROD_ID = '$PRODID_F'";

			if ($conn->query($sql) === TRUE) { 

				$fileName = $_FILES['file_f']['name'][0];

				if($fileName == ""){
					echo"<script>alert('Update Successful');
					window.location.href='product.php?id=$PRODID_F';
					</script>";
						
				}else{
					$sql = "DELETE FROM fashion_imgs WHERE PROD_ID = '$PRODID_F'";
					$result = mysqli_query($conn,$sql);	

					if ($conn->query($sql) === TRUE) { 
						$fileCount = count($_FILES['file_f']['name']);
						for ($i=0; $i<$fileCount; $i++){
							$fileName = $_FILES['file_f']['name'][$i];

							$ex = pathinfo($fileName, PATHINFO_EXTENSION);
							$pic_name = $PROD_NAME_F."_". $i.".".$ex;
							$sql = "INSERT INTO fashion_imgs (IMG_INDEX,IMG_NAME,PICTURE_ID,PROD_ID) VALUES ('$i','$pic_name','$PICTUREID_F','$PRODID_F')";
									
							if($conn->query($sql) === TRUE){
								move_uploaded_file($_FILES['file_f']['tmp_name'][$i], 'includes/images/client-product/'.$fileName);
								rename("includes/images/client-product/$fileName", "includes/images/client-product/$pic_name");
											
								echo"<script>alert('Update Successful');
								window.location.href='product.php?id=$PRODID_F';
								</script>";
							}
						}	
					}
				}	
			}	
		}
	}

?>

