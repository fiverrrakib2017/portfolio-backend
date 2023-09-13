<?php 
include 'database_connect.php';


if (isset($_POST['getCustomerData'])) {
	if ($allPack=$con->query("SELECT * FROM `customers` INNER JOIN package ON customers.package_id=package.package_id;")) {
		while ($rows=$allPack->fetch_array()) {

			$expireDate=$rows["expire_date"];
			 $todayDate=date("Y-m-d"); 

			if ( $expireDate <=$todayDate ) {
				$expired="<span class ='badge bg-danger'>Expired</span>";
			}else{
				$expired=$expireDate;
			}


			 echo '<tr>
            <td>'.$rows['id'].'</td>            
            <td><a href="profile.php?id='.$rows['id'].'"> '.$rows['customer_name'].'</a> </td>            
            <td>'.$rows['mobile'].'</td>            
            <td>'.$rows['package_name'].'</td>            
            <td>'.$expired.'</td>            
            
            <td >
            <a href="customer_update.php?id='.$rows['id'].'" class="btn-sm btn btn-primary" ><i class="fas fa-edit"></i></a>
            </td>

            <td>
            <a href="profile.php?id='.$rows['id'].'" class="btn-sm btn btn-success " ><i class="fas fa-eye"></i></a>
            </td>
            
            <td>
            <a data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}
//expire customer from customer_expire.php file
if (isset($_POST['getExpireCustomerData'])) {
	if ($allPack=$con->query("SELECT * FROM `customers` INNER JOIN package ON customers.package_id=package.package_id WHERE expire_date<=NOW() ;")) {
		while ($rows=$allPack->fetch_array()) {

			$expireDate=$rows["expire_date"];
			 $todayDate=date("Y-m-d"); 

			if ( $expireDate <=$todayDate ) {
				$expired="<span class ='badge bg-danger'>Expired</span>";
			}else{
				$expired=$expireDate;
			}


			 echo '<tr>
            <td>'.$rows['id'].'</td>            
            <td><a href="profile.php?id='.$rows['id'].'"> '.$rows['customer_name'].'</a> </td>            
            <td>'.$rows['mobile'].'</td>            
            <td>'.$rows['package_name'].'</td>            
            <td>'.$expired.'</td>            
            
            <td >
            <a href="customer_update.php?id='.$rows['id'].'" class="btn-sm btn btn-primary" ><i class="fas fa-edit"></i></a>
            </td>

            <td>
            <a href="profile.php?id='.$rows['id'].'" class="btn-sm btn btn-success " ><i class="fas fa-eye"></i></a>
            </td>
            
            <td>
            <a data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}
if (isset($_POST['getPackageViewData'])) {
	 $id=$_POST['id'];
	if ($allPack=$con->query("SELECT * FROM `customers` INNER JOIN package ON customers.package_id=package.package_id WHERE customers.package_id=$id ")) {
		while ($rows=$allPack->fetch_array()) {

			$expireDate=$rows["expire_date"];
			 $todayDate=date("Y-m-d");

			if ( $expireDate <=$todayDate ) {
				$expired="<span class ='badge bg-danger'>Expired</span>";
			}else{
				$expired=$expireDate;
			}


			 echo '<tr>
            <td>'.$rows['id'].'</td>            
            <td><a href="profile.php?id='.$rows['id'].'"> '.$rows['customer_name'].'</a> </td>            
            <td>'.$rows['mobile'].'</td>            
            <td>'.$rows['package_name'].'</td>            
            <td>'.$expired.'</td>            
            
            <td >
            <a href="customer_update.php?id='.$rows['id'].'" class="btn-sm btn btn-primary" ><i class="fas fa-edit"></i></a>
            </td>

            <td>
            <a href="profile.php?id='.$rows['id'].'" class="btn-sm btn btn-success " ><i class="fas fa-eye"></i></a>
            </td>
            
            <td>
            <a data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}

///get customer invoice data
if (isset($_POST['getCustomerInvoiceData'])) {
	if ($allPack = $con->query("SELECT * FROM `customers` ")) {
		while ($rows = $allPack->fetch_array()) {
			if ($rows['due'] ==0) {
				$status = '<span class="badge bg-success">Paid</span>';
			}else{
				$status = '<span class="badge bg-danger">Due</span>';
			}
			echo '<tr>
            <td>' . $rows['id'] . '</td>
            <td><a href="profile.php?id='.$rows['id'].' ">' . $rows['customer_name'] . '</a></td>
            <td>' . $status . '</td>
            
            <td >
            <a href="invoice_full_view.php?id=' . $rows['id'] . '"  class="btn-sm btn btn-info " ><i class="fas fa-eye"></i></a>
            
            </td>

            </tr>';
		}
	}
}





//delete script 

if (isset($_POST['deleteData'])) {
	$id=$_POST['id'];
	if ($result=$con->query("DELETE  FROM customers WHERE id='$id' ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}


if (isset($_POST['addCustomerData'])) {
	$customer_name = $_POST['name'];
	$father_name = $_POST['father_name'];
	$mobile = $_POST['mobile'];
	$package = $_POST['package'];
	$address = $_POST['address'];
	$profession = $_POST['profession'];
	$nid = $_POST['nid'];
	$hight = $_POST['hight'];
	$weight = $_POST['weight'];
	$teacher_asign = $_POST['teacher_asign'];
	$reference = $_POST['reference'];
	$blood_group = $_POST['blood_group'];
	$price = $_POST['price'];
	$paid = $_POST['paid'];
	$discount = $_POST['discount'];
	$due = $_POST['due'];
	$gender = $_POST['gender'];
	$total = $_POST['total'];
	//get date after 1 month
	 $todayDate=date("Y-m-d");
	 $future_timestamp=strtotime("+1 month");
	 $final_time=date("Y-m-d",$future_timestamp);
	//$reg_date=date('Y-m-d h:i:sa');

	 //match nid number
	 if ($allCstmr=$con->query("SELECT * FROM customers")) {
	 		while ($rows=$allCstmr->fetch_array()) {
	 				$getMobileNumber=$rows["mobile"];
	 		}

	 		if ($mobile===$getMobileNumber) {
	 				echo 2;
	 				return false;
	 		}else{
	 			if ($result = $con->query("INSERT INTO customers(customer_name,	father_name,	address,	expire_date,	profession,	reference,teacher_asign,nid,paid,discount,	due,	total, 	mobile, weight,	hight, blood_group,	package_id,	price,status,gender)VALUES('$customer_name','$father_name',	'$address',	'$final_time',	'$profession'	,'$reference','$teacher_asign','$nid','$paid','$discount','$due',	'$total',	'$mobile', '$weight',	'$hight', '$blood_group',	'$package','$price','1','$gender')")) {
					if ($result == true) {
						echo 1;
						$con->close();
					} else {
						echo 0;
					}
	 		}

	 }


	
	}
}

//customer recharge summery 
if (isset($_POST['getRechargeData'])) {
	$id=$_POST['id'];
	if ($allPack=$con->query("SELECT * FROM `customer_recharge` WHERE customer_id=$id ORDER BY id DESC ")) {
		while ($rows=$allPack->fetch_array()) {
			//recharge until format date
			 $rechargeUntil = new DateTime($rows['recharge_until']);
        $final_recharge_until_date = $rechargeUntil->format('d-M-Y');
         $final_recharge_until_date; 
         //recharge date formate
          $recharDate = new DateTime($rows['date']);
        $final_recharge_date = $recharDate->format('d-M-Y');
         $final_recharge_date; 
			 echo '<tr>      
            <td>'.$final_recharge_date.'</td>            
            <td>'.$rows['month'].'</td>            
            <td>'.$final_recharge_until_date.'</td>            
            <td>'.$rows['amount'].'</td>      
            </tr>';
		}
	}
}

//

//update customer data

if (isset($_POST['updateCustomerData'])) {
	$customer_name = $_POST['name'];
	$id = $_POST['id'];
	$father_name = $_POST['father_name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$profession = $_POST['profession'];
	$nid = $_POST['nid'];
	$hight = $_POST['hight'];
	$weight = $_POST['weight'];
	$reference = $_POST['reference'];
	$blood_group = $_POST['blood_group'];
	//$reg_date=date('Y-m-d h:i:sa');
	if ($result = $con->query("UPDATE customers SET customer_name='$customer_name', father_name='$father_name',mobile='$mobile',address='$address',profession='$profession', nid='$nid', hight='$hight',weight='$weight',reference='$reference',blood_group='$blood_group' WHERE id='$id'")) {
		if ($result == true) {
			echo 1;
		} else {
			echo 0;
		}
	}
}


//customer image upload
if (isset($_POST['addProfileData'])) {
	$id=$_POST['id'];
	//move_uploaded_file($_FILES['file']['tmp_name'], "C:/xampp/htdocs/inventory/product_image/".$_FILES['file']['name']);

	if (isset($_FILES['file']['name'])) {
		//get a file name
		$filename= $_FILES['file']['name'];
		//get a file size
		$fileSize= $_FILES['file']['size'];
		//check file extension
		 $extension=pathinfo($filename,PATHINFO_EXTENSION);
		 $valid_extension=array("jpg","jpeg","gif","png");
		 $maxSize=2*1024*1024;
		 if ($fileSize > $maxSize) {
		 	//please select a valid size
		 	echo 2;
		 }else{
		 	if (in_array( $extension, $valid_extension)) {
		 	$newName=rand().".".$extension;
		 	//image store this path
		 	$path="../images/".$newName;
		 	$result=move_uploaded_file($_FILES['file']['tmp_name'], $path);
		 	//get image url and send to the database
		 	$filepath="images/".$newName;
		 	if ($result==true) {
		 		
				
				//$product->addProductData($name,$category,$brand,$price,$cost,$stock,$filepath,$code,$description);
				$con->query("UPDATE `customers` SET image_path='$filepath' WHERE id='$id' ");
				//$con->query("INSERT INTO profile_pic(customer_id,path)VALUES('$id','$filepath')");
				echo 1;
		 	}

		 	}else{
		 		//please select a valid format
		 		echo 0;
		 	}
		}
	}
}